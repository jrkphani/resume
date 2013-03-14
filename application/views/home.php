		<div class="row-fluid">
			
	 		<div class="span7 offset1 templateForm">
	 			
	 			<!--T1_form-->
	 			<form class="form-horizontal" id="resume_form">
	 			<input type="hidden" value="" id="template" name="template" autocomplete="off" />
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
					 <div id="skills">
					 	<div id="s0">
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
						</div>
					</div>
					
					<div class="control-group ">
						   <!-- <label class="control-label">Add skill</label>-->
						    <div class="controls">
						      <span class="button"  id="addSkills">Add skill</span>

						    </div>
						  </div>
						  
						  <!--============================================Other skills==========================================-->
							<div class="control-group">
						    	<label class="control-label">Other Skills</label>
						    	<div class="controls" id="oskills">
						    		<div id="os0">
						      		<input class="span4" type="text"  name="otherSkills[]" placeholder="Skill name">
						      		</div>
						    	</div>
						    	<div class="controls">
						    	<span class="button"  id="addOskills">Add skill</span>
						    	</div>
						  	</div>

						  
					  <!--******************************************Company 1********************************/-->
					  
					<div id="company">
					  <div id="c0">
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
					  </div>
					</div>
						<!--<label class="control-label">Add company</label>-->
					 	<div class="control-group ">
					    <div class="controls">
					      <span class="button"  id="addCompany">Add company</span>
					    </div>
					  </div>
						  	  <!--******************************************Project********************************/-->
					  
					<div id="project">
						<div id="p0">
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
						</div>
					</div>
						 
					 	<div class="control-group ">
					    <!--<label class="control-label">Add Project</label>-->
					    <div class="controls">
					      <span class="button"  id="addProject">Add project</span>
					    </div>
					  </div>
					  
					  <!--******************************************Education********************************/-->
					  
				<div id="edudcation">
					<div id="e0">
						<div class="control-group topBorder">
						  	<label class="control-label">Edudcation</label>
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
					</div>
				</div>	  
						  <div class="control-group ">
					    <!--<label class="control-label">Add Education</label>-->
					    <div class="controls">
					      <span class="button"  id="addEdudcation" value="0">Add Edudcation</span>
					    </div>
					  </div>
					  
						  <div class="control-group">
						    <div class="controls">
						       <span class="button" id="resume_submit"> Submit</span>
						       <span class="button"  >Reset</span>
						    	<span class="button" >Cancel</span>
						    </div>
						  </div>
				</form>
			</div>
		</div>
		 <div class="selectTemplate">
	 				<div class="selectTemplateInner ">
						<div class="templateCell" id="T1">
				 				<div class="templateThumbnail">
				 				</div>	
				 				<div class="templateContent">
				 					<h4>Corporate Template</h4>
				 					<br/>
				 					<br/>
				 					<button class="btn-block" id="p_T1">Preview</button>
				 					<button class="btn-block template" value="T1">Select</button>
				 				</div>
			 				</div>
			 				<div class="templateCell" id="T2">
				 				<div class="templateThumbnail">
				 				</div>	
				 				<div class="templateContent">
				 					<h4>Corporate Template</h4>
				 					<br/>
				 					<br/>
				 					<button class="btn-block" id="p_T2">Preview</button>
				 					<button class="btn-block  template" value="T2">Select</button>
				 				</div>
			 				</div>
			 				<div class="templateCell" id="T3">
				 				<div class="templateThumbnail">
				 				</div>	
				 				<div class="templateContent">
				 					<h4>Corporate Template</h4>
				 					<br/>
				 					<br/>
				 					<button class="btn-block" id="p_T3">Preview</button>
				 					<button class="btn-block template" value="T3">Select</button>
				 				</div>
			 				</div>
						<div class="templateCell" id="T4">
				 				<div class="templateThumbnail">
				 				</div>	
				 				<div class="templateContent">
				 					<h4>Corporate Template</h4>
				 					<br/>
				 					<br/>
				 					<button class="btn-block" id="p_T4">Preview</button>
				 					<button class="btn-block template" value="T4">Select</button>
				 				</div>
			 				</div>
					</div>
				 </div>
		<script src="<?php echo base_url('assets/js/home.js');?>"></script>
