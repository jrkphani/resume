// JavaScript Document

$(document).ready(function(){
	$(".toggleCustomize").click(function(){		//Toggle customize DIV
		$("#customizeDownload").toggle();
	});
});

function selectResume(id)
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			if(xmlhttp.responseText)
				document.getElementById('select-control').innerHTML='Selected';
			else
				document.getElementById('msg').innerHTML='Internal Error';
		}
	} 
	xmlhttp.open("GET",baseurl+'member/selectResume/?id='+id,true);
	xmlhttp.send();
}

function checkAll()		//Check all sub check boxes
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