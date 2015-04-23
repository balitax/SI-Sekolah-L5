/*!
 *  1.0.0
 * Author: mosaicpro
 * Licence: http://themeforest.net/licenses
 * Copyright 2015
 */

(function ($) {
    "use strict";

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkSlickDefault = function () {

        if (! this.length) return;

        if (typeof $.fn.slick == 'undefined') return;

        var c = this;
        
        c.slick({
            dots: true,
            slidesToShow: c.data('items') || 3,
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: c.data('itemsLg') || 4
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: c.data('itemsMd') || 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: c.data('itemsSm') || 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: c.data('itemsXs') || 2
                    }
                },
                {
                    breakpoint: 0,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ],
            rtl: this.data('rtl'),
            onSetPosition: function () {
                $(window).trigger('resize');
            }
        });

        $(document).on('sidebar.shown', function(){
            c.slickSetOption('dots', true, true);
        });

    };

    $(".slick-basic").each(function () {
        $(this).tkSlickDefault();
    });

})(jQuery);