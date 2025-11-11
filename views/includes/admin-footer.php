<script src="<?php $this->assets('scripts', 'bootstrap.js'); ?>"></script>
<?php 

// *******************************************
// TRIGGER ADD A perfume MODAL
// *******************************************
if (isset($_SESSION["errors"]["perfume"]["insert"])) : ?>
	<script type="text/javascript">
		var add_perfume_modal = new bootstrap.Modal(document.getElementById("add-perfume-modal"), {});
		document.onreadystatechange = function () {
			add_perfume_modal.show();
		};
	</script>
	<?php
	//unset the entire errors array
	unset($_SESSION["errors"]["perfume"]["insert"]);
endif;

// *******************************************
// TRIGGER EDIT A perfume MODAL
// *******************************************
if (isset($_SESSION["errors"]["perfume"]["update"])):
	// We are editing perfumes one at a time, get the the id of the perfume with error
	$error_bk = array_keys($_SESSION["errors"]["perfume"]["update"])[0];
	?>
	<script type="text/javascript">
		var edit_perfume_modal = new bootstrap.Modal(document.getElementById("perfume-modal-<?php echo $error_bk; ?>"), {});
		document.onreadystatechange = function () {
			edit_perfume_modal.show();
		};
	</script>

	<?php
	unset($_SESSION["errors"]["perfume"]["update"]);
endif;


// *******************************************
// TRIGGER ADD A season MODAL
// *******************************************
if (isset($_SESSION["errors"]["season"]["insert"])) : ?>
	<script type="text/javascript">
		var add_season_modal = new bootstrap.Modal(document.getElementById("add-season-modal"), {});
		document.onreadystatechange = function () {
			add_season_modal.show();
		};
	</script>
	<?php
	//unset the entire errors array
	unset($_SESSION["errors"]["season"]["insert"]);
endif;


// *******************************************
// TRIGGER EDIT A season MODAL
// *******************************************
if (isset($_SESSION["errors"]["season"]["update"])):
	// We are editing categories one at a time, get the the id of the season with error
	$error_ctg = array_keys($_SESSION["errors"]["season"]["update"])[0];
	?>
	<script type="text/javascript">
		var edit_season_modal = new bootstrap.Modal(document.getElementById("season-modal-<?php echo $error_ctg; ?>"), {});
		document.onreadystatechange = function () {
			edit_season_modal.show();
		};
	</script>

	<?php
	unset($_SESSION["errors"]["season"]["update"]);
endif;


// *******************************************
// TRIGGER ADD A USER MODAL
// *******************************************
if (isset($_SESSION["errors"]["user"]["insert"])) : ?>
	<script type="text/javascript">
		var add_user_modal = new bootstrap.Modal(document.getElementById("add-user-modal"), {});
		document.onreadystatechange = function () {
			add_user_modal.show();
		};
	</script>
	<?php
	//unset the entire errors array
	unset($_SESSION["errors"]["user"]["insert"]);
endif;

// *******************************************
// TRIGGER EDIT A USER MODAL
// *******************************************
if (isset($_SESSION["errors"]["user"]["update"])):
	// We are editing categories one at a time, get the the id of the season with error
	$error_us = array_keys($_SESSION["errors"]["user"]["update"])[0];
	?>
	<script type="text/javascript">
		var edit_user_modal = new bootstrap.Modal(document.getElementById("user-modal-<?php echo $error_us; ?>"), {});
		document.onreadystatechange = function () {
			edit_user_modal.show();
		};
	</script>

	<?php
	unset($_SESSION["errors"]["user"]["update"]);
endif;
?>

</body>
</html>