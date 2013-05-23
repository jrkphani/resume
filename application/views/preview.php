<?php
echo $html;
if(!$online)
{?>
<div><a href="javascript:void(0);" id="download" class="blabla" onclick="window.top.location='<?php echo base_url('download/index/').'/'.$link; ?>'">Download</a></div>
<?php /* ?><div><a href="javascript:void(0);" onclick="parent.updateDownload('<?php echo base_url('download/index/').'/'.$link; ?>')">Save & Download</a></div><?php */ ?>
<div id="msg_online"><a href="javascript:void(0);" onclick="parent.makeOnline('<?php echo $link; ?>')">Make this online</a></div>
<? } ?>