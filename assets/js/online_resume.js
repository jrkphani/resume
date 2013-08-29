// JavaScript Document
$(document).ready(function(){

	$('#make_online').live('click',function(){
		$.ajax({
			url: baseurl+'onlineresume/makeOnline',
			type:'POST',
			dataType: 'json',
			success:function(data){
				if(data.resultset.success=='yes')
				{
			   		$('.scus-msg').html('Online Resume activated.');
			   		var html= 	'Online Resume URL: '+baseurl+'onlineresume/view/'+data.resultset.id_encrypt+
			   					'&nbsp;&nbsp;<a href="javascript:void(0);" id="disable_online">Disable</a>';
			   		$('#online_resume').html(html);
				}
				else if(data.resultset.success=='no_resume')
				{
					$('.scus-msg').html('<span style="color:red">You do not have resume.</span>');
					return false;
				}
				else
				{
					alert('Internal error, Please try agian!');
					return false;
				}
			},
			error:function()
			{
				alert('Internal error, Please try agian!');
				return false;
			}
		});
	});

	$('#disable_online').live('click',function(){
		$.ajax({
			url: baseurl+'onlineresume/disableOnline',
			type:'POST',
			dataType: 'json',
			success:function(data){
				if(data.resultset.success=='yes')
				{
			   		$('.scus-msg').html('Online Resume disabled.');
			   		$('#online_resume').html('<a href="javascript:void(0);" id="make_online">Make Resume Online</a>');
				}
				else
				{
					alert('Internal error, Please try agian!');
					return false;
				}
			},
			error:function()
			{
				alert('Internal error, Please try agian!');
				return false;
			}
		});
	});

});