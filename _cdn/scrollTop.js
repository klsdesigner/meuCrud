$(function(){
 
    $(document).on( 'scroll', function(){
 
        if ($(window).scrollTop() > 100) {
            $('.smoothscroll-top').addClass('show');
        } else {
            $('.smoothscroll-top').removeClass('show');
        }
    });
 
    $('.smoothscroll-top').on('click', scrollToTop);
});
 
function scrollToTop() {
    verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
    element = $('body');
    offset = element.offset();
    offsetTop = offset.top;
    $('html, body').animate({scrollTop: offsetTop}, 600, 'linear').animate({scrollTop:25},200).animate({scrollTop:0},150) .animate({scrollTop:0},50);
}

//$(document).ready(function () {
//
//    $('.scrollTop').hide();
//
//    $(window).scroll(function () {
//        if ($(this).scrollTop() > 0) {
//            $('.scrollTop').fadeIn();
//        } else {
//            $('.scrollTop').fadeOut();
//        }
//    });
//
//    $('.scrollTop').click(function () {
//        $('body').animate({
//            scrollTop: 0
//        }, 1000);
//    });
//
//// função para abrir janela tooltip
////    $(function () {
////        $('[data-toggle="tooltip"]').tooltip();
////    });
//
//
//});
