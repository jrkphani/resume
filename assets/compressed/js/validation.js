function validate(H,A,E,J,B,G,F){E=(E===undefined)?false:E;J=(J===undefined)?false:J;B=(B===undefined)?false:B;G=(G===undefined)?false:G;F=(F===undefined)?false:F;var D=document.getElementById(A).value.trim();if(!D&&E==true){var C=H+" cannot be empty.";if(!F){alert(C)}else{document.getElementById(F).innerHTML=C}document.getElementById(A).focus();return false}if(J){if(D.length>J){var C=H+" is too long.";if(!F){alert(C)}else{document.getElementById(F).innerHTML=C}document.getElementById(A).focus();return false}}if(B){if(D.length<B){var C=H+" required minimum "+B+" character length.";if(!F){alert(C)}else{document.getElementById(F).innerHTML=C}document.getElementById(A).focus();return false}}if(G=="string"&&D){var I=/^[a-zA-Z ]+$/;if(!D.match(I)){var C=H+" can contain letters and space only.";if(!F){alert(C)}else{document.getElementById(F).innerHTML=C}document.getElementById(A).focus();return false}}else{if(G=="number"&&D){var I=/^[0-9]+$/;if(!D.match(I)){var C=H+" can be a number only.";if(!F){alert(C)}else{document.getElementById(F).innerHTML=C}document.getElementById(A).focus();return false}}else{if(G=="email"&&D){var I=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;if(!D.match(I)){var C=H+" is invalid.";if(!F){alert(C)}else{document.getElementById(F).innerHTML=C}document.getElementById(A).focus();return false}}else{if(G=="mobile"&&D){var I=/^[0-9 \-\+]+$/;if(!D.match(I)){var C=H+" cannot contain alphabets or special characters only.";if(!F){alert(C)}else{document.getElementById(F).innerHTML=C}document.getElementById(A).focus();return false}}}}}return true}function same(G,E,C,B,D){var A=document.getElementById(C).value.trim();var H=document.getElementById(B).value.trim();D=(D===undefined)?false:D;if(A!=H){var F=G+" and "+E+" are missmatched.";if(!D){alert(F)}else{document.getElementById(D).innerHTML=F}return false}else{return true}};