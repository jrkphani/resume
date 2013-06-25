<?php
header("Content-type: text/css");
/*use base url to specify the full image path inside css
eg : <?=baseur?>assets/img/icon.png */  
$baseurl=base_url();
?>
 div,h1,h2,h3,h4,h5,h6,p,ul{	margin:0;	padding:0;}
div{padding-top: 10px; padding-bottom: 10px;}	

h2{font-size: 18px; color: #512a0b;}
h3{font-size: 16px; color: #512a0b;}
h4{font-size: 12px; color: #512a0b;}
p{font-size: 13px; padding-bottom: 10px;}


body { font-family: Georgia; color: #525252; background-color: #ffffff; font-size: 15px;}
.resume{ width: 210mm; background: #ffffff;}
.inner{padding-left: 0px; padding-right: 0px;}

.headerLeft{ width:470px; height: 140px; float: left; padding-left: 20px;}
.headerRight{width: 200px; float: right; text-align: right; padding-right: 20px;}

.photoBorder{ width: 80px; height: 80px; background: #ffffff;  float: left; display: block; text-align: center;
 	
 	box-shadow: 2px 2px 2px #888;
 	-moz-box-shadow: 2px 2px 2px #888;
	-webkit-box-shadow: 1px 1px 2px #888;
 }
.resumeHeader{	height: 140px; background-color: #edd4c0; border-top: solid 3px #512a0b; padding-top: 15px; padding-left: 20px;	}
.resumeFooter{	height: 40px; border-bottom: solid 3px #512a0b;	}
.resumeBody{ padding-left: 40px; padding-right: 40px; padding-top: 20px; border-top: solid 1px #e1e1e1;}
.userName{ width:250px; float: left; padding-left: 20px;  }
.address{ width: 400px; clear: both;  padding-top: 10px;}

.titleSection{ width:170px;  text-align: right;}

.subtitleSection{ width: 480px;  }
.subtitleSection h2{width: 200px; margin-top: -25px; }
.subtitleSection h4{width: 260px; padding-left:220px; margin-top: -25px; text-align: right;  }

.contentSection{width:500px; padding-left: 180px; margin-top: -50px;}
.contentSection2{width:500px; padding-left: 180px; margin-top: -50px; display: block; padding-bottom: 0px; margin-bottom: -20px;}
.contentSection3{width:500px; padding-left: 180px; margin-top: -50px; display: block; padding-bottom: 0px; margin-bottom: 10px;}

.mainTitle{border: solid 2px #512a0b; border-width: 1px 0 0 0; display: block; padding-bottom: 0px; margin-bottom: -5px;}

.height40{ height: 60px;}
.height200{height:200px;}
.blue{color: #23b9ff;}

li{font-size: 12px;}

ul{border: solid 1px #512a0b; border-width: 1px 0 0 0; padding-top: 10px; padding-left: 15px;}

.alignRight{text-align: right; padding-right: 20px; margin-top: -24px;}

.top10{ margin-top: -10px;}
.top5{margin-top:  -5px;}

.paddingA{
	padding-bottom: 10px;
	padding-top: -5px;
}

.paddingB{
	margin-bottom: 40px;
	margin-top: 20px;
}
