//javascript file

//validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
function validate(title,id,mandatory=false,max_length=false,min_length=false,type=false,display=false)
{
	var data=document.getElementById(id).value.trim();
	
	if(!data && mandatory==true)
	{
		var msg=title+' can not be empty.';
		if(!display)
			alert(msg);
		else
			document.getElementById(display).innerHTML=msg;
		document.getElementById(id).focus();
		return false;
	}
	if(max_length)
	{
		if(data.length>max_length)
		{
			var msg=title+' is too long.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	if(min_length)
	{
		if(data.length<min_length)
		{
			var msg=title+' required minimum '+min_length+' character length.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	if(type=='string' && data)
	{
		var format = /^[a-zA-Z ]+$/;
		if(!data.match(format))
		{
			var msg=title+' only can contain alphapets and empty space.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	else if(type=='number' && data)
	{
		var format = /^[0-9]+$/;
		if(!data.match(format))
		{
			var msg=title+' only can be a number.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	else if(type=='email' && data)
	{
		var format = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		if(!data.match(format))
		{
			var msg=title+' is invalid.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	else if(type=='mobile' && data)
	{
		var format = /^[0-9 \-\+]+$/;
		if(!data.match(format))
		{
			var msg=title+' can not contain alphabets or special characters.';
			if(!display)
				alert(msg);
			else
				document.getElementById(display).innerHTML=msg;
			document.getElementById(id).focus();
			return false;
		}
	}
	return true;
}