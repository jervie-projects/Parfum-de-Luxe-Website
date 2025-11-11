<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">

<?php 
$this->render('includes/header'); ?>
?>

<!-- SHOP -->
<div class="container text-center mt-5">
    <h2 class="fst-italic fw-bold" style="font-family:Parisienne">SHOP</h2>
</div>

<!-- CAROUSEL -->
<div id="carouselExampleDark" class="carousel carousel-dark slide my-4">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <a href="<?php $this->url('creed'); ?>">
                <img src="<?php $this->assets('images','creed-logo.png'); ?>" class="d-block mx-auto mt-5 carousel-image" alt="Creed">
            </a>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <a href="<?php $this->url('dior'); ?>">
                <img src="<?php $this->assets('images','dior-logo.png'); ?>" class="d-block mx-auto mt-5 carousel-image" alt="Dior">
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?php $this->url('victoriasecret'); ?>">
                <img src="<?php $this->assets('images','victorias-logo.png'); ?>" class="d-block mx-auto mt-5 carousel-image" alt="VictoriaS">
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?php $this->url('ysl'); ?>">
                <img src="<?php $this->assets('images','ysl-logo.png'); ?>" class="d-block mx-auto mt-5 carousel-image" alt="YSL">
            </a>
        </div>
    </div>

    <!-- CAROUSEL BUTTON -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
    </button>
</div>

<!-- FOOTER --> 
<?php $this->render('includes/footer');?>

<!-- SCRIPT -->
<!-- OFFLINE -->
<script src="<?php $this->assets('scripts', 'bootstrap.js'); ?>"></script>

</body>
</html>