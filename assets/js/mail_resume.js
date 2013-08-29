//javascript file

$(document).ready(function(){
	$('#email_resume_form').submit(function(){
		//validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
		var emails=$('#email').val();
		var message=$('#message').val();
		

		if(!emails)
		{
			$('#err_msg').html('Email cannot be empty.');
			$('#email').focus();
			return false;
		}
		else
		{
			emails=emails.split(',');
			if(emails.length>1)
			{
				$('#err_msg').html('You can give only one email.');
				$('#email').focus();
				return false;
			}
			
			var format = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			result=true;
			$.each(emails, function(index,value) {
				if(!value.match(format))
				{
					result=false;
					return false;
				}
			});
			if(!result)
			{
				$('#err_msg').html('Email is invalid.');
				$('#email').focus();
				return false;
			}
		}

		if(!validate('Subject','subject',man=true,max=200,min=false,type=false,disp='err_msg')) return false;
		else if(!validate('Message','message',man=true,max=1000,min=false,type=false,disp='err_msg')) return false;

		/*if(message.search(/my resume/i)==-1)
		{
			$('#err_msg').html('Your message must contain the word "my resume".');
			$('#message').focus();
			return false;
		}*/
	});
});