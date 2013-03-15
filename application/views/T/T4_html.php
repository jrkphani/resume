<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/css/T/".$css."_css.css"; ?>"/> -->
<?php $string = read_file(FCPATH."/assets/css/T/".$template.".css"); ?>
<style>
<?=$string;?>
</style>
<!--Begin Resume Wrapper
===============================-->
<div class="resume-wrapper">

<!--Begin Left Column
=======================-->
  <div class="header">
    <div class="emp-details">
      <h3><?=$fname;?> <?=$lname;?></h3>
      <h4><?=$designation;?></h4>
      <p>Address line 01</p>
      <p>Address line 02</p>
      <p>Address line 03</p>
      <p class="info">Ph: <?=$phone;?></p>
      <p class="info">E-Mail: <?=$email;?></p>
      <? if(trim($objective)!=""){ ?>
      <p class="info">Site: <?=$mysite;?></p>
      <? } ?>
    </div>
  </div>

<!--Begin Left Column
=======================-->
  <div class="main-content">
    
        <!--Begin Objective
        ====================-->
        <? if(trim($objective)!=""){ ?>
        <h3>Objective</h3>
        <div class="content"><p><?=nl2br($objective);?></p></div>
        <div class="spacer20"></div>
        <? } ?>
        
        <!--Begin Summary
        ====================-->
        <? if(trim($summary)!=""){ ?>
        <h3>Summary</h3>
        <div class="content"><p><?=nl2br($summary);?></p></div>
        <div class="spacer20"></div>
        <? } ?>
        
         <!--Begin Experience
        ====================-->
        <? if(array_filter($cmpnyName)){ ?>
        <h3>Work Experience</h3>
        <!--Project01-->
        <? 
					$i=0;
					foreach($cmpnyName as $cmpny) {
				?>
        <div class="content">
        <p><h4><?=$cmpnyName[$i];?></h4>
        <h5><?=$cmpnyFrom[$i];?>-<?=$cmpnyTo[$i];?>  |  <?=$cmpnyDesg[$i];?></h5><?=$cmpnyDesc[$i];?></p>
        </div>
        <? $i++; } ?>	
        <? } ?>
        <div class="spacer20"></div>
        
         <!--Begin Skills
        ====================-->
        <? if(array_filter($skillName)){ ?>
        <h3>Skills</h3>
        <? 
					$i=0;
					foreach($skillName as $skill) {
				?>
        <!--Skill01-->
        <div class="content"><p>
        <h4><?=$skillName[$i];?></h4>
        <h5><?=$skillTitle[$i];?>  |  <?=$skillEff[$i];?></h5>
				<?=nl2br($skillDesc[$i]);?>
        </p></div>
        <? $i++; } ?>
        <? } ?>
        <div class="spacer20"></div>
        
         <!--Begin Education
        ====================-->
        <? if(array_filter($eduInst))
				{ ?>
        <h3>Education</h3>
        <? 
					$i=0;
					foreach($eduInst as $edu) {
				?>
        <!--Education-->
        <div class="content">
        <h4><?=$eduInst[$i];?>  |  <?=$eduFrom[$i];?>-<?=$eduTo[$i];?></h4>
        <h5><?=$eduCert[$i];?>  |  <?=$eduScore[$i];?></h5>
        </div>
        <? $i++; } ?>	
        <? } ?>
        <div class="spacer20"></div>
        
        <!--Begin Projects
        ====================-->
        <? if(array_filter($projName))
				{ ?>
        <h3>Projects</h3>
        <? 
					$i=0;
					foreach($projName as $proj) {
				?>
        <!--Education-->
        <div class="content">
        <p>
				<h4><?=$projName[$i];?></h4>
        <h5><?=$projFrom[$i];?>-<?=$projTo[$i];?>  |  <?=$projRole[$i];?></h5>
				<?=nl2br($projDesc[$i]);?></p>
        </div>
        <? $i++; } ?>	
        <? } ?>
        <div class="spacer20"></div>
        
   </div>
</div>
</body>
</html>
