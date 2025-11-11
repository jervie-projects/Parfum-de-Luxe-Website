<?php
require_once "base-model.php";
class Perfumes extends Base{
	private $table = "3b_11_tbl_perfume";

	function get_all_carousel() {
	    $stmt = $this->connection->prepare("SELECT * FROM " . $this->table . " WHERE perfume_brand = ?");
	    
	    $brand = 'Dior';
	    $stmt->bind_param("s", $brand);
	    $stmt->execute();
	    
	    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	    $stmt->close();
	    return $result;
	}


	function get_all_ladiesChoice() {
	    $stmt = $this->connection->prepare("SELECT * FROM " . $this->table . " WHERE perfume_gender = ?");
	    
	    $gender = 'Female'; 
	    $stmt->bind_param("s", $gender);
	    $stmt->execute();
	    
	    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	    $stmt->close();
	    return $result;
	}


	function get_all_perfumes() {
	    $stmt = $this->connection->prepare(
	        "SELECT 
	            3b_11_tbl_perfume.perfume_id, 
	            3b_11_tbl_perfume.perfume_name, 
	            3b_11_tbl_perfume.perfume_description, 
	            3b_11_tbl_perfume.perfume_image, 
	            3b_11_tbl_perfume.seller, 
	            3b_11_tbl_perfume.perfume_cost, 
	            3b_11_tbl_perfume.perfume_brand, 
	            3b_11_tbl_perfume.perfume_type,
	            GROUP_CONCAT(3b_11_tbl_season.season SEPARATOR ', ') AS seasons, 
	            CONCAT(3b_11_tbl_users.first_name, ' ', 3b_11_tbl_users.last_name) AS seller_name 
	        FROM 3b_11_tbl_perfume
	        LEFT JOIN 3b_11_tbl_perfume_season ON 3b_11_tbl_perfume.perfume_id = 3b_11_tbl_perfume_season.perfume_id
	        LEFT JOIN 3b_11_tbl_season ON 3b_11_tbl_perfume_season.season_id = 3b_11_tbl_season.season_id
	        LEFT JOIN 3b_11_tbl_users ON 3b_11_tbl_perfume.seller = 3b_11_tbl_users.user_id
	        GROUP BY 3b_11_tbl_perfume.perfume_id"
	    );

	    $stmt->execute();
	    $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
	    $stmt->close();
	    
	    return $result;
	}



	function get_perfume($id) {
	    $id = intval($id);

	    $stmt = $this->connection->prepare("
	        SELECT 
	            3b_11_tbl_perfume.perfume_id,
	            3b_11_tbl_perfume.perfume_name,
	            3b_11_tbl_perfume.perfume_description,
	            3b_11_tbl_perfume.perfume_image,
	            3b_11_tbl_perfume.seller AS seller_id,  
	            3b_11_tbl_perfume.perfume_cost,
	            GROUP_CONCAT(3b_11_tbl_season.season SEPARATOR ', ') AS seasons,
	            CONCAT(3b_11_tbl_users.first_name, ' ', 3b_11_tbl_users.last_name) AS seller_name, 
	            3b_11_tbl_perfume.perfume_brand,
	            3b_11_tbl_perfume.perfume_type,
	            3b_11_tbl_perfume.perfume_gender
	        FROM 
	            3b_11_tbl_perfume
	        LEFT JOIN 
	            3b_11_tbl_perfume_season ON 3b_11_tbl_perfume.perfume_id = 3b_11_tbl_perfume_season.perfume_id
	        LEFT JOIN 
	            3b_11_tbl_season ON 3b_11_tbl_perfume_season.season_id = 3b_11_tbl_season.season_id
	        LEFT JOIN 
	            3b_11_tbl_users ON 3b_11_tbl_perfume.seller = 3b_11_tbl_users.user_id  
	        WHERE
	            3b_11_tbl_perfume.perfume_id = ?
	        GROUP BY 
	            3b_11_tbl_perfume.perfume_id
	    ");

	    $stmt->bind_param("i", $id);
	    $stmt->execute();
	    $result = $stmt->get_result()->fetch_assoc();
	    $stmt->close();
	    return $result;
	}


	function update_perfume($id){
	    if (!isset($_POST['perfume-name']) || empty($_POST['perfume-name'])){
	        $_SESSION["errors"]["perfume"]["update"][$id]["perfume_name"] = true;
	    }
	    if (!isset($_POST['perfume-description']) || empty($_POST['perfume-description'])){
	        $_SESSION["errors"]["perfume"]["update"][$id]["perfume_description"] = true;
	    }
	    if (!isset($_POST['perfume-cost']) || empty($_POST['perfume-cost']) || !filter_var($_POST['perfume-cost'], FILTER_VALIDATE_INT) || $_POST['perfume-cost'] < 1){
	        $_SESSION["errors"]["perfume"]["update"][$id]["perfume_cost"] = true;
	    }

	    if(empty($_SESSION["errors"]["perfume"]["update"][$id])){
	        $stmt = $this->connection->prepare("
	            UPDATE " . $this->table . " 
	            SET perfume_name = ?, 
	                perfume_description = ?, 
	                perfume_brand = ?, 
	                perfume_type = ?, 
	                perfume_gender = ?, 
	                perfume_cost = ? 
	            WHERE perfume_id = ?
	        ");

	        $stmt->bind_param("ssssssi", 
	            $_POST['perfume-name'], 
	            $_POST['perfume-description'], 
	            $_POST['perfume-brand'], 
	            $_POST['perfume-type'], 
	            $_POST['perfume-gender'], 
	            $_POST['perfume-cost'], 
	            $id
	        );

	        if ($stmt->execute()) {
	        	$stmt = $this->connection->prepare("DELETE FROM 3b_11_tbl_perfume_season WHERE perfume_id = ?");
	        	$stmt->bind_param("i", $id);

	        	if($stmt->execute()){
	        		$stmt = $this->connection->prepare("INSERT INTO 3b_11_tbl_perfume_season (perfume_id, season_id) VALUES (?, ?)");
	        		$stmt->bind_param("ii", $id, $season);

	        		foreach($_POST['seasons'] as $season){
	        			if(!$stmt->execute()){
							$_SESSION["errors"]["perfume"]["update"][$id]["database"] = true;
						}
	        		}
	        	}
	        } else{
	        	$_SESSION["errors"]["perfume"]["update"][$id]["database"] = true;
	        }
	    }
	    return empty($_SESSION["errors"]["perfume"]["update"][$id]);
	}

	function delete_perfume($id){
	    $stmt = $this->connection->prepare("DELETE FROM " . $this->table . " WHERE perfume_id = ?");
	    $stmt->bind_param("i", $id);
	    $result = $stmt->execute();

	    $stmt->close();
	    return $result;
	}


	function add_perfume() {

	    if (!isset($_POST['perfume-name']) || empty($_POST['perfume-name'])) {
	        $_SESSION["errors"]["perfume"]["insert"]["perfume_name"] = true;
	    }
	    if (!isset($_POST['perfume-description']) || empty($_POST['perfume-description'])) {
	        $_SESSION["errors"]["perfume"]["insert"]["perfume-description"] = true;
	    }
	    if (!isset($_POST['perfume-cost']) || empty($_POST['perfume-cost']) || !filter_var($_POST['perfume-cost'], FILTER_VALIDATE_INT) || $_POST['perfume-cost'] < 1) {
	        $_SESSION["errors"]["perfume"]["insert"]["perfume-cost"] = true;
	    }
	    if (empty($_FILES['perfume-image']['name']) || !in_array($_FILES['perfume-image']['type'], ["image/jpeg", "image/jpg", "image/png"])) {
	        $_SESSION["errors"]["perfume"]["insert"]["perfume-image"] = true;
	    }

	    if (empty($_SESSION["errors"]["perfume"]["insert"])) {
		    $image = $_FILES['perfume-image']['name'];
		    $tempname = $_FILES['perfume-image']['tmp_name'];
		    $folder = '../3B-11/assets/images/' . $image;

		    if (move_uploaded_file($tempname, $folder)) {
		        $seller_id = $_SESSION['user']['id'] ?? null;

		        $query = "INSERT INTO " . $this->table . " (perfume_name, perfume_description, perfume_brand, perfume_type, perfume_gender, perfume_cost, perfume_image, seller) 
		                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

		        $stmt = $this->connection->prepare($query);
		        
		        $stmt->bind_param(
		            "sssssiss", 
		            $_POST['perfume-name'], 
		            $_POST['perfume-description'], 
		            $_POST['perfume-brand'], 
		            $_POST['perfume-type'], 
		            $_POST['perfume-gender'], 
		            $_POST['perfume-cost'], 
		            $folder, 
		            $seller_id
		        );

		        if ($stmt->execute()) {
		            $perfume_id = $stmt->insert_id;

		            $stmt = $this->connection->prepare("INSERT INTO 3b_11_tbl_perfume_season (perfume_id, season_id) VALUES (?, ?)");
		            $stmt->bind_param("ii", $perfume_id, $season);

		            foreach ($_POST['seasons'] as $season) {
		                if (!$stmt->execute()) {
		                    $_SESSION["errors"]["perfume"]["insert"]["database"] = true;
		                }
		            }
		        }
		    } else {
		        $_SESSION["errors"]["perfume"]["insert"]["file-upload"] = "Failed to upload the file.";
		    }
		}

	    return empty($_SESSION["errors"]["perfume"]["insert"]);
	}


	function select_by_brand($brand) {
	    $query = "SELECT * FROM " . $this->table . " WHERE perfume_brand = ?";
	    $stmt = $this->connection->prepare($query);

	    $stmt->bind_param("s", $brand);
	    $stmt->execute();

	    $result = $stmt->get_result();

	    $data = $result->fetch_all(MYSQLI_ASSOC);
	    $stmt->close();

	    return $data;
	}


	function search_perfume($term) {
	    $query = "SELECT * FROM " . $this->table . " WHERE perfume_name LIKE ? OR perfume_brand LIKE ?";

	    $stmt = $this->connection->prepare($query);
	    $search_term = "%" . $term . "%";
	    $stmt->bind_param("ss", $search_term, $search_term);

	    $stmt->execute();
	    $result = $stmt->get_result();

	    $data = $result->fetch_all(MYSQLI_ASSOC);

	    $stmt->close();

	    return $data;
	}

	function get_perfumes_by($by, $term){
		$term = "%" . $term . "%";
		if($by == "none" ){
			$result = $this->connection->prepare("SELECT 
			    perfume_cats.perfume_id, 
			    perfume_cats.perfume_name, 
			    perfume_cats.perfume_description, 
			    perfume_cats.perfume_brand, 
			    perfume_cats.perfume_type, 
			    perfume_cats.perfume_gender, 
			    perfume_cats.perfume_image, 
			    perfume_cats.perfume_cost, 
			    perfume_cats.seasons, 
			    CONCAT(3b_11_tbl_users.first_name, ' ', 3b_11_tbl_users.last_name) AS seller, 
			    tbl_users.user_id
			FROM (
			    SELECT 
			        3b_11_tbl_perfume.perfume_id, 
			        3b_11_tbl_perfume.perfume_name, 
			        3b_11_tbl_perfume.perfume_description, 
			        3b_11_tbl_perfume.perfume_brand, 
			        3b_11_tbl_perfume.perfume_type, 
			        3b_11_tbl_perfume.perfume_gender, 
			        3b_11_tbl_perfume.perfume_image, 
			        3b_11_tbl_perfume.perfume_cost, 
			        3b_11_tbl_perfume.seller, 
			        GROUP_CONCAT(3b_11_tbl_season.season SEPARATOR ',') AS seasons
			    FROM 3b_11_tbl_perfume
			    LEFT JOIN 3b_11_tbl_perfume_season 
			        ON 3b_11_tbl_perfume.perfume_id = 3b_11_tbl_perfume_season.perfume_id
			    LEFT JOIN 3b_11_tbl_season 
			        ON 3b_11_tbl_perfume_season.season_id = 3b_11_tbl_season.season_id
			    GROUP BY 3b_11_tbl_perfume.perfume_id
			) AS perfume_cats
			LEFT JOIN 3b_11_tbl_users 
			    ON perfume_cats.seller = 3b_11_tbl_users.user_id
			WHERE 
			    perfume_cats.seasons LIKE ? 
			    OR tbl_users.first_name LIKE ? 
			    OR tbl_users.last_name LIKE ? 
			    OR perfume_cats.perfume_name LIKE ? 
			    OR perfume_cats.perfume_description LIKE ?
			;
			");

			$result->bind_param("ssss", $term, $term, $term, $term);
		}else{
			$allowed = ["season", "seller", "seller", "user_id"];
			if(!in_array($by, $allowed)){
				return null;
			}

			$result = $this->connection->prepare("SELECT 
			    perfume_cats.perfume_id, 
			    perfume_cats.perfume_name, 
			    perfume_cats.perfume_description, 
			    perfume_cats.perfume_brand, 
			    perfume_cats.perfume_type, 
			    perfume_cats.perfume_gender, 
			    perfume_cats.perfume_image, 
			    perfume_cats.perfume_cost, 
			    perfume_cats.seasons, 
			    CONCAT(3b_11_tbl_users.first_name, ' ', 3b_11_tbl_users.last_name) AS seller, 
			    3b_11_tbl_users.user_id
			FROM (
			    SELECT 
			        3b_11_tbl_perfume.perfume_id, 
			        3b_11_tbl_perfume.perfume_name, 
			        3b_11_tbl_perfume.perfume_description, 
			        3b_11_tbl_perfume.perfume_brand, 
			        3b_11_tbl_perfume.perfume_type, 
			        3b_11_tbl_perfume.perfume_gender, 
			        3b_11_tbl_perfume.perfume_image, 
			        3b_11_tbl_perfume.perfume_cost, 
			        3b_11_tbl_perfume.seller, 
			        GROUP_CONCAT(3b_11_tbl_season.season) AS seasons
			    FROM 3b_11_tbl_perfume
			    LEFT JOIN 3b_11_tbl_perfume_season 
			        ON 3b_11_tbl_perfume.perfume_id = 3b_11_tbl_perfume_season.perfume_id
			    LEFT JOIN 3b_11_tbl_season 
			        ON 3b_11_tbl_perfume_season.season_id = 3b_11_tbl_season.season_id
			    GROUP BY 3b_11_tbl_perfume.perfume_id
			) AS perfume_cats
			LEFT JOIN 3b_11_tbl_users 
			    ON perfume_cats.seller = 3b_11_tbl_users.user_id
			HAVING $by LIKE ?");

			$result->bind_param("s", $term);
		}

		$result->execute();
		$result = $result->get_result();
		return $result->fetch_all(MYSQLI_ASSOC);
	}

}
?>


