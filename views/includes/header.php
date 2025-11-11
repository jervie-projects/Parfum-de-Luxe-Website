<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parfum De Luxe</title>

    <!-- LOGO -->
    <link rel="icon" href="<?php $this->assets('images', 'logo-icon.jpg'); ?>">

    <!-- CSS (BOOTSTRAP) -->
    <link rel="stylesheet" href="<?php $this->assets('styles', 'bootstrap.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php $this->assets('styles', 'styles.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php $this->assets('styles', 'cartStyle.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php $this->assets('styles', 'overlay.css'); ?>">

</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg py-3">
        <div class="container">
            <a class="navbar-brand" href="<?php $this->url('home'); ?>">
                <img src="<?php $this->assets('images', 'logo-icon.jpg'); ?>" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                Parfum de Luxe
            </a>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0 black-links text-center">
                    <li class="nav-item mx-3 rounded"><a class="nav-link" href="<?php $this->url('home'); ?>">Home</a></li>
                    <li class="nav-item mx-3 rounded"><a class="nav-link" href="<?php $this->url('shop'); ?>">Shop</a></li>
                    <li class="nav-item mx-3 rounded"><a class="nav-link" href="<?php $this->url('aboutus'); ?>">About Us</a></li>

                    <?php if (isset($_SESSION['user'])): ?>
                        <li class="nav-item mx-1 rounded"><a class="nav-link" id="menu-toggle" href="#">Me</a></li>
                    <?php else: ?>
                        <li class="nav-item mx-3 rounded"><a class="nav-link" href="<?php $this->url('user/register'); ?>">Register</a></li>
                        <li class="nav-item mx-3 rounded"><a class="nav-link" href="<?php $this->url('user/login'); ?>">Login</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="overlay"></div>

    <?php if (isset($_SESSION['user'])): ?>
        <div class="sidebar" id="sidebar">
            <br><br>
            <h4 class="figure-caption text-center fw-bold fst-italic">
                <?php echo htmlspecialchars($_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name']); ?><br>
                <?php echo htmlspecialchars($_SESSION['user']['role']); ?>
            </h4> 
            <a href="<?php $this->url('user/dashboard'); ?>">Dashboard</a><br> 
            
            <?php if ($_SESSION['user']['role'] === 'buyer'): ?>
                <a href="<?php $this->url('cart'); ?>">Cart</a><br>
            <?php endif; ?>

            <a href="<?php $this->url('user/logout'); ?>">Logout</a>
        </div>
    <?php endif; ?>

    <!-- Scripts -->
    <script src="<?php $this->assets('bootstrap/js', 'bootstrap.js'); ?>"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const menuToggle = document.getElementById('menu-toggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.querySelector('.overlay');

            menuToggle.addEventListener('click', function (event) {
                sidebar.classList.toggle('show');
                overlay.style.display = sidebar.classList.contains('show') ? 'block' : 'none';
                document.body.classList.toggle('blur');
                event.preventDefault();
            });

            document.addEventListener('click', function (event) {
                const isClickInside = sidebar && (sidebar.contains(event.target) || menuToggle.contains(event.target));
                if (!isClickInside && sidebar) {
                    sidebar.classList.remove('show');
                    overlay.style.display = 'none';
                    document.body.classList.remove('blur');
                }
            });
        });
    </script>
</body>
</html>
