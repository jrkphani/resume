<div class="row-fluid">
	<div class="span12">
		<table>
			<tr>
                <td>Name</td>
                <td>Email</td>
                <td>Edit</td>
            </tr>
		<?foreach ($userlist as $user) {?>
			<tr>
                <td><? echo $user->first_name.' '.$user->last_name; ?></td>
                <td><? echo $user->secondary_email; ?></td>
                <td><a href="<?php echo base_url('admin/edit/'.$user->id); ?>">Edit</a></td>
            </td></tr>
		<?}?>
	</table>
	</div>
</div>