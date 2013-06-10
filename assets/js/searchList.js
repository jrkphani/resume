$(document).ready(function(){
    //Add query for search
	$('#add_search').click(function(){
        search_txt = $.trim($('#search_txt').val());
        if(search_txt.length>0)
        {
            $('#search_form').prepend('<label class="button r'+search_txt+'">'+search_txt+'<span id="r'+search_txt+'" onclick="removeClass(\'r'+search_txt+'\');">X</span></label><input class="r'+search_txt+'" type="hidden" name="search_new[]" value="'+search_txt+'"/>');
        }
        $('#search_txt').val("");
    });

    //Submit search
	$('#restsubmit').click(function(){

		//assign queries to new temporary input and replace it to original input called "search[]"
		var querys = document.getElementsByName('search_new[]');
		var boxLength = querys.length;
		if($("[name='search[]']").length>0)
			$("[name='search[]']").remove();
		for(i=0;i<boxLength;i++)
		{
			$('#search_form').prepend('<input type="hidden" name="search[]" value="'+querys[i].value+'"/>');
		}

        $.ajax({
                url: baseurl+'member/searchSkillsAjax', 
                type: 'post',
                data: $('#myform').serialize(),
                success:function(result)
                {
                    $('#search-content').html(result);
                },
                error:function()
                {
                    alert('Internal error, Please try agian!');
                }
        });
    });

	//Search from saved quries
	$('.existSearch').click(function(){
		var id=$(this).attr('data');
        $.ajax({
                url: baseurl+'member/searchSkillsAjax/exist/'+id, 
                type: 'post',
                data: $('#myform').serialize(),
                success:function(result)
                {
                    $('#search-content').html(result);
                },
                error:function()
                {
                    alert('Internal error, Please try agian!');
                }
            });
    });

	//Save current query
    $('#saveSearch').click(function(){
		$.ajax({
			url:baseurl+"member/saveSearchList",
			type:"POST",
			data:{"search":$(this).attr('search')},
            dataType: 'json',
			success:function(data){
                if(data.resultset.success=='1')
                {
                    //get current or saved query string and ID
                    var tmp_array=new Array();
                    $('input[name="search\\[\\]"]').each(function(){
                        tmp_array.push(this.value);
                    });
                    var query=tmp_array.join(' | ');

                    var id=data.resultset.id;
                    $('#previousSearch').prepend('<tr id='+id+'><td><a href="javascript:void(0);">'+query+'</a><span onclick="remove('+id+');">X</span></td></tr>');
    				$('#saveSearch').remove();
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
	});
});

function serialize_form()
{
     return $('#myform').serialize();
}

//Remove saved skill
function remove(strID)
{
    $.ajax({
            url:baseurl+"member/deleteSearchList",
            type:"POST",
            data:{"sid":strID},
            success:function(){
                $('#'+strID).remove();
            }
        });
}

function removeClass(attr)
{
    $('.'+attr).remove();
}