$(document).ready(function()
{
	$('.t_select').click(function()
	{
		//$(this).attr('tvalue');
		$('#templateValue').attr('value',$(this).attr('tvalue'));
		$('#templateSubmit').click();
		});
});