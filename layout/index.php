<?php if($include_header) include("includes/header.php"); ?>

<div class="row-fluid">
	<div id="Sidebar" class="span3">
		<?php include("includes/sidebar.php"); ?>
	</div>

	<div id="Main" class="span9">
		<img id="BrandImage" src="<?php echo $current_brand->ImagePanelURL; ?>" />

		<div id="ProductListings">
			<div class="row-fluid">
				<div class="span12">
					<h4 class="heading">Product updates</h4>
					<em>New additions and updates to catalogue</em>
					<?php $updated_products = $client->Products($current_brand_id, array("Sort" => "LastEdited", "Limit"=> 3)); ?>
				</div>
			</div>

			<div class="row-fluid">
				<?php foreach($updated_products as $updated_product) : ?>
				<div class="span4">
					<div class="row-fluid">
						<div class="span4">
							<?php if($updated_product->ThumbnailURL): ?>
							<a href="<?php echo display_link('product', array('product_id' => $updated_product->ID)); ?>">
								<img class="thumbnail" src="<?php echo $updated_product->ThumbnailURL; ?>" alt="<?php echo $updated_product->Title; ?> Thumbnail" />
							</a>
							<?php else: ?>
							<span class="thumbnail"></span>
							<?php endif; ?>
						</div>
						<div class="span8">
							<h3 class="heading">
								<a href="<?php echo display_link('product', array('product_id' => $updated_product->ID)); ?>"><?php echo $updated_product->Title; ?></a>
							</h3>
							<p class="updated">
								<?php $date = date("d/m/Y", strtotime($updated_product->Updated)); ?>
								<span>Updated: <?php echo $date; ?></span>
							</p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</div>

<?php include("includes/download_modal.php"); ?>

<?php if($include_footer) include("includes/footer.php"); ?>