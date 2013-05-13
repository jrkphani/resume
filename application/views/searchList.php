<div class="row-fluid">
	<div class="span12">
		<table>
			<tr><td>Name</td><td>Mobile</td><td>Experience</td></tr>
		<? foreach($result as $single)
		{?>
			<tr><td><a href="<?=$single->user_id?>"><?=$single->first_name?></a></td><td><?=$single->mobile?></td><td><?=$single->experience?></td></tr>
		<?}?>
		</table>	
	</div>
</div>