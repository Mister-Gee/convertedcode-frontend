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
		Update Conversion Unit
	--------------------- */

    function updateUnit(userId, conversionUnit) {
        $.ajax({
            url: "./includes/update-conversion-unit.php",
            type: "POST",
            data: { 'id': userId, 'conversionUnit': conversionUnit },
            success: function(data) {
                console.log(data);
            }
        });
    }

    /*-------------------
		Conversion Websocket API call
    --------------------- */
    let $code = $('#code');
    let $convertFrom = $('#cf');
    let $convertTo = $('#ct');
    let $unavailable = $('#unavailable');

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
        document.getElementById('unavailable-content').innerHTML = " "
        $unavailable.addClass('hide')


        let userId = $('#cvtdcd_id').text();
        let conversionUnit = $('#cvtdcd_cu').text();
        if (betCode === "") {
            $('#convert').prop('disabled', false);
            $('#error').text("Error: Booking Code Cannot be empty")
        } else {
            if (cF === cT) {
                $('#error').html('<b>Error:</b> You can\'t convert to the same Bookie')
                $('#bcode').html('<b>' + cT + ' Booking Code: </b>' + '<span id="copycode">' + betCode + '</span> <i class="fa fa-clipboard"></i>')

            } else {
                const _body = {
                    code: betCode,
                    from: cF,
                    to: cT
                };
                const socket = io("https://bet-converter.herokuapp.com/", { reconnection: false }, { reconnectionDelay: 100000 }, { transports: ['websocket'] }, { forceNew: false }, {
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
                    socket.disconnect()
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
                    $('#bcode').html('<b>' + cT + ' Booking Code: </b>' + '<span id="copycode">' + data['bcode'] + '</span> <i class="fa fa-clipboard"></i>')
                    $('.loading-icon').addClass('hide')
                    $('#convert').attr("disabled", false);
                    $('.cbp').text("Convert Code");
                    updateUnit(userId, conversionUnit);
                    let newUnit = conversionUnit - 1;
                    $('#cvtdcd_cu').html(newUnit);
                })
                socket.on('unavailable', function(data) {
                    if (data['unavailableGamesAndOptions'].length > 0) {
                        $unavailable.removeClass('hide')
                        document.getElementById('unavailable-content').innerHTML = data['unavailableGamesAndOptions'].map(item =>
                            `<div>
                        <div class="unavailable-item">${item.Team1} vs ${item.Team2} -
                            <strong>${item.Option}(${item.Selection}) </strong>
                        </div>
                    </div>`
                        ).join('')
                    }
                })
                socket.on('disconnect', function() {
                    socket.disconnect()
                    $('.loading-icon').addClass('hide')
                    $('#convert').attr("disabled", false);
                    $('.cbp').text("Convert Code");
                })
            }
            $('#convert').prop('disabled', false);
        }
    });

    function CopyMe(TextToCopy) {
        var TempText = document.createElement("input");
        TempText.value = TextToCopy;
        document.body.appendChild(TempText);
        TempText.select();

        document.execCommand("copy");
        document.body.removeChild(TempText);

        $("#successAlert").removeClass("hide")
        setTimeout(() => {
            $("#successAlert").addClass("hide")
        }, 3000)
    }

    $("#bcode").on("click", function() {
        let clipboard = $("#copycode").text();
        console.log(clipboard)
        CopyMe(clipboard);
    })

})(jQuery);

var slideIndex = 0;
showSlides();

function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) { slideIndex = 1 }
    slides[slideIndex - 1].style.display = "block";
    setTimeout(showSlides, 6000); // Change image every 2 seconds
}