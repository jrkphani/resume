<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Resume Builder</title>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/css_site.css"); ?>"/>

</head>
<body>
	<header class="container-fluid mainHeader">
		<div class="row-fluid">
			<div class="headerLogo span2">
				<h1><a href="#" title="Resume Builder">Resume Builder</a></h1>
			</div>
			<div class="span6 offset3 signIn">
				<?php echo validation_errors(); ?>
				<form class="form-inline" action="verifylogin" method="POST">
 					 <input type="text" class="input-medium" placeholder="Email" id="username" name="username">
  					 <input type="password" class="input-medium" placeholder="Password" id="passowrd" name="password">
 					 <label class="checkbox"> 
 					 	<input type="checkbox"> Remember me
  					 </label>
				     <button type="submit" class="btn btn-small btn-primary">Sign in</button>
				</form>

			</div>
		</div>
	</header>
	<div class="row-fluid" >
		<div class="span4 offset2 video">
 			
		</div>
		<div class="span4  signUp">
			<h4>New to Resume Builder? Sign Up </h4>
			<form class="form-horizontal">
				<div class="control-group">
			    <label class="control-label" for="input">Username</label>
			    <div class="controls">
			      <input type="text" class="input-xlarge" id="username" placeholder="Username">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputEmail">Email</label>
			    <div class="controls">
			      <input type="text" class="input-xlarge" id="inputEmail" placeholder="Email">
			    </div>
			  </div>
			  <div class="control-group">
			    <label class="control-label" for="inputPassword">Password</label>
			    <div class="controls">
			      <input type="password" class="input-xlarge" id="inputPassword" placeholder="Password">
			    </div>
			  </div>
			  <div class="control-group">
			    <div class="controls">
			        <button type="submit" class="btn btn-large btn-primary">Sign Up</button>
			    </div>
			  </div>
			</form>
		</div>	
	</div>	
	
	 <footer class="container-fluid" >
	 	<div class="row-fluid">
			<div class="footerLogo offset9 span3 ">
				<h1><a href="#" title="DigitalChakra">DigitalChakra</a></h1>
			</div>
		</div>
	 </footer>
</body>
</html>
