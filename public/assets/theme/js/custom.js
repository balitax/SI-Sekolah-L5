jQuery(document).ready(function($) {

    function toolTipInit() {

        $('.social-icons li a').tooltip({
            placement: 'top'
        });
        $('.grid-event-header a').tooltip({
            placement: 'top'
        });
        $('.pesan-paket-form input').tooltip({
            placement: 'top'
        })
    }

    toolTipInit();

    $('#tabs').tab();

    function initSuperFish() {

        $(".sf-menu").superfish({
            delay: 0,
            autoArrows: true,
            //cssArrows: true
        });

        // Replace SuperFish CSS Arrows to Font Awesome Icons
        $('nav > ul.sf-menu > li').each(function() {
            $(this).find('.sf-with-ul').append('<i class="fa fa-angle-down"></i>');
        });
    }

    initSuperFish();

    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "fade",
            touch: true,
            controlNav: false,
            prevText: "&nbsp;",
            nextText: "&nbsp;"
        });
    });

    $('.carousel').carousel({
        interval: 300
    })



    /************** FancyBox *********************/
    $(".fancybox").fancybox({
        padding: 5,
        titlePosition: 'over'
    });



    /************** pSlider *********************/

    $('#slider-testimonials').pSlider({
        slider: $('#slider-testimonials ul li'),
        visible: 1,
        button: {
            next: $('#slider-testimonials .next'),
            prev: $('#slider-testimonials .prev')
        }
    });



    /************** mixitup *********************/
    $('#Grid').mixitup({
        effects: ['fade', 'grayscale'],
        easing: 'snap',
        transitionSpeed: 400
    });




    /*------------------------------------------------------------------------*/
    /*	2.	Site Specific Functions
/*------------------------------------------------------------------------*/


    $('.sub-menu').addClass('animated fadeInRight');




    /************** Responsive Navigation *********************/

    $('.menu-toggle-btn').click(function() {
        $('.responsive_menu').stop(true, true).slideToggle();
    });


    $('.thumb-small-gallery').addClass('closed');

    $('.thumb-small-gallery').hover(function() {
        var elem = $(this);
        elem.removeClass('closed');
        elem.css({
            opacity: 1
        });
        $('.gallery-small-thumbs .closed').css({
            opacity: 0.7
        });
    }, function() {
        var elem = $(this);
        elem.addClass('closed');
        $('.gallery-small-thumbs .closed').css({
            opacity: 1
        });
    });


});

// ========   DatePicker
var nowTemp = new Date();
var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

var checkin = $('#tgl_berangkat').datepicker({
    onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    if (ev.date.valueOf() > checkout.date.valueOf()) {
        var newDate = new Date(ev.date)
        newDate.setDate(newDate.getDate() + 1);
        checkout.setValue(newDate);
    }
    checkin.hide();

$('#tgl_pulang')[0].focus();

}).data('datepicker');
var checkout = $('#tgl_pulang').datepicker({
    onRender: function(date) {
        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    }
}).on('changeDate', function(ev) {
    checkout.hide();
}).data('datepicker');