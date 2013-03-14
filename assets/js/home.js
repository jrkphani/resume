$(document).ready(function()
{
	$('.template').click(function()
	{
		$('#template').val($(this).attr('value'));
	});
	$('#AddEdudcation').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="e"+id;
				html=	'<div id="'+rid+'">';
				html+=		'<div class="control-group topBorder">';
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
				html+=		'<span class="button remove" onclick=removeId("'+rid+'");>Remove</span>';
				html+=	'</div>';
		$('#edudcation').append(html);
	});
});
function removeId(ID)
{
$('#'+ID).remove();
}
