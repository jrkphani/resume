<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_resume.css"); ?>" />
<div class="form_title">
	<h3>Feedback</h3>
</div>
<div class="left_form_feedback">
<div class="container">
	
	<div id="err_msg" class="error_msg"><?php echo validation_errors(); if($success=='no') echo $msg; ?></div>
  <div class="success_msg"><?php if($success=='yes') echo $msg; ?></div>
  
  
  
	<form name="feedback_form" id="feedback_form" method="post" action="">
	<table>
  	<tr>
    	<td></td>
      <td><p class="fbmandtri">All fields are mandatory</p></td>
    </tr>
		<tr>
			<td ><p class="fb_cnt">Name *</p></td>
			<td><input class="fb_txt" type="text" name="name" id="name" placeholder="Name" /></td>
		</tr>
		<tr>
			<td ><p class="fb_cnt">Email *</p></td>
			<td><input class="fb_txt" type="text" name="email" id="email" placeholder="Email" /></td>
		</tr>
		<tr>
			<td ><p class="fb_cnt">Subject *</p></td>
			<td><input class="fb_txt" type="text" name="subject" id="subject" placeholder="Subject" /></td>
		</tr>
		<tr>
			<td ><p class="fb_cnt">Message *</p></td>
			<td><textarea class="fb_txtara" name="message" id="message" data-limit-input="1000" placeholder="Enter your Message"	></textarea>
      </td>
   </tr>
   <tr>
   		<td>
      </td>
      <td>
			<p  class="fbmandtri exchr">0 of 1000 characters used</p>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input class="fb_btn" type="submit" name="submit_feedback" value="Submit" /></td>
		</tr>
	</table>
	</form>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/feedback.js'); ?>"></script>