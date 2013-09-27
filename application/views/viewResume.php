<?php
if(!$avail)
	echo 'No resume found.';
else
{?>
	<div style="float: right; padding: 10px;" id="select-control">
				<span id="msg"></span>
	 			<?php if($selected) echo 'Selected'; else { ?>
	 				<a href="javascript:void(0);" data="<?php echo $resume_id; ?>" id="select-link">Select resume</a>
	 			<?php } ?>
			</div>
	<?php
	echo $content;
}
?>
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'resume_download.js'); ?>"></script>