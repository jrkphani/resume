<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."sss_resume.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url($this->config->item('path_css_file')."colorbox.css"); ?>"/>
<div class="form_title">
	<h3>Choose your resume style</h3>
</div>
<div class="right_nav">
	<h3> YOU ARE HERE </h3>
	<span class="rsum_tp_active">Choose Resume Style</span>
	<a href="<?=base_url('resume'); ?>"class="rsum_tp">Discover Yourself</a>
	<a href="<?=base_url('login'); ?>"class="rsum_tp1">Register with EZCV</a>
</div>

<div class="left_form">
	<h2 style="padding-left:20px; padding-top:20px; font-size:20px;">You can select a resume template of your choice here.</h2>
		<div class="t_list">
			<div class="t_list_bg">
				<!-- clicking on following div should do select functionality -->
				<div class="t_list_t">
					<img title="Spring Bloom" class="temp_select" tvalue="T1" src="<?php echo base_url("assets/img/T1_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>Spring Bloom</p>
						<!--<a title="Spring Bloom" class="t_select" tvalue="T1">Select</a>-->
						<span class="previewTemp" title="Spring Bloom" href="<?php echo base_url("assets/img/T1_full.png"); ?>">zoom</span>
					</div>
				</div>
			</div>
			<div class="t_list_bg">
				<!-- clicking on following div should do select functionality -->
			<div class="t_list_t">
				<img title="Pyramid Point" class="temp_select" tvalue="T4" src="<?php echo base_url("assets/img/T4_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Pyramid Point</p>
					<!--<a title="Pyramid Point" class="t_select" tvalue="T4">Select</a>-->
					<span class="previewTemp" title="Pyramid Point" href="<?php echo base_url("assets/img/T4_full.png"); ?>">zoom</span>
				</div>
			</div>
		</div>
		
			<div class="t_list_bg">
				<!-- clicking on following div should do select functionality -->
				<div class="t_list_t">
					<img title="White Citadel" class="temp_select" tvalue="T2" src="<?php echo base_url("assets/img/T2_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>White Citadel</p>
						<!--<a title="White Citadel" class="t_select" tvalue="T2">Select</a>-->
						<span class="previewTemp" title="White Citadel" href="<?php echo base_url("assets/img/T2_full.png"); ?>">zoom</span>
					</div>
				</div>
			</div>
			<div class="t_list_bg">
				<!-- clicking on following div should do select functionality -->
			<div class="t_list_t">
				<img title="Window View" class="temp_select" tvalue="T3" src="<?php echo base_url("assets/img/T3_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Window View</p>
					<!--<a title="Window View" class="t_select" tvalue="T3">Select</a>-->
					<span class="previewTemp" title="Window View" href="<?php echo base_url("assets/img/T3_full.png"); ?>">zoom</span>
				</div>
			</div>
		</div>
			<!--<div class="t_list_bg">
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/T_thumb.jpg"); ?>" alt="Template thumbnail"/>
			</div>
		</div>-->
		<div class="clearboth"></div>
		<!-- <a href="#" class="load_more">LOAD MORE</a> -->
	</div>
</div>


</div>
</div>
<!-- hidden form -->
<form method="POST" action="<?=base_url('resume');?>" >
<input id="templateValue" name="templateValue" type="hidden" value="NULL">
<input id="templateName" name="templateName" type="hidden" value="NULL">
<input id="templateSubmit" type="submit" style="display:none;" >
</form>
<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.colorbox-min.js'); ?>" ></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'templates.js');?>"></script>