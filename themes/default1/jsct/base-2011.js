window.pageConfig=window.pageConfig||{};pageConfig.wideVersion=(function(){return(screen.width>=1210);})();if(pageConfig.wideVersion){document.getElementsByTagName("body")[0].className="root61";}pageConfig.FN_GetUrl=function(a,b){if(typeof a=="string"){return a;}else{return pageConfig.FN_GetDomain(a)+b+".html";}};pageConfig.FN_StringFormat=function(){var e=arguments[0],f=arguments.length;if(f>0){for(var d=0;d<f;d++){e=e.replace(new RegExp("\\{"+d+"\\}","g"),arguments[d+1]);}}return e;};pageConfig.FN_GetDomain=function(b,c){var a="";switch(b){case 1:a=this.FN_StringFormat(a,"www","product/");break;case 2:a=this.FN_StringFormat(a,"book","");break;case 3:a=this.FN_StringFormat(a,"mvd","");break;default:break;}return a;};pageConfig.FN_GetImageDomain=function(d){var c,d=String(d);switch(d.match(/(\d)$/)[1]%5){case 0:c=10;break;case 1:c=11;break;case 2:c=12;break;case 3:c=13;break;case 4:c=14;break;default:c=10;}return"".replace("{0}",c);};pageConfig.FN_ImgError=function(b){var c=b.getElementsByTagName("img");for(var a=0;a<c.length;a++){c[a].onerror=function(){var d="",e=this.getAttribute("dataimg");this.src="/themes/360buy/images/misc/lib/img/e/blank.gif";this.className=d;};}};window["\x64\x6f\x63\x75\x6d\x65\x6e\x74"]["\x77\x72\x69\x74\x65"]("\x3c\x6c\x69\x6e\x6b \x68\x72\x65\x66\x3d\x27\x2f\x74\x68\x65\x6d\x65\x73\x2f\x33\x36\x30\x62\x75\x79\x2f\x69\x6d\x61\x67\x65\x73\x2f\x6d\x69\x73\x63\x2f\x6c\x69\x62\x2f\x73\x6b\x69\x6e\x2f\x32\x30\x31\x32\x2f\x62\x61\x73\x65\x2e\x63\x73\x73\x27 \x72\x65\x6c\x3d\x27\x73\x74\x79\x6c\x65\x73\x68\x65\x65\x74\x27 \x74\x79\x70\x65\x3d\x27\x74\x65\x78\x74\/\x63\x73\x73\x27\/\x3e");pageConfig.FN_SetPromotion=function(b){if(b==0){return;}var e="限量,清仓,首发,满减,满赠,直降,新品,独家,人气,热卖",d=e.split(",")[parseInt(b)-1],c="<b class='pi{0}'>{1}</b>";switch(d.length){case 1:c=c.replace("{0}"," pix1 pif1");break;case 2:c=c.replace("{0}"," pix1");break;case 4:c=c.replace("{0}"," pix1 pif4");break;}return c.replace("{1}",d);};pageConfig.FN_GetRandomData=function(c){var b=0,f=0,a,e=[];for(var d=0;d<c.length;d++){a=c[d].weight?parseInt(c[d].weight):1;e[d]=[];e[d].push(b);b+=a;e[d].push(b);}f=Math.ceil(b*Math.random());for(var d=0;d<e.length;d++){if(f>e[d][0]&&f<=e[d][1]){return c[d];}}};pageConfig.FN_GetCompatibleData=function(b){var a=(screen.width<1210);if(a){b.width=b.widthB;b.height=b.heightB;b.src=b.srcB;}return b;};pageConfig.FN_InitSlider=function(e,g){var d=function(o,n){return o.group-n.group;};g.sort(d);var j=g[0].data,h=[],b=(j.length==3)?"style2":"style1",k=(screen.width<1210),l,c,m,a;h.push('<div class="slide-itemswrap"><ul class="slide-items"><li class="');h.push(b);h.push('" data-tag="');h.push(g[0].aid);h.push('">');for(var f=0;f<j.length;f++){l=j[f];c=k?l.widthB:l.width;m=k?l.heightB:l.height;a=k?l.srcB:l.src;h.push('<div class="fore');h.push(f+1);h.push('"><a target="_blank" href="');h.push(l.href);h.push('"><img dataimg="2" src="');h.push(a);h.push('" width="');h.push(c);h.push('" height="');h.push(m);h.push('" alt="');h.push(l.alt);h.push('" /></a></div>');}h.push('</li></ul></div><div class="slide-controls"><span class="curr">1</span></div>');document.getElementById(e).innerHTML=h.join("");};function login(){location.href="https://passport.360buy.com/new/login.aspx?ReturnUrl="+escape(location.href);return false;}function regist(){location.href="https://passport.360buy.com/new/registpersonal.aspx?ReturnUrl="+escape(location.href);return false;}function createCookie(c,d,f,e){var e=(e)?e:"/";if(f){var b=new Date();b.setTime(b.getTime()+(f*24*60*60*1000));var a="; expires="+b.toGMTString();}else{var a="";}document.cookie=c+"="+d+a+"; path="+e;}function readCookie(b){var e=b+"=";var a=document.cookie.split(";");for(var d=0;d<a.length;d++){var f=a[d];while(f.charAt(0)==" "){f=f.substring(1,f.length);}if(f.indexOf(e)==0){return f.substring(e.length,f.length);}}return null;}function addToFavorite(){var d="images/360buy/";var c="京东商城-网购上京东，省钱又放心";if(document.all){window.external.AddFavorite(d,c);}else{if(window.sidebar){window.sidebar.addPanel(c,d,"");}else{alert("对不起，您的浏览器不支持此操作!\n请您使用菜单栏或Ctrl+D收藏本站。");}}}function search(c){var d="";var b=search.cid;var f="";if("string"==typeof(b)&&""!=b){f+="&cid="+b;}var a=document.getElementById(c);var g=a.value;g=g.replace(/^\s*(.*?)\s*$/,"$1");if(g.length>38){g=g.substring(0,38);}if(""==g){window.location.href=window.location.href;return;}var e=0;if("undefined"!=typeof(window.pageConfig)&&"undefined"!=typeof(window.pageConfig.searchType)){e=window.pageConfig.searchType;}switch(e){case 0:break;case 1:f+="&book=y";break;case 2:f+="&mvd=music";break;case 3:f+="&mvd=movie";break;case 4:f+="&mvd=education";break;case 5:g=encodeURIComponent(g);d="";break;default:break;}g=g.replace(/#/g,"%23").replace(/\+/g,"%2b");d=d.replace(/\{keyword}/,g);d=d.replace(/\{additional}/,f);if("undefined"==typeof(search.isSubmitted)||false==search.isSubmitted){setTimeout(function(){window.location.href=d;},10);search.isSubmitted=true;}}(function(a){a.extend(a.browser,{client:function(){return{width:document.documentElement.clientWidth,height:document.documentElement.clientHeight,bodyWidth:document.body.clientWidth,bodyHeight:document.body.clientHeight};},scroll:function(){return{width:document.documentElement.scrollWidth,height:document.documentElement.scrollHeight,bodyWidth:document.body.scrollWidth,bodyHeight:document.body.scrollHeight,left:document.documentElement.scrollLeft+document.body.scrollLeft,top:document.documentElement.scrollTop+document.body.scrollTop};},screen:function(){return{width:window.screen.width,height:window.screen.height};},isIE6:a.browser.msie&&a.browser.version==6,isMinW:function(b){return Math.min(a.browser.client().bodyWidth,a.browser.client().width)<=b;},isMinH:function(b){return a.browser.client().height<=b;}});})(jQuery);(function(a){a.fn.hoverForIE6=function(c){var b=a.extend({current:"hover",delay:10},c||{});a.each(this,function(){var f=null,e=null,d=false;a(this).bind("mouseover",function(){if(d){clearTimeout(e);}else{var g=a(this);f=setTimeout(function(){g.addClass(b.current);d=true;},b.delay);}}).bind("mouseout",function(){if(d){var g=a(this);e=setTimeout(function(){g.removeClass(b.current);d=false;},b.delay);}else{clearTimeout(f);}});});};})(jQuery);(function($){$.extend({_jsonp:{scripts:{},counter:1,charset:"gb2312",head:document.getElementsByTagName("head")[0],name:function(callback){var name="_jsonp_"+(new Date).getTime()+"_"+this.counter;this.counter++;var cb=function(json){eval("delete "+name);callback(json);$._jsonp.head.removeChild($._jsonp.scripts[name]);delete $._jsonp.scripts[name];};eval(name+" = cb");return name;},load:function(url,name){var script=document.createElement("script");script.type="text/javascript";script.charset=this.charset;script.src=url;this.head.appendChild(script);this.scripts[name]=script;}},getJSONP:function(url,callback){var name=$._jsonp.name(callback);var url=url.replace(/{callback};/,name);$._jsonp.load(url,name);return this;}});})(jQuery);(function(b){b.fn.jdTab=function(r,m){if(typeof r=="function"){m=r;r={};}var a=b.extend({type:"static",auto:false,source:"data",event:"mouseover",currClass:"curr",tab:".tab",content:".tabcon",itemTag:"li",stay:5000,delay:100,mainTimer:null,subTimer:null,index:0},r||{});var p=b(this).find(a.tab).eq(0).find(a.itemTag),t=b(this).find(a.content);if(p.length!=t.length){return false;}var s=a.source.toLowerCase().match(/http:\/\/|\d|\.aspx|\.ascx|\.asp|\.php|\.html\.htm|.shtml|.js|\W/g);var l=function(c,d){a.subTimer=setTimeout(function(){q();if(d){a.index++;if(a.index==p.length){a.index=0;}}else{a.index=c;}a.type=(p.eq(a.index).attr(a.source)!=null)?"dynamic":"static";n();},a.delay);};var o=function(){a.mainTimer=setInterval(function(){l(a.index,true);},a.stay);};var n=function(){p.eq(a.index).addClass(a.currClass);switch(a.type){default:case"static":var c="";break;case"dynamic":var c=(s==null)?p.eq(a.index).attr(a.source):a.source;p.eq(a.index).removeAttr(a.source);break;}if(m){m(c,t.eq(a.index),a.index);}t.eq(a.index).show();};var q=function(){p.eq(a.index).removeClass(a.currClass);t.eq(a.index).hide();};p.each(function(c){b(this).bind(a.event,function(){clearTimeout(a.subTimer);clearInterval(a.mainTimer);l(c,false);return true;}).bind("mouseleave",function(){if(a.auto){o();}else{return;}});});if(a.type=="dynamic"){l(a.index,false);}if(a.auto){o();}};})(jQuery);(function(b){b.fn.jdSlide=function(u){var a=b.extend({width:null,height:null,pics:[],index:0,type:"num",current:"curr",delay1:100,delay2:5000},u||{});var w=this;var y,z,B,x=0,A=true,D=true;var r=a.pics.length;var q=function(){var c="<ul style='position:absolute;top:0;left:0;'><li><a href='"+a.pics[0].href+"' target='_blank'><img src='"+a.pics[0].src+"' width='"+a.width+"' height='"+a.height+"' /></a></li></ul>";w.css({position:"relative"}).html(c);b(function(){C();});};q();var v=function(){var d=[];d.push("<div>");var e;var f;for(var c=0;c<r;c++){e=(c==a.index)?a.current:"";switch(a.type){case"num":f=c+1;break;case"string":f=a.pics[c].alt;break;case"image":f="<img src='"+a.pics[c].breviary+"' />";default:break;}d.push("<span class='");d.push(e);d.push("'><a href='");d.push(a.pics[c].href);d.push("' target='_blank'>");d.push(f);d.push("</a></span>");}d.push("</div>");w.append(d.join(""));w.find("span").bind("mouseover",function(){D=false;clearTimeout(y);clearTimeout(B);var g=w.find("span").index(this);if(a.index==g){return;}else{B=setInterval(function(){if(A){t(g);}},a.delay1);}}).bind("mouseleave",function(){D=true;clearTimeout(y);clearTimeout(B);y=setTimeout(function(){t(a.index+1,true);},a.delay2);});};var t=function(c,d){if(c==r){c=0;}z=setTimeout(function(){w.find("span").eq(a.index).removeClass(a.current);w.find("span").eq(c).addClass(a.current);s(c,d);},20);};var s=function(d,h){var f=parseInt(x);var c=Math.abs(f+a.index*a.height);var e=Math.abs(d-a.index)*a.height;var g=Math.ceil((e-c)/4);if(c==e){clearTimeout(z);if(h){a.index++;if(a.index==r){a.index=0;}}else{a.index=d;}A=true;if(A&&D){clearTimeout(y);y=setTimeout(function(){t(a.index+1,true);},a.delay2);}}else{if(a.index<d){x=f-g;w.find("ul").css({top:x+"px"});}else{x=f+g;w.find("ul").css({top:x+"px"});}A=false;z=setTimeout(function(){s(d,h);},20);}};var C=function(){var d=[];for(var c=1;c<r;c++){d.push("<li><a href='");d.push(a.pics[c].href);d.push("' target='_blank'><img src='");d.push(a.pics[c].src);d.push("' width='");d.push(a.width);d.push("' height='");d.push(a.height);d.push("' /></a></li>");}w.find("ul").append(d.join(""));y=setTimeout(function(){t(a.index+1,true);},a.delay2);if(a.type){v();}};};})(jQuery);function getRandomDomain(d){var c,d=String(d);switch(d.match(/(\d)$/)[1]%5){case 0:c=10;break;case 1:c=11;break;case 2:c=12;break;case 3:c=13;break;case 4:c=14;break;default:c=10;}return"".replace("{0}",c);}if($.browser.isIE6){try{document.execCommand("BackgroundImageCache",false,true);}catch(err){}}function setWebBILinkCount(c){try{if(c.length>0){var b=document.createElement("script");b.type="text/javascript";b.src=""+c;document.getElementsByTagName("head")[0].appendChild(b);}}catch(a){}}var initScrollY=0;var proIDs=new Array();function compare(){if($("#compare").get(0)==null){$("body").prepend('<div id="compare" class="compare"><div class="mt"><h5>商品比较</h5><div class="extra" onclick="clearCompare()"></div></div><div class="comPro"><ul class="mc" id="comProlist"></ul><div class="mb"><input type="button" value="对比所选商品" class="btn" id="compareImg" onclick="openCompare()"></div></div></div>');$("#compare").css({position:"absolute",top:"160px",right:"0px",zIndex:"1"});isCoo();}if($.browser.msie){var a=document.documentElement.scrollTop;var b=0.3*(a-initScrollY);if(b>0){b=Math.ceil(b);}else{b=Math.floor(b);}$("#compare").get(0).style.top=parseInt($("#compare").get(0).style.top)+b+"px";initScrollY=initScrollY+b;setTimeout("compare()",50);}else{window.onscroll=function(){$("#compare").get(0).style.top=parseInt($("#compare").get(0).style.top)+"px";$("#compare").get(0).style.position="fixed";};}}function clearCompare(){$("#comProlist").empty();$("#compare").hide();createCookie("compare","");proIDs=new Array();}function addToCompare(d,b,a){$("#compare").show();$(".comPro").show();var c=proIDs.join(".");if(c.indexOf(b)==-1){if(proIDs.length<4){proIDs.push(b);$("#comProlist").append("<li id='check_"+b+"'><a title='删除' class='close' onclick='reduceCompare("+b+")'></a>"+a+"</li>");writeCompare(b,a);}else{alert("对不起，最多可以选择四种商品进行对比！");}}else{alert("对不起，您已经选择此商品！");return;}}function reduceCompare(d){$("#check_"+d).remove();$.each(proIDs,function(g,h){if(d==h){proIDs.splice(g,1);}});var a=readCookie("compare");var c=a.indexOf(d);var f=a.indexOf("|||",c)+3;var b=a.substring(c,f);var e=a.replace(b,"");createCookie("compare",e);if(proIDs.length==0){$(".comPro").hide();}}function openCompare(){switch(proIDs.length){case 1:alert("对不起，最少选择两种商品进行对比！");break;case 2:window.open("images/360buy/pcompare.aspx?s1="+proIDs[0]+"&s2="+proIDs[1]);break;case 3:window.open("images/360buy/pcompare.aspx?s1="+proIDs[0]+"&s2="+proIDs[1]+"&s3="+proIDs[2]);break;case 4:window.open("images/360buy/pcompare.aspx?s1="+proIDs[0]+"&s2="+proIDs[1]+"&s3="+proIDs[2]+"&s4="+proIDs[3]);break;default:alert("请选择2-4件商品进行对比！");return;}}function writeCompare(b,a){var c=readCookie("compare");if(c==null){c="";}c+=b+"||"+escape(a)+"|||";createCookie("compare",c);}function isCoo(){var a=readCookie("compare");if(a){var b=a.split("|||");var d="";for(var c=0;c<b.length-1;c++){d+="<li id='check_"+b[c].split("||")[0]+"'><a title='删除' class='close' onclick='reduceCompare("+b[c].split("||")[0]+")'></a>"+unescape(b[c].split("||")[1])+"</li>";proIDs.push(b[c].split("||")[0]);}$("#comProlist").html(d);$("#compare").show();$(".comPro").show();}}function asyncScript(A,B){if(typeof A=="function"){var B=A,A=null;}if(A){if(typeof A!="string"){return;}var x=document.createElement("script");x.type="text/javascript";x.async=true;x.src=A;var s=document.getElementsByTagName("head")[0];s.appendChild(x);if(B){if(typeof B!="function"){return;}if(!/*@cc_on!@*/0){x.onload=function(){B();};}else{x.onreadystatechange=function(){if(x.readyState=="loaded"||x.readyState=="complete"){B();}};}}}else{if(!B){return;}setTimeout(function(){B();},0);}}var pannel={};pannel.gotop={settings:{element:null,target:"#header"},init:function(b,d){var c=this;$.extend(this.settings,b||{});if(d){d();}var a=function(){if(screen.width>=1280){c.render(0);}else{c.render(1);}};a();$(window).bind("scroll",function(){a();}).bind("resize",function(){a();});},render:function(b){var d=$(this.settings.element),g=$(this.settings.target);var f,c,e=$.browser.scroll().top+$.browser.client().height-d.height()-10+"px";switch(b){case 0:c=(g.width()>=1200)?1200:980;f=g.offset().left+c+"px";if($.browser.isIE6){d.css({left:f,top:e});}else{d.css({left:f,bottom:"0"});}break;case 1:if($.browser.isIE6){d.css({right:"0",top:e});}else{d.css({right:"0",bottom:"0"});}break;}}};function getRandomObj(c,f){var b=0;for(var e=0;e<c.length;e++){b+=f[e]||1;if(!f[e]){f.push(1);}}var h=Math.ceil(Math.random()*b),g=[],a=[];for(var e=1;e<b+1;e++){g.push(e);}for(var e=0;e<c.length;e++){a[e]=g.slice(0,f[e]);g.splice(0,f[e]);}for(var e=0;e<a.length;e++){for(var d=0;d<a[e].length;d++){if(h==a[e][d]){return c[e];}}}}function setRandomAds(a,d,g,b){var f=getRandomObj(a,d),e=document.getElementById(g),c;if(!f){return;}if(b&&screen.width>=1280){f.width=f.width2;f.url=f.url2;}else{f.width=f.width;f.url=f.url;}c="<a href='"+f.link+"' target='_blank'><img width='"+f.width+"' height='"+f.height+"' alt='"+f.alt+"' app='image:poster' src='"+f.url+"' /></a>";if(e){e.innerHTML=c;}}String.prototype.format=function(){var e=this,f=arguments.length;if(f>0){for(var d=0;d<f;d++){e=e.replace(new RegExp("\\{"+d+"\\}","g"),arguments[d]);}}return e;};function sBuilder(){this.strings=new Array();this.length=0;this.append=function(b){this.strings.push(b);this.length+=b.length;};this.toString=function(h,g,e){var h=h?h:"",f=this.strings.join(h);if(g&&e){f=f.substr(g,e);}return f;};}var loguri="";callback1=function(a){};log=function(l,h,o,n,m,j,g,f,e,d,c,b){var k="";for(i=2;i<arguments.length;i++){k=k+arguments[i]+"|||";}var a=loguri.replace(/\$type1\$/,escape(l));a=a.replace(/\$type2\$/,escape(h));a=a.replace(/\$data\$/,escape(k));a=a.replace(/\$pin\$/,escape(decodeURIComponent(readCookie("pin"))));a=a.replace(/\$referrer\$/,escape(document.referrer));$.getJSON(a,callback1);};mark=function(b,a){log(1,a,b);};


