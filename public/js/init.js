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
    $('.carousel.carousel-slider').carousel({full_width: true});
    $('.carousel').carousel();
    $('.slider').slider({full_width: true});
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('.button-collapse').sideNav();
    $('.datepicker').pickadate({selectYears: 20});
    $('select').material_select();
    $('.scrollspy').scrollSpy();
    
    $('.collapsible').collapsible({
      accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
    });

    var options = [ 
        {selector: '#parallax2', offset: 50, callback: function() { Materialize.toast("This is our ScrollFire Demo!", 1500 ); } }, 
        {selector: '#parallax2', offset: 205, callback: function() { Materialize.toast("Please continue scrolling!", 1500 ); } }
    ];

    Materialize.scrollFire(options);

    // News
    $('.chip .material-icons').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    });

    if($('#skills-chart').length) {
        var data = {
            labels: ["PHP", "Backbone/Marionette", "C#", "HTML5/CSS3", "Coding", "Cycling", "Running"],
            datasets: [
                {
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "#FFC107",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: [65, 59, 90, 81, 56, 55, 40]
                }
            ]
        };

        var options = {
            scaleLineColor: "rgba(255,255,255,.9)",
            scaleFontFamily: "'Roboto'",
            scaleFontColor: "#FFC107"
        };

        var ctx = $('#skills-chart').get(0).getContext("2d"),
            myRadarChart = new Chart(ctx).Radar(data, options);
    }
});