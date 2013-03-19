<h3 class="heading">Product Download Bundler</h3>
<form action="<?php echo $catalog_base_url; ?>" method="get">
	<select id="CategoriesRangesSelect" name="cat_range_id">
		<option></option>
		<?php $categories = $client->Categories($current_brand_id); ?>
		<?php if($categories): ?>
			<optgroup label="Categories">
				<?php foreach($categories as $category): foreach($category->Children as $child_category): foreach($child_category->Children as $grandchild_category): ?>
					<option value="C<?php echo $grandchild_category->ID; ?>"><?php echo $grandchild_category->Title; ?></option>
				<?php endforeach; endforeach; endforeach; ?>
			</optgroup>
		<?php endif; ?>

		<?php $ranges = $client->Ranges($current_brand_id); ?>
		<?php if($ranges): ?>
			<optgroup label="Ranges">
				<?php foreach($ranges as $range): ?>
					<option value="C<?php echo $range->ID; ?>"><?php echo $range->Title; ?></option>
				<?php endforeach; ?>
			</optgroup>
		<?php endif; ?>
	</select>
	<select id="ProductSelect" name="product_id">
		<option></option>
		<?php 
		$filter = array();
		if(isset($_GET['cat_range_id'])) {
			$_cat_range_id = $_GET['cat_range_id'];
			if(substr($_cat_range_id, 0, 1) == "C") {
				$_cat_id = substr($_cat_range_id, 1);
				if(is_numeric($_cat_id)) {
					$filter['CategoryID'] = $_cat_id;
				}
			}
			if(substr($_cat_range_id, 0, 1) == "R") {
				$_range_id = substr($_cat_range_id, 1);
				if(is_numeric($_range_id)) {
					$filter['RangeID'] = $_range_id;
				}
			}
		}
		?>
		<?php $products = $client->Products($current_brand_id, $filter); ?>
		<?php if($products): ?>
			<?php foreach($products as $product): ?>
				<?php $selected = ($product->ID==$current_product_id) ? "selected=\"selected\"" : ""; ?>
				<option <?php echo $selected; ?> value="<?php echo $product->ID;?>"><?php echo $product->Title; ?></option>
			<?php endforeach; ?>
		<?php endif; ?>
	</select>
	<input type="hidden" name="action" value="downloads"/>
</form>