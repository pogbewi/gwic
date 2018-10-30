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

                    <h1 class="display-7 font-weight-bold">Contact Us</h1>
                    <p class="mb-0 d-none d-md-block">
                        <strong>
                            Below is our contact details. You can also locate us on the map or send us message for further enquiry by filling the contact form below. Thank you.
                        </strong>
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

                <!-- Buttons-->
                <div class="row text-center">
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1">
                            <i class="fa fa-map-marker"></i>
                        </a>
                        <p>300 Frank H. Ogawa Plaza, Suite 254 Oakland, CA 94612</p>
                        {{-- <p class="mb-md-0">United States</p>--}}
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1">
                            <i class="fa fa-phone"></i>
                        </a>
                        <p>ph: 510-835-8300 & fax: 510-835-8302</p>
                        <p class="mb-md-0">Mon - Fri, 8:00-22:00</p>
                    </div>
                    <div class="col-md-4">
                        <a class="btn-floating blue accent-1">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <p><a href="mailto:jeremyhuston@globalwealthinvestmentcompany.com">jeremyhuston@gwic.com</a></p>
                        {{--<p class="mb-0">sale@gmail.com</p>--}}
                    </div>
                </div>
            </section>
            <hr class="my-2">
            <section class="mt-5 mb-5 wow fadeIn">
                <!-- Section heading -->
                <h3 class="h1-responsive font-weight-bold text-center my-5">Contact Form</h3>
                <!-- Section description -->
                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-8 col-xl-10 mb-4 mx-auto">
                        <!-- Form with header -->
                        <div class="card">
                            <div class="card-body">
                                <!-- Header -->
                                {!! Form::open(['route' => 'contact.store', 'method' => 'POST', 'id'=>'contactform']) !!}
                                <div class="form-header blue accent-1">
                                    <h3 class="mt-2 text-center"><i class="fa fa-envelope"></i> Write to us:</h3>
                                </div>
                                <p class="dark-grey-text text-center">We'll respond promptly.</p>
                                <!-- Body -->
                                <div class="md-form">
                                    <i class="fa fa-user prefix grey-text"></i>
                                    <input type="text" id="form-name" name="name" class="form-control">
                                    <label for="form-name">Your name</label>
                                    <span class="help-block name"></span>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-phone prefix grey-text"></i>
                                    <input type="text" id="form-phone" name="phone" class="form-control">
                                    <label for="form-name">Your Phone</label>
                                    <span class="help-block phone"></span>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-envelope prefix grey-text"></i>
                                    <input type="text" id="form-email" name="email" class="form-control">
                                    <label for="form-email">Your email</label>
                                    <span class="help-block email"></span>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-tag prefix grey-text"></i>
                                    <input type="text" id="form-Subject" name="subject" class="form-control">
                                    <label for="form-Subject">Subject</label>
                                    <span class="help-block subject"></span>
                                </div>
                                <div class="md-form">
                                    <i class="fa fa-pencil prefix grey-text"></i>
                                    <textarea type="text" id="form-text" name="message" class="form-control md-textarea" rows="3"></textarea>
                                    <label for="form-text">Message</label>
                                    <span class="help-block message"></span>
                                </div>

                                @include('notify.circular_progressbar')
                                <div class="text-center">
                                    <button class="btn btn-light-blue" id="submit">Submit</button>
                                </div>

                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!-- Form with header -->

                    </div>
                </div>
                <!-- Grid row -->
            </section>
            <hr class="my-2">
            <section class="mt-5 mb-5 wow fadeIn">
                <!-- Section heading -->
                <h3 class="h1-responsive font-weight-bold text-center my-5">Locate Us On Map</h3>
                <!-- Section description -->
                <!-- Grid row -->
                <div class="row">

                    <!-- Grid column -->
                    <div class="col-md-8 col-xl-10 mb-4 mx-auto">
                        <!-- Google map-->
                        <div id="map-container" class="rounded z-depth-1-half map-container" style="height: 400px"></div>
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

    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
    <!-- Carousel options -->
    <script>
        $('.carousel').carousel({
            interval: 3000,
        })
    </script>

    <!-- Google Maps settings -->
    <script>
        // Regular map
        function regular_map() {
            var var_location = new google.maps.LatLng(40.725118, -73.997699);

            var var_mapoptions = {
                center: var_location,
                zoom: 14
            };

            var var_map = new google.maps.Map(document.getElementById("map-container"),
                var_mapoptions);

            var var_marker = new google.maps.Marker({
                position: var_location,
                map: var_map,
                title: "New York"
            });
        }

        // Initialize maps
        google.maps.event.addDomListener(window, 'load', regular_map);
    </script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#submit').on('click', function (e) {
                e.preventDefault();
                $('.preloader-wrapper').addClass('active');
                var name = $('#form-name').val();
                var phone = $('#form-phone').val();
                var email = $('#form-email').val();
                var subject = $('#form-Subject').val();
                var message = $('#form-text').val();
                //clear error messages
                clearError();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN' :$('meta[name="_token"]').attr('content')
                    }
                });
                $.post({
                    url: "{{ url('/contact/store') }}",
                    method: 'POST',
                    data:{
                        name: name,
                        phone: phone,
                        email: email,
                        subject: subject,
                        message: message,
                    },
                    success: function (data, status) {
                        //alert(data);
                        if(status === "success"){
                            notifier.notify(data['success'], status);
                            $('.preloader-wrapper').removeClass('active');
                            $('#contactform')[0].reset();
                        }

                    },
                    error:function(data, status){
                        notifier.notify("Gosh!, Error occured, try again", status);
                        showError(data);
                        $('.preloader-wrapper').removeClass('active');
                    }

                });
            });

            function showError(data) {
                $.each(data.responseJSON.errors, function (key, value) {
                    $('span.'+key).parent('.form-group').addClass('has-error');
                    $('input[name="'+key+'"]').addClass('is-invalid');
                    $('textarea[name="'+key+'"]').addClass('is-invalid');
                    $('span.'+key).replaceWith('<span class="invalid-feedback '+key+'" style="display:inline-block;"><strong>'+ value +'</strong></span>');
                })
            }

            function clearError() {
                var data = [
                    'name', 'phone', 'email', 'subject','message'
                ];
                $.each(data, function (key) {
                    $('span.'+data[key]).parent('.form-group').removeClass('has-error');
                    $('input[name="'+data[key]+'"]').removeClass('is-invalid');
                    $('textarea[name="'+data[key]+'"]').removeClass('is-invalid');
                    $('span.'+data[key]).replaceWith('<span class="help-block '+data[key]+'"></span>');
                })
            }
        });
    </script>

@endpush

