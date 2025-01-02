// Activation du carrousel Owl
$(document).ready(function () {
    $('#testimonials-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        items: 1,
        autoplay: true,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
    });

    // Smooth scrolling pour le menu
    $(".smoothScroll").on('click', function (event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top - 50
            }, 800);
        }
    });

    // Fonctionnalité de la navigation sticky
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.navbar').addClass('navbar-sticky');
        } else {
            $('.navbar').removeClass('navbar-sticky');
        }
    });

    // Formulaire de contact (message de confirmation)
    $('form.contact-form').on('submit', function (e) {
        e.preventDefault();
        alert("Merci pour votre message !");
        this.reset(); // Réinitialiser le formulaire après l'envoi
    });
});



