$(document).ready(function(){

    /*** Contact Message Modal ***/
    $(document).on('click', '.contact-field', function(e){

        var token = $(e.currentTarget).parents('#section').find('input[name=_token]').val(),
            name;

        $.ajax({
            url: '/admin/ajax/get_contact_message',
            headers: {'X-CSRF-TOKEN': token},
            data: {contact_id : $(e.currentTarget).data('id')},
            type: 'POST',
            datatype: 'JSON',
            beforeSend : function() {
                $('#modal-contact').find('.modal-content').children().empty();
            },
            success: function (resp) {
                if(resp) {
                    $('#modal-contact').openModal({
                        ready: function() {
                            name = resp.data.contact.name;
                            name += (resp.data.contact.email.length) ? '<em>('+resp.data.contact.email+')</em>' : '';

                            $('#modal-contact').find('h4').html(name);
                            $('#modal-contact').find('blockquote').html(resp.data.contact.message);
                            $('#modal-contact').find('.modal-sender').removeClass('show').addClass('hide');

                            if(resp.data.contact.email.length && resp.data.contact.answered == 0) {
                                $('#modal-contact')
                                    .find('.modal-sender')
                                    .removeClass('hide')
                                    .addClass('show')
                                    .attr('href', '/admin/contacts/send/' + resp.data.contact.id);
                            }
                        }
                    });
                }
            }
        });

    });


    /*** Post update online/offline ***/
    $(document).on('click', '.post-online', function(e){
        var $btn = $(e.currentTarget),
            postId,
            online,
            token,
            url,
            data;

        token   = $(this).parent('tr').find('input[name=_token]').val();
        postId  = $(this).parent('tr').data('id');
        online  = $(this).parent('tr').find('.post-online').data('online');

        url = '/admin/ajax/update_post_online';
        data = {
            postId: postId,
            online: online
        };

        $("#modal-post-confirm").openModal({
            ready: function() {
                $(document).find('.modal-title').text("Mettre l'article " + ((online == 1) ? "hors-ligne" : "en ligne") + " ?");
            }
        });

        $(document).on('click', 'a.modal-action', function(e) {
            e.preventDefault();
            if($(this).data('confirm') == 'yes') {
                $.ajax({
                    url: url,
                    headers: {'X-CSRF-TOKEN': token},
                    data: data,
                    type: 'POST',
                    datatype: 'JSON',
                    success: function (resp) {
                        $("#modal-post-confirm").closeModal();
                        Materialize.toast(resp.data.message, 4000, '', function(){
                            toggleVisibility($btn);
                        });
                    }
                });
            } else {
                $("#modal-post-confirm").closeModal();
            }
        });
    });

    function toggleVisibility(visibility) {
        var isVisible = (visibility.hasClass('green-text')) ? true : false;

        console.log(isVisible);

        if(isVisible) {
            visibility.find('i').removeClass('green-text').addClass('red-text').text('visibility_off');
        } else {
            visibility.find('i').removeClass('red-text').addClass('green-text').text('visibility');
        }
    };

    /*** Post delete ***/
    $(document).on('click', '.post-delete', function(e){
        e.preventDefault();
        modalConfirmDelete($(e.currentTarget), 'post', 'news');
    });

    /*** Post edit ***/
    $(document).on('keyup', '.postForm #title', function(e){
        e.preventDefault();
        var value = $(e.currentTarget).val(),
            slug;

        slug = convertToSlug(value);
        $('.postForm #slug').val(slug);
    });

    /*** Skill delete ***/
    $(document).on('click', '.skill-delete', function(e){
        e.preventDefault();
        modalConfirmDelete($(e.currentTarget), 'skill', 'skills');
    });

});

convertToSlug = function(str) {
    str = str.replace(/^\s+|\s+$/g, ''); // trim
    str = str.toLowerCase();

    // remove accents, swap ñ for n, etc
    var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
    var to   = "aaaaaeeeeeiiiiooooouuuunc------";
    for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
    }

    str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

    return str;
};

modalConfirmDelete = function($btn, entityName, routeName) {
    var id, token, data, route;

    token   = $btn.parents('tr').find('input[name=_token]').val();
    id      = $btn.parents('tr').data('id');
    route   = '/admin/'+routeName+'/'+id;

    data = {
        id: id
    };

    $("#modal-"+entityName+"-confirm").openModal({
        ready: function() {
            $(document).find('.modal-title').text("Supprimer la compétence ?");
        }
    });

    $(document).on('click', 'a.modal-action', function(e) {
        e.preventDefault();
        if($(e.currentTarget).data('confirm') == 'yes') {
            $.ajax({
                url: route,
                headers: {'X-CSRF-TOKEN': token},
                type: 'DELETE',
                datatype: 'JSON',
                success: function (resp) {
                    $("#modal-"+entityName+"-confirm").closeModal();
                    Materialize.toast(resp.data.message, 4000, '', function(){
                        location.reload();
                    });
                }
            });
        } else {
            $("#modal-"+entityName+"-confirm").closeModal();
        }
    });
};