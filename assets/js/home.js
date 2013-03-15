$(document).ready(function()
{
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
			$.ajax({
				url: baseurl+'preview', 
				type: 'post',
				data: $('#resume_form').serialize(),
				success:function(result)
				{
					if(result.resultset.success=='yes')
					{
						window.location=baseurl+'preview/page/'+result.resultset.html;
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
				html+=		  	'<label class="control-label">Project 1</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text" name="projName[]"  placeholder="Project name">';
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
				html+=		  	'<label class="control-label">Company 1</label>';
				html+=		    '<div class="controls">';
				html+=		      '<input class="span4" type="text" name="cmpnyName[]" placeholder="Company name">';
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
				html+=		'<input class="span4" type="text"  name="otherSkills[]" placeholder="Skill name">';
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
});
function removeId(ID)
{
$('#'+ID).remove();
}
