<link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/sss_login.css"); ?>" />
<?php
	if($photo)
		$img= base_url($this->config->item('path_profile_img').$user_id.'/'.$photo.'?'.rand());
	else
		$img=base_url('assets/img/userPhoto.png');
 ?>


<div class="form_title">
<h3>Profile</h3>
</div>

<div class="container left_form">

<!--    File upload form start    -->
<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file" name="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>
<!--    File upload form end    -->

<div class="profile-outer">

   

    <!--    Profile photo start  -->
    <div class="profile_photo" id="profile_photo">
        	<img src="<?php echo $img; ?>" title="<?php echo $first_name; ?>&nbsp;&nbsp;<?php echo $last_name; ?>" class="img_update" alt="Profile photo" />
          <p class="pr_right fnt_size">File size cannot exceed 2Mb.</p>
    </div>
    
    <span id="uploadstate"></span>
    <div class="clearBoth"></div>
    <!--    Profile photo end   -->


    <div class="profile-body">
    	<p class="scus-msg"><?php echo validation_errors(); if($error) echo $error['error'];  ?></p>

        <!-- Profile start   -->
        <div id="profile_div">
    	<?php $attributes = array('name' => 'form1', 'id' => 'form1'); echo form_open_multipart('profile/edit',$attributes); ?>
        <input type="hidden" name="photo_root" id="photo_root" value="" />
        <input type="hidden" name="photo_name" id="photo_name" value="" />
        <input type="hidden" name="photo_ext" id="photo_ext" value="" />
        <input type="hidden" id="profile_flag" value="<?php echo $profile_flag; ?>" />
        <input type="hidden" name="primary_email" id="primary_email" value="<?php echo $email; ?>" />
    	<table border="0" class="tbl" cellpadding="2">
        	<tr>
            	<td>
                    <span class="pr-view pr_left">Name</span>
                    <span class="pr-edit"><label class="pr_left" for="first_name">Name*</label></span>
                </td>
                <td>
                	<span class="pr-view pr_right"><?php echo $first_name; ?>&nbsp;&nbsp;&nbsp;<?php echo $last_name; ?></span>
                    <span class="pr-edit pr_right_edit"><input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" />&nbsp;&nbsp;&nbsp;<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" /></span>
                </td>
                
            </tr>
            <tr class="pr_email">
                <td class="pr_left"><label  class="profile_fonts">Email</label></td>
                <td><span class="pr_right"><?php echo $email; ?></span>
                    <span class="pr-edit mail_toggle" style="display:none">
                        <input type="checkbox" name="email_toggle" id="email_toggle" style="display:inherit;" value="1" <?php if($email==$secondary_email) echo 'checked=checked'; ?> />
                        <span>Use this as display email.</span>
                        <span class="emailtooltip tooltip_qs_img"  title="You can choose to display the email address you registered with on EZCV or you can provide an alternate email address here.">&nbsp;</span>
                    </span>
                </td>
                
            </tr>
            <tr id="display_email">
            	<td>
                    <span class="pr-view pr_left">Display Email</span>
                    <span class="pr-edit"><label  class="pr_left" for="secondary_email">Display Email*</label></span>
                </td>
                <td>
                	<span class="pr-view pr_right"><?php echo $secondary_email; ?></span>
                    <span class="pr-edit pr_right"><input type="text" name="secondary_email" id="secondary_email" value="<?php echo $secondary_email; ?>"  /></span>
                </td>
            </tr>
            <tr>
            	<td>
                    <span class="pr-view pr_left">Mobile</span>
                    <span class="pr-edit"><label  class="pr_left" for="mobile">Mobile*</label></span>
                </td>
                <td>
                	<span class="pr-view pr_right"><?php echo $mobile; ?></span>
                    <span class="pr-edit pr_right_edit"><input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>"  /></span>
                </td>
                
            </tr>
            <tr>
                <td>
                    <span class="pr-view pr_left">Skype</span>
                    <span class="pr-edit"><label  class="pr_left" for="skype">Skype</label></span>
                </td>
                <td>
                    <span class="pr-view pr_right"><?php echo $skype; ?></span>
                    <span class="pr-edit pr_right_edit"><input type="text" name="skype" id="skype" value="<?php echo $skype; ?>"  /></span>
                </td>
                
            </tr>
            <tr>
            	<td>
                    <span class="pr-view pr_left">Address</span>
                    <span class="pr-edit"><label  class="pr_left" for="address">Address</label></span>
                </td>
                <td>
                	<div class="pr-view pr_right"><?php echo $address; ?></div>  
                    <div class="pr-edit pr_right_edit"><textarea name="address" id="address"><?php echo $address; ?></textarea></div>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="pr-view pr_left">Marital Status</span>
                    <span class="pr-edit"><label  class="pr_left" for="married">Marital Status</label></span>
                </td>
                <td>
                    <span class="pr-view pr_right"><?php if($married=='NULL') echo 'Not specified'; else if($married=='0') echo 'Not Married'; else if($married=='1') echo 'Married'; ?></span>
                    <span class="pr-edit pr_right_edit">
                        <select name="married" id="married">
                            <option value="1" <?php if($married=='1') { ?> selected="selected" <?php } ?>>Married</option>
                            <option value="0" <?php if($married=='0') { ?> selected="selected" <?php } ?>>Unmarried</option>
                            <option value="NULL" <?php if($married=='NULL') { ?> selected="selected" <?php } ?>>Not specified</option>
                        </select>
                    </span>
                </td>
                
            </tr>
            <tr>
                <td>
                    <span class="pr-view pr_left">Designation</span>
                    <span class="pr-edit"><label  class="pr_left" for="designation">Designation</label></span>
                </td>
                <td>
                    <span class="pr-view pr_right"><?php echo $designation; ?></span>
                    <span class="pr-edit pr_right_edit"><input type="text" name="designation" id="designation" value="<?php echo $designation; ?>"  /></span>
                </td>
                
            </tr>
            <tr style="border-bottom:none;">
            	
                <td>
                    <span class="pr-edit">
                       <input type="submit" name="submit" value="Update" class="pr_btn"/>
                    </span>
             
                		<span class="pr-edit">
                        <input type="button" value="Cancel" id="pr-cancel-link" class="pr_btn"  /> 
                    </span>
                </td>
                
                
            </tr>
        </table>
        <?php echo form_close(); ?>
        </div>
        <!-- Profile end   -->

        <!-- Forgot Password start-->
        <div id="change_password_div" style="display:none;">
        <div id="change_password_msg"></div>
        <form name="form2" id="form2" method="post">
            <table>
                <tr>
                    <td><label class="pr_left1" for="current_password">Current Password*</label></td>
                    <td><input type="password" name="current_password" id="current_password" /></td>
                </tr>
                <tr>
                    <td><label class="pr_left1" for="new_password">New Password*</label></td>
                    <td><input type="password" name="new_password" id="new_password" /></td>
                </tr>
                <tr>
                    <td><label class="pr_left1"  for="confirm_password">Confirm Password*</label></td>
                    <td><input type="password" name="confirm_password" id="confirm_password" /></td>
                </tr>
                <tr>
                    
                    <td>
                        <input type="button" class="pr_btn" name="submit_form2" id="submit_form2" value="Update" />&nbsp;&nbsp;
                        <input type="button" class="pr_btn" value="Cancel" id="hide_change_password"  />
                    </td>
                </tr>
            </table>
            
        </form>
        </div>
        <!-- Forgot Password end-->


    </div>
     <!-- Control Links  start-->
    <div class="form_controls">
        
        <a href="javascript:void(0);" class="clickr" id="pr-edit-link">Edit profile</a>
        <a href="javascript:void(0);" class="clickr" id="show_change_password">Change Password</a>
    </div>
    <!-- Control Links  end-->
</div>
</div>
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'validation.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'profile.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'ajaxfileupload.js'); ?>" ></script>
