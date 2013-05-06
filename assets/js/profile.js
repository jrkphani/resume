// JavaScript Document
$(document).ready(function(){
	$("#pr-edit-link").click(function(){
		$('.pr-view').hide();
		$('.pr-edit').show();
		$('#pr-edit-link').hide();
	});
	
	$("#pr-cancel-link").click(function(){
		$('.pr-view').show();
		$('.pr-edit').hide();
		$('#pr-edit-link').show();
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
});