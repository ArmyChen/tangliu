(function($){$.fn.qwhs=function(q){q=$.extend({srcs:"lazy",auto:1,showd:1,tim:4000},q||{});return this.each(function(){var boxs=$(this);var len=boxs.find("li").length;var index=0;var picTimer;var h_pre=boxs.find(".h_pre");var h_nxt=boxs.find(".h_nxt");var btn="<div class='btn'>";for(var i=0;i<len;i++){var k=i+1;btn+="<span>"+k+"</span>"}btn+="</div>";boxs.append(btn);var $spn=boxs.find(".btn span");$spn.mouseenter(function(){index=$(this).index();showPics(index)});init();function init(){showPics(index);if(q.auto==1){picTimer=setInterval(function(){index++;if(index>len-1){index=0}showPics(index)},q.tim)}}boxs.hover(function(){clearInterval(picTimer);h_pre.fadeIn(200);h_nxt.fadeIn(200)},function(){h_pre.hide();h_nxt.hide();if(q.auto==1){picTimer=setInterval(function(){index++;if(index>len-1){index=0}showPics(index)},q.tim)}});h_pre.click(function(){index--;if(index<0){index=len-1}showPics(index)});h_nxt.click(function(){index++;if(index>len-1){index=0}showPics(index)});function showPics(index){var k=boxs.find("li").eq(index);var m=k.attr("lazy");if(m){k.css("background-image","url("+m+")").removeAttr("lazy")}k.stop(true,true).fadeIn(600).siblings("li").fadeOut(600);$spn.removeClass("on").eq(index).addClass("on")}})}})(jQuery);

(function($){$.fn.qwthreed=function(q){q=$.extend({auto:1,sw:378,bw:530},q||{});return this.each(function(){var boxs=$(this);var li=boxs.children();var cul=li.eq(0).find("ul");var cum=li.eq(1).find("ul");var cur=li.eq(2).find("ul");var slen=cum.children().length;var len=slen-2;var il=1;var im=2;var ir=3;var isa=false;var sliw=q.sw*slen;var bliw=q.bw*slen;var lx=boxs.find(".fo_l");var rx=boxs.find(".fo_r");function fint(){cul.css({"width":sliw,"left":-q.bw});cum.css({"width":bliw,"left":-q.bw*im});cur.css({"width":sliw,"left":-q.sw*ir})}fint();
boxs.hover(function(){boxs.addClass("fo_on");},function(){boxs.removeClass("fo_on");});
lx.click(function(){if(isa){return}il--;im--;ir--;showPics(il,0);showPics(im,1);showPics(ir,2)});rx.click(function(){if(isa){return}il++;im++;ir++;showPics(il,0);showPics(im,1);showPics(ir,2)});function showPics(index,id){isa=true;if(id==0){cul.stop(true,true).animate({"left":-index*q.sw},500,function(){if(index>=len+1){cul.css("left",-q.sw);il=1}if(index==0){cul.css("left",-q.sw*len);il=len}})}if(id==1){cum.stop(true,true).animate({"left":-index*q.bw},500,function(){if(index>=len+1){cum.css("left",-q.bw);im=1}if(index==0){cum.css("left",-q.bw*len);im=len}isa=false})}if(id==2){cur.stop(true,true).animate({"left":-index*q.sw},500,function(){if(index>=len+1){cur.css("left",-q.sw);ir=1}if(index==0){cur.css("left",-q.sw*len);ir=len}})}}})}})(jQuery);
$("#focus").qwhs();
$("#dfocus").qwthreed();
$(function(){
var nav_f=$("#f_nav");
var gtop=$("#gotop");
var nav_top=nav_f.offset().top;
var has_nav=false;
nav_f.delegate("a","click",function(event){
	var f=$(this).attr("href");
	var j=$(f).offset().top;
	$("body,html").stop().animate({scrollTop:j},300);
	event.preventDefault();
});
$(window).scroll(function(){
var ns_top=$(window).scrollTop()-200;
if(ns_top>nav_top){
if(!has_nav){
	nav_f.addClass("fix_ztnav");
	gtop.stop().fadeIn(200);
	has_nav=true;
	}
}else{
	if(has_nav){
	nav_f.removeClass("fix_ztnav");
	gtop.stop().hide();
	has_nav=false;
	}
}
});
gtop.click(function(event){
	      $("body,html").stop().animate({scrollTop: 0},300);
			event.preventDefault();
	});

});