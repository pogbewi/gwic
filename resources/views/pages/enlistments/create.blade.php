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
                <div class="col-md-6 mb-4 black-text text-center mx-auto form-page-title">

                    <h1 class="display-5 font-weight-bold">Business Investment Form</h1>
                    <p class="mb-0 d-none d-md-block">
                        <strong>Fill the forms below to get connected with foreign investors around the world.</strong>
                    </p>
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
                                <!-- Extended default form grid -->
                            {!! Form::open(['route' => 'enlist.validate', 'method' => 'POST']) !!}
                                    <!-- Heading -->
                                    <h3 class="dark-grey-text text-center">
                                        <strong>Business Info:</strong>
                                    </h3>
                                    <hr>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-2">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
                                            <span class="help-block title"></span>
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-5">
                                            <label for="firstname">First Name</label>
                                            <input type="text" name="firstname" class="form-control" id="firstname" placeholder="First Name">
                                            <span class="help-block firstname"></span>
                                        </div>

                                        <div class="form-group col-md-5">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="Last Name">
                                            <span class="help-block lastname"></span>
                                        </div>
                                    </div>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <label for="phone">Phone</label>
                                            <input type="tel" name="phone" class="form-control" id="phone" placeholder="Phone">
                                            <span class="help-block phone"></span>
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <label for="businessname">Business Name</label>
                                            <input type="text" name="businessname" class="form-control" id="businessname" placeholder="Business">
                                            <span class="help-block businessname"></span>
                                        </div>
                                    </div>

                                    <!-- Default input -->
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Email">
                                        <span class="help-block email"></span>
                                    </div>

                                    <!-- Default input -->
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St">
                                        <span class="help-block address"></span>
                                    </div>
                                    <!-- Default input -->
                                    <div class="form-group">
                                        <label for="address_two">Address 2</label>
                                        <input type="text" name="address_two" class="form-control" id="address_two" placeholder="Apartment, studio, or floor">
                                        <span class="help-block address_two"></span>
                                    </div>
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <label for="nationality">Nationality</label>
                                            <input type="text" name="nationality" class="form-control" id="nationality" placeholder="E.g American">
                                            <span class="help-block nationality"></span>
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <select class="mdb-select md-form" name="operation_countries" id="operation_countries" multiple>
                                                <option value="" disabled selected>Choose your option</option>
                                                @foreach($all_countries as $country)
                                                    <option value="{{ $country['name']['common'] }}">{{ $country['name']['common'] }}</option>
                                                @endforeach
                                            </select>
                                            <label>Countries of Operation</label>
                                            <span class="help-block operation_countries"></span>
                                        </div>
                                    </div>
                                    <!-- Grid row -->
                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <label for="city">City</label>
                                            <input type="text" name="city" class="form-control" id="city" placeholder="New York City">
                                            <span class="help-block city"></span>
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <select class="mdb-select md-form" name="gender" id="gender">
                                                <option value="" disabled selected>Choose your option</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            <label>Gender</label>
                                            <span class="help-block gender"></span>
                                        </div>
                                    </div>
                                    <!-- Grid row -->

                                    <!-- Grid row -->
                                    <div class="form-row">
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <label for="amount_needed">Investment Amount Needed ($ only)</label>
                                            <input type="text" name="amount_needed" class="form-control" id="amount_needed" placeholder="$1000000.00">
                                            <span class="help-block amount_needed"></span>
                                        </div>
                                        <!-- Default input -->
                                        <div class="form-group col-md-6">
                                            <select class="mdb-select md-form" name="status" id="status">
                                                <option value="" disabled selected>Choose your option</option>
                                                <option value="operational">Operational</option>
                                                <option value="potential">Potential</option>
                                            </select>
                                            <label>Business Status</label>
                                            <span class="help-block status"></span>
                                        </div>
                                    </div>
                                    <!-- Grid row -->
                                @include('notify.circular_progressbar')
                                    <div class="form-row text-center mx-auto">
                                        <button type="submit" id="submit" class="btn btn-primary btn-md mx-auto d-block">Submit</button>
                                    </div>
                            {!! Form::close() !!}
                                <!-- Extended default form grid -->
                            </div>
                        </div>
                           {{-- <div class="mask flex-center">
                                @include('notify.circular_progressbar')
                            </div>
                        </div>--}}

                        <!-- Central Modal Medium Info -->
                        <div class="modal fade" id="centralModalInfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-notify modal-info" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-header">
                                        <p class="heading lead">Terms And Conditions</p>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true" class="white-text">&times;</span>
                                        </button>
                                    </div>

                                    <!--Body-->
                                    <div class="modal-body">
                                        <div class="text-center">
                                            <i class="fa fa-check fa-4x mb-3 animated rotateIn"></i>
                                            <ol class="list-group text-left">
                                                <li class="list-group-item">All business owner and potential business owner who are successful in connecting to a foreign investor
                                                will have to pay a consultancy fee of five percent (5%) of the total foreign investment received from foreign
                                                    investor at the end of one (1) year of successful investment.</li>
                                                <li class="list-group-item">Global Wealth Investment Company has the solemn right to choose a foreign investor for its clients</li>
                                                <li class="list-group-item">If communication with foreign investor breaks down, Global Wealth Investment Company must be notified
                                                    immediately by mail (jeremyhuston@globalwealthinvestmentcompany.com) , so that another foreign investor be allocated within 48 hours.</li>
                                            </ol>

                                        </div>
                                    </div>

                                    <!--Footer-->
                                    <div class="modal-footer justify-content-center">
                                        <a type="button" class="btn btn-primary" id="accept">Accept<i class="fa fa-diamond ml-1"></i></a>
                                        <a type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal" id="decline">No, thanks</a>
                                    </div>
                                </div>
                                <!--/.Content-->
                            </div>
                        </div>
                        <!-- Central Modal Medium Info-->

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

    <script type="text/javascript">
        $(document).ready(function (){
            $('#submit').on('click', function (e) {
                e.preventDefault();
                $('.preloader-wrapper').addClass('active');
                var title = $('#title').val();
                var firstname = $('#firstname').val();
                var lastname = $('#lastname').val();
                var phone = $('#phone').val();
                var businessname = $('#businessname').val();
                var email = $('#email').val();
                var address = $('#address').val();
                var address_two = $('#address_two').val();
                var nationality = $('#nationality').val();
                var operation_countries = $('#operation_countries').val();
                var city = $('#city').val();
                var gender = $('#gender').val();
                var amount_needed = $('#amount_needed').val();
                var status = $('#status').val();
                //clear error messages
                clearError();
                $.ajaxSetup({
                    headers: {
                    'X-CSRF-TOKEN' :$('meta[name="_token"]').attr('content')
                }
                });
                $.post({
                    url: "{{ url('/enlist/validate') }}",
                    method: 'POST',
                    data:{
                        title: title,
                        firstname: firstname,
                        lastname: lastname,
                        phone: phone,
                        businessname: businessname,
                        email: email,
                        address: address,
                        address_two: address_two,
                        nationality: nationality,
                        operation_countries: operation_countries,
                        city: city,
                        gender: gender,
                        amount_needed: amount_needed,
                        status: status,
                    },
                    success: function (data, status) {
                        //alert(data);
                        if(status === "success"){
                            $('#centralModalInfo').modal('show');
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
                    $('select[name="'+key+'"]').addClass('is-invalid');
                    $('span.'+key).replaceWith('<span class="invalid-feedback '+key+'" style="display:inline-block;"><strong>'+ value +'</strong></span>');
                })
            }

            function clearError() {
                var data = [
                    'title', 'firstname', 'lastname', 'phone','businessname','email',
                    'address','address_two','nationality','operation_countries',
                    'city','gender','amount_needed','status'
                ];
                $.each(data, function (key) {
                    $('span.'+data[key]).parent('.form-group').removeClass('has-error');
                    $('input[name="'+data[key]+'"]').removeClass('is-invalid');
                    $('select[name="'+data[key]+'"]').removeClass('is-invalid');
                    $('span.'+data[key]).replaceWith('<span class="help-block '+data[key]+'"></span>');
                })
            }

        $('#accept').on('click', function (e) {
            e.preventDefault();
            var agreed = true;
            $.post({
                url: "{{ url('/enlist/store') }}",
                method: 'POST',
                data: {
                    agreed: agreed,
                },
                success: function (data, status) {
                    if (status === "success") {
                        $('#centralModalInfo').modal('hide');
                        notifier.notify(data['success'], status);
                        $('.form-page-title').replaceWith('<div class="col-md-6 mb-4 black-text text-center mx-auto form-page-title">\n' +
                            '\n' +
                            ' <h1 class="display-5 font-weight-bold green-text">Request For Business Investors</h1>\n' +
                            ' <p class="mb-0 d-none d-md-block green-text">\n' +
                            '<strong>Your Request form has been sent.</strong>\n' +
                            '</p>\n' +
                            '</div>');
                        $('.investment-card-body').replaceWith('<div class="card-body investment-card-body text-center"><p class="dark-gray-text">' +
                            'We thank you for applying to connect with a foreign investor.\n' +
                            'Within less than 48 Hours, you will be communicating with a foreign investor\n' +
                            'Kindly check your mail immediately for our response.\n</p><hr class="my-2">' +
                            '<a href="{{ route('enlist.create') }}" type="button" class="btn btn-primary" id="accept">Send Another Request</a>\n' +
                            '<a href="{{ url('/') }}" type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal" id="decline">Return To Homepage</a>' +
                            '</div>');
                    }

                },
                error: function (data, status) {
                    notifier.notify("Gosh!, Error occured, try again", status);
                    showError(data);
                    $('.preloader-wrapper').removeClass('active');
                }
            });
        });

        $('#decline').on('click', function (e) {
            e.preventDefault();
            var agreed = false;
            $.post({
                url: "{{ url('/enlist/store') }}",
                method: 'POST',
                data: {
                    agreed: agreed,
                },
                success: function (data, status) {
                    //alert(data);
                    if (status === "success") {
                        $('#centralModalInfo').modal('hide');
                        notifier.notify(data['success'], status);
                        $('.investment-card-body').replaceWith('<div class="card-body investment-card-body"><a href="{{ route('enlist.create') }}" type="button" class="btn btn-primary" id="accept">Send Another Request</a>\n' +
                            '<a href="{{ url('/') }}" type="button" class="btn btn-outline-primary waves-effect" data-dismiss="modal" id="decline">Return To Homepage</a>' +
                            '</div>');
                    }

                },
                error: function (data, status) {
                    notifier.notify("Gosh!, Error occured, try again", status);
                    showError(data);
                    $('.preloader-wrapper').removeClass('active');
                }
            });
        });

     });
    </script>

@endpush
