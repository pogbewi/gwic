<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark double-nav  fixed-top scrolling-navbar">

    <!-- SideNav slide-out button -->
    <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse">
            <i class="fa fa-bars"></i>
        </a>
    </div>

    <!-- Breadcrumb-->
    <div class="breadcrumb-dn mr-auto">
        <p>Global Wealth Investment Company</p>
    </div>

    <!-- Links -->
    <ul class="nav navbar-nav nav-flex-icons ml-auto">
        <li class="nav-item">
            <a class="nav-link">
                <i> {{ Html::image(Auth()->guard('admin')->user()->photo, Auth()->guard('admin')->user()->fullname, ['class'=>'rounded-circle img-fluid img-thumbnail', 'style'=>"max-width: 25px"]) }}</i>
                <span class="clearfix d-none d-sm-inline-block">{{ Auth()->guard('admin')->user()->fullname }}</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('admin/contact ') }}" class="nav-link">
                <span class="badge red z-depth-1 mr-1"> {{ $message_count }} </span>
                <i class="fa fa-envelope"></i>
                <span class="clearfix d-none d-sm-inline-block ">Contact</span>
                {{--<span class="counter">56</span>--}}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route("admin.settings.index") }}">
                <i class="fa fa-gear"></i>
                <span class="clearfix d-none d-sm-inline-block">Settings</span>
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
                <span class="clearfix d-none d-sm-inline-block">Account</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#"><span class="clearfix d-none d-sm-inline-block">{{ Html::image(Auth()->guard('admin')->user()->photo, Auth()->guard('admin')->user()->fullname, ['class'=>'rounded-circle img-fluid img-thumbnail', 'style'=>"max-width: 25px"]) }}</span> Profile</a>
                <a class="dropdown-item" href="{{ route('admin.logout') }}"><i class="fa fa-lock red-ic"></i> &nbsp;Logout</a>
            </div>
        </li>
    </ul>

</nav>
<!--/.Navbar-->
