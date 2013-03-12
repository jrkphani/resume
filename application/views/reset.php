<?php echo $error; ?>
<form class="form-inline" action="<?php echo base_url('forget/activation'); ?>" method="POST">
  					 <input type="password" class="input-medium" placeholder="Password" id="passowrd" name="password">
  					 <input type="password" class="input-medium" placeholder="Confirm Password" id="cpassowrd" name="cpassword">
  					 <input type="hidden" value="<?php echo $active; ?>" name="acode">
  					 <input type="hidden" value="<?php echo $id; ?>" name="uid">
				     <input type="submit" id="restsubmit" class="btn btn-small btn-primary" />
				</form>
