<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/colorbox.css"); ?>"/>
<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>
		<div class="row-fluid">
			
	 		<div class="span7 offset1 templateForm">
	 			
	 			<!--T1_form-->
	 			<form class="form-horizontal" id="resume_form">
	 			<input type="hidden" name="photo" id="photo" value="<?php if($photo) { echo base_url($this->config->item('path_profile_img').$user_id.'/'.$photo); } ?>" />
	 			<input type="hidden" value="" id="template" name="template" autocomplete="off" />
                <input type="hidden" name="download_file" id="download_file" />
                <input type="hidden" name="remove_skills" value="" id="remove_skills" />
				<input type="hidden" name="remove_company" value="" id="remove_company" />
				<input type="hidden" name="remove_project" value="" id="remove_project" />
				<input type="hidden" name="remove_education" value="" id="remove_education" />
					  <div class="control-group">
					    <label class="control-label" >Name</label>
					    <div class="controls">
					      <input class="span4" type="text" name="fname" placeholder="First name" value="<?php echo $first_name; ?>" />

					      <input class="span4 leftMargin" name="lname" type="text"  placeholder="Last name" value="<?php echo $last_name; ?>" />
					    </div>
					  </div>
					   <div style="float:right;">
                       		<?php if($photo) { ?>
                            	<img src="<? echo base_url($this->config->item('path_profile_img').$user_id.'/'.$photo); ?>" id="profile_pic" />
                            <?php } else { ?>
								<img src="<? echo base_url('assets/img/userPhoto.png'); ?>" id="profile_pic" />
                            <?php } ?>
                            <span id="uploadstate"></span>
						</div>
					  <div class="control-group ">
					    <label class="control-label">Tag line</label>
					    <div class="controls">
					      <input class="span8" type="text"  name="designation" placeholder="Designation / key skills" value="<?php echo $tag_line; ?>" />
					    </div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Contact</label>
					    <div class="controls">
					      <input class="span4" type="text"  name="phone" placeholder="Phone" value="<?php if($mobile) echo $mobile; else if($landline) echo $landline; ?>" />

					      <input class="span4 leftMargin"  name="email" type="email"  placeholder="Email" value="<?php echo $secondary_email; ?>" />
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Address</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" type="text"  name="address" placeholder="Address"><?php echo $address; ?></textarea>
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Website</label>
					    <div class="controls">
					      <input class="span8" type="text"  name="mysite" placeholder="url" value="<?php echo $website; ?>" />
					    </div>
					  </div>
					  <!--******************************************Experience********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Experience</label>
					    <div class="controls">
					      <input class="span8" type="text" name="experience" placeholder="No of years" value="<?php echo $experience; ?>" />
					    </div>
					  </div>
					  
					    	<!--******************************************Objectives********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Objective</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" name="objective" type="text"  placeholder="Objective"><?php echo $objective; ?></textarea>
					    </div>
					  </div>
					  
					  <!--******************************************Summary********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Summary</label>
					    <div class="controls">
					      <textarea rows="3" class="input span8" name="summary" type="text"  placeholder="Summary"><?php echo $summary; ?></textarea>
					    </div>
					  </div>

					  	<!--******************************************Skills 1********************************/-->
					 <div id="skills">
					 	<div id="s0">
						<?php if(sizeof($result2)==0) { ?>
							<div class="control-group topBorder">
								<label class="control-label">Key Skills</label>
								<div class="controls">
									<input class="span4" type="text"  name="skillName[]" placeholder="Skill name" />
                                    <input type="hidden"  name="skillNameID[]" />
                                    
									<input class="span4 leftMargin" name="skillTitle[]" type="text"  placeholder="SubTitle" />
                                    <!--<input type="hidden" name="skillTitleID[]" />-->
								</div>
							</div>

							<div class="control-group ">
								<label class="control-label">Effeciency</label>
								<div class="controls">
									<input class="span4" type="text"  name="skillEff[]" placeholder="Master, Intermediate, Adept etc., ">
                                    <!--<input type="hidden" name="skillEffID[]" />-->
								</div>
							</div>
							<div class="control-group ">
								<label class="control-label">Description</label>
								<div class="controls">
									<textarea rows="3" class="input span8" name="skillDesc[]" type="text"  placeholder="Description"></textarea>
                                    <!--<input type="hidden" name="skillDescID[]" />-->
								</div>
							</div>
						<?php } else { ?>
						  <!--******************************************Exist Skills********************************/-->
							<div class="topBorder">
                            <?php for($i=0; $i<sizeof($result2); $i++) { ?>
                            <div class="formBorder" id="ex_skill_<?php echo $result2[$i]->id; ?>">
                                <span class="button formRemoveBtn remove_ex_skill" id="<?php echo $result2[$i]->id; ?>">Remove</span>
                                <div class="control-group">
                                    <label class="control-label">Key Skills</label>
                                    <div class="controls">
                                        <input class="span4" type="text" placeholder="Skill name" name="skillName[]" value="<?php echo $result2[$i]->name; ?>" />
                                        <input type="hidden"  name="skillNameID[]" value="<?php echo $result2[$i]->id; ?>" />
                                        
                                        <input class="span4 leftMargin" type="text" placeholder="SubTitle" name="skillTitle[]" value="<?php echo $result2[$i]->sub_title; ?>" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Effeciency</label>
                                    <div class="controls">
                                        <input class="span4" type="text" placeholder="Master, Intermediate, Adept etc., " name="skillEff[]" value="<?php echo $result2[$i]->efficiency; ?>" />
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <textarea class="input span8" placeholder="Description" type="text" name="skillDesc[]" rows="3"><?php echo $result2[$i]->description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
							</div>
                            <!--******************************************Exist Skills********************************/-->
						<?php } ?>
						</div>
					</div>
					
					<div class="control-group ">
						   <!-- <label class="control-label">Add skill</label>-->
						    <div class="controls">
						      <span class="button"  id="addSkills" 
						    	<span class="button"  id="addOskills" value="0">Add skill</span>

						    </div>
						  </div>
						  
						  <!--============================================Other skills==========================================-->
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

						  
					  <!--******************************************Company 1********************************/-->
					  
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
								<input class="span4" type="text"  name="cmpnyFrom[]" placeholder="(2005)(Feb 2005)" />
								to
								<input class="span4" type="text"  name="cmpnyTo[]" placeholder="(2007)(Mar 2007)" />
							</div>
						</div>
						<div class="control-group ">
							<label class="control-label">Description</label>
							<div class="controls">
								<textarea rows="3" class="input span8" name="cmpnyDesc[]" type="text"  placeholder="Description"></textarea>
							</div>
						</div>
						<?php } else { ?>
						<!--******************************************Exist company********************************/-->
						<div class="topBorder">
						<?php for($i=0; $i<sizeof($result3); $i++) { ?>
						<div class="formBorder" id="ex_company_<?php echo $result3[$i]->id; ?>">
							<span class="button formRemoveBtn remove_ex_company" id="<?php echo $result3[$i]->id; ?>">Remove</span>
							<div class="control-group">
								<label class="control-label">Company</label>
								<div class="controls">
									<input class="span4" type="text" placeholder="Company name" name="cmpnyName[]" value="<?php echo $result3[$i]->name; ?>" />
                                    <input type="hidden" name="cmpnyNameID[]" value="<?php echo $result3[$i]->id; ?>" />
                                     
									<input class="span4 leftMargin" type="text"  placeholder="Designation" name="cmpnyDesg[]" value="<?php echo $result3[$i]->designation; ?>" />
								</div>
							</div>
							<div class="control-group ">
								<label class="control-label">Period</label>
								<div class="controls">
									<input class="span4" type="text"  name="cmpnyFrom[]" value="<?php echo $result3[$i]->from; ?>" placeholder="(2005)(Feb 2005)">
									<input class="span4" type="text"  name="cmpnyTo[]" value="<?php echo $result3[$i]->to; ?>" placeholder="(2007)(Mar 2007)">
								</div>
							</div>
								
							<div class="control-group ">
								<label class="control-label">Description</label>
								<div class="controls">
									<textarea rows="3" class="input span8" name="cmpnyDesc[]" type="text"  placeholder="Description"><?php echo $result3[$i]->description; ?></textarea>
								</div>
							</div>
						</div>
						<?php } ?>
						</div>
                        <!--******************************************Exist company********************************/-->
						<?php } ?>
					  </div>
					</div>
					<!--<label class="control-label">Add company</label>-->
					<div class="control-group ">
					    <div class="controls">
					      <span class="button"  id="addCompany" value="0">Add company</span>
					    </div>
					  </div>
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
							<?php } else { ?>
							<!--******************************************Exist project********************************/-->
							<div class="topBorder">
							<?php for($i=0; $i<sizeof($result4); $i++) { ?>
							<div class="formBorder" id="ex_project_<?php echo $result4[$i]->id; ?>">
								<span class="button formRemoveBtn remove_ex_project" id="<?php echo $result4[$i]->id; ?>">Remove</span>
								<div class="control-group">
									<label class="control-label">Project</label>
									<div class="controls">
										<input class="span4" type="text" placeholder="Project name" name="projName[]" value="<?php echo $result4[$i]->name; ?>" />
                                        <input type="hidden" name="projNameID[]" value="<?php echo $result4[$i]->id; ?>"  />
                                        
										<input class="span4 leftMargin" type="text"  placeholder="Role" name="projRole[]" value="<?php echo $result4[$i]->role; ?>" />
									</div>
								</div>
								<div class="control-group ">
									<label class="control-label">Period</label>
									<div class="controls">
										<input class="span4" type="text"  name="projFrom[]" value="<?php echo $result4[$i]->from; ?>" placeholder="(2005)(Feb 2005)">
										<input class="span4" type="text"  name="projTo[]" value="<?php echo $result4[$i]->to; ?>" placeholder="(2007)(Mar 2007)">
									</div>
								</div>
									
								<div class="control-group ">
									<label class="control-label">Description</label>
									<div class="controls">
										<textarea rows="3" class="input span8" name="projDesc[]" type="text"  placeholder="Description"><?php echo $result4[$i]->description; ?></textarea>
									</div>
								</div>
							</div>
							<?php } ?>
							</div>
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
					  
					  <!--******************************************Education********************************/-->
					  
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
								<textarea rows="3" class="input span8" name="eduScore[]" type="text"  placeholder="Score"></textarea>
							</div>
						</div>
						<?php } else { ?>
						<!--******************************************Exist project********************************/-->
						<div class="topBorder">
						<?php for($i=0; $i<sizeof($result5); $i++) { ?>
						<div class="formBorder" id="ex_education_<?php echo $result5[$i]->id; ?>">
							<span class="button formRemoveBtn remove_ex_education" id="<?php echo $result5[$i]->id; ?>">Remove</span>
							<div class="control-group">
								<label class="control-label">Edudcation</label>
								<div class="controls">
									<input class="span4" type="text" placeholder="Institution" name="eduInst[]" value="<?php echo $result5[$i]->institution; ?>" />
                                    <input type="hidden" name="eduInstID[]" value="<?php echo $result5[$i]->id; ?>" />
                                    
									<input class="span4 leftMargin" type="text"  placeholder="Certification" name="eduCert[]" value="<?php echo $result5[$i]->certification; ?>" />
								</div>
							</div>
							<div class="control-group ">
								<label class="control-label">Period</label>
								<div class="controls">
									<input class="span4" type="text"  name="eduFrom[]" value="<?php echo $result5[$i]->from; ?>" placeholder="(2005)(Feb 2005)">
									<input class="span4" type="text"  name="eduTo[]" value="<?php echo $result5[$i]->to; ?>" placeholder="(2007)(Mar 2007)">
								</div>
							</div>
								
							<div class="control-group ">
								<label class="control-label">Score</label>
								<div class="controls">
									<textarea rows="3" class="input span8" name="eduScore[]" type="text"  placeholder="Score"><?php echo $result5[$i]->score; ?></textarea>
								</div>
							</div>
						</div>
						<?php } ?>
						</div>
						<!--******************************************Exist Project********************************/-->
						<?php } ?>
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
				 <div id="preview" class="stop-theme" title="Resume" href=""></div>
		<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/jquery.colorbox-min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/home.js');?>"></script>