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
$skillEffname=array("Don't Know","Training","Poor","Satisfactory","OK","Good","Very Good","Expert");
?>
</style>

<body>
<div class="wrapper"> 
  <!---------------------------------------------------header----------------------------------------------------------------------------->
  <div class="header">
    <div class="left_header"> </div>
    <div class="right_header">
      <div class="conatct">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="conatct_2">
          <?=$user_detail['mobile'];?>
        </span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="conatct_1">
         
        </span>
        <p class="conatct_3">
          <?=nl2br($user_detail['address']);?>
        </p>
      </div><div class="clearall"></div>
      <p class="name">
        <?=$user_detail['first_name'];?> 
        <?=$user_detail['last_name'];?>
      </p>
      <p class="desig">
        <?=$user_detail['designation'];?>
      </p>
    </div>
  </div>
  <div class="clearall"></div>
  <!----------------------------------------------------summary---------------------------------------------------------------------------->
  <? if(trim($summary[1])){ ?>
  <div class="Summary">
    <div class="left_obj">
      <p><?=$summary[0];?></p>
    </div>
    <div class="right_obj">
      <p>
        <?=nl2br($summary[1]);?>
      </p>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  <!----------------------------------------------------object---------------------------------------------------------------------------->
  <? if(trim($objective[1])){ ?>
  <div class="object">
    <div class="left_obj">
      <p><?=$objective[0];?></p>
    </div>
    <div class="right_obj">
      <p>
        <?=nl2br($objective[1]);?>
      </p>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  <!----------------------------------------------------experience---------------------------------------------------------------------------->
 <?  if(array_filter($cmpnyName)){ ?>
  <div class="experience">
    <div class="left_exp">
      <p>Experience Summary</p>
    </div>
      <?
      if($user_detail['experience']!='0.0'){
		  $experience = explode('.',$user_detail['experience']);
		  ?>
    <div class="right_exp">
    	<div class="spr">
          <p>
                <span>Total: <?=$experience[0];?> Years, <?=$experience[1];?> Months</span>
          </p>  <div class="clearall"></div>     
					<? }
          
           if($compensation[0])
          {?>
          <h2 class="cctc"><span>Current CTC:</span> <?=$compensation[2];?> <?=$compensation[0];?>/-</h2>
					 <? }
           
            if($compensation[1])
          {?>
          <h3 class="ectc"><span>Expected CTC:</span> <?=$compensation[2];?> <?=$compensation[1];?>/-</h3>
         <div class="clearall"></div>
          <div class="spr1">&nbsp;</div><? } ?>
      </div>
      
				 <? 
            $i=0;
            foreach($cmpnyName as $cmpny) {
              $cpmpanyData= explode('#',$cmpnyData[$i]);
          ?>
      <div class="desig">
        <p><span><?=$cmpnyDesg[$i];?></span></p>
      </div>
      <p class="from">
        <?=$cpmpanyData[0];?>
        &nbsp;&nbsp;&nbsp;
        <?=$cpmpanyData[1];?>
      </p>
      <p class="company_name">
        <?=$cmpny;?>
      </p>
<?php /*?>      <p class="descrip">
        <?=$cmpnyDesc[$i];?>
      </p><?php */?>
      <? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  <!----------------------------------------------------skills---------------------------------------------------------------------------->
  <?
	/*if(array_filter($skillName)) 
	customized for this template 
	*/
	if(array_filter($skillName) || array_filter($otherSkills))
{ ?>
  <div class="skill">
    
    <div class="left_skill">
      <p>Skills</p>
    </div>
    <div class="right_skill">
    	<? if(array_filter($skillName)) { ?>
      <div class="first_skill">
        <div>
          <p>My Tool Box</p>
        </div>
        <div class="mskill">
          <?
			$i=0; 
			foreach($skillName as $name)
			{
				$skillEffcount=$skillEff[$i];
				?>
          <div class="fskill">
            <?=$name;?>
          </div>
          <div class="level pbar">
            <div class="pbar_inner">
              <div class="pbar_fill pbar<?=$skillEffcount;?>"> </div>
            </div>
            <span>
              <?=$skillEffname[$skillEffcount-1];?>
            </span>
          </div>
          <?
			$i++;
			}?>
        </div>
      </div>  
      <div class="clearall"></div>
      <? } ?>
      
      
      <? if(array_filter($otherSkills)) { ?>
      <div class="other_skill">
        
          <p class="str">My Strengths</p>
        
        <div class="mskill">      
				<? 
			//skiping first record, becasue the first value will be always null
        $i=0;
        foreach($otherSkills as $name) {
        	if($i)
							{
							?>
          <p class="sskill"><?=$name;?></p>
      <? }
			$i++;
			}?>
       </div>
      </div>
      <div class="clearall"></div>      
      <p class="other_discrip"><?=$about['mystrength'];?></p>
    </div>
    <? } ?>
  </div>
  <div class="clearall"></div>
  <? } ?>
  <!-- project -->
  
  <? if(array_filter($projName)) { ?>
  <div class="project">
    <div class="left_exp">
      <p>My Milestones</p>
    </div>
    <div class="right_exp">
			<? 
      $i=0;
      foreach($projName as $proj) {
      ?>
      <div class="desig"><p><?=$proj;?></p></div>
      <p class="from"><?=$projRole[$i];?></p>
      <p class="company_name"><?=$projUrl[$i];?></p>
<!--      <p class="pro_desc_tit">Project Description</p>-->
      <p class="descrip"><?=$projDesc[$i];?></p>
     <!-- <p class="pro_obj_tit">What I Like About It</p>
      <p class="descrip">a Primary role as a Business Analyst and secondary role as a System Analyst in Procurement Domain (Purchase – Pay). A complete process automation of procurement from Purchase Requests till Invoice Generation including Reports Generation (Management Information systems ).</p>
-->      
			<? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
  <!-- recommandations -->
  
<!--  <div class="recommand">
    <div class="left_cmd">
      <p>My Recommendations</p>
    </div>
    <div class="right_cmd">
      <div class="name">Murali Ramaamurthy</div>
      <p class="desig">Project Manager</p>
      <p class="company_name">Sify Ltd</p>
      <p class="descrip">a Primary role as a Business Analyst and secondary role as a System Analyst in Procurement Domain (Purchase – Pay). A complete process automation of procurement from Purchase Requests till Invoice Generation including Reports Generation (Management Information systems ) , Vendor Management , Contract Management , Category / Brand & Bidding process , Supplier Rating . Purchase Orders, Agreements, Rate Contracts, File Management Services and PMO (Project Management Office).</p>
    </div>
  </div>
  <div class="clearall"></div>-->
  
    <!-- ------------------------------------------------reference---------------------------------------------------------------------- -->
<!--  
  <div class="reference">
    <div class="left_ref">
      <p>My References</p>
    </div>
    <div class="right_ref">
      <div class="name">Murali Ramaamurthy </div>
      <p class="desig">Senior Manager</p>
      <p class="company_name">ICC</p>
      <p class="mobile">9944432999</p>
      <p class="mail">mymail@domain.com</p>
      </div>
  </div>
  <div class="clearall"></div>-->
  
  <!-- ---------------------------------------------education-------------------------------------------------------------------- -->
   <? if(array_filter($eduInst)) { ?>
  <div class="education">
    <div class="left_edu">
      <p>Education</p>
    </div>
    <? 
		$i=0;
		foreach($eduInst as $edu) {
			$educationDate = explode('#',$eduDate[$i]);
		?>
    <div class="right_edu">
      <div class="desig">
        <?=$eduCert[$i];?>
      </div>
      <p class="from">
        <?=$educationDate[0];?>
        &nbsp;&nbsp;&nbsp;
        <?=$educationDate[1];?>
      </p>
      <p class="college_name">
        <?=$edu;?>
      </p>
      <p class="score"><?=$eduScore[$i];?></p>
    </div>
    <? $i++; } ?>
  </div>
  <div class="clearall"></div>
  <? } ?>
    <!-- --------------------------------------------------awards------------------------------------------------------------------------- -->
<? if(array_filter($awdTitle)){ ?>
  <div class="awards">
    <div class="left_award">
      <p>Awards</p>
    </div>
    <div class="right_award">
    <? 
							$i=0;
							foreach($awdTitle as $awd) {
								$awardDate = explode('#',$awdDate[$i]);
							?>
      <div class="name">
        <?=$awd;?>
      </div>
      <p class="from">
        <?=$awardDate[0];?>
        &nbsp;&nbsp;&nbsp;
        <?=$awardDate[1];?>
      </p><div class="clearall"></div>
      <p class="descrip">
        <?=nl2br($awdDesc[$i]);?>
      </p>
      <? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
    <!-- --------------------------------------------------interest-------------------------------------------------------------------------- -->
  <? if(array_filter($intresttitle)) { ?>
  <div class="interest">
    <div class="left_int">
      <p>My Other Interest</p>
    </div>
    <div class="right_int">
    <? 
							$i=0;
							foreach($intresttitle as $title) {
							?>
      <div class="desig">
        <p><?=$title;?></p>
      </div>
      <p class="url">
       <?=$intrestUrl[$i];?>
      </p>
      <p class="descrip">
        <?=nl2br($intrestDesc[$i]);?>
      </p>
      <? $i++; } ?>
    </div>
  </div>
  <div class="clearall"></div>
  <? } ?>
    <!-- --------------------------------------------------other details-------------------------------------------------------------------------- -->
    <? if(($user_detail['married']) || ($passport_visa['passport']) || ($passport_visa['visa']))
    {?>
  <div class="other_dls">
    <div class="left_dls">
      <p>Other Details</p>
    </div>

    <div class="right_dls">
      <div class="address_name">
      <? if($user_detail['dob']){?>
      <p>DOB : <?=$user_detail['dob'];?></p>
 			 <? } ?>
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
        <p>Passport details : <?=$passport_visa['passport'];?>, Valid : <?php //$passportDate[0]; ?>till <?=$passport_visa['passportTo'];?></p>
      <? }?>
      <? if($passport_visa['visa'])
      {
		  //$visaDate= explode('#',$passport_visa['visadate']);
		  ?>
        <p>Visa details : <?=$passport_visa['visa'];?>, Valid : <?php //$visaDate[0];?>till <?=$passport_visa['visaTo'];?></p>
      <? }?>
      </div>
    </div>
  </div>
  <? } ?>
  <div class="clearall"></div>

  <!-- --------------------------------------------------contacts-------------------------------------------------------------------------- -->
  <div class="contact_footer">
    <div class="left_contact">
      <p><?=$user_detail['contactTitle'];?></p>
    </div>
    <div class="right_contact">
    
     
       <p id=""><span>Mail id : </span><?=$user_detail['secondary_email'];?></p>
       
      <p id=""><span>Url : </span><?=$website['mylink'];?></p>
      
      <? if($website['facebook']) { ?>
      <p id=""><span>Facebook : </span><?=$website['facebook'];?></p>
      <? } ?>
      
      <? if($website['linkedin']) { ?>
      <p id=""><span>LinkedIn : </span><?=$website['linkedin'];?></p>
      <? } ?>
      
      <? if($website['twitter']) { ?>
      <p id=""><span>Twitter : </span><?=$website['twitter'];?></p>
      <? } ?>
      
       <? if($user_detail['skype']) { ?>
      <p id=""><span>Skype : </span><?=$user_detail['skype'];?></p>
      <? } ?>
      
    </div>
  </div>
</div>
</body>
</html>