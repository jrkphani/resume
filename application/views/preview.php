<style type="text/css">
	.clickr{
	width: 109px; height: 34px; line-height:33px;
	 display: block; text-align: center;
	 margin-top: 100px;
	cursor: pointer; text-decoration: none;
	clear:both;
	background: #f07057 url(../img/arrow_btn.png) no-repeat right center;	border: solid 1px #c5533d;	color: #fff; font-family:segoeui;
}

.clickr:hover{
	background-color: #da5e46;
	border: solid 1px #d05840;
}

</style>
<div class="clearboth"></div>
<?php
echo $html;
	if($user_id) { ?>
			<!--<a href="javascript:void(0);" id="download" class="blabla clickr" onclick="window.top.location='<?php echo base_url('download/index/').'/'.$link; ?>'">Download</a>-->
			<a href="javascript:void(0);" class="clickr" onclick="parent.top.download(<?php echo $link; ?>);">Download</a>
	<?php } else { ?>
			<!--<a href="javascript:void(0);" onclick="window.top.location='<?php echo base_url('login'); ?>'" class="clickr">Register & Download</a>-->
			<a href="javascript:void(0);" onclick="parent.top.reg_download();" class="clickr">Register & Download</a>
	<?php } ?>
<?php /* ?><div><a href="javascript:void(0);" onclick="parent.updateDownload('<?php echo base_url('download/index/').'/'.$link; ?>')">Save & Download</a></div>
<div id="msg_online"><a href="javascript:void(0);" onclick="parent.makeOnline('<?php echo $link; ?>')">Make this online</a></div><?php */ ?>
