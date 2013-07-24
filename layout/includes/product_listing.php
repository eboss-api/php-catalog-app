<?php foreach($products as $i => $product) : ?>
<div class="row-fluid">
	<div class="span12">
		<div class="row-fluid">
			<div class="span2">
				<?php if($product->ThumbnailURL): ?>
				<a href="<?php echo display_link('product', array('product_id' => $product->ID)); ?>">
					<img class="thumbnail" src="<?php echo $product->ThumbnailURL; ?>" alt="<?php echo $product->Title; ?> Thumbnail" />
				</a>
				<?php else: ?>
				<span class="thumbnail"></span>
				<?php endif; ?>
			</div>
			<div class="span10">
				<h3 class="heading">
					<a href="<?php echo display_link('product', array('product_id' => $product->ID)); ?>"><?php echo $product->Title; ?></a>
				</h3>
				<p class="updated">
					<?php $date = date("d/m/Y", strtotime($product->Updated)); ?>
					<span>Updated: <?php echo $date; ?></span>
				</p>
				<?php if($product->AvailableFileExtensions): ?>
				<ul class="downloads_list">
					<?php foreach ($product->AvailableFileExtensions as $extension): ?>
					<li><?php echo $extension; ?></li>
					<?php endforeach; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php endforeach; ?>