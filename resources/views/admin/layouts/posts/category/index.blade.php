


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
                            Categories
                        </div>
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::guard('admin')->user()->fullname }}!</h4>
                                <p class="card-text">Manager All Post Categories Here</p>
                            </div>
                            <hr class="my-2">
                            <div class="mb-5">
                                <h4 class="info-color-dark white-text text-center mb-5">
                                    @if(Auth::guard('admin')->user()->can('create-admin-admin-category-controller'))
                                        <span class="new-button" style="float:left;">
                                                    <i class="fa fa-admin-plus" style="color: #005983"></i>&nbsp;
                                                <a href="{{ route('category.create') }}" class="btn btn-info btn-sm"><span class="fa fa-plus"></span>
                                                    &nbsp;&nbsp;Create New Post Category
                                                </a>
                                    </span>
                                    @endif
                                </h4>
                            </div>

                            <div class="table-responsive">
                                <table id="#category" class="table table-striped text-nowrap" cellspacing="0" width="100%">
                                    <thead>
                                    <tr>
                                        <th class="th-sm">
                                            <input class="form-check-input" type="checkbox" id="checkbox">
                                            <label for="checkbox" class="label-table form-check-label"></label>
                                        </th>
                                        <th class="th-sm">Name
                                            <i class="fa fa-sort float-right" aria-hidden="true"></i>
                                        </th>
                                        <th class="th-sm">Parent
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
                                    @foreach($categories as $category)
                                        <tr>
                                            <td scope="row">
                                                <input type="checkbox" class="sub_chk form-check-input" id="checkbox{{$category->id}}" data-id="{{$category->id}}">
                                                <label for="checkbox{{$category->id}}" class="label-table form-check-label"></label>
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->parent['name'] }}</td>
                                            <td>{{ prettyDate($category->created_at) }}</td>
                                            <td>
                                                @if(Auth::guard('admin')->user()->can('read-admin-admin-category-controller'))
                                                    <a href="{{ route('category.show', $category->slug) }}" class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> view</a>
                                                @endif
                                                    @if(Auth::guard('admin')->user()->can('update-admin-admin-category-controller'))
                                                        <a href="{{ route('category.edit', $category->slug) }}" class="btn btn-primary btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</a>
                                                    @endif
                                                @if(Auth::guard('admin')->user()->can('delete-admin-admin-category-controller'))
                                                    <button type="button" class="btn btn-danger btn-xs delete" data-url="{{ route('category.destroy', $category->id) }}" data-id="{{ $category->id }}"><i class="fa fa-trash-o"></i> Delete</button>
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
                                        <th>Parent
                                        </th>
                                        <th>Date Created
                                        </th>
                                        <th>Actions
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                                @if(count($categories) > 0)
                                    <span class="pull-left">
                                            <button style="margin-bottom: 10px" class="btn btn-danger delete_all" data-url="{{ url('/admin/category/') }}">Delete Selected</button>
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
            $('#category').DataTable( {
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

            $('#category').DataTable();
            $('#category_wrapper').find('label').each(function () {
                $(this).parent().append($(this).children());
            });
            $('#category_wrapper .dataTables_filter').find('input').each(function () {
                $('input').attr("placeholder", "Search");
                $('input').removeClass('form-control-sm');
            });
            $('#category_wrapper .dataTables_length').addClass('d-flex flex-row');
            $('#category_wrapper .dataTables_filter').addClass('md-form');
            $('#category_wrapper select').removeClass('custom-select custom-select-sm form-control form-control-sm');
            $('#category_wrapper select').addClass('mdb-select');
            $('#category_wrapper .mdb-select').material_select();
            $('#category_wrapper .dataTables_filter').find('label').remove();
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

