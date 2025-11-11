<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">

<?php 
$this->render('includes/header');
?>

<!-- CRUD -->
<div class="container my-md-5 pt-md-5">
    <div class="row text-center text-md-start">
        <div class="col-12 col-md-5 mb-3 mb-md-0">
            <h1 class="fst-italic fw-bold text-center" style="font-family:Parisienne;">YSL</h1>
        </div>

        <div class="col-12 col-md-3 mb-3 mb-md-0">
            <div class="d-flex justify-content-center justify-content-md-start">
                <form class="d-flex" role="search" action="<?php $this->url('search'); ?>" method="GET">
                    <input type="text" id="searchInput" class="form-control me-2" name="term" placeholder="Search for items..." aria-label="Search for items" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary btn-color" type="submit" id="button-addon2">Search</button>
                </form>
            </div>
        </div>

        <div class="col-12 col-md-2 text-center text-md-start">
            <a href="<?php $this->url('add');?>">
                <button type="button" class="btn" id="buttonColor">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"></path>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"></path>
                    </svg>
                    Add Item
                </button>
            </a>
        </div>
    </div>
</div>

<!-- PRODUCTS -->
<div class="items mt-5">
    <div class="container">
        <div class="row">
        	<?php 
        		foreach ($ysl as $ysl) {
        	?>
        	<div class="col-lg-3 mb-4 text-center">
        <div class="product-entry border h-100 d-flex flex-column">
          <a href="<?php $this->url();?>perfume/<?php echo $ysl["perfume_id"]; ?>">
            <img src="<?php echo $ysl["perfume_image"];?>" class="img-fluid" alt="<?php echo $ysl["perfume_name"];?>">
          </a>
          <div class="desc mt-auto">
            <h2 class="text-black text-decoration-none"><?php echo $ysl["perfume_name"];?></h2>
          </div>
        </div>
      </div>
           	<?php 
    			} 
    		?>
        </div>
    </div>
</div>

<!-- SHOP -->
<div class="container text-center mt-5">
    <h2 class="fst-italic fw-bold" style="font-family:Parisienne">Check out other brands</h2>
</div>

<!-- CAROUSEL -->
<div id="carouselExampleDark" class="carousel carousel-dark slide my-2">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="2000">
            <a href="<?php $this->url('creed'); ?>">
                <img src="<?php $this->assets('images','creed-logo.png'); ?>" class="d-block mx-auto mt-5 carousel-image" alt="Creed">
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?php $this->url('dior'); ?>">
                <img src="<?php $this->assets('images','dior-logo.png'); ?>" class="d-block mx-auto mt-5 carousel-image" alt="Dior">
            </a>
        </div>
        <div class="carousel-item">
            <a href="<?php $this->url('victoriasecret'); ?>">
                <img src="<?php $this->assets('images','victorias-logo.png'); ?>" class="d-block mx-auto mt-5 carousel-image" alt="VictoriaS">
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