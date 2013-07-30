$(document).ready(function()
{
	// If username avail of browser cookie, show it.
	var username=$.cookie("username");
	if(username!=undefined)
		$("#username").val(username);

	// Show signin option and hide register option
	$('#signin_link').click(function(){
		$('#form_reg').hide();
		$('#form_sig').show();
		$(this).addClass('tab_hightlight');
		$('#register_link').removeClass('tab_hightlight');
	});

	// Show register option and hide signin option
	$('#register_link').click(function(){
		$('#form_sig').hide();
		$('#form_reg').show();
		$(this).addClass('tab_hightlight');
		$('#signin_link').removeClass('tab_hightlight');
	});

	// Show forgotpassword option and hide login option
	$('#forget').click(function(){
		$('.login').hide();
		$('.forget').show();
	});

	// Show login option and hide forgotpassword option
	$('#back_to_login').click(function(){
		$('.forget').hide();
		$('.login').show();
	});

	// Submit signup when press enter on input fields
	$('#firstname , #lastname , #inputEmail , #inputPassword').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#signupsubmit').click();
		}
	});

	// Submit signin when press enter on input fields
	$('#username , #passowrd').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#loginsubmit').click();
		}
	});

	// Submit login form
	$('#loginsubmit').click(function()
	{
		$('#error_msg').html("");
		var email = $.trim($('#username').val());
		var password = $('#passowrd').val();
		if(!validate('Email','username',man=true,max=254,min=false,type='email',disp='error_msg')) return false;
		else if(!validate('Password','passowrd',man=true,max=30,min=6,type='false',disp='error_msg')) return false;
		else
		{
			if($('#c1').is(':checked'))
			{
				$.cookie("username", email, { expires: 365 }); // Remember username for 1 year
			}
			
			$.ajax(
			{
				url:baseurl+'verifylogin',
				type:'POST',
				data:{'username':email,'password':password},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
						if(data.resultset.flag==1)
							window.location.href=baseurl+"profile";
						else
						{
							if(data.resultset.role=='user')
								window.location.href=baseurl+"home";
							else if(data.resultset.role=='member')
								window.location.href=baseurl+"admin";
							else if(data.resultset.role=='admin')
								window.location.href=baseurl+"admin/userlist";
						}
					}
					else
					{
						$('#error_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#error_msg').html('Internal error, try agian...');
				}
			});
		}
	});

	//Submit signup form
	$('#signupsubmit').click(function()
	{
		$('#error_msg1').html("");
		var email = $.trim($('#inputEmail').val());
		valid = 1;
		if(!validate('First Name','firstname',man=true,max=100,min=3,type='string',disp='firstname_err1'))
		{ 
			valid = 0;
		}
		if(!validate('Last Name','lastname',man=true,max=100,min=false,type='string',disp='lastname_err1'))
		{ 
			valid = 0;
		}
		if(!validate('Email','inputEmail',man=true,max=254,min=false,type='email',disp='email_err1'))
		{ 
			valid = 0;
		}
		if(!validate('Password','inputPassword',man=true,max=30,min=6,type=false,disp='password_err1'))
		{ 
			valid = 0;
		}
		

		/* Validate referred friends email addresses
				1. Check emapty and valid email format
				2. Check for repeated entries
				3. Check primary email and referred email are same */
		var friends_array = [];
		var friends_result=true;
		var format = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

		$(".friend_emails").each(function(){
			var temp_email=$.trim($(this).val());
			if(!temp_email)
			{
				$('#error_msg1').html('The Referred Email fields are required.');
				friends_result=false;
				valid = 0;
			}
			else if(!temp_email.match(format))
			{
				$('#error_msg1').html('Referred Email is invalid.');
				friends_result=false;
				valid = 0;
			}
			else if(temp_email==email)
			{
				$('#error_msg1').html('You cannot refer your self.');
				friends_result=false;
				valid = 0;
			}
			friends_array.push(temp_email);
		});
		if(!friends_result)
			valid = 0;
		else if($(friends_array).size() != $($.unique(friends_array)).size())
		{
			$('#error_msg1').html('You cannot refer the same person twice.');
			valid = 0;
		}
		
		if(!valid)
		{
			return false;
		}
		$.ajax(
		{
			url:baseurl+'registration',
			type:'POST',
			//data:{'firstname':firstname,'lastname':lastname,'email_address':email,'pass_word':password,'role':role,'friend_email1':friend_email1,'friend_email2':friend_email2},
			data: $('#registration_form').serialize(),
			dataType: 'json',
			success:function(data)
			{
				if(data.resultset.success=='yes')
				{
					//$('#error_msg1').html("success msg");
					if(data.resultset.mail=='no')
						$('#error_msg1').append(' There was a problem occurred on sending mail. <br />');
					if(data.resultset.html=='no')
						$('#error_msg1').append(' Cannot generate download file. Try again later. <br />');
					else if(data.resultset.html=='nosession')
						$('#error_msg1').append('Registration success, plaese check your email. <br />');
					else if(data.resultset.html=='nodownload')
						$('#error_msg1').append('Registration success, plaese check your email. <br />');
					else

						window.location.replace(baseurl+'download/index/'+data.resultset.html);
				}
				else
				{
					$('#error_msg1').html(data.resultset.errors);	
				}
			},
			error:function()
			{
				$('#error_msg1').html('Internal error, try agian...');
			}
		});
	});

	// Submit forgot password form
	$('#forgetsubmit').click(function()
	{
		$('#error_msg').html("");
		var email = $.trim($('#fusername').val());
		//var password = $('#passowrd').val();
		/*var pattern = new RegExp(/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i);
		if(!pattern.test(email) || email.length <=0)
		{
			$('#apploginusernamecontainer').addClass('control-group error');
		}
		else if(password.length <=0)
		{
			$('#apploginpasswordcontainer').addClass('control-group error');
		}*/
		if(!validate('Email','fusername',man=true,max=254,min=false,type='email',disp='error_msg')) return false;
		else
		{
			$.ajax(
			{
				url:baseurl+'forget',
				type:'POST',
				data:{'username':email},
				dataType: 'json',
				success:function(data)
				{
					if(data.resultset.success=='yes')
					{
						$('#error_msg').html("Please check your mail to reset your password");
						//alert('s');
						//window.location.reload();
						//window.location.href="tmplts";
					}
					else
					{
						$('#error_msg').html(data.resultset.errors);	
					}
				},
				error:function()
				{
					$('#error_msg').html('Internal error, try agian...');
				}
			});
		}
	});

	/*Validate email is original
	$('.email_check').change(function(){
		validate_email($(this).val());
	});*/
});


// function not in use (function call commented)
function validate_email(email)
{
	$.ajax(
	{
		url:baseurl+'registration/validateEmail/',
		type:'GET',
		data: {'email':email},
		dataType: 'json',
		success:function(data)
		{
			if(data.resultset.success=='-1')
			{
				$('#error_msg1').html(email+' Email is invalid.');
				return false;
			}
			else if(data.resultset.success=='-2')
			{
				$('#error_msg1').html(email+' Email is already registered with us.');
				return false;
			}
		},
		error:function()
		{
			$('#error_msg1').html('Internal error, try agian...');
		}
	});
}
