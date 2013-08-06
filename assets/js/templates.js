$(document).ready(function()
{
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
