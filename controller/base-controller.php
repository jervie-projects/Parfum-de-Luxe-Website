<?php
	class BaseController{
		private $root = "http://localhost/3B-11";

		function generateCSRFToken($form){
			$_SESSION['csrf_token'][$form] = bin2hex(random_bytes(32));
			return $_SESSION['csrf_token'][$form];
		}

		function verifyCSRFToken($form) {
		    if (!isset($_SESSION['csrf_token'][$form]) || !isset($_POST['csrf_token'])) {
		        return false;
		    }

		    if (!hash_equals($_SESSION['csrf_token'][$form], $_POST['csrf_token'])) {
		        return false;
		    }

		    return true;
		}

		function redirect($page){
			header("Location:$this->root/$page");
		}

		function assets($type,$name){
			echo "$this->root/assets/$type/$name";
		}

		function url($address = ''){
			echo "$this->root/$address";
		}

		function render($view){
			if(file_exists("views/".$view.".php")){
				include "views/".$view.".php";
			}
		}

	}
?>