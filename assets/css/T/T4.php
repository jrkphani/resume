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


/*******************************************************global************************************************************************/

body p,b,h1,h2,h3,h4,span,div{font-family:Calibri, arial; color:#3f3f3f;}
.clearall{clear:both;}

/*************************************************************header******************************************************************/

.wrapper{width:210mm; margin:0 auto;}
.header .left_header{width:10%; height:162px; float:left; background:url(<?=$baseurl?>assets/img/Templates/t8_1.jpg) no-repeat 0% 0%;}
.header .right_header{width:87%; float:right; text-align:right; margin:0 0 0 0; padding:15px 20px 0 0;}
.header .right_header .conatct{padding:19px 0 0px 20px;}

.header .right_header .conatct .conatct_1 {font-size: 12px; color:#4aa1d9;   float: right;  padding:2px 0px 0 20px;}
.header .right_header .conatct .conatct_2 {font-size: 12px; color:#4aa1d9;    float: right;  padding:2px 0px 0 20px;}
.header .right_header .conatct .conatct_3 {font-size: 12px; color:#4aa1d9;    padding:4px 0px 0 20px;}

.header .right_header .conatct span{/*padding:0px 0 0 20px; color:#4aa1d9;*/}
.header .right_header .name{margin:5px 0; color:#4a79d9; font-size:24px;}
.header .right_header .desig{color:#4aa1d9; font-size:20px;}


/*************************************************************objective*****************************************background-color:pink;*************************/

.object {margin: 12px 0 25px 0;}
.object .left_obj{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_2.jpg) no-repeat 0% 50%;}
.object .left_obj p{padding:0 0 0 20px; color:#4a7ad9; font-size: 17px;  line-height:28px; line-height:28px;}
.object .right_obj{width:70%; float:right; padding:5px 20px 0 0;}
.object .right_obj p{color:#3f3f3f; line-height:20px; font-size:14px; text-align:justify;}


/*************************************************************Summary*****************************************background-color:pink;*************************/

.Summary {margin: 15px 0 20px 0;}
.Summary .left_obj{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_2.jpg) no-repeat 0% 50%;}
.Summary .left_obj p{padding:0 0 0 20px; color:#4a7ad9; font-size: 17px;  line-height:28px;}
.Summary .right_obj{width:70%; float:right; padding:5px 20px 0 0;}
.Summary .right_obj p{color:#3f3f3f; line-height:20px; font-size:14px; text-align:justify;}



/*************************************************************experience******************************************************************/


.experience {margin: 15px 0 20px 0;}
.experience .left_exp{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_3.jpg) no-repeat 0% 50%;}
.experience .left_exp p{padding:0 0 0 20px; color:#5a87e2; font-size: 17px;  line-height:28px;}
 .right_exp{width:70%; float:right; padding:5px 20px 0 0;}
 .right_exp .desig {font-size: 18px; color:#5a87e2!important;  width: 60%; float: left; font-size:normal; clear:both;}
 .right_exp .desig span{color:#5a87e2!important; }
.right_exp .from {font-size: 13px; color:#5a87e2; padding: 0 0 0 0px; text-align:right; width:26%; float: right; clear:right;}
.right_exp .company_name{font-size: 13px; color:#3f3f3f; margin:0px 0 10px 0;clear: both; padding:10px 0 0 0;}
 .right_exp .descrip{color:#3f3f3f; line-height:20px; font-size:14px; text-align:justify; margin: 0 0 18px 0;}


 .right_exp .spr p span{font-size:14px; float:left; color:#5a87e2; font-weight:normal; line-height:20px; padding:0 0px 0 0px; display:inline;}
 .right_exp .spr .cctc{font-size: 14px; color:#3f3f3f;  padding: 10px 0 12px 0px; width: 50%; float: left; font-weight:bold; }
.right_exp .spr .ectc {font-size: 14px; color:#3f3f3f; padding: 10px 0 12px 0; text-align:right; width: 50%; float: left; font-weight:bold; }

 .right_exp .spr .cctc span{color:#5a87e2;}
.right_exp .spr .ectc span{color:#5a87e2;}
.right_exp .spr .spr1{border-top: 1px solid #5a87e2;}

.experience .right_exp1{width:70%; float:right; padding:5px 20px 0 0;}
 
 
/*************************************************************project******************************************************************/


.project {margin:4px 0 20px 0;}
.project .left_exp{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_3.jpg) no-repeat 0% 50%;}
.project .left_exp p{padding:0 0 0 20px; color:#4aa1d9; font-size: 17px;  line-height:28px;}
.project .right_exp{width:70%; float:right; padding:5px 20px 0 0;}
.project .right_exp .desig p{font-size: 18px; color:#4aa1d9;  width: 60%; float: left; }
.project .right_exp .from {font-size: 13px; color:#4aa1d9; padding: 0 0 0 0px; text-align:right; width: 40%; float: left;}
.project .right_exp .company_name{font-size: 14px; color:#3f3f3f; margin:0px 0 10px 0;clear: both; padding:5px 0 0 0;}
.project .right_exp .descrip{color:#3f3f3f; line-height:20px; font-size:14px; text-align:justify; margin: 0 0 18px 0;}


.project .right_exp h4 p{font-size:14px; float:left; font-weight:bold; line-height:24px; padding:0 15px 0 0px;}
.project .right_exp .cctc{font-size: 17px; color:#3f3f3f;  padding: 10px 0 20px 0px; width: 50%; float: left; font-weight:bold;}
.project .right_exp .ectc {font-size: 17px; color:#3f3f3f; padding: 10px 0 20px 0; text-align:right; width: 50%; float: left; font-weight:bold;}

.project .right_exp  .pro_desc_tit{font-size: 16px; color:#4aa1d9; margin:10px 0 10px 0;clear: both;}
.project .right_exp  .pro_obj_tit{font-size: 16px; color:#4aa1d9; margin:10px 0 10px 0;clear: both;}


/*************************************************************reference******************************************************************/


.reference {margin: 0px 0 20px 0;}
.reference .left_ref{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_3.jpg) no-repeat 0% 50%;}
.reference .left_ref p{padding:0 0 0 20px; color:#4aa1d9; font-size: 17px;  line-height:28px;}
.reference .right_ref{width:70%; float:right; padding:5px 20px 0 0;}
.reference .right_ref .name{font-size: 18px; color:#4aa1d9;  float: left; display:block; clear: both;}
.reference .right_ref .desig {font-size: 14px; color:#3f3f3f; padding: 5px 0 5px 0px; float: left; display:block; clear: both;}
.reference .right_ref .company_name{font-size: 14px; color:#4aa1d9; margin:0px 0 10px 0;clear: both;}
.reference .right_ref .mobile{color:#1c1c1c; line-height:20px; font-size:14px; text-align:justify; }
.reference .right_ref .mail{color:#1c1c1c; line-height:20px; font-size:14px; text-align:justify; margin: 0 0 18px 0;}



/*************************************************************recommandations******************************************************************/


.recommand {margin: 0px 0 20px 0;}
.recommand .left_cmd{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_3.jpg) no-repeat 0% 50%;}
.recommand .left_cmd p{padding:0 0 0 20px; color:#4aa1d9; font-size: 17px;  line-height:28px;}
.recommand .right_cmd{width:70%; float:right; padding:5px 20px 0 0;}
.recommand .right_cmd .name{font-size: 18px; color:#4aa1d9;  float: left; display:block; clear: both;}
.recommand .right_cmd .desig {font-size: 14px; color:#3f3f3f; padding: 5px 0 5px 0px; float: left; display:block; clear: both;}
.recommand .right_cmd .company_name{font-size: 14px; color:#4aa1d9; margin:0px 0 10px 0;clear: both;}
.recommand .right_cmd .descrip{color:#3f3f3f; line-height:20px; font-size:14px; text-align:justify; margin: 0 0 18px 0;}


/*************************************************************education******************************************************************/

.education {margin: 0px 0 20px 0;}
.education .left_edu{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_4.jpg) no-repeat 0% 50%;}
.education .left_edu p{padding:0 0 0 20px; color:#3590ca; font-size: 17px;  line-height:28px;}
.education .right_edu{width:70%; float:right; padding:5px 20px 0 0;}
.education .right_edu .desig{font-size: 18px; color:#3590ca;  width: 50%; float: left; }
.education .right_edu .from {font-size: 13px; color:#3590ca; padding: 0 0 0 0px; text-align:right; width: 50%; float: left;}
.education .right_edu .college_name{font-size: 14px; color:#1c1c1c; margin: 0px 0 1px 0;clear: both; padding:5px 0 0 0;}
.education .right_edu .score{font-size: 14px; color:#1c1c1c; margin: 0px 0 20px 0;clear: both; padding:5px 0 0 0;}

/*************************************************************skills******************************************************************/

.skill {margin: 10px 0 20px 0;}
.skill .left_skill{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_5.jpg) no-repeat 0% 50%;}
.skill .left_skill p{padding:0 0 0 20px; color:#4aa1d9; font-size: 17px;  line-height:28px;}

.skill .right_skill{width:70%; float:right; padding:5px 20px 0 0;}
.skill .right_skill .first_skill{width:100%;}
.skill .right_skill .first_skill p{ color:#1c1c1c; font-size:14px; line-height:14px; background:url(<?=$baseurl?>assets/img/Templates/t8_6.jpg) no-repeat 0% 50%; padding:0 0 0 20px;}
.skill .right_skill .first_skill div p {font-weight:normal; font-size: 18px; color:#4aa1d9; margin:0 0 15px 0; background:none; padding:0;}
.skill .right_skill .other_skill{width:100%;}
.skill .right_skill .other_skill .sskill{width:255px; display: inline-block; font-weight:normal; font-size: 14px; color:#1c1c1c; margin:0 0 0px 0; background:url(<?=$baseurl?>assets/img/Templates/t8_6.jpg) no-repeat scroll 0px 8px; padding:5px 0 5px 20px;}
.skill .right_skill .other_skill p{ color:#1c1c1c; font-size:14px; line-height:14px; background:url(<?=$baseurl?>assets/img/Templates/t8_6.jpg) no-repeat 0% 50%; padding:0 0 0 20px;}
.skill .right_skill .other_skill .str {font-weight:normal; font-size: 18px; color:#4aa1d9; margin:10px 0 15px 0; background:none; padding:0;}

.skill .right_skill .other_discrip{color:#1c1c1c; line-height:20px; font-size:14px; text-align:justify; margin: 10px 0 18px 0;}


.skill .right_skill .first_skill div .fskill{ width:45%; background:red; line-height: 20px; font-size:14px; color:#1c1c1c; font-weight:normal; float:left; display: inline; background:url(<?=$baseurl?>assets/img/Templates/t8_6.jpg) no-repeat scroll 0% 50%; padding:0px 0 0px 20px;}
.skill .right_skill .first_skill div .level{width:47%; background:;  font-size:14px; color:#1c1c1c; display: inline; float:right; font-weight:normal; text-align:right; padding:0px 0 0px 20px;}
.skill .right_skill .first_skill div .level p{ display:inline;  width:100px; margin:0; font: inherit;}

.skill .right_skill .other_skill .first_skill div .mskill .sskill{ width:65%;font-size:14px; font-weight:normal; float:left; display: inline; background:url(<?=$baseurl?>assets/img/Templates/t8_6.jpg) no-repeat scroll 0% 50%; padding:0px 0 0px 20px;}

.pbar{ width: 260px; height: 20px; }

.pbar_inner{ 
 width: 60%;  height: 6px;  margin-top: 6px; float: left; 
 background-color: #dbdbdb; border:solid 1px #bebebe; }

.pbar_fill{
 width: 40%; height: 100%; margin-top: -1px;
 background-color: #4a79d9; border:solid 1px #089cca;}

.pbar p{
 width: 100px;  display: inline; 
 margin-left: 10px; line-height: 20px; text-transform: capitalize;}

.pbar1{ width: 12.5% !important;}
.pbar2{ width: 25% !important;}
.pbar3{ width: 37.5% !important;}
.pbar4{ width: 50% !important;}
.pbar5{ width: 62.5% !important;}
.pbar6{ width: 75% !important;}
.pbar7{ width: 87.5% !important;}
.pbar8{ width: 100% !important;}
/*************************************************************awards******************************************************************/


.awards {margin: 0px 0 20px 0;}
.awards .left_award{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_3.jpg) no-repeat 0% 50%;}
.awards .left_award p{padding:0 0 0 20px; color:#4aa1d9; font-size: 17px;  line-height:28px;}
.awards .right_award{width:70%; float:right; padding:5px 20px 0 0;}
.awards .right_award .name{font-size: 18px; color:#4aa1d9;  width: 50%; float: left; }
.awards .right_award .from {font-size: 13px; color:#4aa1d9; padding: 0 0 0 0px; text-align:right; width: 50%; float: left;}
.awards .right_award .descrip{color:#3f3f3f; line-height:20px; font-size:14px; text-align:justify; margin: 10px 0 18px 0;}


/*************************************************************interest******************************************************************/


.interest {margin: 0px 0 20px 0;}
.interest .left_int{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_3.jpg) no-repeat 0% 50%;}
.interest .left_int p{padding:0 0 0 20px; color:#4aa1d9; font-size: 17px;  line-height:28px;}
.interest .right_int{width:70%; float:right; padding:5px 20px 0 0;}
.interest .right_int .desig p{font-size: 18px; color:#4aa1d9;  float: left; }
.interest .right_int .url{font-size: 14px; color:#3f3f3f; margin:0px 0 10px 0;clear: both; padding:10px 0 0 0;}
.interest .right_int .descrip{color:#3f3f3f; line-height:20px; font-size:14px; text-align:justify; margin: 0 0 18px 0;}


/*************************************************************other details******************************************************************/

.other_dls {margin: 0px 0 20px 0;}
.other_dls .left_dls{width:27%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_4.jpg) no-repeat 0% 50%;}
.other_dls .left_dls p{padding:0 0 0 20px; color:#3590ca; font-size: 17px;  line-height:28px;}
.other_dls .right_dls{ float:left; padding:0px 20px 0 0;}
.other_dls .right_dls .address_name{font-size: 14px; line-height:24px; color:#1c1c1c; margin: 0px 0 0px 0;clear: both; padding:5px 0 0 0;}

/*************************************************************contacts******************************************************************/


.contact_footer {margin: 0px 0 20px 0;  width:100%; height:100px;}
.contact_footer .left_contact{width:26%; float:left;  background:url(<?=$baseurl?>assets/img/Templates/t8_4.jpg) no-repeat 0% 90%;}
.contact_footer .left_contact p{padding:20px 0 0 20px; color:#3590ca; font-size: 17px;  line-height:28px;}

.contact_footer .right_contact{width:71%; float:right; padding:25px 20px 0 0px;}
.contact_footer .right_contact #contancs1 {font-size: 11px; color:#fff;   float: left; background:url(<?=$baseurl?>assets/img/Templates/t8_8.jpg) no-repeat 0% 82%; padding:2px 20px 0 20px;}
.contact_footer .right_contact #contancs2 {font-size: 11px; color:#fff;    float: left; background:url(<?=$baseurl?>assets/img/Templates/t8_8.jpg) no-repeat 0% 82%; padding:2px 20px 0 20px;}
.contact_footer .right_contact #contancs3 {font-size: 11px; color:#fff;   float: left; background:url(<?=$baseurl?>assets/img/Templates/t8_8.jpg) no-repeat 0% 82%; padding:2px 20px 0 20px;}
.contact_footer .right_contact #contancs4 {font-size: 11px; color:#fff;    float: left; background:url(<?=$baseurl?>assets/img/Templates/t8_8.jpg) no-repeat 0% 82%; padding:2px 20px 0 20px;}
.contact_footer .right_contact #contancs5 {font-size: 11px; color:#fff;   float: left; background:url(<?=$baseurl?>assets/img/Templates/t8_8.jpg) no-repeat 0% 82%; padding:2px 20px 0 20px;}

.contact_footer .right_contact p {font-size: 14px; line-height: 24px; color: #1c1c1c; clear: both;}

.contact_footer .right_contact p span{color:#4aa1d9;}






