<div id="seasons" class="section">
	<div class="container">
		<?php
		if (isset($_SESSION["success"]["season"])): 
		    if (isset($_SESSION["success"]["season"]["insert"])) {
		        $msg = "Successfully added a new season";
		    }

		    if (isset($_SESSION["success"]["season"]["update"])) {
		        $msg = "Successfully updated season";
		    }

		    if (isset($_SESSION["success"]["season"]["delete"])) {
		        $msg = "Deleted season successfully";
		    }
		    ?>

		    <!-- Success Modal -->
		    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
		        <div class="modal-dialog modal-dialog-centered">
		            <div class="modal-content">
		                <div class="modal-header">
		                    <h5 class="modal-title" id="successModalLabel">Success</h5>
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
		            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
		            successModal.show();
		        });
		    </script>

		    <?php
		    unset($_SESSION["success"]["season"]);
		endif;
		?>


		<div class="row">
			<div class="col">
				<h1 class="pg-header">
					Seasons
				</h1>
			</div>
			<div class="col d-flex justify-content-end align-items-center">
				<div>
					<button type="button" class="btn btn-primary custom-button" data-bs-toggle="modal" data-bs-target="#add-season-modal">
						Add Season
					</button>

					<div class="modal fade" id="add-season-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="staticBackdropLabel">Add Season</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="<?php $this->url('seasons/insert'); ?>" method="POST" id="add-season">
										<div class="mb-3">
											<?php if(isset($_SESSION["errors"]["season"]["insert"]["season_name"])): ?>
									            <div class="text-danger fs-6">Name is required *</div>
									        <?php endif; ?>
											<label for="title">Season</label>
											<input type="text" class="form-control" id="title" name="season" >
										</div>

										<input type="hidden" name="csrf_token" value="<?php echo $this->generateCSRFToken("season") ?>"> 
										<input type="hidden" name="from-dashboard" value="true">

										<div class="mb-3">
											<?php if(isset($_SESSION["errors"]["season"]["insert"]["season_description"])): ?>
									            <div class="text-danger fs-6">Description is required *</div>
									        <?php endif; ?>
											<label for="season_description">Description</label>
											<textarea class="form-control" id="season_description" name="season_description" rows="5"></textarea>
										</div>
									</form>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
									<button type="submit" form="add-season" class="btn btn-primary">Submit</button>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>



		<table class="table">
			<thead>
				<tr>
					<th scope="col">ID</th>
					<th scope="col">Season</th>
					<th scope="col">Description</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach($seasons as $season):?>
					<tr>
						<th scope="row"><?php echo $season["season_id"]; ?></th>
						<td><?php echo $season["season"]; ?></td>
						<td><?php echo $season["season_description"]; ?></td>
						<td>
							
							<div class="d-flex">
								<button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#season-modal-<?php echo $season["season_id"]; ?>">
									Edit
								</button>

								<button type="button" class="btn btn-danger mx-1" data-bs-toggle="modal" data-bs-target="#delete-season-modal-<?php echo $season["season_id"]; ?>">
									Delete
								</button>
							</div>


							<div class="modal fade" id="season-modal-<?php echo $season["season_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5">Edit Season</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<form action="<?php $this->url('seasons/update'); ?>" method="POST" id="edit-season-<?php echo $season["season_id"]; ?>">
												<!-- show error message for when there is a problem during file upload or database -->
												<?php if( isset($_SESSION["errors"]["season"]["update"][$season["season_id"]]["database"])): ?>
													<div class="text-danger fs-6">Something went wrong. Please contact your administrator*</div>
												<?php endif; ?>
												<div class="mb-3">
													<?php if(isset($_SESSION["errors"]["season"]["update"][$season["season_id"]]["season_name"])): ?>
														<div class="text-danger fs-6">Season name is required *</div>
													<?php endif; ?>
													<label>Season</label>
													<input type="text" class="form-control" name="season" value="<?php echo $season["season"]; ?>">
												</div>
												<div class="mb-3">
													<?php if(isset($_SESSION["errors"]["season"]["update"][$season["season_id"]]["season_description"])): ?>
														<div class="text-danger fs-6">Season description is required *</div>
													<?php endif; ?>
													<label>Description</label>
													<textarea class="form-control" name="season_description" rows="5"><?php echo $season["season_description"]; ?></textarea>
												</div>
												<input type="hidden" name="csrf_token" value="<?php echo $this->generateCSRFToken('season-' . $season["season_id"])?>"> 

												<input type="hidden" name="season_id" value="<?php echo $season["season_id"]; ?>">
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" form="edit-season-<?php echo $season["season_id"]; ?>" class="btn btn-primary">Edit</button>
										</div>
									</div>
								</div>
							</div>

							<!-- Delete Season Modal -->
							<div class="modal fade" id="delete-season-modal-<?php echo $season["season_id"]; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h1 class="modal-title fs-5">Delete Season</h1>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											Confirm deletion of <?php echo $season["season"]; ?>?
											<form action="<?php $this->url('seasons/delete'); ?>" method="POST" class="mx-1" id="delete-season-<?php echo $season["season_id"]; ?>">
												<input type="hidden" name="season_id" value="<?php echo $season["season_id"]; ?>">
												<input type="hidden" name="from-dashboard" value="true">
												<input type="hidden" name="csrf_token" value="<?php echo $this->generateCSRFToken('delete-category-' . $season["season_id"]); ?>">
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
											<button type="submit" form="delete-season-<?php echo $season["season_id"]; ?>" class="btn btn-danger">Delete</button>
										</div>
									</div>
								</div>
							</div>
						</td>
					</tr>

				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</div>