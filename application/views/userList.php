<div class="row-fluid">
	<div class="span12">
		<table>
			<tr>
                <td>Name</td>
                <td>Email</td>
                <td>Edit</td>
            </tr>
		<?php
			if(count($userlist)==0) echo '<tr><td colspan="3">No records to display.</td></tr>';
			else { foreach ($userlist as $user) {?>
			<tr>
                <td><? echo $user->first_name.' '.$user->last_name; ?></td>
                <td><? echo $user->secondary_email; ?></td>
                <td><a href="<?php echo base_url('admin/editUser/'.$user->id); ?>">Edit</a></td>
            </td></tr>
		<?	} } ?>
	</table>
	</div>
</div>