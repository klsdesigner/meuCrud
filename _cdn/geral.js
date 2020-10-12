$(document).ready(function () {
    
    $('.navbar-dark .dmenu').hover(function () {
        $(this).find('.sm-menu').first().stop(true, true).slideDown(10);
    }, function () {
        $(this).find('.sm-menu').first().stop(true, true).slideUp(15)
    });
    
});


