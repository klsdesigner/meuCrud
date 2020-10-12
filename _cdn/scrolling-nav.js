//jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(this).scrollTop() > 150) {
        $(".navbar").addClass("fixed-top");
    } else {        
        $(".navbar").removeClass("fixed-top");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 2000, 'easeInOutExpo');
        event.preventDefault();
    });
});
