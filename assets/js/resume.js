$(document).ready(function()
{
	//today date in date-picker 
	$('button.ui-datepicker-current').live('click', function() {
        $.datepicker._curInst.input.datepicker('setDate', new Date()).datepicker('hide');
    });
	//Avoid form data lose, by ask confirmation when click any links other than download.
	downloadClicked = false;
    window.onbeforeunload = confirmExit;

    // Define slider properties
	define_slider();

	datepic(); 

	//custum title text enabling
	$('.custTitle').change(function()
	{
		if($(this).attr('value') === 'Custom heading')
		{
			$('#'+$(this).attr('name')).show();	
		}
		else
		{
			$('#'+$(this).attr('name')).val('');
			$('#'+$(this).attr('name')).hide();
		}
	});
	
	//template popup scroll -Mani
	$('#rightbutton').click(function() {
      event.preventDefault();
			index = parseInt($('#template_pop').css('width').replace(/[^-\d\.]/g, '')) + parseInt($('#template_pop').css('marginLeft').replace(/[^-\d\.]/g, ''));
			if(index >= 500 || isNaN(index))
			{
				 $('#template_pop').animate({
        marginLeft: "-=100px"
      }, "fast");
			}
   });
	 $('#leftbutton').click(function() {
      event.preventDefault();
			index = parseInt($('#template_pop').css('marginLeft').replace(/[^-\d\.]/g, ''));
			if(index <=0 || isNaN(index))
			{
      $('#template_pop').animate({
       marginLeft: "+=100px"
      }, "fast");
			}
   });

	/* tiny url commented bcz limitte number of queries per day
	 * 
	var websitetime, linkedintime, twittertime, facebooktime= null;
	//get web tiny url
	$('#website').keydown(function()
	{
       clearTimeout(websitetime); 
       websitetime = setTimeout(function()
       {
		   //$('#website_err').html('');
		   gettiny('#website');
		}, 1000)
	});
	
	//get linkedin tiny url
	$('#linkedin').keydown(function()
	{
       clearTimeout(linkedintime); 
       linkedintime = setTimeout(function()
       {
		   $('#linkedin_err').html('');
		   gettiny('#linkedin');
		}, 1000)
	});
	
	//get twitter tiny url
	$('#twitter').keydown(function()
	{
       clearTimeout(twittertime); 
       twittertime = setTimeout(function()
       {
		   $('#twitter_err').html('');
		   gettiny('#twitter');
		}, 1000)
	});
	
	//get facebook tiny url
	$('#facebook').keydown(function()
	{
       clearTimeout(facebooktime); 
       facebooktime = setTimeout(function()
       {
		   $('#facebook_err').html('');
		   gettiny('#facebook');
		}, 1000)
	});
	*/
	//let tab menu and continue button function start
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
		$('html, body').animate({ scrollTop: 0 }, 0);
	});

	$('.next').click(function()
	{
		//if(!validate_resume())
		if(0)
		{
			return false;
		}
		else
		{
			$('.tab').removeClass('rns_a');
			$('.tabs').hide();
			$(".tab[tab='" + $(this).attr('href') + "']").addClass('rns_a');
			$($(this).attr('href')).show();
		}
		$('html, body').animate({ scrollTop: 0 }, 0);
	});
	//let tab menu and continue button function start
	
	//close selectTemplate
	$('#selectTemplateclose').click(function(){
		$('#selectTemplate, #selectTemplate_bg').hide();
	});

	//show selectTemplate
	$('.showSelectTemplate').click(function(){
		$('#selectTemplate, #selectTemplate_bg').show();
	});

	$("#preview").colorbox({iframe:true, escKey:true, width:"860px", height:"95%"});
	$(".previewTemp").colorbox({rel:'previewTemp', transition:"fade"});
	$("#resume_submit").click(function(e){
		e.preventDefault();
		if(!validate_resume())
		{
		return false;
		}
		else
		{
		/*if(!$('#template').val())
		{
			//return false;
			//alert('Please select a Template');
			$('#selectTemplate').show();
			return false;
		}*/
		//else
		//{
			//update();
			$.ajax({
				url: baseurl+'preview', 
				type: 'post',
				data: $('#resume_form').serialize()+ "&registeronly=yes",
				success:function(result)
				{
					if(result.resultset.success=='yes')
					{
						downloadClicked = true;
						window.location=baseurl+'login/index/register';
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
		//}
		}
	});
	$("#preview_submit").click(function(e){
		e.preventDefault();
		if(!validate_resume())
		{
		return false;
		}
		else
		{
		if(!$('#template').val() || $('#template').val()==0)
		{
			//return false;
			//alert('Please select a Template');
			$('#selectTemplate, #selectTemplate_bg').show();
			return false;
		}
		else
		{
			//update();
			$.ajax({
				url: baseurl+'preview', 
				type: 'post',
				data: $('#resume_form').serialize()+"&registeronly=",
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
		}
	});
	
	$('.template').click(function()
	{
		//$('.templateCell').removeClass('templateCellSelected');
		$('.t_list_t').removeClass('selected_temp');
		$('.template').show();
		$('#template').val($(this).attr('value'));
		$('#preview').attr('title',$(this).attr('title'));
		$('.thumb_sdw_tmp').attr('src',baseurl+'assets/img/'+$(this).attr('value')+'_thumb.jpg');
		$('#'+$(this).attr('value')).addClass('selected_temp');
		//$(this).hide();
		$('#selectTemplate, #selectTemplate_bg').hide();
	//	$('#'+$(this).attr('value')).addClass('templateCellSelected');
	});
	$('#addEdudcation').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="e"+id;
		html=		'<div id="'+rid+'" class="myed_added">';
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
		html+=				'<input type="text" class="half_date_picker" name="eduFrom[]" placeholder="Feb-2012" readonly="readonly" />';
		html+=				'<label >To</label>';
		html+=				'<input  type="text" class="half_date_picker" name="eduTo[]" placeholder="Feb-2012" readonly="readonly" />';
		html+=			'</div>';
		html+=		'</div>';
		$('#edudcation').append(html);
		datepic();
	});
$('#addProject').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="p"+id;
			html=	'<div id="'+rid+'" class="mypr_added">';
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
			html=	'<div id="'+rid+'" class="cmp_repeater cmn_repeater">';
			html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
			html+=			'<div>';
			html+=				'<input  type="text" name="cmpnyName[]" placeholder="Company name"><br/>';
			html+=				'<input  name="cmpnyDesg[]" type="text"  placeholder="Designation" class="cmp_desgn"><br/>';
			html+=				'<label >From</label>';
			html+=				'<input  type="text"  class="half_date_picker" name="cmpnyFrom[]" placeholder="Feb-2012" readonly="readonly" /><br/>';
			html+=				'<label >To</label>';
			html+=				'<input  type="text"  class="half_date_picker" name="cmpnyTo[]" placeholder="Feb-2012" readonly="readonly" />';
			html+=			'</div>';
			html+=		'</div >';
		$('#company').append(html);
		datepic();
	});
$('#addOskills').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		value=$('#temp_skill').val();
		if(!value)
		{
			$('#temp_skill').focus();
			return false;
		}
		$('#temp_skill').val('');
		$(this).attr('value',id);
		rid="os"+id;
			html=	'<div id="'+rid+'" class="mys_added">';
			html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
		    html+=  		'<input  type="text"  name="otherSkills[]" value="'+value+'" placeholder="Skill name" >';
		    html+=  	'</div>';
		$('#oskills').append(html);
	});

$('.sugg_strnth').live('click',function(){
	
	var chkelems = $('input[value="'+$(this).attr('value')+'"]');
	if(chkelems.length >=1)
	return false;
	
	//alert(chkelems.length);
	var data=decodeURIComponent($(this).attr('value'));
	var div_id=$(this).attr('data');

	//$('#sugg_strnth_'+div_id).remove();
	id=parseInt($('#addOskills').attr('value'))+1;
		$('#addOskills').attr('value',id);
		rid="os"+id;
			html=	'<div id="'+rid+'" class="mys_added">';
			html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'","'+encodeURIComponent(data)+'","'+div_id+'");>Remove</span>';
		    html+=  		'<input  type="text"  name="otherSkills[]" placeholder="Skill name" value="'+data+'" />';
		    html+=  	'</div>';
		$('#oskills').append(html);
});

$('#addSkills').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="s"+id;
		html=	'<div id="'+rid+'" class="mytb_added">';
		html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';
		html+=		'<div>';
		html+=			'<input  type="text"  name="skillName[]" placeholder="Skill name" />';
		/*html+=		'<select name="skillEff[]" class="w100">';
		html+=				'<option value="0">0</option>';
		html+=				'<option value="1">1</option>';
		html+=				'<option value="2">2</option>';
		html+=				'<option value="3">3</option>';
		html+=				'<option value="4">4</option>';
		html+=				'<option value="5">5</option>';
		html+=				'<option value="6">6</option>';
		html+=				'<option value="7">7</option>';
		html+=				'<option value="8">8</option>';
		html+=				'<option value="9">9</option>';
		html+=				'<option value="10">10</option>';
		html+=			'</select>';*/
		html+=			'<input type="hidden" name=skillEff[] id="skillEff'+id+'" value="4"/>';
		html+=			'<span class="sliding" id="sliding'+id+'" data="'+id+'"></span>';
		html+=			'<span class="slidingText" id="slid_msg'+id+'"></div>';
		html+=		'</div>';		
		html+=	'</div>';
		$('#skills').append(html);

		//Define slider properties
		define_slider("sliding"+id);
	});
	
	$('#addawd').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="aw"+id;
		html=	'<div id="'+rid+'" class="myaw_added">';
		html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';	
		html+=				'<div>';
		html+=					'<input rows="3" name="awdtitle[]" type="text"  placeholder="Award Title">';
		html+=				'</div>';
		html+=				'<div>';
		html+=					'<label >For the period From</label>';
		html+=					'<input  type="text" class="half_date_picker" name="awdFrom[]" placeholder="Feb-2012" readonly="readonly" />';
		html+=					'<label >To</label>';
		html+=					'<input  type="text" class="half_date_picker" name="awdTo[]" placeholder="Feb-2012" readonly="readonly" />';
		html+=				'</div>';
		html+=				'<div>';
		html+=					'<textarea rows="3"  name="awdDesc[]" type="text"  placeholder="Description"></textarea>';
		html+=				'</div>';
		html+=			'</div>';
		$('#award').append(html);
		datepic();
	});
	
	$('#addintrest').click(function()
	{
		id=parseInt($(this).attr('value'))+1;
		$(this).attr('value',id);
		rid="ma"+id;
		html=	'<div id="'+rid+'" class="more_Added">';
		html+=		'<span class="button remove formRemoveBtn" onclick=removeId("'+rid+'");>Remove</span>';	
		html+=			'<div>';
		html+=				'<input rows="3"  name="intresttitle[]" type="text"  placeholder="Title of Interest"><br/>';
		html+=				'<p class="examples">E.g, Blogging, Sports, Trekking, Photography.</p>';
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

	// Suggestion Box Scrolling Start
	var ele   = $('.sug1');
    var speed = 25, scroll = 5, scrolling;
    
    $('.sug_top1').mousedown(function() {
    	ele   = $('#'+$(this).attr('divId'));
        // Scroll the element up
        scrolling = window.setInterval(function() {
            ele.scrollTop( ele.scrollTop() - scroll );
        }, speed);
    });
    
    $('.sug_bot1').mousedown(function() {
    	ele   = $('#'+$(this).attr('divId'));
        // Scroll the element down
        scrolling = window.setInterval(function() {
            ele.scrollTop( ele.scrollTop() + scroll );
        }, speed);
    });
    
    $('.sug_top1, .sug_bot1').bind({
        click: function(e) {
            // Prevent the default click action
            e.preventDefault();
        },
        mouseup: function() {
            if (scrolling) {
                window.clearInterval(scrolling);
                scrolling = false;
            }
        }
    });

    /*$('.sug1').scroll(function(){
    	if($('.sug1').scrollTop()==0)
    		$('.sug_top1').addClass('scroll_top_inact'); // Inactivate top link
    	else if($('.sug_top1').hasClass('scroll_top_inact'))
    		$('.sug_top1').removeClass('scroll_top_inact'); // Activate top link
    		
		if($('.sug1').scrollTop() + $('.sug1').height() == $('.sug1').prop('scrollHeight'))
			$('.sug_bot1').addClass('scroll_bot_inact'); // Inactivate bottom link
		else if($('.sug_bot1').hasClass('scroll_bot_inact'))
			$('.sug_bot1').removeClass('scroll_bot_inact'); // Activate bottom link
	});
	// Suggestion Box Scrolling End
	*/

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
function removeId(ID,data,mid)
{
	$('#'+ID).remove();

	/*var data = (data === undefined) ? false : data;
	var mid = (mid === undefined) ? false : mid;
	if(data)
	{
		$('#sugg_strnth_list').append("<div id='sugg_strnth_"+mid+"'>"+decodeURIComponent(data)+"<span class='sugg_strnth' value="+data+" data="+mid+">+</span></div>");
	}*/
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
function datepic()
{
	//date
	$('.full_date_picker').datepicker({
		changeMonth: true,
        changeYear: true,
        //showButtonPanel: true,
        dateFormat: 'M-dd-yy',
        maxDate: new Date(),
        yearRange:'c-80:c',
        showButtonPanel: true,
        onClose: function() {
			var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).datepicker('setDate', new Date(iYear, iMonth, 1));
			}
		});
	
	$('.half_date_picker').datepicker( {
        changeMonth: true,
        changeYear: true,
        dateFormat: 'M-yy',		// Ex: Feb-2012
        maxDate: new Date(),
        yearRange:'c-80:c',
        showButtonPanel: true,
        onClose: function() {
			var iMonth = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			var iYear = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
			$(this).datepicker('setDate', new Date(iYear, iMonth, 1));
			}
        /*onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }*/
    });
    
    $('.feature_date_picker').datepicker({
		changeMonth: true,
        changeYear: true,
        dateFormat: 'M-yy',
        yearRange:'c:c+80',
		});
    
   /* $('.half_date_picker').click(function()
	{
		$('.ui-datepicker-calendar').hide();
	});*/
}
function gettiny(divID)
{
	var str1 = $(divID).val();
	var str2 = "tinyurl";
	if(str1.length>20)
	{
		if(str1.indexOf(str2) != -1){
			$(divID+'_err').html('<a href="'+str1+'" target="_blank">Check</a>');
			return true;
		}
		/*else
		{
			$(divID+'_err').html('Converting to tiny url...');
			$.getJSON("http://json-tinyurl.appspot.com/?&callback=?", {
				url: str1
			}, function(data) {
				$(divID).val(data.tinyurl);
				$(divID+'_err').html('<a href="'+data.tinyurl+'" target="_blank">Check</a>');
			});	
		}*/
	}
	else
	{
		$(divID+'_err').html('<a href="'+str1+'" target="_blank">Check</a>');
	}
}

// Ask for register before download for guest user.
function reg_download()
{
	downloadClicked = true;
	window.location=baseurl+'login/index/register';
}

// Redirect to download page for loggedin user.
function download(link)
{
	downloadClicked = true;
	window.location=baseurl+'download/index/'+link;
}

// Make sure for exit, if user clicked other than the download link.
function confirmExit()
{
	if (!downloadClicked) {
        return "You may lose your data if you are leave or reload this page without saving.";
    } else {
        downloadClicked = false;
    }
}

//Define slider properties
function define_slider(sliding_id)
{
	var sliding_id = (sliding_id === undefined) ? false : sliding_id;
	if(sliding_id)
		var selector='#'+sliding_id;
	else
		var selector='.sliding';
	$(selector).slider({
		range: "max",
		min: 1,
		max: 6,
		create: function( event, ui ) {
		 	var data=$(this).attr('data');
		 	var value=$('#skillEff'+data).val();
		 	 if(!value) value='1';
		 	$(this).slider( "value", value );
			switch(value)
			{
				case '1':
					msg='Want to learn';break;
				case '2':
					msg='Training/Learning';break;
				//case '3':
					//msg='Poor';break;
				case '3':
					msg='Satisfactory';break;
				//case '5':
					//msg='OK';break;
				case '4':
					msg='Good';break;
				case '5':
					msg='Very Good';break;
				case '6':
					msg='Expert';break;
			}
			$('#slid_msg'+data).html(msg);
		 	
		},
		slide: function( event, ui ) {
			var data=$(this).attr('data');
			$('#skillEff'+data).val(ui.value);		
			switch(ui.value)
			{
				case 1:
					msg='Want to learn';break;
				case 2:
					msg='Training/Learning';break;
				//case 3:
					//msg='Poor';break;
				case 3:
					msg='Satisfactory';break;
				//case 5:
					//msg='OK';break;
				case 4:
					msg='Good';break;
				case 5:
					msg='Very Good';break;
				case 6:
					msg='Expert';break;
			}
			$('#slid_msg'+data).html(msg);
		}
	});
}
function validate_resume()
{
		flag = true;
		focus_slected=0;
		tab_show=0;
		$('.tab').removeClass('rns_err');
		$('#email_err , #phone_err, #fname_err, #lname_err').html("");
		if(!validate('First Name','first_name',man=true,max=100,min=3,type='string',disp='fname_err'))
		{
			$('.tab[tab="#about_tab"]').addClass('rns_err');
			if(focus_slected==0)
			{
			tab_show ='#about_tab';
			focus_slected='#first_name';
			}
			flag = false;
		}
		if(!validate('Last Name','last_name',man=true,max=100,min=false,type='string',disp='lname_err'))
		{
			$('.tab[tab="#about_tab"]').addClass('rns_err');
			if(focus_slected==0)
			{
			tab_show ='#about_tab';
			focus_slected='#last_name';
			}
			flag = false;
		}
		if(!validate('Mobile Number','phone',man=true,max=17,min=10,type='mobile',disp='phone_err'))
		{
			$('.tab[tab="#about_tab"]').addClass('rns_err');
			if(focus_slected==0)
			{
			tab_show ='#about_tab';
			focus_slected='#phone';
			}
			flag = false;
		}
		if(!validate('Email','email',man=true,max=254,min=false,type='email',disp='email_err'))
		{
			$('.tab[tab="#about_tab"]').addClass('rns_err');
			if(focus_slected==0)
			{
			tab_show ='#about_tab';
			focus_slected='#email';
			}
			flag = false;
		}
		if($('#currentctc').val().length !=0)
		{
			if(!validate('Compensation','currentctc',man=true,max=254,min=false,type='number',disp='compensation_err'))
			{
				$('.tab[tab="#experience_tab"]').addClass('rns_err');
				if(focus_slected==0)
				{
				tab_show ='#experience_tab';
				focus_slected='#currentctc';
				}
				flag = false;
			}
		}
		if($('#expectedctc').val().length !=0)
		{
			if(!validate('Compensation','expectedctc',man=true,max=254,min=false,type='number',disp='compensation_err'))
			{
				$('.tab[tab="#experience_tab"]').addClass('rns_err');
				if(focus_slected==0)
				{
				tab_show ='#experience_tab';
				focus_slected='#expectedctc';
				}
				flag = false;
			}
		}
		if(tab_show!=0)
		{
			$('.tabs').hide();
			$(tab_show).show();
		}
		if(focus_slected!=0)
		{
			$(focus_slected).focus();
		}
		return flag;
}
function FixMargin(left) {
    $(this).css("left", left);
}
