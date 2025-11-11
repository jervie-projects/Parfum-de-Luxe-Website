<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
$this->render('includes/header'); 
?>

<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-6">
            <div class="image-container">
                <img src="<?php echo "http://localhost/".$data["perfume_image"]; ?>" alt="Image" class="img-fluid fixed-size-image">
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-container">
                <h5>Seller: <?php echo $data["seller_name"]; ?></h5>
                <h5><?php echo $data["perfume_name"]; ?></h5>
                <p><?php echo $data["perfume_description"]; ?></p>
                <p>Good For: <?php echo $data["perfume_gender"]; ?></p>
                <p>Scent type: <?php echo $data["perfume_type"]; ?></p>
                <p>Seasons: <?php 
                $seasons = explode(",", $data["seasons"]);
                echo htmlspecialchars(implode(", ", array_map('trim', $seasons))); ?>
                </p>
                <p>Price: ₱<?php echo $data["perfume_cost"]; ?></p>

                    <?php if (!isset($_SESSION['user'])): ?>
                        <p class="text-danger">You must register/login to proceed with the transaction.</p>
                    <?php elseif ($_SESSION['user']['role'] === 'seller' || $_SESSION['user']['role'] === 'administrator'): ?>
                        <p class="text-muted">Only buyer can purchase a product.</p>
                    <?php else: ?>
                        <a href="<?php $this->url();?>add_to_cart/<?php echo $data['perfume_id'] ?>">
                            <button type="button" class="btn custom-button text-decoration-none"> Add to Cart </button> 
                        </a>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['user']) && ((int)$data['seller_id'] === (int)$_SESSION['user']['id'] || $_SESSION['user']['role'] === 'administrator')): ?>
                        <a href="<?php $this->url(); ?>edit/<?php echo $data['perfume_id']; ?>">
                            <button type="button" class="btn custom-button text-decoration-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8"/>
                                </svg>
                                Edit/Delete Item
                            </button>
                        </a>
                    <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php 

?>

<!-- CHECK OUT OTHER SCENTS -->
<div class="py-4 text-center mt-5">
    <div class="container">
        <h2 class="fs-3 f-mono fw-bold fst-italic mt-2" style="font-family:Parisienne">Explore more</h2>
    </div>
</div>

<div class="container">
  <div class="row row-pb-md">
    <?php
    foreach ($ladies as $choice) {
    ?>
      <div class="col-lg-3 mb-4 text-center">
        <div class="product-entry border h-100 d-flex flex-column">
          <a href="<?php $this->url(); ?>perfume/<?php echo $choice["perfume_id"]; ?>">
            <img src="<?php echo "http://localhost/".$choice["perfume_image"];?>" class="img-fluid" alt="<?php echo $choice["perfume_name"];?>">
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
