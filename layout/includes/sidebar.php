<div id="RangesMenu" class="menu">
	<h5 class="heading">Products by range</h5>
	<?php $ranges = $client->Ranges($current_brand_id); ?>
	<?php echo build_menu($ranges, "range", create_function('$range', 'return array("range_id" => $range->ID);'), $current_range_id); ?>	
</div>

<div id="CategoriesMenu" class="menu">
	<h5 class="heading">Products by category</h5>
	<?php $categories = $client->Categories($current_brand_id); ?>
	<?php echo build_menu($categories, "category",  create_function('$category', 'return array("category_id" => $category->ID);'), $current_category_id); ?>
</div>

<?php if($current_brand->BrandInformation): ?>
<div id="MoreInfoMenu" class="menu">
	<h5 class="heading">More information</h5>
	<ul class="clean_list">
		<?php foreach($current_brand->BrandInformation as $item): ?>
		<li><a target="_blank" href="<?php echo $item->Link; ?>"><?php echo $item->Title; ?></a></li>
		<?php endforeach; ?>
	</ul>
</div>
<?php endif; ?>

<div id="DownloadButton" class="menu">
	<a class="bundle_download action_button" href="<?php echo $current_downloader_url; ?>" role="button">Bundle download</a>
</div>

<div id="ContactMenu" class="menu">
	<h5 class="heading">Contact</h5>
	<ul class="clean_list">
		<li><?php echo $current_brand->Phone; ?></li>
		<li><a href="mailto:<?php echo $current_brand->Email; ?>"><?php echo $current_brand->Email; ?></a></li>
		<li><a href="<?php echo $current_brand->Website; ?>" target="_blank"><?php echo $current_brand->Website; ?></a></li>
	</ul>
</div>
