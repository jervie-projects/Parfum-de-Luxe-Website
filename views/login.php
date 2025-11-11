<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
$this->render('includes/header'); 
?>

<div class="content my-md-4 pt-md-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="fw-bold mb-4 text-center">Login</h3>

                <form method="post" action="<?php $this->url('user/do_login'); ?>" enctype="multipart/form-data">

                    <?php if(isset($_SESSION["errors"]["user"]["login"])): ?>
                        <div class="text-danger fs-6">Username or password incorrect*</div>
                    <?php endif; ?>

                    <div class="mb-3">
                        <label for="itemName" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>

                    <div class="mb-3">
                        <label for="itemName" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" >
                    </div>

                    <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">

                    <button type="submit" class="btn custom-button text-decoration-none">Submit</button>

                    <?php 
                        if (isset($_SESSION["errors"]["user"]["login"])) {
                            unset($_SESSION["errors"]["user"]["login"]);
                        }
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- FOOTER --> 
<?php $this->render('includes/footer');?>
<!-- SCRIPT -->
<!-- OFFLINE -->
<script src="<?php $this->assets('scripts', 'bootstrap.js'); ?>"></script>

</body>
</html>



