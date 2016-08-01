$(document).ready(function() {

    // PAGE Home
    
    /** ScrollFire **/
    var options = [
        {selector: '#parallax2', offset: 50, callback: function() { Materialize.toast("This is our ScrollFire Demo!", 1500 ); }},
        {selector: '#parallax2', offset: 400, callback: function() { Materialize.toast("Please continue scrolling Down !", 1500 ); }},
        {selector: '#parallax2', offset: 1400, callback: function() { Materialize.toast("Please continue scrolling Up !", 1500 ); }}
    ];

    Materialize.scrollFire(options);

    // PAGE News
    $('.chip .material-icons').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
});