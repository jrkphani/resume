<style>
<?
include(FCPATH."/assets/css/T/".$template['template'].".php");
?>
</style>
<div class="resume">
	<div class="inner">
		<div class="resumeHeader">
					<div class="headerLeft mainTitle">
						<div class="photoBorder">
							<?
							if($template['photo']=="")
							{ ?><img src="<? echo base_url('assets/img/userPhoto.png'); ?>" />
							<? }
							else
							{ ?>
								<img src="<? echo $template['photo']; ?>">
							<? } ?>
						</div>
						<div class="userName">
							<h2><?=$basic['first_name'];?> <?=$basic['last_name'];?></h2>
							<h3><?=$basic['tag_line'];?></h3>
						</div>
					</div>
		</div>

		<div class="resumeBody">
			
<!--objective start-->
<? if(trim($basic['objective'])!="")
{ ?>
					<div>
						<div class="titleSection">
							<h2>Objective</h2>
						</div>
						<div class="contentSection">
							<p>
								<?=nl2br($basic['objective']);?>
							</p>
						</div>
					</div>
					<? } ?>
<!--objective end-->

<!--summary start-->
<? if(trim($basic['summary'])!="")
{ ?>
					<div>
						<div class="titleSection">
							<h2>Summary</h2>
						</div>
						<div class="contentSection">
							<p>
								<?=nl2br($basic['summary']);?>
							</p>
						</div>
					</div>
					<? } ?>
<!--summary end-->

<!--Company start-->
<? if(array_filter($company['name']))
{ ?>
					<div>
						<div class="mainTitle">
							<h2> Work Experiences</h2>
						</div>

						<div>
							<? 
							$i=0;
							foreach($company['name'] as $cmpny) {
							?>
							<div class="titleSection">
								<h2><?=$company['name'][$i];?></h2>
								<h4><?=$company['from'][$i];?>-<?=$company['to'][$i];?></h4>
							</div>
							<div class="contentSection">
								<h3><?=$company['designation'][$i];?></h3>
								<p><?=$company['description'][$i];?></p>
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
<? if(array_filter($skill['name']))
{ ?>
					<div>
						<div class="mainTitle">
							<h2>Key Skills</h2>
						</div>
						<div  >
							<? 
							$i=0;
							foreach($skill['name'] as $skil) {
							?>
								<div class="titleSection">
									<h2><?=$skill['name'][$i];?></h2>
								</div>
								<div class="contentSection">
									<h3><?=$skill['effeciency'][$i];?></h3>
									
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
	<? if(array_filter($project['name']))
				{ ?>
					<div>
						<div class="mainTitle">
							<h2>Projects</h2>
						</div>

						<div>
							<? 
							$i=0;
							foreach($project['name'] as $proj) {
							?>
							<div class="titleSection">
								<h2><?=$project['name'][$i];?></h2>
								<h4><?=$project['from'][$i];?>-<?=$project['to'][$i];?></h4>
							</div>
							<div class="contentSection">
								<h3><?=$project['role'][$i];?></h3>
								<p><?=nl2br($project['description'][$i]);?></p>
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
<? if(array_filter($education['institution']))
				{ ?>
					<div>
						
							<div class="mainTitle ">
								<h2>Education</h2>
							</div>
							<? 
							$i=0;
							foreach($education['institution'] as $edu) {
							?>
								<div class="titleSection">
									<h2><?=$education['institution'][$i];?></h2>
									<h4><?=$education['from'][$i];?> to <?=$education['to'][$i];?> </h4>
								</div>
								<div class="contentSection2 height40">
									<h3><?=$education['certification'][$i];?></h3>
									<p><?=$education['score'][$i];?></p>
									
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
									<p><?=$basic['mobile'];?></p>
								</div>
								<div>
									<h3>Email</h3>
									<p><?=$basic['secondary_email'];?></p>
								</div>
								<? if(trim($basic['website'])!="")
								{ 
									$website = unserialize($basic['website']);
									?>
								<div>
									<? foreach($website as $key=>$value)
									{?>
										<h3><?=$key?></h3>
									<p><?=$value?></p>
									<?}?>
								</div>
								<? } ?>
								
								
							</div>
					</div>
<!--Personal Information end -->
					
		</div>

	</div>


</div>


