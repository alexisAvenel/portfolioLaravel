$(document).ready(function(){

    /*** Dashboard Modal ***/
    $(document).on('click', '.contact-field', function(e){

        var token = $(e.currentTarget).parents('#dashboard').find('input[name=_token]').val(),
            name;

        $.ajax({
            url: '/admin/ajax/get_contact_message',
            headers: {'X-CSRF-TOKEN': token},
            data: {contact_id : $(e.currentTarget).data('id')},
            type: 'POST',
            datatype: 'JSON',
            success: function (resp) {
                $('#modal-dashboard').openModal({
                    ready: function() {
                        name = resp.data.contact.name;
                        name += (resp.data.contact.email.length) ? '<em>('+resp.data.contact.email+')</em>' : '';
                        console.log(name);
                        $('#modal-dashboard').find('h4').html(name);
                        $('#modal-dashboard').find('blockquote').html(resp.data.contact.message);
                    }
                });
            }
        });

    });


    /*** Post update online/offline ***/
    $(document).on('click', '.post-online', function(){
        var postId, online, token, url, data;
        
        token = $(this).parent('tr').find('input[name=_token]').val();
        postId = $(this).parent('tr').data('id');
        online = $(this).parent('tr').find('.post-online').data('online');
        
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
                            location.reload();
                        });
                    }
                });
            } else {
                $("#modal-post-confirm").closeModal();
            }
        });
    });

    /*** Post delete ***/
    $(document).on('click', '.post-delete', function(e){
        e.preventDefault();
        var postId, token, data;
        
        token = $(this).parents('tr').find('input[name=_token]').val();
        postId = $(this).parents('tr').data('id');

        data = {
            id: postId
        };

        $("#modal-post-confirm").openModal({
            ready: function() {
                $(document).find('.modal-title').text("Supprimer l'article ?");
            }
        });

        $(document).on('click', 'a.modal-action', function(e) {
            e.preventDefault();
            if($(this).data('confirm') == 'yes') {
                $.ajax({
                    url: '/admin/news/'+postId,
                    headers: {'X-CSRF-TOKEN': token},
                    type: 'DELETE',
                    datatype: 'JSON',
                    success: function (resp) {
                        console.log(resp);
                        $("#modal-post-confirm").closeModal();
                        Materialize.toast(resp.data.message, 4000, '', function(){
                            location.reload();
                        });
                    }
                });
            } else {
                $("#modal-post-confirm").closeModal();
            }
        });
    });

    /*** Post edit ***/
    $(document).on('keyup', '.postForm #title', function(e){
        e.preventDefault();
        var value = $(e.currentTarget).val(),
            slug;
        
        slug = convertToSlug(value);
        $('.postForm #slug').val(slug);
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