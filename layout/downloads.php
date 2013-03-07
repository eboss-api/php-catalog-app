<?php include("includes/header.php"); ?>

<div id="DownloadTool">
	<div id="Search" class="row-fluid">
		<div id="BrandLogo" class="span3">
			<img src="<?php echo $current_brand->LogoURL; ?>" alt="<?php echo $current_brand->Title; ?> Logo"/>
		</div>

		<div id="QuickFind" class="span9">
			<?php include("includes/downloads_search.php"); ?>
		</div>
	</div>

	<div class="row-fluid">
		<div class="span3 downloads-sidebar">
			<?php include("includes/downloads_sidebar.php"); ?>
		</div>
		<?php if($current_product): ?>
			<div class="span9 downloads-main">
				<?php $downloads = $client->ProductDownloads($current_brand_id, $current_product_id); ?>
				<form id="DownloadForm" action="<?php echo $downloads->FormActionURL; ?>" method="post">
					<div class="accordion" id="FileDownloads">
						<div class="accordion-group">
							<?php include("includes/downloads_caddownloads.php"); ?>
							<?php include("includes/downloads_otherdownloads.php"); ?>
						</div>
					</div>
				</form>
			</div>
		<?php else: ?>
			<div class="span9">
				<h4>Please choose a product to begin</h4>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php include("includes/footer.php"); ?>