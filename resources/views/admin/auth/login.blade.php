@extends('admin.templates.default')

@section('styles')
    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 100%;
        }

        @media (max-width: 740px) {
            html,
            body,
            header,
            .view {
                height: 1000px;
            }
        }
        @media (min-width: 800px) and (max-width: 850px) {
            html,
            body,
            header,
            .view {
                height: 650px;
            }
        }
        :root {
            --info-color: #fefefe;
        }

        .btn-toggle-pass {
            border: none;
            position: absolute;
            top: 11px;
            background: transparent;
            right: 0;
        }

        .btn-toggle-pass.active {
            color: var(--info-color);
        }
    </style>
@endsection

@section('body-class', 'grey lighten-2 login-bg')

@section('header')
    <!-- Main Nav -->
    @include('admin.partials.nav-other')

    <!-- Full Page Intro -->
    <div class="view" style="background-image: url('/assets/img/business.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center; height: 600px;">
        <!-- Mask & flexbox options-->
        <div class="mask rgba-gradient d-flex justify-content-center align-items-center">
           <!-- Login Vue Component here -->
            <!-- Content -->
            <div class="container">
                <!--Grid row-->
                <div class="row mt-5">
                    <!--Grid column-->
                    <div class="col-md-6 mb-5 mt-md-0 mt-5 white-text text-center text-md-left">
                        <h1 class="h1-responsive font-weight-bold wow fadeInLeft" data-wow-delay="0.3s">Admin Sign In! </h1>
                        <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                        <h6 class="mb-3 wow fadeInLeft" data-wow-delay="0.3s">Admin please sign in with the email and password given, you are
                            advised to change the password afterwards.</h6>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-md-6 col-xl-5 mb-4 login">
                        <!--Form-->
                        <div class="card wow fadeInRight" data-wow-delay="0.3s">
                            <div class="card-body">
                            {!! Form::open(['route' => 'admin.postLogin', 'method' => 'POST']) !!}
                                    <!--Header-->
                                    <div class="text-center">
                                        <h3 class="white-text">
                                            <i class="fa fa-user white-text"></i> Sign In:</h3>
                                        <hr class="hr-light">
                                    </div>

                                @if ($errors->any())
                                    <div class="text-center alert alert-danger" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li style="list-style: none">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                    <!--Body-->
                                    <div class="md-form">
                                        <i class="fa fa-envelope prefix white-text active"></i>
                                        <input type="email" name="email" id="form2" class="white-text form-control" >
                                        <label for="form2" class="active">Your email</label>
                                    </div>
                                    <div class="md-form">
                                        <i class="fa fa-lock prefix white-text active"></i>
                                        <input type="password" name="password" id="form4" class="white-text form-control">
                                        <label for="form4">Your password</label>

                                        <p class="font-small blue-text d-flex justify-content-end">Forgot
                                            <a href="#" class="blue-text ml-1"> Password?</a>
                                        </p>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="submit" class="btn btn-indigo">Sign In</button>
                                        <hr class="hr-light mb-3 mt-4">
                                        <div class="inline-ul text-center d-flex justify-content-center">
                                            <a class="p-2 m-2 tw-ic">
                                                <i class="fa fa-twitter white-text"></i>
                                            </a>
                                            <a class="p-2 m-2 li-ic">
                                                <i class="fa fa-linkedin white-text"> </i>
                                            </a>
                                            <a class="p-2 m-2 ins-ic">
                                                <i class="fa fa-instagram white-text"> </i>
                                            </a>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                        <!--/.Form-->
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
            <!-- Content -->
            <!-- Login Vue Component -->
        </div>
        <!-- Mask & flexbox options-->
    </div>
    <!-- Full Page Intro -->
@endsection


@section('content')
    <div class="container">
        <!--Grid row-->
        <div class="row py-5">
            <!--Grid column-->
            <div class="col-md-12 text-center">
                <p>This is a multi admin user dashboard. The super admin can assign permissions based on roles. Permissions can be revoked, admins
                    can also be banned from login in.You can create as many admins as you want.</p>
            </div>
            <!--Grid column-->
        </div>
        <!--Grid row-->
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    (($) => {

        class Toggle {

            constructor(element, options) {

                this.defaults = {
                    icon: 'fa-eye'
                };

                this.options = this.assignOptions(options);

                this.$element = element;
                this.$button = $(`<button class="btn-toggle-pass"><i class="fa ${this.options.icon}"></i></button>`);

                this.init();
            };

            assignOptions(options) {

                return $.extend({}, this.defaults, options);
            }

            init() {

                this._appendButton();
                this.bindEvents();
            }

            _appendButton() {
                this.$element.after(this.$button);
            }

            bindEvents() {

                this.$button.on('click touchstart', this.handleClick.bind(this));
            }

            handleClick() {

                let type = this.$element.attr('type');

                type = type === 'password' ? 'text' : 'password';

                this.$element.attr('type', type);
                this.$button.toggleClass('active');
            }
        }

        $.fn.togglePassword = function (options) {
            return this.each(function () {
                new Toggle($(this), options);
            });
        }

    })(jQuery);

    $(document).ready(function() {
        $('#form4').togglePassword();
    })

</script>
@endpush
