<?php
	require_once "base-model.php";
	class Cart extends Base{
		public $table = "3b_11_tbl_cart";

		function add_cart($user_id, $perfume_id) {
		    $query = "INSERT INTO " . $this->table . " (user_id, perfume_id, quantity) VALUES (?, ?, ?)";

		    if ($stmt = $this->connection->prepare($query)) {
		        $quantity = 1;
		        $stmt->bind_param('iii', $user_id, $perfume_id, $quantity);

		        if ($stmt->execute()) {
		            return true; 
		        } else {
		            return false; 
		        }
		    } else {
		        return false;
		    }
		}


		function user_cart($id) {
		    $query = "
		        SELECT 
		            3b_11_tbl_perfume.perfume_id, 
		            3b_11_tbl_perfume.perfume_name, 
		            3b_11_tbl_perfume.perfume_image, 
		            3b_11_tbl_perfume.perfume_brand, 
		            3b_11_tbl_perfume.perfume_type, 
		            3b_11_tbl_perfume.perfume_cost, 
		            3b_11_tbl_cart.quantity, 
		            CONCAT(3b_11_tbl_users.first_name, ' ', 3b_11_tbl_users.last_name) AS buyer
		        FROM 
		            3b_11_tbl_perfume
		        LEFT JOIN 
		            3b_11_tbl_cart ON 3b_11_tbl_perfume.perfume_id = 3b_11_tbl_cart.perfume_id
		        LEFT JOIN 
		            3b_11_tbl_users ON 3b_11_tbl_cart.user_id = 3b_11_tbl_users.user_id
		        WHERE 
		            3b_11_tbl_users.user_id = ?
		        GROUP BY 
		            3b_11_tbl_perfume.perfume_id, 
		            3b_11_tbl_cart.quantity, 
		            3b_11_tbl_users.user_id;
		    ";

		    if ($stmt = $this->connection->prepare($query)) {
		        $stmt->bind_param('i', $id);
		        $stmt->execute();
		        $result = $stmt->get_result();

		        return $result->fetch_all(MYSQLI_ASSOC);
		    } else {
		        return false;
		    }
		}


		function delete_item_from_cart($user_id, $perfume_id) {
		    $query = "DELETE FROM " . $this->table . " WHERE user_id = ? AND perfume_id = ?";
		    if ($stmt = $this->connection->prepare($query)) {
		        $stmt->bind_param('ii', $user_id, $perfume_id);

		        return $stmt->execute();
		    } else {
		        return false;
		    }
		}


		function isPerfumeInCart($user_id, $perfume_id) {
		    $query = "SELECT COUNT(*) AS count FROM " . $this->table . "
		              WHERE user_id = ? AND perfume_id = ?";

		    if ($stmt = $this->connection->prepare($query)) {
		        $stmt->bind_param('ii', $user_id, $perfume_id);

		        $stmt->execute();
		        $stmt->bind_result($count);
		        $stmt->fetch();
		        return $count > 0;
		    } else {
		        return false;
		    }
		}


		function getQuantity($user_id, $perfume_id) {
		    $query = "SELECT quantity FROM " . $this->table . " WHERE user_id = ? AND perfume_id = ?";

		    if ($stmt = $this->connection->prepare($query)) {
		        $stmt->bind_param('ii', $user_id, $perfume_id);
		        $stmt->execute();
		        $stmt->bind_result($quantity);
		        $stmt->fetch();
		        return isset($quantity) ? (int)$quantity : 0;
		    } else {
		        return 0;
		    }
		}


		function updateQuantity($user_id, $perfume_id, $quantity) {
		    $query = "UPDATE " . $this->table . " SET quantity = ? WHERE user_id = ? AND perfume_id = ?";

		    if ($stmt = $this->connection->prepare($query)) {
		        $stmt->bind_param('iii', $quantity, $user_id, $perfume_id);
		        if ($stmt->execute()) {
		            return true;
		        }
		    }
		    return false;
		}



}