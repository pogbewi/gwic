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

                    <h1 class="display-7 font-weight-bold">About Us</h1>
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
                    <div class="col-md-8 col-xl-10 mb-4 mx-auto">
                        <p class="dark-grey-text">
                            Global Wealth Investment Company is an organization with connection of over 500 foreign investors all over the world..
                        </p>
                        <blockquote>
                            "We have been looking for Business owners and potential Business owners, seeking direct foreign investment into their businesses for growth and expansion since 1990." -- Jeremy Huston, CEO
                        </blockquote>
                        <p>
                            We understand the importance of direct foreign investment in your business. These investments can make your company grow and expand. By doing so, you are making your business more profitable. By choosing Global Wealth Investment Company, we connect you and your business to direct foreign investor and investment.
                        </p>
                    </div>
                </div>
            </section>
            <hr class="my-2">
            <section class="mt-5 mb-5 wow fadeIn">
                <!-- Section heading -->
                <h3 class="h1-responsive font-weight-bold text-center my-5">Core Services</h3>
                <!-- Section description -->
                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-4">

                        <!-- Grid row -->
                        <div class="row mb-3">

                            <!-- Grid column -->
                            <div class="col-2">
                                <i class="fa fa-2x fa-flag-checkered deep-purple-text"></i>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-3">Locate</h5>
                                <p class="dark-grey-text"> Locate Genuine Businesses opportunities and potential Businesses opportunities.</p>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                        <!-- Grid row -->
                        <div class="row mb-3">

                            <!-- Grid column -->
                            <div class="col-2">
                                <i class="fa fa-2x fa-flask deep-purple-text"></i>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-3">Assess</h5>
                                <p class="dark-grey-text">Assess Genuine Businesses for need of foreign Investment</p>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                    </div>
                    <!-- Grid column -->
                    <div class="col-md-4">
                        <!-- Grid row -->
                        <div class="row mb-md-0 mb-3">

                            <!-- Grid column -->
                            <div class="col-2">
                                <i class="fa fa-2x fa-glass deep-purple-text"></i>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-3">Connect</h5>
                                <p class="dark-grey-text mb-md-0">Connect Business owners, Entrepreneurs and potential business owners directly to foreign Investor(s)</p>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->
                    </div>
                    <!-- Grid column -->
                    <div class="col-md-4">

                        <!-- Grid row -->
                        <div class="row mb-3">

                            <!-- Grid column -->
                            <div class="col-2">
                                <i class="fa fa-2x fa-heart deep-purple-text"></i>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-3">Follow Up</h5>
                                <p class="dark-grey-text">follow up on investment until both parties are satisfied with the return on investment</p>
                            </div>
                            <!-- Grid column -->

                        </div>
                        <!-- Grid row -->

                        <!-- Grid row -->
                        <div class="row mb-3">

                            <!-- Grid column -->
                            <div class="col-2">
                                <i class="fa fa-2x fa-flash deep-purple-text"></i>
                            </div>
                            <!-- Grid column -->

                            <!-- Grid column -->
                            <div class="col-10">
                                <h5 class="font-weight-bold mb-3">Analysis</h5>
                                <p class="dark-grey-text">Investment Analysis and Due Diligence</p>
                            </div>
                            <!-- Grid column -->

                        </div>
                    </div>
                    <!-- Grid column -->

                </div>
                <!-- Grid row -->
            </section>
            <hr class="my-2">
            <section class="mt-5 mb-5 wow fadeIn">
                <!-- Section heading -->
                <h3 class="h1-responsive font-weight-bold text-center my-5">Who We Are</h3>
                <!-- Section description -->
                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-8 col-xl-10 mb-4 mx-auto">
                        <p class="dark-grey-text">
                            GWIC has been connecting foreign investor with business owners for more than 28 years.
                            We have successfully linked business owners and potential business owners with foreign investors from UK,
                            USA, Canada, UAE, Australia, China and India. The modes of communication are through direct communication with our clients.
                        </p>

                        <p class="red-text">
                            Headquartered in the heart of Downtown Oakland, Our purpose is to make it possible for investors and fiduciaries to make financial and business decisions,
                            which provide the best promise for a healthy relationship and prosperous future
                        </p>
                    </div>
                    <!--Grid column-->
                </div>
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-8 col-xl-10 mb-4 mx-auto">
                        <p class="dark-grey-text">
                            This website is a publication of Global Wealth Investment Company.  Information presented is believed to be factual and up-to-date,
                            but we do not guarantee its accuracy and it should not be regarded as a complete analysis of the subjects discussed. All expressions
                            of opinion reflect the judgment of the authors as of the date of publication and are subject to change.
                        </p>

                        <p class="dark-grey-text">
                            Global Wealth Investment Company is registered as an investment adviser with the state of California.
                            The firm only transacts business in states where it is properly registered, or is excluded or exempted from
                            registration requirements. Registration as an investment adviser does not constitute an endorsement of the firm
                            by securities regulators nor does it indicate that the adviser has attained a particular level of skill or ability.
                        </p>
                    </div>
                    <!--Grid column-->
                </div>

            </section>
            <hr class="my-2">
            <section class="mt-5 mb-5 wow fadeIn">
                <!-- Section heading -->
                <h3 class="h1-responsive font-weight-bold text-center my-5">Our Motivation</h3>
                <!-- Section description -->
                <!-- Grid row -->

                <div class="row">
                    <div class="col-lg-4 col-md-4 px-4 mt-3">

                        <!--First row-->
                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fa fa-eye fa-2x indigo-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title font-weight-bold">Our Vision</h5>
                                <p class="dark-grey-text">Our vision is to be a company that foreign investors and business owners can fully rely on for easy networking.</p>
                            </div>
                        </div>
                        <!--/First row-->

                        <div style="height:30px"></div>
                    </div>
                    <div class="col-lg-4 col-md-4 px-4">
                        <!--Second row-->
                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fa fa-book fa-2x blue-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title font-weight-bold">Our Mission</h5>
                                <p class="dark-grey-text">
                                    Our Mission is to be a standard company in networking investors and business owners. Bridging the gap between investors and business owners
                                    and offering the toughest assessment of potential and existing businesses.
                                </p>
                            </div>
                        </div>
                        <!--/Second row-->

                        <div style="height:30px"></div>
                    </div>
                    <div class="col-lg-4 col-md-4 px-4">
                        <!--Third row-->
                        <div class="row">
                            <div class="col-1 mr-3">
                                <i class="fa fa-graduation-cap fa-2x cyan-text"></i>
                            </div>
                            <div class="col-10">
                                <h5 class="feature-title font-weight-bold">Aim</h5>
                                <p class="dark-grey-text">Our aim is to make foreign investors easily accessible to business owners and potential business owners.</p>
                            </div>
                        </div>
                        <!--/Third row-->
                    </div>
                    <!--/Grid column-->
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

