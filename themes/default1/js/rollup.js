$(document).ready(function ($) {
    $('#roll_top').click(function () { $('html,body').animate({ scrollTop: '0px' }, 800); });
    //$('#ct').click(function(){$('html,body').animate({scrollTop:$('.ct').offset().top}, 800);});
    $(window).scroll(function (event) {
        if ($.browser.ie6) {
            $('#roll').css('top', $(this).scrollTop() + $(this).height() - 170);
        }
        if ($(this).scrollTop() > 260) {
            $('#roll').fadeIn();
        } else {
            $('#roll').fadeOut();
        }
    });
    //	$('#fall').click(function(){$('html,body').animate({scrollTop:$('.footer,.footer_a').offset().top}, 800);});
});