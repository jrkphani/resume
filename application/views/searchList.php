
<!-- This file NOT IN USE. You may DELETE it -->

<div id="search-content">
    <br />
    <form id="myform">
    <!-- left box start -->
    <div  style="float:left;">
        <input type="text" id="search_txt"/><a id="add_search">Add</a><br />
        Search String : <?=implode(' | ', $searchStr)?> <? if(!$strID) { ?><button search="<?=implode(' | ', $searchStr)?>" id="saveSearch">Save</button> <?} ?>
        <br />
        <?php foreach ($searchStr as $key => $searchSt) { ?><input type="hidden" name="search[]" id="search" value="<?=$searchSt?>" /><?php } ?>
        <div class="row-fluid">
            <div class="span12">
                <table cellpadding="10">
                    <tr style="height:30px;">
                            <td>Name</td>
                            <td>Mobile</td>
                            <td>Experience</td>
                            <!--<td>Action</td>-->
                    </tr>
                <? foreach($result as $single) { ?>
                    <tr style="height:30px;">
                        <td><a href="<?php echo base_url('member/viewResume/'.$single->user_id); ?>"><?=$single->first_name?></a></td>
                        <td><?=$single->mobile?></td><td><?=$single->experience?></td>
                        <?php /* ?><td><a href="javascript:void(0);" onclick="selectResume(<?php echo $single->user_id; ?>);">Select<a></td><?php */ ?>
                    </tr>
                <? } ?>
                </table>	
            </div>
        </div>
        <div class="pagi"><?php echo $pagi; ?></div>
    </div> 
    <!-- left box end -->

    <!-- right box start -->
    <div class="download-main-inner" style="float:right">
        <div id="search_form">
             <input type="button" value="Submit" id="restsubmit" class="btn btn-small btn-primary" />
        </div>
    </div>
    <!-- right box end -->
    <div style="clear:both"></div>
    </form>

    <script src="<?php echo base_url('assets/js/searchList.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
</div>
<script>
$(document).ready(function(){
    $('#add_search').click(function(){

        search_txt = $.trim($('#search_txt').val());
        //alert(search_txt);
        if(search_txt.length>0)
        {
            $('#search_form').prepend('<label class="button r'+search_txt+'">'+search_txt+'<span id="r'+search_txt+'" onclick="removeClass(\'r'+search_txt+'\');">X</span></label><input class="r'+search_txt+'" type="hidden" name="search[]" value="'+search_txt+'"/>');
        }
        $('#search_txt').val("");
    });

    $('#restsubmit').click(function(){//$('#search').val('mysql');
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
    })
});
function removeClass(attr)
{
    //alert(attr);
    $('.'+attr).remove();
}
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
</script>