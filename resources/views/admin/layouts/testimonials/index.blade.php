

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
                            Testimonials
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::guard('admin')->user()->fullname }}!</h4>
                                <p class="card-text">Manager All Testimonies Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="mb-5">
                                <h4 class="info-color-dark white-text text-center mb-5">
                                    @if(Auth::guard('admin')->user()->can('create-admin-admin-testimonials-controller'))
                                        <span class="new-button" style="float:left;">
                                                    <i class="fa fa-admin-plus" style="color: #005983"></i>&nbsp;
                                                <a href="{{ route('testimonials.create') }}" class="btn btn-info btn-sm"><span class="fa fa-plus"></span>
                                                    &nbsp;Create New testimonies
                                                </a>
                                    </span>
                                    @endif
                                </h4>
                            </div>

                            <div class="table-responsive">
                                <table id="#testimonials" class="table table-striped text-nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">
                                            <input class="form-check-input" type="checkbox" id="checkbox">
                                            <label for="checkbox" class="label-table form-check-label"></label>
                                        </th>
                                        <th class="th-sm">Photos
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Subject
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Comment Closed ?
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Date Created
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Actions
                                            <i class="fa fade-leave-active float-right" aria-hidden="true"></i>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($testimonials as $testimonial)
                                        <tr>
                                            <td scope="row">
                                                <input type="checkbox" class="sub_chk form-check-input" id="checkbox{{$testimonial->id}}" data-id="{{$testimonial->id}}">
                                                <label for="checkbox{{$testimonial->id}}" class="label-table form-check-label"></label>
                                            </td>
                                            <td class="col-md-4">
                                                <img src="{{ asset('storage/uploads/testimonies/images/thumbnails/'.$testimony->photo) }}" alt="{{ $testimony->subject }}" class="thumbnail" width="100%"/>
                                            </td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->subject }}</td>
                                            <td> <input type="checkbox" value="{{ $testimony->allow_comments ? false : true }}" class="comment" data-url="{{ route('admin.testimony.comments.toggle') }}" data-id="{{$testimony->id}}"></td>
                                            <td>{{ prettyDate($testimony->created_at) }}</td>
                                            <td>
                                                @if(Auth::guard('admin')->user()->can('read-admin-admin-testimonials-controller'))
                                                    <a href="{{ route('$testimonial.show', $testimonial->id) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                @if(Auth::guard('admin')->user()->can('delete-admin-admin-testimonials-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('$testimonial.destroy', $testimonial->id) }}" data-id="{{ $testimonial->id }}"><i class="fa fa-trash-o"></i> Delete</button>
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
                                @if(count($testimonials) > 0)
                                    <span class="pull-left">
                                            <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="{{ url('/admin/testimonials/') }}">Delete Selected</button>
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
            $('#testimonials').DataTable( {
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

            $('#testimonials').DataTable();
            $('#testimonials_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#testimonials_wrapper .dataTables_filter').find('input').each(function () {
                $('input').attr("placeholder", "Search");
                $('input').removeClass('form-control-sm');
            });
            $('#testimonials_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#testimonials_wrapper .dataTables_filter').addClass('md-form');
            $('#testimonials_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#testimonials_wrapper select').addClass('mdb-select');
            $('#testimonials_wrapper .mdb-select').material_select();
            $('#testimonials_wrapper .dataTables_filter').find('label').remove();
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


