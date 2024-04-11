import './bootstrap';

new Swiper('.swiper-logo', {
    // Optional parameters

    loop: true,
    slidesPerView: 1,
    spaceBetween: 100,
    speed: 400,

    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});


new Swiper('.swiper', {
    // Optional parameters

    loop: true,
    slidesPerView: 4,
    spaceBetween: 40,
    speed: 400,

    scrollbar: {
        el: '.swiper-scrollbar',
        draggable: true
    }

});



