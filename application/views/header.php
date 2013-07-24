<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<link rel="icon" type="image/png" href="<?php echo base_url("assets/img/favicon.png"); ?>">
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

		<h1><a class="ezcv_logo" href="<?php echo base_url(); ?>"><img src="<?php echo base_url("assets/img/ezcv-logo.png"); ?>"> </a></h1>
		<nav>
			<a href="<?php echo base_url(); ?>" class="ezcv_header_current">Home</a>
			<a href="<?php echo base_url(); ?>">Why EZCV</a>
			<a href="<?=base_url('templates'); ?>">Resume Templates</a>
			<!--<a href="<?=base_url('blog'); ?>">Blog</a>
			<a href="<?=base_url('testimonials'); ?>">Testimonials</a>-->
		</nav>
		<hr/>
		<nav>
			<?php if($session_data = $this->session->userdata('logged_in')) { ?>
			<a href="<?php echo base_url('profile'); ?>"><?php echo $session_data['firstname']; ?></a>
			<a href="<?php echo base_url('resume'); ?>">My Resume</a>
			<a href="#">My Recommendations</a>
			<a href="#">Refer Friends</a>
			<a href="#">My Page</a>
			<a href="#">My Portfolio Space</a>
			<a href="#">My Contact List</a>
			<a href="#">Resume On Mobile</a>
			<a href="<?php echo base_url('login/logout'); ?>">Logout</a>
			<?php } else { ?>
			<a href="<?php echo base_url('login'); ?>">Register | Sign in</a>
			<?php } ?>
			<a href="<?php echo base_url('feedback'); ?>">Feedback</a>
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
	
	<!-- login functionality 

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
					
			<?php } ?>
		</div>
	</header>-->
	
	<!-- login functionality end-->