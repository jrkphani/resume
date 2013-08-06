<?php header("Content-type: text/css"); 
$baseurl=base_url();
?>
@charset "utf-8";
/********************************************************** CSS reset  *******************************************************************/


html, body, div, span, applet, object, iframe,h1, h2, h3, h4, h5, h6, p, blockquote, pre,a, abbr, acronym, address, big, cite, code,del, dfn, em, img, ins, kbd, q, s, samp,small, strike, strong, sub, sup, tt, var,b, u, i, center,dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,table, caption, tbody, tfoot, thead, tr, th, td,article, aside, canvas, details, embed, figure, figcaption, footer, header, hgroup, menu, nav, output, ruby, section, summary,time, mark, audio, video 
{	margin: 0;	padding: 0;	border: 0;	font-size: 100%;	font: inherit;	vertical-align: baseline;}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, footer, header, hgroup, menu, nav, section {	display: block;}
body {	line-height: 1;}
ol, ul {	list-style: none;}
blockquote, q {	quotes: none;}
blockquote:before, blockquote:after,q:before, q:after {	content: '';	content: none;}
table {	border-collapse: collapse;	border-spacing: 0;}

/******************************************************* font ************************************************************************/


/*************************************************************  global  ******** background-color:green;********* background-color:pink;**********background-color:orange;***********background-color:yellow;**********************************/

body p,b,h1,h2,h3,h4,span{font-family:Arial, Helvetica, sans-serif; }
body h1,h2,h3,h4,{font-weight:normal;}
.clearall{clear:both;}
.wrapper {width:100%;}

.left{float:left; width:8%; display: block; margin: 0 15px 0 40px;  text-align:right;}
.right{float:right; width:76%;display: block; margin: 0 40px 0 10px; }

.left1_center1{float:left; width:66%;  margin: 0 0px 0px; padding:5px 0 0 0;}

.left1{float:left; width:15%; display: block; margin: 0 15px 0 40px;  text-align:right;  clear:both;}

.center1{float:right; width:68%;  padding:0px 15px 0 0px; }

.right1{float:right; width:30%;   padding:5px 15px 0 0; }


.styles{font-size:12px; padding:0px 0 10px 0; color:#4e4e4e;}
.italics{font-style:italic; color:#626060;}

.styles2{font-size:13px; padding:0px 0 10px 0; color:#3f3f3f; line-height:16px;}
.italics2{font-size:14px; font-style:italic; color:#626060;}

.right1 h1{border-bottom:1px solid #626060; font-weight:bold; font-size:16px;}

/*************************************************************  header  *********************************************************background-color:red;***************/

.wrapper .header{padding:40px 0 0 0;}
  
.wrapper .header .left .logo{width:189px; height:45px; float:right; background:url(<?=$baseurl?>assets/img/Templates/t10_logo1.jpg) no-repeat 94% 0%; margin:31px 0 0 100px; background-color:#0b9bd0; display:none;}

.wrapper .header .right h1{font-size:17px; line-height:28px; color:#0b9bd0; padding:28px 0 0 0; font-weight:bold; }
.wrapper .header .right h2{font-size:15px; line-height:30px; color:#626060; font-weight:bold;  padding:0 0 20px 0;}


/*************************************************************  objective  ***********************************************************************************************/

.wrapper .objective{padding:10px 0 0 0; }


/*************************************************************  summary  ***********************************************************************************************/

.wrapper .summary{padding:10px 0 0 0;}


/*************************************************************  experience  ***********************************************************************************************/

/* .wrapper .left1_center1 .exp_yers{} */
.wrapper .center1{color:#3f3f3f;}
.wrapper .right1{}

.exp_yers h1{border-bottom:1px solid #626060; font-weight:bold; font-size:16px;}

.left1_center1 .exp_yers h4{font-size:13px; padding:10px 0 0 0;}
.left1_center1 .exp_yers h4 p{line-height:24px;}
.left1_center1 .exp_yers h2{width:50%; float:left; font-size:12px; padding:7px 0 0 0; color:#0b9bd0; font-weight:bold; font-style:italic;}
.left1_center1 .exp_yers h3{width:50%; float:left; font-size:12px; padding:7px 0 0 0; text-align:right; color:#0b9bd0; font-weight:bold; font-style:italic;}
.left1_center1 .exp_yers h2 span{color:#3f3f3f; }
.left1_center1 .exp_yers h3 span{color:#3f3f3f; }
.left1_center1 .exp_container{padding:5px 0px 0 0px;}

.center1 .company_name{padding:10px 0 0 0; font-weight:bold; font-size:14px;}
.center1 .disig{padding:7px 0 10px 0; color:#0b9bd0; font-size:14px;}
.years{margin:11px 0 0 0;}


/*************************************************************  skills  ***********************************************************************************************/
.margin_align{margin:0 0 20px 0;}
.skill1_container{padding:15px 0 0 0px;}
.skill1_container #skill1{/*width:72%;*/ }
.skill1_container #skill_level{width:95%;  text-align:right; padding:0px; margin:0 0 5px 0;} 
.skill1_container .bullet{padding:0 0 0 20px; line-height:20px; background:url(<?=$baseurl?>assets/img/Templates/t10_bul.jpg) no-repeat 0% 45%;}
.skill1_container .descp{padding:10 0 15px 0px;}

.skill1_container .bullet1{padding-left: 20px; line-height:15px; background:url(<?=$baseurl?>assets/img/Templates/t10_bul.jpg) no-repeat 0% 19%;}
.skill1_container .bullet1 b{font-weight:bold;}

.skill1_container .bullet2{padding: 0px 0 8px 20px; line-height: 15px; background: url(http://localhost/resume/assets/img/Templates/t10_bul.jpg) no-repeat 0px 5px;}
.pbar{ }

.pbar_inner{ 
 width: 60%;  height: 6px;  margin-top: 2px; float: left; 
 background-color: #dbdbdb; border:solid 1px #bebebe; }

.pbar_fill{
 width: 40%; height: 100%; margin-top: -1px;
 background-color: #069fcf; border:solid 1px #089cca;}

.pbar p{
 width: 100px;  display: inline; 
 margin-left: 10px;  text-transform: capitalize;}

.pbar1{ width: 12.5% !important;}
.pbar2{ width: 25% !important;}
.pbar3{ width: 37.5% !important;}
.pbar4{ width: 50% !important;}
.pbar5{ width: 62.5% !important;}
.pbar6{ width: 75% !important;}
.pbar7{ width: 87.5% !important;}
.pbar8{ width: 100% !important;}

/*************************************************************  project  ***********************************************************************************************/

.center1 .pro_descrip{padding:0px 0 8px 0; color:#0b9bd0; font-size:14px;}





/*************************************************************  recommand  ***********************************************************************************************/

.center1 .rnumber{font-size: 13px;padding: 0px 0 0px 0;color: #3f3f3f;line-height: 22px;}
.center1 .rid{font-size: 13px;padding: 0px 0 12px 0;color: #3f3f3f;}

/*************************************************************  reference  ***********************************************************************************************/

.center1 .awd_desc{padding:5px 0 7px 0;}


/*************************************************************  other details  ***********************************************************************************************/

.center1 .other_dets {font-size: 11px;padding: 0px 0 0px 0;color: #3f3f3f;line-height: 22px;}
.center1 .other_dets strong{font-weight:bold;}
.center1 .other_dets i{font-style:italic;}