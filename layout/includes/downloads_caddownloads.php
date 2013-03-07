<?php if($cad_downloads = $downloads->CADDownloads): ?>
	<div class="accordion-heading first">
		<a class="accordion-toggle" data-toggle="collapse" href="#CADDownloads">
			<h2 class="heading">Drawings</h2>
		</a>
	</div>
	<div id="CADDownloads" class="accordion-body collapse">
		<div class="accordion-inner">
			<div class="row-fluid field-row toggle-row">
				<div class="span12">
					<?php $available_extensions = get_unique_file_extensions($cad_downloads); ?>
					<?php foreach($available_extensions as $extension): ?>
						<label class="checkbox" for="toggle-<?php echo $extension; ?>">
							<input id="toggle-<?php echo $extension; ?>" type="checkbox" name="toggle[]" data-extension="<?php echo $extension; ?>" class="toggle-extension checkbox" value=""/>
							<span>All '<?php echo $extension; ?>' files</span>
						</label>
					<?php endforeach; ?>
					<label class="checkbox" for="toggle-all">
						<input id="toggle-all-cad" type="checkbox" name="toggle[]" class="checkbox toggle-group" value=""/>
						<span>All files</span>
					</label>
				</div>
			</div>
			<?php foreach($cad_downloads as $index => $cad_download): ?>
				<?php $first = ($index==0) ? true  : false; ?>
				<?php $last = ($index+1==count($cad_downloads)) ? true  : false; ?>
				<?php $evenOdd = ($index%2==0) ? "odd" : "even"; ?>
				<?php $evenOddRow = ($index%4==0) ? "odd": "even"; ?>

				<?php if($evenOdd == "odd"): ?>
				<div class="row-fluid field-row <?php echo $evenOddRow; ?>">
				<?php endif; ?>

				<div class="span6 <?php echo $evenOdd; ?>">
					<h4 class="heading"><?php echo $cad_download->Title; ?></h4>
					<?php foreach($cad_download->Files as $file): ?>
						<label class="checkbox" for="file-<?php echo $file->ID; ?>">
							<input id="file-<?php echo $file->ID; ?>" type="checkbox" name="files[]" class="<?php echo $file->Extension; ?> checkbox" value="<?php echo $file->ID; ?>"/>
							<span><?php echo $file->Extension; ?></span>
						</label>
					<?php endforeach; ?>
				</div>

				<?php if(($evenOdd=="even") || $last): ?>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>