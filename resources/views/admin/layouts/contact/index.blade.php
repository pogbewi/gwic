
@extends('admin.templates.default')

@section('styles')

@endsection


@section('header')
    <!-- Main Nav -->
    @include('admin.partials.nav')

    <!-- SideNav slide-out button -->
    @include('admin.partials.side-nav')
@endsection


@section('content')
    <!--Main layout-->
    <div class="container-fluid">

        <!--Section: Main panel-->
        <section>
            <div class="row">
                <div class="col-lg-12 col-xs-12 text-center">
                    <div class="card card-cascade narrower mb-5">
                        <div class="card-header text-white bg-primary mb-3">
                            <i class="fa fa-inbox mr-2" style="color: #fffde7"></i>
                            Contact Messages
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::guard('admin')->user()->fullname }}!</h4>
                                <p class="card-text">Manager All Messages Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="table-responsive">
                                <table id="contact" class="table table-striped text-nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">
                                            <input class="form-check-input" type="checkbox" id="checkbox">
                                            <label for="checkbox" class="label-table form-check-label"></label>
                                        </th>
                                        <th class="th-sm">Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Phone
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Email
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Subject
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Date Sent
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Actions
                                            <i class="fa fade-leave-active float-right" aria-hidden="true"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contact_messages as $message)
                                    <tr>
                                        <td scope="row">
                                            <input type="checkbox" class="sub_chk form-check-input" id="checkbox{{$message->id}}" data-id="{{$message->id}}">
                                            <label for="checkbox{{$message->id}}" class="label-table form-check-label"></label>
                                        </td>
                                        <td>{{ $message->name }}</td>
                                        <td>{{ $message->phone }}</td>
                                        <td>{{ $message->email }}</td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ prettyDate($message->created_at) }}</td>
                                        <td>
                                            @if(Auth::guard('admin')->user()->can('read-admin-admin-contact-controller'))
                                                <a href="{{ route('contact.show', $message->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                            @endif
                                            @if(Auth::guard('admin')->user()->can('delete-admin-admin-contact-controller'))
                                                <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('contact.destroy', $message->id) }}" data-id="{{ $message->id }}"><i class="fa fa-trash-o"></i> Delete</button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                    <tfoot>
                                    <tr>
                                        <th>
                                            <input class="form-check-input" type="checkbox" id="checkbox">
                                            <label for="checkbox" class="label-table form-check-label"></label>
                                        </th>
                                        <th>Name
                                        </th>
                                        <th>Phone
                                        </th>
                                        <th>Email
                                        </th>
                                        <th>Subject
                                        </th>
                                        <th>Date Sent
                                        </th>
                                        <th>Actions
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                                @if(count($contact_messages) > 0)
                                    <span class="pull-left">
                                            <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="{{ url('/admin/contact/') }}">Delete Selected</button>
                                    </span>
{{--
                                    <span class="pull-left ml-5">
                                            <button style="margin-bottom: 10px" class="btn btn-pink excell_all" data-url="{{ url('/admin/contact/') }}">Export To Excell</button>
                                    </span>--}}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Section: Main panel-->


    </div>
    <!--Main layout-->
@endsection

@push('scripts')
    <script type="text/javascript">
      $(document).ready(function () {
            $('#contact').DataTable( {
                /*dom: "Bfrtip",*/
                'paging'      : true,
                'lengthChange': true,
                'searching'   : true,
                'ordering'    : true,
                'info'        : true,
                'autoWidth'   : true
            } );
      } );

        $(document).ready(function() {

            $('#contact').DataTable();
            $('#contact_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#contact_wrapper .dataTables_filter').find('input').each(function () {
                $('input').attr("placeholder", "Search");
                $('input').removeClass('form-control-sm');
            });
            $('#contact_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#contact_wrapper .dataTables_filter').addClass('md-form');
            $('#contact_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#contact_wrapper select').addClass('mdb-select');
            $('#contact_wrapper .mdb-select').material_select();
            $('#contact_wrapper .dataTables_filter').find('label').remove();
        });
    </script>
    <script type="text/javascript">
        $(function(){
            $(document).on('click', '#checkbox',function(e) {
                if($(this).is(':checked',true))
                {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });
        });

        $('.comment').on('change',function($){
            this.value = this.checked ? true:false;
        });

        $(document).ready(function () {
            $('#checkbox').on('click', function(e) {
                if($(this).is(':checked',true))
                {
                    $(".sub_chk").prop('checked', true);
                } else {
                    $(".sub_chk").prop('checked',false);
                }
            });
        });
    </script>
@endpush

