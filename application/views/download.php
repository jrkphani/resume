<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."sss_resume.css"); ?>" />
<div class="form_title">
	<h3>Download</h3>
</div>
<div class="row-fluid left_form_feedback">
	<div class="offset1 span2 ads final-ads">

	</div>
		
	<div class="span6">
		<div id="countLayout" class="download-main">
			
      <div class="" style="">
      		<div class="dowload_logo" style=" ">

          </div>
                    				<div class="download-main-inner downlod_cnt">
				Your resume will be ready for download in, 
        <span style="color:#f07057; font-weight:bold;" id="glowingLayout"></span> <span style="color:#f07057; font-weight:bold;"> Seconds	</span><br />
        <br />
        Please wait while your resume is being prepared.
			</div> 
      </div>
      

      
			 
			
		</div>
		
	</div>
	<div class="span2 ads final-ads">

	</div>
</div>

<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.countdown.min.js');?>"></script>
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
