<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
	$this->render('includes/header');
?>

<div class="content my-md-4 pt-md-4 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="fw-bold mb-4 text-center">Add Perfume</h3>
                <form method="post" action="<?php $this->url('perfume/insert'); ?>" enctype="multipart/form-data" id="perfumeForm">
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="perfume-name">
                    </div>
                    <div class="mb-3">
                        <label for="itemDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="perfume-description" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="itemBrand" class="form-label">Brand</label>
                        <select class="form-select" name="perfume-brand" aria-label="Default select example">
                            <option selected value="Creed">Creed</option>
                            <option value="Dior">Dior</option>
                            <option value="Victorias Secret">Victoria's Secret</option>
                            <option value="YSL">YSL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="scentType" class="form-label">Scent Type</label>
                        <select class="form-select" name="perfume-type" aria-label="Default select example">
                            <option selected value="Strong">Strong</option>
                            <option value="Moderately Strong">Moderately Strong</option>
                            <option value="Weak">Weak</option>
                            <option value="Moderately Weak">Moderately Weak</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="genderType" class="form-label">Gender Type</label>
                        <select class="form-select" name="perfume-gender" aria-label="Default select example">
                            <option selected value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="seasons">Seasons</label>
                        <?php foreach($seasons as $season):?>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="seasons[]" value="<?php echo $season['season_id'] ?>">
                              <label class="form-check-label">
                                  <?php echo $season["season"]; ?>
                              </label>
                            </div> 
                        <?php endforeach ?> 
                    </div>

                    <div class="mb-3">
                        <label for="imageUpload" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" name="perfume-image" accept=".png,.jpg,.jpeg">
                    </div>
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Cost(in ₱)</label>
                        <input type="number" class="form-control" step="1" name="perfume-cost" min="0">
                    </div>

                    <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">

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
<script src="<?php $this->assets('scripts', 'add-perfume_season-validation.js'); ?>"></script>

</body>
</html>