<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
  $this->render('includes/header');
?>

<!-- SECOND HEADER -->
<div class="content my-4 pt-1 text-center">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="wcText fst-italic fw-bold" >"Where fragrance meets elegance."</h5>
            </div>
        </div>
    </div>
</div>

<div class="welcomeText py-3 text-center mt-2" >
    <div class="container">
        <p class="wcText fs-6 f-mono fst-italic m-0" style="font-family: Montserrat;">Crafted to golden perfection. From finest ingredients around the world we give you a world of elegance and class. Take a pick of our finest collections from different brands. </p> 
    </div>
</div>

<!-- CAROUSEL -->
<div id="carouselMain" class="carousel slide my-5">
  <div class="carousel-inner">
    <?php 
      $active = 0;
      foreach ($carousel as $carousel) {
    ?>
      <div class="carousel-item <?php if($active == 0){ echo "active";}?> ">
        <div class="container">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-md-6 col-sm-12 my-3 text-center">
              <img src="<?php echo $carousel["perfume_image"];?>" class="rounded img-fluid" alt="image">
            </div>

            <div class="col-md-6 col-sm-12 my-3 text-md-start text-sm-center">
              <p style="font-family:Parisienne"><b>FEATURED</b></p>
              <h3 class="fw-bold" style="font-family:Montserrat"><?php echo $carousel["perfume_name"];?></h3>
              <p style="font-family: Montserrat;"><?php echo $carousel["perfume_description"];?></p>
              <div class="d-flex justify-content-sm-center justify-content-md-start">
                <a class="btn btn-primary custom-button" href="http://localhost/3B-11/dior" role="button">VIEW NOW</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php 
        $active++; 
      } 
    ?>
    
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselMain" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</div>

<!-- CHECK OUT OTHER SCENTS-->
<div class="py-4 text-center mt-5">
    <div class="container">
        <h2 class="fs-3 f-mono fw-bold fst-italic mt-2" style="font-family:Parisienne">Check Out Other Scents</h2>
        <a href="http://localhost/3B-11/shop" role="button" class="btn custom-button text-decoration-none"> Shop Now </a>
    </div>
</div>

<!-- LADIES CHOICE -->
<div class="container">
  <div class="row">
    <div class="col-sm-8 offset-sm-2 text-center my-5">
      <h1 style="font-family:Parisienne;">LADIES CHOICE</h1>
    </div>
  </div>

  <div class="row row-pb-md">
    <?php
    foreach($ladies as $choice){
    ?>
      <div class="col-lg-3 mb-4 text-center">
        <div class="product-entry border h-100 d-flex flex-column">
          <a href="<?php $this->url(); ?>perfume/<?php echo $choice["perfume_id"];?>">
            <img src="<?php echo $choice["perfume_image"];?>" class="img-fluid" alt="<?php echo $choice["perfume_name"];?>">
          </a>
          <div class="desc mt-auto">
            <h2 class="text-black text-decoration-none"><?php echo $choice["perfume_name"];?></h2>
          </div>
        </div>
      </div>
    <?php 
    } 
    ?>
  </div>
</div>


<!-- FOOTER --> 
<?php $this->render('includes/footer');?>

<!-- SCRIPT -->
<!-- OFFLINE -->
<script src="<?php $this->assets('scripts', 'bootstrap.js'); ?>"></script>

</body>
</html>