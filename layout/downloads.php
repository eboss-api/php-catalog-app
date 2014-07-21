<?php if($include_header) include("includes/header.php"); ?>
<?php $downloads = $client->ProductDownloads($current_brand_id, $current_product_id); ?>
<?php $section = $_GET['section']; ?>
<?php $section = @$downloads->$section; ?>
<?php $documents = $section->Documents; ?>
<div id="Downloads">
	<div class="border-box header">
		<div class="row-fluid">
			<div id="BrandLogo" class="span">
				<img src="<?php echo $current_brand->LogoURL; ?>" alt="<?php echo $current_brand->Title; ?> Logo"/>
			</div>
			<div id="Title" class="span">
				<h2><?php echo $current_product->Title; ?></h2>
				<h3><?php echo $section->Label; ?></h3>
			</div>
		</div>
	</div>
	<div class="row-fluid doc-line">
		<?php if($documents): ?>
		<?php foreach($documents as $i => $document): ?>
			<?php $mod = $i%2;?>

			<div class="span6">
				<div class="row-fluid document">
					<div class="span5">
						<div class="border-box">
							<div >
								<a class="preview" href="<?php echo $document->PreviewImageURL;?>" target="_blank"><i class="preview-icon"></i><img src="<?php echo $document->PreviewThumbnailURL;?>"/></a>
							</div>
						</div>
					</div>
					<div class="span7">
						<h4><?php echo $document->Title; ?>
							<?php if($document->ReferenceNumber): ?>
								<small><?php echo $document->ReferenceNumber; ?></small>
						<?php endif; ?></h4>
						<ul class="extension_downloads">
						<?php foreach($document->Files as $extension): ?>
							<li class="file extension_<?php echo strtolower($extension->Extension); ?>"><a href="<?php echo $extension->URL; ?>"><?php echo $extension->Extension; ?></a></li> 
						<?php endforeach; ?>
						</ul>
					</div>
				</div>
			</div>
			<?php if(($mod==1) && count($documents)-1!=$i):?>
			</div><div class="row-fluid doc-line">
			<?php endif; ?>
		
		<?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>

<?php if($include_footer) include("includes/footer.php"); ?>