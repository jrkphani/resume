<div class="row-fluid">
	<div class="offset1 span2 ads final-ads">

	</div>
		
	<div class="span6">
		<div class="download-main">
			Download will start in
			<div class="download-main-inner">
				<span id="glowingLayout"></span> Seconds	
			</div> 
			
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
	window.location="<?=$html?>";
}
</script>

