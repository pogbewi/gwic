<!--Navbar-->
<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">

    <div class="container">

        <!-- Navbar brand -->
        <a class="navbar-brand" href="{{ route('home') }}">@include('partials.logo')</a>

        <!-- Collapse button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible content -->
        <div class="collapse navbar-collapse" id="basicExampleNav">

            <!-- Links -->
            <ul class="navbar-nav mr-auto smooth-scroll">
                @if((Route::currentRouteName() == 'home'))
                    <li class="nav-item">
                        <a class="nav-link" href="#carousel-example-1">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#best-features">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonials">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#blog">News & Info</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    {{--<li class="nav-item">
                        <a class="nav-link" href="/">Services</a>
                    </li>--}}
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('testimonial') }}">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post') }}">News & Info</a>
                    </li>
                @endif
                <li class="nav-item">
                    <a class="nav-link text-danger font-weight-bold" href="{{ route('enlist.create') }}">Request Investors</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-danger font-weight-bold" href="{{ route('investor.create') }}">Invest Now</a>
                </li>
            </ul>
            <!-- Links -->

            <!-- Social Icon  -->
            <ul class="navbar-nav nav-flex-icons">
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-twitter"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
        </div>
        <!-- Collapsible content -->

    </div>

</nav>
<!--/.Navbar-->
