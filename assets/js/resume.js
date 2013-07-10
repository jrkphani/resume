$(document).ready(function()
{
	$('.tabs').hide();
	$('#about_tab').show();
	//tab navigation
	$('.tab').click(function()
	{
		//alert($(this).attr('tab'));
		$('.tab').removeClass('rns_a');
		$('.tabs').hide();
		$(this).addClass('rns_a');
		$($(this).attr('tab')).show();
	});
	
	$('.next').click(function()
	{
		$('.tab').removeClass('rns_a');
		$('.tabs').hide();
		$(".tab[tab='" + $(this).attr('href') + "']").addClass('rns_a');
		$($(this).attr('href')).show();
	});
	
	
	$("#preview").colorbox({iframe:true, escKey:true, width:"860px", height:"100%"});
	$("#resume_submit").click(function(e){
		e.preventDefault();
		if(!$('#template').val())
		{
			//return false;
			alert('Please select a Template');
			return false;
		}
		else
		{
			//update();
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
		html=		'<div id="'+rid+'">';
		html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
		html+=			'<div> ';
		html+=				'<input  name="eduCert[]" type="text"  placeholder="Name of Degree">';
		html+=				'<input  type="text" name="eduInst[]" placeholder="University/Board">';
	    html+=            '</div>';
		html+=			'<div>';
		html+=				'<input rows="3"  name="eduScore[]" type="text"  placeholder="Score: % or GPA">';
		html+=			'</div>';
		html+=			'<div>';
		html+=				'<label >From</label>';
		html+=				'<input type="text"  name="eduFrom[]" placeholder="(2005)(Feb 2005)">';
		html+=				'<label >To</label>';
		html+=				'<input  type="text"  name="eduTo[]" placeholder="(2007)(Mar 2007)">';
		html+=			'</div>';
		html+=		'</div>';
		$('#edudcation').append(html);
	});
$('#addProject').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="p"+id;
			html=	'<div id="'+rid+'">';
			html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
			html+=		'<div >';
			html+=			'<input  type="text" name="projName[]"  placeholder="Enter Project Name/Title">';
			html+=			'<input  name="projRole[]" type="text"  placeholder="My Position">';
			html+=		'</div>';
			html+=		'<div>';			
			html+=			'<textarea rows="3"  name="projDesc[]" type="text"  placeholder="Enter project description and your role in it"></textarea>';
			html+=		'</div>';
			html+=		'<div>';			
			html+=			'<input name="projUrl[]" type="text"  placeholder="Project web address" />';
			html+=		'</div>';
			html+=	'</div>';
		$('#project').append(html);
	});
$('#addCompany').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="c"+id;
			html=	'<div id="'+rid+'">';
			html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
			html+=			'<div >';
			html+=				'<input  type="text" name="cmpnyName[]" placeholder="Company name">';
			html+=				'<input  name="cmpnyDesg[]" type="text"  placeholder="Designation">';
			html+=				'<label >From</label>';
			html+=				'<input  type="date"  name="cmpnyFrom[]" placeholder="(2005)(Feb 2005)" />';
			html+=				'<label >To</label>';
			html+=				'<input  type="date"  name="cmpnyTo[]" placeholder="(2007)(Mar 2007)" />';
			html+=			'</div>';
			html+=		'</div >';
		$('#company').append(html);
	});
$('#addOskills').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="os"+id;
			html=	'<div id="'+rid+'">';
			html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
		    html=  		'<input  type="text"  name="otherSkills[]" placeholder="Skill name">';
		    html=  	'</div>';
		$('#oskills').append(html);
	});
$('#addSkills').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="s"+id;
		html=	'<div id="'+rid+'">';
		html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
		html+=			'<div >';
		html+=				'<input  type="text"  name="skillName[]" placeholder="Skill name" />';
		html+=				'<input  type="text"  name="skillEff[]" placeholder="Master, Intermediate, Adept etc., ">';
		html+=			'</div>';
		html+=		'</div>';
		$('#skills').append(html);
	});
	
	$('#addawd').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="aw"+id;
		html=	'<div id="'+rid+'">';
		html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';	
		html+=				'<div>';
		html+=					'<input rows="3" name="awdtitle[]" type="text"  placeholder="Award Title">';
		html+=				'</div>';
		html+=				'<div>';
		html+=					'<label >For the period From</label>';
		html+=					'<input  type="text"  name="awdFrom[]" placeholder="(2005)(Feb 2005)">';
		html+=					'<label >To</label>';
		html+=					'<input  type="text"  name="awdTo[]" placeholder="(2007)(Mar 2007)">';
		html+=				'</div>';
		html+=				'<div>';
		html+=					'<textarea rows="3"  name="awdDesc[]" type="text"  placeholder="Description"></textarea>';
		html+=				'</div>';
		html+=			'</div>';
		$('#award').append(html);
	});
	
	$('#addintrest').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="ma"+id;
		html=	'<div id="'+rid+'">';
		html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';	
		html+=			'<div>';
		html+=				'<input rows="3"  name="intresttitle[]" type="text"  placeholder="Title of Interest">';
		html+=				'E.g, Blogging, Sports, Trekking, Photography.';
		html+=			'</div>';
		html+=			'<div>';
		html+=				'<label >Description</label>';
		html+=				'<textarea class="h200" rows="3"  name="intrestDesc[]" type="text"  placeholder="Enter short description on other interests you might have"></textarea>';
		html+=			'</div>';
		html+=			'<div>';
		html+=				'<label >Site Url</label>';
		html+=				'<input name="intrestUrl[]" type="text"  placeholder="Web address of interest (blog, photo, gallery)" />';
		html+=			'</div>';
		$('#moreabout').append(html);
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

	function update()
	{
		if($('#user_id').val())
			url= baseurl+'resume/update_download';
		else
			url= baseurl+'resume/save_download';
		$.ajax({
		url: url, 
		dataType: 'json',
		type: 'post',
		data: $('#resume_form').serialize(),
		success:function(data){
			if(data.resultset.success!=1)
			{
				alert('Could not save. Internal error, Please try agian!');
				return false;
			}
		},
		error:function()
		{
			alert('Could not save. Internal error, Please try agian!');
			return false;
		}
		});
	}

	//Auto save start
	/*setInterval(function() {   //calls update every 120000ms(2 min)
		if($('body').data('changesMade')=='1')
   			update();
	}, 8000);

	$("input,textarea").live('change',function(){
		$('body').data('changesMade','1');
	});*/

	/*$( function() {
		$( "#resume_form" ).sisyphus();
	} );*/
});
/*function showNotice()
{
	$('#toast').toastmessage('showNoticeToast', 'Resume Saved.');
}*/
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
function makeOnline(user_id) //not in use
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