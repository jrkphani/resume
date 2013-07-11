<div class="container">
	<h4>Feedback Form</h4><br />
	<div id="err_msg"><?php echo validation_errors(); if($msg) echo $msg; ?></div>
	<form name="feedback_form" id="feedback_form" method="post" action="">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="name" id="name" /></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email" id="email" /></td>
		</tr>
		<tr>
			<td>Subject</td>
			<td><input type="text" name="subject" id="subject" /></td>
		</tr>
		<tr>
			<td>Message</td>
			<td><textarea name="message" id="message"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit_feedback" value="Submit" /></td>
		</tr>
	</table>
	</form>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/feedback.js'); ?>"></script>