var search_query;$(document).ready(function(){$("#add_search").click(function(){if(!validate("Search Query","search_txt",man=true,max=100)){return false}search_txt=$.trim($("#search_txt").val());if(search_txt.length>0){$("#search_form").prepend('<label class="button r'+search_txt+'">'+search_txt+'<span id="r'+search_txt+'" onclick="removeClass(\'r'+search_txt+'\');">X</span></label><input class="r'+search_txt+'" type="hidden" name="search_new[]" value="'+search_txt+'"/>')}$("#search_txt").val("");if($(".download-main-inner").css("display")=="none"){$(".download-main-inner").show()}});$("#search_txt").keypress(function(B){if(B.which==13){$("#add_search").click();return false}});$("#restsubmit").click(function(){var B=document.getElementsByName("search_new[]");var C=B.length;if($("[name='search[]']").length>0){$("[name='search[]']").remove()}var D=0;for(i=0;i<C;i++){D=D+1;$("#search_form").prepend('<input type="hidden" name="search[]" value="'+B[i].value+'"/>')}if(D==0){alert("Please enter atleast one query.");return false}$.ajax({url:baseurl+"member/searchSkillsAjax",type:"post",dataType:"html",data:$("#myform").serialize(),success:function(E){$("#search-content").html(E)},error:function(){alert("Internal error, Please try agian!")}})});$(".existSearch").click(function(){var B=$(this).attr("data");$.ajax({url:baseurl+"member/searchSkillsAjax/exist/"+B,type:"post",data:$("#myform").serialize(),success:function(C){$("#search-content").html(C)},error:function(){alert("Internal error, Please try agian!")}})});function A(){var B=$("#search_title").val().trim();if(!B){alert("The title cannot be empty.");return false}$.ajax({url:baseurl+"member/saveSearchList",type:"POST",data:{search:window.search_query,title:B},dataType:"json",success:function(C){if(C.resultset.success=="1"){var D=C.resultset.id;$("#previousSearch").prepend("<tr id="+D+'><td><a href="javascript:void(0);">'+B+'</a><span onclick="removeExistSearch('+D+');">X</span></td></tr>');$("#saveSearch").remove()}else{alert("Internal error, Please try agian!")}},error:function(){alert("Internal error, Please try agian!")}})}$("#dialog_box").dialog({autoOpen:false,modal:true,buttons:[{text:"Save Search",click:function(){if(A()!=false){$(this).dialog("close")}}},{text:"Cancel",click:function(){$(this).dialog("close")}}]});$("#saveSearch").click(function(){window.search_query=$(this).attr("search");$("#search_title").val($("#current_search").html());$("#dialog_box").dialog("open")})});function serialize_form(){return $("#myform").serialize()}function removeExistSearch(A){$.ajax({url:baseurl+"member/deleteSearchList",type:"POST",dataType:"json",data:{sid:A},success:function(B){if(B.resultset.success=="1"){$("#"+A).remove()}else{alert("Internal Error. Please try again!")}},error:function(){alert("Internal Error. Please try again!")}})}function removeClass(A){$("."+A).remove()};