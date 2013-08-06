<style type="text/css">
	.clickr{
	width: 172px; height: 34px; line-height:33px;
	 display: block; text-align: center;
	 margin-top: 100px;
	cursor: pointer; text-decoration: none;
	clear:both;
	background: #e78130 url(../img/arrow_btn.png) no-repeat right center;	border: solid 1px #d77426;	color: #fff; font-family: 'segoeui', sans-serif!important;
}

.clickr:hover{
	background-color: #f2722c;
	border: solid 1px #d77426;
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
