<?php 
	require_once "base-controller.php";
	class UsersController extends BaseController{

		private $model;

		function __construct(){
			require_once "model/users-model.php";
			require_once "model/perfume-model.php";
			require_once "model/season-model.php";
			$this->users_model = new Users();
			$this->perfume_model = new Perfumes();
			$this->season_model = new Seasons();
		}

		function show_register(){
			$csrfToken = $this->generateCSRFToken("register_form");
			include "views/register.php";
		}

		function do_register() {
		    if (!$this->verifyCSRFToken("register_form")) {
		        die("CSRF validation failure");
		    }

		    $formSource = $_POST['form_source'] ?? '';

		    if ($this->users_model->add_users()) {
		        $_SESSION["success"]["user"]["insert"] = true;

		        // Redirect based on form source
		        if ($formSource === 'register') {
		            $this->redirect('user/login');
		        } else {
		            $this->redirect('user/dashboard#users');
		        }
		        exit;
		    } else {
		        // Redirect on error
		        if ($formSource === 'register') {
		            $this->redirect('user/register');
		        } else {
		            $this->redirect('user/dashboard#users');
		        }
		        exit;
		    }
		}


		function show_login(){
			$csrfToken = $this->generateCSRFToken("login_form");
			include "views/login.php";
		}

		function do_login() {
		    if (!$this->verifyCSRFToken("login_form")) {
		        die("CSRF validation failure");
		    }

		    $result = $this->users_model->log_user_in();

		    if ($result) {
		        $_SESSION['user']['first_name'] = $result["first_name"];
		        $_SESSION['user']['last_name'] = $result["last_name"];
		        $_SESSION['user']['id'] = $result["user_id"];
		        $_SESSION['user']['role'] = $result["role"];

		        $this->redirect('user/dashboard');
		    } else {
		        $_SESSION["errors"]["user"]["login"] = "Username or Password incorrect";
		        $this->redirect('user/login');
		    }
		    exit();
		}



		function authenticate($roles){
			if(!in_array($_SESSION['user']['role'], $roles)){
				$this->redirect('no-access');
				die();
			}
			else {
				return true;
			}
		}	

		function do_logout(){
			session_destroy();
			$this->redirect('home');

		}

		function show_dashboard(){
			$seasons = $this->season_model->get_season();
			
			if($_SESSION['user']['role'] == "administrator"){
				$perfumes = $this->perfume_model->get_all_perfumes();
				$users = $this->users_model->get_all_users();
			}

			if($_SESSION['user']['role'] == "seller"){
				$perfumes = $this->perfume_model->get_perfumes_by("user_id", $_SESSION['user']['id']);
			}

			if($_SESSION['user']['role'] == "buyer"){
				$cart_items = $this->users_model->get_cart_items();
			}

			include "views/includes/admin-header.php";
			include "views/dashboard-".$_SESSION['user']['role'].".php";
			include "views/includes/admin-footer.php";
		}

		function update(){

			if (!$this->verifyCSRFToken("edit-user-".$_POST["user_id"])) {
		        die("CSRF validation failure");
		    }

			if($this->users_model->update($_POST["user_id"])){
				$_SESSION["success"]["user"]["update"] = true;
			}

			$this->redirect("/user/dashboard#users");
		}

		function delete(){
			if (!$this->verifyCSRFToken("delete-user-".$_POST["user_id"])) {
		        die("CSRF validation failure");
		    }

			if($this->users_model->destroy()){
				$_SESSION["success"]["user"]["delete"] = true;
				$this->redirect('user/dashboard#users');
/*				header("Location:http://localhost/3B-11/user/dashboard#users");*/
			}else{
				$this->redirect("user/dashboard");
			}

		}

		function remove_from_cart(){
			$this->verifyCSRFToken("delete-cart-".$_POST["perfume_user_id"]);

			if($this->users_model->remove_cart()){
				$_SESSION["success"]["cart"]["delete"] = true;
				$this->redirect("user/dashboard");
			}
		}
}
?>

