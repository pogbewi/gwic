@extends('templates.default')

@section('styles')
    <style type="text/css">
        html,
        body,
        header,#app,
        #intro, .view{
            height: 65%;
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

                    <h1 class="display-7 font-weight-bold">Frequently Asked Question (FAQ)</h1>
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
            <section class="mt-5 mb-5 wow fadeIn">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6 col-xl-10 mb-4 mx-auto">
                        <!--Accordion wrapper-->
                        <div class="accordion md-accordion dark-grey-text" id="accordionEx" role="tablist" aria-multiselectable="true">

                            <!-- Accordion card -->
                            <div class="card">

                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingOne1">
                                    <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                                        <h5 class="mb-0">
                                            How do I contact a foreign investor? <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>

                                <!-- Card body -->
                                <div id="collapseOne1" class="collapse show" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                                    <div class="card-body">
                                        To contact to a foreign investor, click on CONNECT TO AN INVESTOR button on the website, fill your correct detail on the form and submit the form.
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion card -->

                            <!-- Accordion card -->
                            <div class="card">

                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingTwo2">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                        <h5 class="mb-0">
                                            How long does it take for me to start communicating with a foreign investor? <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>

                                <!-- Card body -->
                                <div id="collapseTwo2" class="collapse" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                                    <div class="card-body">
                                        It takes 48 hour from the moment you fill the form and submit to start communicating with a foreign investor.
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion card -->

                            <!-- Accordion card -->
                            <div class="card">

                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingThree3">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3" aria-expanded="false" aria-controls="collapseThree3">
                                        <h5 class="mb-0">
                                           How much foreign investor is willing to invest in my business? <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>

                                <!-- Card body -->
                                <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3" data-parent="#accordionEx">
                                    <div class="card-body">
                                        Depending on how well you communicate with investor. They are willing to invest as high as two (2) million USD in a single investment.
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion card -->

                            <!-- Accordion card -->
                            <div class="card">

                                <!-- Card header -->
                                <div class="card-header" role="tab" id="headingFour4">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseFour4" aria-expanded="false" aria-controls="collapseFour4">
                                        <h5 class="mb-0">
                                            How am I qualified to connect to a foreign investor? <i class="fa fa-angle-down rotate-icon"></i>
                                        </h5>
                                    </a>
                                </div>

                                <!-- Card body -->
                                <div id="collapseFour4" class="collapse" role="tabpanel" aria-labelledby="headingFour4" data-parent="#accordionEx">
                                    <div class="card-body">
                                        To be considered to connect to foreign investor, you must be a business owner or a potential business owner.
                                    </div>
                                </div>

                            </div>
                            <!-- Accordion card -->

                        </div>
                        <!-- Accordion wrapper -->
                    </div>
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

