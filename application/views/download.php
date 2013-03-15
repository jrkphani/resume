Download will start in  
<span id="glowingLayout"></span> Seconds ...


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

