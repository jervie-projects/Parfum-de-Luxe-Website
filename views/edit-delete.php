<!-- HEADER -->
<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
    $this->render('includes/header');
?>

<div class="content my-md-4 pt-md-4 mt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <h3 class="fw-bold mb-4 text-center">Edit Perfume</h3>
                <form method="POST" action="<?php $this->url();?>update/<?php echo $id; ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="itemName" class="form-label">Name</label>
                        <input type="text" class="form-control" name="perfume-name" value="<?php echo isset($clothes['perfume_name']) ? htmlspecialchars($clothes['perfume_name']) : ''; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="itemDescription" class="form-label">Description</label>
                        <textarea class="form-control" name="perfume-description" rows="3"><?php echo isset($clothes['perfume_description']) ? htmlspecialchars($clothes['perfume_description']) : ''; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="itemBrand" class="form-label">Brand</label>
                            <select class="form-select" name="perfume-brand" aria-label="Default select example">
                                <option value="Creed" <?php echo (isset($clothes['perfume_brand']) && $clothes['perfume_brand'] == 'Creed') ? 'selected' : ''; ?>>Creed</option>
                                <option value="Dior" <?php echo (isset($clothes['perfume_brand']) && $clothes['perfume_brand'] == 'Dior') ? 'selected' : ''; ?>>Dior</option>
                                <option value="Victorias Secret" <?php echo (isset($clothes['perfume_brand']) && $clothes['perfume_brand'] == 'Victorias Secret') ? 'selected' : ''; ?>>Victoria's Secret</option>
                                <option value="YSL" <?php echo (isset($clothes['perfume_brand']) && $clothes['perfume_brand'] == 'YSL') ? 'selected' : ''; ?>>YSL</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="scentType" class="form-label">Scent Type</label>
                            <select class="form-select" name="perfume-type" aria-label="Default select example">
                                <option value="Strong" <?php echo (isset($clothes['perfume_type']) && $clothes['perfume_type'] == 'Strong') ? 'selected' : ''; ?>>Strong</option>
                                <option value="Moderately Strong" <?php echo (isset($clothes['perfume_type']) && $clothes['perfume_type'] == 'Moderately Strong') ? 'selected' : ''; ?>>Moderately Strong</option>
                                <option value="Weak" <?php echo (isset($clothes['perfume_type']) && $clothes['perfume_type'] == 'Weak') ? 'selected' : ''; ?>>Weak</option>
                                <option value="Moderately Weak" <?php echo (isset($clothes['perfume_type']) && $clothes['perfume_type'] == 'Moderately Weak') ? 'selected' : ''; ?>>Moderately Weak</option>
                            </select>
                    </div>
                    <div class="mb-3">
                        <label for="genderType" class="form-label">Gender Type</label>
                            <select class="form-select" name="perfume-gender" aria-label="Default select example">
                                <option value="Male" <?php echo (isset($clothes['perfume_gender']) && $clothes['perfume_gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                                <option value="Female" <?php echo (isset($clothes['perfume_gender']) && $clothes['perfume_gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                            </select>
                    </div>

                    <div class="mb-3">
                        <label for="seasons">Seasons</label>
                        <?php 
                        $perfume_season = explode(", " ,$clothes['seasons']);
                        ?>

                        <?php foreach($seasons as $season):?>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="seasons[]" value="<?php echo $season['season_id'] ?>"

                              <?php if(in_array($season["season"], $perfume_season)):?>
                                checked
                            <?php endif ?>
                              >
                              <label class="form-check-label">
                                  <?php echo $season["season"]; ?>
                              </label>
                            </div> 
                        <?php endforeach ?> 

                    </div>

                    <div class="mb-3">
                        <label for="itemName" class="form-label">Cost(in ₱)</label>
                        <input type="text" class="form-control" name="perfume-cost" value="<?php echo isset($clothes['perfume_cost']) ? htmlspecialchars($clothes['perfume_cost']) : ''; ?>">
                    </div>

                    <input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>">
                    <div class="d-flex justify-content-between mt-4">
                        <button type="submit" class="btn btn-primary custom-button">Submit</button>
                    </div>
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
