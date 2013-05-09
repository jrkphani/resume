<?php
echo $html;
?>
<div id="download" class="blabla" onclick="window.top.location='<?php echo base_url('download/index/').'/'.$link; ?>'">Downloads</div>
<div onclick="parent.testt('<?php echo base_url('download/index/').'/'.$link; ?>')">Save & Downloads</div>
