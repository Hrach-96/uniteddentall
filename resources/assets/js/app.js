$(".js-navigation-slide-open").on('click', function () {
    $(".navigation-slide-overlay").fadeToggle();
    $("body").toggleClass("overflow-hidden");
    $(".navigation-slide").toggleClass('active');
});
$(".js-navigation-slide-close, .navigation-slide-overlay").on('click', function () {
    $(".navigation-slide-overlay").fadeOut();
    $("body").removeClass("overflow-hidden");
    $(".navigation-slide").removeClass('active');
});
$(".js-filter-open").on('click', function () {
    $(".navigation-slide-overlay").fadeToggle();
    $("body").toggleClass("overflow-hidden");
    $(".filter-sidebar").toggleClass('active');
});
$(".js-filter-close, .navigation-slide-overlay").on('click', function () {
    $(".navigation-slide-overlay").fadeOut();
    $("body").removeClass("overflow-hidden");
    $(".filter-sidebar").removeClass('active');
});
// Dropdown toggle fuction
$('.dropdown-toggle').click(function(){
    $('.dropdown-toggle').removeClass('active');
    $('.dropdown-menu').removeClass('active');
    $(this).toggleClass('active');
    $(this).find('.dropdown-menu').toggleClass('active');
    if($(window).width() <= 767){
        return false;
    }
});
//Hide dropdown on page click
$(document).on('click', function (e) {
    if(!$(".dropdown-toggle").is(e.target) && !$(".dropdown-toggle").has(e.target).length){
        $('.dropdown-toggle').removeClass('active');
        $('.dropdown-menu').removeClass('active');
    }
});

$(window).bind('orientationchange', function (event) {
    location.reload(true);
})