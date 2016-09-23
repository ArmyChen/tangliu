//分辨率自适应---1024标准
var iswidth = (window.screen.width > 1280)?1:0;
if (iswidth) {screenShow='w1230'} else {screenShow='w980'}
$(document).ready(function(){
	//推荐滑动块
	//$(".hot").slide({mainCell:".hot_con ul",titCell:".hot_tab li",autoPlay:false});
	//推荐滑动块显示隐藏
	$('.w1230 .hot_con li').each(function(){
		$(this).children('dl').last().addClass('last');
	})
	$('.w980 .hot_con li').each(function(){
		$(this).children('dl').last().prev().addClass('last');
	})
	//楼层内容显示隐藏
	$('.w1230 .floor_con').each(function(){
		$(this).children('dl').last().addClass('last');
	})
	$('.w980 .floor_con').each(function(){
		$(this).children('dl').last().prev().addClass('last');
	})
})