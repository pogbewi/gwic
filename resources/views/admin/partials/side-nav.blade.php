<!-- SideNav slide-out button -->

<!-- Sidebar navigation -->
<div id="slide-out" class="side-nav fixed sn-bg-4">
    <ul class="custom-scrollbar list-unstyled">
        <!-- Logo -->
        <li class="logo-sn waves-effect">
            <div class=" text-center">
                <a href="{{ route('admin.index') }}" class="pl-0">
                    @include('partials.logo')
                </a>
            </div>
        </li>
        <!--/. Logo -->
        <hr class="hr-light">
        <!-- Side navigation links -->
        <li>
            <ul class="collapsible collapsible-accordion">
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-chevron-right"></i>
                        Investment Request<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ url('admin/requests') }}" class="waves-effect">Business Owners <span class="badge red z-depth-1 mr-1"> {{ $latest_investment_request_count }} </span></a>
                            </li>
                            <li><a href="{{ url('admin/investors') }}" class="waves-effect">Investors</a></li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i>
                        Admins<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">admins</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-eye"></i> Testimonies<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('testimonials.index') }}" class="waves-effect">Testimonial</a>
                            </li>
                            <li><a href="#" class="waves-effect">Comments</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-envelope-o"></i> News
                        & Info<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('posts.index') }}" class="waves-effect">Posts</a>
                            </li>
                            <li><a href="{{ route('category.index') }}" class="waves-effect">category</a>
                            </li>
                            <li><a href="#" class="waves-effect">comments</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <hr class="hr-light">
                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i>
                        Subscribers<i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="#" class="waves-effect">Subscribers</a>
                            </li>
                            <li><a href="#" class="waves-effect">Mailing Lists</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li><a class="collapsible-header waves-effect arrow-r"><i class="fa fa-hand-pointer-o"></i>
                        Site Info <i class="fa fa-angle-down rotate-icon"></i></a>
                    <div class="collapsible-body">
                        <ul>
                            <li><a href="{{ route('admin.logs.index') }}" class="waves-effect">Site Logs</a>
                            </li>
                            <li><a href="#" class="waves-effect">Site Analysts</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </li>
        <!--/. Side navigation links -->
    </ul>
    <div class="sidenav-bg rgba-blue-strong"></div>
</div>
<!--/. Sidebar navigation -->
