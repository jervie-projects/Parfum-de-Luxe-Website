<?php
$this->render('model/perfume-model');

if(isset($_GET['id'])){
	$query = $perfume_model->delete_perfume($_GET['id']);

    if ($query) {
        $this->redirect('home');
        exit();
    } else {
        echo "<center><div class='alert alert-danger' role='alert'>Error deleting Perfume. Please try again.</div></center>";
    }
} else {
    echo "<center><div class='alert alert-danger' role='alert'>No ID provided for deletion.</div></center>";
}
?>