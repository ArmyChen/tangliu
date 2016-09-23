; (function($) {
    $.fn.lazyload = function(options) {
        var settings = {
            threshold: 0,
            failurelimit: 0,
            event: "scroll",
            effect: "show",
            container: window
        };
        if (options) {
            $.extend(settings, options);
        }
        var elements = this;
        if ("scroll" == settings.event) {
            $(settings.container).bind("scroll",
            function(event) {
                var counter = 0;
                elements.each(function() {
                    if ($.abovethetop(this, settings) || $.leftofbegin(this, settings)) {} else if (!$.belowthefold(this, settings) && !$.rightoffold(this, settings)) {
                        $(this).trigger("appear");
                    } else {
                        if (counter++>settings.failurelimit) {
                            return false;
                        }
                    }
                });
                var temp = $.grep(elements,
                function(element) {
                    return ! element.loaded;
                });
                elements = $(temp);
            });
        }
        this.each(function() {
            var self = this;
            $(self).one("appear",
            function() {
                if (!this.loaded) {
                    $("<img />").bind("load",
                    function() {
                        $(self).hide().attr("src", $(self).attr("original"))[settings.effect](settings.effectspeed);
                        self.loaded = true;
                    }).attr("src", $(self).attr("original"));
                };
            });
            if ("scroll" != settings.event) {
                $(self).bind(settings.event,
                function(event) {
                    if (!self.loaded) {
                        $(self).trigger("appear");
                    }
                });
            }
        });
        $(settings.container).trigger(settings.event);
        return this;
    };
    $.belowthefold = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).height() + $(window).scrollTop();
        } else {
            var fold = $(settings.container).offset().top + $(settings.container).height();
        }
        return fold <= $(element).offset().top - settings.threshold;
    };
    $.rightoffold = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).width() + $(window).scrollLeft();
        } else {
            var fold = $(settings.container).offset().left + $(settings.container).width();
        }
        return fold <= $(element).offset().left - settings.threshold;
    };
    $.abovethetop = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).scrollTop();
        } else {
            var fold = $(settings.container).offset().top;
        }
        return fold >= $(element).offset().top + settings.threshold + $(element).height();
    };
    $.leftofbegin = function(element, settings) {
        if (settings.container === undefined || settings.container === window) {
            var fold = $(window).scrollLeft();
        } else {
            var fold = $(settings.container).offset().left;
        }
        return fold >= $(element).offset().left + settings.threshold + $(element).width();
    };
    $.extend($.expr[':'], {
        "below-the-fold": "$.belowthefold(a, {threshold : 0, container: window})",
        "above-the-fold": "!$.belowthefold(a, {threshold : 0, container: window})",
        "right-of-fold": "$.rightoffold(a, {threshold : 0, container: window})",
        "left-of-fold": "!$.rightoffold(a, {threshold : 0, container: window})"
    });

})(jQuery);

$(function() {
    function checkbrowse() {
        var ua = navigator.userAgent.toLowerCase();
        var is = (ua.match(/\b(chrome|opera|safari|msie|firefox)\b/) || ['', 'mozilla'])[1];
        var r = '(?:' + is + '|version)[\\/: ]([\\d.]+)';
        var v = (ua.match(new RegExp(r)) || [])[1];
        jQuery.browser.is = is;
        jQuery.browser.ver = v;
        return {
            'is': jQuery.browser.is,
            'ver': jQuery.browser.ver
        }
    }

    var public = checkbrowse();
    var showeffect = "";
    if ((public['is'] == 'msie' && public['ver'] < 8.0)) {
        showeffect = "show"
    } else {
        showeffect = "fadeIn"
    }
    jQuery(document).ready(function($) {
        $("img").lazyload({
            placeholder: "http://ecimg.happigo.com/data/upload/shop/common/default_goods_image_360.gif",
            effect: showeffect,
            failurelimit: 10
        })
    });

});