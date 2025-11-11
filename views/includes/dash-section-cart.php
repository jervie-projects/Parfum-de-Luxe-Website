<div id="my_perfumes" class="section">
    <div class="container">
    	<?php
			if (isset($_SESSION["success"]["cart"])):
			    if (isset($_SESSION["success"]["cart"]["delete"])) {
			        $msg = "Deleted item successfully";
			    }
			    ?>

			    <!-- Success Modal -->
			    <div class="modal fade" id="successCartModal" tabindex="-1" aria-labelledby="successCartModalLabel" aria-hidden="true">
			        <div class="modal-dialog modal-dialog-centered">
			            <div class="modal-content">
			                <div class="modal-header">
			                    <h5 class="modal-title" id="successCartModalLabel">Success</h5>
			                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			                </div>
			                <div class="modal-body">
			                    <strong><i class="fa fa-check-circle me-2" aria-hidden="true"></i></strong>
			                    <?php echo $msg; ?>
			                </div>
			                <div class="modal-footer">
			                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
			                </div>
			            </div>
			        </div>
			    </div>

			    <script>
			        document.addEventListener('DOMContentLoaded', function () {
			            var successCartModal = new bootstrap.Modal(document.getElementById('successCartModal'));
			            successCartModal.show();
			        });
			    </script>

			    <?php
			    unset($_SESSION["success"]["cart"]);
			endif;
			?>

        <div class="row">
            <div class="col">
                <h1 class="pg-header">
                    My Cart
                </h1>
            </div>
            <?php if(!empty($cart_items)): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Name</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Type</th>
                            <th scope="col">Price</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($cart_items as $cart_item): ?>
					    <tr>
					        <td><img src="<?php echo str_replace("..", "", $cart_item["perfume_image"]); ?>" alt="<?php echo $cart_item["perfume_name"]; ?>" class="dash-perfume-img"></td>
					        <td><?php echo $cart_item["perfume_name"]; ?></td>
					        <td><?php echo $cart_item["perfume_brand"]; ?></td>
					        <td><?php echo $cart_item["perfume_type"]; ?></td>
					        <td><?php echo $cart_item["perfume_cost"]; ?></td>
					        <td>
					            <div class="d-flex justify-content-center">
					                <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#delete-cart-modal-<?php echo $cart_item["perfume_user_id"]; ?>">
					                    Remove
					                </button>
					            </div>
					            <div class="modal fade" id="delete-cart-modal-<?php echo $cart_item["perfume_user_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
					                <div class="modal-dialog">
					                    <div class="modal-content">
					                        <div class="modal-header">
					                            <h1 class="modal-title fs-5">Remove from cart</h1>
					                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					                        </div>
					                        <div class="modal-body">
					                            Remove <?php echo $cart_item["perfume_name"]; ?>?
					                            <form action="<?php $this->url('cart/delete'); ?>" method="POST" class="mx-1" id="delete-cart-<?php echo $cart_item["perfume_user_id"]; ?>">
					                                <input type="hidden" name="perfume_user_id" value="<?php echo $cart_item["perfume_user_id"]; ?>">
					                                <input type="hidden" name="from-dashboard" value="true">
					                            </form>
					                        </div>
					                        <div class="modal-footer">
					                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					                            <button type="submit" form="delete-cart-<?php echo $cart_item["perfume_user_id"]; ?>" class="btn btn-danger">Remove</button>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </td>
					    </tr>
					<?php endforeach; ?>

                    </tbody>
                </table>
            <?php else: ?>
                <p>Cart is empty.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
