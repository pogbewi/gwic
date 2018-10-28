



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
                <div class="col-lg-12 col-xs-12 text-center wow fadeInDown">
                    <div class="card-group mb-5">
                        <div class="card">
                            <div class="card-header text-white bg-primary mb-3">
                                <i class="fa fa-inbox mr-2" style="color: #fffde7"></i>
                                Testimonials
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible text-white">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::guard('admin')->user()->fullname }}!</h4>
                                    <p class="card-text">Add Testimonials Here</p>
                                </div>
                                <hr class="my-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::open(['route'=>'category.store', 'role' => 'form']) !!}
            <div class="row">
                <div class="col-md-12 text-center mb-5 wow fadeInLeft">
                    <div class="card card-cascade card-info">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li style="list-style: none">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="card-header text-white bg-primary mb-3">
                            Category Info.
                            <div class="card-actions">
                                <a class="card-action savysoft-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="card-body card-body-cascade">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control col-md-4 mx-auto" id="name" name="name" placeholder="Category Name" value="{{ old('name') }}">
                            </div>

                            <div class="form-group">
                                <label for="parent_id">Parent Category</label>
                                <select class="mdb-select form-control col-md-4 mx-auto" name="parent_id">
                                    <option value="">Select</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="name">Order</label>
                                <input type="text" class="form-control col-md-4 mx-auto" id="order" name="order" placeholder="Order" value="{{ old('order') }}">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary pull-right">Save Category</button>
                        </div>
                    </div>
                </div>

            </div>
            {!! Form::close() !!}
        </section>
        <!--Section: Main panel-->
    </div>
    <!--Main layout-->
@endsection

@push('scripts')
    <script type="text/javascript">
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });
    </script>
    <script>
        $(function () {
            $('#datetimepicker1').datetimepicker();
            /* $("#published_at").on("dp.change", function (e) {
                 $("#published_at").data("DateTimePicker").maxDate(e.date);
             });*/
        });
        $(function () {
            $('select[name="status"]').on('change',function(e){
                var option = e.target.value;
                if(option === 'PENDING'){
                    $('.scheduled').removeAttr('style');
                }
            });

            /*$('#allow_comments').value = this.checked ? 1:0;*/
        });

    </script>
@endpush

