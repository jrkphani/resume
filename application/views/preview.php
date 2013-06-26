<?php
echo $html;
if(!$online)
{
	if($user_id) { ?>
			<a href="javascript:void(0);" id="download" class="blabla" onclick="window.top.location='<?php echo base_url('download/index/').'/'.$link; ?>'">Download</a>
	<?php } else { ?>
			<a href="javascript:void(0);" onclick="window.top.location='<?php echo base_url('login'); ?>'">Register & Download</a>
	<?php } ?>
<?php /* ?><div><a href="javascript:void(0);" onclick="parent.updateDownload('<?php echo base_url('download/index/').'/'.$link; ?>')">Save & Download</a></div>
<div id="msg_online"><a href="javascript:void(0);" onclick="parent.makeOnline('<?php echo $link; ?>')">Make this online</a></div><?php */ ?>
<? } ?>