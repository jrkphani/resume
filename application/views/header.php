<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="images/favicon.png">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="Create cv online, create resume online,  Resume builder, EZCV">
<meta name="description" content="Get noticed in a see of Resume">
<title>EZCV | Get noticed in the sea of resumes</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_header.css"); ?>" />
<script src="<?php echo base_url("assets/js/jquery.js"); ?>"></script>
<script type="text/javascript">
  var baseurl = "<?php print base_url(); ?>";
</script>
</head>
<body>
<header id="ezcv_header">

		<h1><a class="ezcv_logo" href="#"><img src="<?php echo base_url("assets/img/ezcv-logo.png"); ?>"> </a></h1>
		<nav>
			<a href="#" class="ezcv_header_current">Home</a>
			<a href="#">Why EZCV</a>
			<a href="#">Resume Templates</a>
			<a href="#">Blog</a>
			<a href="#">Testimonials</a>
		</nav>
		<hr/>
		<nav>
			<p>User Name</p>
			<a href="#">My Resume Templates</a>
			<a href="#">My Recommendations</a>
			<a href="#">Refer Friends</a>
			<a href="#">My Page</a>
			<a href="#">My Portfolio Space</a>
			<a href="#">My Contact List</a>
			<a href="#">Resume On Mobile</a>
		</nav>
		
	</header>
	<div id="ezcv_content">
		<div class="ezcv_content_inner">
		<header class="topheader">
			<h1>Get noticed in a sea of resumes</h1>
			<div class="topheader_contact">
				<h4>Contact us</h4>
				<ul>
					<li><a class="c1" href="">Mail EZCV</a></li>
					<li><a class="c2" href="">Twitter EZCV</a></li>
					<li><a class="c3" href="">Facebook EZCV</a></li>
					<li><a class="c4" href="">Dribble EZCV</a></li>
					<li><a class="c5" href="">Phone EZCV</a></li>
				</ul>
			</div>
			
		</header>
	
	<!-- login functionality -->
	<!--<header class="container-fluid mainHeader">
		<div class="row-fluid">
			<div class="headerLogo span2">
				<h1><a href="<?=base_url()?>" title="Resume Builder">Resume Builder</a></h1>
			</div>
			<?php if($session_data = $this->session->userdata('logged_in')) { ?>
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
	</header>-->
	
	<!-- login functionality end-->