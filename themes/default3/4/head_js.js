$(function () {
    //居中
    //$(window).resize(function () {
    //    var w = $(window).width();
    //    $(".header_ad").css("left", -((1900 - w) / 2));
    //});
    //$(window).resize();


    //客服中心下拉框
    $(".cus_c_box").hover(function () {
        $(this).addClass("cus_c_border");
        $(".cus_center").show();
    }, function () {
        $(this).removeClass("cus_c_border");
        $(".cus_center").hide();
    })



    //关闭顶部广告
    $(".close_ad").on("click", function () {
        $(".full_ad").hide();
    });

    //右侧侧边栏
    //var wh = $(window).height();
    //$(".r_s_fixed").css({ "height": wh });

    //右侧侧边栏 鼠标移入效果
    $(".pos_relative").hover(function () {
        $(this).addClass("on");
        $(this).find(".f_c_list_tc").show();
    }, function () {
        $(this).removeClass("on");
        $(this).find(".f_c_list_tc").hide();
    });

    //文本框获得焦点事件
    $(".onfocustxt,#nloginpwd").focusin(function () {
        $(".err_msg1").hide();
        $(this).parents(".item").find(".index_err_box .err_msg2").show();
    });
    //文本框失去焦点事件
    $(".onfocustxt,#nloginpwd").focusout(function () {
        $(this).parents(".item").find(".index_err_box .err_msg2").hide();
    });
    //注册按钮点击事件
    $(".uc_login").click(function () {
        $(".err_msg1").show();
    });

    //导航栏关闭弹窗按钮
    $(".uc_close").click(function () {
        $(".user_center").hide();
    });
    //下载快乐购app
    $(".d_l_hgp").hover(function () {
        $(".down_load_hpg").show();
    }, function () { $(".down_load_hpg").hide(); });
});
