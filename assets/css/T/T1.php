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

/***********************************************************************************************************/
body{font-family:"Myriad Pro", "open Sans Condensed", Arial; /*background:url(<?=$baseurl?>assets/img/Templates/bg.jpg) no-repeat scroll 0% 0%; height:135px;*/}
a{text-decoration:none;}
.clearall{clear:both;}
.wrapper{width:210mm; margin:0 auto;}


/************************************************header*********************************************************/

.wrapper .header_top .header_box1{width:791px;  background-color:#069fcf; color:#fff; float:left;}

.wrapper .header_top .header_box1 p.name{font-size:18px; padding:10px 0 4px 30px;}
.wrapper .header_top .header_box1 p.desigi{font-size:15px; padding:4px 0 10px 30px;}

/************************************************header*********************************************************/

.wrapper .header{width:210mm; font-family:"Myriad Pro", "open Sans Condensed", Arial;}

.wrapper .header .header_box2{width:42%; height:115px; float:left; background-color:#00c1ea; padding: 10px 0 0 0;}
.wrapper .header .header_box2 .header_box2_center{text-align: center; }
.header_box2_center_img{background:url(<?=$baseurl?>assets/img/Templates/domain.png) no-repeat scroll 50% 25% ; display:block; height:53px;}

.wrapper .header .header_box2 .header_box2_center p{color:#ffffff; font-size:13px; font-size: 18px; text-align: left; margin: 5px 0 0 19px;}
.wrapper .header .header_box2 .header_box2_center .desigi{font-size:15px;}
.wrapper .header .header_box3{width:24%; height:115px; float:left; background-color:#94d401; text-align:center; padding: 10px 0 0 0;} 
.wrapper .header .header_box3 p{ font-size:18px; color:#ffffff;  margin:10px 0 0 0;}
.wrapper .header .header_box3 .header_box3_center_img{background:url(<?=$baseurl?>assets/img/Templates/mobile.gif) no-repeat scroll 50% 100%; height:72px;}

.wrapper .header .header_box4{width:269px; height:115px; float:left; background-color:#61b100; text-align:center; padding: 10px 0 0 0;}
/*.wrapper .header .header_box4 .header_box4_atag{ padding:21px 0 0 0;}*/
.wrapper .header .header_box4 .header_box4_atag p{font-size:18px; color:#ffffff; margin:10px 0 0 0;}
.wrapper .header .header_box4 .header_box4_center_img{background:url(<?=$baseurl?>assets/img/Templates/sms.gif) no-repeat scroll 50% 80%; height:86px;}

/*********************************************** summary ***********************************************************/

.summary{padding:30px 0 0px 0;}
.summary .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#00a7db; display:block;}
.summary .left_content .left_icon{ /*width:180px;*/ height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/summary.png) no-repeat scroll 83% 50%;}
.summary .right_content{width:80%; float:right;}
.summary .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.summary .right_content p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:0px 18px 0 44px; }

/*********************************************** objective ***********************************************************/

.objective{padding:23px 0 0px 0;}
.objective .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#00a7db; display:block;}
.objective .left_content .left_icon{ /*width:180px;*/ height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/obj2.png) no-repeat scroll 83% 50%;}
.objective .right_content{width:80%; float:right;}
.objective .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.objective .right_content p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:0px 18px 0 44px; }

/*********************************************** experience ***********************************************************/

.experience{padding:23px 0 0px 0;}
.experience .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#00c1ea; display:block;}
.experience .left_content .left_icon{ /*width:180px; */height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/experience.png) no-repeat scroll 83% 60%;}

.experience .left_content .year_from{font-size:14px; color:#00c1ea; margin:86px 0 10px 40px;}
.experience .left_content .year_to{font-size:14px; color:#00c1ea; margin:0px 0 10px 40px;}



.experience .right_content{width:80%; float:right;}
.experience .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.experience .right_content h2{font-size:18px; line-height:28px; color:#000; margin:20px 10px 0 44px;}

.experience  .right_content h4 p{ padding: 0px 0px 0 0px; color:#7e7e7e; float:left; display: inline;}

.experience .right_content h2{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 44px; font-weight: bold; text-transform: uppercase;}
.experience .right_content h3{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 0px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}

.experience .right_content .spr {border-bottom:1px solid #d8d7d7; margin:0 19px 0 44px; line-height:6px;}


.experience .right_content p{font-size:14px; line-height: 20px;text-align:justify; color:#7e7e7e; margin:0px 10px 0 44px;}



.experience_content_lft{width:15%; float:left;}
.experience_content_lft .year_from{font-size:12px; color:#00c1ea; margin:19px 0 5px 40px;}
.experience_content_lft .year_to{font-size:12px; color:#00c1ea; margin:0px 0 10px 40px;}

.experience_content .experience_content_rit{width:80%; float:right; padding:0 0 5px 0;}
.experience_content_rit h2{width: 45%; float: left; font-size: 12px; line-height: 16px; color: #5b5a5a; margin: 16px 0px 0 44px; font-weight: bold; text-transform: uppercase;}
.experience_content_rit h3{width: 45%; float: left; font-size: 12px; line-height: 16px; color: #5b5a5a; margin: 16px 0px 0 0px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}
.experience_content_rit p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:0px 18px 0 44px; clear: both; }

/*********************************************** projects ***********************************************************/

.projects{padding:23px 0 0px 0;}

.projects .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#4f8c05; display:block;}
.projects .left_content .left_icon{ /*width:180px; */height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/project.png) no-repeat scroll 90% 60%;}



.projects .right_content{width:80%; float:right;}
.projects .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.projects .right_content h2{font-size:18px; line-height:28px; color:#000; margin:20px 10px 0 44px;}
.projects .right_content h2 span{margin:0 0 0 100px;}
.projects .right_content p{font-size:22px; line-height: 22px; color:#7e7e7e; margin:20px 10px 0 44px;}




.projects .comment_content_lft{width:15%; float:left;}
/*.projects .comment_content_lft .year_from{font-size:14px; color:#00c1ea; margin:28px 0 10px 40px;}
.projects .comment_content_lft .year_to{font-size:14px; color:#00c1ea; margin:0px 0 10px 40px;}*/

.projects .comment_content_rit{width:80%; float:right; padding:0 0 10px 0;}
.projects .comment_content_rit h2{width: 45%; float: left; font-size: 12px; line-height: 16px; color: #5b5a5a; margin: 6px 0px 5px 44px; font-weight: bold; text-transform: uppercase;}
.projects .comment_content_rit h3{width: 45%; float: left; font-size: 12px; line-height: 16px; color: #5b5a5a; margin: 6px 0px 5px 0px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}

.projects .comment_content_rit h4{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 7px 0px 0 44px; font-weight: bold; text-transform: uppercase;}



.projects .comment_content_rit p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:5px 10px 0 44px; clear: both; }


/*********************************************** recommentation ***********************************************************/
.recommendations{padding:23px 0 0px 0;}

.recommendations .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#61b100; display:block;}
.recommendations .left_content .left_icon{ /*width:180px; */height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/comments.png) no-repeat scroll 83% 60%;}



.recommendations .right_content{width:80%; float:right;}
.recommendations .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.recommendations .right_content h2{font-size:18px; line-height:28px; color:#000; margin:20px 10px 0 44px;}
.recommendations .right_content h2 span{margin:0 0 0 100px;}
.recommendations .right_content p{font-size:22px; line-height: 22px; color:#7e7e7e; margin:20px 10px 0 44px;}




.recommendations .comment_content_lft{width:15%; float:left;}
/*.recommendations .comment_content_lft .year_from{font-size:14px; color:#00c1ea; margin:28px 0 10px 40px;}
.recommendations .comment_content_lft .year_to{font-size:14px; color:#00c1ea; margin:0px 0 10px 40px;}*/

.recommendations .comment_content_rit{width:80%; float:right; padding:0 0 0px 0;}
.recommendations .comment_content_rit h2{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 44px; font-weight: bold; text-transform: uppercase;}
.recommendations .comment_content_rit h3{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 0px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}
.recommendations .comment_content_rit p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:5px 10px 0 44px; clear: both; }


/*********************************************** reference ***********************************************************/

.reference{padding:23px 0 0px 0;}

.reference .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#a4e019; display:block;}
.reference .left_content .ref_left_icon{ /*width:180px; */height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/reference.png) no-repeat scroll 83% 60%;}



.reference .right_content{width:80%; float:right;}
.reference .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.reference .right_content h2{font-size:18px; line-height:28px; color:#000; margin:20px 10px 0 44px;}
.reference .right_content h2 span{margin:0 0 0 100px;}
.reference .right_content p{font-size:22px; line-height: 22px; color:#7e7e7e; margin:20px 10px 0 44px;}




.reference .refer_content_lft{width:15%; float:left;}

.reference .refer_content_rit{width:80%; float:right; padding:0 0 0px 0;}
.reference .refer_content_rit h2{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 44px; font-weight: bold; text-transform: uppercase;}
.reference .refer_content_rit h3{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 0px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}
.reference .refer_content_rit h4{font-size:14px; line-height:8px; color:#7e7e7e; margin:10px 10px 12px 44px; clear: both; font-weight:normal;}
.reference .refer_content_rit p{font-size:14px;  color:#7e7e7e; margin:0px 10px 0 44px; clear: both; }


/*********************************************** awards ***********************************************************/

.awards{padding:22px 0 0px 0;}
.awards .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#afda4a; display:block;}
.awards .left_content .left_icon_awards{ /*width:180px; */height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/award.png) no-repeat scroll 83% 60%;}

.awards .left_content .year_from{font-size:14px; color:#00c1ea; margin:86px 0 10px 40px;}
.awards .left_content .year_to{font-size:14px; color:#00c1ea; margin:0px 0 10px 40px;}



.awards .right_content{width:80%; float:right;}
.awards .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.awards .right_content h2{font-size:18px; line-height:28px; color:#000; margin:20px 10px 0 44px;}
.awards .right_content h2 span{margin:0 0 0 100px;}
.awards .right_content p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:20px 10px 0 44px;}



.awards_content_lft{width:15%; float:left;}
.awards_content_lft .year_from{font-size:14px; color:#00c1ea; margin:7px 0 5px 40px;}
.awards_content_lft .year_to{font-size:14px; color:#00c1ea; margin:0px 0 10px 40px;}

.awards_content .awards_content_rit{width:80%; float:right; padding:0 0 5px 0;}
.awards_content_rit h2{width: 45%; float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 44px; font-weight: bold; text-transform: uppercase;}
.awards_content_rit h3{float: left; font-size: 12px; line-height: 28px; color: #5b5a5a; margin: 0px 0px 0 44px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}
.awards_content_rit p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:0px 18px 0 44px; clear: both; }



/*********************************************** education ***********************************************************/
.education{padding:33px 0 0px 0;}

.education .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#93d300; display:block;}
.education .left_content .left_icon{ /*width:180px; */height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/edu.png) no-repeat scroll 83% 60%;}



.education .right_content{width:80%; float:right;}
.education .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.education .right_content h2{font-size:18px; line-height:28px; color:#000; margin:20px 10px 0 44px;}
.education .right_content h2 span{margin:0 0 0 100px;}
.education .right_content p{font-size:22px; line-height: 22px; color:#7e7e7e; margin:20px 10px 0 44px;}




.edu_content .edu_content_lft{width:15%; float:left;}
.edu_content .edu_content_lft .year_from{font-size:12px; color:#00c1ea; margin:9px 0 5px 40px;}
.edu_content .edu_content_lft .year_to{font-size:12px; color:#00c1ea; margin:0px 0 10px 40px;}

.edu_content .edu_content_rit{width:80%; float:right; padding:0 0 0px 0;}
.edu_content .edu_content_rit h2{width: 45%; float: left; font-size: 12px;  color: #5b5a5a; margin: 7px 0px 0 44px; line-height: 16px; font-weight: bold; text-transform: uppercase;}
.edu_content .edu_content_rit h3{width: 45%; float: left; font-size: 12px;  color: #5b5a5a; margin: 7px 0px 0 0px;  line-height: 16px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}
.edu_content .edu_content_rit p{font-size:13px;  color:#7e7e7e; margin:0px 10px 0 44px; clear: both; line-height: 26px;}



/*********************************************** skills **********************************************************/

.skills{padding:20px 0 0px 0;}
.skills .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#26cef2; display:block;}
.skills .left_content .left_icon{ /*width:180px;*/ height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/skills.png) no-repeat scroll 83% 60%;}
.skills .right_content{width:80%; float:right;}
.skills .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.skills .right_content p{font-size:12px; line-height: 20px;text-align:justify; color:#5b5a5a; font-weight:bold; margin:0px 10px 15px 0px;}

.skills .right_content .main_skills{float:left; width:91%; margin:0px 0px 20px 44px; }

.skills .right_content .main_skills  .mskill div{}

.skills .right_content .main_skills  .mskill div .fskill{ width:240px;   font-size:14px; font-weight:normal; float:left; display: inline; background:url(<?=$baseurl?>assets/img/Templates/bull1.gif) no-repeat scroll 0% 50%; padding:0px 0 0px 20px;  margin: 15px 0 0 0;}

.skills .right_content .main_skills  .mskill div .level{width:295px;  font-size:14px; display: inline; float:right; font-weight:normal; text-align:right; padding:0px 0 0px 0px; margin:15px 0 0 0;}

.skills .right_content .main_skills .mskill div .level p{ display:inline;  width:100px; margin:0;}




.skills .right_content .other_skills {float:left; width:80%; margin:15px 0px 20px 44px;}





.skills .right_content .other_skills  .mskill div .sskill{ width:223px;font-size:14px; font-weight:normal; float:left; display: inline; background:url(<?=$baseurl?>assets/img/Templates/bull1.gif) no-repeat scroll 0% 50%; padding:0px 0 0px 20px;}

.skills .right_content .other_skills  .mskill div .slevel{width:260px;  font-size:14px; display: inline; float:right; font-weight:normal; text-align:right; padding:0px 0 0px 20px;}




.skills .right_content .skill_content{font-size:14px; line-height: 20px; text-align:left; color:#7e7e7e; margin:0px 18px 0 44px; font-weight:normal; clear:both;}




.pbar{ width: 260px; height: 20px; }



.pbar_inner{ 
 width: 60%;  height: 6px;  margin-top: 6px; float: left; 
 background-color: #dbdbdb; border:solid 1px #bebebe; }

.pbar_fill{
 width: 40%; height: 100%; margin-top: -1px;
 background-color: #069fcf; border:solid 1px #089cca;}

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


/*********************************************** interest ***********************************************************/
.interest{padding:18px 0 0px 0;}

.interest .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#dc3c39; display:block;}
.interest .left_content .left_icon{ /*width:180px; */height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/interest.png) no-repeat scroll 83% 60%;}



.interest .right_content{width:80%; float:right;}
.interest .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.interest .right_content h2{font-size:18px; line-height:28px; color:#000; margin:20px 10px 0 44px;}
.interest .right_content h2 span{margin:0 0 0 100px;}
.interest .right_content p{font-size:22px; line-height: 22px; color:#7e7e7e; margin:20px 10px 0 44px;}




.interest .interest_content_lft{width:15%; float:left;}
/*.interest .interest_content_lft .year_from{font-size:14px; color:#00c1ea; margin:28px 0 10px 40px;}
.interest .interest_content_lft .year_to{font-size:14px; color:#00c1ea; margin:0px 0 10px 40px;}*/

.interest .interest_content_rit{width:80%; float:right; padding:0 0 0px 0;}
.interest .interest_content_rit h2{width: 45%; float: left; font-size: 12px; line-height: 16px; color: #5b5a5a; margin: 6px 0px 5px 44px; font-weight: bold; text-transform: uppercase;}
.interest .interest_content_rit h3{width: 45%; float: left; font-size: 12px; line-height: 16px; color: #5b5a5a; margin: 6px 0px 5px 0px;  font-weight: bold; text-transform: uppercase; padding:0 0 0 0; text-align: right;}
.interest .interest_content_rit p{font-size:14px; line-height: 20px;text-align:left; color:#7e7e7e; margin:5px 10px 7px 44px; clear: both; }


/*********************************************** other_details **********************************************************/

.other_details{padding:23px 0 20px 0;}
.other_details .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#fa5e5b; display:block;}
.other_details .left_content .left_icon{ /*width:180px;*/ height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/other_details.png) no-repeat scroll 83% 60%;}
.other_details .right_content{width:80%; float:right;}
.other_details .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.other_details .right_content p{font-size:14px; line-height:20px; color:#7e7e7e; margin:0px 10px 0px 44px;}




/*********************************************** address **********************************************************/

.address{padding:29px 0 0px 0;}
.address .left_content{width:15%; float:left; height:42px; border-radius:0 30px 30px 0; background-color:#fa5e5b; display:block;}
.address .left_content .left_icon{ /*width:180px;*/ height:42px; border-radius:0 30px 30px 0; background:url(<?=$baseurl?>assets/img/Templates/addr.png) no-repeat scroll 83% 60%;}
.address .right_content{width:80%; float:right;}
.address .right_content h1{font-size:15px; font-weight:bold; padding:15px 0 8px 0; color:#7e7e7e; text-transform:uppercase;}
.address .right_content p{font-size:14px; line-height: 20px;text-align:justify; color:#7e7e7e; margin:0px 20px 0 44px;}



.address .right_content .addr{ background:url(<?=$baseurl?>assets/img/Templates/home.png) no-repeat scroll 0% 0%; padding:0 0 5px 30px;}
.address .right_content .skypee{ background:url(<?=$baseurl?>assets/img/Templates/skype.png) no-repeat scroll 0% 0%; padding:0 0 5px 30px;}
.address .right_content .linkedin{ background:url(<?=$baseurl?>assets/img/Templates/linkedin.png) no-repeat scroll 0% 0%; padding:0 0 5px 30px;}
.address .right_content .twitter{ background:url(<?=$baseurl?>assets/img/Templates/twitter.png) no-repeat scroll 0% 0%; padding:0 0 5px 30px;}
.address .right_content .faceebook{ background:url(<?=$baseurl?>assets/img/Templates/facebook.png) no-repeat scroll 0% 0%; padding:0 0 5px 30px;}
.address .right_content .myurl{ background:url(<?=$baseurl?>assets/img/Templates/url.png) no-repeat scroll 0% 0%; padding:0 0 5px 30px;}



