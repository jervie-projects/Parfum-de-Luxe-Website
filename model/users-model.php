<?php
	require_once "base-model.php";
	class Users extends Base{
		public $table = "3b_11_tbl_users";

		function add_users() {
		    if (!isset($_POST["first-name"]) || empty($_POST["first-name"])) {
		        $_SESSION["errors"]["user"]["insert"]["first_name"] = true;
		    }

		    if (!isset($_POST["last-name"]) || empty($_POST["last-name"])) {
		        $_SESSION["errors"]["user"]["insert"]["last_name"] = true;
		    }

		    if (!isset($_POST["username"]) || empty($_POST["username"])) {
		        $_SESSION["errors"]["user"]["insert"]["username"] = true;
		    }

		    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
		    if (!isset($_POST["password"]) || empty($_POST["password"]) || !preg_match($pattern, $_POST["password"])) {
		        $_SESSION["errors"]["user"]["insert"]["password"] = true;
		    }

		    if (!isset($_POST["role"]) || empty($_POST["role"])) {
		        $_SESSION["errors"]["user"]["insert"]["role"] = true;
		    }

		    if ($is_from_register_page) {
	            $_SESSION["register_counter"] = true;
	        }

		    if (empty($_SESSION["errors"]["user"]["insert"])) {
		        $hashed_password = password_hash($_POST["password"], PASSWORD_BCRYPT);

		        $stmt = $this->connection->prepare("INSERT INTO " . $this->table . " 
		            (first_name, last_name, username, password, role) VALUES (?, ?, ?, ?, ?)");

		        $stmt->bind_param(
		            "sssss",
		            $_POST["first-name"],
		            $_POST["last-name"],
		            $_POST["username"],
		            $hashed_password,
		            $_POST["role"]
		        );

		        if(!$stmt->execute()){
		        	$_SESSION["errors"]["user"]["insert"]["database"] = true;
		        }
		    }
		    return empty($_SESSION["errors"]["user"]["insert"]);
		}


		function log_user_in() {
		    $stmt = $this->connection->prepare("SELECT * FROM " . $this->table . " WHERE username = ?");
		    $stmt->bind_param("s", $_POST['username']);
		    $stmt->execute();

		    $user = $stmt->get_result()->fetch_assoc();
		    $stmt->close();

		    if ($user && password_verify($_POST['password'], $user['password'])) {
		        $_SESSION['user'] = [
		            'id' => (int)$user['id'],  
		            'username' => $user['username'],
		            'role' => $user['role'],
		        ];

		        return $user;
		    } else {
		        return false;
		    }
		}

		function get_all_users() {
		    $result = $this->connection->prepare("SELECT user_id, first_name, last_name, username, role FROM 3b_11_tbl_users");

		    $result->execute();

		    $result = $result->get_result();
		    return $result->fetch_all(MYSQLI_ASSOC);  
		}

		function get_cart_items(){
			$result = $this->connection->prepare("SELECT 
				    3b_11_tbl_cart.perfume_user_id,           
				    3b_11_tbl_cart.user_id AS user_id, 
				    3b_11_tbl_cart.perfume_id AS perfume_id, 
				    3b_11_tbl_perfume_results.perfume_name, 
				    3b_11_tbl_perfume_results.perfume_description, 
				    3b_11_tbl_perfume_results.perfume_brand, 
				    3b_11_tbl_perfume_results.perfume_type, 
				    3b_11_tbl_perfume_results.perfume_gender, 
				    3b_11_tbl_perfume_results.perfume_image, 
				    3b_11_tbl_perfume_results.season, 
				    3b_11_tbl_perfume_results.seller,
				    3b_11_tbl_perfume_results.perfume_cost  
				FROM 
				    3b_11_tbl_cart 
				INNER JOIN 
				    (
				        SELECT 
				            perfume_cats.perfume_id, 
				            perfume_cats.perfume_name, 
				            perfume_cats.perfume_description, 
				            perfume_cats.perfume_brand, 
				            perfume_cats.perfume_type, 
				            perfume_cats.perfume_gender, 
				            perfume_cats.perfume_image, 
				            perfume_cats.seasons AS season, 
				            CONCAT(3b_11_tbl_users.first_name, ' ', 3b_11_tbl_users.last_name) AS seller, 
				            perfume_cats.user_id,
				            perfume_cats.perfume_cost  
				        FROM 
				            (
				                SELECT 
				                    3b_11_tbl_perfume.perfume_id, 
				                    3b_11_tbl_perfume.perfume_name, 
				                    3b_11_tbl_perfume.perfume_description, 
				                    3b_11_tbl_perfume.perfume_brand, 
				                    3b_11_tbl_perfume.perfume_type, 
				                    3b_11_tbl_perfume.perfume_gender, 
				                    3b_11_tbl_perfume.perfume_image, 
				                    GROUP_CONCAT(3b_11_tbl_season.season) AS seasons,  
				                    3b_11_tbl_cart.user_id, 
				                    3b_11_tbl_perfume.perfume_cost  
				                FROM 
				                    3b_11_tbl_perfume
				                LEFT JOIN 
				                    3b_11_tbl_perfume_season ON 3b_11_tbl_perfume.perfume_id = 3b_11_tbl_perfume_season.perfume_id
				                LEFT JOIN 
				                    3b_11_tbl_season ON 3b_11_tbl_perfume_season.season_id = 3b_11_tbl_season.season_id
				                LEFT JOIN
				                    3b_11_tbl_cart ON 3b_11_tbl_perfume.perfume_id = 3b_11_tbl_cart.perfume_id  
				                GROUP BY 
				                    3b_11_tbl_perfume.perfume_id
				            ) AS perfume_cats
				        LEFT JOIN 
				            3b_11_tbl_users ON perfume_cats.user_id = 3b_11_tbl_users.user_id
				    ) AS 3b_11_tbl_perfume_results
				ON 
				    3b_11_tbl_cart.perfume_id = 3b_11_tbl_perfume_results.perfume_id
				WHERE 
				    3b_11_tbl_cart.user_id = ?;
			");
			$result->bind_param("i",$_SESSION["user"]["id"]);
			$result->execute();
			$result = $result->get_result();
			return $result->fetch_all(MYSQLI_ASSOC);
	}

		function update($id){
			if(!isset($_POST["first_name"]) || empty($_POST["first_name"])){
				$_SESSION["errors"]["user"]["update"][$id]["first_name"] = true;
			}

			if(!isset($_POST["last_name"]) || empty($_POST["last_name"])){
				$_SESSION["errors"]["user"]["update"][$id]["last_name"] = true;
			}

			if(!isset($_POST["password"]) || empty($_POST["password"])){
				$change_pass = false;
			} else {
				$change_pass = true;
			}


			if($change_pass){
				$pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/';
				if(!preg_match($pattern, $_POST["password"])){
					$_SESSION["errors"]["user"]["update"][$id]["password"] = true;
				}
			} 

			if(empty($_SESSION["errors"]["user"]["update"][$id])){
				if($change_pass){
					$result = $this->connection->prepare("UPDATE " . $this->table . " SET first_name = ? , last_name = ? , password = ? WHERE user_id = ?");
					$result->bind_param("sssi",
						$_POST["first_name"],
						$_POST["last_name"],
						password_hash($_POST["password"], PASSWORD_DEFAULT),
						$id
					);
				} else {
					$result = $this->connection->prepare("UPDATE " . $this->table . " SET first_name = ? , last_name = ? WHERE user_id = ?");
					$result->bind_param("ssi",
						$_POST["first_name"],
						$_POST["last_name"],
						$id
					);
				}

				if(!$result->execute()){
					$_SESSION["errors"]["user"]["update"][$id]["database"] = true;
				}
			}

			return empty($_SESSION["errors"]["user"]["update"][$id]);
		}

		function destroy(){
			$result = $this->connection->prepare("DELETE FROM " . $this->table . " WHERE user_id = ?");
			$result->bind_param("i", $_POST["user_id"]);
			return $result->execute();
		}

		function remove_cart(){
			$result = $this->connection->prepare("DELETE FROM 3b_11_tbl_cart WHERE perfume_user_id = ?");
			$result->bind_param("i",$_POST["perfume_user_id"]);
			return $result->execute();
		}
	}
?>