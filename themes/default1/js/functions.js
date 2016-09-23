$(document).ready(function(){
	 $("ul li.menu_li").mouseover(function(){
		  $(this).find("ul").show();
	  });
	  $("ul li.menu_li").mouseleave(function(){
		  $(this).find("ul").hide();
	  });
	  
	  $(".header_login").click(function(){
		    $(".shade_div").show();
			$(".login_content").show();
	  });
	  $(".login_close").click(function(){
		    $(".shade_div").hide();
			$(".login_content").hide();
	  });
	  
	  //placeholder
	  $('input').placeholder();
	  //$('.login_input').placeholder();
	  
	  //flash
	  var ali=$('#bannerindex li');
	  var aPage=$('#bannerback li');
	  var iNow=0;

	  ali.each(function(index){	
	      $(this).mouseover(function(){
	          slide(index);
	      })
	  });

	  function slide(index){	
	      iNow=index;
	      ali.eq(index).addClass('num').siblings().removeClass();
	  	aPage.eq(index).siblings().stop().fadeOut(600);
	  	aPage.eq(index).stop().fadeIn(600);	
	  }
	  slide(0);
	  function autoRun(){	
	      iNow++;
	  	if(iNow==ali.length){
	  		iNow=0;
	  	}
	  	slide(iNow);
	  }
	  var timer=setInterval(autoRun,5000);
	  	
	  ali.hover(function(){
	  	clearInterval(timer);
	  },function(){
	  	timer=setInterval(autoRun,5000);
	  });
	  /*页头快速链接*/
	  $('#quicklinks').click(function(e){
			$(this).find('ul').toggle();
			e.stopPropagation();
		}
	  );
		$('#quicklinks li').hover(function(e){
			$(this).toggleClass('on');
			e.stopPropagation();
		});
		$('#quicklinks li').click(function(e){
			$('#quicklinks ul').hide();
			e.stopPropagation();
		});
		$(document).click(function(){
			$('#quicklinks ul').hide();
		});
	  /*回到顶部*/
	  // browser window scroll (in pixels) after which the "back to top" link is shown
	 	var offset = 300,
	 		//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
	 		offset_opacity = 1200,
	 		//duration of the top scrolling animation (in ms)
	 		scroll_top_duration = 700,
	 		//grab the "back to top" link
	 		$back_to_top = $('.cd-top');

	 	//hide or show the "back to top" link
	 	$(window).scroll(function(){
	 		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
	 		if( $(this).scrollTop() > offset_opacity ) { 
	 			$back_to_top.addClass('cd-fade-out');
	 		}
	 	});
	 	//www.sucaijiayuan.com
	 	//smooth scroll to top
	 	$back_to_top.on('click', function(event){
	 		event.preventDefault();
	 		$('body,html').animate({
	 			scrollTop: 0 
	 		 	}, scroll_top_duration
	 		);
	 	});
	  //Kill IE 6
	  var ietips='<div id=\"_ietips\" style=\"display:none;background:#000;height:40px;line-height:40px;left:0; opacity:0.80; -moz-opacity:0.80; filter:alpha(opacity=80); position:fixed;bottom:0;width:100%;z-index:999; text-align:center; color:#FFF; font-size:16px;_bottom:auto; _width: 100%; _position: absolute; _top:expression(eval(document.documentElement.scrollTop+document.documentElement.clientHeight-this.offsetHeight-(parseInt(this.currentStyle.marginTop,10)||0)-(parseInt(this.currentStyle.marginBottom,10)||0)))\">\u5F53\u524D\u6D4F\u89C8\u5668\u7248\u672C\u592A\u4F4E\uFF0C\u60A8\u5C06\u65E0\u6CD5\u5B8C\u7F8E\u4F53\u9A8C\u6211\u4EEC\u7CFB\u7EDF\uFF01\u8bf7\u5347\u7ea7\u60a8\u7684\u6d4f\u89c8\u5668\u6216\u8005\u4f7f\u7528\u0063\u0068\u0072\u006f\u006d\u0065\u6d4f\u89c8\u5668\u6d4f\u89c8</div>';
	  if($.browser.version=="6.0"){$("body").append(ietips);setTimeout('$("#_ietips").fadeIn(2000);',1000);}
}); 
//jquery.fixed.js
(function($) {
    var _options = {};
    jQuery.fn.fiexd = function(options) {
        var id = $(this).attr("id");
        _options[id] = $.extend({}, $.fn.fiexd.defaults, options);
        var obj = $(this);
        var offsetTop = this.offset().top - parseInt(_options[id].top);
        _scroll($(document).scrollTop() > offsetTop);
        $(window).scroll( function() {
            _scroll($(document).scrollTop() > offsetTop);
        });
        function _scroll(isChange){
            if(isChange){
                if($.browser.msie && ($.browser.version == 6.0)){
                    obj.css({"position":"absolute", "top":$(document).scrollTop()+parseInt(_options[id].top)});
                }else{
                    obj.css({"position":"fixed", "top":_options[id].top});
                }
            }else{
                obj.css({"position":"", "top":""});
            }
        }
    }
    jQuery.fn.fiexd.defaults = {
        top: '0px'
    };
   

})(jQuery);


//login
function validatorhead()
{
 	if(document.getElementById('username').value=="")
	{alert("请输入用户名!"); document.getElementById('username').focus(); return false;}
	if(document.getElementById('pwd').value=="")
	{alert("请输入密码!");document.getElementById('pwd').focus();return false;}
	if(document.getElementById('checkcode').value=="")
	{alert("请输入验证码!");document.getElementById('checkcode').focus();return false;}
	else{document.getElementById('login').submit();}
}