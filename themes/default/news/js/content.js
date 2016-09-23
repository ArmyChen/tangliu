$(function() {
//达人专区
$(".zq-roll li").mouseenter(function(){$(".zq-roll li").removeClass("on");$(this).addClass("on")});
var muon=0;
var p=57;
var XRoll_btn_width=$(".zq-roll").width();
var migl=$(".zq-roll li").length;
$(".DR_zhuanqu .R-next").click(function(){
	if(XRoll_btn_width-10<=migl*p-muon-p){
		muon=muon+p;$(".zq-roll ul").animate({left:"-"+muon+"px"})
	}
});
$(".DR_zhuanqu .R-previ").click(function(){
	if(migl*p-muon+p<=migl*p){
		muon=muon-p;$(".zq-roll ul").animate({left:"-"+muon+"px"});
	}
});
	//情趣体验师招募
	var ty_index=$(".tys-roll dl").length;var ty_vusble=0;var shuzi=0;$(".tys-roll .T-piero").click(function(){$(".tys-roll dl").hide(0);shuzi=shuzi-1;if(shuzi<0){shuzi=ty_index-1}$(".tys-roll dl:eq("+shuzi+")").fadeIn(200)});	
	$(".tys-roll .T-next").click(function(){$(".tys-roll dl").hide(0);shuzi=shuzi+1;if(shuzi==ty_index){shuzi=0}$(".tys-roll dl:eq("+ty_vusble+shuzi+")").fadeIn(200)});
	setInterval('$(".tys-roll .T-next").click()',6000);
	
	$("#text-content").focus(function(){
		  $(this).val("");
	  });
					  
	
	/*//获取要定位元素距离浏览器顶部的距离
	var navH = $("#FLOAT").offset().top;
	//滚动条事件
		$(window).scroll(function(){
	//获取滚动条的滑动距离
			var scroH = Number($(this).scrollTop())+30;
	//滚动条的滑动距离大于等于定位元素距离浏览器顶部的距离，就固定，反之就不固定
			if(scroH>=navH){
				$(".indef").css({"position":"fixed","top":"31px"});
			}else if(scroH<navH){
				$(".indef").css({"position":"absolute","top":"610px"});
			}		
			if(scroH>=navH){
				$(".drpince").css({"position":"fixed","top":"31px"});
			}else if(scroH<navH){
				$(".drpince").css({"position":"absolute","top":"440px"});
			}
			
			if(scroH>=navH){
				$(".dr_index").css({"position":"fixed","top":"31px"});
			}else if(scroH<navH){
				$(".dr_index").css({"position":"absolute","top":"506px"});
			}
		});*/
	

});