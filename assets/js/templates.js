$(document).ready(function()
{
	$('.star').raty(
	{
		starOff: 'assets/img/star-off.png',
		starOn : 'assets/img/star-on.png',
		starHalf : 'assets/img/star-half.png',
		click: function(score)
		{
			var template=$(this).attr('template');
			var result=add_star(template,score);
			if(result)
			{
				$('#str'+template).html('Thank you for rating.');
				$(this).attr('data-score',score)
				$(this).raty({ starOff: 'assets/img/star-off.png',
		starOn : 'assets/img/star-on.png',
		starHalf : 'assets/img/star-half.png',readOnly: true, score: $(this).attr('data-score') });
			}
			else
			{
				$(this).raty({ starOff: 'assets/img/star-off.png',
		starOn : 'assets/img/star-on.png',
		starHalf : 'assets/img/star-half.png',readOnly: true, score: $(this).attr('data-score') });
			}
			
		},
		score: function()
		{
			return $(this).attr('data-score');
		},
		readOnly:function()
		{
			if($(this).attr("rated")==="yes")
			{
				return true;
			}
			else
			{
				return false;
			}
		}
	});

$(".previewTemp").colorbox({rel:'previewTemp', transition:"fade"});
//$(".preview").colorbox({ inline:true, escKey:true, width:"700px", height:"90%"});
	$('.temp_select').click(function()
	{
		//$(this).attr('tvalue');
		$('#templateValue').attr('value',$(this).attr('tvalue'));
		$('#templateName').attr('value',$(this).attr('title'));
		$('#templateSubmit').click();
		});
});

function add_star(template,score)
{
	$.ajax(
	{
		url: baseurl+'templates/add_star',
		data: {'template':template,'score':score},
		type: 'post',
		async:false,
		dataType: 'json',
		success:function(data)
		{
			if(data.resultset.msg=='success')
				result=true;
			else
			{
				alert(data.resultset.msg);
				result=false;
			}
		},
		error:function()
		{
			alert('Internal error, Please try agian!');
		}
	});
	return result;
}