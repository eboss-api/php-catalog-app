<?php if($include_header) include("includes/header.php"); ?>

<div class="row-fluid">
	<div class="span12">
		<h1>Error <?php echo $error_code; ?></h1>
		<h2><?php echo $error_message; ?> </h2>
	</div>
</div>

<?php if($include_footer) include("includes/footer.php"); ?>
