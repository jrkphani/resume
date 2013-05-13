// JavaScript Document
$(document).ready(function(){
	$("#pr-edit-link").click(function(){
		$('.pr-view').hide();
		$('.pr-edit').show();
		$('#pr-edit-link').hide();
		$('.img_update').attr('id','profile_pic');
	});
	
	$("#pr-cancel-link").click(function(){
		$('.pr-view').show();
		$('.pr-edit').hide();
		$('#pr-edit-link').show();
		$('.img_update').attr('id','');
	});
	
	$("#form1").submit(function(){
		var first_name=$("#first_name").val();
		var last_name=$("#last_name").val();
		var email=$("#secondary_email").val();
		var mobile=$("#mobile").val();
		
		if(!first_name)
		{
			alert("The First Name field is required.");
			$("#first_name").focus();
			return false;
		}
		else if(!last_name)
		{
			alert("The Last Name field is required.");
			$("#last_name").focus();
			return false;
		}
		else if(!email)
		{
			alert("The Secondary Email field is required.");
			$("#secondary_email").focus();
			return false;
		}
		else if(!mobile)
		{
			alert("The Mobile Number field is required.");
			$("#mobile").focus();
			return false;
		}
	});
	
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
   $('#userfile').live('change', function(){ $('#fsubmit').click(); });
   $('#profile_pic').live("click",function()
   {
	   $('#userfile').click();
	});
});