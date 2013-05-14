<div class="row-fluid">
	<div class="span12">
		<div class="download-main">
			<input type="text" id="search_txt"/> <button id="add_search">Add</button>
			<div class="download-main-inner">
				<form id="search_form" class="form-inline" action="<?=base_url('admin/searchSkills')?>" method="POST">
				     <input type="submit" id="restsubmit" class="btn btn-small btn-primary" />
				</form>
			</div> 
			
		</div>
	</div>
	<div class="span12">
		Previous Search
		<table>
			<? foreach($searchList as $single)
			{?>
			<tr id="<?=$single->id?>"><td><a href="<?=base_url('admin/searchSkills')?>/<?=$single->id?>" ><?=$single->string?></a><span onclick="remove('<?=$single->id?>');">X</span></td></tr>
			<?}?>
		</table>
	</div>
</div>
<script>
$(document).ready(function(){
	$('#add_search').click(function(){

		search_txt = $.trim($('#search_txt').val());
		//alert(search_txt);
		if(search_txt.length>0)
		{
			$('#search_form').prepend('<label class="button r'+search_txt+'">'+search_txt+'<span id="r'+search_txt+'" onclick="removeClass(\'r'+search_txt+'\');">X</span></label><input class="r'+search_txt+'" type="hidden" name="search[]" value="'+search_txt+'"/>');
		}
		$('#search_txt').val("");
	});
});
function removeClass(attr)
{
	//alert(attr);
	$('.'+attr).remove();
}
function remove(strID)
{
	$.ajax({
			url:baseurl+"admin/deleteSearchList",
			type:"POST",
			data:{"sid":strID},
			success:function(){
				$('#'+strID).remove();
			}
		});
}
</script>