<?php if($other_download_types = $downloads->Other): ?>
	<?php foreach($other_download_types as $type => $other_files): $type_id = str_replace(" ","", $type); ?>
	<div class="accordion-heading">
		<a class="accordion-toggle" data-toggle="collapse" href="#<?php echo $type_id; ?>">
			<h2 class="heading"><?php echo $type; ?></h2>
		</a>
	</div>
	<div id="<?php echo $type_id; ?>" class="accordion-body collapse">
		<div class="accordion-inner">


			<div class="row-fluid field-row toggle-row">
				<div class="span12">
					<label class="checkbox inline" for="toggle-all">
							<input id="toggle-all-<?php echo $type_id; ?>" type="checkbox" name="toggle[]" class="checkbox toggle-group" value=""/>
						All files</label>
				</div>
			</div>


			<?php foreach($other_files as $index => $other_file): ?>
				<?php $first = ($index==0) ? true  : false; ?>
				<?php $last = ($index+1==count($other_files)) ? true : false; ?>
				<?php $evenOdd = ($index%2==0) ? "odd" : "even"; ?>
				<?php $evenOddRow = ($index%4==0) ? "odd": "even"; ?>

				<?php if($evenOdd == "odd"): ?>
					<div class="row-fluid field-row <?php echo $evenOddRow; ?>">
				<?php endif; ?>

				<div class="span6 <?php echo $evenOdd; ?>">
					<h4 class="heading"><?php echo $other_file->Title; ?></h4>
					<label class="checkbox inline" for="file-<?php echo $other_file->ID; ?>">
						<input id="file-<?php echo $other_file->ID; ?>" type="checkbox" name="files[]" class="<?php echo $other_file->Extension; ?> checkbox" value="<?php echo $other_file->ID; ?>"/>
					<?php echo $other_file->Extension; ?></label>
				</div>

				<?php if(($evenOdd=="even") || $last): ?>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
		</div>
	</div>
	<?php endforeach; ?>
<?php endif; ?>