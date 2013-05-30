$(document).ready(function(){
	$('#saveSearch').click(function(){
		//alert($(this).attr('search'))
		$.ajax({
			url:baseurl+"member/saveSearchList",
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

/*function selectResume(id) //not in use, you may delete it
{
	var form=document.getElementById('myform');
	form.method="POST";
	form.action=baseurl+"member/selectResume/";
	form.submit();
}*/