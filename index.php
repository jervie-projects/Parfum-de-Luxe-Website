<?php
	session_start();
	if(isset($_GET['url'])){
		$url = explode("/",$_GET["url"]);
	}else{
		$url = explode("/",$_GET["url"] = 'home');
	}

	require_once "controller/perfume-controller.php";
	require_once "controller/season-controller.php";
	require_once "controller/users-controller.php";
	require_once "controller/cart-controller.php";
	$perfumes_controller = new PerfumeController();
	$season_controller = new SeasonController();
	$users_controller = new UsersController();
	$cart_controller = new CartController();

	
	if ($_GET["url"] == "home"){
		$perfumes_controller->index();
	}
	
	else if ($url[0] == "perfume" && ctype_digit($url[1])){
		$perfumes_controller->show($url[1]);
	}

	else if ($_GET["url"] == "add"){
		$users_controller->authenticate(['seller']);
		$perfumes_controller->create();
	}

	else if ($url[0] == "perfume" && $url[1] == "insert" && !isset($url[2])){
		$users_controller->authenticate(['seller']);
		$perfumes_controller->store();
	}

	else if ($url[0] == "edit" && ctype_digit($url[1])) {
	    $users_controller->authenticate(array('seller', 'administrator'));
	    $perfumes_controller->edit($url[1]);
	}

	else if ($url[0] == "update" && ctype_digit($url[1])) {
	    $users_controller->authenticate(array('seller', 'administrator'));
	    $perfumes_controller->update($url[1]);
	}

	else if ($url[0] == "delete" && ctype_digit($url[1])){
		$users_controller->authenticate(array('seller', 'administrator'));
		$perfumes_controller->destroy($url[1]);
	}

	else if ($url[0] == "add_to_cart" && ctype_digit($url[1])) {
	    $result = $cart_controller->isPerfumeSelected($_SESSION['user']['id'], $url[1]);
	    if ($result) {
	    	$this->redirect('cart?modal=true');
	    	header("Location: http://localhost/3B-11/cart?modal=true");
	    } else {
	        $cart_controller->add_to_cart($_SESSION['user']['id'], $url[1]);
	        $this->redirect('home');
	        header("Location: http://localhost/3B-11/home");
	    }
	}

	else if ($_GET["url"] == "cart"){
		$users_controller->authenticate(['buyer']);
		$cart_controller->user_cart($_SESSION['user']['id']);
	}

	else if ($_GET["url"] == "do_delete_from_cart" && isset($_GET['perfume_id']) && ctype_digit($_GET['perfume_id'])) {
	    $perfume_id = $_GET['perfume_id'];
	    $user_id = $_SESSION['user']['id'];
	    $cart_controller->do_delete($user_id, $perfume_id);
	}

	else if ($_GET["url"] == "add_quantity") {
	    $perfume_id = intval($_POST['perfume_id']);
	    $quantity = intval($_POST['quantity']);
	    $user_id = $_SESSION['user']['id']; 

	    if ($quantity > 0) {
	        $result = $cart_controller->updateQuantity($user_id, $perfume_id, $quantity);

	        if ($result) {
	            header("Location: http://localhost/3B-11/cart");
	            exit();
	        } else {
	            echo "Error updating quantity.";
	        }
	    } else {
	        echo "Quantity must be greater than zero.";
	    }
	}
	
	else if ($url[0] == "search"){
		$perfumes_controller->search($_GET["term"]);
	}
	
	else if ($_GET["url"] == "shop"){
		$perfumes_controller->shop();
	}
	
	else if ($_GET["url"] == "aboutus"){
		$perfumes_controller->about_us();
	}

	else if ($_GET["url"] == "account"){
		$perfumes_controller->acc_center();
	}

	else if ($_GET["url"] == "items"){
		$perfumes_controller->show();
	}

	else if ($_GET["url"] == "dior"){
		$perfumes_controller->dior_selected();
	}

	else if ($_GET["url"] == "creed"){
		$perfumes_controller->creed_selected();
	}

	else if ($_GET["url"] == "victoriasecret"){
		$perfumes_controller->victorias_selected();
	}

	else if ($_GET["url"] == "ysl"){
		$perfumes_controller->ysl_selected();
	}

	else if ($url[0] == "seasons" && !isset($url[1])){
		$users_controller->authenticate(['administrator']);
		$season_controller->index();
	}

	else if ($url[0] == "seasons" && $url[1] == "insert" && !isset($url[2])) {
		$users_controller->authenticate(['administrator']);
		$season_controller->store();
	}

	else if ($url[0] == "seasons" && $url[1] == "update" && !isset($url[2])) {
		$users_controller->authenticate(['administrator']);
		$season_controller->update();
	}

	else if ($url[0] == "seasons" && $url[1] == "delete" && !isset($url[2])) {
		$users_controller->authenticate(['administrator']);
		$season_controller->destroy();
	}

	else if ($url[0] == "user" && $url[1] == "register" && !isset($url[2])) {
		$users_controller->show_register();
	}

	else if ($url[0] == "user" && $url[1] == "do_register" && !isset($url[2])) {
		$users_controller->do_register();
	}

	else if ($url[0] == "user" && $url[1] == "login" && !isset($url[2])) {
		$users_controller->show_login();
	}

	else if ($url[0] == "user" && $url[1] == "do_login" && !isset($url[2])) {
		$users_controller->do_login();
	}

	else if ($url[0] == "user" && $url[1] == "logout" && !isset($url[2])) {
		$users_controller->do_logout();
	}

	else if ($url[0] == "user" && $url[1] == "update" && !isset($url[2])) {
		$users_controller->authenticate(array("administrator"));
		$users_controller->update();
	}
	else if ($url[0] == "user" && $url[1] == "delete" && !isset($url[2])) {
		$users_controller->authenticate(array("administrator"));
		$users_controller->delete();
	}

	else if ($url[0] == "user" && $url[1] == "dashboard" && !isset($url[2])) {
		$users_controller->authenticate(array('seller', 'administrator', 'buyer'));
		$users_controller->show_dashboard();
	}	
	else if ($url[0] == "cart" && isset($url[1]) && $url[1] == "delete" && !isset($url[2])) {
		$users_controller->authenticate(array("buyer"));
		$users_controller->remove_from_cart();
	}


	else if ($url[0] == "no-access" && !isset($url[1])) {
		include "views/no-access.php";
	}

	else{
		include "views/404.php";
	}
	
?>