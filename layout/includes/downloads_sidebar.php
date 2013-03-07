<?php if($current_product): ?>
	<?php if($productImages = $current_product->ProductImages): ?>
		<div id="ProductImage">
			<img src="<?php echo $productImages[0]->MediumURL; ?>" />
		</div>
	<?php endif ?>
	<h4 class="heading"><?php echo $current_product->Title; ?></h4>
	<p>To bundle multiple files, tick the appropriate items and click the "Download zip" button below.</p>
	<a href="#" class="btn" onclick="document.getElementById('DownloadForm').submit();">Download Zip</a>
<?php else: ?>
	<div id="ProductImage" class="disabled"></div>
	<h4 class="heading disabled">No product selected</h4>
	<p class="disabled">To bundle multiple files, tick the appropriate items and click the "Download zip" button below.</p>
	<a href="#" class="btn disabled">Download Zip</a>
<?php endif; ?>
