<div id="search-content">
    <br />
    <form id="myform">
    <!-- left box start -->
    <div  style="float:left;">
        <input type="text" id="search_txt"/><a id="add_search">Add</a><br />

        <?php if(@$searchStr) { ?>
        Search String : <span id="current_search"><?=implode(' | ', $searchStr)?></span> 
        <? if(!$strID) { ?><a search="<?php echo implode(' | ', $searchStr); ?>" id="saveSearch">Save</a> <?} ?>
        <br />
        <?php foreach ($searchStr as $key => $searchSt) { ?><input type="hidden" name="search[]" class="search" value="<?=$searchSt?>" /><?php } ?>
        <div class="row-fluid">
            <div class="span12">
                <table cellpadding="10">
                    <tr style="height:30px;">
                            <td>Name</td>
                            <td>Mobile</td>
                            <td>Experience</td>
                    </tr>
                <? foreach($result as $single) { ?>
                    <tr style="height:30px;">
                        <td><a href="<?php echo base_url('member/viewResume/'.$single->user_id); ?>"><?=$single->first_name?></a></td>
                        <td><?=$single->mobile?></td><td><?=$single->experience?></td>
                    </tr>
                <? } ?>
                </table>	
            </div>
        </div>
        <div class="pagi"><?php echo $pagi; ?></div>
        <?php } ?>
    </div>
    <!-- left box end -->

    <!-- right box start -->
    <div class="download-main-inner" style="float:right; display:none;">
        <div id="search_form">
             <input type="button" value="Submit" id="restsubmit" class="btn btn-small btn-primary" />
        </div>
    </div>
    <!-- right box end -->
    <div style="clear:both;"></div>
    <br />
    <div class="span12">
        Previous Searches:
        <table id="previousSearch">
            <? foreach($searchList as $single)
            {?>
            <tr id="<?=$single->id?>">
                <td>
                    <a href="javascript:void(0);" data="<?=$single->id?>" class="existSearch">
                        <?php echo $single->title; //echo $single->string; ?>
                    </a>
                    <span onclick="removeExistSearch('<?=$single->id?>');">X</span>
                </td>
            </tr>
            <?}?>
        </table>
    </div>
    <div style="clear:both"></div>
    </form>

    <div id="dialog_box" style="background-color: #CCCCFF; display:none;">
    <table cellpadding="5">
        <tr>
            <td><strong>Save search as?</strong></td>
        </tr>
        <tr>
            <td><input type="text" id="search_title" /></td>
        </tr>
    </table>
    </div>
<script type="text/javascript" src="<?php echo base_url($this->config->item('path_js_file').'validation.js'); ?>"></script>
<script src="<?php echo base_url($this->config->item('path_js_file').'searchList.js');?>"></script>
</div>