<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
	$this->render('includes/header');
?>

<div class="content my-md-4 pt-md-4 mt-5">
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="fw-bold mb-4 text-center">Sign In</h3>
            <form>
              	<div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <textarea class="form-control" id="email" rows="3"></textarea>
                </div> 
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <textarea class="form-control" id="recipeDescription" rows="3"></textarea>
                </div>
                <button type="submit" class="btn custom-button text-decoration-none">Sign In</button>
            </form>
        </div>
    </div>
</div>
</div>

<div class="content my-md-4 pt-md-4 mt-5">
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h3 class="fw-bold mb-4 text-center">Create Account</h3>
            <form>
                <div class="mb-3">
                    <label for="userName" class="form-label">Username</label>
                    <input type="text" class="form-control" id="userName">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <textarea class="form-control" id="recipeDescription" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <textarea class="form-control" id="email" rows="3"></textarea>
                </div> 
                <button type="submit" class="btn custom-button text-decoration-none">Register</button>
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