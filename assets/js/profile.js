// JavaScript Document
$(document).ready(function(){

	//Check for profile complete, if not open edit option by default
	if($('#profile_flag').val()=='1')
	{
		$('.pr-view, #pr-edit-link').hide();
		$('.pr-edit').show();
		$('.img_update').attr('id','profile_pic');
	}

	//Show Disply email, if primary and display email are different
	if($('#primary_email').val()==$('#secondary_email').val())
		$('#display_email').hide();

	//open edit
	$("#pr-edit-link").click(function(){
		$('.pr-view, #pr-edit-link, #show_change_password').hide();
		//$('#pr-edit-link').hide();
		$('.pr-edit').show();
		//$('.pr-edit').css("display", "block");
		$('.img_update').attr('id','profile_pic');

		if($('#primary_email').val()==$('#secondary_email').val())
			$('#display_email').hide();
	});
	
	//Cancel edit
	$("#pr-cancel-link").click(function(){
		$('.pr-view, #pr-edit-link, #show_change_password').show();
		$('.pr-edit').hide();
		$('#uploadstate').html("");
		//$('#pr-edit-link').show();
		$('.img_update').attr('id','');
	});
	
	//Submit form
	$("#form1").submit(function(){
		//validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
		if(!validate('First Name','first_name',man=true,max=100,min=3,type='string',disp=false)) return false;
		else if(!validate('Last Name','last_name',man=true,max=100,min=false,type='string',disp=false)) return false;
		else if(!validate('Mobile Number','mobile',man=true,max=17,min=10,type='mobile',disp=false)) return false;

		if(!$('#email_toggle').is(':checked'))
			if(!validate('Display Email','secondary_email',man=true,max=254,min=false,type='email',disp=false)) return false;
	});
	
	//Upload profile image to temporary folder
	$('#upload_file').submit(function(e) {
		$('#uploadstate').html("uploading..");
      e.preventDefault();
      $.ajaxFileUpload({
         url         :baseurl+'upload/upload_file/',
         secureuri      :false,
         fileElementId  :'userfile',
         dataType    : 'json',
         success  : function (data, status)
         {
			 $('#uploadstate').html("");
            if(data.status != 'error')
            {
				$('#profile_pic').attr('src',data.imgUrl);
				$('#photo_root').val(data.imgRoot);
				$('#photo_name').val(data.imgName);
				$('#photo_ext').val(data.imgExt);
               //$('#files').html('<p>Reloading files...</p>');
              // refresh_files();
               //$('#title').val('');
            }
            else
            {
            $('#uploadstate').html(data.msg);
			}
         },
         error:function()
         {
			alert("Internal error.");
		 }
      });
      return false;
   });

   //Submit image form on image selection
   $('#userfile').live('change', function(){ $('#fsubmit').click(); });

   //Call browse for file when click profile photo
   $('#profile_pic').live("click",function()
   {
	   $('#userfile').click();
	});

   // Toggel Display email
   $('#email_toggle').change(function(){
   		if($('#email_toggle').is(':checked'))
   		{
   			$('#display_email').hide();
   			//$('#secondary_email').val($('#primary_email').val());
   		}
   		else
   			$('#display_email').show();
   });

   // Show Change Password
   $('#show_change_password').click(function(){
   		$('#change_password_div').show();
   		$('#profile_div, #pr-edit-link, #profile_photo').hide();
   		$(this).hide();
   		$('#change_password_msg').html('');
   		$('.err-msg').html('');
   		$('#current_password').val('');
   		$('#new_password').val('');
   		$('#confirm_password').val('');
   });

   // Hide Change Password
   $('#hide_change_password').click(function(){
   		$('#change_password_div').hide();
   		$('#profile_div, #pr-edit-link, #profile_photo').show();
   		$('#show_change_password').show();
   });

   // Update password
   $('#submit_form2').click(function(){
   		//validate(Title,ElementID,Mandatory(true/false),MaxLength(Number/false),MinLength(Number/false),Type=(string/email/number/mobile/false),Display(DisplayID/false));
		if(!validate('Current Password','current_password',man=true,max=30,min=6,type=false,disp=false)) return false;
		else if(!validate('New Password','new_password',man=true,max=30,min=6,type=false,disp=false)) return false;
		else if(!validate('Confirm Password','confirm_password',man=true,max=30,min=6,type=false,disp=false)) return false;
		//same(title1,title2,ElementID1,ElementID2,Display(DisplayID/false));
		else if(!same('New Password','Confirm Password','new_password','confirm_password')) return false;

		$.ajax({
			url: baseurl+'profile/change_password',
			type:'POST',
			data: $('#form2').serialize(),
			dataType: 'json',
			success:function(data){
				if(data.resultset.success=='yes')
				{
					$('#change_password_div').hide();
			   		$('#profile_div').show();
			   		$('#show_change_password').show();
			   		$('.err-msg').html('Your Password has been successfully updated.');
			   		$('.pr-view, #pr-edit-link, #show_change_password, #profile_photo').show();
					$('.pr-edit').hide();
					//$('#pr-edit-link').show();
					$('.img_update').attr('id','');
				}
				else if(data.resultset.success=='missmatch')
				{
					$('#change_password_msg').html('Incorrect current password.');
				}
				else
				{
					alert('Internal error, Please try agian!');
				}
			},
			error:function()
			{
				alert('Internal error, Please try agian!');
			}
		});
   })

});