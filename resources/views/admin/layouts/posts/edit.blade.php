



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
                                News Edit Info (Blog Posts)
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger alert-dismissible text-white">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><i class="fa fa-times"></i></button>
                                    <h4 class="card-title"><i class="icon fa fa-check"></i> Hey {{ Auth::guard('admin')->user()->fullname }}!</h4>
                                    <p class="card-text">Edit Posts Here</p>
                                </div>
                                <hr class="my-2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {!! Form::model($post, [
                              'method' => 'PATCH',
                              'route' => ['posts.update', $post->slug],
                              'role' => 'form'
                          ]) !!}
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
                            Post Title
                            <div class="card-action">
                                <a class="card-action savysoft-angle-down" data-toggle="card-" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="card-body card-body-cascade">
                            {{ Form::hidden('slug', $post->slug ,['class'=>'form-control', 'id'=>'slug', 'placeholder'=>'Slug']) }}
                            {{ Form::text('title', old('title'),['class'=>'form-control', 'id'=>'title', 'placeholder'=>'Title']) }}
                        </div>
                    </div>

                    <!-- ### CONTENT ### -->
                    <div class="card">
                        <div class="card-header text-white bg-primary mb-3">
                            Post Body
                            <div class="card-actions">
                                <a class="card-action savysoft-resize-full" data-toggle="panel-fullscreen" aria-hidden="true"></a>
                            </div>
                        </div>
                        {{ Form::textarea('body', old('body'),['class'=>'form-control richTextBox', 'id'=>'richTextBox', 'placeholder'=>'Body','style'=>'border:0px;']) }}
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
                                {{ Form::textarea('meta_description', old('meta_description'),['class'=>'form-control', 'id'=>'meta_description', 'placeholder'=>'Meta Description']) }}
                            </div>

                            {{--<div class="form-group">
                                <label for="seo_title">Seo Tile</label>
                                <input type="text" class="form-control" name="seo_title" id="seo_title" data-role="tagsinput">
                            </div>--}}
                        </div>
                        <div class="card-body card-body-cascade">
                            <div class="form-group">
                                <label for="meta_keywords">Meta Keywords</label>
                                {{ Form::text('meta_keywords', old('meta_keywords'),['class'=>'form-control', 'id'=>'meta_keywords', 'placeholder'=>'Meta Keywords']) }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-5 wow fadeInRight">
                    <div class="card card-cascade">
                        <div class="card-header text-white bg-warning mb-3">
                            Post Info
                            <div class="card-action">
                                <a class="card-action savysoft-angle-down" data-toggle="card-collapse" aria-hidden="true"></a>
                            </div>
                        </div>
                        <div class="card-body card-body-cascade">
                            <div class="form-group">
                                <label for="category_id">Post Category</label>
                                {{ Form::select('category_id', $category, old('category_id'),['class'=>'form-control mdb-select']) }}
                            </div>

                            <div class="form-group">
                                <label for="tag_names">Tags (Enter comma separated tags)</label>
                                {{ Form::text('tag_names', old('tag_names'),['class'=>'form-control', 'id'=>'tag_names','data-role'=>"tagsinput", 'placeholder'=>'Tag Names']) }}
                            </div>

                            <div class="form-group">
                                <label for="status">Post Status</label>
                                {{ Form::select('status', ['PUBLISHED'=>'published','PENDING'=>'pending'], old('status'),['class'=>'form-control mdb-select-status']) }}
                            </div>

                            <div class="form-group">
                                <label for="allow_comments">Disable Comment ?</label>
                                <input type="checkbox" class="form-check-input" name="allow_comments" id="allow_comments" {{ $post->allow_comments ? 'checked ' : 'unchecked '}}>
                                <label for="allow_comments" class="label-table form-check-label"></label>
                            </div>

                            <div class="form-group scheduled" style="display: none">
                                <div id="scheduled_to_picker" class="scheduled_to_picker">
                                    <label for="published_at">Published At</label>
                                    <div class="input-group date" id="datetimepicker1" data-target-input="nearest">
                                        {{ Form::text('published_at', old('published_at'),['class'=>'form-control datetimepicker-input scheduled_to_input', "data-target"=>"#datetimepicker1", 'id'=>'published_at', 'placeholder'=>'Published At']) }}
                                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" name="featured" id="featured" {{ $post->allow_comments ? 'checked ' : 'unchecked '}}>
                                <label class="custom-control-label" for="featured">Feature Post ?</label>
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
                                <div class="inform" style="padding: 7px"><img src="/storage/uploads/posts/photos/thumbnails/{{ $post->photo }}" width="100%"></div>
                                {{ Form::hidden('photo', $post->photo,['id'=>'photo']) }}
                                {{ Form::file('image',['id'=>'image', 'data-url'=>route('admin.posts.upload')]) }}
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-danger btn-rounded pull-right mt-5 mr-5">
                        <i class="fa fa-plus-circle"></i> Update Post
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

        $(document).ready(function() {
            $('.mdb-select-status').material_select();
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

            $('#allow_comments').value = this.checked ? 1:0;

            $('#featured').on('change',function(){
                this.value = this.checked ? 1:0;
            });
        });

    </script>
@endpush

