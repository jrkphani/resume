<?
		$url=base_url("download/activation"."/".urlencode($id));
		if($download=='yes' && (!$msg))
		header( "refresh:5;".$url);
?>
<style type="text/css">
.s_heading{
	width: 96%;
	height: 60px;
	background: #e78130;
	line-height: 60px;
	color: #fff;
	font-size: 1.6em;
	padding-left: 50px;

}

	.clickr{

	width: 200px; height: 40px; line-height: 40px;
	 display: block; text-align: center;
	 margin: 0 auto;	cursor: pointer; text-decoration: none;
	background: #e78130 url(../img/arrow_btn.png) no-repeat right center;	border: solid 1px #d77426;	color: #fff;	
	margin-top:100px;
}

.clickr:hover{
	background-color: #f2722c;
	border: solid 1px #d77426;
}
.redirect
{
	text-align:center;
	margin:0 auto;
	margin-top:150px;
	color: #00FF00;
	font-size:1.3em;
}
</style>
		<div class="s_heading">
			Account activated successfully
		</div>
		<?if($download=='yes')  {
			if(!$msg)
			{
			 ?>
		<div class="redirect">
				Redirecting to download page ... 
		</div>
		<? } else {?>
		<div class="redirect">
				<?=$msg;?> 
		</div>
			
			<?} }?>
		
		<?if($download=='no') ?>
			<a class="dbutton clickr" href="<? echo base_url('login');?>/">Login</a>
		

