<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_resume.css"); ?>" />
<div class="form_title">
	<h3>Reset your password</h3>
</div>

	
<div class="left_form_feedback">
	<span>In order to verify your password, please enter it in the field below and re-enter it in the next field. A good password should contain capital and lower case letters, numbers as well as symbols</span><br><br>
<div class="container">
		<div class="download-main">
			<div class="download-main-inner">
				<span style="color:#ff0000; font-size:14px;"><?php echo $error; ?></span>
				<br>
				<br>
				<form action="<?php echo base_url('forget/activation'); ?>" method="POST">
  					 Enter New Password: <input type="password" placeholder="Password" id="passowrd" name="password"><br/>
  					 Re-enter New Password: <input type="password" placeholder="Confirm Password" id="cpassowrd" name="cpassword"><br/>
  					 <input type="hidden" value="<?php echo $forget; ?>" name="acode">
  					 <input type="hidden" value="<?php echo $id; ?>" name="uid">
				     <input type="submit" id="restsubmit" class="fb_btn" style="cursor:pointer;" />
				</form>
			</div> 
			
		</div>
		
	</div>
</div>
