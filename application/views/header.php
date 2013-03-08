<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Resume Builder</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/css_site.css"); ?>"/>
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
				<h1><a href="#" title="Resume Builder">Resume Builder</a></h1>
			</div>
			<?php if($session_data = $this->session->userdata('logged_in')) {
					?>
					<div class="span10 headerRight">
						<p>Howdy! <?php echo $session_data['lastname']; ?> | <a href="<?php echo base_url('login/logout'); ?>">Logout</a></p>
					</div>
					<?php } else { ?>
			<div class="span6 offset3 signIn">
				<span id="error_msg"></span>
					
				<form class="form-inline">
 					 <input type="text" class="input-medium" placeholder="Email" id="username" name="username">
  					 <input type="password" class="input-medium" placeholder="Password" id="passowrd" name="password">
 					 <label class="checkbox"> 
 					 	<input type="checkbox"> Remember me
  					 </label>
				     <span id="loginsubmit" class="btn btn-small btn-primary">Sign in</span>
				</form>
			</div>
			<?php } ?>
		</div>
	</header>
