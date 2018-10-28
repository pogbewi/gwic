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
    <main>
        <!-- Content -->
        <div class="container">

            <!--Grid row-->
            <div class="row wow fadeIn">

                <!--Grid column-->
                <div class="col-md-10 mb-4 black-text text-center mx-auto ">

                    <h1 class="display-7 font-weight-bold">News And Info</h1>
                    <p class="mb-0 d-none d-md-block">
                        <strong></strong>
                    </p>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
        <!-- Content -->
        <hr class="my-2">
        <div class="container">

            <!--Section: Main info-->
            <section class="mt-5 mb-5 wow fadeIn blog">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12">


                        <!--Image-->
                        <div class="view overlay rounded z-depth-1-half mb-3">
                            <img src="https://mdbootstrap.com/img/Photos/Others/images/77.jpg" class="img-fluid" alt="Sample post image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!--Excerpt-->
                        <div class="news-data">
                            <a href="" class="light-blue-text">
                                <h6>
                                    <i class="fa fa-plane"></i>
                                    <strong> Travels</strong>
                                </h6>
                            </a>
                            <p>
                                <strong>
                                    <i class="fa fa-clock-o"></i> 20/08/2018</strong>
                            </p>
                        </div>
                        <h3>
                            <a>
                                <strong>This is title of the news</strong>
                            </a>
                        </h3>
                        <p> Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
                            placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                        </p>

                        <!--/Featured news-->

                        <hr>

                        <!--Small news-->
                        <div class="row">
                            <div class="col-md-3">

                                <!--Image-->
                                <div class="view overlay rounded z-depth-1">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/photo8.jpg" class="img-fluid" alt="Minor sample post image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>

                            <!--Excerpt-->
                            <div class="col-md-9">
                                <p class="dark-grey-text">
                                    <strong>19/08/2018</strong>
                                </p>
                                <a>Lorem ipsum dolor sit amet
                                    <i class="fa fa-angle-right float-right"></i>
                                </a>
                            </div>

                        </div>
                        <!--/Small news-->

                        <hr>

                        <!--Small news-->
                        <div class="row">
                            <div class="col-md-3">

                                <!--Image-->
                                <div class="view overlay rounded z-depth-1">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/images/54.jpg" class="img-fluid" alt="Minor sample post image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>

                            <!--Excerpt-->
                            <div class="col-md-9">
                                <p class="dark-grey-text">
                                    <strong>18/08/2018</strong>
                                </p>
                                <a>Soluta nobis est eligendi
                                    <i class="fa fa-angle-right float-right"></i>
                                </a>
                            </div>

                        </div>
                        <!--/Small news-->

                        <hr>

                        <!--Small news-->
                        <div class="row">
                            <div class="col-md-3">

                                <!--Image-->
                                <div class="view overlay rounded z-depth-1">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/images/49.jpg" class="img-fluid" alt="Minor sample post image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>

                            <!--Excerpt-->
                            <div class="col-md-9">
                                <p class="dark-grey-text">
                                    <strong>17/08/2018</strong>
                                </p>
                                <a>Voluptatem accusantium doloremque
                                    <i class="fa fa-angle-right float-right"></i>
                                </a>
                            </div>

                        </div>
                        <!--/Small news-->

                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-lg-6 col-md-12">

                        <!--Image-->
                        <div class="view overlay rounded z-depth-1-half mb-3">
                            <img src="https://mdbootstrap.com/img/Photos/Others/images/32.jpg" class="img-fluid" alt="Sample post image">
                            <a>
                                <div class="mask rgba-white-slight"></div>
                            </a>
                        </div>

                        <!--Excerpt-->
                        <div class="news-data">
                            <a href="" class="light-blue-text">
                                <h6>
                                    <i class="fa fa-plane"></i>
                                    <strong> Travels</strong>
                                </h6>
                            </a>
                            <p>
                                <strong>
                                    <i class="fa fa-clock-o"></i> 20/08/2018</strong>
                            </p>
                        </div>
                        <h3>
                            <a>
                                <strong>This is title of the news</strong>
                            </a>
                        </h3>
                        <p> Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime
                            placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.
                        </p>

                        <!--/Featured news-->

                        <hr>

                        <!--Small news-->
                        <div class="row">
                            <div class="col-md-3">

                                <!--Image-->
                                <div class="view overlay rounded z-depth-1">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/photo11.jpg" class="img-fluid" alt="Minor sample post image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>

                            <!--Excerpt-->
                            <div class="col-md-9">
                                <p class="dark-grey-text">
                                    <strong>19/08/2018</strong>
                                </p>
                                <a>Lorem ipsum dolor sit amet
                                    <i class="fa fa-angle-right float-right"></i>
                                </a>
                            </div>

                        </div>
                        <!--/Small news-->

                        <hr>

                        <!--Small news-->
                        <div class="row">
                            <div class="col-md-3">

                                <!--Image-->
                                <div class="view overlay rounded z-depth-1">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/images/51.jpg" class="img-fluid" alt="Minor sample post image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>

                            <!--Excerpt-->
                            <div class="col-md-9">
                                <p class="dark-grey-text">
                                    <strong>18/08/2018</strong>
                                </p>
                                <a>Soluta nobis est eligendi
                                    <i class="fa fa-angle-right float-right"></i>
                                </a>
                            </div>

                        </div>
                        <!--/Small news-->

                        <hr>

                        <!--Small news-->
                        <div class="row">
                            <div class="col-md-3">

                                <!--Image-->
                                <div class="view overlay rounded z-depth-1">
                                    <img src="https://mdbootstrap.com/img/Photos/Others/images/44.jpg" class="img-fluid" alt="Minor sample post image">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>
                            </div>

                            <!--Excerpt-->
                            <div class="col-md-9">
                                <p class="dark-grey-text">
                                    <strong>17/08/2018</strong>
                                </p>
                                <a>Voluptatem accusantium doloremque
                                    <i class="fa fa-angle-right float-right"></i>
                                </a>
                            </div>

                        </div>
                        <!--/Small news-->

                    </div>
                    <!--Grid column-->
                </div>
            </section>
        </div>
    </main>
@endsection

@push('scripts')
    <script type="text/javascript">
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').material_select();
        });
    </script>

@endpush


