<?php
if(isset($content))
{
	?>
	 <object data="<?=$content;?>" type="application/pdf" width="900" height="800">
      <!-- support older browsers -->
      <embed src="<?=$content;?>" type="application/pdf" width="900" height="800"/>
      <!-- For those without native support, no pdf plugin, or no js -->
      <p>It appears you do not have PDF support in this web browser. <a href="<?=$content;?>" target="_blank">Click here to download the document.</a></p>
</object> 
<? 
}
if(isset($msg))
	echo $msg;
?>