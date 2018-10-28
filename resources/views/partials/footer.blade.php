<footer class="page-footer unique-color-dark">

    <!-- Section: Subscribe form -->
    <div class="primary-color-dark" style="background-image: url('../assets/img/subscribe.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
        <div class="container">
            <!--Grid row-->
            <div class="row py-4 d-flex align-items-center wow slideInLeft">

                <!--Grid column-->
                <div class="col-md-3 col-lg-3 text-center text-md-left mb-4 mb-md-0">
                    <h4 class="mb-0 white-text">Subscribe!</h4>
                    <p class="pt-3">Join our mailing list. We write rarely, but only the best content.</p>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-9 col-lg-9 text-center text-md-right text-white">
                    <div class="col-md-8 show-error text-danger alert-danger mx-auto text-center mr-5" style="display: none"></div>
                    {!! Form::open(['route' => 'subscriber.store', 'method' => 'POST',"class"=>"form-inline text-center","style"=>"color: rgb(255,255,255);" ]) !!}
                        <!-- Name -->
                        <div class="md-form mt-3 m-4">
                            <input type="text" name="name" id="name" class="form-control validate">
                            <label for="name" data-error="wrong" data-success="right">Name</label>
                        </div>

                        <!-- E-mai -->
                        <div class="md-form m-4">
                            <input type="email" name="sub_email" id="sub_email" class="form-control validate">
                            <label for="sub_email" data-error="wrong" data-success="right">E-mail</label>
                        </div>

                        <div class="md-form m-4">
                            <!-- Sign in button -->
                            <button class="btn btn-rounded btn-block btn-info z-depth-0 my-4 waves-effect" data-url="{{ url('subscribe/store') }}" id="subscriber" type="submit">Subscribe Now</button>
                        </div>
                    {!! Form::close() !!}
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
    </div>
    <!-- Section: Subscribe form -->

    <!-- Social buttons -->
    <div class="primary-color">
        <div class="container">
            <!--Grid row-->
            <div class="row py-4 d-flex align-items-center">

                <!--Grid column-->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <!--Facebook-->
                    <a class="fb-ic ml-0">
                        <i class="fa fa-facebook white-text mr-4"> </i>
                    </a>
                    <!--Twitter-->
                    <a class="tw-ic">
                        <i class="fa fa-twitter white-text mr-4"> </i>
                    </a>
                    <!--Google +-->
                    <a class="gplus-ic">
                        <i class="fa fa-google-plus white-text mr-4"> </i>
                    </a>
                    <!--Linkedin-->
                    <a class="li-ic">
                        <i class="fa fa-linkedin white-text mr-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fa fa-instagram white-text mr-lg-4"> </i>
                    </a>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
    </div>
    <!-- Social buttons -->

    <!-- Footer Links -->
    <!--Footer Links-->
    <div class="container mt-5 mb-4 text-center text-md-left">
        <div class="row mt-3">

            <!--First column-->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Global Wealth Investment Company</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>GWIC has been connecting foreign investor with business owners for more than 28 years.
                    We have successfully linked business owners and potential business owners with foreign
                    investors from UK, USA, Canada, UAE, Australia, China and India. The modes of communication
                    are through direct communication with our clients.
                </p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Core Services</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">Locate Genuine opportunities</a>
                </p>
                <p>
                    <a href="#!">Assess Genuine Businesses...</a>
                </p>
                <p>
                    <a href="#!">Connect Business owners to foreign Investor(s)</a>
                </p>
                <p>
                    <a href="#!">Follow up on investment ...</a>
                </p>
                <p>
                    <a href="#!">Investment Analysis</a>
                </p>
            </div>
            <!--/.Second column-->

            <!--Third column-->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Useful links</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="{{ route('policy') }}">Privacy Policy</a>
                </p>
                <p>
                    <a href="{{ route('terms') }}">Terms & Conditions</a>
                </p>
                <p>
                    <a href="{{ route('faq') }}">FAQ</a>
                </p>
                <p>
                    <a href="{{ route('about') }}">About</a>
                </p>
            </div>
            <!--/.Third column-->

            <!--Fourth column-->
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Contact</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fa fa-home mr-3"></i> 300 Frank H. Ogawa Plaza, Suite 254 Oakland, CA 94612</p>
                <p>
                    <i class="fa fa-envelope mr-3"></i> jeremyhuston@gwic.com</p>
                <p>
                    <i class="fa fa-phone mr-3"></i> + 01 510-835-8300</p>
                <p>
                    <i class="fa fa-print mr-3"></i> + 01 510-835-8302</p>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->
    <!-- Footer Links -->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">Coppyright &copy; {{ "2018" != date("Y")  ? "2018 - " . date("Y") : "2018" }} :
        <a href="https://gwic.com/"> Global Wealth Investment Company</a>
    </div>
    <!-- Copyright -->

</footer>
<!-- Footer -->
