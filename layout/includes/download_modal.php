<div class="modal fade hide" id="DownloadModal" role="dialog" aria-hidden="true">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	<iframe src="/index.php?action=downloads<?php if($current_product_id): ?>&amp;product_id=<?php echo $current_product_id; ?><?php endif; ?>" width="100%" height="100%" frameborder="0" seamless></iframe>
</div>
