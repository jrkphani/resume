$(document).ready(function()
{
	$('.t_select').click(function()
	{
		//$(this).attr('tvalue');
		$('#templateValue').attr('value',$(this).attr('tvalue'));
		$('#templateName').attr('value',$(this).attr('title'));
		$('#templateSubmit').click();
		});
});