<form name="rec_form" id="rec_form" method="post" action="">
<h3>Reply feedback for <?php echo $result2[0]['first_name'].'&nbsp'.$result2[0]['last_name']; ?></h3>
<br />
<div id="err_msg"><?php echo validation_errors(); if($msg) echo $msg;  ?></div>
<div>
	<?php if($result[0]['content']) { ?>
	<div>
		<label>His/ Her Message:</label>&nbsp;&nbsp;&nbsp;
		<span><?=$result[0]['content']?></span>
	</div>
	<br />
	<?php } ?>
	<div>
		<label for="about">About You:</label>&nbsp;&nbsp;&nbsp;
		<textarea name="about" id="about"><?=$result[0]['about_friend']?></textarea>
	</div>
	<br />
	<div>
		<label for="reply">Your Feedback:</label>&nbsp;&nbsp;&nbsp;
		<textarea name="reply" id="reply"><?=$result[0]['reply']?></textarea>
	</div>
	<br />
	<div>
		<input type="submit" name="rec_submit" value="Update" />
	</div>
</div>
</form>
<script type="text/javascript" src="<?php echo base_url('assets/js/validation.js'); ?>"></script>

<!-- Form validation -->
<script type="text/javascript">
$("#rec_form").submit(function(){
	if(!validate('About you','about',man=true,max=512,min=false,type=false,disp='err_msg')) return false;
	else if(!validate('Your Feedback','reply',man=true,max=512,min=false,type=false,disp='err_msg')) return false;
});
</script>