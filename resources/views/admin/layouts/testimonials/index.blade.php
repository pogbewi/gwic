

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
                                                <img src="{{ asset('storage/uploads/testimonies/images/thumbnails/'.$testimonial->photo) }}" alt="{{ $testimonial->subject }}" class="img-thumbnail img-rounded img-fluid" width="50%"/>
                                            </td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->subject }}</td>
                                            <td> {{--<input type="checkbox" id="comments{{$testimonial->id}}" name="comments{{$testimonial->id}}" value="{{ $testimonial->allow_comments ? 'checked ' : 'unchecked '}}" class="comment" --}}{{--data-url="{{ route('testimonial.comments.toggle') }}"--}}{{-- data-id="{{$testimonial->slug}}">
                                                <label for="comments{{$testimonial->id}}" class="label-table form-check-label"></label>--}}
                                                <input type="checkbox" class="custom-control-input" name="comments{{$testimonial->id}}" id="comments{{$testimonial->id}}" {{ $testimonial->allow_comments ? 'checked ' : 'unchecked '}}>
                                                <label class="custom-control-label comments{{$testimonial->id}}" for="comments{{$testimonial->id}}"></label>
                                            </td>
                                            <td>{{ prettyDate($testimonial->published_at) }}</td>
                                            <td>
                                                @if(Auth::guard('admin')->user()->can('read-admin-admin-testimonials-controller'))
                                                    <a target="_blank" href="{{ url('testimonial', $testimonial->slug) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                @if(Auth::guard('admin')->user()->can('update-admin-admin-testimonials-controller'))
                                                    <a href="{{ route('testimonials.edit', $testimonial->slug) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                @endif
                                                @if(Auth::guard('admin')->user()->can('delete-admin-admin-testimonials-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('testimonials.destroy', $testimonial->slug) }}" data-id="{{ $testimonial->slug }}"><i class="fa fa-trash-o"></i> Delete</button>
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


