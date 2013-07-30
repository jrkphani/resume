<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/colorbox.css"); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_resume.css"); ?>" />

<!--<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/jquery.toastmessage.css"); ?>"/>
<div id="toast"></div>-->
<style>
	/* to hide days in calender */
.ui-datepicker-calendar {     display: none; }​
</style>
<?php
	$keywords = array("Ability to Delegate", "Analytical Ability", "Can Handle to Work Overlay", "Competitive", "Competencies", "Collaborative", "Enthusiastic", "Flexible", "Follow Through Leadership", "High Energy", "Mutli-task oriented", "Organizational skills", "Presentation Skills", "Rigorous", "Self-driven", "Team building", "Setting priorities", "Self Managing", "Achievement oriented", "Adaptable", "Ability to Implement", "Ability to Plan", "Ability to Train", "Accurate", "Assertive", "Budget-driven", "Creative", "Communication Skills", "Conceptual Ability", "Dependable", "Deadline driven", "Detail-oriented", "Emphasis", "Energetic", "Ethical", "Excellent Track Record", "Extensive Experience", "Focused", "Good Understanding", "Independent", "Innovative", "Industrious", "Leadership", "Motivated", "Open Communication", "Open Minded", "Organized", "Problem Solving", "Process Oriented", "Proficient", "Persuasive", "Results Focused", "Results Oriented", "Resourcefulness", "Self Accountable", "Supportive", "Takes Initiative", "Versatile", "Reliable", "Articulate", "Customer Focused ", "Client Focused");
?>
<div class="form_title">
	<h3>Discover Yourself</h3>
</div>
<div class="right_nav">
	<h3> YOU ARE HERE </h3>
  <span class="rsum_tp_rs showSelectTemplate">Choose Resume Style</span>
	<a href="<?=base_url('resume'); ?>"class="rsum_tp">Discover Yourself</a>
  
	<span tab='#about_tab' class="tab rns rns_a rns_inner abt_tab">About Me</span>
	<span tab='#objective_tab' class="tab rns rns_inner">Designation, Objective</span>
	<span tab='#contact_tab' class="tab rns rns_inner">Contact Me</span>
	<span tab='#experience_tab' class="tab rns rns_inner">Experience Summary</span>
	<span tab='#strength_tab' class="tab rns rns_inner">My Strength </span>
	<span tab='#tool_tab' class="tab rns rns_inner">My Tool Box</span>
	<span tab='#milestones_tab' class="tab rns rns_inner">My Milestones</span>
	<span tab='#edication_tab' class="tab rns rns_inner">Education & Awards</span>
	<span tab='#moreabout_tab' class="tab rns rns_inner">More About Me</span>
	<!-- <span class="rns"><span class="rnd">3</span>Build Your Image</span> -->
	<a href="<?=base_url('login'); ?>"class="rsum_tp1">Register with EZCV</a>
</div>
<!--<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>-->
<div class="left_form">
	<?
	if(!$templateValue)
	{
		if(isset($user_detail[0]['Template']))
		$templateValue = $user_detail[0]['Template'];
	}
		
	?>
	
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
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<p class="showSelectTemplate">&nbsp;</p><br />
        <a href="#" class="cht showSelectTemplate" style="background:none!important;">Change Template</a>
				<div class="clearboth"></div>
				<p> Tell us about yourself in this section. You can enter your name and current location as well as talk about yourself and what you have been doing till date.</p>
			</div>
			
			<div class="form_sections">
				<div>
					<input type="text" name="fname"  id="first_name" placeholder="First name"  value="<? if(isset($user_detail[0]['first_name'])) echo $user_detail[0]['first_name']; ?>" maxlength="30" required/>
          
					<input name="lname" type="text"  id="last_name" placeholder="Last name" value="<? if(isset($user_detail[0]['last_name'])) echo $user_detail[0]['last_name']; ?>" maxlength="30" required/>
          <span class="fnme" id="fname_err"></span>
          <span class="lnme" id="lname_err"></span>
				</div>
				
			<!-- DOB -->
				<div>
				    <label >Date of Birth</label>
				    <?
				    if(isset($user_detail[0]['dob'])) 
				    $dob = explode('-',$user_detail[0]['dob']);
				    ?>
				    <select class="w100" name="dobMonth">
						<?
						if((!isset($dob[0])) || (!$dob[0]))
						echo '<option value="0" selected="selected">Month</option>';
						else
						echo '<option value="0">Month</option>';
						for($i=0; $i<=11; $i++)
						{
						?>
						<option value="<?=$dateMonth[$i];?>" <? if(isset($dob[0]) && $dob[0]==$dateMonth[$i]){ echo 'selected="selected"';} ?> > <?=$dateMonth[$i];?> </option>
						<? } ?>
				    </select>
				    <select class="w100" name="dobDay">
						<?
						if((!isset($dob[0])) || (!$dob[0]))
						echo '<option value="0" selected="selected">Day</option>';
						else
						echo '<option value="0" >Day</option>';
						for($i=1; $i<=31; $i++)
						{
						?>
						<option value="<?=$i;?>" <? if(isset($dob[1]) && $dob[1]==$i){ echo 'selected="selected"';} ?> > <?=$i;?> </option>
						<? } ?>
				    </select>
				    <select class="w100" name="dobYear">
						<?
						if((!isset($dob[0])) || (!$dob[0]))
						echo '<option value="0" selected="selected">Year</option>';
						else
						echo '<option value="0">Year</option>';
						
						$current_Year=date('Y');
						for($i=1; $i<=99; $i++)
						{
						?>
						<option value="<?=$current_Year;?>" <? if(isset($dob[2]) && $dob[2]==$current_Year){ echo 'selected="selected"';} ?> > <?=$current_Year--;?> </option>
						<? } ?>
				    </select>
				    <!--<input  type="text"  class="full_date_picker" name="dob" placeholder="Feb-09-1989" value="<? if(isset($user_detail[0]['dob'])) echo $user_detail[0]['dob']; ?>"  readonly="readonly" required/>-->
				</div>
			<!-- Address -->
				<div >
				    <label >Current Address</label>
				    <textarea rows="3"  type="text"  name="address" placeholder="Address" maxlength="90"><? if(isset($user_detail[0]['address'])) echo $user_detail[0]['address']; ?></textarea>
				</div>
			<!-- Summary -->
				<div>
					<select class="custTitle" name="summaryTitle">
						<?
						$summary[0]=NULL;
						$summary[1]=NULL;
						$found=0;
						if(isset($about[0]['summary']))
						{
						$summary=unserialize($about[0]['summary']);
						?>
						<option value="Who I am" <? if($summary[0] == 'Who I am') {echo 'selected="selected"'; $found=1; } ?>>Who I am</option>
						<option value="About me" <? if($summary[0] == 'About me') {echo 'selected="selected"'; $found=1; } ?>>About me</option>
						<option value="Summary" <? if($summary[0] == 'Summary') {echo 'selected="selected"'; $found=1; } ?>>Summary</option>
						<option value="Custom heading" <?if(!$found)echo 'selected="selected"';?> >Custom heading</option>					
						<?
						}
						else
						{?>
						<option value="Who I am" >Who I	 am</option>
						<option value="About me" >About me</option>
						<option value="Summary" >Summary</option>
						<option value="Custom heading" >Custom heading</option>
						<?}
						?>
						
					</select>
					<input  id="summaryTitle" name='cusSummaryTitle' <?if(isset($about[0]['summary']) && (!$found)) {echo 'value="'.$summary[0].'"'; } else{ echo 'style="display:none;"'; }?> type="text"  placeholder="Enter Text"  maxlength="25"/>
				</div>
				<div class="textarea_big">
					<!-- <label >Summary</label> -->
				    <textarea rows="3" name="summary" type="text"  placeholder="Enter text here" maxlength="1000" class="h200"><?if(isset($about[0]['summary']))echo $summary[1];?></textarea>
				    
				</div>
        <div style="float:left; margin: -53px 0 0 0;" class="content233">
        <h3>Suggestions</h3>
        		<div divId="sug1" class="scroll_top scroll_top_inact sug_top1"></div>
        		<div style="overflow:hidden; width:300px; height:188px;">
					<div class="suggestion_box" id="sug1">
					    		<?php foreach ($keywords as $key) { echo '<span>'.$key.'</span>'; } ?>
					</div>
				</div>
				<div class="scroll_btm sug_bot1" divId="sug1"></div>
            </div>
				 <div class="clearboth"></div>
				<span style="margin-top:10px;" class="clickr next" href='#objective_tab'>Continue</span>
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
				<h3>DESIGNATION, OBJECTIVE</h3>				
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span class="showSelectTemplate">Change Template</span>
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
				<select class="custTitle" name="objectivesTitle">
					<?
					$objective[0]=NULL;
					$objective[1]=NULL;
					$found=0;
					if(isset($about[0]['objective']))
					{
					$objective=unserialize($about[0]['objective']);
					?>
					<option value="What I want" <? if($objective[0] == 'What I want') {echo 'selected="selected"'; $found=1; } ?>>What I want</option>
					<option value="Purpose" <? if($objective[0] == 'Purpose') {echo 'selected="selected"'; $found=1; } ?>>Purpose</option>
					<option value="Objective" <? if($objective[0] == 'Objective') {echo 'selected="selected"'; $found=1; } ?>>Objective</option>
					<option value="Custom heading" <?if(!$found)echo 'selected="selected"';?>>Custom heading</option>
					<?
					}
					else
					{
					?>
					<option value="What I want" >What I want</option>
					<option value="Purpose" >Purpose</option>
					<option value="Objective" >Objective</option>
					<option value="Custom heading" >Custom heading</option>
					<? }?>
				</select>
				<input id="objectivesTitle" name="cusObjectivesTitle" type="text" <?if(isset($about[0]['objective']) && (!$found)) {echo 'value="'.$objective[0].'"'; } else{ echo 'style="display:none;"'; }?> placeholder="Enter text here" />
			</div>
			<div class="textarea_big">
			    <!-- <label >Objective</label> -->
			    
			    <textarea rows="3"  name="objective" type="text"  placeholder="Enter Text here" class="h200"><?php if(isset($about[0]['objective'])) echo $objective[1]; ?></textarea>
			</div>
			<div style="float:left;  margin: -53px 0 0 0;" class="content233">
			<h3>Suggestions</h3>
			<div divId="sug2" class="scroll_top scroll_top_inact sug_top1"></div>
			<div style="overflow:hidden; width:300px; height:188px;">
				<div class="suggestion_box" id="sug2">
					<?php foreach ($keywords as $key) { echo '<span>'.$key.'</span>'; } ?>
				</div>
			</div>
				<div class="scroll_btm sug_bot1" divId="sug2"></div>
			</div>
			 <div class="clearboth"></div>

			
			<span class="clickb next" href='#about_tab'>Back</span>
			<span class="clickr next" style="margin-top:10px;" href='#contact_tab'>Continue</span>
		</div>
		</div>
		
		<!-- ===================================================================== Designation,Objective tab end ==================-->
				
			  
		<!-- ===================================================================== Contact Me tab start ==================-->
		<div id="contact_tab"  class="tabs">
			<div class="left_form_title">
				<h3>Contact Me</h3>
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span class="showSelectTemplate">Change Template</span>
				<div class="clearboth"></div>
				<p> In this section you can reveal your contact details and decide exactly how you would like your employers to contact you. Our recommendation is that you definitley give them your phone number and Email Id. </p>
			</div>
			<div class="form_sections">
			<div >
				<select class="custTitle" name="contactTitle">
					<?
					$found=0;
					if(isset($user_detail[0]['contactTitle']))
					{?>
					<option <? if($user_detail[0]['contactTitle'] == 'How to reach me') {echo 'selected="selected"'; $found=1; } ?> value="How to reach me">How to reach me</option>
					<option <?if(!$found)echo 'selected="selected"';?> value="Custom heading">Custom heading</option>
					<?} else {?>
					<option value="How to reach me">How to reach me</option>
					<option value="Custom heading">Custom heading</option>
					<? }?>					
				</select>
				<input id="contactTitle" name="cusContactTitle" <?if(isset($user_detail[0]['contactTitle']) && (!$found)) {echo 'value="'.$user_detail[0]['contactTitle'].'"'; } else{ echo 'style="display:none;"'; }?> type="text"  placeholder="Custom title" />
			</div>
			<div >
			    <input  type="text"  name="phone" id="phone" placeholder="Phone" value="<? if(isset($user_detail[0]['mobile'])) echo $user_detail[0]['mobile']; ?>" />
          <span id="phone_err"></span><br />
				<input   name="email" type="email" id="email"  placeholder="Email" value="<? if(isset($user_detail[0]['secondary_email'])) echo $user_detail[0]['secondary_email']; ?>" />
        <span id="email_err"></span>
			</div>
			<div>
			    <label>Website</label>
			    <? 
			    if(isset($about[0]['website']))
			    $website= unserialize($about[0]['website']);
			    ?>
			    <input  class="w400" id="website" type="url"  name="url[]" placeholder="http://digitalchakra.in/" value="<? if(isset($about[0]['website'])) echo $website['mylink']; ?>" /><span id="website_err"></span>
			</div>
			<div>
			    <label >linkedin</label>
			    <input class="w400" type="url" id="linkedin" name="url[]" placeholder="http://digitalchakra.in/linkedin" value="<? if(isset($about[0]['website'])) echo $website['linkedin']; ?>" /> <span id="linkedin_err"></span>
			</div>
			<div>
			    <label >Skype</label>
			    <input class="w400" type="text"  name="skype" placeholder="skype" value="<? if(isset($user_detail[0]['skype'])) echo $user_detail[0]['skype']; ?>" />
			</div>
			<div>
				<label >twitter</label>
				<input class="w400" type="url" id="twitter" name="url[]" placeholder="http://twitter.com/Digitalchakra" value="<? if(isset($about[0]['website'])) echo $website['twitter']; ?>" /><span id="twitter_err"></span>
			</div>
			<div>
				<label >facebook</label>
				<input class="w400" type="url" id="facebook" name="url[]" placeholder="http://www.facebook.com/digitalchakra" value="<? if(isset($about[0]['website'])) echo $website['facebook']; ?>" /><span id="facebook_err"></span>
			</div>
			<span class="clickb next" href='#objective_tab'>Back</span>
			<span class="clickr next" href='#experience_tab'>Continue</span>
			
		</div>
		</div>
		<!-- ===================================================================== Contact Me tab end ==================-->
			  
			  
		<!-- ===================================================================== Experience Summary tab start ==================-->
		<div id="experience_tab" class="tabs">
			<div class="left_form_title">
				<h3>EXPERIENCE SUMMARY</h3>
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span  class="showSelectTemplate">Change Template</span>
				<div class="clearboth"></div>
				<p> In this section you can give information on your past experience of working with different companies. This section helps you list out all the companies you have worked with, the duration of time you spent with them as well as the position you held during that time.  </p>
			</div>
			<div class="form_sections">
			<!-- Experience -->
			<div >
			    <label >Total years of experience</label>
			    <?
			    $expdate[0]=0;
			    $expdate[1]=0;
			    if(isset($user_detail[0]['experience']))
			    {
					$expdate = explode('.',$user_detail[0]['experience']);
				}
			    ?>
			    <select name='expYr' class="w100">
					<?for($i=0;$i<=60;$i++){?>
						<option value='<?=$i;?>' <?if($i==$expdate[0]) echo 'selected="selected"';?>><?=$i;?></option>
					<? } ?>
			    </select> &nbsp;Years
			     <select name='expMon' class="w100">
			    <?for($i=0;$i<=12;$i++){?>
						<option value='<?=$i;?>' <?if($i==$expdate[1]) echo 'selected="selected"';?>><?=$i;?></option>
					<? } ?>
			    </select> &nbsp;Months
			 </div>
			<!-- CTC -->
			<div >
			    <label >Compensation Details</label>
			    <?
			    $compensation[2]='INR';
			    if(isset($about[0]['compensation']))
			    {
			    $compensation = unserialize($about[0]['compensation']);
				}
			    ?>
			    <input  type="text" id="currentctc" name="current" placeholder="Current" value="<?  if(isset($about[0]['compensation'])) echo $compensation[0];?>" />
			    <input  type="text" id="expectedctc" name="expected" placeholder="Expected" value="<?  if(isset($about[0]['compensation'])) echo $compensation[1];?>" /> 
			    <?
			    //ref: http://www.google.co.in/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&ved=0CCsQFjAA&url=http%3A%2F%2Fwww.gbta.org%2FLists%2FResource%2520Library%2FISOCurrencyCodes081507.xls&ei=0TblUfnPC8jlrAfLh4CwDw&usg=AFQjCNEeKOFmJeEYDLF9aSu3_6Fbrh3XZw&sig2=A9oxM1mM8osy9oozCmC3qg&bvm=bv.48705608,d.bmk 
			    $currency_list = array("AED","AFN","ALL","AMD","ANG","AOA","ARS","AUD","AWG","AZN",
						"BAM","BBD","BDT","BGN","BHD","BIF","BMD","BND","BOB","BOV",
						"BRL","BSD","BTN","BWP","BYR","BZD","CAD","CDF","CHE","CHF",
						"CHW","CLF","CLP","CNY","COP","COU","CRC","CUP","CVE","CYP",
						"CZK","DJF","DKK","DOP","DZD","EEK","EGP","ERN","ETB","EUR",
						"FJD","FKP","GBP","GEL","GHS","GIP","GMD","GNF","GTQ","GYD",
						"HKD","HNL","HRK","HTG","HUF","IDR","ILS","INR","IQD","IRR",
						"ISK","JMD","JOD","JPY","KES","KGS","KHR","KMF","KPW","KRW",
						"KWD","KYD","KZT","LAK","LBP","LKR","LRD","LSL","LTL","LVL",
						"LYD","MAD","MDL","MGA","MKD","MMK","MNT","MOP","MRO","MTL",
						"MUR","MVR","MWK","MXN","MXV","MYR","MZN","NAD","NGN","NIO",
						"NOK","NPR","NZD","OMR","PAB","PEN","PGK","PHP","PKR","PLN",
						"PYG","QAR","RON","RSD","RUB","RWF","SAR","SBD","SCR","SDG",
						"SEK","SGD","SHP","SKK","SLL","SOS","SRD","STD","SYP","SZL",
						"THB","TJS","TMM","TND","TOP","TRY","TTD","TWD","TZS","UAH",
						"UGX","USD","USN","USS","UYU","UZS","VEB","VND","VUV","WST",
						"XAF","XAG","XAU","XBA","XBB","XBC","XBD","XCD","XDR","XFO",
						"XFU","XOF","XPD","XPF","XPT","XTS","XXX","YER","ZAR","ZMK","ZWD");?>
			    <select name="currency" class="w100">
					<?foreach($currency_list as $row){?>
						<option value="<?=$row;?>" <?if($row==$compensation[2]) echo 'selected="selected"';?>><?=$row;?></option>
					<? } ?>
				</select>&nbsp;per annum
			</div>
			<span style="color: #F07057;font-size: 15px; font-style: italic; margin: -25px 0 0 !important; position: absolute;" id="compensation_err"></span>
			<!-- Company start-->
			<div id="company">
			<label >Company</label>
				  	<?
				  	$i=0;
				  	if(isset($company[0]))
				  	{
						$companyNames = unserialize($company[0]['name']);
						$companyDesc = unserialize($company[0]['designation']);
						$companyDate = unserialize($company[0]['date']);
						foreach($companyNames as $record)
						{
							$fromtoDate = explode('#',$companyDate[$i]);
						?>
						<div id="c<?=$i;?>">
						<? if($i) {?>
						<span class="button remove formRemoveBtn" onclick=removeId("c<?=$i;?>");>Remove</span>
						<? } ?>
							<div class="cmp_repeater cmn_repeater">
								<input class="cmpny_txt"  type="text" name="cmpnyName[]" placeholder="Company name" value="<?=$record;?>"><br/>
								<input class="cmpny_txt" name="cmpnyDesg[]" type="text"  placeholder="Designation" value="<?=$companyDesc[$i];?>"><br/>
								<label >From</label>
								<input  type="text"  name="cmpnyFrom[]" class="half_date_picker" placeholder="Feb-2012" value="<?=$fromtoDate[0];?>" readonly="readonly" /><br/>
								<label >To</label>
								<input  type="text"  name="cmpnyTo[]" class="half_date_picker" placeholder="Feb-2012" value="<?=$fromtoDate[1];?>" readonly="readonly" />
							</div>
						</div>
						<?
						$i++;
						}
					}
					else
					{
				  	?>
				  	<div id="c0" class="cmn_repeater repeater_default">
						<div >
							<input  type="text" name="cmpnyName[]" placeholder="Company name" class="cmp_desgn"><br/>
							<input  name="cmpnyDesg[]" type="text"  placeholder="Designation" class="cmp_desgn"><br/>
							<label >From</label>
							<input  type="text" class="half_date_picker" name="cmpnyFrom[]" placeholder="Feb-2012" readonly="readonly" /><br/>
							<label >To</label>
							<input  type="text" class="half_date_picker" name="cmpnyTo[]" placeholder="Feb-2012" readonly="readonly" />
						</div>
					</div >
					<? } ?>
			</div>
			<div class="clearboth"></div>
		    <div>
		    	<br/>
			    <span  class="clickr_add"  id="addCompany" value="<?=$i;?>">Add New</span>
			</div>
			<br/>
			<span  class="clickb next" href='#contact_tab'>Back</span>
			<span  class="clickr next" href='#strength_tab'>Continue</span>
			
		</div>
		</div>
		
		<!-- ===================================================================== Experience Summary tab end ==================-->
		
		<!-- ===================================================================== My Strength tab start ==================-->
		
		<div id="strength_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Strengths</h3>
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span class="showSelectTemplate">Change Template</span>
				<div class="clearboth"></div>
				<p> In this section you can elaborate on your strengths by first listing out the keywords and then by describing them briefly in a line if necessary. We recommend that you keep this section short and sweet.</p>
			</div>
			<div class="form_sections">
			 <!-- Other skills -->
			<div>
		    	<div class="mys_left">
		    		<label >My Strengths</label>
			    	<div  id="oskills">
			    	<div id="os0">
		      			<input  type="hidden"  name="otherSkills[]" placeholder="Skill name" >
		      		</div>
		      		<?php
			    	$i=0; 
			    	if(isset($otherskill[0]))
			    	{
						$otherskill = unserialize($otherskill[0]['name']);
						foreach($otherskill as $record)
						{
						?>
							<? if($i) {?>
							<div id="os<?=$i;?>" class="mys_added">
								<span class="button remove formRemoveBtn" onclick=removeId("os<?=$i;?>");>Remove</span>
								<input  type="text"  name="otherSkills[]" placeholder="Skill name" value="<?=$record?>">
							</div>
							<?  } ?>
						<?
						$i++;
						}
					} ?>
					
			    	<? /*
			    	$i=0; 
			    	if(isset($otherskill[0]))
			    	{
						$otherskill = unserialize($otherskill[0]['name']);
					foreach($otherskill as $record)
					{
					?>
						<div id="os<?=$i;?>">
						<? if($i) {?>
						<span class="button remove formRemoveBtn" onclick=removeId("os<?=$i;?>");>Remove</span>
						<?  } ?>
			      		<input  type="text"  name="otherSkills[]" placeholder="Skill name" value="<?=$record?>">
			      		</div>
					<?
					$i++;
					}
					}
					else { ?>
					<div id="os0">
		      			<input  type="hidden"  name="otherSkills[]" placeholder="Skill name" >
		      		</div>
					<?  } */ ?>		    		
			    	</div>
			    	<div>
			    		<input type="text" id="temp_skill" placeholder="Add another" />
			    		<span class="clickr_add"  id="addOskills" value="<?=$i;?>">Add</span>
			    	</div>
			    </div>

			    <div  style="float:left;">
			    <div divId="sugg_strnth_list" class="scroll_top_strn scroll_top_inact sug_top1"></div>
			    	<div style="overflow:hidden; width:350px; height:173px;">
						<div id="sugg_strnth_list" class="mys_right">
							<?php foreach ($keywords as $i => $key) { echo '<div id="sugg_strnth_'.($i+1).'">'.$key.'<span class="sugg_strnth" value="'.$key.'" data="'.($i+1).'">+</span></div>'; } ?>
		    			</div>
		    		</div>
		    	<div class="scroll_btm_strn sug_bot1" divId="sugg_strnth_list"></div>
			    </div>
			    

			    <div style="clear:both"></div>
			    <br />

		  	</div>
		  	<!-- strength briefly -->
			<div>
				<p style="margin:0 0 10px 0;">You can write about your strengths briefly here.	</p>
			    <textarea rows="3"  type="text"  name="otherSkillsBrief" placeholder="A brief on your strengths"><?if(isset($about[0]['mystrength'])) echo $about[0]['mystrength'];?></textarea>
			</div>
			<span class="clickb next" href='#experience_tab'>Back</span>
			<span class="clickr next" href='#tool_tab'>Continue</span>
			
		</div>
		</div>
		<!-- ===================================================================== My Strength tab end ==================-->
		
		<!-- ===================================================================== My Tool Box tab start ==================-->
		<div id="tool_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Tool Box</h3>
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span class="showSelectTemplate">Change Template</span>
				<div class="clearboth"></div>
				<p>Here's the place to add your skill sets, with a score on a scale to 10, 10 being the highest to indicate your profiiency in the skill. You can enter your skills sets here and assign a score to each.</p>
			</div>
			<div class="form_sections">
			<!-- Skills -->
			 <div id="skills">
				 <?
				 $i=0;
				 if(isset($skill[0]))
				 {
					 $skillName = unserialize($skill[0]['name']);
					 $skillEff = unserialize($skill[0]['efficiency']);
					 foreach($skillName as $row)
					 {
				?>
						 <div id="s<?=$i;?>" class="mytb_added">
						 <? if($i) {?>
						<span class="button remove formRemoveBtn" onclick=removeId("s<?=$i;?>");>Remove</span>
						<? } ?>
							<div>
								<input  type="text"  name="skillName[]" placeholder="Skill name" value="<?=$row;?>"/>								
								<!--<select name="skillEff[]" class="w100">
									<?for($j=0;$j<=10;$j++){?>
									<option value='<?=$j;?>' <?if($j==$skillEff[$i]) echo 'selected="selected"';?>><?=$j;?></option>
									<? } ?>
								</select>-->
								<input type="hidden" name="skillEff[]" id="skillEff<?=$i;?>" value="<?=$skillEff[$i];?>" />
								<span  class="sliding" data="<?=$i;?>"></span>
								<span class="slidingText" id="slid_msg<?=$i;?>"></span>
							</div>
						</div>
				<?
				$i++;
					 }
				 }
				 else
				 {
				 ?>
			 	<div id="s0" class="mytb_added">
					<div >
						
						<input  type="text"  name="skillName[]" placeholder="Skill name" />
						<!--<select name="skillEff[]" class="w100">
							<?for($j=0;$j<=10;$j++){?>
								<option value='<?=$j;?>'><?=$j;?></option>
							<? } ?>
						</select>-->
						<input type="hidden" name="skillEff[]" id="skillEff0" value="1"/>
						<span class="sliding" data="0"></span>
						<span class="slidingText" id="slid_msg0"></span>
					</div>
				</div>
				<? } ?>
			</div>
			<br/>
			<div>
			   <span class="clickr_add"  id="addSkills"  value="<?=$i;?>">Add New</span>
			</div>
			<br/>
			<span class="clickb next" href='#strength_tab'>Back</span>
			<span class="clickr next" href='#milestones_tab'>Continue</span>
			
		</div>
		</div>
		
		<!-- ===================================================================== My Tool Box tab end ==================-->
		
		<!-- ===================================================================== My Milestones tab start ==================-->
		<div id="milestones_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Milestones</h3>
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span class="showSelectTemplate">Change Template</span>
				<div class="clearboth"></div>
				<p>In this section you can talk about those particular projects that made a difference to you, either in your learning curve, or that which earned you recognition or just a project you loved to work in.  </p>
			</div>
			<div class="form_sections">
			<!--******************************************Project********************************/-->
			<div id="project">
				<?
				$i=0;
				if(isset($project[0]))
				{
					$projectName = unserialize($project[0]['name']);
					$projectRole = unserialize($project[0]['role']);
					$projectDesc = unserialize($project[0]['description']);
					$projectUrl = unserialize($project[0]['url']);
					foreach($projectName as $record)
					{
				?>
						<div id="p<?=$i;?>" class="mypr_added">
						<? if($i) {?>
						<span class="button remove formRemoveBtn" onclick=removeId("p<?=$i;?>");>Remove</span>
						<? } ?>
							<div>
								<input  type="text" name="projName[]"  placeholder="Enter Project Name/Title" value="<?=$record;?>">
								<input  name="projRole[]" type="text"  placeholder="My Position" value="<?=$projectRole[$i];?>">
							</div>
							<div>
								<textarea rows="3"  name="projDesc[]" type="text"  placeholder="Enter project description and your role in it"><?=$projectDesc[$i]?></textarea>
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
				<div id="p0" class="mypr_added">
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
				<span class="clickr_add" id="addProject" value="<?=$i;?>">Add New</span>
			</div><br/>
			<span  class="clickb next" href='#tool_tab'>Back</span>
			<span  class="clickr next" href='#edication_tab'>Continue</span>
			
		</div>
		</div>
		
		<!-- ===================================================================== My Milestones tab end ==================-->
		
		
		<!-- ===================================================================== Edication & Awards tab start ==================-->
		<div id="edication_tab" class="tabs">
			<div class="left_form_title">
				<h3>My Education</h3>
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span class="showSelectTemplate">Change Template</span>
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
					<div id="e<?=$i;?>" class="myed_added">
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
						<div style="float:left;">
							<label style="display:block;">From</label>
							<input type="text"  name="eduFrom[]" class="half_date_picker" placeholder="Feb-2012" value="<?=$fromtoDate[0];?>" readonly="readonly" />

						</div>
            <div>							
            	<label style="display:block;">To</label>
							<input  type="text"  name="eduTo[]" class="half_date_picker" placeholder="Feb-2012" value="<?=$fromtoDate[1];?>" readonly="readonly" />
            
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
						<input type="text" class="half_date_picker" name="eduFrom[]" placeholder="Feb-2012" readonly="readonly" />
						<label >To</label>
						<input  type="text" class="half_date_picker" name="eduTo[]" placeholder="Feb-2012" readonly="readonly" />
					</div>
				</div>
				<? } ?>
			</div>	  
			<div>
			    <!--<label >Add Education</label>-->
			    <span class="clickr_add"  id="addEdudcation" value="<?=$i;?>">Add New</span><br/>
			</div><br/>
			<!-- Awards start-->
			<div class="award">
				<div class="left_form_title awards_or">
					<h3>My Awards</h3>
					<div class="clearboth"></div>
					<p>In this section you can give all the details of the vaious awards that you have received from college as well as various companies that you have worked with. This can also include other interests that you would like to share with the recruiter. </p>
				</div>
				<div id="award">
					<?
					$i=0;
					if(isset($award[0]))
					{
						$awardTitle = unserialize($award[0]['title']);
						$awardDate = unserialize($award[0]['date']);
						$awardDesc = unserialize($award[0]['description']);
						foreach($awardTitle as $record)
						{
							$fromtoDate = explode('#',$awardDate[$i]);
					?>
					<div id="aw<?=$i;?>" class="myaw_added">
					<? if($i) {?>
					<span class="button remove formRemoveBtn" onclick=removeId("aw<?=$i;?>");>Remove</span>
					<? } ?>
						<div>
						<input rows="3" name="awdtitle[]" type="text"  placeholder="Award Title" value="<?=$record;?>">
						</div>
						<div style="float:left;">
							<label >For the period From</label>
							<input  type="text" class="half_date_picker" name="awdFrom[]" placeholder="Feb-2012" value="<?=$fromtoDate[0];?>" readonly="readonly" />
            </div>
            <div>
							<label >To</label>
							<input  type="text" class="half_date_picker" name="awdTo[]" placeholder="Feb-2012" value="<?=$fromtoDate[1];?>" readonly="readonly" />
						</div>
						<div>
							<textarea rows="3"  name="awdDesc[]" type="text"  placeholder="Description"><?=$awardDesc[$i];?></textarea>
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
							<input  type="text" class="half_date_picker" name="awdFrom[]" placeholder="Feb-2012" readonly="readonly" />
							<label >To</label>
							<input  type="text" class="half_date_picker" name="awdTo[]" placeholder="Feb-2012" readonly="readonly" />
						</div>
						<div>
							<textarea rows="3"  name="awdDesc[]" type="text"  placeholder="Description"></textarea>
						</div>
					</div>
					<? } ?>
				</div>
				<div>
					<span class="clickr_add"  id="addawd" value="<?=$i;?>">Add New</span><br/>
				</div><br/>
			</div>
			 <!-- Award end -->
			 <span class="clickb next" href='#milestones_tab'>Back</span>
			<span class="clickr next" href='#moreabout_tab'>Continue</span>
			
		</div>
		</div>
		
		<!-- ===================================================================== Edication & Awards tab end ==================-->	 
			  

		<!-- ===================================================================== More About Me tab start ==================-->
		<div id="moreabout_tab" class="tabs">
			<div class="left_form_title">
				<h3>More About Me</h3>
				<? if($templateValue)
				{?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/'.$templateValue.'_thumb.jpg';?>">
				<? }
				else
				{ ?>
				<img class="thumb_sdw_tmp"  id="t_thumb" alt="Template thumbnail" src="<?=base_url('assets/img').'/T_default_thumb.jpg';?>">
				<? } ?>
				<span class="showSelectTemplate">Change Template</span>
				<div class="clearboth"></div>
				<p>This the last section but it is as important. It describes your personality that is beyond work. This section gives you an avenue to talk about things you like to do and are interested to pursue </p>
			</div>
			<div id="moreabout" class="form_sections">
				<? 
				$i=0;
				if(isset($about[0]))
				{
					$intresttitle = unserialize($about[0]['intresttitle']);
					$intrestDesc = unserialize($about[0]['intrestDesc']);
					$intrestUrl = unserialize($about[0]['intrestUrl']);
					foreach($intresttitle as $record)
					{
				?>
					<div id="ma<?=$i;?>" class="more_Added">
					<? if($i) {?>
					<span class="button remove formRemoveBtn" onclick=removeId("ma<?=$i;?>");>Remove</span>
					<? } ?>
						<div>
							<input rows="3"  name="intresttitle[]" type="text"  placeholder="Title of Interest" value="<?=$record;?>">
							<p class="examples">E.g, Blogging, Sports, Trekking, Photography.</p>
						</div>
						<div>
							<label >Description</label>
							<textarea class="h200" rows="3"  name="intrestDesc[]" type="text"  placeholder="Enter short description on other interests you might have"><?=$intrestDesc[$i];?></textarea>
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
						<input rows="3"  name="intresttitle[]" type="text"  placeholder="Title of Interest"><br/>
						<p class="examples">E.g, Blogging, Sports, Trekking, Photography.</p>
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
        
			</div>	
      <span style="margin:0px 0 10px 20px!important;" class="clickr_add"  id="addintrest" value="<?=$i;?>">Add New</span><br/>
			
				
			<br/>
			
			<!-- other details -->
			<div class="other_details">
			<h3>OTHER DETAILS</h3>
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
				$passportDate = explode('-',$passport_visa['passportTo']);
				$visaDate = explode('-',$passport_visa['visaTo']);
			?>
				<div>
					<label >Passport details</label>
					<input name="passport" type="text"  placeholder="Passport Number" value="<?=$passport_visa['passport'];?>"/>
				</div>
				<div>
					<label >Valid till</label>
					<select class="w100" name="passportMonth">
						<?
						if(!$passportDate[0])
						echo '<option value="0" selected="selected">Month</option>';
						else
						echo '<option value="0">Month</option>';
						for($i=0; $i<=11; $i++)
						{
						?>
						<option value="<?=$dateMonth[$i];?>" <? if(isset($passportDate) && $passportDate[0]==$dateMonth[$i]){ echo 'selected="selected"';} ?> > <?=$dateMonth[$i];?> </option>
						<? } ?>
				    </select>
				    <select class="w100" name="passportYear">
						<?
						if(!$passportDate[0])
						echo '<option value="0" selected="selected">Year</option>';
						else
						echo '<option value="0">Year</option>';
						$current_Year=date('Y');
						for($i=1; $i<=80; $i++)
						{
						?>
						<option value="<?=$current_Year;?>" <? if(isset($passportDate) && $passportDate[1]==$current_Year){ echo 'selected="selected"';} ?> > <?=$current_Year++;?> </option>
						<? } ?>
				    </select>
					<!--<input  type="text" class="feature_date_picker" name="passportTo" placeholder="Feb-2012" value="<?=$passport_visa['passportTo'];?>" readonly="readonly" />-->
				</div>
				<div>
					<label >Visa details</label>
					<input name="visa" type="text"  placeholder="Visa details"  value="<?=$passport_visa['visa'];?>"/>
				</div>
				<div>
					<label >Valid till</label>
					<select class="w100" name="visaMonth">
						<?
						if(!$visaDate[0])
						echo '<option value="0" selected="selected">Month</option>';
						else
						echo '<option value="0">Month</option>';
						for($i=0; $i<=11; $i++)
						{
						?>
						<option value="<?=$dateMonth[$i];?>" <? if(isset($visaDate) && $visaDate[0]==$dateMonth[$i]){ echo 'selected="selected"';} ?> > <?=$dateMonth[$i];?> </option>
						<? } ?>
				    </select>
				    <select class="w100" name="visaYear">
						<?
						if(!$visaDate[0])
						echo '<option value="0" selected="selected">Year</option>';
						else
						echo '<option value="0">Year</option>';
						$current_Year=date('Y');
						for($i=1; $i<=80; $i++)
						{
						?>
						<option value="<?=$current_Year;?>" <? if(isset($visaDate) && $visaDate[1]==$current_Year){ echo 'selected="selected"';} ?> > <?=$current_Year++;?> </option>
						<? } ?>
				    </select>
					<!--<input  type="text" class="feature_date_picker" name="visaTo" placeholder="Feb-2012" value="<?=$passport_visa['visaTo'];?>" readonly="readonly" />-->
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
					<label >Valid till</label>
					<select class="w100" name="passportMonth">
						<option value="0" selected="selected">Month</option>
						<?
						for($i=0; $i<=11; $i++)
						{
						?>
						<option value="<?=$dateMonth[$i];?>" > <?=$dateMonth[$i];?> </option>
						<? } ?>
				    </select>
				    <select class="w100" name="passportYear">
						<option value="0" selected="selected">Year</option>
						<?
						$current_Year=date('Y');
						for($i=1; $i<=80; $i++)
						{
						?>
						<option value="<?=$current_Year;?>" > <?=$current_Year++;?> </option>
						<? } ?>
				    </select>
					<!--<input  type="text" class="feature_date_picker" name="passportTo" placeholder="Feb-2012" readonly="readonly" />-->
				</div>
				<div>
					<label >Visa details</label>
					<input name="visa" type="text"  placeholder="Visa details" />
				</div>
				<div>
					<label >Valid till</label>
					<select class="w100" name="visaMonth">
						<option value="0" selected="selected">Month</option>
						<?
						for($i=0; $i<=11; $i++)
						{
						?>
						<option value="<?=$dateMonth[$i];?>" > <?=$dateMonth[$i];?> </option>
						<? } ?>
				    </select>
				    <select class="w100" name="visaYear">
						<option value="0" selected="selected">Year</option>
						<?
						$current_Year=date('Y');
						for($i=1; $i<=80; $i++)
						{
						?>
						<option value="<?=$current_Year;?>" > <?=$current_Year++;?> </option>
						<? } ?>
				    </select>
					<!--<input  type="text" class="feature_date_picker" name="visaTo" placeholder="Feb-2012" readonly="readonly" />-->
				</div>
			<? } ?>
		</div>
		<span class="clickb next" href='#edication_tab'>Back</span>
		</div>
		<!-- ===================================================================== More About Me tab end ==================-->
	</form>

	<!-- ======================================================================== form end ================================ -->
		<!-- final save buttons -->
			
			<? if(isset($user_detail))
			{?>
			<span  id="preview_submit" class="clickr_preview"> Save & Download</span>
			<?} else {?>
			<span  id="resume_submit" class="clickr_final"> Save & Register</span>
			<span  id="preview_submit" class="clickr_preview"> Preview</span>
			<? } ?>
		    <!--<span  class="clickr next" >Reset</span>-->
		
	</div>
		
		
		


		<!-- need make as popup -->
		<div id="selectTemplate" style="display:none;"class="selectTemplate">
			<span id="selectTemplateclose" class="close_btn">close</span>
			<div class="clearboth"></div>
			<h3>Choose Template</h3>
			<div class="change_arrow_lft"></div>
	 		<div class="t_list_bg" id="T1">
				<div class="t_list_t">
					<img src="<?php echo base_url("assets/img/T1_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>Spring Bloom</p>
						<a title="Spring Bloom" class="t_select template" value="T1">Select</a>
					</div>
				</div>
			</div>
			<div class="t_list_bg" id="T4">
				<div class="t_list_t">
					<img src="<?php echo base_url("assets/img/T4_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>Pyramid Point</p>
						<a title="Pyramid Point" class="t_select template" value="T4">Select</a>
					</div>
				</div>
			</div>
			<div class="t_list_bg" id="T2">
				<div class="t_list_t">
					<img src="<?php echo base_url("assets/img/T2_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>White Citadel</p>
						<a title="White Citadel" class="t_select template" value="T2">Select</a>
					</div>
				</div>
			</div>
			<div class="t_list_bg" id="T3">
				<div class="t_list_t">
					<img src="<?php echo base_url("assets/img/T3_thumb.jpg"); ?>" alt="Template thumbnail"/>
					<div class="t_list_s">
						<p>Window View</p>
						<a title="Window View" class="t_select template" value="T3">Select</a>
					</div>
				</div>
			</div>
      <div class="change_arrow_rit"></div>      
		</div>
	</div>


</div>
</div>


				 
		<div id="preview" class="stop-theme" title="<?=$templateName[$templateValue];?>" href=""></div>
		<!--<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>-->
		<script src="<?php echo base_url('assets/js/jquery.colorbox-min.js'); ?>" ></script>
		
		<script src="<?php echo base_url('assets/js/validation.js');?>"></script>
		<script src="<?php echo base_url('assets/js/resume.js');?>"></script>
		<?php /* <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.toastmessage.js'); ?>" ></script>
		<script type="text/javascript" src="<?php echo base_url('assets/js/sisyphus.js'); ?>" ></script> */ ?>