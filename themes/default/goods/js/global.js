//轮播图
$(document).ready(function() {
    $('.m-product-type-list-bd .item:nth-child(3n)').css('margin-right', '0');

    if ($('div').hasClass('m-logon')) {
        $('.m-footer-wrap').css('margin-top', 0);
    }



    $(".price-bd-list h4").click(function() {
        $(".price-bd-list .con").slideToggle("slow");
    });
});


/*模拟下拉框*/
$(function(){
  	$('.arrow_right').click(function(e){
		$(this).parent().parent().find('.select-list').toggle();
		e.stopPropagation();
		$('body').click(function(){
			$(this).parent().parent().find('.select-list').hide();
		})
  	})
  	$('.select-list li').click(function(){
  		$(this).parent().parent().find('.text_left').text(($(this).text())); 
		var _value=$(this).attr('value');
		$(this).parent().parent().find('.text_left').attr('value',_value);
  	}) 
})
/*模拟下拉框  end*/

/*详细页计算总价*/
$(function(){
	//制保留2位小数，如：2，会在2后面补上00.即2.00    
    function toDecimal2(x) {    
        var f = parseFloat(x);    
        if (isNaN(f)) {    
            return false;    
        }    
        var f = Math.round(x*100)/100;    
        var s = f.toString();    
        var rs = s.indexOf('.');    
        if (rs < 0) {    
            rs = s.length;    
            s += '.';    
        }    
        while (s.length <= rs + 2) {    
            s += '0';    
        }    
        return s;    
    }
	var _value=$('.s-nav .text_left').attr('value');
	var _num=$('.s-nav .num input').val()
	var _total=_value*_num;
	var total=toDecimal2(_total);
	$('.s-nav .total span').text(total);
	
	/*改变数量时计算总价*/
	$('.s-nav .num input').change(function(){
		var _value=$('.s-nav .text_left').attr('value');
		var _total=_value*$(this).val();
		var total=toDecimal2(_total);
		$('.s-nav .total span').text(total);
	})
	/*改变型号时计算总价*/
	$('.select-list li').click(function(){
		var _value=$(this).attr('value');
		var _num=$('.s-nav .num input').val()
		var _total=_value*_num;
		var total=toDecimal2(_total);
		$('.s-nav .total span').text(total);
	})
})
/*详细页计算总价  end*/


/*全屏翻页*/
$(function(){
  var $mlNav = $('.m-detail-price-wrap');
  var $header = $('.header');
    $('#fullpage').fullpage({
        verticalCentered: true,
        navigation: !0,
        onLeave: function(index, nextIndex, direction){
            if(index == 2 && direction == 'up'){
                $mlNav.animate({
                    top: 160
                }, 680);
				$header.animate({
                    top: 0
                }, 400);
            } else if(index == 1 && direction == 'down') {
				$('.nav').find('.sub-nav').slideUp(400);
                $mlNav.animate({
                    top: 0
                }, 400);
				$header.animate({
                    top: -160
                }, 400);
            } else if(index == 3 && direction == 'up') {
                $mlNav.animate({
                    top: 0
                }, 500);
            } else {
                $mlNav.animate({
                    top: 0
                }, 400);
            }
        }
    });
});
/*全屏翻页  end*/

/*显示二级导航*/
$(function(){
	$('.nav>ul>li').mouseenter(function(){
		var _this=$(this);
		$('.nav').find('.sub-nav').css('z-index','5');
		_this.find('.sub-nav').css('z-index','10000');
		function show(_this){
			$('.nav').find('.sub-nav').slideDown(400);
		}
		var _show=window.setTimeout(function(){show(_this)},400);
		return
	});
	
	$('.nav').mouseleave(function(){
		function hidden(){
			$('.nav').find('.sub-nav').slideUp(400);
		}
		var _hidden =window.setTimeout(hidden,300);
		$('.nav>ul>li').mouseover(function(){
			clearInterval(_hidden); 
		})
		return
	});
	
})
/*显示二级导航  end*/

