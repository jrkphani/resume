<style>
<?
include(FCPATH."/assets/css/T/".$template.".php");

//unserialize datas
$website = unserialize($about['website']);
$objective= unserialize($about['objective']);
$summary= unserialize($about['summary']);
$compensation= unserialize($about['compensation']);
$skillName= unserialize($skill['name']);
$skillEff= unserialize($skill['efficiency']);
$otherSkills= unserialize($otherSkills['name']);
$cmpnyName= unserialize($company['name']);
$cmpnyDesg= unserialize($company['designation']);
$cmpnyData= unserialize($company['date']);
$projName= unserialize($project['name']);
$projRole= unserialize($project['role']);
$projUrl= unserialize($project['url']);
$projDesc= unserialize($project['description']);
$eduInst= unserialize($education['institution']);
$eduCert= unserialize($education['certification']);
$eduScore= unserialize($education['score']);
$eduDate= unserialize($education['date']);
$awdTitle= unserialize($awards['title']);
$awdDate= unserialize($awards['date']);
$awdDesc= unserialize($awards['description']);
$intresttitle= unserialize($about['intresttitle']);
$intrestDesc= unserialize($about['intrestDesc']);
$intrestUrl= unserialize($about['intrestUrl']);
$passport_visa = unserialize($about['passport_visa']);
?>
</style>

<body>
<div class="wrapper"> 
  <!---------------------------header---------------------------->
  <div class="header_top">
  	<div class="header_box1">
      <p class="name">
        <?=$user_detail['first_name'];?> 
        <?=$user_detail['last_name'];?>
      </p>
      <p class="desigi">
        <?=$user_detail['designation'];?>
      </p>
    </div>
  </div>
  <div class="clearall"></div>
  <div class="header">

    <div class="header_box2">
      <div class="header_box2_center"> <p>
        <?=$website['mylink'];?>
        </p>
        <div class="header_box2_center_img"> </div>
      </div>
    </div>
    <div class="header_box3">
      <p>
        <?=$user_detail['mobile'];?>
      </p>
      <div class="header_box3_center_img"> </div>
    </div>
    <div class="header_box4">
      <div class="header_box4_atag"> <p>
        <?=$user_detail['secondary_email'];?>
        </p>
        <div class="header_box4_center_img"> </div>
      </div>
    </div>
  </div>
  <div class="clearall"></div>
  <!---------------------------summary---------------------------->
  <? if(trim($summary[1])){ ?>
  <div class="summary">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
    <div class="right_content">
      <h1><?=$summary[0];?></h1>
      <p>
        <?=nl2br($summary[1]);?>
      </p>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  
  <!---------------------------objective---------------------------->
  <? if(trim($objective[1])){ ?>
  <div class="objective">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
    <div class="right_content">
      <h1><?=$objective[0];?></h1>
      <p>
        <?=nl2br($objective[1]);?>
      </p>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  <!---------------------------experience---------------------------->
    <?  if(array_filter($cmpnyName)){ ?>
  <div class="experience">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
    <div class="right_content">
      <h1>EXPERIENCE SUMMARY</h1>
      
      <h4>
      	    <p>Total: <?=$user_detail['experience'];?> </p>
      </h4> <div class="clearall"></div>
      <? if(array_filter($compensation)) { ?>
       <h2><i>Current CTC: &nbsp;<?=$compensation[2];?> <?=$compensation[0];?>/-</i></h2>
        <h3><i>Expected CTC: &nbsp;<?=$compensation[2];?> <?=$compensation[1];?>/-</i></h3><div class="clearall"></div>
        <div class="spr">&nbsp;</div>
        <? } ?>
    </div>
    <div class="clearall"></div>
    <? 
		if(array_filter($cmpnyName))
			{
				$i=0;
				foreach($cmpnyName as $cmpny) {
				$cpmpanyData= explode('#',$cmpnyData[$i]);
		?>
    <div class="experience_content">
      <div class="experience_content_lft">
        <p class="year_from">
          <?=$cpmpanyData[0];?>
        </p>
        <p class="year_to">
          <?=$cpmpanyData[1];?>
        </p>
      </div>
      <div class="experience_content_rit">
      
      	<div class="exp_details">
        		<p class="tot_yrs"></p>
            <p class="non-it"></p>
            <p class="it"></p>
        </div>
       
        <h2>
          <?=$cmpnyDesg[$i];?>
        </h2>
        <h3>
        <?=$cmpny;?>
        </h3>
      </div>
      <div class="clearall"></div>
      <? $i++; } }?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  
  
  <!---------------------------skills---------------------------->
  <?
	/*if(array_filter($skillName)) 
	customized for this template 
	*/
	if(array_filter($skillName) || array_filter($otherSkills))
{ ?>
  <div class="skills">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
    <div class="right_content">
      <h1>Skill</h1>
			<? if(array_filter($skillName)) { ?>
      <div class="main_skills">
        <p>MY TOOL BOX</p>
        <div class="mskill">
			<?
			$i=0; 
			foreach($skillName as $name)
			{?>
          <div><p class="fskill"><?=$name;?></p><p class="level"><?=$skillEff[$i];?></p></div>
			<?
			$i++;
			}?>
        </div>
      </div>
      <? } ?>
      
      <? if(array_filter($otherSkills)) { ?>
      <div class="clearall"></div>
      <div class="other_skills">
        <p>MY STRENGTHS</p>
        <div class="mskill">
			<?
			$i=0; 
			foreach($otherSkills as $name)
			{?>
			<div><p class="sskill"><?=$name;?></p> </div>
			<?
			$i++;
			}?>
        </div>
      </div>
      <? } ?><div class="clearall"></div>
      <p class="skill_content"><?=$about['mystrength'];?></p>
    </div>
  </div> <div class="clearall"></div>
  <? } ?>


    <!---------------------------projects---------------------------->  
      <? if(array_filter($projName)) { ?>
    <div class="projects">
      <div class="left_content">
        <div class="left_icon"></div>
      </div>
      <div class="right_content">
        <h1>MY MILESTONES</h1>
      </div>
      <div class="clearall"></div>
							<? 
							$i=0;
							foreach($projName as $proj) {
							?>
    <div class="comment_content">
      <div class="comment_content_lft">
        <p class="year_from">
          
        </p>
        <p class="year_to">
         
        </p>
      </div>
      <div class="comment_content_rit">
        <h2>
         <?=$proj;?>
        </h2>
        <h3>
       <?=$projRole[$i];?>
        </h3>
        <p>
          <?=$projUrl[$i];?>
        </p>
        <h4>Project Description</h4>
        <p> <?=$projDesc[$i];?> </p>
      </div>
      <div class="clearall"></div>
      <? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  
      
  <!---------------------------education---------------------------->
  <? if(array_filter($eduInst)) { ?>
  <div class="education">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
    <div class="right_content">
      <h1>EDUCATION</h1>
    </div>
    <div class="clearall"></div>
    <? 
							$i=0;
							foreach($eduInst as $edu) {
								$educationDate = explode('#',$eduDate[$i]);
							?>
    <div class="edu_content">
      <div class="edu_content_lft">
        <p class="year_from">
          <?=$educationDate[0];?>
        </p>
        <p class="year_to">
          <?=$educationDate[1];?>
        </p>
      </div>
      <div class="edu_content_rit">
        <h2>
          <?=$eduCert[$i];?>
        </h2>
        <h3>
        <?=$edu;?>
        </h3>
        <p>
          <?=$eduScore[$i];?>
        </p>
      </div>
      <div class="clearall"></div>
      <? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  
  
  
    <!---------------------------awards---------------------------->  
    
    <? if(array_filter($awdTitle)){ ?>
  <div class="awards">
    <div class="left_content">
      <div class="left_icon_awards"></div>
    </div>
    <div class="right_content">
      <h1>AWARDS</h1>
    </div>
    <div class="clearall"></div>
    <? 
							$i=0;
							foreach($awdTitle as $awd) {
								$awardDate = explode('#',$awdDate[$i]);
							?>
    <div class="awards_content">
      <div class="awards_content_lft">
        <p class="year_from">
          <?=$awardDate[0];?>
        </p>
        <p class="year_to">
          <?=$awardDate[1];?>
        </p>
      </div>
      <div class="awards_content_rit">
        <h3>
       <?=$awd;?>
        </h3>
        <p>
          <?=$awdDesc[$i];?>
        </p>
      </div>
      <div class="clearall"></div>
      <? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?> 
    
    
     <!---------------------------interest---------------------------->
  <? if(array_filter($intresttitle)) { ?>
  <div class="interest">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
    <div class="right_content">
      <h1>MY OTHER INTERESTS</h1>
    </div>
    <div class="clearall"></div>
    <? 
							$i=0;
							foreach($intresttitle as $title) {
							?>
    <div class="interest_content">
      <div class="interest_content_lft">
        <p class="year_from">
          
        </p>
        <p class="year_to">
         
        </p>
      </div>
      <div class="interest_content_rit">
        <h2>
          <?=$title;?>
        </h2>
        <h3>
        <?=$intrestUrl[$i];?>
        </h3>
       
        <p><?=$intrestDesc[$i];?></p>
      </div>
      <div class="clearall"></div>
      <? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>  
    
  <!---------------------------other details----------------------------> 
    <? if(($user_detail['married']) || ($passport_visa['passport']) || ($passport_visa['visa']))
    {?>
    <div class="other_details">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
  
    <div class="right_content">
      <h1>Other Details</h1>
      <? if($user_detail['married']!=NULL)
      {
		  if($user_detail['married'] == 1)
		  $married = 'Married';
		  else
		  $married = 'Unmarried';
		  ?>
        <p>Marital status : <?=$married?></p>
      <? }?>
      <? if($passport_visa['passport'])
      {
		  //$passportDate=explode('#',$passport_visa['passportdate']);
		  ?>
        <p>Passport details : <?=$passport_visa['passport'];?></p>
        <p>Valid : <?php //$passportDate[0]; ?>till <?=$passport_visa['passportTo'];?></p>
      <? }?>
      <? if($passport_visa['visa'])
      {
		  //$visaDate= explode('#',$passport_visa['visadate']);
		  ?>
        <p>Visa details : <?=$passport_visa['visa'];?></p>
        <p>Valid : <?php //$visaDate[0];?>till <?=$passport_visa['visaTo'];?></p>
      <? }?>
    </div>
   </div>    
    <div class="clearall"></div>
     <? } ?>

  <!---------------------------address----------------------------> 
    <div class="address">
    <div class="left_content">
      <div class="left_icon"></div>
    </div>
    <div class="right_content">
      <h1><?=$user_detail['contactTitle'];?></h1>
      
        <p><?=nl2br($user_detail['address']);?></p>
        
        <? if($user_detail['skype']) { ?>
        <p><?=$user_detail['skype'];?></p>
        <? } ?>
        
        <? if($website['linkedin']) { ?>
        <p><?=$website['linkedin'];?></p>
        <? } ?>
        
        <? if($website['twitter']) { ?>
        <p><?=$website['twitter'];?></p>
        <? } ?>
        
        <? if($website['facebook']) { ?>
        <p><?=$website['facebook'];?></p>
        <? } ?>
    </div>
   </div>
   
       <!---------------------------interest---------------------------->
</div>
</body>
</html>