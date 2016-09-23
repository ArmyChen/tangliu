
if($.browser.msie && $.browser.version == "6.0"){
    try{
        document.execCommand('BackgroundImageCache', false, true);
    }catch(e){}
};
$(function(){
	$(window).scroll(function() {
		if($(window).scrollTop() > 100) {
			$("#go_top").fadeIn(1500);

		} else {
			$("#go_top").fadeOut(1500);
		}
	});
    $("#go_top_a").click(function(){
        $('body,html').animate({
                scrollTop: 0
            },
            0);
        return false;
    });
	$("#go_top_a").hover(function(){
		$(this).animate({opacity:"1"},500);
		},function(){
			$(this).animate({opacity:"0.5"},500);
			})
	
	$('.all').live('mouseover',function(){
		$('.allBox').show();
		$('.allBox').css('opacity','0.98');
	})
	$('.all').live('mouseout',function(){
		$('.allBox').hide();
	})
	$('.allBox').hover(function(){
		$('.allBox').show();
	},function(){
		$('.allBox').hide();
		})
	$('.gg_switch,.gg_position').live('click',function(){
		

		})
})


