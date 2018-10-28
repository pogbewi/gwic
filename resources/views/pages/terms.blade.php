
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

                    <h1 class="display-7 font-weight-bold">Terms And Conditions</h1>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </div>
        <!-- Content -->
        <div class="container">

            <!--Section: Main info-->
            <section class="mt-5 mb-5 wow fadeIn">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 col-xl-10 mb-4 mx-auto">
                    {{--<div class="view" style="overflow: visible">--}}
                    <!--Card-->
                        <div class="card">

                            <!--Card content-->
                            <div class="card-body investment-card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">1.	All business owner and potential business owner who are successful in connecting to a foreign investor will have to pay a consultancy fee of five percent (5%) of the total foreign investment received from foreign investor at the end of one (1) year of successful investment.</li>
                                    <li class="list-group-item">2.	Global Wealth Investment Company has the solemn right to choose a foreign investor for its clients</li>
                                    <li class="list-group-item">3.	If communication with foreign investor breaks down, Global Wealth Investment Company must be notified immediately by mail (jeremyhuston@globalwealthinvestmentcompany.com) , so that another foreign investor be allocated within 48 hours.</li>
                                </ul>
                            </div>
                        </div>
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

