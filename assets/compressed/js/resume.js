$(document).ready(function(){$("button.ui-datepicker-current").live("click",function(){$.datepicker._curInst.input.datepicker("setDate",new Date()).datepicker("hide")});downloadClicked=false;window.onbeforeunload=confirmExit;define_slider();datepic();$(".custTitle").change(function(){if($(this).attr("value")==="Custom heading"){$("#"+$(this).attr("name")).show()}else{$("#"+$(this).attr("name")).val("");$("#"+$(this).attr("name")).hide()}});$("#rightbutton").click(function(){event.preventDefault();index=parseInt($("#template_pop").css("width").replace(/[^-\d\.]/g,""))+parseInt($("#template_pop").css("marginLeft").replace(/[^-\d\.]/g,""));if(index>=500||isNaN(index)){$("#template_pop").animate({marginLeft:"-=100px"},"fast")}});$("#leftbutton").click(function(){event.preventDefault();index=parseInt($("#template_pop").css("marginLeft").replace(/[^-\d\.]/g,""));if(index<=0||isNaN(index)){$("#template_pop").animate({marginLeft:"+=100px"},"fast")}});$(".tabs").hide();$("#about_tab").show();$(".tab").click(function(){$(".tab").removeClass("rns_a");$(".tabs").hide();$(this).addClass("rns_a");$($(this).attr("tab")).show();$("html, body").animate({scrollTop:0},0)});$(".next").click(function(){$(".tab").removeClass("rns_a");$(".tabs").hide();$(".tab[tab='"+$(this).attr("href")+"']").addClass("rns_a");$($(this).attr("href")).show();$("html, body").animate({scrollTop:0},0)});$("#selectTemplateclose").click(function(){$("#selectTemplate, #selectTemplate_bg").hide()});$(".showSelectTemplate").click(function(){$("#selectTemplate, #selectTemplate_bg").show()});$("#preview").colorbox({iframe:true,escKey:true,width:"860px",height:"95%"});$(".previewTemp").colorbox({rel:"previewTemp",transition:"fade"});$("#resume_submit").click(function(F){F.preventDefault();if(!validate_resume()){return false}else{if(!$("#template").val()||$("#template").val()==0){$("#selectTemplate, #selectTemplate_bg").show();return false}else{$.ajax({url:baseurl+"preview",type:"post",data:$("#resume_form").serialize()+"&registeronly=yes",success:function(G){if(G.resultset.success=="yes"){downloadClicked=true;if(G.resultset.image=="no"){alert("saved")}else{window.location=baseurl+"login/index/register"}}else{alert("Internal error, Please try agian!")}},error:function(){alert("Internal error, Please try agian!")}})}}});$("#preview_submit").click(function(F){F.preventDefault();if(!validate_resume()){return false}else{if(!$("#template").val()||$("#template").val()==0){$("#selectTemplate, #selectTemplate_bg").show();return false}else{$.ajax({url:baseurl+"preview",type:"post",data:$("#resume_form").serialize()+"&registeronly=",success:function(G){if(G.resultset.success=="yes"){$("#preview").attr("href",baseurl+"preview/page/"+G.resultset.html);$("#preview").click();$("#download").click(function(){window.location=baseurl+"preview/page/"+G.resultset.html})}else{alert("Internal error, Please try agian!")}},error:function(){alert("Internal error, Please try agian!")}})}}});$(".template").click(function(){$(".t_list_t").removeClass("selected_temp");$(".template").show();$("#template").val($(this).attr("value"));$("#preview").attr("title",$(this).attr("title"));$(".thumb_sdw_tmp").attr("src",baseurl+"assets/img/"+$(this).attr("value")+"_thumb.jpg");$("#"+$(this).attr("value")).addClass("selected_temp");$("#selectTemplate, #selectTemplate_bg").hide()});$("#addEdudcation").click(function(){id=parseInt($(this).attr("value"))+1;$(this).attr("value",id);rid="e"+id;html='<div id="'+rid+'" class="myed_added">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';html+="<div> ";html+='<input  name="eduCert[]" type="text"  placeholder="Name of Degree">';html+='<input  type="text" name="eduInst[]" placeholder="University/Board">';html+="</div>";html+="<div>";html+='<input rows="3"  name="eduScore[]" type="text"  placeholder="Score: % or GPA">';html+="</div>";html+="<div>";html+="<label >From</label>";html+='<input type="text" class="half_date_picker" name="eduFrom[]" placeholder="Feb-2012" readonly="readonly" />';html+="<label >To</label>";html+='<input  type="text" class="half_date_picker" name="eduTo[]" placeholder="Feb-2012" readonly="readonly" />';html+="</div>";html+="</div>";$("#edudcation").append(html);datepic()});$("#addProject").click(function(){id=parseInt($(this).attr("value"))+1;$(this).attr("value",id);rid="p"+id;html='<div id="'+rid+'" class="mypr_added">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';html+="<div >";html+='<input  type="text" name="projName[]"  placeholder="Enter Project Name/Title">';html+='<input  name="projRole[]" type="text"  placeholder="My Position">';html+="</div>";html+="<div>";html+='<textarea rows="3"  name="projDesc[]" type="text"  placeholder="Enter project description and your role in it"></textarea>';html+="</div>";html+="<div>";html+='<input name="projUrl[]" type="text"  placeholder="Project web address" />';html+="</div>";html+="</div>";$("#project").append(html)});$("#addCompany").click(function(){id=parseInt($(this).attr("value"))+1;$(this).attr("value",id);rid="c"+id;html='<div id="'+rid+'" class="cmp_repeater cmn_repeater">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';html+="<div>";html+='<input  type="text" name="cmpnyName[]" placeholder="Company name"><br/>';html+='<input  name="cmpnyDesg[]" type="text"  placeholder="Designation" class="cmp_desgn"><br/>';html+="<label >From</label>";html+='<input  type="text"  class="half_date_picker" name="cmpnyFrom[]" placeholder="Feb-2012" readonly="readonly" /><br/>';html+="<label >To</label>";html+='<input  type="text"  class="half_date_picker" name="cmpnyTo[]" placeholder="Feb-2012" readonly="readonly" />';html+="</div>";html+="</div >";$("#company").append(html);datepic()});$("#addOskills").click(function(){id=parseInt($(this).attr("value"))+1;value=$("#temp_skill").val();if(!value){$("#temp_skill").focus();return false}$("#temp_skill").val("");$(this).attr("value",id);rid="os"+id;html='<div id="'+rid+'" class="mys_added">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';html+='<input  type="text"  name="otherSkills[]" value="'+value+'" placeholder="Skill name" >';html+="</div>";$("#oskills").append(html)});$(".sugg_strnth").live("click",function(){var H=$('input[value="'+$(this).attr("value")+'"]');if(H.length>=1){return false}var G=decodeURIComponent($(this).attr("value"));var F=$(this).attr("data");id=parseInt($("#addOskills").attr("value"))+1;$("#addOskills").attr("value",id);rid="os"+id;html='<div id="'+rid+'" class="mys_added">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'","'+encodeURIComponent(G)+'","'+F+'");>Remove</span>';html+='<input  type="text"  name="otherSkills[]" placeholder="Skill name" value="'+G+'" />';html+="</div>";$("#oskills").append(html)});$("#addSkills").click(function(){id=parseInt($(this).attr("value"))+1;$(this).attr("value",id);rid="s"+id;html='<div id="'+rid+'" class="mytb_added">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';html+="<div>";html+='<input  type="text"  name="skillName[]" placeholder="Skill name" />';html+='<input type="hidden" name=skillEff[] id="skillEff'+id+'" value="4"/>';html+='<span class="sliding" id="sliding'+id+'" data="'+id+'"></span>';html+='<span class="slidingText" id="slid_msg'+id+'"></div>';html+="</div>";html+="</div>";$("#skills").append(html);define_slider("sliding"+id)});$("#addawd").click(function(){id=parseInt($(this).attr("value"))+1;$(this).attr("value",id);rid="aw"+id;html='<div id="'+rid+'" class="myaw_added">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';html+="<div>";html+='<input rows="3" name="awdtitle[]" type="text"  placeholder="Award Title">';html+="</div>";html+="<div>";html+="<label >For the period From</label>";html+='<input  type="text" class="half_date_picker" name="awdFrom[]" placeholder="Feb-2012" readonly="readonly" />';html+="<label >To</label>";html+='<input  type="text" class="half_date_picker" name="awdTo[]" placeholder="Feb-2012" readonly="readonly" />';html+="</div>";html+="<div>";html+='<textarea rows="3"  name="awdDesc[]" type="text"  placeholder="Description"></textarea>';html+="</div>";html+="</div>";$("#award").append(html);datepic()});$("#addintrest").click(function(){id=parseInt($(this).attr("value"))+1;$(this).attr("value",id);rid="ma"+id;html='<div id="'+rid+'" class="more_Added">';html+='<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';html+="<div>";html+='<input rows="3"  name="intresttitle[]" type="text"  placeholder="Title of Interest"><br/>';html+='<p class="examples">E.g, Blogging, Sports, Trekking, Photography.</p>';html+="</div>";html+="<div>";html+="<label >Description</label>";html+='<textarea class="h200" rows="3"  name="intrestDesc[]" type="text"  placeholder="Enter short description on other interests you might have"></textarea>';html+="</div>";html+="<div>";html+="<label >Site Url</label>";html+='<input name="intrestUrl[]" type="text"  placeholder="Web address of interest (blog, photo, gallery)" />';html+="</div>";$("#moreabout").append(html)});$("#uploadstate").html("");$("#upload_file").submit(function(F){$("#uploadstate").html("uploading..");F.preventDefault();$.ajaxFileUpload({url:baseurl+"upload/upload_file/",secureuri:false,fileElementId:"userfile",dataType:"json",success:function(H,G){$("#uploadstate").html("");if(H.status!="error"){$("#profile_pic").attr("src",H.imgUrl);$("#photo").val(H.imgUrl)}else{$("#uploadstate").html(H.msg)}},error:function(){alert("Internal error.")}});return false});$("#userfile").live("change",function(){$("#fsubmit").click()});$("#profile_pic").click(function(){$("#userfile").click()});$(".remove_ex_skill").click(function(){var G=$(this).attr("id");mylength=$('input[name*="skillName[]"]').length;var F=$("#remove_skills").val();$("#ex_skill_"+G).remove();if(F){$("#remove_skills").val(F+","+G)}else{$("#remove_skills").val(G)}if(mylength<=1){$("#addSkills").click()}});$(".remove_ex_company").click(function(){var G=$(this).attr("id");var F=$("#remove_company").val();mylength=$('input[name*="cmpnyName[]"]').length;$("#ex_company_"+G).remove();if(F){$("#remove_company").val(F+","+G)}else{$("#remove_company").val(G)}if(mylength<=1){$("#addCompany").click()}});$(".remove_ex_project").click(function(){var G=$(this).attr("id");mylength=$('input[name*="projName[]"]').length;var F=$("#remove_project").val();$("#ex_project_"+G).remove();if(F){$("#remove_project").val(F+","+G)}else{$("#remove_project").val(G)}if(mylength<=1){$("#addProject").click()}});$(".remove_ex_education").click(function(){var G=$(this).attr("id");mylength=$('input[name*="eduInst[]"]').length;var F=$("#remove_education").val();$("#ex_education_"+G).remove();if(F){$("#remove_education").val(F+","+G)}else{$("#remove_education").val(G)}if(mylength<=1){$("#addEdudcation").click()}});var C=$(".sug1");var B=25,A=5,D;$(".sug_top1").mousedown(function(){C=$("#"+$(this).attr("divId"));D=window.setInterval(function(){C.scrollTop(C.scrollTop()-A)},B)});$(".sug_bot1").mousedown(function(){C=$("#"+$(this).attr("divId"));D=window.setInterval(function(){C.scrollTop(C.scrollTop()+A)},B)});$(".sug_top1, .sug_bot1").bind({click:function(F){F.preventDefault()},mouseup:function(){if(D){window.clearInterval(D);D=false}}});function E(){if($("#user_id").val()){url=baseurl+"resume/update_download"}else{url=baseurl+"resume/save_download"}$.ajax({url:url,dataType:"json",type:"post",data:$("#resume_form").serialize(),success:function(F){if(F.resultset.success!=1){alert("Could not save. Internal error, Please try agian!");return false}},error:function(){alert("Could not save. Internal error, Please try agian!");return false}})}$("#directDownload").click(function(){if(!validate_resume()){return false}else{$.ajax({url:baseurl+"preview",type:"post",data:$("#resume_form").serialize()+"&registeronly=yes",success:function(F){if(F.resultset.success=="yes"){downloadClicked=true;window.location=baseurl+"download/index/"+F.resultset.html}else{alert("Internal error, Please try agian!")}},error:function(){alert("Internal error, Please try agian!")}})}})});function removeId(A,C,B){$("#"+A).remove()}function updateDownload(B){document.getElementById("download_file").value=B;var A=document.getElementById("resume_form");A.method="post";A.action=baseurl+"resume/update_download";A.submit()}function makeOnline(B){frames=document.getElementsByTagName("iframe");frames[0].setAttribute("id","iFrameID");var A=document.getElementById("iFrameID");var D=A.contentDocument?A.contentDocument:A.contentWindow.document;var C=document.getElementById("profile_pic").getAttribute("src");if(window.XMLHttpRequest){xmlhttp=new XMLHttpRequest()}else{xmlhttp=new ActiveXObject("Microsoft.XMLHTTP")}xmlhttp.onreadystatechange=function(){if(xmlhttp.readyState==4&&xmlhttp.status==200){D.getElementById("msg_online").innerHTML=xmlhttp.responseText}};xmlhttp.open("GET",baseurl+"resume/makeOnline/?user_id="+B+"&img="+C,true);xmlhttp.send()}function datepic(){$(".full_date_picker").datepicker({changeMonth:true,changeYear:true,dateFormat:"M-dd-yy",maxDate:new Date(),yearRange:"c-80:c",showButtonPanel:true,onClose:function(){var B=$("#ui-datepicker-div .ui-datepicker-month :selected").val();var A=$("#ui-datepicker-div .ui-datepicker-year :selected").val();$(this).datepicker("setDate",new Date(A,B,1))}});$(".half_date_picker").datepicker({changeMonth:true,changeYear:true,dateFormat:"M-yy",maxDate:new Date(),yearRange:"c-80:c",showButtonPanel:true,onClose:function(){var B=$("#ui-datepicker-div .ui-datepicker-month :selected").val();var A=$("#ui-datepicker-div .ui-datepicker-year :selected").val();$(this).datepicker("setDate",new Date(A,B,1))}});$(".feature_date_picker").datepicker({changeMonth:true,changeYear:true,dateFormat:"M-yy",yearRange:"c:c+80"})}function gettiny(A){var C=$(A).val();var B="tinyurl";if(C.length>20){if(C.indexOf(B)!=-1){$(A+"_err").html('<a href="'+C+'" target="_blank">Check</a>');return true}}else{$(A+"_err").html('<a href="'+C+'" target="_blank">Check</a>')}}function reg_download(){downloadClicked=true;window.location=baseurl+"login/index/register"}function download(A){downloadClicked=true;window.location=baseurl+"download/index/"+A}function save(){$("#resume_submit").click()}function confirmExit(){if(!downloadClicked){return"You may lose your data if you are leave or reload this page without saving."}else{downloadClicked=false}}function define_slider(B){var B=(B===undefined)?false:B;if(B){var A="#"+B}else{var A=".sliding"}$(A).slider({range:"max",min:1,max:6,create:function(C,F){var E=$(this).attr("data");var D=$("#skillEff"+E).val();if(!D){D="1"}$(this).slider("value",D);switch(D){case"1":msg="Want to learn";break;case"2":msg="Training/Learning";break;case"3":msg="Satisfactory";break;case"4":msg="Good";break;case"5":msg="Very Good";break;case"6":msg="Expert";break}$("#slid_msg"+E).html(msg)},slide:function(C,E){var D=$(this).attr("data");$("#skillEff"+D).val(E.value);switch(E.value){case 1:msg="Want to learn";break;case 2:msg="Training/Learning";break;case 3:msg="Satisfactory";break;case 4:msg="Good";break;case 5:msg="Very Good";break;case 6:msg="Expert";break}$("#slid_msg"+D).html(msg)}})}function validate_resume(){flag=true;focus_slected=0;tab_show=0;$(".tab").removeClass("rns_err");$("#email_err , #phone_err, #fname_err, #lname_err").html("");if(!validate("First Name","first_name",man=true,max=100,min=3,type="string",disp="fname_err")){$('.tab[tab="#about_tab"]').addClass("rns_err");if(focus_slected==0){tab_show="#about_tab";focus_slected="#first_name"}flag=false}if(!validate("Last Name","last_name",man=true,max=100,min=false,type="string",disp="lname_err")){$('.tab[tab="#about_tab"]').addClass("rns_err");if(focus_slected==0){tab_show="#about_tab";focus_slected="#last_name"}flag=false}if(!validate("Mobile Number","phone",man=true,max=17,min=10,type="mobile",disp="phone_err")){$('.tab[tab="#about_tab"]').addClass("rns_err");if(focus_slected==0){tab_show="#about_tab";focus_slected="#phone"}flag=false}if(!validate("Email","email",man=true,max=254,min=false,type="email",disp="email_err")){$('.tab[tab="#about_tab"]').addClass("rns_err");if(focus_slected==0){tab_show="#about_tab";focus_slected="#email"}flag=false}if($("#currentctc").val().length!=0){if(!validate("Compensation","currentctc",man=true,max=254,min=false,type="number",disp="compensation_err")){$('.tab[tab="#experience_tab"]').addClass("rns_err");if(focus_slected==0){tab_show="#experience_tab";focus_slected="#currentctc"}flag=false}}if($("#expectedctc").val().length!=0){if(!validate("Compensation","expectedctc",man=true,max=254,min=false,type="number",disp="compensation_err")){$('.tab[tab="#experience_tab"]').addClass("rns_err");if(focus_slected==0){tab_show="#experience_tab";focus_slected="#expectedctc"}flag=false}}if(tab_show!=0){$(".tabs").hide();$(tab_show).show()}if(focus_slected!=0){$(focus_slected).focus()}return flag}function FixMargin(A){$(this).css("left",A)};