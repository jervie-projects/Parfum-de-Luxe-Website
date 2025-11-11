<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
 $this->render('includes/header'); 
?>

<div class="container-fluid justify-content-start m-5" style="font-family: PoppinsBold;">
	<h4><?php echo $msg; ?></h4>
</div>

<!-- CRUD -->
<div class="container my-md-5 pt-md-5 text-white">
    <div class="row">
        <div class="col-md-3 text">
            <div class="input-group mb-3">
                <form class="d-flex" role="search" action="<?php $this->url('search'); ?>" method="GET">
                <input type="text" id="searchInput" class="form-control" name="term" placeholder="Search for items..." aria-label="Search for recipes" aria-describedby="button-addon2">

                <button class="btn btn-outline-secondary btn-color" type="submit" id="button-addon2">Search</button>
              </form>
            </div>
        </div>

		<div class="container my-5">        
	    	<div class="row row-pb-md">
	    		<?php if(!empty($results)){ 
					foreach ($results as $item) {
						include "includes/list-item.php";
					}
				} else {?>
					<h4 class="text-black"><?php echo "<p>Please enter other words.</p>"; ?></h4>
				<?php } ?>
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

