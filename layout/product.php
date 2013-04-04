<?php include("includes/header.php"); ?>
<div class="row-fluid">
	<div id="Sidebar" class="span3">
		<?php include("includes/sidebar.php"); ?>
	</div>

	<div id="Main" class="span6">
		<h2 class="heading"><?php echo $current_product->Title; ?></h2>
		<?php if($productImages = $current_product->ProductImages): ?>
			<!-- Product images carousel -->
			<div id="ProductImages" class="carousel slide" data-interval="false">
				<!-- Carousel items -->
				<div class="carousel-inner">
					<?php foreach($productImages as $i => $image): ?>
					<div class="item<?php if($i==0): ?> active<?php endif; ?>">
						<img src="<?php echo $image->MediumURL;?>" alt=""/>
					</div>
					<?php endforeach; ?>
				</div>
				<?php if(count($productImages) > 1) : ?>
					<div class="carousel-controls">
						<a class="carousel-control left" href="#ProductImages" data-slide="prev">&lsaquo;</a>
						<a class="carousel-control right" href="#ProductImages" data-slide="next">&rsaquo;</a>
					</div>
			<?php endif ?>
			</div>
		<?php endif; ?>

		<?php if($current_product->ProductNumber): ?>
		<p id="ProductNumber">
			#<?php echo $current_product->ProductNumber; ?>
		</p>
		<?php endif; ?>

		<div id="ProductDescription" class="description">
			<?php echo $current_product->Description; ?>
		</div>

		<hr/>
		<?php if($compliance = $current_product->ProductCompliance): ?>
		<div id="ProductCompliance">
			<?php foreach($compliance as $key => $complianceCategory): ?>
				<h3 class="heading"><?php echo $key; ?></h3>
				<?php $tagCount = count($complianceCategory) - 1; ?>
				<?php foreach($complianceCategory as $i => $complianceTag): ?>
					<?php if($i == 0) { ?>
						<div class="row-fluid">
					<?php } ?>
					<?php if($i % 3 == 0) { ?>
						</div>
						<div class="row-fluid">
					<?php } ?>
					<div class="span4 compliance_tag">
						<?php echo $complianceTag->LogoTag; ?>
						<a href="javascript:void(0)" data-toggle="popover" data-html="true" title="<?php echo $complianceTag->Label; ?> information" data-placement="top" data-content="<?php echo $complianceTag->Description; ?>">
							<?php echo $complianceTag->Title; ?>
						</a>
					</div>
					<?php if($i == $tagCount) { ?>
						</div>
					<hr>
					<?php } ?>
				<?php endforeach; ?>
			<?php endforeach; ?>
		</div>
		<?php endif; ?>
	</div>

	<div id="ProductInformation" class="span3">
		<?php if($productInformation = $current_product->ProductInformation): ?>
		<?php foreach($productInformation as $key => $informationType): ?>
		<div class="information_type">
			<h4 class="heading"><?php echo $key; ?></h4>
			<ul>
			<?php foreach($informationType as $document): ?>
			<li><?php echo $document->Tag; ?></li>
			<?php endforeach; ?>
			</ul>
		</div>
		<?php endforeach; ?>
		<a class="bundle_download action_button" href="<?php echo $current_downloader_url; ?>" role="button">Bundle download</a>
		<?php endif; ?>
	</div>
</div>

<?php include("includes/download_modal.php"); ?>

<?php include("includes/footer.php"); ?>
