<div class="row-fluid">
	Search String : <?=implode(' | ', $searchStr)?> <? if(!$strID) { ?><button search="<?=implode(' | ', $searchStr)?>" id="saveSearch">Save</button> <?} ?>
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
<script src="<?php echo base_url('assets/js/searchList.js');?>"></script>