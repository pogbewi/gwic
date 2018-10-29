
@extends('templates.default')

@section('styles')
    <style type="text/css">
        html,
        body,
        header,#app,
        #intro, .view{
            height: 65%;
        }

        .blog .view{
            height: auto !important;
        }
    </style>
@endsection


@section('header')
    <header>
    @include('partials.top-nav-main')
    <!-- Full Page Intro -->
        <div class="view full-page-intro" style="background-image: url('../assets/img/request/cash.jpg'); background-repeat: no-repeat; background-size: cover;">

            <!-- Mask & flexbox options-->
            <div class="mask rgba-black-light d-flex justify-content-center align-items-center">



            </div>
            <!-- Mask & flexbox options-->

        </div>
        <!-- Full Page Intro -->

    </header>
@endsection


@section('content')
    <!--Main layout-->
    <main class="mt-5 pt-5">
        <div class="container">

            <!--Section: Post-->
            <section class="mt-4">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-8 mb-4">

                        <!--Featured Image-->
                        <div class="card mb-4 wow fadeIn">

                            <img src="{{ asset('storage/uploads/posts/photos/'.$post->photo) }}" class="img-fluid" title="{{ $post->title }}">

                        </div>
                        <!--/.Featured Image-->



                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">

                                <h2 class="h2 my-4">{{ $post->title }} </h2>

                                <p class="dark-grey-text float-right">
                                    <strong>{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</strong>
                                </p>

                                <p class="h6 my-4">{{ $post->category->name }} </p>

                               <p>{!! html_entity_decode($post->body) !!}....</p>

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header font-weight-bold">
                                <span>About author</span>
                                <span class="pull-right">
                                    <a href="">
                                        <i class="fa fa-facebook mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-twitter mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-instagram mr-2"></i>
                                    </a>
                                    <a href="">
                                        <i class="fa fa-linkedin mr-2"></i>
                                    </a>
                                </span>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <div class="media d-block d-md-flex mt-3">
                                    <img class="d-flex mb-3 mx-auto z-depth-1" src="{{ $post->author->photo }}" alt="Generic placeholder image"
                                         style="width: 100px;">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{ $post->author->fullname }}
                                        </h5>

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Comments-->
                        <div class="card card-comments mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">{{ count($comments) }} comments</div>
                            <div class="card-body">
                                @if(count($comments) == 0)
                                    <p> No Comment Available at this time. </p>
                                @else
                            @foreach($comments as $comment)
                                @if($comment->approved)
                                <div class="media d-block d-md-flex mt-4">
                                    <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (20).jpg" alt="Generic placeholder image">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{ $comment->name }}
                                            <a href="" class="pull-right">
                                                <i class="fa fa-reply"></i>
                                            </a>
                                        </h5>
                                        {{ $comment->body }}

                                      {{--  <div class="media d-block d-md-flex mt-3">
                                            <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (27).jpg" alt="Generic placeholder image">
                                            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                                <h5 class="mt-0 font-weight-bold">Tommy Smith
                                                    <a href="" class="pull-right">
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                </h5>
                                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque
                                                ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                                                sunt explicabo.
                                            </div>
                                        </div>--}}

                           {{--             <!-- Quick Reply -->
                                        <div class="form-group mt-4">
                                            <label for="quickReplyFormComment">Your comment</label>
                                            <textarea class="form-control" id="quickReplyFormComment" rows="5"></textarea>

                                            <div class="text-center">
                                                <button class="btn btn-info btn-sm" type="submit">Post</button>
                                            </div>
                                        </div>


                                        <div class="media d-block d-md-flex mt-3">
                                            <img class="d-flex mb-3 mx-auto " src="https://mdbootstrap.com/img/Photos/Avatars/img (21).jpg" alt="Generic placeholder image">
                                            <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                                <h5 class="mt-0 font-weight-bold">Sylvester the Cat
                                                    <a href="" class="pull-right">
                                                        <i class="fa fa-reply"></i>
                                                    </a>
                                                </h5>
                                                Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi
                                                tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
                                            </div>
                                        </div>--}}
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif

                            </div>
                        </div>
                        <!--/.Comments-->
                        @if($model->allow_comments)
                        <!--Reply-->
                        <div class="card mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">Leave a reply</div>
                            <div class="card-body">
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert"><span class="fa fa-times"></span> </button>
                                        <strong>{{ $message }}</strong>

                                    </div>

                            @endif
                            {!! Form::open(['route'=>'comments.posts.store', 'role' => 'form']) !!}

                                    <!-- Comment -->
                                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                                        <label for="body">Your comment</label>
                                        <input type="hidden" name="slug" id="slug" value="{{ $model->slug }}" class="form-control">
                                        <textarea class="form-control" name="body" id="body" rows="5">{{ old('body') }}</textarea>
                                        @if ($errors->has('body'))
                                            <span class="help-block">
                                            <strong class="text-danger">{{ $errors->first('body') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                    <!-- Name -->
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <label for="name">Your name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                        @if ($errors->has('name'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <br>

                                    <!-- Email -->
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <label for="email">Your e-mail</label>
                                    <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong class="text-danger">{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md wpcf7-submit photo-submit" name="submit" type="submit">Post</button>
                                    </div>
                                {!! Form::close() !!}
                                <!-- Default form reply -->



                            </div>
                        </div>
                        <!--/.Reply-->
                        @endif

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">

                        <!--Card : Dynamic content wrapper-->
                        <div class="card mb-4 text-center wow fadeIn">

                            <div class="card-header">Do you want to get informed about new articles?</div>

                            <!--Card content-->
                            <div class="card-body">

                                <!-- Default form login -->
                            {!! Form::open(['route' => 'subscriber.store', 'method' => 'POST',"class"=>"text-center","style"=>"color: rgb(255,255,255);" ]) !!}

                            <!-- Default input email -->
                                <label for="sub_email" class="grey-text">Your email</label>
                                <input type="email" name="sub_email" id="sub_email" class="form-control">

                                <br>

                                <!-- Default input password -->
                                <label for="name" class="grey-text">Your name</label>
                                <input type="text" name="name" id="name" class="form-control">

                                <div class="text-center mt-4">
                                    <button class="btn btn-info btn-md" type="submit" data-url="{{ url('subscribe/store') }}" id="subscriber">Sign up</button>
                                </div>
                            {!! Form::close() !!}
                            <!-- Default form login -->

                            </div>

                        </div>
                        <!--/.Card : Dynamic content wrapper-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header">Related articles</div>

                            <!--Card content-->
                            <div class="card-body">

                                <ul class="list-unstyled">
                                    @foreach($popular as $viral)
                                    <li class="media">
                                        <img class="d-flex mr-3" src="{{ asset('storage/uploads/posts/photos/thumbnails/'.$viral->photo) }}">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">{{ $viral->title }}</h5>
                                            </a>
                                            {!! html_entity_decode(str_limit($post->meta_description, 200, "...")) !!}....
                                        </div>
                                    </li>
                                        @endforeach
                                </ul>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

            </section>
            <!--Section: Post-->

        </div>
    </main>
    <!--Main layout-->
@endsection

@push('scripts')
    <script type="text/javascript">
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });
    </script>

@endpush


