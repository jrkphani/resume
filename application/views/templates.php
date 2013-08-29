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
			<?php foreach ($result as $row) { ?>
			<div class="t_list_bg">
				<!-- clicking on following div should do select functionality -->
				<div class="t_list_t">
					<img title="<?php echo $row->title; ?>" class="temp_select" tvalue="T<?php echo $row->id; ?>" src="<?php echo base_url("assets/img/T".$row->id."_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p><?php echo $row->title; ?></p>
						<span class="previewTemp" title="<?php echo $row->title; ?>" href="<?php echo base_url("assets/img/T".$row->id."_full.png"); ?>">zoom</span>
					</div>
				</div><br />
				<div class="star" template="<?php echo $row->id; ?>" data-score="<?php echo $row->rate; ?>" ></div>
				<span id="str<?php echo $row->id; ?>"></span>
			</div>
			<?php } ?>
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
<script src="<?php echo base_url($this->config->item('path_js_file').'jquery.raty.min.js'); ?>" ></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'templates.js');?>"></script>