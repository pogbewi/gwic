<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="_token" content="{{ csrf_token() }}" >
    <meta name="keywords" content="@yield('keyword')">
    <meta name="description" content="@yield('keyword')">
    <link rel="shortcut icon" href="/assets/images/logo2.png" type="image/x-icon">
    <title>Admin Dashboard - @yield('page_title')</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/admin/css/datetimepicker.min.css" rel="stylesheet">
    <link href="/assets/admin/css/bootstrap-tagsinput.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/assets/css/mdb.min.css" rel="stylesheet">
    <!--- Datatable css --->
    <link href="/assets/css/addons/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.4/css/buttons.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/select/1.2.7/css/select.dataTables.min.css" rel="stylesheet">
    <!--- Datatable Scripts ----->
    <!-- Your custom styles (optional) -->
    <link href="/assets/admin/css/styles-admin.css" rel="stylesheet">

    <!-- Fonts -->
    @yield('styles')

    @yield('head')
</head>
<body class="fixed-sn light-blue-skin @yield('body-class')">

<div id="app">
    <!--header-->
    <header>
        <!-- Main Nav -->
        @yield('header')
    </header>

    <!--Main layout-->
    <main>
        <!--content-->
        @yield('content')
    </main>
    <!--Main layout-->
    <!--Footer-->
@include('admin.partials.footer')
<!--/.Footer-->
</div>


<!-- SCRIPTS -->
<!-- JQuery -->
{{--<script type="text/javascript" src="/js/app.js"></script>--}}
<script type="text/javascript" src="/assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="/assets/admin/js/jquery-ui.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="/assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/admin/js/moment.min.js"></script>
<script src="/assets/admin/js/datetimepicker.min.js"></script>
<script src="/assets/admin/js/bootstrap-tagsinput.js"></script>
<script type="text/javascript" src="/assets/js/mdb.min.js"></script>
<!-- Datatable Scripts --->
<script type="text/javascript" src="/assets/js/addons/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
<!--- Datatable Scripts --->
<!-- MDB core JavaScript -->
<script type="text/javascript" src="/assets/admin/js/scripts.js"></script>

<!-- Initializations -->
<script type="text/javascript">
    // Animations initialization
    new WOW().init();

    // Tooltips Initialization
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>



<script type="text/javascript">
    // SideNav Button Initialization
    $(".button-collapse").sideNav();
    // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    Ps.initialize(sideNavScrollbar);
</script>
@include('admin.notify.flash')
@stack('scripts')
</body>
</html>





