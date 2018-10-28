@extends('templates.default')

@section('styles')
    <style type="text/css">
        html,
        body,
        header,#app,
        #intro, .view{
            height: 100%;
        }

        @media (max-width: 559px) {
            html,
            body,
            header,#app,
            .view {
                height: 1000px;
            }
        }

        @media (min-width: 560px) and (max-width: 740px) {
            html,
            body,
            header,#app,
            .view {
                height: 700px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,#app,
            .view {
                height: 600px;
            }
        }

        @media (min-width: 800px) and (max-width: 850px) {
            .navbar:not(.top-nav-collapse) {
                background: #1C2331!important;
            }
        }
    </style>
@endsection

@section('header')
    @include('partials.top-nav-other')

@endsection


@section('content')
    <!-- Full Page Intro -->
    <div class="view">

       {{-- <video class="video-intro" poster="https://mdbootstrap.com/img/Photos/Others/background.jpg" playsinline autoplay muted loop>
            <source src="https://mdbootstrap.com/img/video/Lines-min.mp4" type="video/mp4">
        </video>--}}

        <img class="img-fluid img-circle" src="../assets/img/business.jpg" alt="Sample image">

        <!-- Mask & flexbox options-->
        <div class="mask rgba-black-light d-flex justify-content-center align-items-center">

            <!-- Content -->
            <div class="text-center white-text mx-5 wow fadeIn">

                <h1 class="display-4 mb-4">
                    <strong>Coming Soon!</strong>
                </h1>

                <!-- Time Counter -->
                <p id="time-counter" class="border border-light my-4"></p>


                <h4 class="mb-4">
                    <strong>We're working hard to finish the development of this site. </strong>
                </h4>

                <h4 class="mb-4 d-none d-md-block">
                    <strong>Until then you can subscribe to our newsletter</strong>
                </h4>

                <a href="" class="btn btn-outline-white btn-lg" data-toggle="modal" data-target="#modalSubscriptionForm">Subscribe
                    <i class="fa fa-newspaper-o ml-2"></i>
                </a>
            </div>
            <!-- Content -->

        </div>
        <!-- Mask & flexbox options-->

        <div class="modal fade" id="modalSubscriptionForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h4 class="modal-title w-100 font-weight-bold">Subscribe</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body mx-3">
                        <div class="col-md-8 show-sub_error text-danger alert-danger mx-auto text-center mr-5" style="display: none"></div>
                        <div class="md-form mb-5">
                            <i class="fa fa-user prefix grey-text"></i>
                            <input type="text" id="subscriber_name" name="subscriber_name" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="subscriber_name">Your name</label>
                        </div>

                        <div class="md-form mb-4">
                            <i class="fa fa-envelope prefix grey-text"></i>
                            <input type="email" id="subscriber_email" name="subscriber_email" class="form-control validate">
                            <label data-error="wrong" data-success="right" for="subscriber_email">Your email</label>
                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <button class="btn btn-indigo" data-url="{{ url('subscribe/store') }}" id="subscribe-now">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalSubscriptionForm">Launch Modal Subscription Form</a>
        </div>

    </div>
    <!-- Full Page Intro -->

@endsection

@push('scripts')
    <!-- Time Counter -->
    <script type="text/javascript">
        // Set the date we're counting down to
        var countDownDate = new Date();
        countDownDate.setDate(countDownDate.getDate() + 30);

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("time-counter").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("time-counter").innerHTML = "EXPIRED";
            }
        }, 1000);
    </script>
@endpush
