<div class="row-fluid">
	<div class="offset1 span2 ads final-ads">

	</div>
		
	<div class="span6">
		<div id="countLayout" class="download-main">
			Your resume will be ready for download in,
			<div class="download-main-inner">
				<span id="glowingLayout"></span> Seconds	
			</div> 
			Please wait while your resume is being prepared.
			
		</div>
		
	</div>
	<div class="span2 ads final-ads">

	</div>
</div>

<script src="<?php echo base_url('assets/js/jquery.countdown.min.js');?>"></script>
<script type="text/javascript">
$(document).ready(function(){
	var austDay = new Date(0,0,0,0,0,1)
	austDay=austDay.getSeconds()+19;
$('#glowingLayout').countdown({until: austDay, compact: true, format: 'S', onExpiry: download});
});
function download()
{
	$('#countLayout').html('Thank you for using EZCV!');
	window.location="<?=$html?>";
}
</script>

