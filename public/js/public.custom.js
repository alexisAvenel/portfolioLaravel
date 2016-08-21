$(document).ready(function() {

    // PAGE Home

    /** ScrollFire **/
    var options = [
        {
            selector: '#parallax2',
            offset: 600,
            callback: function() {
                var value;
                $('.progress-factor').each(function(i, progress) {
                    value = $(this).find('.bar').data('value');
                    $(this).fadeIn(600, function(){
                        $(this).find('.bar').attr('aria-valuenow', value);
                    });
                });
            }
        }
    ];

    Materialize.scrollFire(options);

    // PAGE News
    $('.chip .material-icons').click(function(e) {
        e.preventDefault();
        e.stopPropagation();
    });
});