<style>
.pr-edit{
    display:none;
}
.tbl{
    font-size: 13px;
    line-height: 16px;
}
</style>
<?php
	if($photo)
		$img= base_url($this->config->item('path_profile_img').$user_id.'/'.$photo.'?'.rand());
	else
		$img=base_url('assets/img/userPhoto.png');
 ?>
<div class="container">
<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>
<div class="profile-outer">
	<div style="float:left;">
	<div style="font-size:20px; line-height:35px;">Profile</div><span id="pr-edit-link" class="pr-edit-link"><a href="#">Edit profile</a></span>
    </div>
    <div style="float:right;">
        	<img src="<?php echo $img; ?>" title="<?php echo $first_name; ?>&nbsp;&nbsp;<?php echo $last_name; ?>" class="img_update" alt="Profile photo" />
        	<span id="uploadstate"></span>
    </div>
    <div class="clearBoth"></div>
    <div class="profile-body">
    	<span class="err-msg"><?php echo validation_errors(); if($error) echo $error['error'];  ?></span>
    	<?php $attributes = array('name' => 'form1', 'id' => 'form1'); echo form_open_multipart('profile/edit',$attributes); ?>
        <input type="hidden" name="photo_root" id="photo_root" value="" />
        <input type="hidden" name="photo_name" id="photo_name" value="" />
        <input type="hidden" name="photo_ext" id="photo_ext" value="" />
        <input type="hidden" id="profile_flag" value="<?php echo $profile_flag; ?>" />
        <input type="hidden" name="primary_email" id="primary_email" value="<?php echo $email; ?>" />
    	<table border="0" class="tbl" cellpadding="2">
        	<tr>
            	<td>
                    <span class="pr-view">Name</span>
                    <span class="pr-edit"><label for="first_name">Name*</label></span>
                </td>
                <td>
                	<span class="pr-view"><?php echo $first_name; ?>&nbsp;&nbsp;&nbsp;<?php echo $last_name; ?></span>
                    <span class="pr-edit"><input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" />&nbsp;&nbsp;&nbsp;<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" /></span>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><?php echo $email; ?>
                    <span class="pr-edit">
                        <input type="checkbox" name="email_toggle" id="email_toggle" style="display:inherit;" value="1" <?php if($email==$secondary_email) echo 'checked=checked'; ?> />Use this as display email.
                    </span>
                </td>
                <td></td>
            </tr>
            <tr id="display_email">
            	<td>
                    <span class="pr-view">Display Email</span>
                    <span class="pr-edit"><label for="secondary_email">Display Email*</label></span>
                </td>
                <td>
                	<span class="pr-view"><?php echo $secondary_email; ?></span>
                    <span class="pr-edit"><input type="text" name="secondary_email" id="secondary_email" value="<?php echo $secondary_email; ?>"  /></span>
                </td>
            </tr>
            <tr>
            	<td>
                    <span class="pr-view">Mobile Number</span>
                    <span class="pr-edit"><label for="mobile">Mobile Number*</label></span>
                </td>
                <td>
                	<span class="pr-view"><?php echo $mobile; ?></span>
                    <span class="pr-edit"><input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>"  /></span>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <span class="pr-view">Skype</span>
                    <span class="pr-edit"><label for="skype">Skype</label></span>
                </td>
                <td>
                    <span class="pr-view"><?php echo $skype; ?></span>
                    <span class="pr-edit"><input type="text" name="skype" id="skype" value="<?php echo $skype; ?>"  /></span>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td>
                    <span class="pr-view">Address</span>
                    <span class="pr-edit"><label for="address">Address</label></span>
                </td>
                <td>
                	<span class="pr-view"><?php echo $address; ?></span>
                    <span class="pr-edit"><textarea name="address" id="address"><?php echo $address; ?></textarea></span>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <span class="pr-view">Marital Status</span>
                    <span class="pr-edit"><label for="married">Marital Status</label></span>
                </td>
                <td>
                    <span class="pr-view"><?php if($married==NULL) echo 'Not specified'; else if($married=='0') echo 'Not Married'; else if($married=='1') echo 'Married'; ?></span>
                    <span class="pr-edit">
                        <select name="married" id="married">
                            <option value="NULL" <?php if($married==NULL) { ?> selected="selected" <?php } ?>>Not specified</option>
                            <option value="1" <?php if($married=='1') { ?> selected="selected" <?php } ?>>Married</option>
                            <option value="0" <?php if($married=='0') { ?> selected="selected" <?php } ?>>Unmarried</option>
                        </select>
                    </span>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <span class="pr-view">Designation</span>
                    <span class="pr-edit"><label for="designation">Designation</label></span>
                </td>
                <td>
                    <span class="pr-view"><?php echo $designation; ?></span>
                    <span class="pr-edit"><input type="text" name="designation" id="designation" value="<?php echo $designation; ?>"  /></span>
                </td>
                <td></td>
            </tr>
            <tr class="pr-edit">
            	<td  style="border:none !important;;"></td>
                <td  style="border:none !important;;">
                	<input type="submit" name="submit" value="Update" class="button1" />
                	<span id="pr-cancel-link" >&nbsp;&nbsp;<input type="button" value="Cancel" class="button0" /></span></td>
                <td  style="border:none !important;;"></td>
            </tr>
        </table>
        <?php echo form_close(); ?>
    </div>
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/validation.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/profile.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>