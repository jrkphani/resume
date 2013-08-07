<div class="row-fluid">
	<div class="span12">
		<div style="padding: 10px 0 0 200px;">
			<a href="javascript:void(0);" onclick="downloadResume();">Download</a>
			<a href="javascript:void(0);" class="toggleCustomize" style="padding-left:20px;">Customize & Download</a>

		</div>
		<form name="form1" id="form1" >
		<table id="customizeDownload" style="float:right; display:none;">
				<tr>
					<td>
						<input type="checkbox" name="selected_fileds[]" value="first_name" style="display:inherit; " />
						<input type="hidden" name="selected_titles" id="selected_titles" style="display:inherit; " />
					</td>
					<td>Name</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" name="selected_fileds[]" value="mobile" style="display:inherit; " />
						<!--<input type="hidden" name="selected_titles[]" value="Mobile" style="display:inherit; " />-->
					</td>
					<td>Mobile</td>
				</tr>
				<tr>
					<td>
						<input type="checkbox" name="selected_fileds[]" value="experience" style="display:inherit; " />
						<!--<input type="hidden" name="selected_titles[]" value="Experience" style="display:inherit; " />-->
					</td>
					<td>Experience</td></tr>
				<tr>
					<td></td>
					<td>
						<input type="button" value="Download" onclick="downloadResume('custom');" />&nbsp&nbsp
						<input type="button" value="Cancel" class="toggleCustomize" />
					</td>
				</tr>
			</table>
		<table cellpadding="5">
			<tr>
				<td><input type="checkbox" name="check_all" id="check_all" onclick="checkAll();" style="display:inherit;" /></td>
                <td>Name</td>
                <td>Mobile</td>
                <td>Experience</td>
            </tr>
		<?php
			if(count($userlist)==0) echo '<tr><td colspan="3">No records to display.</td></tr>';
			else { foreach ($userlist as $user) { ?>
			<tr>
				<td><input type="checkbox" name="check[]" id="check<? echo $user->resume_id; ?>" value="<? echo $user->resume_id; ?>" style="display:inherit;" /></td>
                <td><? echo $user->first_name; ?></td>
                <td><? echo $user->mobile; ?></td>
                <td><? echo $user->experience; ?></td>
            </tr>
		<?	} }?>
		</table>
		</form>
	</div>
</div>
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'resume_download.js'); ?>"></script>