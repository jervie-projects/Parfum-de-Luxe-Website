<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
 $this->render('includes/header'); 
?>

<div class="content my-md-4 pt-md-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="fw-bold mb-4 text-center">Register</h3>

                <form method="post" action="<?php $this->url('user/do_register'); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="form_source" value="register">
                    <?php 
                        if (isset($_SESSION["errors"]["user"]["insert"]["database"])): 
                    ?>
                        <div class="text-danger fs-6">Something went wrong. Please contact your administrator*</div>
                    <?php 
                        // Clear the error after displaying it
                        unset($_SESSION["errors"]["user"]["insert"]["database"]);
                        endif; 
                    ?>

                    <div class="mb-3">
                        <?php if (isset($_SESSION["errors"]["user"]["insert"]["first_name"])): 
                            $_SESSION["register_counter"] = true;?>
                            <div class="text-danger fs-6">First name is required *</div>
                        <?php endif; ?>
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" name="first-name" value="<?php echo isset($_POST['first-name']) ? $_POST['first-name'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <?php if (isset($_SESSION["errors"]["user"]["insert"]["last_name"])): 
                            $_SESSION["register_counter"] = true;?>
                            <div class="text-danger fs-6">Last name is required *</div>
                        <?php endif; ?>
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="last-name" value="<?php echo isset($_POST['last-name']) ? $_POST['last-name'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <?php if (isset($_SESSION["errors"]["user"]["insert"]["username"])): 
                            $_SESSION["register_counter"] = true;?>
                            <div class="text-danger fs-6">Username is required *</div>
                        <?php endif; ?>
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" minlength="4" value="<?php echo isset($_POST['username']) ? $_POST['username'] : ''; ?>">
                    </div>

                    <div class="mb-3">
                        <?php if (isset($_SESSION["errors"]["user"]["insert"]["password"])): 
                            $_SESSION["register_counter"] = true;?>
                            <div class="text-danger fs-6">Password is required and must at least:
                                <ul>
                                    <li>be 8 characters</li>
                                    <li>contain one digit</li>
                                    <li>contain one lowercase character</li>
                                    <li>contain one uppercase character</li>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" minlength="8">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" name="role">
                            <option value="seller">Seller</option>
                            <option value="administrator">Administrator</option>
                            <option value="buyer">Buyer</option>
                        </select>
                    </div>

                    <!-- CSRF Token -->
                    <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">

                    <!-- Clear errors after rendering -->
                    <?php 
                        if (isset($_SESSION["errors"]["user"]["insert"])) {
                            unset($_SESSION["errors"]["user"]["insert"]);
                        }
                    ?>

                    <button type="submit" class="btn custom-button text-decoration-none">Submit</button>
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
