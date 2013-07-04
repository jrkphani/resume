<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/colorbox.css"); ?>"/>
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.toastmessage.css"); ?>"/>
<div id="toast"></div>-->

<div>
	<br/>
	<span tab='#about_tab' class="tab">About | </span>
	<span tab='#objective_tab' class="tab">Designation,Objective | </span>
	<span tab='#contact_tab' class="tab">Contact Me | </span>
	<span tab='#experience_tab' class="tab">Experience Summary | </span>
	<span tab='#strength_tab' class="tab">My Strength | </span>
	<span tab='#tool_tab' class="tab">My Tool Box | </span>
	<span tab='#milestones_tab' class="tab">My Milestones | </span>
	<span tab='#edication_tab' class="tab">Edication & Awards | </span>
	<span tab='#moreabout_tab' class="tab">More About Me</span>
</div>


<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>
		<div class="row-fluid">
			
	 		<div class="span7 offset1 templateForm">
	 			
	 			<!-- ================================ form start ================================ -->
	 			<form class="form-horizontal" id="resume_form">
	 			<input type="hidden" name="user_id" value="<?php echo $user_id; ?>" id="user_id" />
	 			<input type="hidden" name="photo" id="photo" value="<?php if($photo) { echo base_url($this->config->item('path_profile_img').$user_id.'/'.$photo); } ?>" />
	 			<input type="hidden" value="" id="template" name="template" autocomplete="off" />
                <input type="hidden" name="download_file" id="download_file" />
                <input type="hidden" name="remove_skills" value="" id="remove_skills" />
				<input type="hidden" name="remove_company" value="" id="remove_company" />
				<input type="hidden" name="remove_project" value="" id="remove_project" />
				<input type="hidden" name="remove_education" value="" id="remove_education" />
				
				<!-- ================ About tab start ==================-->
				<div id="about_tab" class="tabs">
					  
					  <!-- First & Last name -->
					  <div class="control-group">
					    <label class="control-label" >Name</label>
					    <div class="controls">
					      <input class="span4" type="text" name="fname" placeholder="First name" value="<?php echo $first_name; ?>" />

					      <input class="span4 leftMargin" name="lname" type="text"  placeholder="Last name" value="<?php echo $last_name; ?>" />
					    </div>
					  </div>
					  
					  <!-- DOB -->
					  <div class="control-group ">
					    <label class="control-label">DOB</label>
					    <div class="controls">
					      <input class="span8" type="date"  name="dob" placeholder="dd-mm-yyyy" />
					    </div>
					  </div>
					  <!-- Address -->
					  <div class="control-group ">
					    <label class="control-label">Address</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  name="address" placeholder="Address"><?php echo $address; ?></textarea>
					    </div>
					  </div>
					  
					  <!-- Summary -->
					  <div class="control-group ">
							<div class="controls">
								<select name="">
									<option value="">About me</option>
									<option value="">Custom heading</option>
								</select>
							</div>
						</div>
						<div class="control-group ">
							<div class="controls">
							  <input class="span8" type="text"  name="" placeholder="Custom title" />
							</div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Summary</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" name="summary" type="text"  placeholder="Summary"><?php echo $summary; ?></textarea>
					    </div>
					  </div>
					  
					   <span class="button" >Continue</span>
				</div>
				 
				<!-- ================ About tab end ==================-->
				
				
					   <div style="float:right;">
                       		<?php if($photo) { ?>
                            	<img src="<? echo base_url($this->config->item('path_profile_img').$user_id.'/'.$photo); ?>" id="profile_pic" />
                            <?php } else { ?>
								<img src="<? echo base_url('assets/img/userPhoto.png'); ?>" id="profile_pic" />
                            <?php } ?>
                            <span id="uploadstate"></span>
						</div>
						
						
				<!-- ================ Designation,Objective tab start ==================-->
				<div id="objective_tab" class="tabs">
				<!-- Designation -->
					<div class="control-group ">
						<label class="control-label">Tag line</label>
						<div class="controls">
						  <input class="span8" type="text"  name="designation" placeholder="Designation / key skills" value="<?php echo $tag_line; ?>" />
					   </div>
					</div>
					
					<!-- Objectives -->
					  <div class="control-group ">
							<div class="controls">
								<select name="">
									<option value="">What I want</option>
									<option value="">Custom heading</option>
								</select>
							</div>
						</div>
						<div class="control-group ">
							<div class="controls">
							  <input class="span8" type="text"  name="" placeholder="Custom title" />
							</div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Objective</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" name="objective" type="text"  placeholder="Objective"><?php echo $objective; ?></textarea>
					    </div>
					  </div>
					
					 <span class="button" >Continue</span>
				</div>
				
				<!-- ================ Designation,Objective tab end ==================-->
						
					  
				<!-- ================ Contact Me tab start ==================-->
				<div id="contact_tab"  class="tabs">
					
					<div class="control-group ">
							<div class="controls">
								<select name="">
									<option value="">How to reach me</option>
									<option value="">Custom heading</option>
								</select>
							</div>
						</div>
						<div class="control-group ">
							<div class="controls">
							  <input class="span8" type="text"  name="" placeholder="Custom title" />
							</div>
					  </div>
					<div class="control-group">
					    <div class="controls">
					      <input class="span4" type="text"  name="phone" placeholder="Phone" value="<?php if($mobile) echo $mobile; else if($landline) echo $landline; ?>" />

					      <input class="span4 leftMargin"  name="email" type="email"  placeholder="Email" value="<?php echo $secondary_email; ?>" />
					    </div>
					  </div>
					  
					<div class="control-group ">
					    <label class="control-label">Website</label>
					    <div class="controls">
					      <input class="span8" type="url"  name="url[]" placeholder="url" value="<?php echo $website; ?>" />
					    </div>
					  </div>
					   <div class="control-group ">
					    <label class="control-label">Skype</label>
					    <div class="controls">
					      <input class="span8" type="text"  name="skype" placeholder="skype" value="<?php echo $website; ?>" />
					    </div>
					  </div>
					   <div class="control-group ">
					    <label class="control-label">twitter</label>
					    <div class="controls">
					      <input class="span8" type="url"  name="url[]" placeholder="twitter" value="<?php echo $website; ?>" />
					    </div>
					  </div>
					   <div class="control-group ">
					    <label class="control-label">facebook</label>
					    <div class="controls">
					      <input class="span8" type="url"  name="url[]" placeholder="facebook" value="<?php echo $website; ?>" />
					    </div>
					  </div>
					   <div class="control-group ">
					    <label class="control-label">linkedin</label>
					    <div class="controls">
					      <input class="span8" type="url"  name="url[]" placeholder="linkedin" value="<?php echo $website; ?>" />
					    </div>
					  </div>
					  
					   <span class="button" >Continue</span>
				</div>
				<!-- ================ Contact Me tab end ==================-->
					  
					  
				<!-- ================ Experience Summary tab start ==================-->
				<div id="experience_tab" class="tabs">
					
					<!-- Experience -->
					  <div class="control-group ">
					    <label class="control-label">Experience</label>
					    <div class="controls">
					      <input class="span8" type="text" name="experience" placeholder="No of years" value="<?php echo $experience; ?>" />
					    </div>
					  </div>
					  
					<!-- CTC -->
					<div class="control-group ">
					    <label class="control-label">Compensation</label>
					    <div class="controls">
					      <input class="span8" type="text" name="current" placeholder="Current" value="" />
					      <input class="span8" type="text" name="expected" placeholder="Expected" value="" />
					    </div>
					</div>
					
					  <!-- Company start-->
					  
					<div id="company">
					  <div id="c0">
						<?php if(sizeof($result3)==0) { ?>
						<div class="control-group topBorder">
						  	<label class="control-label">Company</label>
						    <div class="controls">
						      <input class="span4" type="text" name="cmpnyName[]" placeholder="Company name">
                              <input type="hidden" name="cmpnyNameID[]" />
                              
						      <input class="span4 leftMargin" name="cmpnyDesg[]" type="text"  placeholder="Designation">
						    </div>
						</div>
						  
						<div class="control-group">
							<label class="control-label">Period</label>
							<div class="controls">
								<input class="span4" type="date"  name="cmpnyFrom[]" placeholder="(2005)(Feb 2005)" />
								to
								<input class="span4" type="date"  name="cmpnyTo[]" placeholder="(2007)(Mar 2007)" />
							</div>
						</div>

						<?php } else { ?>
						<!-- Exist company start-->
						
                        <!-- Exist company end-->
						<?php } ?>
					  </div>
					</div>

					<div class="control-group ">
					    <div class="controls">
					      <span class="button"  id="addCompany" value="0">Add company</span>
					    </div>
					  </div>
					
					 <span class="button" >Continue</span>
				</div>
				
				<!-- ================ Experience Summary tab end ==================-->
				
				<!-- ================ My Strength tab start ==================-->
				
				<div id="strength_tab" class="tabs">
					 <!-- Other skills -->
							<div class="control-group topBorder ">
						    	<label class="control-label">Other Skills</label>
						    	<div class="controls otherSkillBox" id="oskills">
						    		<div id="os0">
						      		<input class="span4" type="text"  name="otherSkills[]" placeholder="Skill name">
						      		</div>
						    	</div>
						    	<div class="controls">
						    	<span class="button"  id="addOskills" value="0">Add skill</span>
						    	</div>
						  	</div>
						  	<!-- strength briefly -->
					  <div class="control-group ">
					    <label class="control-label">strength briefly</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  name="otherSkillsBrief" placeholder="Brief about strength"></textarea>
					    </div>
					  </div>
				
				 <span class="button" >Continue</span>
				</div>
				<!-- ================ My Strength tab end ==================-->
				
				<!-- ================ My Tool Box tab start ==================-->
				<div id="tool_tab" class="tabs">
					<!-- Skills -->
					 <div id="skills">
					 	<div id="s0">
						<?php if(sizeof($result2)==0) { ?>
							<div class="control-group topBorder">
								<label class="control-label">Key Skills</label>
								<div class="controls">
									<input class="span4" type="text"  name="skillName[]" placeholder="Skill name" />
                                    <input type="hidden"  name="skillNameID[]" />
								</div>
							</div>

							<div class="control-group ">
								<label class="control-label">Effeciency</label>
								<div class="controls">
									<input class="span4" type="text"  name="skillEff[]" placeholder="Master, Intermediate, Adept etc., ">
								</div>
							</div>
							
						<?php } else { ?>
						  <!-- Exist Skills start -->
							
                            <!--  Exist Skills end-->
						<?php } ?>
						</div>
					</div>
						<div class="control-group ">
						    <div class="controls">
						      <span class="button"  id="addSkills"  value="0">Add skill</span>
						    </div>
						</div>
				 <span class="button" >Continue</span>
				</div>
				
				<!-- ================ My Tool Box tab end ==================-->
				
				<!-- ================ My Milestones tab start ==================-->
				<div id="milestones_tab" class="tabs">
					<!--******************************************Project********************************/-->
					<div id="project">
						<div id="p0">
							<?php if(sizeof($result4)==0) { ?>
								<div class="control-group topBorder">
									<label class="control-label">Project</label>
									<div class="controls">
									  <input class="span4" type="text" name="projName[]"  placeholder="Project name">
									  <input type="hidden" name="projNameID[]"  />
									  
									  <input class="span4 leftMargin" name="projRole[]" type="text"  placeholder="Role">
									</div>
								</div>

								<div class="control-group ">
									<label class="control-label">Description</label>
									<div class="controls">
									  <textarea rows="3" class="input span8" name="projDesc[]" type="text"  placeholder="Description"></textarea>
									</div>
								</div>
								
								<div class="control-group ">
									<label class="control-label">Project Site</label>
									<div class="controls">
										<input name="projUrl[]" type="text"  placeholder="Project site" />
									</div>
								</div>
							<?php } else { ?>
							<!--******************************************Exist project********************************/-->
							
							<!--******************************************Exist Project********************************/-->
							<?php } ?>
						</div>
					</div>
					<div class="control-group ">
					<!--<label class="control-label">Add Project</label>-->
						<div class="controls">
						  <span class="button"  id="addProject" value="0">Add project</span>
						</div>
					</div>
					
					 <span class="button" >Continue</span>
				</div>
				
				<!-- ================ My Milestones tab end ==================-->
				
				
				<!-- ================ Edication & Awards tab start ==================-->
				<div id="edication_tab" class="tabs">
					<div id="edudcation">
					<div id="e0">
						<?php if(sizeof($result5)==0) { ?>
						<div class="control-group topBorder">
							<label class="control-label">Edudcation</label>
							<div class="controls">
								<input class="span4" type="text" name="eduInst[]" placeholder="Institution">
                                <input type="hidden" name="eduInstID[]" />
                                
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
								<input rows="3" class="input span8" name="eduScore[]" type="text"  placeholder="Score">
							</div>
						</div>
						<?php } else { ?>
						<!-- Exist project start-->

						<!-- Exist project end-->
						<?php } ?>
					</div>
				</div>	  
					<div class="control-group ">
					    <!--<label class="control-label">Add Education</label>-->
					    <div class="controls">
					      <span class="button"  id="addEdudcation" value="0">Add New</span>
					    </div>
					 </div>
					 
					 
					 <!-- Awards start-->
					 <div class="award">
						 <div class="control-group ">
								<div class="controls">
									<input rows="3" class="input span8" name="awdtitle[]" type="text"  placeholder="Award Title">
								</div>
							</div>
							<div class="control-group ">
								<label class="control-label">Period</label>
								<div class="controls">
									<input class="span4" type="text"  name="awdFrom[]" placeholder="(2005)(Feb 2005)">
									to
									<input class="span4" type="text"  name="awdTo[]" placeholder="(2007)(Mar 2007)">
								</div>
							</div>
							<div class="control-group ">
								<label class="control-label">Description</label>
								<div class="controls">
									<textarea rows="3" class="input span8" name="awdDesc[]" type="text"  placeholder="Description"></textarea>
								</div>
							</div>
						<div class="control-group ">
							<div class="controls">
							  <span class="button"  id="addawd" value="0">Add New</span>
							</div>
						 </div>
					 </div>
					 <!-- Award end -->
					 
					  <span class="button" >Continue</span>
				</div>
				
				<!-- ================ Edication & Awards tab end ==================-->	 
					  

				<!-- ================ More About Me tab start ==================-->
				<div id="moreabout_tab" class="tabs">
					<div class="control-group ">
						<div class="controls">
							<input rows="3" class="input span8" name="intresttitle[]" type="text"  placeholder="Intrest Title">
						</div>
					</div>
					<div class="control-group ">
						<label class="control-label">Description</label>
						<div class="controls">
							<textarea rows="3" class="input span8" name="intrestDesc[]" type="text"  placeholder="Description"></textarea>
						</div>
					</div>
					<div class="control-group ">
						<label class="control-label">Site Url</label>
						<div class="controls">
							<input name="intrestUrl[]" type="text"  placeholder="Web address" />
						</div>
					</div>
					<div class="control-group ">
						<div class="controls">
						  <span class="button"  id="addintrest" value="0">Add New</span>
						</div>
					</div>
					
					<!-- other details -->
					<div class="control-group ">
							<div class="controls">
								<select name="marital">
									<option value="married">Married</option>
									<option value="unmarried">Unmarried</option>
								</select>
							</div>
						</div>
					<div class="control-group ">
						<label class="control-label">passport</label>
						<div class="controls">
							<input name="passport" type="text"  placeholder="passport" />
						</div>
					</div>
					<div class="control-group ">
						<label class="control-label">Period</label>
						<div class="controls">
							<input class="span4" type="text"  name="passportFrom[]" placeholder="(2005)(Feb 2005)">
							to
							<input class="span4" type="text"  name="passportTo[]" placeholder="(2007)(Mar 2007)">
						</div>
					</div>
					<div class="control-group ">
						<label class="control-label">visa</label>
						<div class="controls">
							<input name="visa" type="text"  placeholder="visa" />
						</div>
					</div>
					<div class="control-group ">
						<label class="control-label">Period</label>
						<div class="controls">
							<input class="span4" type="text"  name="visaFrom[]" placeholder="(2005)(Feb 2005)">
							to
							<input class="span4" type="text"  name="visaTo[]" placeholder="(2007)(Mar 2007)">
						</div>
					</div>
					
					<!-- final save buttons -->
						<div class="control-group">
						    <div class="controls">
						       <span class="button" id="resume_submit"> Submit</span>
						       <span class="button"  >Reset</span>
						    </div>
						  </div>
				</div>
				<!-- ================ More About Me tab end ==================-->
				</form>
				
				<!-- ================================ form end ================================ -->
				
				
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
				 <div id="preview" class="stop-theme" title="Resume" href=""></div>
		<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/jquery.colorbox-min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/home.js');?>"></script>
		<?php /* <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.toastmessage.js'); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/sisyphus.js'); ?>" ></script> */ ?>