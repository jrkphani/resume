<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_login.css"); ?>" />

<div class="form_title">
	<? if($register=='register')
	{
	?>
	<a href="javascript:void(0);" class="btn_reg tab_hightlight" id="register_link"  >Register</a>
	<a href="javascript:void(0);" class="btn_sig" id="signin_link" >Sign In</a>
	<?
	}
	else
	{
	?>
	<a href="javascript:void(0);" class="btn_reg" id="register_link"  >Register</a>
	<a href="javascript:void(0);" class="btn_sig tab_hightlight" id="signin_link" >Sign In</a>
	<? } ?>
</div>
<div class="left_form">
	<div class="left_form_inner">
		<div class="clearboth"></div>
		<!-- login functionality -->
		<div id="form_sig" <? if($register=='register')	{ echo 'style="display:none;"'; } ?>>
			<?php /* if($session_data = $this->session->userdata('logged_in')) { ?>
				<div>
					<p>Howdy! <?php echo $session_data['firstname']; ?>&nbsp|&nbsp
						<a href="<?php echo base_url('profile'); ?>">Profile</a>&nbsp|&nbsp
						<?php if($session_data['role']=='user') { ?>
							<a href="<?php echo base_url('home'); ?>">Resume</a>&nbsp|&nbsp
						<?php } else if($session_data['role']=='member') { ?>
							<a href="<?php echo base_url('member/searchresume'); ?>">Search</a>&nbsp|&nbsp
							<a href="<?php echo base_url('member/selectedResume'); ?>">Selected Resume</a>&nbsp|&nbsp
						<?php } else if($session_data['role']=='admin') { ?>
							<a href="<?php echo base_url('admin'); ?>">User List</a>&nbsp|&nbsp
						<?php } ?>
						<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
					</p>
				</div>
				<?php } else { */ ?>
			<div >
				
				<form>
					<div>
						<input type="text"  class="login" placeholder="Email" id="username" name="username">
						<span class="login"><input type="checkbox" id="c1" class="form_checkbox" /><span class="rem_pad">Remember me</span></span>
            <label for="c1">
            </label>
					</div>
					<div>
						<input type="password" class="login" placeholder="Password" id="passowrd" name="password">
						<input type="text"  class="forget" placeholder="Email" id="fusername" name="fusername" style="display:none;">
						<span id="forget" class="login" >Forgot Password?</span>
						<span id="back_to_login" class="forget clickr" style="display:none;">Cancle</span>
					</div>
					<span id="error_msg" ></span>
						<div>
							<span class="clickr login" id="loginsubmit" >Sign in</span>
				    		<span class="clickr forget" id="forgetsubmit" style="display:none;">Submit</span>
						</div>
			    </form>
			</div>		
			<?php /* } */ ?>
		</div>
		<div id="form_reg" <? if($register!='register')	{ echo 'style="display:none;"'; } ?>>
			<h2>New to Resume Builder? Sign Up </h2>
			<form id="registration_form">
				<label for="firstname">First name *</label>
			    <input type="text" name="firstname" id="firstname" placeholder="First name" value="<?php echo $sess_user_detail['user_detail']['first_name']; ?>" />
				<span class="error_msg" id="firstname_err1"></span>
				<label  for="lastname">Last name *</label>
			    <input type="text" name="lastname" id="lastname" placeholder="Last name" value="<?php echo $sess_user_detail['user_detail']['last_name']; ?>" />
			 	<span class="error_msg" id="lastname_err1"></span>
			 	<label  for="inputEmail">Email *</label>
			   	<input type="email" class="email_check" name="email_address" id="inputEmail" placeholder="Email" value="<?php echo $sess_user_detail['user_detail']['secondary_email']; ?>" />
			    <span class="error_msg" id="email_err1"></span>
			    <label  for="inputPassword">Password *</label>
			    <input type="password"  name="pass_word" id="inputPassword" placeholder="Password">
			    <span class="error_msg" id="password_err1"></span>
			    <div style="display:none;">
					<label for="role">Account Type</label>
					<input type="radio" name="role" id="role" value="user" checked="checked" >User
					<input type="radio" name="role" id="role" value="member">Member
			    </div>
			    <label>Refer friends *</label>
			 	<table class="reg_tr_remove">
				  	<!-- <th>
				  		<td colspan='2'>Reffer Friends</td>
				  	</th> -->
				  	<tr>
				  		<td>Friend 1:</td>
				  		<td>&nbsp<input type="email" name="friend_email[]" class="email_check friend_emails" /></td>
				  		<td></td>
				  	</tr>
				  	<tr>
				  		<td>Friend 2:</td>
				  		<td>&nbsp<input type="email" name="friend_email[]" class="email_check friend_emails" /></td>
				  		<td><span class="error_msg" id="error_msg1"></span></td>
				  	</tr>
				</table>
				 <span class="error_msg" id="error_msg1"></span>
				<span class="clickr" id="signupsubmit">Sign Up</span>
			</form>
		</div>
	</div>	
</div>

</div>
</div>

<script type="text/javascript" src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.cookie.js');?>"></script>
<script src="<?php echo base_url('assets/js/login.js');?>"></script>
	
