'use strict';

(function($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function() {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");

        //Masonary
        $('.gallery__container').masonry({
            columnWidth: '.grid-sizer',
            itemSelector: '.gc__item',
            gutter: 20
        });
    });




    //Canvas Menu
    $(".canvas__open").on('click', function() {
        $(".offcanvas-menu-wrapper").addClass("active");
        $(".offcanvas-menu-overlay").addClass("active");
    });

    $(".offcanvas-menu-overlay").on('click', function() {
        $(".offcanvas-menu-wrapper").removeClass("active");
        $(".offcanvas-menu-overlay").removeClass("active");
    });

    /*------------------
        Accordin Active
    --------------------*/
    $('.collapse').on('shown.bs.collapse', function() {
        $(this).prev().addClass('active');
    });

    $('.collapse').on('hidden.bs.collapse', function() {
        $(this).prev().removeClass('active');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".header__menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true,
        'closedSymbol': '<i class="fa fa-angle-right"></i>', // Character after collapsed parents.
        'openedSymbol': '<i class="fa fa-angle-up"></i>', // Character after expanded parents.
    });

    /*--------------------------
        Testimonial Slider
    ----------------------------*/
    $(".testimonial__slider").owlCarousel({
        loop: true,
        margin: 0,
        items: 2,
        dots: true,
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        responsive: {
            768: {
                items: 2,
            },
            0: {
                items: 1,
            }
        }
    });

    /*------------------
		Magnific
	--------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });

    $('.image-popup').magnificPopup({
        type: 'image'
    });

    /*-------------------
		Nice Select
	--------------------- */
    $("select").niceSelect();

    /*-------------------
		Datepicker
	--------------------- */
    $(".datepicker").datepicker({
        minDate: 0
    });

    /*-------------------
		Conversion Websocket API call
    --------------------- */
    let $code = $('#code');
    let $convertFrom = $('#cf');
    let $convertTo = $('#ct');
    $('#convert').on('click', function() {
        $('#convert').prop('disabled', true);
        const betCode = $code.val();
        const cF = $convertFrom.val();
        const cT = $convertTo.val();

        $('#error').text(" ")
        $('#games').text(" ")
        $('#cgames').text(" ")
        $('#response').text(" ")
        $('#status').text(" ")
        $('#bcode').text(" ")

        if (betCode === "") {
            $('#convert').prop('disabled', false);
            $('#error').text("Error: Booking Code Cannot be empty")
        } else {
            const _body = {
                code: betCode,
                from: cF,
                to: cT
            };
            const socket = io("http://127.0.0.1:5000/", { reconnection: false }, { reconnectionDelay: 100000 }, { transports: ['websocket'] }, { forceNew: false }, {
                reconnectionDelayMax: 100000,
            });

            socket.on('connect', function() {
                $('.loading-icon').removeClass('hide');
                $('#convert').attr("disabled", true);
                $('.cbp').text("Converting Code...");
                socket.emit('my event', _body);
            })
            socket.on('error', function(data) {
                $('#error').html('<b>Error:</b> ' + data['error'])
                $('.loading-icon').addClass('hide')
                $('#convert').attr("disabled", false);
                $('.cbp').text("Convert Code");
            })
            socket.on('game', function(data) {
                $('#games').html('<b>Total Number of Games</b>: ' + data['game'])
            })
            socket.on('my response', function(data) {
                $('#status').html(" ")
                $('#response').html('<b> Game: </b>' + data['my response'])
            })
            socket.on('status', function(data) {
                $('#status').html(data['status'])
            })
            socket.on('totalsuccess', function(data) {
                $('#cgames').html('<b>Total Games Successfully Converted</b>: ' + data['totalsuccess'])
            })
            socket.on('bcode', function(data) {
                $('#bcode').html('<b>' + cT + ' Booking Code: </b>' + data['bcode'])
                $('.loading-icon').addClass('hide')
                $('#convert').attr("disabled", false);
                $('.cbp').text("Convert Code");
            })
        }
        $('#convert').prop('disabled', false);
    });



})(jQuery);