<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>{{config('app.name')}}</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/bootstrap/bootstrap.min.css')}}">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/themify-icons/themify-icons.css')}}">
  <!-- slick slider -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/slick/slick.css')}}">
  <!-- venobox popup -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/Venobox/venobox.css')}}">
  <!-- aos -->
  <link rel="stylesheet" href="{{ asset('frontend/plugins/aos/aos.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{ asset('frontend/css/style.css')}}" rel="stylesheet">
  
  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>
  



<!-- hero area -->
<section class="hero-section hero" data-background="" style="padding-top:50px; background-image: url({{('frontend/images/hero-area/banner-bg.png')}});">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center zindex-1">
        <h1 class="mb-3">Faça sua pre marcação agora e proteja - te da <strong>COVID</strong> </h1>
        <p class="mb-4">Faça sua pre marcaça de onde estiver a qualquer momento.</p>
        @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    <a href="{{ url('/home') }}" class="btn btn-secondary btn-lg">Agendar</a>
                    @else
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-lg">Agendar</a>
                    @endauth
                </div>
            @endif
        
        <!-- banner image -->
        <img class="img-fluid w-80 banner-image" style="border-radius:20px" src="{{ asset('frontend/images/hero-area/ilustracao-isometrica-personagens-de-pessoas-isometricas-fazem-um-cronograma-no-calendario_7209-215.jpg')}}" alt="banner-img">
      </div>
    </div>
  </div>
  <!-- background shapes -->
  <div id="scene">
    <img class="img-fluid hero-bg-1 up-down-animation" src="{{ asset('frontend/images/background-shape/feature-bg-2.png')}}" alt="">
    <img class="img-fluid hero-bg-2 left-right-animation" src="{{ asset('frontend/images/background-shape/seo-ball-1.png')}}" alt="">
    <img class="img-fluid hero-bg-3 left-right-animation" src="{{ asset('frontend/images/background-shape/seo-half-cycle.png')}}" alt="">
    <img class="img-fluid hero-bg-4 up-down-animation" src="{{ asset('frontend/images/background-shape/green-dot.png')}}" alt="">
    <img class="img-fluid hero-bg-5 left-right-animation" src="{{ asset('frontend/images/background-shape/blue-half-cycle.png')}}" alt="">
    <img class="img-fluid hero-bg-6 up-down-animation" src="{{ asset('frontend/images/background-shape/seo-ball-1.png')}}" alt="">
    <img class="img-fluid hero-bg-7 left-right-animation" src="{{ asset('frontend/images/background-shape/yellow-triangle.png')}}" alt="">
    <img class="img-fluid hero-bg-8 up-down-animation" src="{{ asset('frontend/images/background-shape/service-half-cycle.png')}}" alt="">
    <img class="img-fluid hero-bg-9 up-down-animation" src="{{ asset('frontend/images/background-shape/team-bg-triangle.png')}}" alt="">
  </div>
</section>
<!-- /hero-area -->

<!-- marketing -->
<section class="section-lg seo">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="seo-image">
          <img class="img-fluid" style="border-radius:45px" src="{{ asset('frontend/images/hero-area/comvecteezy661791.jpg')}}" alt="form-img">
        </div>
      </div>
      <div class="col-md-5">
        <h2 class="section-title">Visualize em tempo real quantos estão a sua frente na fila!</h2>
        <p><br>
           <img class="img-fluid w-60" style="border-radius:45px" src="{{ asset('frontend/images/hero-area/african-americans-people-stand-queue-full-length-vector-31037223-1.jpg')}}" alt="form-img">
       
        </p>
      </div>
    </div>
  </div>
  <!-- background image -->
  <img class="img-fluid seo-bg" src="{{ asset('frontend/images/backgrounds/seo-bg.png')}}" alt="seo-bg">
  <!-- background-shape -->
  <img class="seo-bg-shape-1 left-right-animation" src="{{ asset('frontend/images/background-shape/seo-ball-1.png')}}" alt="bg-shape">
  <img class="seo-bg-shape-2 up-down-animation" src="{{ asset('frontend/images/background-shape/seo-half-cycle.png')}}" alt="bg-shape">
  <img class="seo-bg-shape-3 left-right-animation" src="{{ asset('frontend/images/background-shape/seo-ball-2.png')}}" alt="bg-shape">
</section>
<!-- /marketing -->

<!-- service -->
<section class="section-lg service">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-md-5 order-2 order-md-1">
        <h2 class="section-title">Powerful Layout From Top To Bottom</h2>
        <p class="mb-4">Far far away, behind the word mountains,
          far from the countries Vokalia and Consonantia,
          there live the blind texts. Separated they
          live in Bookmarksgrove right at the coast of the
          Semantics, a large language ocean.</p>
        <ul class="pl-0 service-list">
          <li><i class="ti-layout-tab-window text-purple"></i>Responsive on any device</li>
          <li><i class="ti-layout-placeholder text-purple"></i>Very easy to customize</li>
          <li><i class="ti-support text-purple"></i>Effective support</li>
        </ul>
      </div>
      <div class="col-md-7 order-1 order-md-2">
        <img class="img-fluid layer-3" style="border-radius:50px" src="{{ asset('frontend/images/hero-area/activities-illustration-set.jpg')}}" alt="service">
      </div>
    </div>
  </div>
  <!-- background image -->
  <img class="img-fluid service-bg" src="{{ asset('frontend/images/backgrounds/service-bg.png')}}" alt="service-bg">
  <!-- background shapes -->
  <img class="service-bg-shape-1 up-down-animation" src="{{ asset('frontend/images/background-shape/service-half-cycle.png')}}" alt="background-shape">
  <img class="service-bg-shape-2 left-right-animation" src="{{ asset('frontend/images/background-shape/feature-bg-2.png')}}" alt="background-shape">
</section>
<!-- /service -->

<!-- team -->
<section class="section-lg team" id="team">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-title">Our Team</h2>
        <p class="mb-100">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu<br>
          fugiat nulla pariatur. Excepteur sint occaecat </p>
      </div>
    </div>
    <div class="col-10 mx-auto">
      <div class="team-slider">
       
        @foreach ($services as $item)
             <!-- team-member -->
        <div class="team-member" style="border-radius:50px">
          <div class="d-flex mb-4">
            <div class="align-self-center">
              <h4>{{$item->name}}</h4>
              <h6 class="text-color">Requisitos</h6>
            </div>
          </div>
          <p>
            {!! $item->requirement!!}
          </p> </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- backgound image -->
  <img src="{{ asset('frontend/images/backgrounds/team-bg.png')}}" alt="team-bg" class="img-fluid team-bg">
  <!-- background shapes -->
  <img class="team-bg-shape-1 up-down-animation" src="{{ asset('frontend/images/background-shape/seo-ball-1.png')}}" alt="background-shape">
  <img class="team-bg-shape-2 left-right-animation" src="{{ asset('frontend/images/background-shape/seo-ball-1.png')}}" alt="background-shape">
  <img class="team-bg-shape-3 left-right-animation" src="{{ asset('frontend/images/background-shape/team-bg-triangle.png')}}" alt="background-shape">
  <img class="team-bg-shape-4 up-down-animation img-fluid" src="{{ asset('frontend/images/background-shape/team-bg-dots.png')}}" alt="background-shape">
</section>
<!-- /team -->


<!-- jQuery -->
<script src="{{ asset('frontend/plugins/jQuery/jquery.min.js')}}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend/plugins/bootstrap/bootstrap.min.js')}}"></script>
<!-- slick slider -->
<script src="{{ asset('frontend/plugins/slick/slick.min.js')}}"></script>
<!-- venobox -->
<script src="{{ asset('frontend/plugins/Venobox/venobox.min.js')}}"></script>
<!-- aos -->
<script src="{{ asset('frontend/plugins/aos/aos.js')}}"></script>
<!-- Main Script -->
<script src="{{ asset('frontend/js/script.js')}}"></script>

</body>
</html>
