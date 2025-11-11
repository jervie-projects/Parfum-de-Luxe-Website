<body style="background-image: url(<?php $this->assets('images/site-background','bg.jpg'); ?>);">
<?php 
$this->render('includes/header'); ?>
<div id="main">
	<div class="container">
		<div class="row">
			<div class="col">
				<h1 class="pg-header">
					Seasons
				</h1>
			</div>
			<div class="col d-flex justify-content-end align-items-center">
				<div>
					<button type="button" class="btn btn-primary custom-button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
						Add Season
					</button>

					<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h1 class="modal-title fs-5" id="staticBackdropLabel">Add Season</h1>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="<?php $this->url('seasons/insert'); ?>" method="POST" id="add-season">
										<div class="mb-3">
											<label for="title">Season</label>
											<input type="text" class="form-control" id="title" name="season" >
										</div>
										<input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>"> 

										<div class="mb-3">
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
				<?php foreach($season as $season):?>
					<tr>
						<th scope="row"><?php echo $season["season_id"]; ?></th>
						<td><?php echo $season["season"]; ?></td>
						<td><?php echo $season["season_description"]; ?></td>
						<td>
							
							<div class="d-flex">
								<button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal" data-bs-target="#season-modal-<?php echo $season["season_id"]; ?>">
									Edit
								</button>

								<form action="<?php $this->url('seasons/delete'); ?>" method="POST" class="mx-1">
									<input type="hidden" name="season_id" value="<?php echo $season["season_id"]; ?>">
									<button type="submit" class="btn btn-danger" >
										Delete
									</button>
								</form>
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
												<div class="mb-3">
													<label>Season</label>
													<input type="text" class="form-control" name="season" value="<?php echo $season["season"]; ?>">
												</div>
												<div class="mb-3">
													<label>Description</label>
													<textarea class="form-control" name="season_description" rows="5"><?php echo $season["season_description"]; ?></textarea>
												</div>
												<input type="hidden" name="csrf_token" value="<?php echo $csrfToken; ?>"> 

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
							
						</td>
					</tr>

				<?php endforeach;?>
			</tbody>
		</table>

	</div>
</div>

<!-- FOOTER --> 
<?php $this->render('includes/footer');?>

<!-- SCRIPT -->
<!-- OFFLINE -->
<script src="<?php $this->assets('scripts', 'bootstrap.js'); ?>"></script>
