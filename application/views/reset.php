<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_resume.css"); ?>" />
<div class="form_title">
	<h3>Enter new password</h3>
</div>

	
<div class="left_form_feedback">
<div class="container">
		<div class="download-main">
			<div class="download-main-inner">
				<span style="color:#ff0000; font-size:12px;"><?php echo $error; ?></span>
				<form action="<?php echo base_url('forget/activation'); ?>" method="POST">
  					 <input type="password" placeholder="Password" id="passowrd" name="password"><br/>
  					 <input type="password" placeholder="Confirm Password" id="cpassowrd" name="cpassword"><br/>
  					 <input type="hidden" value="<?php echo $forget; ?>" name="acode">
  					 <input type="hidden" value="<?php echo $id; ?>" name="uid">
				     <input type="submit" id="restsubmit" class="fb_btn" style="cursor:pointer;" />
				</form>
			</div> 
			
		</div>
		
	</div>
</div>
