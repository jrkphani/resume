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
  	<div class="header">
      <div class="left">
      	<div class="logo">        
        </div>
      </div>
      <div class="right">
      	<h1><?=$user_detail['first_name'];?> <?=$user_detail['last_name'];?></h1>
        <h2><?=$user_detail['designation'];?></h2>
      </div>
    </div>
    <div class="clearall"></div>
<!--    <p class="left styles italics">Email</p>
    <p class="right styles"><?=$user_detail['secondary_email'];?></p>
    <div class="clearall"></div>-->
    <?php if($user_detail['mobile']) { ?>
    <p class="left styles italics">Mobile</p>
    <p class="right styles"><?=$user_detail['mobile'];?></p>
    <div class="clearall"></div>
    <?php } if($website['mylink']) { ?>
    <p class="left styles italics">Web</p>
    <p class="right styles"><?=$website['mylink'];?></p>
    <div class="clearall"></div>
    <?php } if($user_detail['address']) { ?>
    <p class="left styles italics">Address</p>
    <p class="right styles"  style="line-height:18px;"><?=nl2br($user_detail['address']);?></p>
    <div class="clearall"></div>
    <?php } ?>

<!----------------------------------------------------object---------------------------------------------------------------------------->    
		<? if(trim($objective[1])){ ?>
    <div class="objective">
			  
        <p class="left styles2 italics2"><?=$objective[0];?></p>
        <p class="right styles2"><?=nl2br($objective[1]);?></p>
        <div class="clearall"></div>
     
    </div>
		 <? } ?>
<!----------------------------------------------------summary---------------------------------------------------------------------------->    
		<? if(trim($summary[1])){ ?>
		<div class="summary">
			
      <p class="left styles2 italics"><?=$summary[0];?></p>
      <p class="right styles2"><?=nl2br($summary[1]);?></p>
      <div class="clearall"></div>
      
    </div>
		<? } ?>

<!----------------------------------------------------left----------------------------------------------------------------------------> 

<!----------------------------------------------------experience----------------------------------------------------------------------------> 
  <?  if(array_filter($cmpnyName) || ($compensation[0]) || ($compensation[1]) || ($user_detail['experience']!='0.0')){ ?>
  
    <div class="left1_center1">
    	<div class="exp_yers center1">
        <h1 class="styles italics">Experience Summary</h1> 
				<?
        if($user_detail['experience']!='0.0'){
        $experience = explode('.',$user_detail['experience']);
        ?>       
        <h4><p>Total: <?=$experience[0];?> Years, <?=$experience[1];?> Months</p></h4>
       <? }      
       if($compensation[0])
     	 { ?>
        <h2>Current CTC: <span><?=$compensation[2];?> <?=$compensation[0];?>/-</span></h2>
       <? }
       
        if($compensation[1])
   	   {?>
        <h3>Expected CTC: <span><?=$compensation[2];?> <?=$compensation[1];?>/-</span></h3>
        <? } ?>
      </div>  
      <div class="clearall"></div>
   		 <? 
					$i=0;
					foreach($cmpnyName as $cmpny) {
            if($cmpny) {
						$cpmpanyData= explode('#',$cmpnyData[$i]);
				?>
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
             <p class="styles italics"><?=$cpmpanyData[0];?></p>
             <p class="styles italics"><?=$cpmpanyData[1];?></p>
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
          <p class="company_name"><?=$cmpny;?></p>   
          <p class="disig"><?=$cmpnyDesg[$i];?></p>
       </div>
      </div>
      <? } $i++; } ?>
      
     
    </div>
    <? } ?>
    






<!----------------------------------------------------right----------------------------------------------------------------------------> 

       
    <div class="right1">
    	<? if(array_filter($skillName)){ ?>
    	<h1 class="styles italics">My Tool Box</h1>
      	<div class="skill1_container margin_align">
			<?
			$i=0; 
			foreach($skillName as $name)
			{
        if($name) {
				$skillEffcount=$skillEff[$i];
				?>
         <p id="skill1" class="styles bullet"><?=$name;?></p>
         
        
         
                <div id="skill_level" class="styles pbar">
                <div class="pbar_inner">
                  <div class="pbar_fill pbar<?=$skillEffcount;?>"> 
                  </div>
                </div>
                
                  <p><?=$skillEffname[$skillEffcount-1];?></p>
                
              </div>
         
         
         <? } $i++; } ?><div class="clearall"></div>
        </div><div class="clearall"></div>
       <? } ?>
       
       
       
  <!-- other skills-->     
       
       
       
       
       <? if(array_filter($otherSkills) || $about['mystrength']) { ?>
       <h1 class="styles italics">My Strengths</h1>
      	<div class="skill1_container">
				<? 
        //skiping first record, becasue the first value will be always null
          $i=0;
          foreach($otherSkills as $name) {
            if($i)
           {
        ?>
         <p id="skill1" class="styles bullet2"><?=$name;?></p>
         <? } $i++; } ?><div class="clearall"></div>
         <p class="styles2 descp"><?=nl2br($about['mystrength']);?></p>
       </div><? } ?>
       <div class="clearall"></div>

<!----------------------------------------------------Contact----------------------------------------------------------------------------> 
       <?
       if($user_detail['secondary_email'] || $user_detail['skype'] || $website['linkedin'] || $website['twitter'] || $website['facebook'])
       {
       ?>
       <h1 class="styles italics"><?=$user_detail['contactTitle'];?></h1>
      	<div class="skill1_container">
		     <? if($user_detail['secondary_email']) { ?><p id="skill1" class="styles bullet1"><b>E-Mail : </b><?=$user_detail['secondary_email'];?></p><?php } ?>
         <? if($user_detail['skype']) { ?><p id="skill1" class="styles bullet1"><b>Skype : </b><?=$user_detail['skype'];?></p><? } ?>
         <? if($website['linkedin']) { ?><p id="skill1" class="styles bullet1"><b>LinkedIn : </b><?=$website['linkedin'];?></p><? } ?>
         <? if($website['twitter']) { ?><p id="skill1" class="styles bullet1"><b>Twitter : </b><?=$website['twitter'];?></p><? } ?>
         <? if($website['facebook']) { ?><p id="skill1" class="styles bullet1"><b>Facebook : </b><?=$website['facebook'];?></p><? } ?>
         <div class="clearall"></div>
       </div><div class="clearall"></div>
       <? } ?>
       
    </div> 
    
<!-- --------------------------------------------------project-------------------------------------------------------------------------- --> 
  <? if(array_filter($projName)) { ?>
  
    <div class="left1_center1">
    	<div class="exp_yers center1">
        <h1 class="styles italics">My Milestones</h1>        
      </div>  
      <div class="clearall"></div>
			<? 
				$i=0;
				foreach($projName as $proj) {
        if($proj) { ?>
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
    <!--         <p class="styles italics"><?=$cmpnyFrom[$i];?></p>
             <p class="styles italics"><?=$cmpnyTo[$i];?></p>        --> 
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
          <p class="company_name"><?=$proj;?></p>   
          <p class="disig"><?=$projRole[$i];?></p>
          <p class="url styles"><?=$projUrl[$i];?></p>
<!--          <p class="pro_descrip styles">Project Description</p>-->
          <p class="decrip styles2"><?=nl2br($projDesc[$i]);?></p>
          
    <!--          <p class="pro_descrip styles">What I Like About It</p>
          <p class="decrip styles2"><?=$cmpnyDesc[$i];?></p>      --> 
       </div>
      </div>
      <? } $i++; } ?>
      
     
    </div>
    <? } ?>
  <!-- --------------------------------------------------recommand-------------------------------------------------------------------------- --> 
  <!-- <?php /*?>    <? if(array_filter($cmpnyName)){ ?>
  
    <div class="left1_center1">
    	<div class="exp_yers">
        <h1 class="styles italics">My Recommendations</h1>        
      </div>  
      <div class="clearall"></div>
			<? 
        $i=0;
        foreach($cmpnyName as $cmpny) {
      ?>
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
             <p class="styles italics"><?=$cmpnyFrom[$i];?></p>
             <p class="styles italics"><?=$cmpnyTo[$i];?></p>        - 
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
          <p class="company_name">Murali Ramaamurthy</p>   
          <p class="disig">UI Designer</p>
          <p class="url styles">http://google.com</p>   - 
          <p class="pro_descrip styles">Sify Ltd</p>
          <p class="decrip styles2"><?=$cmpnyDesc[$i];?></p>
          <p class="pro_descrip styles">What I Like About It</p>
          <p class="decrip styles2"><?=$cmpnyDesc[$i];?></p>         - 
       </div>
      </div>
      <? $i++; } ?>
      
     
    </div>
    <? } ?>   
    <?php */?>
   -->    
 <!-- --------------------------------------------------recommand-------------------------------------------------------------------------- --> 
 <!--
<?php /*?> 
  <? if(array_filter($cmpnyName)){ ?>
  
    <div class="left1_center1">
    	<div class="exp_yers">
        <h1 class="styles italics">My References</h1>        
      </div>  
      <div class="clearall"></div>
			<? 
        $i=0;
        foreach($cmpnyName as $cmpny) {
      ?>
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
    <!--         <p class="styles italics"><?=$cmpnyFrom[$i];?></p>
             <p class="styles italics"><?=$cmpnyTo[$i];?></p>        ---> 
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
          <p class="company_name">Murali Ramaamurthy</p>   
          <p class="disig">UI Designer</p>
       <!--   <p class="url styles">http://google.com</p>   ---> 
          <p class="pro_descrip styles">Sify Ltd</p>
          <p class="rnumber styles2">9944432999</p>
      <!--    <p class="pro_descrip styles">What I Like About It</p>   --->
          <p class="rid styles2">mymailid@gmail.com</p>          
       </div>
      </div>
      <? $i++; } ?>
      
     
    </div>
    <? } ?> 
    <?php */?>
  -->    
 <!-- --------------------------------------------------education-------------------------------------------------------------------------- --> 
  <? if(array_filter($eduInst)) { ?>
  
    <div class="left1_center1">
    	<div class="exp_yers center1">
        <h1 class="styles italics">Education</h1>        
      </div>  
      <div class="clearall"></div>
    <? 
			$i=0;
			foreach($eduInst as $edu) {
        if($edu) {
				$educationDate = explode('#',$eduDate[$i]);
			?>
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
            <p class="styles italics"><?=$educationDate[0];?></p>
             <p class="styles italics"><?=$educationDate[1];?></p>       
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
          <p class="company_name"><?=$eduCert[$i];?></p>   
          <p class="disig"><?=$edu;?></p>
         <p class="url styles"><?=$eduScore[$i];?></p>  
       <!--    <p class="pro_descrip styles">Sify Ltd</p>
          <p class="rnumber styles2">9944432999</p>
         <p class="pro_descrip styles">What I Like About It</p>  
          <p class="rid styles2">mymailid@gmail.com</p>           --->
       </div>
      </div>
      <? } $i++; } ?>
      
     
    </div>
    <? } ?>    
         
 <!-- --------------------------------------------------awards-------------------------------------------------------------------------- --> 
<? if(array_filter($awdTitle)){ ?>
  
    <div class="left1_center1">
    	<div class="exp_yers center1">
        <h1 class="styles italics">Awards</h1>        
      </div>  
      <div class="clearall"></div>
    <? 
			$i=0;
			foreach($awdTitle as $awd) {
        if($awd) {
				$awardDate = explode('#',$awdDate[$i]);
			?>
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
            <p class="styles italics"><?=$awardDate[0];?></p>
             <p class="styles italics"><?=$awardDate[1];?></p>       
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
          <p class="company_name"><?=$awd;?></p>   
       <!--   <p class="disig">Sathyabama University</p>
         <p class="url styles">100%</p>   --->
           <p class="awd_desc styles2"><?=nl2br($awdDesc[$i]);?></p>
     <!--     <p class="rnumber styles2">9944432999</p>
         <p class="pro_descrip styles">What I Like About It</p>  
          <p class="rid styles2">mymailid@gmail.com</p>           --->
       </div>
      </div>
      <? } $i++; } ?>
      
     
    </div>
    <? } ?> 
             
 <!-- --------------------------------------------------interest-------------------------------------------------------------------------- --> 
  <? if(array_filter($intresttitle)) { ?>
  
    <div class="left1_center1">
    	<div class="exp_yers center1">
        <h1 class="styles italics">My Other Interest</h1>        
      </div>  
      <div class="clearall"></div>
			<? 
        $i=0;
				foreach($intresttitle as $title) {
      if($title) {?>
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
         <!--   <p class="styles italics"><?=$cmpnyFrom[$i];?></p>
             <p class="styles italics"><?=$cmpnyTo[$i];?></p>       -->
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
          <p class="company_name"><?=$title;?></p>   
        <p class="disig"><?=$intrestUrl[$i];?></p>
       <!--    <p class="url styles">http:google.com/</p>   --->
           <p class="awd_desc styles2"><?=nl2br($intrestDesc[$i]);?></p>
     <!--     <p class="rnumber styles2">9944432999</p>
         <p class="pro_descrip styles">What I Like About It</p>  
          <p class="rid styles2">mymailid@gmail.com</p>           --->
       </div>
      </div>
      <? } $i++; } ?>
      
     
    </div>
    <? } ?> 
    
  <!-- --------------------------------------------------other details-------------------------------------------------------------------------- -->    
    <? if(($user_detail['dob']) || ($user_detail['married']!='NULL') || ($passport_visa['passport']) || ($passport_visa['visa']))
    {?>
    <div class="left1_center1">
    	<div class="exp_yers center1">
        <h1 class="styles italics">Other Details</h1>        
      </div>  
      <div class="clearall"></div>
      

      
      <div class="exp_container">  
        <div class="left1">
          <div class="years">
         <!--   <p class="styles italics"><?=$cmpnyFrom[$i];?></p>
             <p class="styles italics"><?=$cmpnyTo[$i];?></p>       -->
          </div><div class="clearall"></div>
        </div>
        <div class="center1">
        
              <? if($user_detail['dob']){?>
              <p class="other_dets"><strong>DOB : </strong><?=$user_detail['dob'];?></p>
               <? } ?>
						<? if($user_detail['married']!='NULL')
            {
            if($user_detail['married'] == 1)
            $married = 'Married';
            else
            $married = 'Unmarried';
            ?>
          <p class="other_dets"><strong>Marital status: </strong><i><?=$married?></i></p>   
          <? } ?>
      <? if($passport_visa['passport'])
      {
		  //$passportDate=explode('#',$passport_visa['passportdate']);
		  ?>
          <p class="other_dets"><strong>Passport details: </strong><i><?=$passport_visa['passport']; /*$passportDate[0];*/ if($passport_visa['passportTo']) echo ', till '.$passport_visa['passportTo']; ?></i></p>
          <? } ?>
      <? if($passport_visa['visa'])
      {
		  //$visaDate= explode('#',$passport_visa['visadate']);
		  ?>
          <p class="other_dets"><strong>Visa details: </strong><i><?=$passport_visa['visa']; /*$visaDate[0];*/ if($passport_visa['visaTo']) echo ', till '.$passport_visa['visaTo']; ?></i></p>
          <? }?>
   <!--       <p class="disig">http://www.google.com</p>
         <p class="url styles">http:google.com/</p>  
           <p class="awd_desc styles2"><?=$cmpnyDesc[$i];?></p>
     <!--     <p class="rnumber styles2">9944432999</p>
         <p class="pro_descrip styles">What I Like About It</p>  
          <p class="rid styles2">mymailid@gmail.com</p>           --->
       </div>
      </div>
 
      
     
    </div>
  <? }?>
    
  <!-- end  --> 
  </div>
</body>
</html>