﻿function trace_main(g,e){var j="KLGPortal";var f="";var h=getCookie("traceguid");if(h==""||h==null){h=Guid.NewGuid();setCookie("traceguid",h)}var h=getCookie("traceguid");if(h!=""&&h!=null){var i="webportal"+h;if(typeof(WEB_CUST_NO)=="undefined"){var k=""}else{var k=WEB_CUST_NO}setCookie("tracecustno",k);var m=String(Math.round(new Date().getTime()/1000));var c=g;var l=e;var d=getCookie("cpsid");var b=window.location.href.replace(/&/g,";amp;");var a="https://trace.happigo.com/pv.gif";$.ajax({type:"GET",async:false,timeout:1000,jsonp:"callbackparam",jsonpCallback:"success",dataType:"jsonp",url:a,data:{"a":j,"ver":f,"vid":i,"mid":k,"t":m,"p":c,"v":l,"hmsc":d,"url":b},success:function(n){},error:function(n){},complete:function(o,n){if(n=="timeout"){}}})}}function tracesearch(c){var b="KLGPortal";var a=getCookie("traceguid");if(a==""||a==null){a=Guid.NewGuid();setCookie("traceguid",a)}else{a=getCookie("traceguid")}var e="webportal"+a;if(typeof(WEB_CUST_NO)=="undefined"){var g=""}else{var g=WEB_CUST_NO}var f=c;var d="https://trace.happigo.com/search.gif";$.ajax({type:"GET",async:false,timeout:1000,jsonp:"callbackparam",jsonpCallback:"success",dataType:"jsonp",url:d,data:{"a":b,"vid":e,"mid":g,"skw":f},success:function(h){},error:function(h){},complete:function(i,h){if(h=="timeout"){}}})}function tracecart(f,e){var j="KLGPortal";var h=getCookie("traceguid");if(h==""||h==null){h=Guid.NewGuid();setCookie("traceguid",h)}else{h=getCookie("traceguid")}var i="webportal"+h;if(typeof(WEB_CUST_NO)=="undefined"){var k=""}else{var k=WEB_CUST_NO}var g=f;var d=e;if(d>0){var c="good"}else{var c="goodDetail"}var a="https://trace.happigo.com/sc.gif";var b=window.location.href.replace(/&/g,";amp;");$.ajax({type:"GET",async:false,timeout:1000,jsonp:"callbackparam",jsonpCallback:"success",dataType:"jsonp",url:a,data:{"a":j,"vid":i,"mid":k,"scgid":g,"scgq":d,"p":c,"url":b},success:function(l){},error:function(l){},complete:function(m,l){if(l=="timeout"){}}})}function htmlencode(a){a=a.replace(/&/g,"amp;");a=a.replace(/</g,"lt;");a=a.replace(/>/g,"gt;");a=a.replace(/(?:t| |v|r)*n/g,"<br />");a=a.replace(/  /g,"nbsp; ");a=a.replace(/t/g,"nbsp; nbsp; ");a=a.replace(/x22/g,"quot;");a=a.replace(/x27/g,"#39;");return a}function getCookie(b){var d=document.cookie;var e=d.split("; ");for(var c=0;c<e.length;c++){var a=e[c].split("=");if(a[0]==b){return a[1]}}return""}function setCookie(a,c){var b=99999;var d=new Date();d.setTime(d.getTime()+b*24*60*60*1000);document.cookie=a+"="+escape(c)+";domain=.happigo.com;expires="+d.toGMTString()+";path=/"}function getSur(a){var d=a.split("/");var e=new Array();if(d[2].split(".")[0]=="mall"){var b=new Object();b=GetRequest();e[0]=b["act"];e[1]=b["op"];if(e[0]==""&&e[1]==""&&d[0]!="undefined"&&d[0]!=null&&d[1]!="undefined"&&d[1]!=null){if(d[3]!=""){e[0]="mall_good";e[1]=d[3].split["_"][1].split["."][0]}else{e[0]="mall_home"}}}else{if(d[2].split(".")[0]=="zt"){e[0]="zt";e[1]=d[d.length-1].split(".")[0]}else{if(d[3]=="sc"){e[0]="activity";e[1]=d[4]}else{if(d[4]!=""&&d[4]!="undefined"&&d[4]!=null){if(d[4].indexOf("?")>0){e[0]=d[3]}else{e[0]=d[4]}}else{if(d[3]!=""&&d[4]!="undefined"&&d[4]!=null){e[0]=d[3]}else{e[0]="index"}}e[1]="";if(d[d.length-1]!=""&&d[d.length-1]!="undefined"&&d[d.length-1]!=null){var f=d[d.length-1].split(".")[0];if(!isNaN(f)){e[0]="good";var c=$(".goods_no").text().split("：")[1];e[1]=c.substring(1);if(e[1]=="undefined"){e[1]=""}}}}}}if(e[0].substr(0,1)=="?"){e[0]=d[3]}else{switch(e[0]){case"index":e[0]="home";break;case"home":e[0]="Member";break}}return e}function GetRequest(){var b=location.search;var a=new Object();if(b.indexOf("?")!=-1){var d=b.substr(1);strs=d.split("&");for(var c=0;c<strs.length;c++){a[strs[c].split("=")[0]]=(strs[c].split("=")[1])}}return a}function Guid(e){var a=new Array();if(typeof(e)=="string"){b(a,e)}else{d(a)}this.Equals=function(f){if(f&&f.IsGuid){return this.ToString()==f.ToString()}else{return false}};this.IsGuid=function(){};this.ToString=function(f){if(typeof(f)=="string"){if(f=="N"||f=="D"||f=="B"||f=="P"){return c(a,f)}else{return c(a,"D")}}else{return c(a,"D")}};function b(f,j){j=j.replace(/\{|\(|\)|\}|-/g,"");j=j.toLowerCase();if(j.length!=32||j.search(/[^0-9,a-f]/i)!=-1){d(f)}else{for(var h=0;h<j.length;h++){f.push(j[h])}}}function d(f){var g=32;while(g--){f.push("0")}}function c(f,g){switch(g){case"N":return f.toString().replace(/,/g,"");case"D":var h=f.slice(0,8)+"-"+f.slice(8,12)+"-"+f.slice(12,16)+"-"+f.slice(16,20)+"-"+f.slice(20,32);h=h.replace(/,/g,"");return h;case"B":var h=c(f,"D");h="{"+h+"}";return h;case"P":var h=c(f,"D");h="("+h+")";return h;default:return new Guid()}}}Guid.Empty=new Guid();Guid.NewGuid=function(){var b="";var a=32;while(a--){b+=Math.floor(Math.random()*16).toString(16)}return b};