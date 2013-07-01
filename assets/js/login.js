$(document).ready(function()
{
	$('#forget').click(function(){
		$('.login').hide();
		$('.forget').show();
	});
	$('#login').click(function(){
		$('.forget').hide();
		$('.login').show();
	});
	$('#firstname , #lastname , #inputEmail , #inputPassword').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#signupsubmit').click();
		}
	});
	$('#username , #passowrd').keypress(function(e) 
	{
		if(e.which == 13) 
		{
			$('#loginsubmit').click();
		}
	});
	$('#loginsubmit').click(function()
	{
		$('#error_msg').html("");
		var email = $.trim($('#username').val());
		var password = $('#passowrd').val();
		if(!validate('Email','username',man=true,max=254,min=false,type='email',disp='error_msg')) return false;
		else if(!validate('Password','passowrd',man=true,max=30,min=6,type='false',disp='error_msg')) return false;
		else
		{
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
	$('#signupsubmit').click(function()
	{
		$('#error_msg1').html("");
		var email = $.trim($('#inputEmail').val());
		var password = $('#inputPassword').val();
		var firstname = $.trim($('#firstname').val());
		var lastname = $.trim($('#lastname').val());
		var role = $('input:radio[name=role]:checked').val();

		var friend_email1 = $.trim($('#friend_email1').val());
		var friend_email2 = $.trim($('#friend_email2').val());

		if(!validate('First Name','firstname',man=true,max=100,min=3,type='string',disp='error_msg1')) return false;
		else if(!validate('Last Name','lastname',man=true,max=100,min=false,type='string',disp='error_msg1')) return false;
		else if(!validate('Email','inputEmail',man=true,max=254,min=false,type='email',disp='error_msg1')) return false;
		else if(!validate('Password','inputPassword',man=true,max=30,min=6,type=false,disp='error_msg1')) return false;
		/*else if(email==friend_email1 || email==friend_email2)
		{
			$('#error_msg1').html('You can\'t refer your self.');
			return false;
		}
		else if(friend_email1==friend_email2)
		{
			$('#error_msg1').html('Referring email can\'t be same.');
			return false;
		}*/
		else
		{
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
						$('#error_msg1').html("success msg");
						if(data.resultset.mail=='no')
							$('#error_msg1').append(' There was a problem occurred on sending mail.');
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
		}
	});
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