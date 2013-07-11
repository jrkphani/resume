//javascript file

$(document).ready(function(){
	$('#feedback_form').submit(function(){
		//validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
		if(!validate('Name','name',man=true,max=30,min=3,type='string',disp='err_msg')) return false;
		else if(!validate('Email','email',man=true,max=100,min=false,type='email',disp='err_msg')) return false;
		else if(!validate('Subject','subject',man=true,max=100,min=false,type=false,disp='err_msg')) return false;
		else if(!validate('Message','message',man=true,max=500,min=false,type=false,disp='err_msg')) return false;
	});
});