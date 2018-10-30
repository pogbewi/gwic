@extends('templates.default')

@section('styles')
    <style type="text/css">
        html,
        body,
        header,#app,
        #intro, .view{
            height: 100%;
        }
    </style>
@endsection


@section('header')
    <header>
        @include('partials.top-nav-main')
        @include('partials.slider')
    </header>
    @endsection


@section('content')
    <!--Main layout-->
        <main class="mt-5">
            <div class="container">
                <!-- Section: Features v.4 -->
                <section id="best-features" class="my-0">

                    <!-- Section heading -->
                    <h2 class="h1-responsive font-weight-bold text-center my-5">Clients Choose us because?</h2>
                    <!-- Section description -->
                    <p class="lead dark-grey-text text-center w-responsive mx-auto mb-5">Global Wealth Investment Company is an organization with connection of over 500 foreign investors all over the world.</p>

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

                        <!-- Grid column -->
                        <div class="col-md-4 text-center mb-3">
                           @include('partials.services-slider')
                        </div>
                        <!-- Grid column -->

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
                            <!-- Grid row -->

                        {{--    <!-- Grid row -->
                            <div class="row">

                                <!-- Grid column -->
                                <div class="col-2">
                                    <i class="fa fa-2x fa-magic deep-purple-text"></i>
                                </div>
                                <!-- Grid column -->

                                <!-- Grid column -->
                                <div class="col-10">
                                    <h5 class="font-weight-bold mb-3">Magical</h5>
                                    <p class="grey-text mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit maiores nam, aperiam minima assumenda deleniti hic.</p>
                                </div>
                                <!-- Grid column -->

                            </div>
                            <!-- Grid row -->--}}

                        </div>
                        <!-- Grid column -->

                    </div>
                    <!-- Grid row -->

                </section>
                <!-- Section: Features v.4 -->

                <hr class="my-5">

                <!-- Section: Testimonials v.4 -->
                <section id="testimonials" class="text-center my-5">

                    <!-- Section heading -->
                    <h2 class="h1-responsive font-weight-bold my-5">Testimonials</h2>

                    <!-- Grid row -->
                    <div class="row">

                        <!--Carousel Wrapper-->
                        <div id="multi-item-example" class="carousel testimonial-carousel slide carousel-multi-item mb-5" data-ride="carousel">

                            @if(count($testimonials) > 0)
                                <!--Controls-->
                                    <div class="controls-top">
                                        <a class="btn-floating light-blue darken-4" href="#multi-item-example" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
                                        <a class="btn-floating light-blue darken-4" href="#multi-item-example" data-slide="next"><i class="fa fa-chevron-right"></i></a>
                                    </div>
                                    <!--Controls-->
                             @else
                                <div class="col-md-12 mx-auto text-center">
                                    <h4 class="text-center"> No slides available</h4>
                                </div>
                            @endif

                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                @foreach($testimonials->chunk(3) as $count =>$item)
                                <li data-target="#multi-item-example" data-slide-to="{{ $count }}" class="{{ $loop->first ? 'active':'' }} light-blue darken-4"></li>
                                @endforeach
                            </ol>
                            <!--Indicators-->

                            <!--Slides-->
                            <div class="carousel-inner" role="listbox">

                                @foreach($testimonials->chunk(3) as $count =>$item)
                                    <!--First slide-->
                                        <div class="carousel-item {{ $count == 0 ? 'active':'' }}">
                                                @foreach($item as $testimonial)
                                                        <!--Grid column-->
                                                        <div class="col-md-4">
                                                            <div class="testimonial">
                                                                <!--Avatar-->
                                                                <div class="avatar mx-auto">
                                                                    <img src="{{ asset('storage/uploads/testimonies/images/'.$testimonial->photo) }}" class="rounded-circle img-fluid" alt="{{ $testimonial->name }}">
                                                                </div>
                                                                <!--Content-->
                                                                <h4 class="font-weight-bold mt-4">{{ $testimonial->name }}</h4>
                                                                <h6 class="blue-text font-weight-bold my-3">{{ $testimonial->from }}</h6>
                                                                <p class="font-weight-normal"><i class="fa fa-quote-left pr-2"></i>{{ str_limit($testimonial->body, 150, "...") }}
                                                                </p>
                                                                <!--Review-->
                                                                <div class="grey-text">
                                                                    <i class="fa fa-star"> </i>
                                                                    <i class="fa fa-star"> </i>
                                                                    <i class="fa fa-star"> </i>
                                                                    <i class="fa fa-star"> </i>
                                                                    <i class="fa fa-star-half-full"> </i>
                                                                </div>
                                                                <a href="{{ route('testimonial.show', $testimonial->slug) }}" class="btn btn-deep-orange btn-rounded btn-md">Read more</a>
                                                            </div>
                                                        </div>
                                                        <!--Grid column-->
                                                @endforeach
                                            </div>
                                           <!--First slide-->
                                @endforeach

                            </div>
                            <!--Slides-->

                        </div>
                        <!--Carousel Wrapper-->

                    </div>
                    <!-- Grid row -->

                </section>
                <!-- Section: Testimonials v.4 -->

                <hr class="my-5">

                <!--Section: About-->
                <section id="about">

                    <h3 class="h3 text-center mb-5">About Global Wealth Investment Company</h3>

                    <!--Grid row-->
                    <div class="row wow fadeIn">

                        <!--Grid column-->
                        <div class="col-lg-6 col-md-12 px-4">

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

                            <!--Second row-->
                            <div class="row">
                                <div class="col-1 mr-3">
                                    <i class="fa fa-book fa-2x blue-text"></i>
                                </div>
                                <div class="col-10">
                                    <h5 class="feature-title font-weight-bold">Our Mission</h5>
                                    <p class="dark-grey-text">Our Mission is to be a standard company in networking investors and business owners. Bridging the gap between investors and business owners and offering the toughest assessment of potential and existing businesses.</p>
                                </div>
                            </div>
                            <!--/Second row-->

                            <div style="height:30px"></div>

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

                        <!--Grid column-->
                        <div class="col-lg-6 col-md-12">

                            {{--<p class="h5 text-center mb-4">Watch our "5 min Quick Start" tutorial</p>
                            <div class="embed-responsive embed-responsive-16by9" style="display:none;">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/cXTThxoywNQ" allowfullscreen></iframe>
                            </div>--}}
                            <div class="view overlay rounded z-depth-2 mb-4">
                                <img class="img-fluid" src="/assets/img/real-money.jpg" alt="About Global Wealth Investment Company">
                                <a>
                                    <div class="mask rgba-white-slight text-black-50"></div>
                                </a>
                                <p class="h5-responsive text-center mt-2">We Make Money Available For Business Growth!.</p>
                            </div>
                        </div>
                        <!--/Grid column-->

                        <div class="text-center mx-auto">
                            <a href="{{ route('about') }}" class="btn btn-info btn-rounded waves-effect waves-light mb-5 mt-5">...More About Us</a>
                        </div>

                    </div>
                    <!--/Grid row-->

                </section>
                <!--Section: About us-->


                <hr class="my-5">

                <!-- Section: Contact v.1 -->
                <section id="contact" class="my-5">

                    <!-- Section heading -->
                    <h2 class="h1-responsive font-weight-bold text-center my-5">Contact us</h2>
                    <!-- Section description -->
                    <p class="text-center w-responsive mx-auto pb-5">Below is our contact details. You can also locate us on the map or send us message for further enquiry by filling the contact form below. Thank you.</p>

                    <!-- Grid row -->
                    <div class="row">

                        <!-- Grid column -->
                        <div class="col-lg-5 mb-lg-0 mb-4">

                            <!-- Form with header -->
                            <div class="card">
                                <div class="card-body">
                                    <!-- Header -->
                                    {!! Form::open(['route' => 'contact.store', 'method' => 'POST', 'id'=>'contactform']) !!}
                                    <div class="form-header blue accent-1">
                                        <h3 class="mt-2"><i class="fa fa-envelope"></i> Write to us:</h3>
                                    </div>
                                    <p class="dark-grey-text">We'll respond promptly.</p>
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
                        <!-- Grid column -->

                        <!-- Grid column -->
                        <div class="col-lg-7">

                            <!-- Google map-->
                            <div id="map-container" class="rounded z-depth-1-half map-container" style="height: 400px"></div>
                            <br>
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

                        </div>
                        <!-- Grid column -->

                        <div class="text-center mx-auto">
                            <a href="{{ route('contact') }}" class="btn btn-light-blue btn-rounded waves-effect waves-light mb-5 mt-5">...More Contact Info</a>
                        </div>

                    </div>
                    <!-- Grid row -->

                </section>
                <!-- Section: Contact v.1 -->

                <hr class="my-5">

                <!-- Section: Blog v.2 -->
                <section id="blog" class="text-center my-5">

                    <!-- Section heading -->
                    <h2 class="h1-responsive font-weight-bold my-5">Recent posts</h2>
                    <!-- Section description -->
                    <p class="dark-grey-text w-responsive mx-auto mb-5">Below is our periodic publication, in case you want to know more about business investment trends around the world. </p>

                    <!-- Grid row -->
                    <div class="row">

                    @foreach($posts as $post)
                        <!-- Grid column -->
                            <div class="col-lg-4 col-md-12 mb-lg-0 mb-4 blog">

                                <!-- Featured image -->
                                <div class="view overlay rounded z-depth-2 mb-4">
                                    <img class="img-fluid" src="{{ asset('storage/uploads/posts/photos/thumbnails/'.$post->photo) }}" alt="{{ $post->title }}">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <!-- Category -->
                                <a href="!#" class="pink-text"><h6 class="font-weight-bold mb-3"><i class="fa fa-map pr-2"></i>{{ $post->category->name }}</h6></a>
                                <!-- Post title -->
                                <h4 class="font-weight-bold mb-3"><strong>{{ $post->title }}</strong></h4>
                                <!-- Post data -->
                                <p>by <a class="font-weight-bold">{{ $post->author->fullname }}</a>, {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</p>
                                <!-- Excerpt -->
                                <p class="dark-grey-text">{!! html_entity_decode(str_limit($post->body, 200, "...")) !!}....</p>
                                <!-- Read more button -->
                                <a href="{{ route('post.show', $post->slug) }}" class="btn btn-pink btn-rounded btn-md">Read more</a>

                            </div>
                            <!-- Grid column -->

                     @endforeach
                        <div class="text-center mx-auto">
                            <a href="{{ route('post') }}" class="btn btn-info btn-rounded waves-effect waves-light mb-3 mt-5">...More News & Info</a>
                        </div>

                    </div>
                    <!-- Grid row -->

                </section>
                <!-- Section: Blog v.2 -->

            </div>
        </main>
        <!--Main layout-->


    @endsection

@push('scripts')
    <!--Google Maps-->
    <script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"></script>
  {{--  <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAP_KEY') }}&callback=initMap"
            type="text/javascript"></script>--}}
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
