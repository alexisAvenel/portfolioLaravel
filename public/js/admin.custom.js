(function($){
    $(function(){

        $(document).ready(function(){

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

        });

    }); // end of document ready
})(jQuery); // end of jQuery name space