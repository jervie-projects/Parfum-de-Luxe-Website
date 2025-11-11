<?php
	require_once "base-model.php";
	class Seasons extends Base{
		public $table = "3b_11_tbl_season";

		function get_season(){
		    $query = "SELECT * FROM " . $this->table;
		    if ($stmt = $this->connection->prepare($query)) {
		        $stmt->execute();

		        $result = $stmt->get_result();
		        return $result->fetch_all(MYSQLI_ASSOC);
		    } else {
		        return [];
		    }
		}


		function update_season($id) {

		    if (!isset($_POST['season']) || empty($_POST['season'])) {
		        $_SESSION["errors"]["season"]["update"][$id]["season_name"] = true;
		    }
		    if (!isset($_POST['season_description']) || empty($_POST['season_description'])) {
		        $_SESSION["errors"]["season"]["update"][$id]["season_description"] = true;
		    }

		    if (empty($_SESSION["errors"]["season"]["update"])) {
		        $result = $this->connection->prepare("UPDATE " . $this->table . " SET season = ?, season_description = ? WHERE season_id = ?");

		        $result->bind_param("ssi", $_POST['season'], $_POST['season_description'], $id);

		        if(!$result->execute()){
					$_SESSION["errors"]["season"]["update"][$id]["database"] = true;
				}
		    } 
		    return empty($_SESSION["errors"]["season"]["update"][$id]);
		}

		function delete_season($id) {
		    $sql = "DELETE FROM " . $this->table . " WHERE season_id = ?";

		    if ($stmt = $this->connection->prepare($sql)) {
		        $stmt->bind_param("i", $id);
		        $stmt->execute();

		        if ($stmt->affected_rows > 0) {
		            return true;
		        } else {
		            return false;
		        }
		    } else {
		        return false;
		    }
		}

		function add_season() {

		    if (!isset($_POST['season']) || empty($_POST['season'])) {
		        $_SESSION["errors"]["season"]["insert"]["season_name"] = true;
		    }
		    if (!isset($_POST['season_description']) || empty($_POST['season_description'])) {
		        $_SESSION["errors"]["season"]["insert"]["season_description"] = true;
		    }

		    if (empty($_SESSION["errors"]["season"]["insert"])) {
		        $result = $this->connection->prepare("INSERT INTO " . $this->table . " (season, season_description) VALUES (?, ?)");
		        $result->bind_param("ss", $_POST["season"], $_POST["season_description"]);


		        if(!$result->execute()){
		        	$_SESSION["errors"]["season"]["insert"]["database"] = true;
		        }
		    } 
		    return empty($_SESSION["errors"]["season"]["insert"]);
		}

	}
?>