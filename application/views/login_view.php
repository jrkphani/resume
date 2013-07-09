<!-- login functionality -->
	<header class="container-fluid mainHeader">
		<div class="row-fluid">
			<?php /* if($session_data = $this->session->userdata('logged_in')) { ?>
					<div class="span10 headerRight">
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
			<div class="span8 offset1 signIn">
				<div class="signIn-Inner">
					<span id="error_msg" class="signInError"></span>
					<form class"signInRight">
						<div class="signIn-email">
							<input type="text"  class="login" placeholder="Email" id="username" name="username">
							<input type="checkbox" id="c1" />
	            			<label for="c1" class="checkbox" style="display:none;"><span></span>Remember me</label>
						</div>
						<div class="signIn-pass">
							<input type="password" class="login" placeholder="Password" id="passowrd" name="password">
							<input type="text"  class="forget" placeholder="Email" id="fusername" name="fusername" style="display:none;">
							<span id="forget" class="signIn-fp login" >Forgot Password?</span>
							<span id="login" class="forget signIn-fp" style="display:none;">Login</span>
						</div>
	 					<div class="signIn-Button">
	 						<span id="loginsubmit" class="button login">Sign in</span>
					    	<span id="forgetsubmit" class="forget button" style="display:none;">Submit</span>
	 					</div>
				     
					</form>
				</div>		
			</div>
			<?php /* } */ ?>
		</div><br />
	</header>

	<div class="row-fluid loginPage" style="height:520px;">
		<div class="span4 offset2 video">
 			
		</div>
		<div class="span5  signUp">
			<h4>New to Resume Builder? Sign Up </h4>
			<span id="error_msg1" class="errorMessage"></span>

			<form class="form-horizontal" id="registration_form">
				<div class="control-group">
			    <label class="control-label" for="input">First name</label>
			    <div class="controls">
			      <input type="text" class="input-xlarge" name="firstname" id="firstname" placeholder="First name">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="input">Last name</label>
			    <div class="controls">
			      <input type="text" class="input-xlarge" name="lastname" id="lastname" placeholder="Last name">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputEmail">Email</label>
			    <div class="controls">
			      <input type="email" class="input-xlarge email_check" name="email_address" id="inputEmail" placeholder="Email">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputPassword">Password</label>
			    <div class="controls">
			      <input type="password" class="input-xlarge" name="pass_word" id="inputPassword" placeholder="Password">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputType">Type</label>
			    <div class="controls">
			      <input type="radio" name="role" id="role" value="user" checked="checked" >User&nbsp&nbsp
			      <input type="radio" name="role" id="role" value="member">Member
			    </div>
			  </div>
			  <div class="control-group">
			  	<div class="controls">
				  <table>
				  	<th>
				  		<td colspan='2'>Reffer Friends</td>
				  	</th>
				  	<tr>
				  		<td>Friend 1:</td>
				  		<td>&nbsp<input type="email" name="friend_email[]" class="email_check" /></td>
				  	</tr>
				  	<tr>
				  		<td>Friend 2:</td>
				  		<td>&nbsp<input type="email" name="friend_email[]" class="email_check" /></td>
				  	</tr>
				  </table>
			</div>
			</div>
			  <div class="control-group">
			    <div class="controls">
			        <span id="signupsubmit" class="signUpbutton">Sign Up</span>
			    </div>
			  </div>
			</form>
		</div>	
	</div>	
	<script type="text/javascript" src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
	<script src="<?php echo base_url('assets/js/login.js');?>"></script>
	
