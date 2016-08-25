$(document).ready(function() {

    // PAGE Home

    /** ScrollFire **/
    var options = [
        {
            selector: '#parallax2',
            offset: 600,
            callback: function() {
                $('.progress-factor').each(function(i, progress) {
                    var value = $(progress).find('.bar').data('value');
                    $(progress).fadeIn(1200, function(){
                        $(progress).find('.bar').attr('aria-valuenow', value);
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