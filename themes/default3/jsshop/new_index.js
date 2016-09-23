$(function(){
	/*分类分享滚动*/
	$(".people_shuo_comment").jCarouselLite({scroll:1,auto:3000,visible: 1,vertical:true});
	$("#comment_2").jCarouselLite({scroll:1,auto:3000,visible: 1,vertical:true});
	$("#comment_3").jCarouselLite({scroll:1,auto:3000,visible: 1,vertical:true});
	$("#comment_4").jCarouselLite({scroll:1,auto:3000,visible: 1,vertical:true});
	
	/*商品分类*/
	$('.floor_conl').find('div').hover(
		function(){
			$(this).addClass('hover').find('a').find('div').show();
		},function(){
			$(this).removeClass('hover').find('a').find('div').hide();
		}	
	);
	/*大家都喜欢，商品分类销量排行*/
	$('.sr_list').find('li').hover(
		function(){
			$(this).addClass('hover');
			$(this).siblings('li').removeClass('hover');
		});
	/*热销，套餐，品牌活动， 新品*/
	$('.hotsale_newl').find('a').hover(
		function(){
			s = (window.screen.width > 1280)?1:0;
			$(this).addClass('on').siblings('a').removeClass('on');
			var d = $(this).attr('data');
			$('#'+d).show().siblings('ul').hide();
			if(!s){
				$('#'+d).find('li').eq(4).css('display','none');
			}
		});
	
	//滚动的回顶部
	$(window).scroll(function() {
		var s = $('#hotsale_scroll').offset().top || $('#hotsale_scroll').offsetTop;
		($(document).scrollTop()>s)?$("#backtop").show():$("#backtop").hide();
		($(document).scrollTop()>s)?$('a[data="floorNav"]').show():$('a[data="floorNav"]').hide();
	}).resize(function(){
		var s = $('#hotsale_scroll').offset().top || $('#hotsale_scroll').offsetTop;
		($(document).scrollTop()>s)?$("#backtop").show():$("#backtop").hide();
		($(document).scrollTop()>s)?$('a[data="floorNav"]').show():$('a[data="floorNav"]').hide();
	});
	
	//不同分辨率下样式修改
	if(s){
		$('div[id="div7"]').removeClass('mall_hide');
		$('div[id="div6"]').removeClass('mall_hide');
		$('div[class="azg_hotsale_bottom"]').find('li').css('margin-right','15px');
	}else{
		$('div[id="div7"]').addClass('mall_hide');
		$('div[id="div6"]').addClass('mall_hide');
		$('div[class="azg_hotsale_bottom"]').find('li').css('margin-right','5px');
		$('div[class="azg_hotsale_bottom"]').find('li').eq(3).css('margin-right','0px');
		$('div[class="azg_hotsale_bottom"]').find('li').eq(4).css('display','none');
		$('div[class="brands"]').find('li:last').css('display','none');
		$('li[id="brandNine"]').css('display','none');
	}
	
	/*首焦*/
	//$('#focus').nav({ t: 6000, a: 500 });
	$('.index_interval li').hover(function(){
		stopSilde=2;
		},
		function(){
			stopSilde=1;
		});
	$('#image_1').show();
	$('#image_2').hide();
	$('#image_3').hide();
	$('.lb_nav li').mouseover(function(){
		var id=$(this).html()-1;
		$(this).closest('.lb').find('.lb_main li:eq('+id+')').show();
		$(this).addClass('on');
		$(this).closest('.lb').find('.lb_main li:eq('+id+')').siblings().hide();
		$(this).siblings().removeClass('on');
	});
	setInterval(s_main,4000);
});
function changeImg(num){
	var index=$(this).index();
	stopSilde=1;
	clearTimeout(s_h);
	s_h=setTimeout(function(){cImg(num);},300);
}
function cImg(num){
	num--;
	var s_c=$('.index_interval').find('li'),s_h=$('.lb_an').find('li');
	s_c.fadeOut(1000);
	s_c.eq(num).fadeIn(300);
	s_h.removeClass('on');
	s_h.eq(num).addClass('on');
}
function s_main(){
	if(stopSilde==2){return;}
	else if(stopSilde==1){stopSilde=0;return;}
	var s_li=$('.lb_an').find('li'),s_on=$('.lb_an').find('.on'),s_index=s_li.index($('.lb_an .on'))+1;
	if(s_index==s_li.length)
	{s_index=1;}	
	else
	{s_index++;}
	cImg(s_index)}
/*焦点图滚动*/
;(function ($) {
    $.fn.extend({
        "nav": function (con) {
            var $this = $(this), $nav = $this.find('.mfpSlide_nav'), t = (con && con.t) || 3000, a = (con && con.a) || 500, i = 0, autoChange = function () {
                $nav.find('li:eq(' + (i + 1 === 3 ? 0 : i + 1) + ')').addClass('selected').siblings().removeClass('selected');
                $this.find('.event-item:eq(' + i + ')').css('display', 'none').end().find('.event-item:eq(' + (i + 1 === 3 ? 0 : i + 1) + ')').css({
                    display: 'block',
                    opacity: 0
                }).animate({
                    opacity: 1
                }, a, function () {
                    i = i + 1 === 3 ? 0 : i + 1;
                }).siblings('.event-item').css({
                    display: 'none',
                    opacity: 0
                });
            }, st = setInterval(autoChange, t);
            $this.hover(function () {
                clearInterval(st);
                return false;
            }, function () {
                st = setInterval(autoChange, t);
                return false;
            }).find('.switch-nav>a').bind('mouseover', function () {
                var current = $nav.find('.selected').index();
                i = $(this).attr('class') === 'prev' ? current - 2 : current;
                autoChange();
                return false;
            }).end().find('.mfpSlide_nav>li').bind('mouseover', function () {
                i = $(this).index() - 1;
                autoChange();
                return false;
            });
            return $this;
        }
    });
}(jQuery));
