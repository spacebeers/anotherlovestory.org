jQuery(document).ready(function () {
    jQuery(".nav-toogle").click(function () {
        jQuery("#mobile-menu").fadeToggle(200);
        jQuery('body').toggleClass('menu-open');
    });

    jQuery(".close").on('click', function(e) {
        e.preventDefault();
        jQuery('#newsletterModal').css('display', 'none');
    })

    jQuery('.fade').slick({
        dots: true,
        infinite: true,
        speed: 500,
        fade: true,
        adaptiveHeight: true,
        autoplay: true,
        cssEase: 'linear'
    });

    jQuery("#checkout-modal-open").click(function() {
        jQuery("#checkout-modal-open").modal({
            closeClass: 'icon-remove',
            closeText: 'x',
            fadeDuration: 100
        });
    });
});