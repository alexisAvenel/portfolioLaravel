$(document).ready(function() {

    // PAGE Home

    /** ScrollFire **/
    var options = [
        {
            selector: '#parallax2',
            offset: 550,
            callback: function() {
                $('.skill_bar').each(function(i, bar) {
                    var value = $(bar).find('.skill_active').data('value');
                    $(bar).find('.skill_active').width(value);

                    $({someValue: 0}).animate({someValue: value}, {
                        duration: 2000,
                        easing:'swing',
                        step: function() {
                            $(bar).find('span i').text(Math.round(this.someValue));
                        }
                    });

                });
            }
        },
        {
            selector: '#parallax2',
            offset: 650,
            callback: function() {
                $('.skill-img').css({left:'55%'});
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