<?php 
	require_once "base-controller.php";
	class PerfumeController extends BaseController{

		private $model;

		function __construct(){
			require_once "model/perfume-model.php";
			require_once "model/season-model.php";
			$this->model = new Perfumes();
			$this->season_model = new Seasons();
		}

		function index(){
			$carousel = $this->model->get_all_carousel();
			$ladies = $this->model->get_all_ladiesChoice();

			include "views/home.php";
		}

		function create(){
			$csrfToken = $this->generateCSRFToken("add_form");
			$seasons = $this->season_model->get_season();
			include "views/add.php";
		}

		function store() {
		    if (!$this->verifyCSRFToken("add_form")) {
		        die("CSRF validation failure");
		    }

		    $query = $this->model->add_perfume();

		    if ($query) {
		        $_SESSION["success"]["perfume"]["insert"] = true;
		        $this->redirect('user/dashboard');
/*		        header("Location: http://localhost/3B-11/user/dashboard");*/
		        exit();
		    } else {
		    	$this->redirect('user/dashboard');
/*		        header("Location: http://localhost/3B-11/user/dashboard");*/
		        exit();
		    }
		}


		function edit($id) { 
			$csrfToken = $this->generateCSRFToken("edit_form-".$id);
		    $clothes = $this->model->get_perfume($id);
		        
		    $seasons = $this->season_model->get_season();

		    include "views/edit-delete.php";
		}



		function update($id){
			if (!$this->verifyCSRFToken("edit_form-".$id)) {
		        	die("CSRF validation failure");
		    	}
			
			 $results = $this->model->update_perfume($id);

			 	if($results){
			 		$_SESSION["success"]["perfume"]["update"] = true;
			 		$this->redirect('user/dashboard');
/*					header("Location: http://localhost/3B-11/user/dashboard");*/
					exit();
			     }else{
			     	$this->redirect('user/dashboard');
/*			     	header("Location: http://localhost/3B-11/user/dashboard");*/
			     }
			}



		function show($id){
		        $data = $this->model->get_perfume($id);
		        $ladies = $this->model->get_all_ladiesChoice();

		        if ($data) {
			        include "views/item-template.php";
			    } else {
			        include "views/404.php";
			    }
		}

		function destroy($id){
			if (!$this->verifyCSRFToken("delete-perfume-".$id)) {
		        	die("CSRF validation failure");
		    	}
			$query = $this->model->delete_perfume($id);

		    if ($query) {
		    	$_SESSION["success"]["perfume"]["delete"] = true;
		    	$this->redirect('user/dashboard');
/*		        header("Location: http://localhost/3B-11/user/dashboard");*/
		        exit();
		    } else {
		        echo "<center><div class='alert alert-danger' role='alert'>Error deleting Perfume. Please try again.</div></center>";
		    }

		    include "views/delete.php";
		}

		function search($term){
			$msg = "Search results for: " .$term;
			
			$results = $this->model->search_perfume($term);

			if (empty($results)){
					$msg = "No results found.";
			}

			include "views/search.php";
		}

		function shop(){
			include "views/shop.php";
		}

		function about_us(){
			include "views/about-us.php";
		}

		function dior_selected(){
			$dior = $this->model->select_by_brand('Dior');
			include "views/item-select-dior.php";

		}

		function creed_selected(){
			$creed = $this->model->select_by_brand('Creed');
			include "views/item-select-creed.php";
		}

		function victorias_selected(){
			$vict = $this->model->select_by_brand('Victorias Secret');
			include "views/item-select-victorias.php";
		}

		function ysl_selected(){
			$ysl = $this->model->select_by_brand('YSL');
			include "views/item-select-ysl.php";
		}
}

?>



