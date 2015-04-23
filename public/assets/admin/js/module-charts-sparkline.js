(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({"./lib/charts/js/sparkline/main.js":[function(require,module,exports){
require('./_sparkline');

},{"./_sparkline":"/Code/html/themekit-learning/lib/charts/js/sparkline/_sparkline.js"}],"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js":[function(require,module,exports){
module.exports = (function () {
    var skin = $.cookie('skin');

    if (typeof skin == 'undefined') {
        skin = 'default';
    }
    return skin;
});
},{}],"/Code/html/themekit-learning/lib/charts/js/sparkline/_sparkline.js":[function(require,module,exports){
(function ($) {
    "use strict";

    var skin = require('../lib/_skin')();

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkSparkLine = function () {

        if (! this.length) return;

        this.sparkline(
            this.data('data') || "html", {
                type: 'line',
                height: '24',
                width: '100%',
                spotRadius: '3.2',
                spotColor: config.skins[ skin ][ 'primary-color' ],
                minSpotColor: config.skins[ skin ][ 'primary-color' ],
                maxSpotColor: config.skins[ skin ][ 'primary-color' ],
                highlightSpotColor: colors[ 'danger-color' ],
                lineWidth: '2',
                lineColor: config.skins[ skin ][ 'primary-color' ],
                fillColor: colors[ 'body-bg' ]
            }
        );

    };

    $.fn.tkSparkBar = function () {

        if (! this.length) return;

        this.text(this.find('span').text());

        this.sparkline(
            this.data('data') || "html", {
                type: 'bar',
                height: '70',
                barWidth: 10,
                barSpacing: 8,
                zeroAxis: false,
                stackedBarColor: [ config.skins[ skin ][ 'primary-color' ], colors[ 'default-light-color' ] ],
                colorMap: this.data('colors') ? [ config.skins[ skin ][ 'primary-color' ], colors[ 'success-color' ], colors[ 'danger-color' ], colors[ 'default-light-color' ] ] : [],
                enableTagOptions: true
            }
        );

    };

    $(".sparkline-bar").each(function () {
        $(this).tkSparkBar();
    });

    $(".sparkline-line").each(function () {
        $(this).tkSparkLine();
    });

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}]},{},["./lib/charts/js/sparkline/main.js"]);
