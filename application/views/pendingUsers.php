<div style="line-height:30px; padding-left:50px;">
	<a href="<?php echo base_url('admin/userList'); ?>">All Users</a>
</div>
<div class="row-fluid">
	<div class="span12">
		<div id="msg"><?php if($msg) echo $msg; ?></div>
		<table>
			<tr>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
		<?php foreach ($userlist as $user) {?>
			<tr>
                <td><? echo $user->first_name.'&nbsp'.$user->last_name; ?></td>
                <td><? echo $user->email; ?></td>
                <td><a href="<?php echo base_url('admin/activateUser/'.$user->id); ?>">Activate</a></td>
            </td></tr>
		<?}?>
	</table>
	</div>
</div>