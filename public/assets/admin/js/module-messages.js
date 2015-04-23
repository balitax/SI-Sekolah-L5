/*!
 *  1.0.0
 * Author: mosaicpro
 * Licence: http://themeforest.net/licenses
 * Copyright 2015
 */

(function ($) {
    "use strict";

    $(window).bind('enterBreakpoint320', function () {
        var img = $('.messages-list .panel ul img');
        $('.messages-list .panel ul').width(img.first().width() * img.length);
    });

    $(window).bind('exitBreakpoint320', function () {
        $('.messages-list .panel ul').width('auto');
    });

})(jQuery);
