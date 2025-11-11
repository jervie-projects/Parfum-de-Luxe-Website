<?php 
	require_once "base-controller.php";
	class SeasonController extends BaseController{

		private $model;

		function __construct(){
			require_once "model/season-model.php";
			$this->model = new Seasons();
		}

		function index(){
			$csrfToken = $this->generateCSRFToken("season");
			$season = $this->model->get_season();
			include "views/seasons.php";
		}

		function store() {
			if (!$this->verifyCSRFToken("season")) {
		        die("CSRF validation failure");
		    }

		    $results = $this->model->add_season();

		    if ($results) {
		    	$_SESSION["success"]["season"]["insert"] = true;
		    	$this->redirect('user/dashboard');
		    } else {
		    	$this->redirect('user/dashboard');
/*		        header("Location: http://localhost/3B-11/user/dashboard");*/
		    }
		}


		function update(){
			if (!$this->verifyCSRFToken('season-' . $_POST["season_id"])) {
		        die("CSRF validation failure");
		    }

			if(!empty($_POST)){
				$results = $this->model->update_season($_POST["season_id"]);

				if($results){
					$_SESSION["success"]["season"]["update"] = true;
					$this->redirect('user/dashboard#seasons');
/*					header("Location: http://localhost/3B-11/user/dashboard#seasons");*/
				}else{
					$this->redirect('user/dashboard#seasons');
/*			        header("Location: http://localhost/3B-11/user/dashboard#seasons");*/
				}
			}
		}

		function destroy(){

			if(!$this->verifyCSRFToken('delete-category-' . $_POST["season_id"])){
				die("CSRF validation failure");
			};

			$results = $this->model->delete_season($_POST['season_id']);
			
			if($results){
				$_SESSION["success"]["season"]["delete"] = true;
				$this->redirect('user/dashboard#seasons');
/*				header("Location:http://localhost/3B-11/user/dashboard#seasons");*/
			}else{
				$this->redirect('home');
/*		        header("Location: http://localhost/3B-11/home");*/
			}
		}
}
?>

