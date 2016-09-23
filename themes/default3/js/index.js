;
var index = {
    //分类效果
    'goods_class' : function(){
        var div_height = $('.index_type').height();
        var position_top = 0;
        var nav_height = 0;
        var nav_top = 0;
        $(".index_type_ul .li_has_down").hover(function(){
            $(this).addClass("cur");
            var nav_obj = $(this).find(".nav_type_list");
            if(nav_obj.attr('data') == 0){
                position_top = $(this).position().top;
                nav_height = nav_obj.outerHeight();
                if(position_top > 0 && nav_height > 0){
                    nav_top = (nav_height) - (div_height - position_top);
                    if(nav_top > 0){
                        nav_obj.css({top: -(nav_top+16)});
                        nav_obj.find('b').css({'margin-top': nav_top+15});
                    }
                }
                nav_obj.attr('data', 1);
            }
            nav_obj.show();
        }, function(){
            $(this).removeClass("cur");
            $(this).find(".nav_type_list").hide();
        });
    },
    //今日直播和昨日热销
    'live_goods' : function(){
        //今日直播 昨日疯抢切换
        $(".pro_menu .pro_li").click(function () {
            $(".pro_menu .pro_li").removeClass("current");
            $(this).addClass("current ");

            $(".pro_hot .pro_con").hide();
            $(".pro_hot .pro_con:eq(" + $(this).index() + ")").show();
        });

        var zhibo_index_0 = $('#tv_zhiobo_ul li.zhibo_selt').index();
        zhibo_index_0 = parseInt(zhibo_index_0);
        var defaultIndex_0 = parseInt(zhibo_index_0/5);

        //左右切换
        $("#zhibo_0").slide({ titCel: ".hd", mainCell: ".groDiv ul", autoPage: true, effect: "left", autoPlay: false, scroll: 5, vis: 5, pnLoop: false, defaultIndex: defaultIndex_0 });
        $("#zhibo_1").slide({ titCel: ".hd", mainCell: ".groDiv ul", autoPage: true, effect: "left", autoPlay: false, scroll: 5, vis: 5, pnLoop: false });
    },
    //品牌上新
    'brand_new' : function(){
        $(".ppsx_ul li").hover(function () {
            $(this).find(".ppsx_tc").show();
        }, function () {
            $(this).find(".ppsx_tc").hide();
        })
    },
    //限时抢购
    'operate_time' : function(){
        window.setInterval(function () {
            $('.djs_time').each(function () {
                c = $(this).index();
                n_time = $(this).attr('data-endtime');
                n_time--;
                var day = 0,
                    hour = 0,
                    minute = 0,
                    second = 0;//时间默认值
                if (n_time > 0) {
                    // day = Math.floor(n_time / (60 * 60 * 24));
                    // hour = Math.floor(n_time / (60 * 60)) - (day * 24);
                    // minute = Math.floor(n_time / 60) - (day * 24 * 60) - (hour * 60);
                    // second = Math.floor(n_time) - (day * 24 * 60 * 60) - (hour * 60 * 60) - (minute * 60);
                    hour = Math.floor(n_time / (60 * 60));
                    minute = Math.floor(n_time / 60) - (hour * 60);
                    second = Math.floor(n_time) - (hour * 60 * 60) - (minute * 60);
                }
                if (hour <= 9) hour = '0' + hour;
                if (minute <= 9) minute = '0' + minute;
                if (second <= 9) second = '0' + second;

                $(this).find("span").html(hour + "：" + minute + "：" + second);
                $(this).attr("data-endtime", n_time);
            });
        }, 1000);
    },
    //今日发现更多
    'today_more' : function(){
        var window_height = $(window).height();
        var today_more_flag = true;
        var curpage = 1;

        $(window).scroll(function (){
            var body_top = Math.max(document.body.scrollTop || document.documentElement.scrollTop);
            var mryh_top = $('.mryh_goods').offset().top;
            var mryh_height = $('.mryh_goods').height();
            if(body_top + window_height - mryh_top > mryh_height){
                if(today_more_flag == true){
                    today_more_flag = false;
                    curpage = curpage + 1;
                    $.ajax({
                        url: SHOP_SITE_URL+"/index.php?act=index&op=today_more&curpage="+curpage,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            if(data.state == 1){
                                var more_html = "";
                                $.each(data.msg, function(i,n){
                                    more_html += '<li class="'+ n.class+'">';
                                    if(n.icon)
                                    {
                                        more_html += '<div class="ttxs_jb" style=\'background: rgba(0, 0, 0, 0) url("'+ n.icon+'") no-repeat scroll 0 0; background-size: 80px\'></div>';
                                    }
                                    more_html += '  <a class="a_con4_list" href="'+ n.url+'" target="_blank">';
                                    more_html += '      <p class="p_img">';
                                    more_html += '          <img id="goods_image_'+n.gid+'"  src="'+ n.pic+'" />';
                                    more_html += '      </p>';
                                    more_html += '  </a>';
                                    more_html += '  <p class="p_title"><a href="'+ n.url+'" target="_blank">';
                                    if(n.zk){
                                        more_html += '<span>【'+n.zk+'折】</span>';
                                    }
                                    more_html += n.name+'</a></p>';
                                    more_html += '<p class="p_p">';
                                    more_html += '    <span class="price1">￥<span>'+n.price1+'</span></span>';
                                    if(n.zk){
                                        more_html += '<span class="price2"><del>￥'+n.price2+'</del></span>';
                                    }
                                    more_html += '<a class="mryh_add_car" target="_blank" href="'+ n.url+'"></a>';
                                    more_html += '    </p>';
                                    more_html += '</li>';
                                });
                                if(more_html){
                                    $('.mryh_goods').append(more_html);
                                    today_more_flag = true;
                                }
                            }else{
                                curpage = curpage - 1;
                            }
                        },
                        error : function (data){
                            curpage = curpage - 1;
                        }
                    });
                }
            }
        });
    }
};

$(function () {
    index.goods_class();
    index.live_goods();
    index.brand_new();
    if($('.djs_time').size() > 0) {
        index.operate_time();
    }
    if($('.mryh_goods').size() > 0){
        index.today_more();
    }
});