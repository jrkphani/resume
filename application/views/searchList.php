<div id="search-content">
Search String : <?=implode(' | ', $searchStr)?> <? if(!$strID) { ?><button search="<?=implode(' | ', $searchStr)?>" id="saveSearch">Save</button> <?} ?>
<form id="myform">
    <?php foreach ($searchStr as $key => $searchSt) { ?>
        <input type="hidden" name="search[]" value="<?=$searchSt?>" />
    <?php } ?>
    <div class="row-fluid">
        
        <div class="span12">
            <table cellpadding="10">
                <tr style="height:30px;">
                        <td>Name</td><td>Mobile</td>
                        <td>Experience</td>
                        <!--<td>Action</td>-->
                </tr>
            <? foreach($result as $single)
            {?>
                <tr style="height:30px;">
                    <td><a href="<?php echo base_url('member/viewResume/'.$single->user_id); ?>"><?=$single->first_name?></a></td>
                    <td><?=$single->mobile?></td><td><?=$single->experience?></td>
                    <?php /* ?><td><a href="javascript:void(0);" onclick="selectResume(<?php echo $single->user_id; ?>);">Select<a></td><?php */ ?>
                </tr>
            <?}?>
            </table>	
        </div>
    </div>
    <div class="pagi"><?php echo $pagi; ?></div>
    </form>
    <script src="<?php echo base_url('assets/js/searchList.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>
</div>
