<?php header("Content-type: text/css"); 
$baseurl=base_url();
?>
@charset "utf-8";
/* CSS Document */


html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}

/*******************************************************font************************************************************************/




/*************************************************************  global  ************************************************************************/

body p,b,h1,h2,h3,span{font-family:Arial, Helvetica, sans-serif; color:#3f3f3f;}
.clearall{clear:both;}
.left{float:left; width:60%;display: inline; padding: 0 30px 0 0;}
.right{float:left; width:35%;display: inline;}
/*************************************************************  header  ************************************************************************/

.wrapper {width:100%;}
.wrapper .header_top{width:100%; height:5px; background:#24b8e9; display:block;}
.wrapper .header_box1{width:100%; color:#fff; }

.wrapper .header_box1 .name{width:56%; color:#24b8e9;  font-size: 17px; line-height: 22px; padding: 15px 20px 15px 0px; margin:0 0px 0 30px; display:inline; float:left; clear:both; font-weight:bold;}
.wrapper .header_box1 .desigi{width:32%; color:#ec9d21; font-size:16px; line-height:22px;  padding:15px 0px 15px 20px; float:left; display:inline;  font-weight:bold;}


/*************************************************************  objective  ************************************************************************/

.wrapper .left .objective{ margin:10px 0px 0px 30px; float:left;}
.wrapper .left .objective h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:16px 0 16px 40px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_obj.png) no-repeat 0% 50%;}
.wrapper .left .objective p{font-size: 14px; line-height: 20px; padding:15px 0 5px 0;}

/*************************************************************  summary  ************************************************************************/

.wrapper .left .summary{ margin:10px 0px 0px 30px; float:left;}
.wrapper .left .summary h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:16px 0 16px 35px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_sum.png) no-repeat 0% 50%;}
.wrapper .left .summary p{font-size: 14px; line-height: 20px; padding:15px 0 5px 0;}

/*************************************************************  skills  ************************************************************************/

.wrapper .left .skills{margin:0px 0px 0px 30px;}
.wrapper .left .skills h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:0px 0 18px 41px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_skill.png) no-repeat 0% 0%;}
.wrapper .left .skills .left_skill{width:100%; padding:15px 0;}
.wrapper .left .skills .left_skill .desigination{width:53%; float:left; line-height: 28px; color:#303030;  font-size: 15px;}
.wrapper .left .skills .left_skill .level{width:43%; color:#ec9d21; float:right; text-align:right; line-height: 28px;}
.wrapper .left .skills .left_skill .desc{font-size:14px; line-height:20px; display:block; padding: 10px 0 5px 0; clear: right; }





.pbar{ width: 260px; height: 20px; }

.pbar_inner{ 
 width: 38%;  height: 6px;  margin-top: 6px; float: left;  display: inline-block;
 background-color: #dbdbdb; border:solid 1px #bebebe; }

.pbar_fill{
 width: 50%; height: 100%; margin-top: -1px;
 background-color: #ec9d21; border:solid 1px #D88C14;}

.pbar p{
 width: 100px;  display: inline;  color:#ec9d21; font-size:12px;
 margin-left: 10px; line-height: 20px; text-transform: capitalize;}

.pbar1{ width: 12.5% !important;}
.pbar2{ width: 25% !important;}
.pbar3{ width: 37.5% !important;}
.pbar4{ width: 50% !important;}
.pbar5{ width: 62.5% !important;}
.pbar6{ width: 75% !important;}
.pbar7{ width: 87.5% !important;}
.pbar8{ width: 100% !important;}


/*************************************************************  experience  ************************************************************************/

.wrapper .left .experience{ margin:0px 0px 0px 30px;}
.wrapper .left .experience h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:16px 0 16px 35px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_exp.jpg) no-repeat 1% 48%;}
.wrapper .left .experience .exp{width:100%; padding:10px 0 15px 0;}
.wrapper .left .experience .exp .desigination{width:100%; line-height:11px; color:#303030; font-weight:bold; padding:15px 0 0px 0; font-size: 15px;}
.wrapper .left .experience .exp .company{width:100%; color:#ec9d21;  line-height: 28px;display: block;clear: right;  padding:1px 0 0px 0; font-size: 13px;}
.wrapper .left .experience .exp .from{display:block; color:#717171; padding:0 0 0px 0; text-align:left; font-size: 12px; line-height: 22px;}
.wrapper .left .experience .exp .descp{display:block; padding: 10px 0 5px 0; clear: right; font-size: 14px; line-height: 20px;}

.wrapper .left .experience .exp .spr{border-bottom:1px solid #e1e0e0; line-height:5px;}

.wrapper .left .experience .exp .exp_yers{width:100%; padding:0px 0 0px 0; }
.wrapper .left .experience .exp .exp_yers .exp_yers_btm{}
.wrapper .left .experience .exp .exp_yers span{float:left; display:inline; font-size:13px; padding:0 0px 0 0;}
.wrapper .left .experience .exp .ctc .cctc{width:50%; float:left; line-height: 28px; color:#303030; font-weight:bold; padding:15px 0 0px 0; font-size: 12px;}
.wrapper .left .experience .exp .ctc .cctc span{color:#ec9d21;}
.wrapper .left .experience .exp .ctc .ectc{width:50%; color:#303030; float:right; text-align:right; font-weight:bold; line-height: 28px;display: block;clear: right;  padding:15px 0 0px 0; font-size: 12px;}
.wrapper .left .experience .exp .ctc .ectc span{color:#ec9d21;}
.wrapper .left .experience .exp .ctc {width:100%; }


.exp_container{ margin:0px 0px 0px 30px;}
.exp_container h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:16px 0 16px 35px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_exp.jpg) no-repeat 1% 48%;}
.exp_container h2{font-size: 14px;padding:15px 0 0px 0}



.exp_container .exp_h3_comp{font-weight:bold; color: #303030; font-size: 13px; margin: 10px 0 0 0;}
.exp_container .exp_h3_ectec{font-weight:bold; border-bottom:1px solid #e1e0e0; margin: 3px 0 10px 0; color: #303030; line-height: 29px; font-size: 13px; }
.exp_container .exp_h3_desig{line-height: 18px;color: #303030;font-weight: bold;padding: 1px 0 0px 0;font-size: 15px; margin: 12px 0 0 0;}
.exp_container .exp_h3_cname{color: #ec9d21; line-height: 12px; padding: 5px 0 0px 0; font-size: 13px;}
.exp_container .exp_h3_frmto{color: #717171; padding: 0 0 0px 0; font-size: 12px; line-height: 32px; margin: 0 0 12px 0;}

/*************************************************************  project  ************************************************************************/

.wrapper .left .project{ margin:0px 0px 0px 30px;}
.wrapper .left .project h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:0px 0 16px 41px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_project.png) no-repeat 0% 2%;}
.wrapper .left .project .proj{width:100%; padding:18px 0 15px 0;}
.wrapper .left .project .proj .project_name{width:100%; line-height: 18px; color:#303030; font-weight:bold; padding:1px 0 0px 0; font-size: 15px;}
.wrapper .left .project .proj .role{width:100%; color:#ec9d21; line-height:12px; display: block;clear: right;  padding:5px 0 0px 0; font-size: 13px;}
.wrapper .left .project .proj .url{display:block; color:#717171; padding:4px 0 0px 0; font-size: 12px; line-height: 22px;}
.wrapper .left .project .proj .descp_tit{color:#ec9d21;}
.wrapper .left .project .proj .descp{display:block; padding: 10px 0 15px 0; clear: right; font-size: 14px; line-height: 20px; }
.wrapper .left .project .proj .obj_tit{color:#ec9d21;}
.wrapper .left .project .proj .obj{display:block; padding: 10px 0 5px 0; clear: right; font-size: 14px; line-height: 20px; /*border-bottom:1px solid #b5b5b5;*/}
.wrapper .left .project .proj .descp:last-child{border:none;}


/*************************************************************  recommendation  ************************************************************************/

.wrapper .left .recommend{ margin:0px 0px 0px 30px;}
.wrapper .left .recommend h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:0px 0 16px 35px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_comment.jpg) no-repeat 0% 10%;}
.wrapper .left .recommend .cmd{width:100%; padding:10px 0 15px 0;}
.wrapper .left .recommend .cmd .cmd_name{width:100%; line-height: 28px; color:#303030; font-weight:bold; padding:1px 0 0px 0; font-size: 15px;}
.wrapper .left .recommend .cmd .role{width:100%; color:#ec9d21; line-height:15px; display: block;clear: right;  padding:1px 0 0px 0; font-size: 15px;}
.wrapper .left .recommend .cmd .company{display:block; color:#717171; padding:4px 0 0px 0; font-size: 12px; line-height: 22px;}
.wrapper .left .recommend .cmd .descp{display:block; padding: 10px 0 5px 0; clear: right; font-size: 14px; line-height: 20px;  /*border-bottom:1px solid #b5b5b5;*/}
.wrapper .left .recommend .cmd .descp:last-child{border:none;}


/*************************************************************  reference  ************************************************************************/

.wrapper .left .reference{ margin:0px 0px 0px 30px;}
.wrapper .left .reference h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:0px 0 16px 35px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_reference.png) no-repeat 0% 4%;}
.wrapper .left .reference .refer{width:100%; padding:10px 0 15px 0;}
.wrapper .left .reference .refer .refer_name{width:100%; line-height: 28px; color:#303030; font-weight:bold; padding:1px 0 0px 0; font-size: 15px;}
.wrapper .left .reference .refer .role{width:100%; color:#ec9d21; float:right;  line-height:15px; display: block;clear: right;  padding:1px 0 0px 0; font-size: 15px;}
.wrapper .left .reference .refer .company{display:block; color:#717171; padding:4px 0 0px 0; font-size: 12px; line-height: 22px;}
.wrapper .left .reference .refer .mobile{display:block; padding: 10px 0 0px 0; clear: right; font-size: 14px; line-height: 18px; }
.wrapper .left .reference .refer .mail{display:block; padding: 0px 0 1px 0; clear: right; font-size: 14px; line-height: 28px;  /*border-bottom:1px solid #b5b5b5;*/}
.wrapper .left .reference .refer .descp:last-child{border:none;}


/*************************************************************  awards  ************************************************************************/

.wrapper .left .awards{ margin:0px 0px 0px 30px;}
.wrapper .left .awards h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:0px 0 16px 35px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_award.png) no-repeat -1% 1%;}
.wrapper .left .awards .awar{width:100%; padding:20px 0 0px 0;}
.wrapper .left .awards .awar .award_name{width:100%; line-height:15px; color:#303030; font-weight:bold; padding:1px 0 0px 0; font-size: 15px;}
.wrapper .left .awards .awar .yers{width:100%; color:#ec9d21; line-height: 28px;display: block;clear: right;  padding:1px 0 0px 0; font-size: 13px;}
.wrapper .left .awards .awar .descp{display:block; padding: 0 0px 20px 0; clear: right; font-size: 14px; line-height: 20px; /*border-bottom:1px solid #b5b5b5;*/}
.wrapper .left .awards .awar .descp:last-child{border:none;}


/*************************************************************  interest  ************************************************************************/

.wrapper .left .interest{ margin:0px 0px 0px 30px;}
.wrapper .left .interest h1{ border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:0px 0 16px 35px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_interest.png) no-repeat 0% 4%;}
.wrapper .left .interest .inte{width:100%; padding:10px 0 0px 0;}
.wrapper .left .interest .inte .inte_name{width:100%; float:left; line-height: 28px; color:#303030; font-weight:bold; padding:1px 0 0px 0; font-size: 15px;}
.wrapper .left .interest .inte .url{display:block; color:#ec9d21; padding:0 0 0px 0; font-size: 12px; line-height: 22px;}
.wrapper .left .interest .inte .descp{display:block; padding: 0px 0 5px 0; clear: right; font-size: 14px; line-height: 20px; /*border-bottom:1px solid #b5b5b5;*/}
.wrapper .left .interest .inte .descp:last-child{border:none;}


/*************************************************************  contact  ************************************************************************/

.wrapper .right .contact{width:80%; margin:10px 0px 0px 30px; float:left;}
.wrapper .right .contact h1{width:100%; border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:16px 0 16px 41px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_contact.png) no-repeat 0% 50%;}
.wrapper .right .contact .phone{font-size: 14px; padding:22px 0 10px 38px; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_mobile.jpg) no-repeat 0% 69%;}
.wrapper .right .contact .mail{display: block; padding:2px 0 0px 38px; font-size: 14px;line-height: 22px; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_mail.jpg) no-repeat 0px 6px;}

.wrapper .right .contact .address{font-size: 14px; padding:10px 0 0px 38px; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_address.jpg) no-repeat 0% 22%; line-height:18px;}


/*************************************************************  other skills  ************************************************************************/

.wrapper .right .other_skills{width:80%; margin:5px 0px 15px 30px; float:left;}
.wrapper .right .other_skills h1{width:100%; border-bottom:1px solid #3f3f3f; margin:0 0 15px 0; color:#24b8e9; font-size: 15px; line-height:22px; padding:16px 0 16px 39px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_skill.jpg) no-repeat 0% 43%;}
.wrapper .right .other_skills .otherskill_t3{font-size: 14px; color:#3f3f3f; padding:0px 0 5px 26px; line-height:21px; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_bul.jpg) no-repeat 0px 7px;}


/*************************************************************  education  ************************************************************************/

.wrapper .right .education{width:80%; margin:10px 0px 0px 30px;}
.wrapper .right .education h1{width:100%; border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:6px 0 16px 41px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_edu.png) no-repeat 0% 27%;}
.wrapper .right .education .edu{width:100%; padding:0px 0;}
.wrapper .right .education .edu .certification_name{width: 100%;float: left;line-height:18px; color: #303030; font-weight: bold; padding: 15px 0 0px 0; font-size: 15px;}
.wrapper .right .education .edu .institution{color: #ec9d21;float: left;line-height: 20px;display: block;clear: right;padding: 5px 0 5px 0; font-size: 13px;}
.wrapper .right .education .edu .from{display: block;color: #717171;padding: 0 0 0px 0;font-size: 12px;line-height: 22px;}
.wrapper .right .education .edu .percentage{display: block;padding: 0px 0 1px 0;clear: right;font-size: 14px;line-height: 28px; /*border-bottom:1px solid #b5b5b5;*/}
.wrapper .right .education .edu .percentage:last-child{border:none;}


/*************************************************************  other details  ************************************************************************/

.wrapper .right .other_details{width:80%; margin:2px 0px 0px 30px;}
.wrapper .right .other_details h1{width:100%; border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:17px 0 16px 41px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_others.png) no-repeat 2% 64%;}
.wrapper .right .other_details .sub{width:100%; padding:0px 0;}
.wrapper .right .other_details .sub .mstatus{display: block;color: #717171;padding: 10px 0 0px 0;font-size: 12px;line-height: 22px;}
.wrapper .right .other_details .sub .passport{display: block;color: #717171;padding: 0 0 0px 0;font-size: 12px;line-height: 22px;}
.wrapper .right .other_details .sub .visa{display: block;color: #717171;padding: 0 0 15px 0;font-size: 12px;line-height: 22px;}


.wrapper .right .other_details h2{width:100%; border-bottom:1px solid #3f3f3f; color:#24b8e9; font-size: 15px; line-height:22px; padding:17px 0 16px 41px; text-transform:uppercase; background:url(<?=$baseurl?>assets/img/Templates/t9_t10_hw_to_cnt_me.png) no-repeat 2% 64%;}


.wrapper .right .other_details .sub .url{display: block;color: #717171; padding: 0px 0 0px 31px; font-size: 12px;line-height: 26px; background:url(<?=$baseurl?>assets/img/Templates/url1.png) no-repeat 0px 0px;}
.wrapper .right .other_details .sub .skype{display: block;color: #717171; padding: 0px 0 0px 31px; font-size: 12px;line-height: 26px; background:url(<?=$baseurl?>assets/img/Templates/skype1.png) no-repeat 0% 0%;}
.wrapper .right .other_details .sub .fb{display: block;color: #717171; padding: 0px 0 0px 31px; font-size: 12px;line-height: 26px; background:url(<?=$baseurl?>assets/img/Templates/facebook1.png) no-repeat 0% 0%;}
.wrapper .right .other_details .sub .lin{display: block;color: #717171; padding: 0px 0 0px 31px; font-size: 12px;line-height: 26px; background:url(<?=$baseurl?>assets/img/Templates/linkedin1.png) no-repeat 0% 0%;}
.wrapper .right .other_details .sub .twit{display: block;color: #717171; padding: 0px 0 0px 31px; font-size: 12px;line-height: 26px; background:url(<?=$baseurl?>assets/img/Templates/twitter1.png) no-repeat 0% 0%;}


.wrapper .right .other_details .sub p b{font-weight:bold;}
.wrapper .right .other_details .sub .percentage:last-child{border:none;}









