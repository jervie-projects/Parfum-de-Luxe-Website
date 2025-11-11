<div id="perfumes" class="section">
	<div class="container">

	<?php if (isset($_SESSION["success"]["perfume"])): ?>
	    <?php
	        if (isset($_SESSION["success"]["perfume"]["insert"])) {
	            $msg = "Successfully added a new perfume";
	        }

	        if (isset($_SESSION["success"]["perfume"]["update"])) {
	            $msg = "Successfully updated perfume";
	        }

	        if (isset($_SESSION["success"]["perfume"]["delete"])) {
	            $msg = "Deleted perfume successfully";
	        }
	    ?>
	    
	    <!-- Success Modal -->
	    <div class="modal fade" id="successUserModal" tabindex="-1" aria-labelledby="successUserModalLabel" aria-hidden="true">
	        <div class="modal-dialog modal-dialog-centered">
	            <div class="modal-content">
	                <div class="modal-header">
	                    <h5 class="modal-title" id="successUserModalLabel">Success</h5>
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
	        document.addEventListener("DOMContentLoaded", function() {
	            var successModal = new bootstrap.Modal(document.getElementById("successUserModal"));
	            successModal.show();
	        });
	    </script>

	    <?php unset($_SESSION["success"]["perfume"]); ?>
	<?php endif; ?>


		<div class="row">
			<div class="col">
				<h1 class="pg-header">
					Perfume
				</h1>
			</div>
			<?php if($_SESSION["user"]["role"] == "seller"):?>
				<div class="col d-flex justify-content-end align-items-center">
					<div>
						<button type="button" class="btn btn-primary custom-button" data-bs-toggle="modal" data-bs-target="#add-perfume-modal">
							Add Perfume
						</button>

						<div class="modal fade" id="add-perfume-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="staticBackdropLabel">Add Perfume</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form enctype="multipart/form-data" action="<?php $this->url('perfume/insert'); ?>" method="POST" class="perfume-manage" id="add-perfume">
									    <!-- Perfume Name -->
									    <div class="mb-3">
									        <?php if(isset($_SESSION["errors"]["perfume"]["insert"]["perfume_name"])): ?>
									            <div class="text-danger fs-6">Name is required *</div>
									        <?php endif; ?>
									        <label for="perfume-name" class="form-label">Name</label>
									        <input type="text" class="form-control" id="perfume-name" name="perfume-name">
									    </div>

									    <!-- Perfume Description -->
									    <div class="mb-3">
									        <?php if(isset($_SESSION["errors"]["perfume"]["insert"]["perfume-description"])): ?>
									            <div class="text-danger fs-6">Description is required *</div>
									        <?php endif; ?>
									        <label for="perfume-description" class="form-label">Description</label>
									        <textarea class="form-control" id="perfume-description" name="perfume-description" rows="3"></textarea>
									    </div>

									    <!-- Perfume Brand -->
									    <div class="mb-3">
									        <?php if(isset($_SESSION["errors"]["perfume"]["insert"]["perfume-brand"])): ?>
									            <div class="text-danger fs-6">Brand is required *</div>
									        <?php endif; ?>
									        <label for="perfume-brand" class="form-label">Brand</label>
									        <select class="form-select" name="perfume-brand" id="perfume-brand" aria-label="Select perfume brand">
									            <option selected value="Creed">Creed</option>
									            <option value="Dior">Dior</option>
									            <option value="Victorias Secret">Victoria's Secret</option>
									            <option value="YSL">YSL</option>
									        </select>
									    </div>

									    <!-- Scent Type -->
									    <div class="mb-3">
									        <?php if(isset($_SESSION["errors"]["perfume"]["insert"]["perfume-type"])): ?>
									            <div class="text-danger fs-6">Scent Type is required *</div>
									        <?php endif; ?>
									        <label for="perfume-type" class="form-label">Scent Type</label>
									        <select class="form-select" name="perfume-type" id="perfume-type" aria-label="Select perfume scent type">
									            <option selected value="Strong">Strong</option>
									            <option value="Moderately Strong">Moderately Strong</option>
									            <option value="Weak">Weak</option>
									            <option value="Moderately Weak">Moderately Weak</option>
									        </select>
									    </div>

									    <!-- Gender Type -->
									    <div class="mb-3">
									        <?php if(isset($_SESSION["errors"]["perfume"]["insert"]["perfume-gender"])): ?>
									            <div class="text-danger fs-6">Gender Type is required *</div>
									        <?php endif; ?>
									        <label for="perfume-gender" class="form-label">Gender Type</label>
									        <select class="form-select" name="perfume-gender" id="perfume-gender" aria-label="Select perfume gender">
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

									    <!-- Perfume Image -->
									    <div class="mb-3">
									        <?php if(isset($_SESSION["errors"]["perfume"]["insert"]["perfume-image"])): ?>
									            <div class="text-danger fs-6">Image must be of type .jpg or .png *</div>
									        <?php endif; ?>
									        
									        <label for="perfume-image" class="form-label">Upload Image</label>
									        <input class="form-control" type="file" id="perfume-image" name="perfume-image" accept=".png,.jpg,.jpeg">
									    </div>

									    <!-- Perfume Cost -->
									    <div class="mb-3">
									        <?php if(isset($_SESSION["errors"]["perfume"]["insert"]["perfume-cost"])): ?>
									            <div class="text-danger fs-6">Cost in ₱ is required*</div>
									        <?php endif; ?>
									        <label for="perfume-cost" class="form-label">Cost (in ₱)</label>
									        <input type="number" class="form-control" name="perfume-cost" id="perfume_cost" step="1" min="0" aria-label="Enter perfume cost">
									    </div>

									    <!-- CSRF Token -->
									    <input type="hidden" name="csrf_token" value="<?php echo $this->generateCSRFToken("add_form"); ?>">
									    <input type="hidden" name="from-dashboard" value="true">
									</form>

									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										<button type="submit" form="add-perfume" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div>
			<?php endif; ?>
		</div>


<?php if (!empty($perfumes)): ?>
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
            <?php foreach($perfumes as $perfume):?>
                <tr>
                    <td>
                    	<img src="<?php echo str_replace("..", "", $perfume["perfume_image"]); ?>" alt="Perfume Image" class="dash-perfume-img"></td>
                    <td><?php echo $perfume["perfume_name"]; ?></td>
                    <td><?php echo $perfume["perfume_brand"]; ?></td>
                    <td><?php echo $perfume["perfume_type"]; ?></td>
                    <td><?php echo $perfume["perfume_cost"]; ?></td>
                    <td>
                        <div class="d-flex justify-content-center">
                            <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#perfume-modal-<?php echo $perfume["perfume_id"]; ?>">
                                Edit
                            </button>
                            <button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#delete-perfume-modal-<?php echo $perfume["perfume_id"]; ?>">
                                Delete
                            </button>
                        </div>

							<!-- Edit Perfume Modal -->
							<div class="modal fade" id="perfume-modal-<?php echo $perfume["perfume_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							    <div class="modal-dialog">
							        <div class="modal-content">
							            <div class="modal-header">
							                <h1 class="modal-title fs-5">Edit Perfume</h1>
							                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							            </div>
							            <div class="modal-body">
							                <form enctype="multipart/form-data" action="<?php $this->url()?>/update/<?php echo $perfume["perfume_id"];?>" method="POST" class="perfume-manage" id="edit-perfume-<?php echo $perfume["perfume_id"]; ?>">
							                    <!-- Error Handling -->
							                    <?php if (isset($_SESSION["errors"]["perfume"]["update"][$perfume["perfume_id"]]["database"])): ?>
							                        <div class="text-danger fs-6">Something went wrong. Please contact your administrator*</div>
							                    <?php endif; ?>

							                    <!-- Name Field -->
							                    <div class="mb-3">
							                        <?php if (isset($_SESSION["errors"]["perfume"]["update"][$perfume["perfume_id"]]["perfume_name"])): ?>
							                            <div class="text-danger fs-6">Name is required *</div>
							                        <?php endif; ?>
							                        <label for="perfume_name">Name</label>
							                        <input type="text" class="form-control" id="perfume_name" name="perfume-name" value="<?php echo htmlspecialchars($perfume["perfume_name"] ?? ''); ?>">
							                    </div>

							                    <!-- Description Field -->
							                    <div class="mb-3">
							                        <?php if (isset($_SESSION["errors"]["perfume"]["update"][$perfume["perfume_id"]]["perfume_description"])): ?>
							                            <div class="text-danger fs-6">Description is required *</div>
							                        <?php endif; ?>
							                        <label for="perfume_description">Description</label>
							                        <textarea class="form-control" id="perfume_description" name="perfume-description" rows="3"><?php echo htmlspecialchars($perfume["perfume_description"] ?? ''); ?></textarea>
							                    </div>

							                    <!-- Brand Field -->
							                    <div class="mb-3">
							                        <label for="perfume_brand">Brand</label>
							                        <select class="form-select" name="perfume-brand" id="perfume_brand">
							                            <option value="Creed" <?php echo (isset($perfume["perfume_brand"]) && $perfume["perfume_brand"] == "Creed") ? 'selected' : ''; ?>>Creed</option>
							                            <option value="Dior" <?php echo (isset($perfume["perfume_brand"]) && $perfume["perfume_brand"] == "Dior") ? 'selected' : ''; ?>>Dior</option>
							                            <option value="Victorias Secret" <?php echo (isset($perfume["perfume_brand"]) && $perfume["perfume_brand"] == "Victorias Secret") ? 'selected' : ''; ?>>Victoria's Secret</option>
							                            <option value="YSL" <?php echo (isset($perfume["perfume_brand"]) && $perfume["perfume_brand"] == "YSL") ? 'selected' : ''; ?>>YSL</option>
							                        </select>
							                    </div>

							                    <!-- Scent Type Field -->
							                    <div class="mb-3">
							                        <label for="perfume_type">Scent Type</label>
							                        <select class="form-select" name="perfume-type" id="perfume_type">
							                            <option value="Strong" <?php echo (isset($perfume["perfume_type"]) && $perfume["perfume_type"] == "Strong") ? 'selected' : ''; ?>>Strong</option>
							                            <option value="Moderately Strong" <?php echo (isset($perfume["perfume_type"]) && $perfume["perfume_type"] == "Moderately Strong") ? 'selected' : ''; ?>>Moderately Strong</option>
							                            <option value="Weak" <?php echo (isset($perfume["perfume_type"]) && $perfume["perfume_type"] == "Weak") ? 'selected' : ''; ?>>Weak</option>
							                            <option value="Moderately Weak" <?php echo (isset($perfume["perfume_type"]) && $perfume["perfume_type"] == "Moderately Weak") ? 'selected' : ''; ?>>Moderately Weak</option>
							                        </select>
							                    </div>

							                    <!-- Gender Field -->
							                    <div class="mb-3">
							                        <label for="perfume_gender">Gender Type</label>
							                        <select class="form-select" name="perfume-gender" id="perfume_gender">
							                            <option value="Male" <?php echo (isset($perfume["perfume_gender"]) && $perfume["perfume_gender"] == "Male") ? 'selected' : ''; ?>>Male</option>
							                            <option value="Female" <?php echo (isset($perfume["perfume_gender"]) && $perfume["perfume_gender"] == "Female") ? 'selected' : ''; ?>>Female</option>
							                        </select>
							                    </div>

							                    <!-- Seasons Field -->
													<div class="mb-3">
													    <label for="seasons">Seasons</label>
													    <?php 
													        $perfume_season = isset($perfume['seasons']) ? explode(",", $perfume['seasons']) : []; 
													    ?>

													    <?php foreach ($seasons as $season): ?>
													        <div class="form-check">
													            <input 
													                class="form-check-input" 
													                type="checkbox" 
													                name="seasons[]" 
													                value="<?php echo $season['season_id']; ?>"
													                <?php echo in_array(trim($season["season"]), array_map('trim', $perfume_season)) ? 'checked' : ''; ?>
													            >
													            <label class="form-check-label">
													                <?php echo htmlspecialchars($season["season"]); ?>
													            </label>
													        </div>
													    <?php endforeach; ?>
													</div>


							                    <!-- Cost Field -->
							                    <div class="mb-3">
							                        <?php if (isset($_SESSION["errors"]["perfume"]["update"][$perfume["perfume_id"]]["perfume_cost"])): ?>
							                            <div class="text-danger fs-6">Cost is required *</div>
							                        <?php endif; ?>
							                        <label for="perfume_cost">Cost (in ₱)</label>
							                        <input type="number" class="form-control" id="perfume_cost" name="perfume-cost" value="<?php echo htmlspecialchars($perfume["perfume_cost"] ?? ''); ?>" step="1" min="0">
							                    </div>

							                    <!-- CSRF Token and Hidden Fields -->
							                    <input type="hidden" name="csrf_token" value="<?php echo $this->generateCSRFToken("edit_form-" . $perfume['perfume_id']); ?>"> 
							                    <input type="hidden" name="from-dashboard" value="true">
							                    <input type="hidden" name="perfume-id" value="<?php echo $perfume['perfume_id']; ?>">

							                </form>
							            </div>
							            <div class="modal-footer">
							                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							                <button type="submit" form="edit-perfume-<?php echo $perfume["perfume_id"]; ?>" class="btn btn-primary">Save changes</button>
							            </div>
							        </div>
							    </div>
							</div>

							<!-- Delete Perfume Modal -->
							<div class="modal fade" id="delete-perfume-modal-<?php echo $perfume["perfume_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
							    <div class="modal-dialog">
							        <div class="modal-content">
							            <div class="modal-header">
							                <h1 class="modal-title fs-5">Delete perfume</h1>
							                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							            </div>
							            <div class="modal-body">
							                <p>All related files and records will also be deleted</p>
							                <p>Confirm deletion of <?php echo $perfume["perfume_name"]; ?>?</p>

							                <!-- Delete Form -->
							                <form action="<?php $this->url(); ?>/delete/<?php echo $perfume["perfume_id"]; ?>" method="POST" class="mx-1" id="delete-perfume-<?php echo $perfume["perfume_id"]; ?>">
							                    <!-- Hidden Inputs -->
							                    <input type="hidden" name="perfume_id" value="<?php echo $perfume["perfume_id"]; ?>">
							                    <input type="hidden" name="csrf_token" value="<?php echo $this->generateCSRFToken("delete-perfume-" . $perfume['perfume_id']); ?>">
							                    <input type="hidden" name="from-dashboard" value="true">
							                </form>
							            </div>
							            <div class="modal-footer">
							                <!-- Close Button -->
							                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
							                <!-- Submit Button -->
							                <button type="submit" form="delete-perfume-<?php echo $perfume["perfume_id"]; ?>" class="btn btn-danger">Delete</button>
							            </div>
							        </div>
							    </div>
							</div>
                    </td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
<?php else: ?>
    <p>No perfumes found.</p>
<?php endif?>
	</div>
</div>