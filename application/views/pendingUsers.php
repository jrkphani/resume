<div class="row-fluid">
	<div class="span12">
		<div id="msg"><?php if($msg) echo $msg; ?></div>
		<table>
			<tr>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
		<?php
			if(count($userlist)==0) echo '<tr><td colspan="3">No records to display.</td></tr>';
			else { foreach ($userlist as $user) {?>
			<tr>
                <td><? echo $user->first_name.'&nbsp'.$user->last_name; ?></td>
                <td><? echo $user->email; ?></td>
                <td><a href="<?php echo base_url('admin/activateUser/'.$user->id); ?>">Activate</a></td>
            </tr>
		<?	} }?>
	</table>
	</div>
</div>