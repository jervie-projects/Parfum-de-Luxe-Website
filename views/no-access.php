<?php
    require_once "controller/base-controller.php"; 
    $base = new BaseController();
?>
<body style="background-image: url(<?php $base->assets('images/site-background', 'bg.jpg'); ?>);">
<?php 
    $base->render('includes/header');
?>
<div class="content my-md-5 pt-md-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="fst-italic fw-bold mb-4 text-center">You lack permission to access this page.</h1>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php $base->render('includes/footer'); ?>

<!-- SCRIPT -->
<script src="<?php $base->assets('scripts', 'bootstrap.js'); ?>"></script>
</body>
</html>