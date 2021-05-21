// =================== nav ==================
// =================== slider ==================
$(function () {
    $('#slider').owlCarousel({
        items: 2,
        autoplay: true,
        loop: true,
        autoplayTimeout: 5000,
        autoplaySpeed: 5000,
    });
})

// ==================== goTop ===================
$(function () {
    $('#goTop').click(function () {
        $('html,body').animate({ scrollTop: 0 }, 'slow');
        return false;
    });

    $(window).scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('#goTop').fadeIn();
        } else {
            $('#goTop').fadeOut();
        }
    });
});



//=============== restaurant ====================

