
$(document).ready(function () {

    // Burger menu
    $('.header__burger').on('click', function () {
        $('.header__burger,.header__nav').toggleClass('active');
        $('.body').toggleClass('lock');
    });

    // Header sub-menu spoiler
    $('.drop-btn').on('click', function () {

        if ($('.header__wrapper').hasClass('one')) {
            $('.drop-btn').not($(this)).removeClass('active');
            $('.header__sub-list').not($(this).next()).slideUp(300);
        }
        
        
        $(this).toggleClass('active').next().slideToggle(300);
    });

    // Spoiler FAQ
    $('.faq__subtitle').on('click', function () {
        if ($('.faq').hasClass('one')) {
            $('.faq__subtitle').not($(this)).removeClass('active');
            $('.faq__text').not($(this).next()).slideUp(200);
        }
        $(this).toggleClass('active').next().slideToggle(200);
    });

    // Roi page saving__bar
    $('.saving__bar').each(function(){
        $(this).find('.saving__bar-bar').animate({
            width:$(this).attr('data-percent')
        }, 4000);
    });

    // Roi page counter
    $(this).prop('Counter', 0).animate({
        Counter:$(this).text()
    },{
        duration: 4000,
        easing: 'swing',
        step: function(now) {
            $(this).text(Math.ceil(now));
        }
    });


});


// Waves button effect
// Waves.attach('.button');
// Waves.init();