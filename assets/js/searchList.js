$(document).ready(function(){
	$('#saveSearch').click(function(){
		//alert($(this).attr('search'))
		$.ajax({
			url:baseurl+"admin/saveSearchList",
			type:"POST",
			data:{"search":$(this).attr('search')},
			success:function(){
				$('#saveSearch').remove();
			}
		});
	});
});
function serialize_form()
{
     return $('#myform').serialize();
}