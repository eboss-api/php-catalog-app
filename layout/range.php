<?php if($include_header) include("includes/header.php"); ?>

<div class="row-fluid">
	<div id="Sidebar" class="span3">
		<?php include("includes/sidebar.php"); ?>
	</div>

	<div id="Main" class="span9">
		<h2 class="heading"><?php echo $current_range->Title; ?></h2>

		<?php if($current_range->Description): ?>
		<div id="RangeDescription" class="description">
			<?php echo $current_range->Description; ?>
		</div>
		<?php endif; ?>

		<?php $products = $client->Products($current_brand_id, array("RangeID" => $current_range_id)); ?>

		<div id="ProductListings">
			<?php include("includes/product_listing.php"); ?>
		</div>
	</div>
</div>

<?php //include("includes/download_modal.php"); ?>

<?php if($include_footer) include("includes/footer.php"); ?>