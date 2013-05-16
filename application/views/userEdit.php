<div id="file_upload" style="display:none;">
   <form method="post" action="" id="upload_file">
     <label for="userfile">File</label>
     <input type="file" name="userfile" id="userfile" size="20" value=""/>
     <input type="submit" name="submit" id="fsubmit" value="Upload"/>
   </form>
</div>
<div class="row-fluid">
	<div class="span12">
    	<span class="err-msg"><?php echo validation_errors(); if(@$error) echo @$error['error'];  ?></span>
    	<?php $attributes = array('name' => 'form1', 'id' => 'form1'); echo form_open_multipart('admin/update',$attributes); ?>
        <input type="hidden" name="photo_root" id="photo_root" value="" />
        <input type="hidden" name="photo_name" id="photo_name" value="" />
        <input type="hidden" name="photo_ext" id="photo_ext" value="" />
    	<table>
    	<?php foreach ($userlist as $user) {
		$photo=$user->photo;
		if($photo)
			$img= base_url($this->config->item('path_profile_img').$photo.'?'.rand());
		else
			$img=base_url('assets/img/userPhoto.png');
		?>
        <input type="hidden" name="user_id" id="user_id" value="<? echo $user->id; ?>" />
        <tr>
                <td>Name</td>
                <td>
                    <input type="text" name="first_name" id="first_name" value="<? echo $user->first_name; ?>" placeholder="First name" />&nbsp;&nbsp;
                    <input type="text" name="last_name" id="last_name" value="<? echo $user->last_name; ?>" placeholder="Last name" />
                </td>
            </tr>
            <tr>
                <td>Photo</td>
                <td><img src="<?php echo $img; ?>" title="<?php echo $user->first_name; ?>&nbsp;&nbsp;<?php echo $user->last_name; ?>" class="img_update" id="profile_pic" /><span id="uploadstate"></span></td>
            </tr>
            <tr>
                <td>Secondary Email</td>
                <td>
					<input type="text" name="secondary_email" id="secondary_email" value="<? echo $user->secondary_email; ?>" /></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
					<input type="radio" name="role" value="user" <?php if($user->role=='user') { ?> checked <?php } ?> />User&nbsp;&nbsp;
                    <input type="radio" name="role" value="admin" <?php if($user->role=='admin') { ?> checked <?php } ?> />Admin
                </td>
            </tr>
            <tr>
                <td>Tag line</td>
                <td>
					<input type="text" name="tag_line" value="<? echo $user->tag_line; ?>" /></td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>
					<input type="text" name="mobile" id="mobile" value="<? echo $user->mobile; ?>" /></td>
            </tr>
            <tr>
                <td>Landline</td>
                <td>
					<input type="text" name="landline" value="<? echo $user->landline; ?>" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>
					<textarea name="address" ><? echo $user->address; ?></textarea></td>
            </tr>
            <tr>
                <td>Website</td>
                <td>
					<input type="text" name="website" value="<? echo $user->website; ?>" /></td>
            </tr>
            <tr>
                <td>Experience</td>
                <td>
					<input type="text" name="experience" value="<? echo $user->experience; ?>" /></td>
            </tr>
            <tr>
                <td>Objective</td>
                <td>
					<textarea name="objective"><? echo $user->objective; ?></textarea></td>
            </tr>
            <tr>
                <td>Summary</td>
                <td>
					<textarea name="summary" ><? echo $user->summary; ?></textarea></td>
            </tr>
            <tr>
                <td></td><td><input type="submit" value="Update" /></td>
            </tr>
            <?}?>
            </table>
            <?php echo form_close(); ?>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/js/profile.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/ajaxfileupload.js'); ?>" ></script>