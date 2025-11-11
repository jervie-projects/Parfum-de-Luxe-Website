<div class="col-lg-3 mb-4 text-center">
    <div class="product-entry border h-100 d-flex flex-column">
      <a href="<?php $this->url();?>/perfume/<?php echo $item["perfume_id"]; ?>">
        <img src="<?php echo "../".$item["perfume_image"];?>" class="img-fluid object-fit-cover h-100 w-100" alt="<?php echo $item["perfume_name"];?>">
      </a>
      <figcaption class="figure-caption text-center fw-bold text-black"><?php echo $item["perfume_name"]; ?></figcaption>
        <figcaption class="figure-caption text-center fw-bold text-black">₱<?php echo $item["perfume_cost"]; ?></figcaption>
    </div>
</div>