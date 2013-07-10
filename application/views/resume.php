<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/colorbox.css"); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_resume.css"); ?>" />
<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.toastmessage.css"); ?>"/>
<div id="toast"></div>-->
<div class="form_title">
	<h3>Discover Yourself</h3>
</div>
<div class="right_nav">
	<h3> YOU ARE HERE </h3>
	<span class="rns"><span class="rnd">1</span>Choose Resume Style</span>
	<span class="rns"><span class="rnd">2</span>Discover Yourself</span>
	<span tab='#about_tab' class="tab rns rns_a rns_inner"><span class="rnd_inner rnd_inner_a"></span>About</span>
	<span tab='#objective_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Designation,Objective</span>
	<span tab='#contact_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Contact Me</span>
	<span tab='#experience_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Experience Summary</span>
	<span tab='#strength_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>My Strength </span>
	<span tab='#tool_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>My Tool Box</span>
	<span tab='#milestones_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>My Milestones</span>
	<span tab='#edication_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>Edjucation & Awards</span>
	<span tab='#moreabout_tab' class="tab rns rns_inner"><span class="rnd_inner"></span>More About Me</span>
	<span class="rns"><span class="rnd">3</span>Build Your Image</span>
	<span class="rns"><span class="rnd">4</span>Register with EZCV</span>
</div>
<!--<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>-->
<div class="left_form">
	<div >
		<!-- ================================ form start ================================ -->
	<form id="resume_form">
		<input type="hidden" value="<?=$templateValue;?>" id="template" name="template" autocomplete="off" />
        <input type="hidden" name="download_file" id="download_file" />
        <input type="hidden" name="remove_skills" value="" id="remove_skills" />
		<input type="hidden" name="remove_company" value="" id="remove_company" />
		<input type="hidden" name="remove_project" value="" id="remove_project" />
		<input type="hidden" name="remove_education" value="" id="remove_education" />
		<? //print_r($user_detail) ;die; ?>
		<!-- ============================================================================= About tab start ==================================-->
		<div id="about_tab" class="tabs">
			<!-- First & Last name -->
			<div class="left_form_title">
				<h3>About Me</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p> Tell us about yourself in this section. You can enter your name and current location as well as talk about yourself and what you have been doing till date.</p>
			</div>
			
			<div class="form_sections">
				<div>
					<input type="text" name="fname"  placeholder="First name"  value="<? if(isset($user_detail[0]['first_name'])) echo $user_detail[0]['first_name']; ?>" maxlength="30" required/>
					<input name="lname" type="text"  placeholder="Last name" value="<? if(isset($user_detail[0]['last_name'])) echo $user_detail[0]['last_name']; ?>" maxlength="30" required/>
				</div>
			<!-- DOB -->
				<div>
				    <label >Date of Birth</label>
				    <input  type="date"  name="dob" placeholder="dd-mm-yyyy" value="<? if(isset($user_detail[0]['dob'])) echo $user_detail[0]['dob']; ?>" required/>
				</div>
			<!-- Address -->
				<div >
				    <label >Current Location</label>
				    <textarea rows="3"  type="text"  name="address" placeholder="Address" maxlength="90"><? if(isset($user_detail[0]['address'])) echo $user_detail[0]['address']; ?></textarea>
				</div>
			<!-- Summary -->
				<div>
					<select name="summaryTitle">
						<?
						if(isset($about[0]['summary']))
						{
						$summary=unserialize($about[0]['summary']);
						echo '<option value="'.$summary[0].'">'.$summary[0].'</option>';
						}
						?>
						<option value="Who i am">Who i am</option>
						<option value="About me">About me</option>
						<option value="Summary">Summary</option>
						<option value="Custom heading">Custom heading</option>
					</select>
					<input  type="text"  name="" placeholder="Enter Text"  maxlength="25"/>
				</div>
				<div>
				    <!-- <label >Summary</label> -->
				   	<textarea rows="3" name="summary" type="text"  placeholder="Enter text here" maxlength="1000" class="h200">
						<?if(isset($about[0]['summary']))echo $summary[1];?>
					</textarea>
				</div>
				<span class="clickr next" href='#objective_tab'>Continue</span>
			</div>
		</div>
		<!-- ===================================================================== About tab end ==================-->
		
		<!-- <div style="float:right;">
       		<?php if($photo) { ?>
            	<img src="<? echo base_url($this->config->item('path_profile_img').$user_id.'/'.$photo); ?>" id="profile_pic" />
            <?php } else { ?>
				<img src="<? echo base_url('assets/img/userPhoto.png'); ?>" id="profile_pic" />
            <?php } ?>
            <span id="uploadstate"></span>
		</div> -->
		<!-- =========================================================== Designation,Objective tab start ==================-->
		<div id="objective_tab" class="tabs">
			<div class="left_form_title">
				<h3>OBJECTIVE, CURRENT POSITION</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p>This section will cover your current designation in case you are already working. If you are a student, you can skip this section. Alternatively, as a student you can talk about the role you desire to play in the path you take towards building your career. </p>
			</div>
			<div class="form_sections">
		<!-- Designation -->
			<div >
				<!-- <label >Tag line</label> -->
				  <input  type="text"  name="designation" placeholder="Current Designation" value="<? if(isset($user_detail[0]['designation'])) echo $user_detail[0]['designation']; ?>" />
			 </div>
			<!-- Objectives -->
			<div>
				<select name="objectivesTitle">
					<?
					if(isset($about[0]['objective']))
					{
					$objective=unserialize($about[0]['objective']);
					echo '<option value="'.$objective[0].'">'.$objective[0].'</option>';
					}
					?>
					<option value="What I want">What I want</option>
					<option value="Purpose">Purpose</option>
					<option value="Objective">Objective</option>
					<option value="Custom heading">Custom heading</option>
				</select>
				<input  type="text"  name="" placeholder="Enter text here" />
			</div>
			<div >
			    <!-- <label >Objective</label> -->
			    <textarea rows="3"  name="objective" type="text"  placeholder="Enter Text here" class="h200">
				<?
				if(isset($about[0]['objective']))
				echo $objective[1];
				?>
				</textarea>
			</div>
			<span class="clickr next" href='#contact_tab'>Continue</span>
		</div>
		</div>
		
		<!-- ===================================================================== Designation,Objective tab end ==================-->
				
			  
		<!-- ===================================================================== Contact Me tab start ==================-->
		<div id="contact_tab"  class="tabs">
			<div class="left_form_title">
				<h3>Contact Me</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p> In this section you can reveal your contact details and decide exactly how you would like your employers to contact you. Our recommendation is that you definitley give them your phone number and Email Id. </p>
			</div>
			<div class="form_sections">
			<div >
				<select name="contactTitle">
					<?
					if(isset($user_detail[0]['contactTitle']))
					{
					echo '<option value="'.$user_detail[0]['contactTitle'].'">'.$user_detail[0]['contactTitle'].'</option>';
					}
					?>
					<option value="How to reach me">How to reach me</option>
					<option value="Custom heading">Custom heading</option>
				</select>
				<input  type="text"  name="" placeholder="Custom title" />
			</div>
			<div >
			    <input  type="text"  name="phone" placeholder="Phone" value="<? if(isset($user_detail[0]['mobile'])) echo $user_detail[0]['mobile']; ?>" />
				<input   name="email" type="email"  placeholder="Email" value="<? if(isset($user_detail[0]['secondary_email'])) echo $user_detail[0]['secondary_email']; ?>" />
			</div>
			<div>
			    <label>Website</label>
			    <? 
			    if(isset($about[0]['website']))
			    $website= unserialize($about[0]['website']);
			    ?>
			    <input  class="w400" type="url"  name="url[]" placeholder="url" value="<? if(isset($about[0]['website'])) echo $website['mylink']; ?>" />
			</div>
			<div>
			    <label >Skype</label>
			    <input class="w400" type="text"  name="skype" placeholder="skype" value="<? if(isset($user_detail[0]['skype'])) echo $user_detail[0]['skype']; ?>" />
			</div>
			<div>
				<label >twitter</label>
				<input class="w400" type="url"  name="url[]" placeholder="twitter" value="<? if(isset($about[0]['website'])) echo $website['twitter']; ?>" />
			</div>
			<div>
				<label >facebook</label>
				<input class="w400" type="url"  name="url[]" placeholder="facebook" value="<? if(isset($about[0]['website'])) echo $website['facebook']; ?>" />
			</div>
			<div>
			    <label >linkedin</label>
			    <input class="w400" type="url"  name="url[]" placeholder="linkedin" value="<? if(isset($about[0]['website'])) echo $website['linkedin']; ?>" />
			</div>
			<span class="clickr next" href='#experience_tab'>Continue</span>
		</div>
		</div>
		<!-- ===================================================================== Contact Me tab end ==================-->
			  
			  
		<!-- ===================================================================== Experience Summary tab start ==================-->
		<div id="experience_tab" class="tabs">
			<div class="left_form_title">
				<h3>EXPERIENCE SUMMARY</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p> In this section you can give information on your past experience of working with different companies. This section helps you list out all the companies you have worked with, the duration of time you spent with them as well as the position you held during that time.  </p>
			</div>
			<div class="form_sections">
			<!-- Experience -->
			<div >
			    <label >Total years of experience</label>
			    <input  type="text" name="experience" placeholder="No of years" value="<? if(isset($user_detail[0]['experience'])) echo$user_detail[0]['experience']; ?>" />
			 </div>
			<!-- CTC -->
			<div >
			    <label >Compensation Details</label>
			    <input  type="text" name="current" placeholder="Current" 
			    value="
			    <? 
			    if(isset($about[0]['compensation']))
			    {
			    $compensation = unserialize($about[0]['compensation']);
			     echo $compensation[0];
				}
			    ?>
			     " />
			    <input  type="text" name="expected" placeholder="Expected" value="<?  if(isset($about[0]['compensation'])) echo $compensation[1];?>" /> INR per annum
			</div>
			<!-- Company start-->
			<div id="company">
			<label >Company</label>
				  	<?
				  	if(isset($company[0]))
				  	{
						$companyNames = unserialize($company[0]['name']);
						$companyDesc = unserialize($company[0]['designation']);
						$companyDate = unserialize($company[0]['date']);
						$i=0;
						foreach($companyNames as $record)
						{
							$fromtoDate = explode('#',$companyDate[$i]);
						?>
					<div id="c<?=$i;?>">
							<div >
								<input  type="text" name="cmpnyName[]" placeholder="Company name" value="<?=$record;?>">
								<input  name="cmpnyDesg[]" type="text"  placeholder="Designation" value="<?=$companyDesc[$i];?>">
								<label >From</label>
								<input  type="date"  name="cmpnyFrom[]" placeholder="(2005)(Feb 2005)" value="<?=$fromtoDate[0];?>" />
								<label >To</label>
								<input  type="date"  name="cmpnyTo[]" placeholder="(2007)(Mar 2007)" value="<?=$fromtoDate[1];?>" />
							</div>
					  </div>
						<?
						$i++;
						}
					}
					else
					{
				  	?>
				  	<div id="c0">
						<div >
							<input  type="text" name="cmpnyName[]" placeholder="Company name">
							<input  name="cmpnyDesg[]" type="text"  placeholder="Designation">
							<label >From</label>
							<input  type="date"  name="cmpnyFrom[]" placeholder="(2005)(Feb 2005)" />
							<label >To</label>
							<input  type="date"  name="cmpnyTo[]" placeholder="(2007)(Mar 2007)" />
						</div>
					</div >
					<? } ?>
			</div>
		    <div>
			    <span  class="clickr"  id="addCompany" value="0">Add another</span>
			</div>
			<span  class="clickr next" href='#strength_tab'>Continue</span>
		</div>
		</div>
		
		<!-- ===================================================================== Experience Summary tab end ==================-->
		
		<!-- ===================================================================== My Strength tab start ==================-->
		
		<div id="strength_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Strengths</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p> In this section you can elaborate on your strengths by first listing out the keywords and then by describing them briefly in a line if necessary. We recommend that you keep this section short and sweet.</p>
			</div>
			<div class="form_sections">
			 <!-- Other skills -->
			<div>
		    	<label >My Strengths</label>
		    	<div  id="oskills">
		    	<? 
		    	if(isset($otherskill[0]))
		    	{
					$i=0;
					$otherskill = unserialize($otherskill[0]['name']);
				foreach($otherskill as $record)
				{
				?>
					<div id="os<?=$i;?>">
		      			<input  type="text"  name="otherSkills[]" placeholder="Skill name" value="<?=$record?>">
		      		</div>
				<?
				$i++;
				}
				}
				else
				{
				?>
					<div id="os0">
		      			<input  type="text"  name="otherSkills[]" placeholder="Skill name" >
		      		</div>
				<? }?>		    		
		    	</div>
		    	<div>
		    		<span class="clickr"  id="addOskills" value="0">Add skill</span>
		    	</div>
		  	</div>
		  	<!-- strength briefly -->
			<div>
				<label >You can write about your strengths briefly here	</label>
			    <textarea rows="3"  type="text"  name="otherSkillsBrief" placeholder="Brief about strength"><?if(isset($about[0]['mystrength'])) echo $about[0]['mystrength'];?></textarea>
			</div>
			<span class="clickr next" href='#tool_tab'>Continue</span>
		</div>
		</div>
		<!-- ===================================================================== My Strength tab end ==================-->
		
		<!-- ===================================================================== My Tool Box tab start ==================-->
		<div id="tool_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Tool Box</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p>Here's the place to add your skill sets, with a score on a scale to 10, 10 being the highest to indicate your profiiency in the skill. You can enter your skills sets here and assign a score to each.</p>
			</div>
			<div class="form_sections">
			<!-- Skills -->
			 <div id="skills">
				 <?
				 if(isset($skill[0]))
				 {
					 $i=0;
					 $skillName = unserialize($skill[0]['name']);
					 $skillEff = unserialize($skill[0]['efficiency']);
					 foreach($skillName as $row)
					 {
				?>
						 <div id="s<?=$i;?>">
							<div>
								
								<input  type="text"  name="skillName[]" placeholder="Skill name" value="<?=$row;?>"/>
								<input  type="text"  name="skillEff[]" placeholder="Master, Intermediate, Adept etc., " value="<?=$skillEff[$i];?>">
							</div>
						</div>
				<?
				$i++;
					 }
				 }
				 else
				 {
				 ?>
			 	<div id="s0">
					<div >
						
						<input  type="text"  name="skillName[]" placeholder="Skill name" />
						<input  type="text"  name="skillEff[]" placeholder="Master, Intermediate, Adept etc., ">
					</div>
				</div>
				<? } ?>
			</div>
			<div>
			   <span class="clickr"  id="addSkills"  value="0">Add another</span>
			</div>
			<span class="clickr next" href='#milestones_tab'>Continue</span>
		</div>
		</div>
		
		<!-- ===================================================================== My Tool Box tab end ==================-->
		
		<!-- ===================================================================== My Milestones tab start ==================-->
		<div id="milestones_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Milestones</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p>In this section you can talk about those particular projects that made a difference to you, either in your learning curve, or that which earned you recognition or just a project you loved to work in.  </p>
			</div>
			<div class="form_sections">
			<!--******************************************Project********************************/-->
			<div id="project">
				<?
				if(isset($project[0]))
				{
					$i=0;
					$projectName = unserialize($project[0]['name']);
					$projectRole = unserialize($project[0]['role']);
					$projectDesc = unserialize($project[0]['description']);
					$projectUrl = unserialize($project[0]['url']);
					foreach($projectName as $record)
					{
				?>
						<div id="p<?=$i;?>">
							<div>
								<input  type="text" name="projName[]"  placeholder="Enter Project Name/Title" value="<?=$record;?>"
								<input  name="projRole[]" type="text"  placeholder="My Position" value="<?=$projectRole[$i];?>">
							</div>
							<div>
								<textarea rows="3"  name="projDesc[]" type="text"  placeholder="Enter project description and your role in it">
								<?=$projectDesc[$i]?>
								</textarea>
							</div>
							<div>
								<input name="projUrl[]" type="text"  placeholder="Project web address" value="<?=$projectUrl[$i];?>"/>
							</div>
						</div>
				<?	
				$i++;
					}
				}
				else
				{
				?>
				<div id="p0">
					<div >
						<input  type="text" name="projName[]"  placeholder="Enter Project Name/Title">
						<input  name="projRole[]" type="text"  placeholder="My Position">
					</div>
					<div>
						
						<textarea rows="3"  name="projDesc[]" type="text"  placeholder="Enter project description and your role in it"></textarea>
					</div>
					<div>
						
						<input name="projUrl[]" type="text"  placeholder="Project web address" />
					</div>
				</div>
			<? } ?>
			</div>
			<div >
			<!--<label >Add Project</label>-->
				<span class="clickr" id="addProject" value="0">Add another</span>
			</div>
			<span  class="clickr next" href='#edication_tab'>Continue</span>
		</div>
		</div>
		
		<!-- ===================================================================== My Milestones tab end ==================-->
		
		
		<!-- ===================================================================== Edication & Awards tab start ==================-->
		<div id="edication_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Education</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p>In this section you can give all the details of your education across school, university and any other courses that you might have attended. </p>
			</div>
			<div class="form_sections">
			<div id="edudcation">
				<?
				$i=0;
				if(isset($education[0]))
				{
					$educationIns = unserialize($education[0]['institution']);
					$educationCert = unserialize($education[0]['certification']);
					$educationDate = unserialize($education[0]['date']);
					$educationScore = unserialize($education[0]['score']);
					foreach($educationCert as $record)
					{
						$fromtoDate = explode('#',$educationDate[$i]);
				?>
					<div id="e<?=$i;?>">
					<? if($i) {?>
					<span class="button remove formRemoveBtn" onclick=removeId("e<?=$i;?>");>Remove</span>
					<? } ?>
						<div> 
							<input  name="eduCert[]" type="text"  placeholder="Name of Degree" value="<?=$record;?>">
							<input  type="text" name="eduInst[]" placeholder="University/Board" value="<?=$educationIns[$i];?>">
						</div>
						<div>
							<input rows="3"  name="eduScore[]" type="text"  placeholder="Score: % or GPA" value="<?=$educationScore[$i];?>">
						</div>
						<div>
							<label >From</label>
							<input type="text"  name="eduFrom[]" placeholder="(2005)(Feb 2005)" value="<?=$fromtoDate[0];?>">
							<label >To</label>
							<input  type="text"  name="eduTo[]" placeholder="(2007)(Mar 2007)" value="<?=$fromtoDate[1];?>">
						</div>
					</div>
				<?
				$i++;
					}
					
				}
				else
				{
				?>
				<div id="e0">
					<div> 
						<input  name="eduCert[]" type="text"  placeholder="Name of Degree">
						<input  type="text" name="eduInst[]" placeholder="University/Board">
	                </div>
					<div>
						<input rows="3"  name="eduScore[]" type="text"  placeholder="Score: % or GPA">
					</div>
					<div>
						<label >From</label>
						<input type="text"  name="eduFrom[]" placeholder="(2005)(Feb 2005)">
						<label >To</label>
						<input  type="text"  name="eduTo[]" placeholder="(2007)(Mar 2007)">
					</div>
				</div>
				<? } ?>
			</div>	  
			<div>
			    <!--<label >Add Education</label>-->
			    <span class="clickr"  id="addEdudcation" value="<?=$i;?>">Add New</span>
			</div>
			<!-- Awards start-->
			<div class="award">
				<div class="left_form_title awards_or">
					<h3>My Awards</h3>
					<div class="clearboth"></div>
					<p>In this section you can give all the details of the vaious awards that you have received from college as well as various companies that you have worked with. This can also include other interests that you would like to share with the recruiter. </p>
				</div>
				<div id="award">
					<?
					if(isset($award[0]))
					{
						$i=0;
						$awardTitle = unserialize($award[0]['title']);
						$awardDate = unserialize($award[0]['date']);
						$awardDesc = unserialize($award[0]['description']);
						foreach($awardTitle as $record)
						{
							$fromtoDate = explode('#',$awardDate[$i]);
					?>
					<div id="aw<?=$i;?>">
						<div>
						<input rows="3" name="awdtitle[]" type="text"  placeholder="Award Title" value="<?=$record;?>">
						</div>
						<div>
							<label >For the period From</label>
							<input  type="text"  name="awdFrom[]" placeholder="(2005)(Feb 2005)" value="<?=$fromtoDate[0];?>">
							<label >To</label>
							<input  type="text"  name="awdTo[]" placeholder="(2007)(Mar 2007)" value="<?=$fromtoDate[1];?>">
						</div>
						<div>
							<textarea rows="3"  name="awdDesc[]" type="text"  placeholder="Description">
							<?=$awardDesc[$i];?>
							</textarea>
						</div>
					</div>
					<?
						$i++;
						}
					}
					else
					{
					?>
					<div id="aw0">				
						<div>
							<input rows="3" name="awdtitle[]" type="text"  placeholder="Award Title">
						</div>
						<div>
							<label >For the period From</label>
							<input  type="text"  name="awdFrom[]" placeholder="(2005)(Feb 2005)">
							<label >To</label>
							<input  type="text"  name="awdTo[]" placeholder="(2007)(Mar 2007)">
						</div>
						<div>
							<textarea rows="3"  name="awdDesc[]" type="text"  placeholder="Description"></textarea>
						</div>
					</div>
					<? } ?>
				</div>
				<div>
					<span class="clickr"  id="addawd" value="0">Add New</span>
				</div>
			</div>
			 <!-- Award end -->
			<span class="clickr next" href='#moreabout_tab'>Continue</span>
		</div>
		</div>
		
		<!-- ===================================================================== Edication & Awards tab end ==================-->	 
			  

		<!-- ===================================================================== More About Me tab start ==================-->
		<div id="moreabout_tab" class="tabs">
			<div class="left_form_title">
				<h3>More About Me</h3>
				<span>Resume Templates</span>
				<div class="clearboth"></div>
				<p>This the last section but it is as important. It describes your personality that is beyond work. This section gives you an avenue to talk about things you like to do and are interested to pursue </p>
			</div>
			<div id="moreabout" class="form_sections">
				<? if(isset($about[0]))
				{
					$i=0;
					$intresttitle = unserialize($about[0]['intresttitle']);
					$intrestDesc = unserialize($about[0]['intrestDesc']);
					$intrestUrl = unserialize($about[0]['intrestUrl']);
					foreach($intresttitle as $record)
					{
				?>
					<div id="ma<?=$i;?>">
						<div>
							<input rows="3"  name="intresttitle[]" type="text"  placeholder="Title of Interest" value="<?=$record;?>">
							E.g, Blogging, Sports, Trekking, Photography.
						</div>
						<div>
							<label >Description</label>
							<textarea class="h200" rows="3"  name="intrestDesc[]" type="text"  placeholder="Enter short description on other interests you might have">
							<?=$intrestDesc[$i];?>
							</textarea>
						</div>
						<div>
							<label >Site Url</label>
							<input name="intrestUrl[]" type="text"  placeholder="Web address of interest (blog, photo, gallery)" value="<?=$intrestUrl[$i];?>"/>
						</div>
					</div>
				<?
					$i++;
					}
				}
				else
				{
				?>
				<div id="ma0">
					<div>
						<input rows="3"  name="intresttitle[]" type="text"  placeholder="Title of Interest">
						E.g, Blogging, Sports, Trekking, Photography.
					</div>
					<div>
						<label >Description</label>
						<textarea class="h200" rows="3"  name="intrestDesc[]" type="text"  placeholder="Enter short description on other interests you might have"></textarea>
					</div>
					<div>
						<label >Site Url</label>
						<input name="intrestUrl[]" type="text"  placeholder="Web address of interest (blog, photo, gallery)" />
					</div>
				</div>
				<? } ?>
				
			<div>
				<span class="clickr"  id="addintrest" value="0">Add New</span>
			</div>
			
			<!-- other details -->
			<h3>Other details</h3>
			<div>
				<label >Marital Status</label>
				<select name="marital">
					<?
					if(isset($user_detail[0]['married']))
					{?>
						<option value="NULL" <?if($user_detail[0]['married']==NULL) echo 'selected="selected"';?>  >Not specified</option>
						<option value=1 <?if($user_detail[0]['married']==1) echo 'selected="selected"';?>  >Married</option>
						<option value=0 <?if($user_detail[0]['married']==0) echo 'selected="selected"';?>  >Unmarried</option>
					<?
					}
					else
					{
					?>
					<option value="NULL">Not specified</option>
					<option value="1">Married</option>
					<option value="0">Unmarried</option>
					<? } ?>
				</select>
			</div>
			<?
			if(isset($about[0]['passport_visa']))
			{
				$passport_visa = unserialize($about[0]['passport_visa']);
				$passportDate = explode('#',$passport_visa['passportdate']); 
				$visaDate = explode('#',$passport_visa['visadate']);
			?>
				<div>
					<label >Passport details</label>
					<input name="passport" type="text"  placeholder="Passport Number" value="<?=$passport_visa['passport'];?>"/>
				</div>
				<div>
					<label >Valid through</label>
					<input  type="text"  name="passportFrom" placeholder="(2005)(Feb 2005)" value="<?=$passportDate[0];?>">
					to
					<input  type="text"  name="passportTo" placeholder="(2007)(Mar 2007)" value="<?=$passportDate[1];?>">
				</div>
				<div>
					<label >Visa details</label>
					<input name="visa" type="text"  placeholder="Visa details"  value="<?=$passport_visa['visa'];?>"/>
				</div>
				<div>
					<label >Valid through</label>
					<input  type="text"  name="visaFrom" placeholder="(2005)(Feb 2005)" value="<?=$visaDate[0];?>">
					to
					<input  type="text"  name="visaTo" placeholder="(2007)(Mar 2007)" value="<?=$visaDate[1];?>">
				</div>
			<?}
			else
			{
			?>
				<div>
					<label >Passport details</label>
					<input name="passport" type="text"  placeholder="Passport Number" />
				</div>
				<div>
					<label >Valid through</label>
					<input  type="text"  name="passportFrom" placeholder="(2005)(Feb 2005)">
					to
					<input  type="text"  name="passportTo" placeholder="(2007)(Mar 2007)">
				</div>
				<div>
					<label >Visa details</label>
					<input name="visa" type="text"  placeholder="Visa details" />
				</div>
				<div>
					<label >Valid through</label>
					<input  type="text"  name="visaFrom" placeholder="(2005)(Feb 2005)">
					to
					<input  type="text"  name="visaTo" placeholder="(2007)(Mar 2007)">
				</div>
			<? } ?>
			<!-- final save buttons -->
			<div>
			    <span  id="resume_submit" class="clickr"> Save & Finish</span>
			    <span  class="clickr next" >Reset</span>
			</div>
		</div>
		</div>
		<!-- ===================================================================== More About Me tab end ==================-->
	</form>
		
		<!-- ======================================================================== form end ================================ -->
		


	</div>
</div>


		<!-- need make as popup -->
		<br/><br/><br/><br/><br/><br/><br/><br/><br/>

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
					</div>
				 </div>
				 
				 <div id="preview" class="stop-theme" title="Resume" href=""></div>
		<!--<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>-->
		<script src="<?php echo base_url('assets/js/jquery.colorbox-min.js'); ?>" ></script>
		<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/resume.js');?>"></script>
		<?php /* <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.toastmessage.js'); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/sisyphus.js'); ?>" ></script> */ ?>