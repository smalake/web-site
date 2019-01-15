$(function(){
    $('#main_menu p').on('click', function() {
        $(this).next().slideToggle();
        $(this).toggleClass("open");
    });
});