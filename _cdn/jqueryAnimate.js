//$(document).ready(function(){
//    
//    $('.logoImg').each(function() {
//        animationHover(this, 'bounce');
//    });
//    
//});

//$(document).scroll(function () {
//    if ($(this).scrollTop() > 500) {
//
//        $('#titulo').addClass('animated bounceInLeft');
//        $('#conteudo').addClass('animated bounceInRight');
//        $('#ret').addClass('animated flip');
//        $('#ret1').addClass('animated jackInTheBox');
//
//    }
//});

$(window).scroll(function () {
    if ($(window).scrollTop() > 1000) {
        $('#titulo').addClass('animated bounceInLeft');
        $('#conteudo').addClass('animated bounceInRight');
        $('#titulo1').addClass('animated bounceInLeft');
        $('#ret').addClass('animated fadeInUpBig');
        $('#ret1').addClass('animated fadeInUpBig');
        $('#ret2').addClass('animated fadeInUpBig');
        $('#ret3').addClass('animated fadeInUpBig');
    } else {    
        $('#titulo').removeClass('animated bounceInLeft');
        $('#conteudo').removeClass('animated bounceInRight');
        $('#titulo1').addClass('animated bounceInLeft');
        $('#ret').removeClass('animated fadeInUpBig');
        $('#ret1').removeClass('animated fadeInUpBig');
        $('#ret2').removeClass('animated fadeInUpBig');
        $('#ret3').removeClass('animated fadeInUpBig');
    }
});



