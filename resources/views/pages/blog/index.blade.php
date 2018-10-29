@extends('templates.default')

@section('styles')
    <style type="text/css">
        html,
        body,
        header,#app,
        #intro, .view{
            height: 65%;
        }

        .blog .view{
            height: auto !important;
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

                    <h1 class="display-7 font-weight-bold">News And Info</h1>
                    <p class="mb-0 d-none d-md-block">
                        <strong></strong>
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
            <section class="mt-5 mb-5 wow fadeIn blog">

                <!--Grid row-->
                <div class="row">
                    @foreach($posts->chunk(2) as $count =>$item)
                            <!--Grid column-->
                         <div class="col-lg-6 col-md-12">
                                @foreach($item as $post)
                                   @if($post->featured)
                                     @if ($loop->first)
                                         <!--Image-->
                                             <div class="view overlay rounded z-depth-1-half mb-3">
                                                 <img src="{{ asset('storage/uploads/posts/photos/'.$post->photo) }}" class="img-fluid" title="{{ $post->title }}">
                                                 <a>
                                                     <div class="mask rgba-white-slight"></div>
                                                 </a>
                                             </div>
                                             <!--Excerpt-->
                                             <div class="news-data">
                                                 <a href="" class="light-blue-text">
                                                     <h6>
                                                         <i class="fa fa-plane"></i>
                                                         <strong> {{ $post->category->name }}</strong>
                                                     </h6>
                                                 </a>
                                                 <p>
                                                     <strong>
                                                         <i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</strong>
                                                 </p>
                                             </div>
                                             <h3>
                                                 <a href="{{ route('post.show', $post->slug) }}">
                                                     <strong>{{ $post->title }}</strong>
                                                 </a>
                                             </h3>
                                             <p> {!! html_entity_decode(str_limit($post->body, 200, "...")) !!}....
                                             </p>

                                             <!--/Featured news-->

                                             <hr>
                                     @endif
                                    @endif
                                    @endforeach
                                @foreach($item as $post)
                                  @if (!$post->featured)
                                      <!--Small news-->
                                          <div class="row">
                                              <div class="col-md-3">

                                                  <!--Image-->
                                                  <div class="view overlay rounded z-depth-1">
                                                      <img src="{{ asset('storage/uploads/posts/photos/thumbnails/'.$post->photo) }}" alt="{{ $post->title }}" class="img-fluid">
                                                      <a>
                                                          <div class="mask rgba-white-slight"></div>
                                                      </a>
                                                  </div>
                                              </div>

                                              <!--Excerpt-->
                                              <div class="col-md-9">
                                                  <p class="dark-grey-text">
                                                      <strong>{{ \Carbon\Carbon::parse($post->published_at)->diffForHumans() }}</strong>
                                                  </p>
                                                  <a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}
                                                      <i class="fa fa-angle-right float-right"></i>
                                                  </a>
                                              </div>

                                          </div>
                                          <!--/Small news-->
                                          <hr>
                                  @endif

                                @endforeach
                          </div>
                                <!--Grid column-->
                    @endforeach

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

@endpush


