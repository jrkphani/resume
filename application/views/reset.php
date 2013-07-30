<div class="row-fluid">
	<div class="offset1 span2 ads final-ads">

	</div>
		
	<div class="span6">
		<div class="download-main">
			Enter new password
			<div class="download-main-inner">
				<span style="color:#ff0000; font-size:12px;"><?php echo $error; ?></span>
				<form class="form-inline" action="<?php echo base_url('forget/activation'); ?>" method="POST">
  					 <input type="password" class="input-medium" placeholder="Password" id="passowrd" name="password">
  					 <input type="password" class="input-medium" placeholder="Confirm Password" id="cpassowrd" name="cpassword">
  					 <input type="hidden" value="<?php echo $forget; ?>" name="acode">
  					 <input type="hidden" value="<?php echo $id; ?>" name="uid">
				     <input type="submit" id="restsubmit" class="btn btn-small btn-primary" />
				</form>
			</div> 
			
		</div>
		
	</div>
	<div class="span2 ads final-ads">

	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.signIn').hide();
});
</script>