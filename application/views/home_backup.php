<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

		<title>index</title>
		<meta name="description" content="" />
		<meta name="author" content="Mani" />

		<meta name="viewport" content="width=device-width; initial-scale=1.0" />
	</head>

	<body>
		<div>
			<header>
				<h1>index</h1>
			</header>
			<nav>
				<p>
					<a href="/">Home</a>
				</p>
				<p>
					<a href="/contact">Contact</a>
				</p>
			</nav>
			<div id="file_upload">
			<form method="post" action="" id="upload_file">
			  <label for="userfile">File</label>
			  <input type="file" name="userfile" id="userfile" size="20" />
			  <input type="submit" name="submit" id="submit" />
			</form>
			</div>
			<div>
				<img src="" id="profile_pic" />
			</div>
			<div id="form_panle">
			<form id="resume_form" method="post" action="<?php echo base_url('preview'); ?>">
					<div>
						<input class="formAtrr" type="text" name="name" placeholder="Name"/>
					</div>
					<div>
						<input type="hidden" name="img" id="img" value="" />
					</div>
					<div>
						<input class="formAtrr" type="email" name="email" placeholder="Email"/>
					</div>
					<div>
						<input class="formAtrr" type="number" name="mobile" placeholder="Mobile"/>
					</div>
					<div>
						<textarea class="formAtrr" name="address" placeholder="Address"></textarea>
					</div>
					<div>
						<label>Experience : </label>
						<input class="formAtrr" type="text" name="experience" placeholder="Experience" />
					</div>
					<div>
						<label>Objectives</label>
					</div>
					<div>
						<ul id="fromObj">
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
							<li>
								<textarea class="objectives" name="objectives[]" placeholder="objective"></textarea>
							</li>
							<span class="removeObj" >Remove</span>
						</ul>
						<div id="addObj">Add</div>
					</div>
					<div>
						<input type="submit" />
					</div>
			</form>
			</div>
			<footer>
				<p>
					&copy; Copyright  by Mani
				</p>
			</footer>
		</div>
	</body>
</html>
		<div class="row-fluid">
			
	 		<div class="span7 offset1 templateForm">
	 			
	 			<!--T1_form-->
	 			<form class="form-horizontal">
					  <div class="control-group">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      <input class="span4" type="text" placeholder="First name">

					      <input class="span4 leftMargin" type="text"  placeholder="Last name">
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Tag line</label>
					    <div class="controls">
					      <input class="span8" type="text"  placeholder="Designation / key skills">
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Contact</label>
					    <div class="controls">
					      <input class="span4" type="text" placeholder="Phone">

					      <input class="span4 leftMargin" type="email"  placeholder="Email">
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Address</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  placeholder="Address"></textarea>
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Website</label>
					    <div class="controls">
					      <input class="span8" type="text"  placeholder="url">
					    </div>
					  </div>
					  <!--******************************************Experience********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Experience</label>
					    <div class="controls">
					      <input class="span8" type="text"  placeholder="No of years">
					    </div>
					  </div>
					  
					  <!--******************************************Company 1********************************/-->
					  

						<div class="control-group topBorder">
						  	<label class="control-label">Company 1</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="Company name">
						      <input class="span4 leftMargin" type="text"  placeholder="Designation">
						    </div>
						  </div>
						  
						  <div class="control-group ">
						    <label class="control-label">Period</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="(2005)(Feb 2005)">
						      to
						      <input class="span4" type="text"  placeholder="(2007)(Mar 2007)">
						    </div>
						  </div>
						  <div class="control-group ">
						    <label class="control-label">Description</label>
						    <div class="controls">
						      <textarea rows="3" class="input span8" type="text"  placeholder="Description"></textarea>
						    </div>
						  </div>
						  
						
					<!--******************************************Company added********************************/-->
 					<div class="formBorder">
					<button class="removeButton">Remove</button>
					  <div class="control-group">
					    <label class="control-label">Company 2</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="Company name">
					      <input class="span4 leftMargin" type="text"  placeholder="Designation">
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Period</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="(2005)(Feb 2005)">
					      to
					      <input class="span4" type="text"  placeholder="(2007)(Mar 2007)">
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Description</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  placeholder="Description"></textarea>
					    </div>
					  </div>
					  </div>
					 	<div class="control-group ">
					    <label class="control-label">Add company</label>
					    <div class="controls">
					      <button>Add</button>
					    </div>
					  </div>
					
						<!--******************************************Skills 1********************************/-->
					  <div class="control-group topBorder">
					    <label class="control-label">Key Skills</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="Skill name">
					      <input class="span4 leftMargin" type="text"  placeholder="SubTitle">
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Effeciency</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="Master, Intermediate, Adept etc., ">
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Description</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  placeholder="Description"></textarea>
					    </div>
					  </div>

					 	
					  <!--******************************************Skills added********************************/-->
					  <div class="formBorder">
							<button class="removeButton">Remove</button>
						  <div class="control-group ">
						    <label class="control-label">Key Skills</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="Skill name">
						      <input class="span4 leftMargin" type="text"  placeholder="SubTitle">
						    </div>
						  </div>
					  
						  <div class="control-group ">
						    <label class="control-label">Effeciency</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="Master, Intermediate, Adept etc., ">
						    </div>
						  </div>
						  <div class="control-group ">
						    <label class="control-label">Description</label>
						    <div class="controls">
						      <textarea rows="3" class="input span8" type="text"  placeholder="Description"></textarea>
						    </div>
						  </div>

						 	
						</div> 	
						<div class="control-group ">
						    <label class="control-label">Add skill</label>
						    <div class="controls">
						      <button>Add</button>

						    </div>
						  </div>


						  <!--============================================Other skills==========================================-->
							<div class="control-group ">
						    	<label class="control-label">Other Skills</label>
						    	<div class="controls">
						      		<input class="span4" type="text"  placeholder="Skill name">
						      		<button>Add</button>
						      		 <button>Remove</button>
						    	</div>
						  	</div>


						  	  <!--******************************************Project********************************/-->
					  

						<div class="control-group topBorder">
						  	<label class="control-label">Project 1</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="Project name">
						      <input class="span4 leftMargin" type="text"  placeholder="Role">
						    </div>
						  </div>
						  
						  <div class="control-group ">
						    <label class="control-label">Period</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="(2005)(Feb 2005)">
						      to
						      <input class="span4" type="text"  placeholder="(2007)(Mar 2007)">
						    </div>
						  </div>
						  <div class="control-group ">
						    <label class="control-label">Description</label>
						    <div class="controls">
						      <textarea rows="3" class="input span8" type="text"  placeholder="Description"></textarea>
						    </div>
						  </div>
						  
						
					<!--******************************************Project added********************************/-->
 					<div class="formBorder">
					<button class="removeButton">Remove</button>
					  <div class="control-group">
					    <label class="control-label">Project 2</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="Project name">
					      <input class="span4 leftMargin" type="text"  placeholder="Role">
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Period</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="(2005)(Feb 2005)">
					      to
					      <input class="span4" type="text"  placeholder="(2007)(Mar 2007)">
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Description</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  placeholder="Description"></textarea>
					    </div>
					  </div>
					  </div>
					 	<div class="control-group ">
					    <label class="control-label">Add Project</label>
					    <div class="controls">
					      <button>Add</button>
					    </div>
					  </div>

 					<!--******************************************Education********************************/-->
					  

						<div class="control-group topBorder">
						  	<label class="control-label">Edudcation 1</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="Institution">
						      <input class="span4 leftMargin" type="text"  placeholder="Certification">
						    </div>
						  </div>
						  
						  <div class="control-group ">
						    <label class="control-label">Period</label>
						    <div class="controls">
						      <input class="span4" type="text"  placeholder="(2005)(Feb 2005)">
						      to
						      <input class="span4" type="text"  placeholder="(2007)(Mar 2007)">
						    </div>
						  </div>
						  <div class="control-group ">
						    <label class="control-label">Score</label>
						    <div class="controls">
						      <textarea rows="3" class="input span8" type="text"  placeholder="Score"></textarea>
						    </div>
						  </div>
						  
						
					<!--******************************************Edudcation added********************************/-->
 					<div class="formBorder">
					<button class="removeButton">Remove</button>
					  <div class="control-group">
					    <label class="control-label">Edudcation 2</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="Institution">
					      <input class="span4 leftMargin" type="text"  placeholder="Certification">
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Period</label>
					    <div class="controls">
					      <input class="span4" type="text"  placeholder="(2005)(Feb 2005)">
					      to
					      <input class="span4" type="text"  placeholder="(2007)(Mar 2007)">
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Score</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  placeholder="Score"></textarea>
					    </div>
					  </div>
					  </div>
					 	<div class="control-group ">
					    <label class="control-label">Add Education</label>
					    <div class="controls">
					      <button>Add</button>
					    </div>
					  </div>


						  <div class="control-group">
						    <div class="controls">
						       <button type="submit">Submit</button>
						       <button >Reset</button>
						    	<button>Cancel</button>
						    </div>
						  </div>
				</form>
			</div>
		</div>

<script src="http://code.jquery.com/jquery-latest.min.js"></script>
<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>
		<script>
			$(document).ready(function()
			{
				 $('#upload_file').submit(function(e) {
      e.preventDefault();
      $.ajaxFileUpload({
         url         :'./upload/upload_file/',
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         data        : {
            'title'           : $('#title').val()
         },
         success  : function (data, status)
         {
            if(data.status != 'error')
            {
				$('#profile_pic').attr('src',data.imgUrl);
				$('#img').val(data.fname);
               //$('#files').html('<p>Reloading files...</p>');
              // refresh_files();
               //$('#title').val('');
            }
            alert(data.msg);
         }
      });
      return false;
   });
   $('#addObj').click(function()
				{
					$('#fromObj').append('<li><textarea class="objectives" name="objectives[]" placeholder="objective"></textarea></li><span class="removeObj" >Remove</span>');
					$('.removeObj').click(function(){
					$(this).prev().remove();
					$(this).remove();
					});
				});
	$('.removeObj').click(function(){
					$(this).prev().remove();
					$(this).remove();
					});	
			});
		</script>
		<a href="home/logout">Logout</a>
