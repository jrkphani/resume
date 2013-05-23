$(document).ready(function()
{
	$("#preview").colorbox({iframe:true, escKey:true, width:"860px", height:"100%"});
	$("#resume_submit").click(function(e){
		e.preventDefault();
		if($('#template').val()==="")
		{
			//return false;
			alert('Please select a Template');
			return false;
		}
		else
		{
			update();
			$.ajax({
				url: baseurl+'preview', 
				type: 'post',
				data: $('#resume_form').serialize(),
				success:function(result)
				{
					if(result.resultset.success=='yes')
					{
						$("#preview").attr('href',baseurl+'preview/page/'+result.resultset.html)
						$("#preview").click();
						$("#download").click(function(){
							window.location=baseurl+'preview/page/'+result.resultset.html;
						});
						//window.location=baseurl+'preview/page/'+result.resultset.html;
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
		}
	});
	$('.template').click(function()
	{
		$('.templateCell').removeClass('templateCellSelected');
		$('#template').val($(this).attr('value'));
		$('#'+$(this).attr('value')).addClass('templateCellSelected');
	});
	$('#addEdudcation').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="e"+id;
				html=	'<div id="'+rid+'" class="formBorder">';
				html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
				html+=		'<div class="control-group">';
				html+=		  	'<label class="control-label">Edudcation</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text" name="eduInst[]" placeholder="Institution">';
				html+=		      '<input type="hidden" name="eduInstID[]">';
				html+=		      '<input class="span4 leftMargin" name="eduCert[]" type="text"  placeholder="Certification">';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Period</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text"  name="eduFrom[]" placeholder="(2005)(Feb 2005)">';
				html+=		      'to';
				html+=		      '<input class="span4" type="text"  name="eduTo[]" placeholder="(2007)(Mar 2007)">';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Score</label>';
				html+=		    '<div class="controls">';
				html+=		      '<textarea rows="3" class="input span8" name="eduScore[]" type="text"  placeholder="Score"></textarea>';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=	'</div>';
		$('#edudcation').append(html);
	});
$('#addProject').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="p"+id;
				html=	'<div id="'+rid+'" class="formBorder">';
				html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
				html+=		  '<div class="control-group">';
				html+=		  	'<label class="control-label">Project</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text" name="projName[]"  placeholder="Project name">';
				html+=		      '<input type="hidden" name="projNameID[]"  >';
				html+=		      '<input class="span4 leftMargin" name="projRole[]" type="text"  placeholder="Role">';
				html+=		    '</div>';
				html+=		  '</div>';	  
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Period</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text"  name="projFrom[]" placeholder="(2005)(Feb 2005)">';
				html+=		      'to';
				html+=		      '<input class="span4" type="text"  name="projTo[]" placeholder="(2007)(Mar 2007)">';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Description</label>';
				html+=		    '<div class="controls">';
				html+=		      '<textarea rows="3" class="input span8" name="projDesc[]" type="text"  placeholder="Description"></textarea>';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=	'</div>';
		$('#project').append(html);
	});
$('#addCompany').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="c"+id;
				html=	'<div id="'+rid+'" class="formBorder">';
				html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
				html+=	  '<div class="control-group">';
				html+=		  	'<label class="control-label">Company</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text" name="cmpnyName[]" placeholder="Company name">';
				html+=		      '<input type="hidden" name="cmpnyNameID[]">';
				html+=		      '<input class="span4 leftMargin" name="cmpnyDesg[]" type="text"  placeholder="Designation">';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Period</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text"  name="cmpnyFrom[]" placeholder="(2005)(Feb 2005)">';
				html+=		      'to';
				html+=		      '<input class="span4" type="text"  name="cmpnyTo[]" placeholder="(2007)(Mar 2007)">';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Description</label>';
				html+=		    '<div class="controls">';
				html+=		      '<textarea rows="3" class="input span8" name="cmpnyDesc[]" type="text"  placeholder="Description"></textarea>';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=	'</div>';
		$('#company').append(html);
	});
$('#addOskills').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="os"+id;
				html=	'<div id="'+rid+'"class="otherSkillBox">';
				html+=		'<input class="span4" type="text"  name="otherSkills[]" state="pending" placeholder="Skill name">';
				html+=		'<span class="button remove otherSkillButton" onclick=removeId("'+rid+'");>Remove</span>';
				html+=	'</div>';
		$('#oskills').append(html);
	});
$('#addSkills').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="s"+id;
				html=	'<div id="'+rid+'" class="formBorder">';
				html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
				html+=	  '<div class="control-group">';
				html+=		    '<label class="control-label">Key Skills</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text"  name="skillName[]" placeholder="Skill name">';
				html+=		      '<input type="hidden"  name="skillNameID[]" >';
				html+=		      '<input class="span4 leftMargin" name="skillTitle[]" type="text"  placeholder="SubTitle">';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Effeciency</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text"  name="skillEff[]" placeholder="Master, Intermediate, Adept etc., ">';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=		  '<div class="control-group ">';
				html+=		    '<label class="control-label">Description</label>';
				html+=		    '<div class="controls">';
				html+=		      '<textarea rows="3" class="input span8" name="skillDesc[]" type="text"  placeholder="Description"></textarea>';
				html+=		    '</div>';
				html+=		  '</div>';
				html+=	'</div>';
		$('#skills').append(html);
	});
	$('#uploadstate').html("");
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
				$('#photo').val(data.imgUrl);
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
   $('#profile_pic').click(function()
   {
	   $('#userfile').click();
	});
	
	$(".remove_ex_skill").click(function(){
		var id=$(this).attr('id');
		mylength=$('input[name*="skillName[]"]').length;
		var remove_skills=$("#remove_skills").val();
		$('#ex_skill_'+id).remove();
		
		if(remove_skills)
			$("#remove_skills").val(remove_skills+','+id);
		else
			$("#remove_skills").val(id);

		if(mylength<=1)
		{
			$('#addSkills').click();
		}
		/*$.ajax({
				url: baseurl+'resume/delete_exist', 
				type: 'get',
				data: {'id':id,'table':'skill'},
				success:function(result)
				{
					if(result)
						$('#ex_skill_'+id).remove();
					else
						alert('Internal error. Try again later.');
				},
				error:function()
				{
					alert('Internal error, Please try agian!');
				}
			});*/
	});
	$(".remove_ex_company").click(function(){
		var id=$(this).attr('id');
		var remove_company=$("#remove_company").val();
		mylength=$('input[name*="cmpnyName[]"]').length;
		$('#ex_company_'+id).remove();
		
		if(remove_company)
			$("#remove_company").val(remove_company+','+id);
		else
			$("#remove_company").val(id);

		if(mylength<=1)
		{
			$('#addCompany').click();
		}
	});
	$(".remove_ex_project").click(function(){
		var id=$(this).attr('id');
		mylength=$('input[name*="projName[]"]').length;
		var remove_project=$("#remove_project").val();
		$('#ex_project_'+id).remove();
		
		if(remove_project)
			$("#remove_project").val(remove_project+','+id);
		else
			$("#remove_project").val(id);

		if(mylength<=1)
		{
			$('#addProject').click();
		}
	});
	$(".remove_ex_education").click(function(){
		var id=$(this).attr('id');
		mylength=$('input[name*="eduInst[]"]').length;
		var remove_education=$("#remove_education").val();
		$('#ex_education_'+id).remove();
		
		if(remove_education)
			$("#remove_education").val(remove_education+','+id);
		else
			$("#remove_education").val(id);

		if(mylength<=1)
		{
			$('#addEdudcation').click();
		}
	});
});
function removeId(ID)
{
$('#'+ID).remove();
}
function updateDownload(temp_link) //not in use
{
	document.getElementById('download_file').value=temp_link;
	var form=document.getElementById('resume_form');
	form.method="post";
	form.action=baseurl+'resume/update_download';
	form.submit();
}
function update()
{
	$.ajax({
	url: baseurl+'resume/update_download', 
	type: 'post',
	data: $('#resume_form').serialize(),
	error:function()
	{
		alert('Could not save. Internal error, Please try agian!');
	}
	});
}
function makeOnline(user_id)
{
	frames = document.getElementsByTagName('iframe');
	frames[0].setAttribute("id", "iFrameID");
	var ifrm = document.getElementById('iFrameID');
	var doc = ifrm.contentDocument? ifrm.contentDocument: ifrm.contentWindow.document;

	var img=document.getElementById('profile_pic').getAttribute('src');
	
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
			doc.getElementById('msg_online').innerHTML=xmlhttp.responseText;
		}
	} 
	xmlhttp.open("GET",baseurl+'resume/makeOnline/?user_id='+user_id+'&img='+img,true);
	xmlhttp.send();
}