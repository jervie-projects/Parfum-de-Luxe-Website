<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>); display: flex; flex-direction: column; min-height: 100vh;">
    <?php 
        $this->render('includes/header');

        if (isset($_GET['modal']) && $_GET['modal'] == 'true') {
            echo '<script type="text/javascript">
                    window.onload = function() {
                        var myModal = new bootstrap.Modal(document.getElementById("alreadyAddedModal"), {});
                        myModal.show();
                    };
                  </script>';
        }
    ?>

    <section class="flex-grow-1">
      <div class="container">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col">
            <p><span class="h2">Shopping Cart </span><span class="h4">(<?php echo is_array($result) ? count($result) : 0; ?> item(s) in your cart)</span></p>

            <div class="card mb-4">
              <div class="card-body p-4">
                <div class="container">
                  <?php 
                  if (is_array($result)) {
                      $totalCost = 0;

                      foreach ($result as $cart) { 
                        if (is_array($cart) && isset($cart["perfume_image"], $cart["perfume_name"], $cart["perfume_brand"], $cart["perfume_type"], $cart["perfume_cost"], $cart["perfume_id"])) {
                          $perfumeCost = intval(floatval($cart["perfume_cost"])); 
                          $totalCost += $perfumeCost * $cart["quantity"];
                  ?>

                  <form action="<?php $this->url('add_quantity'); ?>" method="post">
                    <div class="row align-items-center mb-4 text-center text-md-start">
                        <div class="col-12 col-md-2 mb-2 mb-md-0">
                            <img src="<?php echo $cart["perfume_image"]; ?>" class="img-fluid" alt="image">
                        </div>

                        <div class="col-12 col-md-2 mb-2 mb-md-0">
                            <p class="small text-muted mb-2">Name</p>
                            <p class="lead fw-normal mb-0"><?php echo $cart["perfume_name"]; ?></p>
                        </div>

                        <div class="col-12 col-md-1 mb-2 mb-md-0">
                            <p class="small text-muted mb-2">Brand</p>
                            <p class="lead fw-normal mb-0"><?php echo $cart["perfume_brand"]; ?></p>
                        </div>

                        <div class="col-12 col-md-1 mb-2 mb-md-0">
                            <p class="small text-muted mb-2">Type</p>
                            <p class="lead fw-normal mb-0"><?php echo $cart["perfume_type"]; ?></p>
                        </div>

                        <div class="col-12 col-md-1 mb-2 mb-md-0">
                            <p class="small text-muted mb-2">Price</p>
                            <p class="lead fw-normal mb-0">P<?php echo number_format($perfumeCost); ?></p>
                        </div>

                    <div class="col-12 col-md-1 mb-2 mb-md-0">
                        <p class="small text-muted mb-2">Quantity</p>
                        <form action="<?php $this->url('add_quantity'); ?>" method="post" style="display: inline;">
                            <input type="hidden" name="perfume_id" value="<?php echo $cart['perfume_id']; ?>">
                            <input type="number" name="quantity" min="1" value="<?php echo $cart['quantity']; ?>" class="form-control" onchange="this.form.submit(); updateTotal(this, <?php echo floatval($cart['perfume_cost']); ?>)">
                        </form>
                    </div>


                        <div class="col-12 col-md-2 mb-2 mb-md-0">
                            <p class="small text-muted mb-2">Total</p>
                            <h6 class="mb-0 item-total">P<?php echo number_format($cart['quantity'] * $perfumeCost); ?></h6>
                        </div>

                        <div class="col-12 col-md-2">
                            <p class="small text-muted mb-2">Action</p>
                            <form action="<?php $this->url('do_delete_from_cart'); ?>" method="get" style="display: inline;">
                                <input type="hidden" name="perfume_id" value="<?php echo $cart['perfume_id']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to remove this item from your cart?')">Delete</button>
                            </form>
                        </div>
                    </div>

                  </form>

                  <?php 
                        }
                      }
                  } else {
                    echo "<p>No items in the cart.</p>";
                  } 
                  ?>
                </div>
              </div>
            </div>
              <div class="d-flex justify-content-end">
                  <h5 class="me-3">Grand Total: <span id="grandTotal">P<?php echo number_format($totalCost); ?></span></h5>
                  <a href="<?php $this->url('shop'); ?>">
                      <button type="button" class="btn custom-button text-decoration-none">
                          Continue Shopping
                      </button>
                  </a>
              </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="alreadyAddedModal" tabindex="-1" aria-labelledby="alreadyAddedModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="alreadyAddedModalLabel">Already Added</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p>This item is already in the cart.</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

    <!-- FOOTER --> 
    <footer style="margin-top:auto;">
        <?php $this->render('includes/footer');?>
    </footer>
    
    <script src="<?php $this->assets('scripts', 'bootstrap.js'); ?>"></script>

<script>
    function updateTotal(input, pricePerUnit) {
        const quantity = parseInt(input.value);
        const total = quantity * pricePerUnit;
        const totalField = input.closest('.row').querySelector('.item-total');
        totalField.innerText = 'P' + total.toLocaleString();
        
        updateGrandTotal();
    }

    function updateGrandTotal() {
        let grandTotal = 0;
        document.querySelectorAll('.item-total').forEach(item => {
            const itemPrice = parseFloat(item.innerText.replace('P', '').replace(/,/g, ''));
            grandTotal += itemPrice;
        });
        document.getElementById('grandTotal').innerText = 'P' + grandTotal.toLocaleString();
    }
</script>

</body>
