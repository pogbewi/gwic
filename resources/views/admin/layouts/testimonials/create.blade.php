


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
            {!! Form::open(['route'=>('testimonials.store'), 'role' => 'form']) !!}
            <div class="row">
                <div class="col-md-8 text-center mb-5 wow fadeInLeft">
                    <div class="card card-cascade">
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
                            Testifier's Name
                            <div class="card-action">
                                <a class="card-action savysoft-angle-down" data-toggle="card-" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="card-body card-body-cascade">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name')  }}">
                        </div>
                    </div>

                    <!-- ### CONTENT ### -->
                    <div class="card">
                        <div class="card-header text-white bg-primary mb-3">
                            Testimony Body
                            <div class="card-actions">
                                <a class="card-action savysoft-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        <textarea class="form-control richTextBox" id="richtextbody" name="body" style="border:0px;">{{ old('body') }}</textarea>
                    </div><!-- .panel -->

                    <div class="card card-cascade card-info">
                        <div class="card-header text-white bg-primary mb-3">
                            SEO Content
                            <div class="card-actions">
                                <a class="card-action savysoft-angle-down" data-toggle="panel-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="card-body card-body-cascade">
                            <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea class="form-control" name="meta_description" id="meta_description">{{ old('meta_description') }}</textarea>
                            </div>

                            {{--<div class="form-group">
                                <label for="seo_title">Seo Tile</label>
                                <input type="text" class="form-control" name="seo_title" id="seo_title" data-role="tagsinput">
                            </div>--}}
                        </div>
                        <div class="card-body card-body-cascade">
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Meta Keywords" value="{{ old('meta_keywords')  }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5 wow fadeInRight">
                    <div class="card card-cascade">
                        <div class="card-header text-white bg-warning mb-3">
                            Testimony Info
                            <div class="card-action">
                                <a class="card-action savysoft-angle-down" data-toggle="card-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="card-body card-body-cascade">
                            <div class="form-group">
                                <label for="from">From</label>
                                <input type="text" class="form-control" id="from" name="from"
                                       placeholder="From"
                                       value="{{ old('from') }}">
                            </div>

                            <div class="form-group">
                                <label for="tag_names">Tags (Enter comma separated tags)</label>
                                <input type="text" class="form-control" id="tag_names" name="tag_names"
                                       placeholder="Tag Names ( e.g salvation, healing, offering)"
                                       value="{{ old('tag_names') }}">
                            </div>

                            <div class="form-group">
                                <label for="status">Testimony Status</label>
                                <select class="mdb-select md-form" name="status" id="status">
                                    <option value="" disabled selected>Select</option>
                                    <option value="PUBLISHED">published</option>
                                    <option value="PENDING">pending</option>
                                </select>
                            </div>

                            {{--<div class="form-group">
                                <label for="allow_comments">Disable Comment ?</label>
                                <input type="checkbox" class="form-check-input" name="allow_comments" id="allow_comments">
                                <label for="allow_comments" class="label-table form-check-label"></label>
                            </div>--}}
                            <!-- Default checked -->
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="allow_comments" id="allow_comments" checked>
                                <label class="custom-control-label" for="allow_comments">Disable Comment ?</label>
                            </div>

                            <div class="form-group scheduled" style="display: none">
                                <div id="scheduled_to_picker" class="scheduled_to_picker">
                                        <label for="published_at">Published At</label>
                                        <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        <input type="text" name="published_at" id="published_at" data-target="#datetimepicker1" value="{{ old('published_at') }}" class="form-control datetimepicker-input scheduled_to_input">
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-body-cascade">
                            <div class="card-header text-white bg-warning mb-3">
                                Testifier's photo Image
                                <div class="card-action">
                                    <a class="card-action savysoft-angle-down" data-toggle="card-collapse" aria-hidden="true"></a>
                                </div>
                            </div>
                            <div class="card-body card-body-cascade">
                                <div class="inform"></div>
                                <input type="hidden" name="photo" id="photo">
                                <input type="file" name="image" id="image" data-url="{{ route('admin.testimonials.upload') }}">
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger btn-rounded pull-right mt-5 mr-5">
                        <i class="fa fa-plus-circle"></i> Add New Testimony
                    </button>
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

