		<div class="row-fluid">
			
	 		<div class="span7 offset1 templateForm">
	 			
	 			<!--T1_form-->
	 			<form class="form-horizontal" id="resume_form" method="post" action="<?php echo base_url('preview'); ?>">
	 			<input type="hidden" value="T1" name="css" />
					  <div class="control-group">
					    <label class="control-label">Name</label>
					    <div class="controls">
					      <input class="span4" type="text" name="fname" placeholder="First name">

					      <input class="span4 leftMargin" name="lname" type="text"  placeholder="Last name">
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Tag line</label>
					    <div class="controls">
					      <input class="span8" type="text"  name="designation" placeholder="Designation / key skills">
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Contact</label>
					    <div class="controls">
					      <input class="span4" type="text"  name="phone" placeholder="Phone">

					      <input class="span4 leftMargin"  name="email" type="email"  placeholder="Email">
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Address</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  name="address" placeholder="Address"></textarea>
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Website</label>
					    <div class="controls">
					      <input class="span8" type="text"  name="mysite" placeholder="url">
					    </div>
					  </div>
					  <!--******************************************Experience********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Experience</label>
					    <div class="controls">
					      <input class="span8" type="text" name="experience" placeholder="No of years">
					    </div>
					  </div>
					  
					    	<!--******************************************Objectives********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Objective</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" name="objective" type="text"  placeholder="Objective"></textarea>
					    </div>
					  </div>
					  
					  <!--******************************************Summary********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Summary</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" name="summary" type="text"  placeholder="Summary"></textarea>
					    </div>
					  </div>

					  	<!--******************************************Skills 1********************************/-->
					  <div class="control-group topBorder">
					    <label class="control-label">Key Skills</label>
					    <div class="controls">
					      <input class="span4" type="text"  name="skillName[]" placeholder="Skill name">
					      <input class="span4 leftMargin" name="skillTitle[]" type="text"  placeholder="SubTitle">
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Effeciency</label>
					    <div class="controls">
					      <input class="span4" type="text"  name="skillEff[]" placeholder="Master, Intermediate, Adept etc., ">
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Description</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" name="skillDesc[]" type="text"  placeholder="Description"></textarea>
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
						      		<input class="span4" type="text"  name="otherSkills[]" placeholder="Skill name">
						      		<button>Add</button>
						      		 <button>Remove</button>
						    	</div>
						  	</div>

						  
					  <!--******************************************Company 1********************************/-->
					  

						<div class="control-group topBorder">
						  	<label class="control-label">Company 1</label>
						    <div class="controls">
						      <input class="span4" type="text" name="cmpnyName[]" placeholder="Company name">
						      <input class="span4 leftMargin" name="cmpnyDesg[]" type="text"  placeholder="Designation">
						    </div>
						  </div>
						  
						  <div class="control-group ">
						    <label class="control-label">Period</label>
						    <div class="controls">
						      <input class="span4" type="text"  name="cmpnyFrom[]" placeholder="(2005)(Feb 2005)">
						      to
						      <input class="span4" type="text"  name="cmpnyTo[]" placeholder="(2007)(Mar 2007)">
						    </div>
						  </div>
						  <div class="control-group ">
						    <label class="control-label">Description</label>
						    <div class="controls">
						      <textarea rows="3" class="input span8" name="cmpnyDesc[]" type="text"  placeholder="Description"></textarea>
						    </div>
						  </div>
						  
					 	<div class="control-group ">
					    <label class="control-label">Add company</label>
					    <div class="controls">
					      <button>Add</button>
					    </div>
					  </div>
						  	  <!--******************************************Project********************************/-->
					  

						<div class="control-group topBorder">
						  	<label class="control-label">Project 1</label>
						    <div class="controls">
						      <input class="span4" type="text" name="projName[]"  placeholder="Project name">
						      <input class="span4 leftMargin" name="projRole[]" type="text"  placeholder="Role">
						    </div>
						  </div>
						  
						  <div class="control-group ">
						    <label class="control-label">Period</label>
						    <div class="controls">
						      <input class="span4" type="text"  name="projFrom[]" placeholder="(2005)(Feb 2005)">
						      to
						      <input class="span4" type="text"  name="projTo[]" placeholder="(2007)(Mar 2007)">
						    </div>
						  </div>
						  <div class="control-group ">
						    <label class="control-label">Description</label>
						    <div class="controls">
						      <textarea rows="3" class="input span8" name="projDesc[]" type="text"  placeholder="Description"></textarea>
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
						      <input class="span4" type="text" name="eduInst[]" placeholder="Institution">
						      <input class="span4 leftMargin" name="eduCert[]" type="text"  placeholder="Certification">
						    </div>
						  </div>
						  
						  <div class="control-group ">
						    <label class="control-label">Period</label>
						    <div class="controls">
						      <input class="span4" type="text"  name="eduFrom[]" placeholder="(2005)(Feb 2005)">
						      to
						      <input class="span4" type="text"  name="eduTo[]" placeholder="(2007)(Mar 2007)">
						    </div>
						  </div>
						  <div class="control-group ">
						    <label class="control-label">Score</label>
						    <div class="controls">
						      <textarea rows="3" class="input span8" name="eduScore[]" type="text"  placeholder="Score"></textarea>
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
