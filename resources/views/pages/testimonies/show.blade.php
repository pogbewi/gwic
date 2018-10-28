@extends('templates.default')
@section('page_title', $page_title)
@section('description', $page_description)
@section('keyword', $page_keywords)

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

                            <img src="{{ asset('storage/uploads/testimonies/images/'.$testimonial->photo) }}" alt="{{ $testimonial->name }}" class="img-fluid card-img" style="height: 50%;width: 100%">

                        </div>
                        <!--/.Featured Image-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body text-center">
                                <h5 class="my-4">
                                    <strong>{{ $testimonial->name }}</strong>
                                </h5>

                                <p class="h5 my-4">From {{ $testimonial->from }}</p>

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">

                                <p class="h5 my-4 font-small">Here is what {{ $testimonial->name }} has to say...</p>


                                <blockquote class="blockquote">
                                    {{ $testimonial->body }}
                                </blockquote>

                            </div>

                        </div>
                        <!--/.Card-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-4 mb-4">
                        <!--Card : Dynamic content wrapper-->
                        <div class="card mb-4 text-center wow fadeIn">

                            <div class="card-header">Do you want to get informed about new articles?</div>

                            <!--Card content-->
                            <div class="card-body">
                                <div class="col-md-8 show-error text-danger alert-danger mx-auto text-center mr-5" style="display: none"></div>

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
                                    <li class="media">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder7.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
                                    <li class="media my-4">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder6.jpg" alt="An image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
                                    <li class="media">
                                        <img class="d-flex mr-3" src="https://mdbootstrap.com/img/Photos/Others/placeholder5.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <a href="">
                                                <h5 class="mt-0 mb-1 font-weight-bold">List-based media object</h5>
                                            </a>
                                            Cras sit amet nibh libero, in gravida nulla (...)
                                        </div>
                                    </li>
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


