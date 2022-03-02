// Menu Mobile
$('.header__menu-mobile-btn').click(() => {
    const menuList = $('.header__menu-mobile-menu-list');
    const icon = $('.header__menu-mobile-btn').find('i');

    if(menuList.is(':hidden') == true){
        icon.removeClass('fa-bars');
        icon.addClass('fa-times');

        menuList.slideToggle();
    } else {
        icon.removeClass('fa-times');
        icon.addClass('fa-bars');

        menuList.slideToggle();
    }
});

const url = 'http://localhost/website-php/';
const menuLinks = document.querySelectorAll(`header a[href^="${url}#"]`);

menuLinks.forEach(link => link.addEventListener('click', scrollOnClick));

function scrollOnClick(event){
    const target = event.target;
    const idElement = $(target).attr('href').split('/');

    const distance = $(idElement[4]).offset().top;
    $('html, body').animate({
        scrollTop: distance
    });
}