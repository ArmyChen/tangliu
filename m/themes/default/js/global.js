//html根字体
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        var html = document.documentElement;
        var windowWidth = html.clientWidth;
        html.style.fontSize = windowWidth / 6.4 + 'px';
    }, false);
})();



$(document).ready(function() {

    TouchSlide({
        slideCell: "#bannerSilde",
        titCell: ".hd ul",
        mainCell: ".bd ul",
        effect: "left",
        autoPlay: false,
        autoPage: true,
        switchLoad: "_src"
    });
    if ($('div').hasClass('m-fixed-footer')) {
        $('body').css('padding-bottom', "0.8rem");
    }


    $(".m-meun .nor").click(function() {
        $(".m-meun .hor").slideToggle();
        $(".m-meun").toggleClass('m-meun-on');
    });
    $(".m-type-page .bd .item li a").click(function() {

        $(this).toggleClass('on');
    });

    if ($('div').hasClass('m-type-page')) {
        var parent = $(".m-type-page .hd ul").offset().top;
        var that = $(".m-type-page .hd ul .on").offset().top;
        $('.m-type-page .hd em').css('top', that - parent)
    }
    $(".m-type-page .hd ul li").click(function() {
        var parent = $(".m-type-page .hd ul").offset().top;
        var that = $(this).offset().top;
        $(this).addClass('on').siblings().removeClass('on');
        $('.m-type-page .hd em').css('top', that - parent)
    });

    if ($('div').hasClass('m-type-page')) {
        $('html').css('height', "100%");
        $('html').css('overflow', "hidden");
    }

    $(".m-common-development .bd table .nor").click(function() {
        $(this).next().slideToggle();

    });

    $(".m-phone-detail .ft a").click(function() {
        $('.m-phone-detail-fixed').show();

    });
    $(".m-phone-detail-fixed .colse").click(function() {
        $('.m-phone-detail-fixed').hide();

    });




});
//演示用
$(document).ready(function() {


    $(".m-number-option input").keyup(function() {
        var that = $(this).val();

        if (that < 0) {

            $(this).val(0)
        } else {

        }
    });

    //数量加减

    $(".m-number-option >span:nth-child(1)").click(function() {
        var emlInput = $(this).parents('.m-number-option').children('input');
        var nowInputVal = Number(emlInput.val());
        var FooterVal = $('.m-fixed-footer ul li span em');
        var nowFooterVal = Number(FooterVal.text());
        var groupPirce = $(this).parents('.bd').parent().find('.ft i');
        var nowGroupPirce = Number(groupPirce.text());
        var nowFooterVal = Number(FooterVal.text());

        console.log(nowGroupPirce);
        if (nowInputVal > 0) {
            emlInput.val(nowInputVal - 1);
            FooterVal.text(nowFooterVal - 1);
            groupPirce.text(nowGroupPirce - 1199);
        }
    });


    $(".m-number-option >span:nth-child(3)").click(function() {
        var emlInput = $(this).parents('.m-number-option').children('input');
        var nowInputVal = Number(emlInput.val());
        var FooterVal = $('.m-fixed-footer ul li span em');
        var nowFooterVal = Number(FooterVal.text());
        var groupPirce = $(this).parents('.bd').parent().find('.ft i');
        var nowGroupPirce = Number(groupPirce.text());
        emlInput.val(nowInputVal + 1);
        FooterVal.text(nowFooterVal + 1);
        groupPirce.text(nowGroupPirce + 1199);

    });

    $(".m-common-development .bd table .hor li").click(function() {
        var thisText = $(this).text();
        $(this).parent().parent().parent().find('.nor span').text(thisText);
        $(this).parent().parent().slideToggle();
    });

    $(".m-phone-detail-fixed .bd .list a").click(function() {

        $(this).toggleClass('on').siblings().removeClass('on');
    });
    $(".m-phone-detail-fixed .bd .list a:eq(0)").click(function() {

        $('.m-phone-detail-fixed .m-table-cell-auto i').html('1199');
    });

    $(".m-phone-detail-fixed .bd .list a:eq(1)").click(function() {

        $('.m-phone-detail-fixed .m-table-cell-auto i').html('2199');
    });
    $(".m-phone-detail-fixed .bd .list a:eq(2)").click(function() {

        $('.m-phone-detail-fixed .m-table-cell-auto i').html('3199');
    });
    $(".m-phone-detail-fixed .bd .list a:eq(3)").click(function() {

        $('.m-phone-detail-fixed .m-table-cell-auto i').html('4199');
    });
    $(".m-phone-detail-fixed .bd .list a:eq(4)").click(function() {

        $('.m-phone-detail-fixed .m-table-cell-auto i').html('5199');
    });

    $(".m-phone-detail-fixed .ft").click(function() {

        $(".m-phone-detail-fixed").hide();
    });
    $(".m-type-page .bd .item li a").click(function() {
        if ($(this).hasClass('on')) {
            var FooterVal = $('.m-fixed-footer ul li span em');
            var nowFooterVal = Number(FooterVal.text());
            FooterVal.text(nowFooterVal + 1);
        } else {
            var FooterVal = $('.m-fixed-footer ul li span em');
            var nowFooterVal = Number(FooterVal.text());
            FooterVal.text(nowFooterVal - 1);
        }

    });





});
