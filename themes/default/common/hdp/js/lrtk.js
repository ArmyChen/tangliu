$(function(){
	$(".flashBanner").each(function(){
		var timer;
		$(".flashBanner .mask .smalldiv").click(function(){
			var index = $(".flashBanner .mask .smalldiv").index($(this));	
			changeImg(index);
		}).eq(0).click();
		$(this).find(".mask").animate({
			"bottom":"0"	
		},700);

//��һ��
// next      
$(this).find('.ck-next').on('click', function(){
var show = $(".flashBanner .mask .smalldiv.show").index();
if (show >= $(".flashBanner .mask .smalldiv").length-1)
					show = 0;
				else
					show ++;
changeImg(show);
});
//��һ��
// pre
$(this).find('.ck-prev').on('click', function(){
var show = $(".flashBanner .mask .smalldiv.show").index();
if (show >= $(".flashBanner .mask .smalldiv").length-0)
					show = 1;
				else
					show --;
changeImg(show);
});




		$(".flashBanner").hover(function(){
			clearInterval(timer);	
		},function(){
			timer = setInterval(function(){
				var show = $(".flashBanner .mask .smalldiv.show").index();
				if (show >= $(".flashBanner .mask .smalldiv").length-1)
					show = 0;
				else
					show ++;
				changeImg(show);
			},3000);
		});
		function changeImg (index)
		{
			$(".flashBanner .mask .smalldiv").removeClass("show").eq(index).addClass("show");
			$(".flashBanner .bigImg").parents("a").attr("href",$(".flashBanner .mask .smalldiv").eq(index).attr("link"));
			$(".flashBanner .bigImg").hide().attr("style",$(".flashBanner .mask .smalldiv").eq(index).attr("uri")).fadeIn("slow");
			$(".flashBanner .mark1").hide().attr("style",$(".flashBanner .mask .smalldiv").eq(index).attr("bgcolor")).fadeIn("slow");
	





		}







		timer = setInterval(function(){
			var show = $(".flashBanner .mask .smalldiv.show").index();
			if (show >= $(".flashBanner .mask .smalldiv").length-1)
				show = 0;
			else
				show ++;
			changeImg(show);
		},3000);
	});
});