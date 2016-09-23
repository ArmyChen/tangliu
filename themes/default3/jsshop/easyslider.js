// JavaScript Document
/*
 * 	Easy Slider 1.7 - jQuery plugin
 *	written by Alen Grakalic
 *	http://cssglobe.com/post/4004/easy-slider-15-the-easiest-jquery-plugin-for-sliding
 *
 *	Copyright (c) 2009 Alen Grakalic (http://cssglobe.com)
 *	Dual licensed under the MIT (MIT-LICENSE.txt)
 *	and GPL (GPL-LICENSE.txt) licenses.
 *
 *	Built for jQuery library
 *	http://jquery.com
 *
 */

/*
 *	markup example for $("#slider").easySlider();
 *
 * 	<div id="slider">
 *		<ul>
 *			<li><img src="images/01.jpg" alt="" /></li>
 *			<li><img src="images/02.jpg" alt="" /></li>
 *			<li><img src="images/03.jpg" alt="" /></li>
 *			<li><img src="images/04.jpg" alt="" /></li>
 *			<li><img src="images/05.jpg" alt="" /></li>
 *		</ul>
 *	</div>
 *
 */

(function($)
{

    $.fn.easySlider = function(options)
    {
        // default configuration properties
        var defaults = {
            prevId: 'prevBtn',
            prevText: 'Previous',
            nextId: 'nextBtn',
            nextText: 'Next',
            controlsShow: true,
            controlsBefore: '',
            controlsAfter: '',
            controlsFade: true,
            firstId: 'firstBtn',
            firstText: 'First',
            firstShow: false,
            lastId: 'lastBtn',
            lastText: 'Last',
            lastShow: false,
            vertical: false,//垂直滚动模式
            speed: 800,//滚动速度
            auto: false,//自动滚动模式
            pause: 5000,//滚动到一个图片后的暂停时间
            continuous: false,//连续滚动模式，就是最后一张会和第一张连续起来，会复制整个承载图片的li
            numeric: false,//数组按钮模式
            numericId: 'controls',
            descBtn: false,//文字按钮button模式，文字取决于承载图片的li的title属性
            descBtnId: 'descControls',
			li_count : 1
        };

        var options = $.extend(defaults, options);
        var _clicked = false;

        this.each(function(sliderIndex)
        {
            var obj = $(this);
            var liObj = $("li", obj); //承载图片的li的对象集合
			var li_count = options.li_count;
            var s = $("li", obj).length;
            var w = li_count>1?$("li", obj).width()+10:$("li", obj).width();
            var h = $("li", obj).height();
            var clickable = true;

            obj.width(w * li_count);
            obj.height(h);
            obj.css("overflow", "hidden");
            var ts = s - 1;
            var t = 0;
            $("ul", obj).css('width', s * w);

            if (options.continuous)
            {
                if (!options.vertical)
                {
                    if(li_count == 1){
						if(options.descBtn){
							$("ul", obj).prepend("<li></li>");
							$("ul li:first-child", obj).attr('title',$("ul li:last-child", obj).attr('title')).css('display',$("ul li:last-child", obj).css('display')).css("margin-left", "-" + w + "px");
						}else{
							$("ul", obj).prepend($("ul li:last-child", obj).clone().css("margin-left", "-" + w + "px"));
						}
					}
                }
                else
                {
                    $("ul", obj).prepend($("ul li:last-child", obj).clone().css("margin-top", ""));
                }


				if(li_count > 1){
					var i = 1;
					for (i=1;i<=s;i++){
						$("ul", obj).append($("ul li:nth-child("+ i +")", obj).clone());
					}
					$("ul", obj).css('width', (s + 1) * 2*w);
				}else{
					 if(options.descBtn){
						 $("ul", obj).append("<li></li>");
						 $("ul li:last-child", obj).attr('title',$("ul li:nth-child(2)", obj).attr('title')).css('display',$("ul li:nth-child(2)", obj).css('display'));
					}else{
						$("ul", obj).append($("ul li:nth-child(2)", obj).clone());
					}

					 $("ul", obj).css('width', (s + 1) * w);
				}
            };

            if (!options.vertical) $("li", obj).css('float', 'left');

            if (options.controlsShow)
            {
                var html = options.controlsBefore;
                if (options.numeric)
                {
                    html += '<ol id="' + options.numericId + '"></ol>';
                }
                else if (options.descBtn)
                {
                    if(obj.attr('id') == 'banner'){
						html += '<ul id="' + options.descBtnId + "_" + sliderIndex + '" class="menutxt"></ul>';
					}else{
						html += '<ul id="' + options.descBtnId + "_" + sliderIndex + '" class="navigation"></ul>';
					}
                }
                else
                {
                    if (options.firstShow) html += '<span id="' + options.firstId + '"><a href=\"javascript:void(0);\">' + options.firstText + '</a></span>';
                    //html += ' <span id="' + options.prevId + '"><a href=\"javascript:void(0);\">' + options.prevText + '</a></span>';
                    //html += ' <span id="' + options.nextId + '"><a href=\"javascript:void(0);\">' + options.nextText + '</a></span>';
                    if (options.lastShow) html += ' <span id="' + options.lastId + '"><a href=\"javascript:void(0);\">' + options.lastText + '</a></span>';
                };

                html += options.controlsAfter;
				$(obj).after(html);
            };
            obj.attr('id') == "buy_list" ? '': obj.hover(function()
			{
			    options.speed = options.speed / 5;
			    clearTimeout(timeout);
			},
            function()
            {
                options.speed = options.speed * 5;
                clearTimeout(timeout);
                timeout = setTimeout(function()
                {
                    animate("next", false);
                }, options.pause * 1);
            });
            if (options.numeric)
            {
                for (var i = 0; i < s; i++)
                {
                    $(document.createElement("li"))
						.attr('id', options.numericId + (i + 1))
						.html('<a rel=' + i + ' href=\"javascript:void(0);\">' + (i + 1) + '</a>')
						.appendTo($("#" + options.numericId))
						.hover(function()
						{
						    options.speed = options.speed / 5;
						    animate($("a", $(this)).attr('rel'), true);
						    clearTimeout(timeout);
						},
                        function()
                        {
                            options.speed = options.speed * 5;
                            clearTimeout(timeout);
                            timeout = setTimeout(function()
                            {
                                animate("next", false);
                            }, options.pause * 1);
                        }
                        );
                };
            }
            else if (options.descBtn)
            {
                for (var i = 0; i < s; i++)
                {
                    var desc_href = $(liObj[i]).children("a").attr("href")?$(liObj[i]).children("a").attr("href"):'javascript:void(0);';
					$(document.createElement("li"))
						.attr('id', options.descBtnId + (i + 1))
						.html('<a rel=' + i + ' href=\"'+ desc_href +'\">' + liObj[i].title + '</a>')
						.appendTo(obj.next())
						.hover(function()
						{
						    options.speed = options.speed / 5;
						    animate($("a",$(this)).attr('rel'), true);
						    clearTimeout(timeout);
						},
                        function()
                        {
                            options.speed = options.speed * 5;
                            clearTimeout(timeout);
                            timeout = setTimeout(function()
                            {
                                animate("next", false);
                            }, options.pause * 1);
                        }
                        );
                };
            }
            else
            {
                $("#" + options.nextId).click(function()
                {
                    animate("next", true);
                });
                $("#" + options.prevId).click(function()
                {
                    animate("prev", true);
                });
                $("a", "#" + options.firstId).click(function()
                {
                    animate("first", true);
                });
                $("a", "#" + options.lastId).click(function()
                {
                    animate("last", true);
                });
            };

            function setCurrent(i)
            {
                i = parseInt(i) + 1;
                if (options.numeric)
                {
                    $(obj).next().children().removeClass("current"); //注意obj就是slider[]中的当前对象this.each()中定义了obj=$(this)
                    //$("li", "#" + options.numericId).removeClass("current");
                    $(obj).next().children("#" + options.numericId + i).addClass("current"); //应该对obj的紧邻的按钮控制器的子元素进行样式的变化
                }
                else
                {
                    $(obj).next().children().removeClass("cur"); //注意obj就是slider[]中的当前对象this.each()中定义了obj=$(this)
                    //$("#" + options.numericId + i).addClass("current");注意此处不应该这样写，这样的话外边的 this.each()将变得毫无意义
                    $(obj).next().children("#" + options.descBtnId + i).addClass("cur");//应该对obj的紧邻的按钮控制器的子元素进行样式的变化
                }
            };

            function adjust()
            {
                if (t > ts) t = 0;
                if (t < 0) t = ts;
                if (!options.vertical)
                {
                    $("ul", obj).css("margin-left", (t * w * -1));
                }
                else
                {
                    $("ul", obj).css("margin-top", (t * h * -1));
                }
                clickable = true;
                if (options.numeric || options.descBtn)
                {
                    setCurrent(t);
                }

                $("ul", obj).animate({opacity:1},{duration:options.speed});
            };

            function animate(dir, clicked)
            {
                if (1)
                {
                    //clickable = false;
                    var ot = t;
                    switch (dir)
                    {
                        case "next":
                            if (ot >= ts)
                            {
                                if (options.continuous)
                                {
                                    t = parseInt(t) + 1;
                                }
                                else
                                {
                                    t = ts;
                                }
                            }
                            else
                            {
                                t = parseInt(t) + 1;
                            }
                            //t = (ot >= ts) ? (options.continuous ? t + 1 : ts) : t + 1;
                            break;
                        case "prev":
                            t = (t <= 0) ? (options.continuous ? t - 1 : 0) : t - 1;
                            break;
                        case "first":
                            t = 0;
                            break;
                        case "last":
                            t = ts;
                            break;
                        default:
                            t = dir;
                            break;
                    };
                    var diff = Math.abs(ot - t);
                    var speed = diff * options.speed;

                    if (!options.vertical)
                    {
                        p = (t * w * -1);

                        $("ul", obj).animate(
							{opacity:0},
							{ queue: false, duration: speed, complete: adjust}
						);
                    }
                    else
                    {
                        setCurrent(t);       // 点击后滚动前按钮样式改变
                        p = (t * h * -1);
                        $("ul", obj).animate(
							{ opacity:0},
							{ queue: false, duration: speed, complete: adjust }
						);
                    };

                    if (!options.continuous && options.controlsFade)
                    {
                        if (t == ts)
                        {
                            $("a", "#" + options.nextId).hide();
                            $("a", "#" + options.lastId).hide();
                        }
                        else
                        {
                            $("a", "#" + options.nextId).show();
                            $("a", "#" + options.lastId).show();
                        };
                        if (t == 0)
                        {
                            $("a", "#" + options.prevId).hide();
                            $("a", "#" + options.firstId).hide();
                        }
                        else
                        {
                            $("a", "#" + options.prevId).show();
                            $("a", "#" + options.firstId).show();
                        };
                    };
                    if (options.auto && dir == "next")
                    {
                        timeout = setTimeout(function()
                        {
                            animate("next", false);
                        }, diff * options.speed + options.pause);
                    };

                };

            };
            // init
            var timeout;
            if (options.auto)
            {
                timeout = setTimeout(function()
                {
                    animate("next", false);
                }, options.pause);
            };

            if (options.numeric || options.descBtn) setCurrent(0);

            if (!options.continuous && options.controlsFade)
            {
                $("a", "#" + options.prevId).hide();
                $("a", "#" + options.firstId).hide();
            };

        });

    };

})(jQuery);


