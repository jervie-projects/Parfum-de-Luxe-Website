<link rel="stylesheet" type="text/css" href="<?php $this->assets('styles', 'dashboard.css'); ?>">

<div class="container-fluid h-100">
    <div class="row h-100">
        <!-- Sidebar -->
        <div class="col-md-2 dash-sidebar text-center d-flex flex-column h-100 py-3 position-fixed">
            <img src="<?php $this->assets('images', 'logo-icon.jpg'); ?>" alt="" class="dash-logo img-fluid d-block m-auto">
            <div class="dash-nav flex-fill mt-3 d-flex justify-content-between flex-column text-start">
                <ul class="list-unstyled">
                    <li><i class="fa fa-book" aria-hidden="true"></i> <a href="#perfumes">My Perfumes</a></li>
                    <li><i class="fa fa-long-arrow-left" aria-hidden="true"></i> <a href="http://localhost/3B-11/home">Visit Site</a></li>
                </ul>
                <ul class="list-unstyled">
                    <li><i class="fa fa-sign-out" aria-hidden="true"></i> <a href="http://localhost/3B-11/user/logout">Log Out</a></li>
                </ul>
            </div>
        </div>

        <!-- Spacer for sidebar -->
        <div class="col-md-2"></div>

        <!-- Main Content -->
        <div class="col-md-10 dash-main">
            <?php
                include "includes/dash-section-perfumes.php"; 
            ?>
        </div>
    </div>
</div>
