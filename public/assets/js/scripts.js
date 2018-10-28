
    const notifier = {
        notify:function(message, type){
            toastr[type](message);
            toastr.options = {
                "closeButton": false,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": 300,
                "hideDuration": 1000,
                "timeOut": 5000,
                "extendedTimeOut": 1000,
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
        }
    };


    // A $( document ).ready() block for news letter.
    $( document ).ready(function() {
        if (document.cookie.indexOf('visited=true') === -1){
            // load the overlay
            $('#subscribe').modal({show:true});

            var year = 1000*60*60*24*365;
            var expires = new Date((new Date()).valueOf() + year);
            document.cookie = "visited=true;expires=" + expires.toUTCString();

        }
    });


    $(document).ready(function (){
        $(document).on('click','#subscriber', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var name = $('#name').val();
            var email = $('#sub_email').val();
            //clear error messages
            clearError();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN' :$('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: url,
                method: 'POST',
                data:{
                    name: name,
                    email: email,
                },
                success: function (data, status) {
                    if (status === "success") {
                        notifier.notify(data['success'], status);
                        $('#sub_email').val('');
                        $('#name').val('');
                    }
                },
                error:function(data, status){
                    notifier.notify("Gosh!, Error occured, try again", status);
                    showError(data);

                }

            });
        });

        function showError(data) {
            $.each(data.responseJSON.errors, function (key, value) {
                $('.show-error').css('display', 'block');
                $('.show-error').html('<span class="invalid-feedback '+key+'" style="display:inline-block;"><strong>'+ value +'</strong></span>');
            })
        }

        function clearError() {
            var data = [
                'name','email',
            ];
            $.each(data, function (key) {
                $('.show-error').css('display', 'none');
                $('show-error').html('');
            })
        }

    });

    $(document).ready(function () {
        $(document).on('click', '#subscribe-now', function (e) {
            e.preventDefault();
            var url = $(this).data('url');
            var name = $('#subscriber_name').val();
            var email = $('#subscriber_email').val();
            //clear error messages
            clearError();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            $.post({
                url: url,
                method: 'POST',
                data: {
                    name: name,
                    email: email,
                },
                success: function (data, status) {
                    if (status === "success") {
                        notifier.notify(data['success'], status);
                        $('#subscribe').modal('hide');
                    }
                },
                error: function (data, status) {
                    notifier.notify("Gosh!, Error occured, try again", status);
                    showError(data);

                }

            });
        });

        function showError(data) {
            $.each(data.responseJSON.errors, function (key, value) {
                $('.show-sub_error').css('display', 'block');
                $('.show-sub_error').html('<span class="invalid-feedback '+key+'" style="display:inline-block;"><strong>'+ value +'</strong></span>');
            })
        }

        function clearError() {
            var data = [
                'name','email',
            ];
            $.each(data, function (key) {
                $('.show-sub_error').css('display', 'none');
                $('show-sub_error').html('');
            })
        }
    });
