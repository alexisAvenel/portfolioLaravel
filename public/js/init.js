$(document).ready(function() {

    var window_width  = $(window).width(),
        window_height = $(window).height(),
        nav_height    = $('#navigation').height();

    $('.slide').each(function(i, v){
        var para_height = (i === 0) ? (window_height-nav_height) : window_height+1;
        $(v).css('height', para_height);
    });

    $('body').removeProp('css');

    // Plugin initialization
    $('.carousel.carousel-slider').carousel({full_width : true});
    $('.carousel').carousel();
    $('.slider').slider({full_width : true});
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('.button-collapse').sideNav();
    $('.datepicker').pickadate({selectYears : 20});
    $('select').material_select();
    $('.scrollspy').scrollSpy();
    $('.tooltipped').tooltip({delay : 50});
    $('.collapsible').collapsible({accordion : false});

});