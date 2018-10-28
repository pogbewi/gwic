<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Precious, savysoft.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="@yield('description')"/>
  <meta name="keywords" content="@yield('keyword')"/>
  <title>@yield('title')</title>
  <meta name="_token" content="{{ csrf_token() }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="shortcut icon" href="assets/images/logo2.png" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- Bootstrap core CSS -->
  <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="/assets/css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="/assets/css/style.css" rel="stylesheet">

   <!-- Fonts -->
  @yield('styles')

  @yield('head')
</head>
<body class="@yield('body-class')">
  <div id="app">

  <!--header-->
        @yield('header')
  <!--header-->

  <!--content-->
        @yield('content')
  <!--content-->

  <!--Footer-->
        @include('partials.footer')
  <!--/.Footer-->



      <div class="modal fade right show modal-scrolling" id="subscribe" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" style="padding-right: 17px;">
          <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document">
              <!--Content-->
              <div class="modal-content">
                  <!--Header-->
                  <div class="modal-header">
                      <p class="heading">Subscribe</p>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true" class="white-text">×</span>
                      </button>
                  </div>

                  <!--Body-->
                  <div class="modal-body">

                      <div class="row">
                          <div class="col-3">
                              <p></p>
                              <p class="text-center">
                                  <i class="fa fa fa-newspaper-o fa-4x"></i>
                              </p>
                          </div>

                          <div class="col-9">
                              <p class="mb-5 mt-5">Join our mailing list. We write rarely, but only the best content.</p>
                              <div class="col-md-8 show-sub_error text-danger alert-danger mx-auto text-center mr-5 mt-5" style="display: none"></div>
                              <div class="md-form mb-5">
                                  <i class="fa fa-user prefix grey-text"></i>
                                  <input type="text" id="subscriber_name" name="subscriber_name" class="form-control validate">
                                  <label data-error="wrong" data-success="right" for="subscriber_name">Your name</label>
                              </div>

                              <div class="md-form">
                                  <i class="fa fa-envelope prefix grey-text"></i>
                                  <input type="email" id="subscriber_email" name="subscriber_email" class="form-control validate">
                                  <label data-error="wrong" data-success="right" for="subscriber_email">Your email</label>
                              </div>
                          </div>
                      </div>
                  </div>

                  <!--Footer-->
                  <div class="modal-footer justify-content-center">
                      <button class="btn btn-danger waves-effect waves-light z-depth-0" data-url="{{ url('subscribe/store') }}" id="subscribe-now" type="submit">Subscribe Now</button>
                      <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>
                  </div>
              </div>
              <!--/.Content-->
          </div>
      </div>
  </div>
    <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="/assets/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="/assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="/assets/js/mdb.min.js"></script>
  <script type="text/javascript" src="/assets/js/scripts.js"></script>


  <!-- Initializations -->
  <script type="text/javascript">
      // Animations initialization
      new WOW().init();
  </script>

  @stack('scripts')

</body>
</html>





