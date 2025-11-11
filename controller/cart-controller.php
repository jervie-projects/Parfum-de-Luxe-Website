<?php 
	require_once "base-controller.php";
	class CartController extends BaseController{

		private $model;

		function __construct(){
			require_once "model/cart-model.php";
			$this->model = new Cart();
		}

		function add_to_cart($id, $perfume_id){
			$query = $this->model->add_cart($id, $perfume_id);

			$this->redirect('home');
/*			header("Location: http://localhost/3B-11/home");*/
		}

		function user_cart($id){
			$result = $this->model->user_cart($id);
			include "views/cart.php";
		}

		function do_delete($user_id, $perfume_id) {
		    $result = $this->model->delete_item_from_cart($user_id, $perfume_id);

		    if ($result) {
		    	$_SESSION["success"]["cart"]["delete"] = true;
		    	$this->redirect('user/dashboard#my_perfumes');
/*		        header("Location: http://localhost/3B-11/user/dashboard#my_perfumes");*/
		    }else{
		    	$this->redirect('home');
/*		    	header("Location: http://localhost/3B-11/home");*/
		    }
		}

		function isPerfumeSelected($id, $perfume_id) {
    		return $this->model->isPerfumeInCart($id, $perfume_id);
		}

		function updateQuantity($user_id, $perfume_id, $quantity) {
        	return $this->model->updateQuantity($user_id, $perfume_id, $quantity);
    }

}