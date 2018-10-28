
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
                            <i class="fa fa-universal-access mr-2" style="color: #fffde7"></i>
                            Investment Requests
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::guard('admin')->user()->fullname }}!</h4>
                                <p class="card-text">Manager All Requests Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="table-responsive">
                                <table id="request" class="table table-striped text-nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">
                                            <input class="form-check-input" type="checkbox" id="checkbox">
                                            <label for="checkbox" class="label-table form-check-label"></label>
                                        </th>
                                        <th class="th-sm">Title
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Fullname
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Business Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Amount Needed
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">phone
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Email
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
                                    @foreach($investment_requests as $request)
                                        <tr>
                                            <td scope="row">
                                                <input type="checkbox" class="sub_chk form-check-input" id="checkbox{{$request->id}}" data-id="{{$request->id}}">
                                                <label for="checkbox{{$request->id}}" class="label-table form-check-label"></label>
                                            </td>
                                            <td>{{ $request->title }}</td>
                                            <td>{{ $request->fullname }}</td>
                                            <td>{{ $request->businessname }}</td>
                                            <td>{{ $request->amount_needed }}</td>
                                            <td>{{ $request->phone }}</td>
                                            <td>{{ $request->email }}</td>
                                            <td>{{ prettyDate($request->created_at) }}</td>
                                            <td>
                                                @if(Auth::guard('admin')->user()->can('read-admin-admin-business-investment-controller'))
                                                    <a href="{{ route('requests.show', $request->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                @if(Auth::guard('admin')->user()->can('delete-admin-admin-business-investment-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('requests.destroy', $request->id) }}" data-id="{{ $request->id }}"><i class="fa fa-trash-o"></i> Delete</button>
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
                                        <th>Title
                                        </th>
                                        <th>Fullname
                                        </th>
                                        <th>Business Name
                                        </th>
                                        <th>Amount Needed
                                        </th>
                                        <th>Phone
                                        </th>
                                        <th>Email
                                        </th>
                                        <th>Date Sent
                                        </th>
                                        <th>Actions
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                                @if(count($investment_requests) > 0)
                                    <span class="pull-left">
                                            <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="{{ url('/admin/requests/') }}">Delete Selected</button>
                                    </span>
                                    <span class="pull-left">
                                        {!! Form::open(['route'=>('requests.excel'),'role' => 'form','id'=>'check_lists']) !!}
                                        {{ Form::hidden('ids[]', '',['class'=>'form-control', 'id'=>'ids']) }}
                                        <button type="submit" style="margin-bottom: 10px" class="btn btn-purple export_excel">Export To Excel</button>
                                        {!! Form::close() !!}
                                    </span>
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
            $('#request').DataTable( {
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

            $('#request').DataTable();
            $('#request_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#request_wrapper .dataTables_filter').find('input').each(function () {
                $('input').attr("placeholder", "Search");
                $('input').removeClass('form-control-sm');
            });
            $('#request_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#request_wrapper .dataTables_filter').addClass('md-form');
            $('#request_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#request_wrapper select').addClass('mdb-select');
            $('#request_wrapper .mdb-select').material_select();
            $('#request_wrapper .dataTables_filter').find('label').remove();
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

