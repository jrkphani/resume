// JavaScript Document

$(document).ready(function(){
	$(".toggleCustomize").click(function(){		//Toggle customize DIV
		$("#customizeDownload").toggle();
	});

	$("#select-link").click(function(){
		var id=$(this).attr('data');
		$.ajax({
			url: baseurl+'member/selectResume/', 
			type: 'get',
			data: {'id':id},
			dataType: 'json',
			success:function(data)
			{
				if(data.resultset.success=='yes')
					document.getElementById('select-control').innerHTML='Selected';
				else
					document.getElementById('msg').innerHTML='Internal Error, Please try agian!';
				
			},
			error:function()
			{
				alert('Internal error, Please try agian!');
			}
		});
	})
});

function checkAll()		//Check all sub checkboxes
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

function downloadResume(type='')	//Download selected resumes with and without customize
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