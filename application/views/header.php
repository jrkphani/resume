<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Resume Builder</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/css_site.css"); ?>" />
<!--<script src="http://code.jquery.com/jquery-latest.min.js"></script>-->
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>

<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>
</head>
<body>
	<header class="container-fluid mainHeader">
		<div class="row-fluid">
			<div class="headerLogo span2">
				<h1><a href="<?=base_url()?>" title="Resume Builder">Resume Builder</a></h1>
			</div>
			<?php if($session_data = $this->session->userdata('logged_in')) {
					?>
					<div class="span10 headerRight">
						<p>Howdy! <?php echo $session_data['firstname']; ?> | <a href="<?php echo base_url('profile'); ?>">Profile</a> | <a href="<?php echo base_url('login/logout'); ?>">Logout</a></p>
					</div>
					<?php } else { ?>
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
			<?php } ?>
		</div>
	</header>