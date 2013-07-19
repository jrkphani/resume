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
    <p class="left styles italics">Email</p>
    <p class="right styles"><?=$user_detail['secondary_email'];?></p>
    <div class="clearall"></div>
    <p class="left styles italics">Mobile</p>
    <p class="right styles"><?=$user_detail['mobile'];?></p>
    <div class="clearall"></div>
    <p class="left styles italics">Address</p>
    <p class="right styles"><?=nl2br($user_detail['address']);?></p>
    <div class="clearall"></div>

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
  <?  if(array_filter($cmpnyName)){ ?>
  
    <div class="left1_center1">
    	<div class="exp_yers">
        <h1 class="styles italics">Experience Summary</h1>        
        <h4><p>Total: <?=$user_detail['experience'];?></p></h4>
        <h2>Current CTC: <span><?=$compensation[0];?>/-</span></h2>
        <h3>Expected CTC: <span><?=$compensation[1];?>/-</span></h3>
      </div>  
      <div class="clearall"></div>
   		 <? 
					$i=0;
					foreach($cmpnyName as $cmpny) {
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
      <? $i++; } ?>
      
     
    </div>
    <? } ?>
    






<!----------------------------------------------------right----------------------------------------------------------------------------> 

       
    <div class="right1">
    	<? if(array_filter($skillName)){ ?>
    	<h1 class="styles italics">My Tool Box</h1>
      	<div class="skill1_container">
					<? 
            $i=0;
            foreach($skillName as $name) {
          ?>
         <p id="skill1" class="styles bullet"><?=$name;?></p><p id="skill_level" class="styles"><?=$skillEff[$i];?></p>
         <? $i++; } ?><div class="clearall"></div>
        </div><div class="clearall"></div>
       <? } ?>
       
       <? if(array_filter($otherSkills)) { ?>
       <h1 class="styles italics">My Strengths</h1>
      	<div class="skill1_container">
					<? 
            $i=0;
            foreach($otherSkills as $name) {
          ?>
         <p id="skill1" class="styles bullet"><?=$name;?></p>
         <? $i++; } ?><div class="clearall"></div>
         <p class="styles2 descp"><?=$about['mystrength'];?></p>
       </div><? } ?>
       <div class="clearall"></div>

<!----------------------------------------------------Contact----------------------------------------------------------------------------> 
       <?
       if(array_filter($website))
       {
       ?>
       <h1 class="styles italics"><?=$user_detail['contactTitle'];?></h1>
      	<div class="skill1_container">
		
    		 <p id="skill1" class="styles bullet"><?=$website['mylink'];?></p>
         <? if($user_detail['skype']) { ?><p id="skill1" class="styles bullet"><?=$user_detail['skype'];?></p><? } ?>
         <? if($website['linkedin']) { ?><p id="skill1" class="styles bullet"><?=$website['linkedin'];?></p><? } ?>
         <? if($website['twitter']) { ?><p id="skill1" class="styles bullet"><?=$website['twitter'];?></p><? } ?>
         <? if($website['facebook']) { ?><p id="skill1" class="styles bullet"><?=$website['facebook'];?></p><? } ?>
         <div class="clearall"></div>
       </div><div class="clearall"></div>
     
       
    </div> 
      <? } ?>
<!-- --------------------------------------------------project-------------------------------------------------------------------------- --> 
  <? if(array_filter($projName)) { ?>
  
    <div class="left1_center1">
    	<div class="exp_yers">
        <h1 class="styles italics">My Milestones</h1>        
      </div>  
      <div class="clearall"></div>
			<? 
				$i=0;
				foreach($projName as $proj) {
			?>
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
          <p class="pro_descrip styles">Project Description</p>
          <p class="decrip styles2"><?=$projDesc[$i];?></p>
          
    <!--          <p class="pro_descrip styles">What I Like About It</p>
          <p class="decrip styles2"><?=$cmpnyDesc[$i];?></p>      --> 
       </div>
      </div>
      <? $i++; } ?>
      
     
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
    	<div class="exp_yers">
        <h1 class="styles italics">Education</h1>        
      </div>  
      <div class="clearall"></div>
    <? 
			$i=0;
			foreach($eduInst as $edu) {
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
      <? $i++; } ?>
      
     
    </div>
    <? } ?>    
         
 <!-- --------------------------------------------------awards-------------------------------------------------------------------------- --> 
<? if(array_filter($awdTitle)){ ?>
  
    <div class="left1_center1">
    	<div class="exp_yers">
        <h1 class="styles italics">Awards</h1>        
      </div>  
      <div class="clearall"></div>
    <? 
			$i=0;
			foreach($awdTitle as $awd) {
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
           <p class="awd_desc styles2"><?=$awdDesc[$i];?></p>
     <!--     <p class="rnumber styles2">9944432999</p>
         <p class="pro_descrip styles">What I Like About It</p>  
          <p class="rid styles2">mymailid@gmail.com</p>           --->
       </div>
      </div>
      <? $i++; } ?>
      
     
    </div>
    <? } ?> 
             
 <!-- --------------------------------------------------interest-------------------------------------------------------------------------- --> 
  <? if(array_filter($intresttitle)) { ?>
  
    <div class="left1_center1">
    	<div class="exp_yers">
        <h1 class="styles italics">My Other Interest</h1>        
      </div>  
      <div class="clearall"></div>
			<? 
        $i=0;
				foreach($intresttitle as $title) {
      ?>
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
           <p class="awd_desc styles2"><?=$intrestDesc[$i];?></p>
     <!--     <p class="rnumber styles2">9944432999</p>
         <p class="pro_descrip styles">What I Like About It</p>  
          <p class="rid styles2">mymailid@gmail.com</p>           --->
       </div>
      </div>
      <? $i++; } ?>
      
     
    </div>
    <? } ?> 
    
  <!-- --------------------------------------------------other details-------------------------------------------------------------------------- -->    
    <? if(($user_detail['married']) || ($passport_visa['passport']) || ($passport_visa['visa']))
    {?>
    <div class="left1_center1">
    	<div class="exp_yers">
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
						<? if($user_detail['married']!=NULL)
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
          <p class="other_dets"><strong>Passport details: </strong><i><?=$passport_visa['passport'];?>,&nbsp;<?php //$passportDate[0]; ?> till <?=$passport_visa['passportTo'];?></i></p>
          <? } ?>
      <? if($passport_visa['visa'])
      {
		  //$visaDate= explode('#',$passport_visa['visadate']);
		  ?>
          <p class="other_dets"><strong>Visa details: </strong><i><?=$passport_visa['visa'];?>,&nbsp;<?php //$visaDate[0];?> till <?=$passport_visa['visaTo'];?></i></p>
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