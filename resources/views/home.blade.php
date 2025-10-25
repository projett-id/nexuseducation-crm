<!DOCTYPE html>
<html class="no-js" lang="">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Nexus Education| Application</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="shortcut icon"
      type="image/x-icon"
      href="assets/img/ic_logo.png"
    />
    <!-- Place favicon.ico in the root directory -->

    <!-- ======== CSS here ======== -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
  </head>
  <body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- ======== preloader start ======== -->
    <div class="preloader">
      <div class="loader">
        <div class="spinner">
          <div class="spinner-container">
            <div class="spinner-rotator">
              <div class="spinner-left">
                <div class="spinner-circle"></div>
              </div>
              <div class="spinner-right">
                <div class="spinner-circle"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- preloader end -->

    <!-- ======== header start ======== -->
    <header class="header">
      <div class="navbar-area">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="index.html">
                  <img src="{{asset('assets/img/white-logo-horizontal.png')}}" alt="Logo" />
                </a>
                <button
                  class="navbar-toggler"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#navbarSupportedContent"
                  aria-controls="navbarSupportedContent"
                  aria-expanded="false"
                  aria-label="Toggle navigation"
                >
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                  <span class="toggler-icon"></span>
                </button>

                <div
                  class="collapse navbar-collapse sub-menu-bar"
                  id="navbarSupportedContent"
                >
                  <ul id="nav" class="navbar-nav ms-auto">
                    <li class="nav-item">
                      <a href="{{route('login')}}">Login</a>
                    </li>
                  </ul>
                </div>
                <!-- navbar collapse -->
              </nav>
              <!-- navbar -->
            </div>
          </div>
          <!-- row -->
        </div>
        <!-- container -->
      </div>
      <!-- navbar area -->
    </header>
    <!-- ======== header end ======== -->

    <!-- ======== hero-section start ======== -->
    <section id="home" class="hero-section">
      <div class="container">
        <div class="row align-items-center position-relative">
          <div class="col-lg-6">
            <div class="hero-content">
              <h1 class="wow fadeInUp" data-wow-delay=".4s">
                Your one-stop platform for international student admissions              
              </h1>
              <p class="wow fadeInUp" data-wow-delay=".6s">
                international student recruitment platform simplifies the process of searching for courses, submitting applications, and tracking applications in real time.              
              </p>
              <a href="#features" class="scroll-bottom">
                <i class="lni lni-arrow-down"></i
              ></a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="hero-img wow fadeInUp" data-wow-delay=".5s">
              <img src="https://www.si-applications.com/assets/HomePage//homeImg.svg" alt="" />
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- ======== hero-section end ======== -->

    @foreach($dataCRM as $crm)
      <section id="about" class="about-section pt-150">
        <div class="container">
          <div class="row align-items-center">
            @if($loop->iteration % 2 == 0)
              <div class="col-xl-6 col-lg-6">
                <div class="about-img">
                  <img src="{{$crm['img']}}" alt="" class="w-100" />
                  <img
                    src="assets/img/about/about-left-shape.svg"
                    alt=""
                    class="shape shape-1"
                  />
                  <img
                    src="assets/img/about/left-dots.svg"
                    alt=""
                    class="shape shape-2"
                  />
                </div>
              </div>
              <div class="col-xl-6 col-lg-6">
                <div class="about-content">
                  <div class="section-title mb-30">
                    <h2 class="mb-25 wow fadeInUp" data-wow-delay=".2s">
                      {{$crm['title']}}
                    </h2>
                    <p class="wow fadeInUp" data-wow-delay=".4s">
                      {{$crm['desc']}}
                    </p>
                  </div>
                </div>
              </div>
            @else
<div class="col-xl-6 col-lg-6">
            <div class="about-content">
              <div class="section-title mb-30">
                <h2 class="mb-25 wow fadeInUp" data-wow-delay=".2s">
                      {{$crm['title']}}
                </h2>
                <p class="wow fadeInUp" data-wow-delay=".4s">
                                      {{$crm['desc']}}

                </p>
              </div>
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 order-first order-lg-last">
            <div class="about-img-2">
                  <img src="{{$crm['img']}}" alt="" class="w-100" />
              <img
                src="assets/img/about/about-right-shape.svg"
                alt=""
                class="shape shape-1"
              />
              <img
                src="assets/img/about/right-dots.svg"
                alt=""
                class="shape shape-2"
              />
            </div>
          </div>
            @endif
          </div>
        </div>
      </section>
    @endforeach
    <!-- ======== about-section start ======== -->
    <section id="why" class="feature-extended-section pt-100">
      <div class="feature-extended-wrapper">
        <div class="container">
          <ul class="nav nav-tabs justify-content-center flex-wrap gap-3 border-0" id="studentTab" role="tablist">
            @foreach($country as $dt)
                <li class="nav-item" role="presentation" style="margin-bottom: 12px;">
                    <button 
                        class="nav-link bg-transparent p-0 d-flex flex-column align-items-center"
                        id="tab-{{ $dt->id }}"
                        data-bs-toggle="tab" 
                        data-bs-target="#country{{ $dt->id }}" 
                        type="button" 
                        role="tab" 
                        aria-controls="country{{ $dt->id }}" 
                        aria-selected="false"
                        style="transition: all 0.2s ease;">
                        
                        <div class="p-2 rounded-3" 
                            style="width: 120px;">
                            <img 
                                src="https://nexuseducation.id/storage/{{ $dt->flag }}" 
                                alt="{{ $dt->name }}" 
                                class="img-fluid rounded" 
                                style="height: 64px; object-fit: cover; border-radius: 8px;">
                            <div class="fw-semibold mt-2 text-dark" style="font-size: 0.95rem;">{{ $dt->name }}</div>
                        </div>
                    </button>
                </li>
            @endforeach
        </ul>
        <div class="tab-content mt-4" id="studentTabContent">
            @foreach($country as $dt)
                <div class="tab-pane fade" id="country{{ $dt->id }}" role="tabpanel">
                    <div class="row">
                        @foreach($dt->partnerSchools as $sc)
                        <div class="col-lg-4 col-md-6">
                            <div class="single-feature-extended text-center">
                                <div class="icon">
                                    <img src="https://nexuseducation.id/storage/{{ $sc->logo }}" alt="" height="80">
                                </div>
                                <div class="content">
                                    <h5>{{ $sc->name }}</h5>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        </div>
      </div>
    </section>

    <!-- ======== scroll-top ======== -->
    <a href="#" class="scroll-top btn-hover">
      <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ======== JS here ======== -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/js/wow.min.js')}}"></script>
    <script src="{{ asset('assets/js/main.js')}}"></script>
  </body>
</html>
