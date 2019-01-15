$('.slider').slick({
    autoplay:true,
    autoplaySpeed:5000,
    dots:true,
    asNavFor: '.thumb',
});
$('.thumb').slick({
    asNavFor: '.slider',
    focusOnSelect: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: false
});
$(function(){
    $('#main_menu p').on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass("open");
    });
});
$(function() {
    $('.navToggle').click(function() {
        $(this).toggleClass('active');

        if ($(this).hasClass('active')) {
            $('.globalMenuSp').addClass('active');
        } else {
            $('.globalMenuSp').removeClass('active');
        }
    });
});