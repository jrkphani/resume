// JavaScript Document

$(document).ready(function(){
	$(".toggleCustomize").click(function(){
		$("#customizeDownload").toggle();
	});
});

function checkAll()		//check all sub check boxes and make color changes when main check box is cliked.
{
	val=document.getElementById('check_all');
	var checks = document.getElementsByName('check[]');
	var boxLength = checks.length;
	if (val.checked==true)
	{
		for(i=0;i<boxLength;i++)
			checks[i].checked=true;
	}
	else
	{
		for(i=0;i<boxLength;i++)
			checks[i].checked=false;
	}
}

function downloadResume(type='')
{
	var checks = document.getElementsByName('check[]');
	var boxLength = checks.length;
	var checked=0;
	for(i=0;i<boxLength;i++)
	{
		if(checks[i].checked==true)
			++checked;
	}
	if(checked==0)
	{
		alert("Please select atleast one record.");
		return false;
	}

	form=document.getElementById('form1');
	if(type=='custom')
	{
		var checks = document.getElementsByName('selected_fileds[]');
		var boxLength = checks.length;
		var checked=0;
		var titles=new Array();
		for(i=0;i<boxLength;i++)
		{
			if(checks[i].checked==true)
			{
				++checked;
				if(checks[i].value=='first_name')
					titles.push('Name');
				else if(checks[i].value=='mobile')
					titles.push('Mobile');
				else if(checks[i].value=='experience')
					titles.push('Experience');
			}
		}
		if(checked==0)
		{
			alert("Please select atleast one categorie.");
			return false;
		}
		document.getElementById('selected_titles').value=titles.join("|");
		form.action=baseurl+'member/downloadResume/custom';
	}
	else
		form.action=baseurl+'member/downloadResume';
	
	form.method="post";
	form.submit();
}