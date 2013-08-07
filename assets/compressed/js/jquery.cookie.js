/*
 * jQuery Cookie Plugin v1.3.1
 * https://github.com/carhartl/jquery-cookie
 *
 * Copyright 2013 Klaus Hartl
 * Released under the MIT license
 */
(function(A){if(typeof define==="function"&&define.amd){define(["jquery"],A)}else{A(jQuery)}}(function(E){var A=/\+/g;function D(G){return G}function B(G){return decodeURIComponent(G.replace(A," "))}function F(G){if(G.indexOf('"')===0){G=G.slice(1,-1).replace(/\\"/g,'"').replace(/\\\\/g,"\\")}try{return C.json?JSON.parse(G):G}catch(H){}}var C=E.cookie=function(N,M,R){if(M!==undefined){R=E.extend({},C.defaults,R);if(typeof R.expires==="number"){var O=R.expires,Q=R.expires=new Date();Q.setDate(Q.getDate()+O)}M=C.json?JSON.stringify(M):String(M);return(document.cookie=[C.raw?N:encodeURIComponent(N),"=",C.raw?M:encodeURIComponent(M),R.expires?"; expires="+R.expires.toUTCString():"",R.path?"; path="+R.path:"",R.domain?"; domain="+R.domain:"",R.secure?"; secure":""].join(""))}var G=C.raw?D:B;var P=document.cookie.split("; ");var S=N?undefined:{};for(var L=0,J=P.length;L<J;L++){var K=P[L].split("=");var H=G(K.shift());var I=G(K.join("="));if(N&&N===H){S=F(I);break}if(!N){S[H]=F(I)}}return S};C.defaults={};E.removeCookie=function(H,G){if(E.cookie(H)!==undefined){E.cookie(H,"",E.extend({},G,{expires:-1}));return true}return false}}));