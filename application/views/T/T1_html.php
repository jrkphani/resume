<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/T/".$css."_css.css"; ?>"/> -->
<?php $string = read_file(FCPATH."/assets/css/T/".$template.".css"); ?>
<style>
<?=$string;?>
</style>
<div class="resume">
	<div class="inner"> 
		<div class="resumeHeader">
					<div class="headerLeft mainTitle">
						<div class="photoBorder">
							<?
							if($photo=="")
							{ ?><img src="<? echo base_url('assets/img/userPhoto.png'); ?>" />
							<? }
							else
							{ ?>
								<img src="<? echo $photo; ?>">
							<? } ?>
						</div>
						<div class="userName">
							<h2><?=$fname;?> <?=$lname;?></h2>
							<h3><?=$designation;?></h3>
						</div>
					</div>
		</div>

		<div class="resumeBody">
			
<!--objective start-->
<? if(trim($objective)!="")
{ ?>
					<div>
						<div class="titleSection">
							<h2>Objective</h2>
						</div>
						<div class="contentSection">
							<p>
								<?=nl2br($objective);?>
							</p>
						</div>
					</div>
					<? } ?>
<!--objective end-->

<!--summary start-->
<? if(trim($summary)!="")
{ ?>
					<div>
						<div class="titleSection">
							<h2>Summary</h2>
						</div>
						<div class="contentSection">
							<p>
								<?=nl2br($summary);?>
							</p>
						</div>
					</div>
					<? } ?>
<!--summary end-->

<!--Company start-->
<? if(array_filter($cmpnyName))
{ ?>
					<div>
						<div class="mainTitle">
							<h2> Work Experiences</h2>
						</div>

						<div>
							<? 
							$i=0;
							foreach($cmpnyName as $cmpny) {
							?>
							<div class="titleSection">
								<h2><?=$cmpnyName[$i];?></h2>
								<h4><?=$cmpnyFrom[$i];?>-<?=$cmpnyTo[$i];?></h4>
							</div>
							<div class="contentSection">
								<h3><?=$cmpnyDesg[$i];?></h3>
								<p><?=$cmpnyDesc[$i];?></p>
									<!--<ul>
										<li>Accomplishments 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
										<li>Accomplishments 2 Mauris at mauris tellus, ut convallis diam. </li>
									</ul>-->	
							</div>
							
							<? $i++; } ?>									
						</div>
					</div>
					<? } ?>
<!--Company end-->

<!--Skill start-->
<? if(array_filter($skillName))
{ ?>
					<div>
						<div class="mainTitle">
							<h2>Key Skills</h2>
						</div>
						<div  >
							<? 
							$i=0;
							foreach($skillName as $skill) {
							?>
								<div class="titleSection">
									<h2><?=$skillName[$i];?></h2>
									<h4><?=$skillTitle[$i];?></h4>
								</div>
								<div class="contentSection">
									<h3><?=$skillEff[$i];?></h3>
									<p><?=nl2br($skillDesc[$i]);?></p>
									
								</div>
							<? $i++; } ?>
						</div>
					</div>
					<? } ?>
<!--Skill end-->
			<!--OtherSkill start-->
			<? if(array_filter($otherSkills))
				{ ?>
		<div> 
							<div class="titleSection">
								<h2>Other skills</h2>
							</div>
						
						<div  class="contentSection">
							<ul>
							<? 
							$i=0;
							foreach($otherSkills as $otherskill) {
							?>
								<li><?=$otherskill;?></li>
							<? $i++; } ?>
							</ul>
						</div>
					
					</div>
					<? } ?>
	<!--OtherSkill end-->

	<!--Projects start-->
	<? if(array_filter($projName))
				{ ?>
					<div>
						<div class="mainTitle">
							<h2>Projects</h2>
						</div>

						<div>
							<? 
							$i=0;
							foreach($projName as $proj) {
							?>
							<div class="titleSection">
								<h2><?=$projName[$i];?></h2>
								<h4><?=$projFrom[$i];?>-<?=$projTo[$i];?></h4>
							</div>
							<div class="contentSection">
								<h3><?=$projRole[$i];?></h3>
								<p><?=nl2br($projDesc[$i]);?></p>
									<!--<ul>
										<li>Accomplishments 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. </li>
										<li>Accomplishments 2 Mauris at mauris tellus, ut convallis diam. </li>
									</ul>-->
							</div>
							<? $i++; } ?>
						</div>
					</div>
					<? } ?>
<!--Projects end-->

<!--Education start-->
<? if(array_filter($eduInst))
				{ ?>
					<div>
						
							<div class="mainTitle ">
								<h2>Education</h2>
							</div>
							<? 
							$i=0;
							foreach($eduInst as $edu) {
							?>
								<div class="titleSection">
									<h2><?=$eduInst[$i];?></h2>
									<h4><?=$eduFrom[$i];?> to <?=$eduTo[$i];?> </h4>
								</div>
								<div class="contentSection2 height40">
									<h3><?=$eduCert[$i];?></h3>
									<p><?=$eduScore[$i];?></p>
									
								</div>
							<? $i++; } ?>	
					</div>
					<? } ?>
<!--Education end-->

<!--Personal Information start -->
					<div class="height200" style="clear:both;">
							<div class="titleSection mainTitle">
								<h2>Personal Information</h2>
							</div>
							<div class="contentSection height200">
								<div>
									<h3>Phone</h3>
									<p><?=$phone;?></p>
								</div>
								<div>
									<h3>Email</h3>
									<p><?=$email;?></p>
								</div>
								<? if(trim($objective)!="")
								{ ?>
								<div>
									<h3>Site</h3>
									<p><?=$mysite;?></p>
								</div>
								<? } ?>
								
								
							</div>
					</div>
<!--Personal Information end -->
					
		</div>

	</div>


</div>


