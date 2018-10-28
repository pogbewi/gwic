
        const notifier = {
            notify:function(message, type){
                toastr[type](message);
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-full-width",
                    "preventDuplicates": true,
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

        function confirmDelete() {
            $('#modalConfirmDelete').remove();
            var html = '';
            <!--Section: Modals-->
            html += '<section>';
            /*<!--Modal: modalConfirmDelete-->*/
            html += '<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            html += '<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">';
            /* <!--Content-->*/
            html += '<div class="modal-content text-center">';
            /*  <!--Header-->*/
            html += '<div class="modal-header d-flex justify-content-center">';
            html += '<p class="heading">Are you sure?</p>';
            html += '</div>';

            /*<!--Body-->*/
            html += '<div class="modal-body">';

            html += '<i class="fa fa-times fa-4x animated rotateIn"></i>';

            html += '</div>';

            /*<!--Footer-->*/
            html += '<div class="modal-footer flex-center">';
            html += '<a type="button" class="btn btn-danger submit-dialog">Yes</a>';
            html += '<a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No</a>';
            html += '</div>';
            html += '</div>';
            /*<!--/.Content-->*/
            html += '</div>';
            html += '</div>';
            /*    <!--Modal: modalConfirmDelete-->*/
            html += '</section>';
            /*<!--Section: Modals-->*/

            $('body').append(html);

            $('#modalConfirmDelete').modal('show');
        }


        function confirmExport() {
            $('#modalConfirmExport').remove();
            var html = '';
            <!--Section: Modals-->
            html += '<section>';
            /*<!--Modal: modalConfirmDelete-->*/
            html += '<div class="modal fade" id="modalConfirmExport" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
            html += '<div class="modal-dialog modal-sm modal-notify modal-info" role="document">';
            /* <!--Content-->*/
            html += '<div class="modal-content text-center">';
            /*  <!--Header-->*/
            html += '<div class="modal-header d-flex justify-content-center">';
            html += '<p class="heading">Are you sure?</p>';
            html += '</div>';

            /*<!--Body-->*/
            html += '<div class="modal-body">';

            html += '<i class="fa fa-arrow-circle-o-up fa-4x animated rotateIn"></i>';

            html += '</div>';

            /*<!--Footer-->*/
            html += '<div class="modal-footer flex-center">';
            html += '<a type="button" class="btn btn-info submit-dialog">Yes</a>';
            html += '<a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">No</a>';
            html += '</div>';
            html += '</div>';
            /*<!--/.Content-->*/
            html += '</div>';
            html += '</div>';
            /*    <!--Modal: modalConfirmDelete-->*/
            html += '</section>';
            /*<!--Section: Modals-->*/

            $('body').append(html);

            $('#modalConfirmExport').modal('show');
        }

    jQuery(function($) {
        $(function () {

            $(document).on('click',".delete", function(e) {

                var context = $(this);
                var id = $(this).attr('data-id');
                var url = $(this).data('url');
                confirmDelete();
                $('.submit-dialog').on('click', function(e) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'DELETE',
                        url: url,
                        data: 'ids=' + id,
                        success: function (data) {
                            $('#modalConfirmDelete').modal('hide');
                            if (data['success']) {
                                $('table').find(context).parents("tr").remove();
                                context.parent("tr").slideUp("slow");
                                notifier.notify(data['success'], 'success');
                            } else if (data['error']) {
                                notifier.notify(data['error'],'error');
                            } else {
                                notifier.notify('Whoops Something went wrong!!','error');
                            }
                        },
                        error: function (data) {
                            notifier.notify('Oops something went wrong','error');
                            $('#modalConfirmDelete').modal('hide');
                        }
                    });
                    $('table tr').filter("[data-row-id='" + id + "']").remove();
                });
            });


            $(document).ready(function () {
                $('.delete_all').on('click', function(e) {
                    var allVals = [];
                    $(".sub_chk:checked").each(function() {
                        allVals.push($(this).attr('data-id'));
                    });
                    if(allVals.length <=0)
                    {
                        notifier.notify("Please select at least a row.",'error');
                    }  else {
                        confirmDelete();

                        var join_selected_values = allVals.join(",");
                        var url = $(this).data('url')+ '/'+join_selected_values;

                        $('.submit-dialog').on('click', function(e) {
                            $.ajax({
                                type: 'DELETE',
                                url: url,
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                data: {
                                    'ids': join_selected_values,
                                    'id' : "hmm!"
                                },
                                dataType:"json",
                                success: function (data) {
                                    $('#modalConfirmDelete').modal('hide');
                                    if (data['success']) {
                                        $(".sub_chk:checked").each(function() {
                                            $(this).parents("tr").remove();
                                        });
                                        notifier.notify(data['success'],'success');

                                    } else if (data['error']) {
                                        notifier.notify(data['error'],'error');

                                    } else {
                                        notifier.notify('Whoops Something went wrong!!','error');
                                    }
                                },
                                error: function (data) {
                                    $('#modalConfirmDelete').modal('hide');
                                    notifier.notify('Oops something went wrong','error');
                                }
                            });
                            $.each(allVals, function( index, value ) {
                                $('table tr').filter("[data-row-id='" + value + "']").remove();
                            });
                        });
                    }
                });


                $(document).on('confirm', function (e) {
                    var ele = e.target;
                    e.preventDefault();
                    $.ajax({
                        cache:false,
                        type: 'DELETE',
                        url: ele.href,
                        processData: false,
                        contentType: false,
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        async:true,
                        dataType:"json",
                        success: function (data) {
                            if (data['success']) {
                                $("#" + data['tr']).slideUp("slow");
                                notifier.notify(data['success'],'success');
                            } else if (data['error']) {
                                notifier.notify('Whoops Something went wrong!!','error');
                            } else {
                                notifier.notify('Whoops Something went wrong!!','error');
                            }
                        },
                        error: function (data) {
                            notifier.notify('Whoops Something went wrong!!','error');
                        }
                    });
                    return false;
                });
            });

            $(document).ready(function () {
                $('.export_excel').on('click', function(e) {
                    e.preventDefault();
                    var allVals = [];
                    $(".sub_chk:checked").each(function() {
                        allVals.push($(this).attr('data-id'));
                    });
                    if(allVals.length <=0)
                    {
                        notifier.notify("Please select at least a row.",'error');
                    }  else {
                        confirmExport();

                        $('.submit-dialog').on('click', function(e) {
                            $('#ids').val(allVals.join(","));
                            $('#modalConfirmExport').modal('hide');
                            $('#check_lists').submit();
                        });
                    }
                });
            });
        });

    });

    jQuery(function($) {
        $(document).on('change', '#image', function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            var file_data = $(this).prop("files")[0];
            var formData = new FormData();
            formData.append('file',file_data);
            var panel_body = $('.card-body');
            panel_body.find('.inform').empty();
            var url = $(this).attr('data-url');
            $.ajax({
                cache:false,
                type: "POST",
                url: url,
                processData: false,
                contentType: false,
                enctype: 'multipart/form-data',
                data: formData,
                async:true,
                dataType:"json",
                beforeSend: function(xhr){
                    panel_body.find('.inform').html('<img src="/assets/img//admin/ajax-loader.gif" class="ajax-loader">');
                },
                success: function(data, status){
                    panel_body.find('.inform').html('<img src=/storage/'+data['path']+' class="image-responsive image-thumbnail" width="100%">');
                    $('#photo').attr('value', data['file']);
                },
                error:function(data, status){
                    panel_body.find('.inform').html('<p>'+ data['msg']+'</p>');
                },
                complete: function(){

                }
            });
        });
    });


