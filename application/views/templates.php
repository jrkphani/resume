<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_resume.css"); ?>" />
<div class="form_title">
	<h3>Choose your resume style</h3>
</div>
<div class="right_nav">
	<h3> YOU ARE HERE </h3>
	<span class="rns rns_b"><span class="rnd_a">1</span>Choose Resume Style</span>
	<a href="<?=base_url('resume'); ?>"class="rns"><span class="rnd">2</span>Discover Yourself</a>
	<a href="<?=base_url('login'); ?>"class="rns"><span class="rnd">3</span>Register with EZCV</a>
</div>

<div class="left_form">
		<div class="t_list">
			<div class="t_list_bg">
				<div class="t_list_t">
					<img src="<?php echo base_url("assets/img/T1_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>Spring Bloom</p>
						<a title="Spring Bloom" class="t_select" tvalue="T1">Select</a>
					</div>
				</div>
			</div>
		
			<div class="t_list_bg">
				<div class="t_list_t">
					<img src="<?php echo base_url("assets/img/T2_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>White Citadel</p>
						<a title="White Citadel" class="t_select" tvalue="T2">Select</a>
					</div>
				</div>
			</div>
			<div class="t_list_bg">
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/T3_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Window View</p>
					<a title="Window View" class="t_select" tvalue="T3">Select</a>
				</div>
			</div>
		</div>
			<div class="t_list_bg">
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/T4_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Pyramid Point</p>
					<a title="Pyramid Point" class="t_select" tvalue="T4">Select</a>
				</div>
			</div>
		</div>
			<div class="t_list_bg">
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/T_thumb.jpg"); ?>" alt="Template thumbnail"/>
			</div>
		</div>
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
<script src="<?php echo base_url('assets/js/templates.js');?>"></script>	