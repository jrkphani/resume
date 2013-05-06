<div class="container">
<div class="profile-outer">
	<div style="float:left;">
	<div class="head">Profile<span id="pr-edit-link" class="pr-edit-link"><a href="#">Edit profile</a></span></div>
    </div>
    <div style="float:right;"><img src="<?php echo base_url('user/'.$photo); ?>" title="<?php echo $first_name; ?>&nbsp;&nbsp;&nbsp;<?php echo $last_name; ?>" /></div>
    <div class="clearBoth"></div>
    <div class="profile-body">
    	<span class="err-msg"><?php echo validation_errors(); if($error) echo $error['error'];  ?></span>
    	<?php $attributes = array('name' => 'form1', 'id' => 'form1'); echo form_open_multipart('profile/edit',$attributes); ?>
    	<table border="0" class="tbl">
        	<tr>
            	<td><label for="first_name">Name*</label></td>
                <td>
                	<span class="pr-view"><?php echo $first_name; ?>&nbsp;&nbsp;&nbsp;<?php echo $last_name; ?></span>
                    <span class="pr-edit"><input type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" />&nbsp;&nbsp;&nbsp;<input type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" /></span>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td><label for="secondary_email">Secondary Email*</label></td>
                <td>
                	<span class="pr-view"><?php echo $secondary_email; ?></span>
                    <span class="pr-edit"><input type="text" name="secondary_email" id="secondary_email" value="<?php echo $secondary_email; ?>"  /></span>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td><label for="mobile">Mobile Number*</label></td>
                <td>
                	<span class="pr-view"><?php echo $mobile; ?></span>
                    <span class="pr-edit"><input type="text" name="mobile" id="mobile" value="<?php echo $mobile; ?>"  /></span>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td><label for="landline">Landline Number</label></td>
                <td>
                	<span class="pr-view"><?php echo $landline; ?></span>
                    <span class="pr-edit"><input type="text" name="landline" id="landline" value="<?php echo $landline; ?>"  /></span>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td><label for="address">Address</label></td>
                <td>
                	<span class="pr-view"><?php echo $address; ?></span>
                    <span class="pr-edit"><textarea name="address" id="address"><?php echo $address; ?></textarea></span>
                </td>
                <td></td>
            </tr>
            <tr>
            	<td><label for="website">Website</label></td>
                <td>
                	<span class="pr-view"><?php echo $website; ?></span>
                    <span class="pr-edit"><input type="text" name="website" id="website" value="<?php echo $website; ?>"  /></span>
                </td>
                <td></td>
            </tr>
            <tr class="pr-edit">
            	<td><label for="photo">Photo</label></td>
                <td>
                    <input type="file" name="photo" id="file">
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
<script type="text/javascript" src="<?php echo base_url('assets/js/profile.js'); ?>"></script>