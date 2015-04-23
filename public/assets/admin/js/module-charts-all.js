(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({"./lib/charts/js/main.js":[function(require,module,exports){
require('./morris/main');
require('./sparkline/main');
require('./flot/main');
require('./easy-pie/main');

},{"./easy-pie/main":"/Code/html/themekit-learning/lib/charts/js/easy-pie/main.js","./flot/main":"/Code/html/themekit-learning/lib/charts/js/flot/main.js","./morris/main":"/Code/html/themekit-learning/lib/charts/js/morris/main.js","./sparkline/main":"/Code/html/themekit-learning/lib/charts/js/sparkline/main.js"}],"/Code/html/themekit-learning/lib/charts/js/easy-pie/_easy-pie.js":[function(require,module,exports){
(function ($) {
    "use strict";

    var skin = require('../lib/_skin')();

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkEasyPie = function () {

        if (! this.length) return;

        if (!$.fn.easyPieChart) return;

        var color = config.skins[ skin ][ 'primary-color' ];
        if (this.is('.info')) color = colors[ 'info-color' ];
        if (this.is('.danger')) color = colors[ 'danger-color' ];
        if (this.is('.success')) color = colors[ 'success-color' ];
        if (this.is('.warning')) color = colors[ 'warning-color' ];
        if (this.is('.inverse')) color = colors[ 'inverse-color' ];

        this.easyPieChart({
            barColor: color,
            animate: ($('html').is('.ie') ? false : 3000),
            lineWidth: 4,
            size: 50
        });

    };

    $.each($('.easy-pie'), function (k, v) {
        $(this).tkEasyPie();
    });

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}],"/Code/html/themekit-learning/lib/charts/js/easy-pie/main.js":[function(require,module,exports){
require('./_easy-pie');
},{"./_easy-pie":"/Code/html/themekit-learning/lib/charts/js/easy-pie/_easy-pie.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_autoupdate.js":[function(require,module,exports){
(function ($) {

    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_live =
    {
        // chart data
        data: [],
        totalPoints: 300,
        updateInterval: 200,

        // we use an inline data source in the example, usually data would
        // be fetched from a server
        getRandomData: function () {
            if (this.data.length > 0)
                this.data = this.data.slice(1);

            // do a random walk
            while (this.data.length < this.totalPoints) {
                var prev = this.data.length > 0 ? this.data[ this.data.length - 1 ] : 50;
                var y = prev + Math.random() * 10 - 5;
                if (y < 0)
                    y = 0;
                if (y > 100)
                    y = 100;
                this.data.push(y);
            }

            // zip the generated y values with the x values
            var res = [];
            for (var i = 0; i < this.data.length; ++ i)
                res.push([ i, this.data[ i ] ]);
            return res;
        },

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            series: {
                grow: {active: false},
                shadowSize: 0,
                lines: {
                    show: true,
                    fill: true,
                    lineWidth: 2,
                    steps: false
                }
            },
            grid: {
                show: true,
                aboveData: false,
                color: colors[ 'default-light-color' ],
                labelMargin: 5,
                axisMargin: 0,
                borderWidth: 0,
                borderColor: null,
                minBorderMargin: 5,
                clickable: true,
                hoverable: true,
                autoHighlight: false,
                mouseActiveRadius: 20,
                backgroundColor: {}
            },
            colors: [],
            tooltip: true,
            tooltipOpts: {
                content: "Value is : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            },
            yaxis: {
                min: 0,
                max: 100,
                tickColor: '#efefef'
            },
            xaxis: {
                show: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (!wrapper.length) return;

            // apply styling
            charts.utility.applyStyle(this);

            this.plot = $.plot(wrapper, [ this.getRandomData() ], this.options);
            setTimeout(this.update, charts.chart_live.updateInterval);
        },

        // update
        update: function () {
            charts.chart_live.plot.setData([ charts.chart_live.getRandomData() ]);
            charts.chart_live.plot.draw();

            setTimeout(charts.chart_live.update, charts.chart_live.updateInterval);
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartLive = function () {

        if (! this.length) return;

        charts.chart_live.init(this);

    };

    $('[data-toggle="flot-chart-live"]').tkFlotChartLive();

})(jQuery);
},{"./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_bars-ordered.js":[function(require,module,exports){
(function ($) {

    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_ordered_bars =
    {
        // chart data
        data: null,

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            bars: {
                show: true,
                barWidth: 0.2,
                fill: 1
            },
            grid: {
                show: true,
                aboveData: false,
                color: colors[ 'default-light-color' ],
                labelMargin: 5,
                axisMargin: 0,
                borderWidth: 0,
                borderColor: null,
                minBorderMargin: 5,
                clickable: true,
                hoverable: true,
                autoHighlight: false,
                mouseActiveRadius: 20,
                backgroundColor: {}
            },
            series: {
                grow: {active: false}
            },
            legend: {
                position: "ne",
                backgroundColor: null,
                backgroundOpacity: 0,
                noColumns: 3
            },
            yaxis: {
                ticks: 3,
                tickColor: '#efefef'
            },
            xaxis: {
                ticks: 4,
                tickDecimals: 0,
                tickColor: 'transparent'
            },
            colors: [],
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            // apply styling
            charts.utility.applyStyle(this);

            //some data
            var d1 = [];
            for (var i = 0; i <= 10; i += 1)
                d1.push([ i, parseInt(Math.random() * 30) ]);

            var d2 = [];
            for (var j = 0; j <= 10; j += 1)
                d2.push([ j, parseInt(Math.random() * 30) ]);

            var d3 = [];
            for (var k = 0; k <= 10; k += 1)
                d3.push([ k, parseInt(Math.random() * 30) ]);

            var ds = [];

            ds.push({
                label: "Data One",
                data: d1,
                bars: {order: 1}
            });
            ds.push({
                label: "Data Two",
                data: d2,
                bars: {order: 2}
            });
            ds.push({
                label: "Data Three",
                data: d3,
                bars: {order: 3}
            });

            this.data = ds;

            this.plot = $.plot(wrapper, this.data, this.options);
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartOrderedBars = function () {

        if (! this.length) return;

        charts.chart_ordered_bars.init(this);

    };

    $('[data-toggle="flot-chart-ordered-bars"]').tkFlotChartOrderedBars();

})(jQuery);
},{"./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_bars-stacked.js":[function(require,module,exports){
(function ($) {

    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_stacked_bars =
    {
        // chart data
        data: null,

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            grid: {
                show: true,
                aboveData: false,
                color: colors[ 'default-light-color' ],
                labelMargin: 5,
                axisMargin: 0,
                borderWidth: 0,
                borderColor: null,
                minBorderMargin: 5,
                clickable: true,
                hoverable: true,
                autoHighlight: true,
                mouseActiveRadius: 20,
                backgroundColor: {}
            },
            series: {
                grow: {active: false},
                stack: 0,
                lines: {show: false, fill: true, steps: false},
                bars: {show: true, barWidth: 0.5, fill: 1}
            },
            yaxis: {
                ticks: 3,
                tickColor: '#efefef'
            },
            xaxis: {
                ticks: 11,
                tickDecimals: 0,
                tickColor: 'transparent'
            },
            legend: {
                position: "ne",
                backgroundColor: null,
                backgroundOpacity: 0,
                noColumns: 3
            },
            colors: [],
            shadowSize: 1,
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            // apply styling
            charts.utility.applyStyle(this);

            var d1 = [];
            for (var i = 0; i <= 10; i += 1)
                d1.push([ i, parseInt(Math.random() * 30) ]);

            var d2 = [];
            for (var j = 0; j <= 10; j += 1)
                d2.push([ j, parseInt(Math.random() * 20) ]);

            var d3 = [];
            for (var k = 0; k <= 10; k += 1)
                d3.push([ k, parseInt(Math.random() * 20) ]);

            this.data = [];

            this.data.push({
                label: "Data One",
                data: d1
            });
            this.data.push({
                label: "Data Two",
                data: d2
            });
            this.data.push({
                label: "Data Tree",
                data: d3
            });

            this.plot = $.plot(wrapper, this.data, this.options);
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartStackedBars = function () {

        if (! this.length) return;

        charts.chart_stacked_bars.init(this);

    };

    $('[data-toggle="flot-chart-stacked-bars"]').tkFlotChartStackedBars();

})(jQuery);
},{"./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_donut.js":[function(require,module,exports){
(function ($) {

    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_donut =
    {
        // chart data
        data: [
            {label: "USA", data: 38},
            {label: "Brazil", data: 23},
            {label: "India", data: 15},
            {label: "Turkey", data: 9},
            {label: "France", data: 7},
            {label: "China", data: 5},
            {label: "Germany", data: 3}
        ],

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            series: {
                pie: {
                    show: true,
                    innerRadius: 0.4,
                    highlight: {
                        opacity: 0.1
                    },
                    radius: 1,
                    stroke: {
                        color: '#fff',
                        width: 8
                    },
                    startAngle: 2,
                    combine: {
                        color: '#EEE',
                        threshold: 0.05
                    },
                    label: {
                        show: true,
                        radius: 1,
                        formatter: function (label, series) {
                            return '<div class="label label-default">' + label + '&nbsp;' + Math.round(series.percent) + '%</div>';
                        }
                    }
                },
                grow: {active: false}
            },
            legend: {show: false},
            grid: {
                hoverable: true,
                clickable: true,
                backgroundColor: {}
            },
            colors: [],
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.1" + "%",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            // apply styling
            charts.utility.applyStyle(this);

            this.plot = $.plot(wrapper, this.data, this.options);
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartDonut = function () {

        if (! this.length) return;

        charts.chart_donut.init(this);

    };

    $('[data-toggle="flot-chart-donut"]').tkFlotChartDonut();

})(jQuery);
},{"./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js":[function(require,module,exports){
var skin = require('../lib/_skin')();

var charts =
{
    // utility class
    utility: {
        chartColors: [ config.skins[ skin ][ 'primary-color' ], colors[ 'default-color' ], colors[ 'danger-color' ], colors[ 'success-color' ], colors[ 'warning-color' ] ],
        chartBackgroundColors: [ "rgba(255,255,255,0)", "rgba(255,255,255,0)" ],

        applyStyle: function (that) {
            that.options.colors = charts.utility.chartColors;
            that.options.grid.backgroundColor = { colors: charts.utility.chartBackgroundColors };
            that.options.grid.borderColor = charts.utility.chartColors[ 0 ];
            that.options.grid.color = charts.utility.chartColors[ 0 ];
        },

        // generate random number for charts
        randNum: function () {
            return (Math.floor(Math.random() * (1 + 40 - 20)) ) + 20;
        }
    }

};

module.exports = charts;
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_horizontal.js":[function(require,module,exports){
(function ($) {

    var skin = require('../lib/_skin')();
    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_horizontal_bars =
    {
        // chart data
        data: null,

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            grid: {
                color: "#dedede",
                borderWidth: 1,
                borderColor: "transparent",
                clickable: true,
                hoverable: true
            },
            series: {
                grow: {active: false},
                bars: {
                    show: true,
                    horizontal: true,
                    barWidth: 0.2,
                    fill: 1
                }
            },
            legend: {position: "nw", backgroundColor: null, backgroundOpacity: 0},
            yaxis: {
                ticks: 3,
                tickColor: 'transparent',
                tickFormatter: function (val, axis) {
                    return val + "k";
                }
            },
            xaxis: {
                ticks: 4,
                tickDecimals: 0
            },
            colors: [ config.skins[ skin ][ 'primary-color' ] ],
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (!wrapper.length) return;

            // apply styling
            // charts.utility.applyStyle(this);

            var d1 = [];
            for (var i = 1; i <= 5; i += 1)
                d1.push([ parseInt(Math.random() * 30), i ]);

            this.data = [];

            this.data.push({
                label: "Sales Volume",
                data: d1,
                bars: {
                    horizontal: true,
                    show: true,
                    barWidth: 0.5
                }
            });

            this.plot = $.plot(wrapper, this.data, this.options);
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartHorizontalBars = function () {

        if (! this.length) return;

        charts.chart_horizontal_bars.init(this);

    };

    $('[data-toggle="flot-chart-horizontal-bars"]').tkFlotChartHorizontalBars();

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js","./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_line.js":[function(require,module,exports){
(function ($) {

    var skin = require('../lib/_skin')();
    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_lines_fill_nopoints_3 =
    {
        // chart data
        data: {
            d1: []
        },

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            colors: [  colors[ 'success-color' ]],
            grid: {
                color: colors[ 'default-light-color' ],
                borderWidth: 1,
                borderColor: "transparent",
                clickable: true,
                hoverable: true
            },
            series: {
                grow: {active: false},
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 2,
                    steps: false,
                    color: config.skins[ skin ][ 'primary-color' ]
                },
                points: {show: false}
            },
            legend: {position: "nw", backgroundColor: null, backgroundOpacity: 0},
            yaxis: {
                ticks: 3,
                tickSize: 40,
                tickFormatter: function (val, axis) {
                    return val + "k";
                }
            },
            xaxis: {ticks: 4, tickDecimals: 0, tickColor: 'transparent'},
            shadowSize: 0,
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (!wrapper.length) return;

            // generate some data
            this.data.d1 = [ [ 1, 3 + charts.utility.randNum() ], [ 2, 6 + charts.utility.randNum() ], [ 3, 30 + charts.utility.randNum() ], [ 4, 110 + charts.utility.randNum() ], [ 5, 80 + charts.utility.randNum() ], [ 6, 18 + charts.utility.randNum() ], [ 7, 50 + charts.utility.randNum() ], [ 8, 15 + charts.utility.randNum() ], [ 9, 18 + charts.utility.randNum() ], [ 10, 60 + charts.utility.randNum() ], [ 11, 110 + charts.utility.randNum() ], [ 12, 27 + charts.utility.randNum() ], [ 13, 30 + charts.utility.randNum() ], [ 14, 33 + charts.utility.randNum() ], [ 15, 24 + charts.utility.randNum() ], [ 16, 80 + charts.utility.randNum() ], [ 17, 30 + charts.utility.randNum() ], [ 18, 33 + charts.utility.randNum() ], [ 19, 36 + charts.utility.randNum() ], [ 20, 39 + charts.utility.randNum() ], [ 21, 42 + charts.utility.randNum() ], [ 22, 70 + charts.utility.randNum() ], [ 23, 36 + charts.utility.randNum() ], [ 24, 39 + charts.utility.randNum() ], [ 25, 42 + charts.utility.randNum() ], [ 26, 45 + charts.utility.randNum() ], [ 27, 60 + charts.utility.randNum() ], [ 28, 51 + charts.utility.randNum() ], [ 29, 55 + charts.utility.randNum() ], [ 30, 100 + charts.utility.randNum() ] ];

            // make chart
            this.plot = $.plot(
                wrapper,
                [ {
                    label: "Net Revenue",
                    data: this.data.d1
                } ],
                this.options
            );
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartLines3 = function () {

        if (! this.length) return;

        charts.chart_lines_fill_nopoints_3.init(this);

    };

    $('[data-toggle="flot-chart-lines-3"]').tkFlotChartLines3();

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js","./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_line_fill_nopoints.js":[function(require,module,exports){
(function ($) {

    var skin = require('../lib/_skin')();
    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_lines_fill_nopoints =
    {
        // chart data
        data: {
            d1: [],
            d2: []
        },

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            grid: {
                show: true,
                aboveData: false,
                color: colors[ 'default-color' ],
                labelMargin: 5,
                axisMargin: 0,
                borderWidth: 0,
                borderColor: null,
                minBorderMargin: 5,
                clickable: true,
                hoverable: true,
                mouseActiveRadius: 20,
                backgroundColor: {}
            },
            series: {
                grow: {
                    active: false
                },
                lines: {
                    show: true,
                    fill: true,
                    lineWidth: 2,
                    steps: false
                },
                points: {
                    show: false
                }
            },
            legend: {
                position: "nw",
                noColumns: 2
            },
            yaxis: {
                ticks: 4,
                tickDecimals: 0,
                tickColor: '#efefef'
            },
            xaxis: {
                ticks: 11,
                tickDecimals: 0,
                tickColor: 'transparent'
            },
            colors: [],
            shadowSize: 1,
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            // apply styling
            charts.utility.applyStyle(this);

            // generate some data
            this.data.d1 = [ [ 1, 3 + charts.utility.randNum() ], [ 2, 6 + charts.utility.randNum() ], [ 3, 9 + charts.utility.randNum() ], [ 4, 12 + charts.utility.randNum() ], [ 5, 15 + charts.utility.randNum() ], [ 6, 18 + charts.utility.randNum() ], [ 7, 21 + charts.utility.randNum() ], [ 8, 15 + charts.utility.randNum() ], [ 9, 18 + charts.utility.randNum() ], [ 10, 21 + charts.utility.randNum() ], [ 11, 24 + charts.utility.randNum() ], [ 12, 27 + charts.utility.randNum() ], [ 13, 30 + charts.utility.randNum() ], [ 14, 33 + charts.utility.randNum() ], [ 15, 24 + charts.utility.randNum() ], [ 16, 27 + charts.utility.randNum() ], [ 17, 30 + charts.utility.randNum() ], [ 18, 33 + charts.utility.randNum() ], [ 19, 36 + charts.utility.randNum() ], [ 20, 39 + charts.utility.randNum() ], [ 21, 42 + charts.utility.randNum() ], [ 22, 45 + charts.utility.randNum() ], [ 23, 36 + charts.utility.randNum() ], [ 24, 39 + charts.utility.randNum() ], [ 25, 42 + charts.utility.randNum() ], [ 26, 45 + charts.utility.randNum() ], [ 27, 38 + charts.utility.randNum() ], [ 28, 51 + charts.utility.randNum() ], [ 29, 55 + charts.utility.randNum() ], [ 30, 60 + charts.utility.randNum() ] ];
            this.data.d2 = [ [ 1, charts.utility.randNum() - 5 ], [ 2, charts.utility.randNum() - 4 ], [ 3, charts.utility.randNum() - 4 ], [ 4, charts.utility.randNum() ], [ 5, 4 + charts.utility.randNum() ], [ 6, 4 + charts.utility.randNum() ], [ 7, 5 + charts.utility.randNum() ], [ 8, 5 + charts.utility.randNum() ], [ 9, 6 + charts.utility.randNum() ], [ 10, 6 + charts.utility.randNum() ], [ 11, 6 + charts.utility.randNum() ], [ 12, 2 + charts.utility.randNum() ], [ 13, 3 + charts.utility.randNum() ], [ 14, 4 + charts.utility.randNum() ], [ 15, 4 + charts.utility.randNum() ], [ 16, 4 + charts.utility.randNum() ], [ 17, 5 + charts.utility.randNum() ], [ 18, 5 + charts.utility.randNum() ], [ 19, 2 + charts.utility.randNum() ], [ 20, 2 + charts.utility.randNum() ], [ 21, 3 + charts.utility.randNum() ], [ 22, 3 + charts.utility.randNum() ], [ 23, 3 + charts.utility.randNum() ], [ 24, 2 + charts.utility.randNum() ], [ 25, 4 + charts.utility.randNum() ], [ 26, 4 + charts.utility.randNum() ], [ 27, 5 + charts.utility.randNum() ], [ 28, 2 + charts.utility.randNum() ], [ 29, 2 + charts.utility.randNum() ], [ 30, 3 + charts.utility.randNum() ] ];

            // make chart
            this.plot = $.plot(
                wrapper,
                [ {
                    label: "Visits",
                    data: this.data.d1
                },
                {
                    label: "Unique Visits",
                    data: this.data.d2
                } ],
                this.options
            );
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartLines1 = function () {

        if (! this.length) return;

        charts.chart_lines_fill_nopoints.init(this);

    };

    $('[data-toggle="flot-chart-lines-1"]').tkFlotChartLines1();

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js","./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_line_fill_nopoints_2.js":[function(require,module,exports){
(function ($) {

    var skin = require('../lib/_skin')();
    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_lines_fill_nopoints_2 =
    {
        // chart data
        data: {
            d1: []
        },

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            colors: [ config.skins[ skin ][ 'primary-color' ] ],
            grid: {
                color: colors[ 'default-light-color' ],
                borderWidth: 1,
                borderColor: "transparent",
                clickable: true,
                hoverable: true
            },
            series: {
                grow: {active: false},
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 5,
                    steps: false,
                    color: config.skins[ skin ][ 'primary-color' ]
                },
                points: {show: false}
            },
            legend: {position: "nw", backgroundColor: null, backgroundOpacity: 0},
            yaxis: {
                ticks: 3,
                tickSize: 40,
                tickFormatter: function (val, axis) {
                    return val + "k";
                }
            },
            xaxis: {
                ticks: 4,
                tickDecimals: 0,
                tickColor: 'transparent'
            },
            shadowSize: 0,
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            // generate some data
            this.data.d1 = [ [ 1, 3 + charts.utility.randNum() ], [ 2, 6 + charts.utility.randNum() ], [ 3, 30 + charts.utility.randNum() ], [ 4, 110 + charts.utility.randNum() ], [ 5, 80 + charts.utility.randNum() ], [ 6, 18 + charts.utility.randNum() ], [ 7, 50 + charts.utility.randNum() ], [ 8, 15 + charts.utility.randNum() ], [ 9, 18 + charts.utility.randNum() ], [ 10, 60 + charts.utility.randNum() ], [ 11, 110 + charts.utility.randNum() ], [ 12, 27 + charts.utility.randNum() ], [ 13, 30 + charts.utility.randNum() ], [ 14, 33 + charts.utility.randNum() ], [ 15, 24 + charts.utility.randNum() ], [ 16, 80 + charts.utility.randNum() ], [ 17, 30 + charts.utility.randNum() ], [ 18, 33 + charts.utility.randNum() ], [ 19, 36 + charts.utility.randNum() ], [ 20, 39 + charts.utility.randNum() ], [ 21, 42 + charts.utility.randNum() ], [ 22, 70 + charts.utility.randNum() ], [ 23, 36 + charts.utility.randNum() ], [ 24, 39 + charts.utility.randNum() ], [ 25, 42 + charts.utility.randNum() ], [ 26, 45 + charts.utility.randNum() ], [ 27, 60 + charts.utility.randNum() ], [ 28, 51 + charts.utility.randNum() ], [ 29, 55 + charts.utility.randNum() ], [ 30, 100 + charts.utility.randNum() ] ];

            // make chart
            this.plot = $.plot(
                wrapper,
                [ {
                    label: "Net Revenue",
                    data: this.data.d1
                } ],
                this.options
            );
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartLines2 = function () {

        if (! this.length) return;

        charts.chart_lines_fill_nopoints_2.init(this);

    };

    $('[data-toggle="flot-chart-lines-2"]').tkFlotChartLines2();

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js","./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_mixed.js":[function(require,module,exports){
(function ($) {

    var skin = require('../lib/_skin')();
    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_mixed_1 =
    {
        // chart data
        data: {
            d1: []
        },

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            colors: [ "#dedede", config.skins[ skin ][ 'primary-color' ] ],
            grid: {
                color: "#dedede",
                borderWidth: 1,
                borderColor: "transparent",
                clickable: true,
                hoverable: true
            },
            series: {
                grow: {active: false},
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 2,
                    steps: false,
                    color: config.skins[ skin ][ 'primary-color' ]
                },
                points: {show: false}
            },
            legend: {position: "nw", backgroundColor: null, backgroundOpacity: 0},
            yaxis: {
                ticks: 3,
                tickSize: 40,
                tickFormatter: function (val, axis) {
                    return val + "k";
                }
            },
            xaxis: {ticks: 4, tickDecimals: 0, tickColor: 'transparent'},
            shadowSize: 0,
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.0",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            // generate some data
            this.data.d1 = [ [ 1, 3 + charts.utility.randNum() ], [ 2, 6 + charts.utility.randNum() ], [ 3, 30 + charts.utility.randNum() ], [ 4, 110 + charts.utility.randNum() ], [ 5, 80 + charts.utility.randNum() ], [ 6, 18 + charts.utility.randNum() ], [ 7, 50 + charts.utility.randNum() ], [ 8, 15 + charts.utility.randNum() ], [ 9, 18 + charts.utility.randNum() ], [ 10, 60 + charts.utility.randNum() ], [ 11, 110 + charts.utility.randNum() ], [ 12, 27 + charts.utility.randNum() ], [ 13, 30 + charts.utility.randNum() ] ];

            // make chart
            this.plot = $.plot(
                wrapper,
                [ {
                    label: "Net Revenue",
                    data: this.data.d1,
                    bars: {show: true, fill: 1, barWidth: 0.75, align: "center"}
                },
                {
                    data: this.data.d1,
                    lines: {show: true, fill: false},
                    points: {
                        show: true,
                        radius: 5,
                        symbol: "circle",
                        fill: true,
                        fillColor: config.skins[ skin ][ 'primary-color' ],
                        borderColor: "#fff"
                    }
                } ],
                this.options
            );
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartMixed = function () {

        if (! this.length) return;

        charts.chart_mixed_1.init(this);

    };

    $('[data-toggle="flot-chart-mixed"]').tkFlotChartMixed();

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js","./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_pie.js":[function(require,module,exports){
(function ($) {

    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_pie =
    {
        // chart data
        data: [
            {label: "USA", data: 38},
            {label: "Brazil", data: 23},
            {label: "India", data: 15},
            {label: "Turkey", data: 9},
            {label: "France", data: 7},
            {label: "China", data: 5},
            {label: "Germany", data: 3}
        ],

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            series: {
                pie: {
                    show: true,
                    highlight: {
                        opacity: 0.1
                    },
                    radius: 1,
                    stroke: {
                        color: '#fff',
                        width: 2
                    },
                    startAngle: 2,
                    combine: {
                        color: '#353535',
                        threshold: 0.05
                    },
                    label: {
                        show: true,
                        radius: 1,
                        formatter: function (label, series) {
                            return '<div class="label label-default">' + label + '&nbsp;' + Math.round(series.percent) + '%</div>';
                        }
                    }
                },
                grow: {active: false}
            },
            colors: [],
            legend: {show: false},
            grid: {
                hoverable: true,
                clickable: true,
                backgroundColor: {}
            },
            tooltip: true,
            tooltipOpts: {
                content: "%s : %y.1" + "%",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            // apply styling
            charts.utility.applyStyle(this);

            this.plot = $.plot(wrapper, this.data, this.options);
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartPie = function () {

        if (! this.length) return;

        charts.chart_pie.init(this);

    };

    $('[data-toggle="flot-chart-pie"]').tkFlotChartPie();

})(jQuery);
},{"./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/_simple.js":[function(require,module,exports){
(function ($) {

    var skin = require('../lib/_skin')();
    var charts = require('./_helper');

    if (typeof charts == 'undefined')
        return;

    charts.chart_simple =
    {
        // data
        data: {
            sin: [],
            cos: []
        },

        // will hold the chart object
        plot: null,

        // chart options
        options: {
            colors: [ config.skins[ skin ][ 'primary-color' ], colors[ 'default-color' ] ],
            grid: {
                color: colors[ 'default-light-color' ],
                borderWidth: 1,
                borderColor: "transparent",
                clickable: true,
                hoverable: true
            },
            series: {
                grow: {active: false},
                lines: {
                    show: true,
                    fill: false,
                    lineWidth: 4,
                    steps: false
                },
                points: {
                    show: true,
                    radius: 5,
                    symbol: "circle",
                    fill: true,
                    borderColor: "#fff"
                }
            },
            legend: {position: "se", backgroundColor: null, backgroundOpacity: 0, noColumns: 2},
            shadowSize: 0,
            yaxis: {ticks: 3},
            xaxis: {ticks: 4, tickDecimals: 0, tickColor: 'transparent'},
            tooltip: true, //activate tooltip
            tooltipOpts: {
                content: "%s : %y.3",
                shifts: {
                    x: - 30,
                    y: - 50
                },
                defaultTheme: false
            }
        },

        // initialize
        init: function (wrapper) {

            if (! wrapper.length) return;

            if (this.plot === null) {
                for (var i = 0; i < 14; i += 0.5) {
                    this.data.sin.push([ i, Math.sin(i) ]);
                    this.data.cos.push([ i, Math.cos(i) ]);
                }
            }
            this.plot = $.plot(
                wrapper,
                [ {
                    label: "Sin",
                    data: this.data.sin,
                    lines: {fillColor: colors[ 'default-color' ]},
                    points: {fillColor: "#fff"}
                },
                {
                    label: "Cos",
                    data: this.data.cos,
                    lines: {fillColor: "#444"},
                    points: {fillColor: "#fff"}
                } ],
                this.options
            );
        }
    };

    /**
     * jQuery plugin wrapper for compatibility with Angular UI.Utils: jQuery Passthrough
     */
    $.fn.tkFlotChartSimple = function () {

        if (! this.length) return;

        charts.chart_simple.init(this);

    };

    $('[data-toggle="flot-chart-simple"]').tkFlotChartSimple();

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js","./_helper":"/Code/html/themekit-learning/lib/charts/js/flot/_helper.js"}],"/Code/html/themekit-learning/lib/charts/js/flot/main.js":[function(require,module,exports){
require('./_simple');
require('./_mixed');
require('./_line');
require('./_horizontal');
require('./_line_fill_nopoints');
require('./_line_fill_nopoints_2');
require('./_bars-ordered');
require('./_donut');
require('./_bars-stacked');
require('./_pie');
require('./_autoupdate');
},{"./_autoupdate":"/Code/html/themekit-learning/lib/charts/js/flot/_autoupdate.js","./_bars-ordered":"/Code/html/themekit-learning/lib/charts/js/flot/_bars-ordered.js","./_bars-stacked":"/Code/html/themekit-learning/lib/charts/js/flot/_bars-stacked.js","./_donut":"/Code/html/themekit-learning/lib/charts/js/flot/_donut.js","./_horizontal":"/Code/html/themekit-learning/lib/charts/js/flot/_horizontal.js","./_line":"/Code/html/themekit-learning/lib/charts/js/flot/_line.js","./_line_fill_nopoints":"/Code/html/themekit-learning/lib/charts/js/flot/_line_fill_nopoints.js","./_line_fill_nopoints_2":"/Code/html/themekit-learning/lib/charts/js/flot/_line_fill_nopoints_2.js","./_mixed":"/Code/html/themekit-learning/lib/charts/js/flot/_mixed.js","./_pie":"/Code/html/themekit-learning/lib/charts/js/flot/_pie.js","./_simple":"/Code/html/themekit-learning/lib/charts/js/flot/_simple.js"}],"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js":[function(require,module,exports){
module.exports = (function () {
    var skin = $.cookie('skin');

    if (typeof skin == 'undefined') {
        skin = 'default';
    }
    return skin;
});
},{}],"/Code/html/themekit-learning/lib/charts/js/morris/_area.js":[function(require,module,exports){
(function ($) {
    "use strict";

    $.fn.tkMorrisChartArea = function () {

        if (! this.length) return;

        if (! this.attr('id')) return;

        var skin = require('../lib/_skin')();

        this.empty();

        new Morris.Area({
            lineColors: [ config.skins[ skin ][ 'primary-color' ], colors[ 'danger-color' ] ],
            pointFillColors: config.skins[ skin ][ 'primary-color' ],
            fillOpacity: '0.3',
            element: this.attr('id'),
            data: [
                {y: '1.1.', a: 30, b: 90},
                {y: '2.1.', a: 35, b: 65},
                {y: '3.1.', a: 50, b: 40},
                {y: '4.1.', a: 75, b: 65},
                {y: '5.1.', a: 50, b: 40},
                {y: '6.1.', a: 75, b: 65},
                {y: '7.1.', a: 60, b: 90}
            ],
            xkey: 'y',
            ykeys: [ 'a' ],
            labels: [ 'Series A' ],
            gridTextColor: colors[ 'default-color' ],
            gridTextWeight: 'bold',
            resize: true
        });

    };

    $(function () {

        $('[data-toggle="morris-chart-area"]').tkMorrisChartArea();

        $('[data-skin]').on('click', function () {
            $('[data-toggle="morris-chart-area"]').tkMorrisChartArea();
        });

    });

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}],"/Code/html/themekit-learning/lib/charts/js/morris/_bar.js":[function(require,module,exports){
(function ($) {
    "use strict";

    $.fn.tkMorrisChartBar = function () {

        if (! this.length) return;

        if (! this.attr('id')) return;

        var skin = require('../lib/_skin')();

        this.empty();

        new Morris.Bar({
            barColors: [ config.skins[ skin ][ 'primary-color' ], colors[ 'default-color' ], colors[ 'danger-color' ] ],
            element: this.attr('id'),
            data: [
                {y: '2006', a: 100, b: 90, c: 40},
                {y: '2007', a: 75, b: 65, c: 100},
                {y: '2008', a: 50, b: 40, c: 30},
                {y: '2009', a: 75, b: 65, c: 85},
                {y: '2010', a: 50, b: 40, c: 45},
                {y: '2011', a: 75, b: 65, c: 90},
                {y: '2012', a: 100, b: 90, c: 80}
            ],
            gridTextColor: colors[ 'default-color' ],
            gridTextWeight: 'bold',
            resize: true,
            xkey: 'y',
            ykeys: [ 'a', 'b', 'c' ],
            labels: [ 'Series A', 'Series B', 'Series C' ]
        });
    };

    $(function () {

        $('[data-toggle="morris-chart-bar"]').tkMorrisChartBar();

        $('[data-skin]').on('click', function(){

            $('[data-toggle="morris-chart-bar"]').tkMorrisChartBar();

        });

    });

})(jQuery);

},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}],"/Code/html/themekit-learning/lib/charts/js/morris/_donut.js":[function(require,module,exports){
(function ($) {
    "use strict";

    $.fn.tkMorrisChartDonut = function () {

        if (! this.length) return;

        if (! this.attr('id')) return;

        var skin = require('../lib/_skin')();

        this.empty();

        new Morris.Donut({
            element: this.attr('id'),
            colors: [ colors[ 'danger-color' ], config.skins[ skin ][ 'primary-color' ], colors[ 'default-color' ] ],
            data: [
                {label: "Download Sales", value: 12},
                {label: "In-Store Sales", value: 30},
                {label: "Mail-Order Sales", value: 20}
            ]
        });

    };

    $(function () {

        $('[data-toggle="morris-chart-donut"]').tkMorrisChartDonut();

        $('[data-skin]').on('click', function(){

            $('[data-toggle="morris-chart-donut"]').tkMorrisChartDonut();

        });

    });

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}],"/Code/html/themekit-learning/lib/charts/js/morris/_line.js":[function(require,module,exports){
(function ($) {
    "use strict";

    $.fn.tkMorrisChartLine = function () {

        if (! this.length) return;

        if (! this.attr('id')) return;

        var skin = require('../lib/_skin')();

        this.empty();

        new Morris.Line({
            lineColors: [ config.skins[ skin ][ 'primary-color' ], colors[ 'danger-color' ] ],
            pointFillColors: [ config.skins[ skin ][ 'primary-color' ], colors[ 'danger-color' ] ],
            pointStrokeColors: [ '#ffffff', '#ffffff' ],
            gridTextColor: colors[ 'default-color' ],
            gridTextWeight: 'bold',

            // ID of the element in which to draw the chart.
            element: this.attr('id'),
            // Chart data records -- each entry in this array corresponds to a point on
            // the chart.
            data: [
                {date: '2014-02', a: 2000, b: 2400},
                {date: '2014-03', a: 1200, b: 2500},
                {date: '2014-04', a: 3200, b: 2000},
                {date: '2014-05', a: 1600, b: 1440},
                {date: '2014-06', a: 1290, b: 2830},
                {date: '2014-07', a: 1930, b: 1200},
                {date: '2014-08', a: 2120, b: 3000}
            ],
            // The name of the data record attribute that contains x-values.
            xkey: 'date',
            // A list of names of data record attributes that contain y-values.
            ykeys: [ 'a', 'b' ],
            // Labels for the ykeys -- will be displayed when you hover over the
            // chart.
            labels: [ 'Series A', 'Series B' ],
            resize: true
        });

    };

    $(function () {

        $('[data-toggle="morris-chart-line"]').tkMorrisChartLine();

        $('[data-skin]').on('click', function(){

            $('[data-toggle="morris-chart-line"]').tkMorrisChartLine();

        });

    });

})(jQuery);
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}],"/Code/html/themekit-learning/lib/charts/js/morris/main.js":[function(require,module,exports){
require('./_area');
require('./_bar');
require('./_donut');
require('./_line');
},{"./_area":"/Code/html/themekit-learning/lib/charts/js/morris/_area.js","./_bar":"/Code/html/themekit-learning/lib/charts/js/morris/_bar.js","./_donut":"/Code/html/themekit-learning/lib/charts/js/morris/_donut.js","./_line":"/Code/html/themekit-learning/lib/charts/js/morris/_line.js"}],"/Code/html/themekit-learning/lib/charts/js/sparkline/_sparkline.js":[function(require,module,exports){
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
},{"../lib/_skin":"/Code/html/themekit-learning/lib/charts/js/lib/_skin.js"}],"/Code/html/themekit-learning/lib/charts/js/sparkline/main.js":[function(require,module,exports){
require('./_sparkline');

},{"./_sparkline":"/Code/html/themekit-learning/lib/charts/js/sparkline/_sparkline.js"}]},{},["./lib/charts/js/main.js"]);
