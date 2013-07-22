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
  <!---------------------------------------------------header----------------------------------------------------------------------------->
  <div class="header_top">&nbsp; </div>
  <div class="header_box1">
    <p class="name">
      <?=$user_detail['first_name'];?>
      <?=$user_detail['last_name'];?>
    </p>
    <p class="desigi">
      <?=$user_detail['designation'];?>
    </p>
  </div>
  <div class="clearall"></div>
  <!---------------------------------------------------left----------------------------------------------------------------------------->
  <div class="left"> 
    <!---------------------------------------------------objective----------------------------------------------------------------------------->
    <? if(trim($objective[1])){ ?>
    <div class="objective">
      <h1>
        <?=$objective[0];?>
      </h1>
      <p>
        <?=nl2br($objective[1]);?>
      </p>
    </div>
    <div class="clearall"></div>
    <? } ?>
    <!---------------------------------------------------summary----------------------------------------------------------------------------->
    <? if(trim($summary[1])){ ?>
    <div class="summary">
      <h1>
        <?=$summary[0];?>
      </h1>
      <p>
        <?=nl2br($summary[1]);?>
      </p>
    </div>
    <div class="clearall"></div>
    <? } ?>
    <!----------------------------------------------------experience---------------------------------------------------------------------------->
    
    <?  if(array_filter($cmpnyName)){ ?>
    <div class="experience">
      <h1>Experience Summary</h1>
      <div class="exp">
        <div class="exp_yers">
          <p class="exp_yers_btm"> <span>Total:
            <?=$user_detail['experience'];?>
            &nbsp;&nbsp;&nbsp;&nbsp;</span> </p>
          <div class="clearall"></div>
        </div>
        <div class="ctc">
          <h2 class="cctc">Current CTC: <span>
            <?=$compensation[0];?>
            /-</span></h2>
          <h3 class="ectc">Expected CTC: <span>
            <?=$compensation[1];?>
            /-</span></h3>
        </div>
        <div class="spr">&nbsp;</div>
        <div class="clearall"></div>
        <? 
            $i=0;
            foreach($cmpnyName as $cmpny) {
              $cpmpanyData= explode('#',$cmpnyData[$i]);
          ?>
        <p class="desigination">
          <?=$cmpnyDesg[$i];?>
        </p>
        <p class="company">
          <?=$cmpny;?>
        </p>
        <div class="clearall"></div>
        <p class="from">
          <?=$cpmpanyData[0];?>
          &nbsp;&nbsp;&nbsp;
          <?=$cpmpanyData[1];?>
        </p>
        <div class="clearall"></div>
        <? $i++; } ?>
      </div>
    </div>
    <div class="clearall"></div>
    <? } ?>
    <!----------------------------------------------------skills---------------------------------------------------------------------------->
    <? if(array_filter($skillName)){ ?>
    <div class="skills">
      <h1>My Tool Box</h1>
      <div class="left_skill">
        <? 
            $i=0;
            foreach($skillName as $name) {
          ?>
        <p class="desigination">
          <?=$name;?>
        </p>
        <p class="level">
          <?=$skillEff[$i];?>
        </p>
        <? $i++; } ?>
        <p class="desc">&nbsp;</p>
      </div>
    </div>
    <div class="clearall"></div>
    <? } ?>
    
    <!----------------------------------------------------project---------------------------------------------------------------------------->
    <? if(array_filter($projName)) { ?>
    <div class="project">
      <h1>My Milestones</h1>
      <div class="proj">
        <? 
          $i=0;
          foreach($projName as $proj) {
        ?>
        <p class="project_name">
          <?=$proj;?>
        </p>
        <p class="role">
          <?=$projRole[$i];?>
        </p>
        <div class="clearall"></div>
        <p class="url">
          <?=$projUrl[$i];?>
        </p>
        <div class="clearall"></div>
        <p class="descp_tit">Project Description</p>
        <p class="descp">
          <?=$projDesc[$i];?>
        </p>
        <!--          <p class="obj_tit">What I Like About It</p>
          <p class="obj"><?=$projDesc[$i];?></p>-->
        <? $i++; } ?>
      </div>
    </div>
    <div class="clearall"></div>
    <? } ?>
    
    <!----------------------------------------------------recommendation----------------------------------------------------------------------------> 
    
    <!--      <div class="recommend">
      	<h1>My Recommendations</h1>
				<div class="cmd">        	
          
        	<p class="cmd_name">Murali Ramaamurthy</p>
          <p class="role">UI Designer</p><div class="clearall"></div>
          <p class="company">Sify Ltd</p>
          <div class="clearall"></div>
          <p class="descp">Primary role as a Business Analyst and secondary role as a System Analyst in Procurement Domain (Purchase – Pay). A complete process automation of procurement from Purchase Requests till Invoice Generation including Reports Generation (Management Information </p>
      </div>
		</div><div class="clearall"></div>--> 
    
    <!-- --------------------------------------------------reference-------------------------------------------------------------------------- --> 
    
    <!--      <div class="reference">
      	<h1>My References</h1>
				<div class="refer">        	
          
        	<p class="refer_name">Murali Ramaamurthy </p>
          <p class="role">Senior Manage</p><div class="clearall"></div>
          <p class="company">ICC</p>
          <div class="clearall"></div>
          <p class="mobile">9944432999</p>
          <p class="mail">myname@domain.com</p>
        </div>
		</div><div class="clearall"></div>   --> 
    
    <!-- --------------------------------------------------awards-------------------------------------------------------------------------- -->
    <? if(array_filter($awdTitle)){ ?>
    <div class="awards">
      <h1>Awards</h1>
      <div class="awar">
        <? 
					$i=0;
					foreach($awdTitle as $awd) {
						$awardDate = explode('#',$awdDate[$i]);
					?>
        <p class="award_name">
          <?=$awd;?>
        </p>
        <p class="yers">
          <?=$awardDate[0];?>
          &nbsp;&nbsp;&nbsp;
          <?=$awardDate[1];?>
        </p>
        <div class="clearall"></div>
        <div class="clearall"></div>
        <p class="descp">
          <?=$awdDesc[$i];?>
        </p>
        <? $i++; } ?>
      </div>
    </div>
    <div class="clearall"></div>
    <? } ?>
    
    <!-- --------------------------------------------------interest-------------------------------------------------------------------------- -->
    <? if(array_filter($intresttitle)) { ?>
    <div class="interest">
      <h1>My Other Interest</h1>
      <? 
							$i=0;
							foreach($intresttitle as $title) {
							?>
      <div class="inte">
        <p class="inte_name">
          <?=$title;?>
        </p>
        <p class="url">
          <?=$intrestUrl[$i];?>
        </p>
        <div class="clearall"></div>
        <p class="descp">
          <?=$intrestDesc[$i];?>
        </p>
      </div>
      <? $i++; } ?>
    </div>
    <div class="clearall"></div>
    <? } ?>
    <!--------------------------------------------left end-----------------------------------------------------------------------------> 
  </div>
  <div class="right"> 
    <!---------------------------------------------------right-----------------------------------------------------------------------------> 
    
    <!---------------------------------------------------contact----------------------------------------------------------------------------->
    <div class="contact">
      <h1>Contact Me</h1>
      <p class="phone">
        <?=$user_detail['mobile'];?>
      </p>
      <p class="mail">
        <?=$user_detail['secondary_email'];?>
      </p>
      <p class="address">
        <?=nl2br($user_detail['address']);?>
      </p>
    </div>
    <div class="clearall"></div>
    
    <!---------------------------------------------------otherskills----------------------------------------------------------------------------->
    <? if(array_filter($otherSkills)) { ?>
    <div class="other_skills">
      <h1>My Strengths</h1>
      <? 
                $i=0;
                foreach($otherSkills as $name) {
              ?>
      <p class="otherskill_t3">
        <?=$name;?>
      </p>
      <? $i++; } ?>
      <div>
        <p  style="line-height:20px; margin:20px 0 0 0; font-size:14px; color: #3f3f3f;">
          <?=$about['mystrength'];?>
        </p>
      </div>
    </div>
    <div class="clearall"></div>
    <? } ?>
    <!---------------------------------------------------education----------------------------------------------------------------------------->
    
    <? if(array_filter($eduInst)) { ?>
    <div class="education">
      <h1>Education</h1>
      <div class="edu">
        <? 
							$i=0;
							foreach($eduInst as $edu) {
								$educationDate = explode('#',$eduDate[$i]);
							?>
        <p class="certification_name">
          <?=$eduCert[$i];?>
        </p>
        <p class="institution">
          <?=$edu;?>
        </p>
        <div class="clearall"></div>
        <p class="from">
          <?=$educationDate[0];?>
          &nbsp;&nbsp;&nbsp;
          <?=$educationDate[1];?>
        </p>
        <p class="percentage">
          <?=$eduScore[$i];?>
        </p>
        <? $i++; } ?>
      </div>
    </div>
    <div class="clearall"></div>
    <? } ?>
    <!---------------------------------------------------other details----------------------------------------------------------------------------->
    <? if(($user_detail['married']) || ($passport_visa['passport']) || ($passport_visa['visa']))
    {?>
    <div class="other_details">
      <h1>Other Details</h1>
      <div class="sub">
        <? if($user_detail['married']!=NULL)
      {
		  if($user_detail['married'] == 1)
		  $married = 'Married';
		  else
		  $married = 'Unmarried';
		  ?>
        <p class="mstatus"><b>Marital status:</b>
          <?=$married?>
        </p>
        <? }?>
        <? if($passport_visa['passport'])
      {
		  //$passportDate=explode('#',$passport_visa['passportdate']);
		  ?>
        <p class="passport"><b>Passport details:</b>
          <?=$passport_visa['passport'];?>
          , Valid:
          <?php //$passportDate[0]; ?>
          till
          <?=$passport_visa['passportTo'];?>
        </p>
        <? }?>
        <? if($passport_visa['visa'])
      {
		  //$visaDate= explode('#',$passport_visa['visadate']);
		  ?>
        <p class="visa"><b>Visa details:</b>
          <?=$passport_visa['visa'];?>
          , Valid:
          <?php //$visaDate[0];?>
          till
          <?=$passport_visa['visaTo'];?>
        </p>
        <? }?>
        
        
        <p class="lin">
         <?=$website['mylink'];?>
        </p>
        
        <? if($user_detail['skype']) { ?>
        <p class="skype">
         <?=$user_detail['skype'];?>
        </p>
       	<? } ?>
        
       <? if($website['facebook']) { ?>
        <p class="fb">
         		<?=$website['facebook'];?>
        </p>
       <? } ?>
        
       <? if($website['linkedin']) { ?>
        <p class="lin">
         <?=$website['linkedin'];?>
        </p>
       <? } ?>
       
     <? if($website['twitter']) { ?>
        <p class="twit">
          <?=$website['twitter'];?>
        </p>
       <? } ?>
        
        
        
      </div>
    </div>
    <div class="clearall"></div>
    <? } ?>
    
    <!---------------------------------------------------right end-----------------------------------------------------------------------------> 
  </div>
  <div class="clearall"></div>
</div>
</body>
</html>