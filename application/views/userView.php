		<div class="row-fluid">
			
	 		<div class="span7 offset1 templateForm">
	 			
	 			<!--T1_form-->
	 			<form class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label" >Name</label>
					    <div class="controls"><?php echo $first_name.'&nbsp;&nbsp;'.$last_name; ?></div>
					  </div>
					   <div style="float:right;">
                       		<?php if($photo) { ?>
                            	<img src="<? echo base_url($this->config->item('path_profile_img').$photo); ?>" id="profile_pic" />
                            <?php } else { ?>
								<img src="<? echo base_url('assets/img/userPhoto.png'); ?>" id="profile_pic" />
                            <?php } ?>
						</div>
					  <div class="control-group ">
					    <label class="control-label">Tag line</label>
					    <div class="controls"><?php echo $tag_line; ?></div>
					  </div>
					   <div class="control-group">
					    <label class="control-label">Contact</label>
					    <div class="controls">
					      <?php echo $secondary_email.'&nbsp;&nbsp;'; if($mobile) echo $mobile; else if($landline) echo $landline; ?>
					    </div>
					  </div>
					  
					  <div class="control-group ">
					    <label class="control-label">Address</label>
					    <div class="controls">
					      <?php echo $address; ?>
					    </div>
					  </div>
					  <div class="control-group ">
					    <label class="control-label">Website</label>
					    <div class="controls">
					      <?php echo $website; ?>
					    </div>
					  </div>
					  <!--******************************************Experience********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Experience</label>
					    <div class="controls">
					      <?php echo $experience; ?>
					    </div>
					  </div>
					  
					    	<!--******************************************Objectives********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Objective</label>
					    <div class="controls">
					      <?php echo $objective; ?>
					    </div>
					  </div>
					  
					  <!--******************************************Summary********************************/-->
					  <div class="control-group ">
					    <label class="control-label">Summary</label>
					    <div class="controls">
					      <?php echo $summary; ?>
					    </div>
					  </div>

					  	<!--******************************************Skills********************************/-->
					 <div id="skills">
					 	<div id="s0">
						<?php if(sizeof($result2)!=0) { ?>
							<div class="topBorder">
                            <?php for($i=0; $i<sizeof($result2); $i++) { ?>
                            <div>
                                <div class="control-group">
                                    <label class="control-label">Key Skills <?php echo $i+1; ?></label>
                                    <div class="controls">
                                        <?php echo $result2[$i]->name."&nbsp;&nbsp;".$result2[$i]->sub_title; ?>
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Effeciency</label>
                                    <div class="controls">
                                        <?php echo $result2[$i]->efficiency; ?>
                                    </div>
                                </div>
                                <div class="control-group ">
                                    <label class="control-label">Description</label>
                                    <div class="controls">
                                        <?php echo $result2[$i]->description; ?>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
							</div>
						<?php } ?>
						</div>
					</div>
					
						  
						  <!--============================================Other skills==========================================-->
							<div class="control-group topBorder ">
						    	<label class="control-label">Other Skills</label>
						    	<div class="controls otherSkillBox" id="oskills">
						    		<div id="os0">
						      		
						      		</div>
						    	</div>
						    	
						  	</div>

						  
					  <!--******************************************Company********************************/-->
					<div id="company">
					  <div id="c0">
						<?php if(sizeof($result3)!=0) { ?>
						<div class="topBorder">
						<?php for($i=0; $i<sizeof($result3); $i++) { ?>
						<div>
							<div class="control-group">
								<label class="control-label">Company <?php echo $i+1; ?></label>
								<div class="controls">
									<?php echo $result3[$i]->name.'&nbsp;as&nbsp;'.$result3[$i]->designation; ?>
								</div>
							</div>
							<div class="control-group ">
								<label class="control-label">Period</label>
								<div class="controls">
									<?php echo $result3[$i]->from.'&nbsp;to&nbsp;'.$result3[$i]->to; ?>
								</div>
							</div>
								
							<div class="control-group ">
								<label class="control-label">Description</label>
								<div class="controls">
									<?php echo $result3[$i]->description; ?>
								</div>
							</div>
						</div>
						<?php } ?>
						</div>
						<?php } ?>
					  </div>
					</div>
						  	  <!--******************************************Project********************************/-->
					<div id="project">
						<div id="p0">
							<?php if(sizeof($result4)!=0) { ?>
							<div class="topBorder">
							<?php for($i=0; $i<sizeof($result4); $i++) { ?>
							<div>
								<div class="control-group">
									<label class="control-label">Project <?php echo $i+1; ?></label>
									<div class="controls">
										<?php echo $result4[$i]->name.'&nbsp;&nbsp;'.$result4[$i]->role; ?>
									</div>
								</div>
								<div class="control-group ">
									<label class="control-label">Period</label>
									<div class="controls">
										<?php echo $result4[$i]->from.'&nbsp;to&nbsp;'.$result4[$i]->to; ?>
									</div>
								</div>
									
								<div class="control-group ">
									<label class="control-label">Description</label>
									<div class="controls">
										<?php echo $result4[$i]->description; ?>
									</div>
								</div>
							</div>
							<?php } ?>
							</div>
							<?php } ?>
						</div>
					</div>
					  
					  <!--******************************************Education********************************/-->
				<div id="edudcation">
					<div id="e0">
						<?php if(sizeof($result5)!=0) {?>
						<div class="topBorder">
						<?php for($i=0; $i<sizeof($result5); $i++) { ?>
						<div>
							<div class="control-group">
								<label class="control-label">Edudcation</label>
								<div class="controls">
									<?php echo $result5[$i]->institution.'&nbsp;&nbsp;'.$result5[$i]->certification; ?>
								</div>
							</div>
							<div class="control-group ">
								<label class="control-label">Period</label>
								<div class="controls">
									<?php echo $result5[$i]->from.'&nbsp;to&nbsp;'.$result5[$i]->to; ?>
								</div>
							</div>
								
							<div class="control-group ">
								<label class="control-label">Score</label>
								<div class="controls">
									<?php echo $result5[$i]->score; ?>
								</div>
							</div>
						</div>
						<?php } ?>
						</div>
						<?php } ?>
					</div>
				</div>	  
				</form>
			</div>
		</div>