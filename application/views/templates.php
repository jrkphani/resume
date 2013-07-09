<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_resume.css"); ?>" />
<div class="form_title">
	<h3>Choose your resume style</h3>
</div>
<div class="right_nav">
	<h3> YOU ARE HERE </h3>
	<span class="rns rns_a"><span class="rnd_a">1</span>Choose Resume Style</span>
	<span class="rns"><span class="rnd">2</span>Discover Yourself</span>
	<!--<span tab='#about_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>About</span>
	<span tab='#objective_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Designation,Objective</span>
	<span tab='#contact_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Contact Me</span>
	<span tab='#experience_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Experience Summary</span>
	<span tab='#strength_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>My Strength </span>
	<span tab='#tool_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>My Tool Box</span>
	<span tab='#milestones_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>My Milestones</span>
	<span tab='#edication_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Edjucation & Awards</span>
	<span tab='#moreabout_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>More About Me</span>-->
	<span class="rns"><span class="rnd">3</span>Build Your Image</span>
	<span class="rns"><span class="rnd">4</span>Register with EZCV</span>
	 
</div>

<div class="left_form">
	<div class="t_list">
		<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/t1_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Template 1</p>
					<a class="t_select" tvalue="T1">Select</a>
				</div>
			</div>
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/t2_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Template 1</p>
					<a class="t_select">Select</a>
				</div>
			</div>
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/t3_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Template 1</p>
					<a class="t_select">Select</a>
				</div>
			</div>
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/t4_thumb.jpg"); ?>" alt="Template thumbnail"/>
				<div class="t_list_s">
					<p>Template 1</p>
					<a class="t_select">Select</a>
				</div>
			</div>
			<div class="t_list_t">
				<img src="<?php echo base_url("assets/img/t_thumb.jpg"); ?>" alt="Template thumbnail"/>
			</div>
		<div class="clearboth"></div>
		<a href="#" class="load_more">LOAD MORE</a>
	</div>
</div>


</div>
</div>
<!-- hidden form -->
<form method="POST" action="<?=base_url('resume');?>" >
<input id="templateValue" name="templateValue" type="hidden" value="NULL">
<input id="templateSubmit" type="submit" style="display:none;" >
</form>
<script src="<?php echo base_url('assets/js/templates.js');?>"></script>	