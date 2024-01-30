<!doctype html>
<html class="no-js" lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>SI@DI-UPEA</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Place favicon.ico in the root directory -->
      <!-- <link rel="shortcut icon" type="image/x-icon" href="assetso/img/logo/favicon.png"> -->
      <link rel="shortcut icon" href="{{ $intitucion->intitucion_url_logo }}">
      <link rel="apple-touch-icon-precomposed" href="{{ asset('assets/risebothtml/assets/images/favicon.png') }}">

      <!-- CSS here -->
      <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> -->

      <link rel="stylesheet" href="{{ asset('assetso/css/bootstrap.css') }}">
      <!-- <link rel="stylesheet" href="{{ asset('assetso/css/popover.css') }}"> -->
      <link rel="stylesheet" href="{{ asset('assetso/css/animate.css') }}">
      <link rel="stylesheet" href="{{ asset('assetso/css/swiper-bundle.css') }}">
      <link rel="stylesheet" href="{{ asset('assetso/css/splide.css') }}">
      <link rel="stylesheet" href="{{ asset('assetso/css/nouislider.css') }}">
      <link rel="stylesheet" href="{{ asset('assetso/css/magnific-popup.css') }}">
      <link rel="stylesheet" href="{{ asset('assetso/css/font-awesome-pro.css') }}">
      <link rel="stylesheet" href="{{ asset('assetso/css/spacing.css') }}">
      <link rel="stylesheet" href="{{ asset('assetso/css/main.css') }}">
      <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
      <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <style>
        .nice-select {
         float: none;
         height: 100%;
        }
      </style>
      @stack('navi-css-front')
      @livewireStyles
      @livewireScripts
   </head>
   <body>
      <!--[if lte IE 9]>
      <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
      <![endif]-->


      <!-- pre loader area start -->
      <div id="loading">
         <div id="loading-center">
            <div id="loading-center-absolute">
               <div class="object" id="object_four"></div>
               <div class="object" id="object_three"></div>
               <div class="object" id="object_two"></div>
               <div class="object" id="object_one"></div>
            </div>
            <div id="loading-center-absolute" style="transform: none; z-index: 9999; position: fixed; top: 52%; left: center; margin-top: -50px; margin-left: -44px;">
               <img src="assetso/img/depto.png" alt="logo" style="width: 90px; height: 70px;">
            </div>
         </div>
      </div>
      <!-- pre loader area end -->
      

      <!-- back to top start -->
      <div class="back-to-top-wrapper">
         <button id="back_to_top" type="button" class="back-to-top-btn">
            <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
               <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>               
         </button>
      </div>
      <!-- back to top end -->


      <!-- search popup start -->
      <div class="search__popup"s>
         <div class="container">
            <div class="row">
               <div class="col-xxl-12">
                  <div class="search__wrapper">
                     <div class="search__top d-flex justify-content-between align-items-center">
                        <div class="search__logo">
                           <a href="home-main.html">
                              <img src="assetso/img/logo/footer-logo.png" alt="logo">
                           </a>
                        </div>
                        <div class="search__close">
                           <button type="button" class="search__close-btn search-close-btn">
                              <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M17 1L1 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 <path d="M1 1L17 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                              </svg>                                 
                           </button>
                        </div>
                     </div>
                     <div class="search__form">
                        <form action="#">
                           <div class="search__input">
                              <input class="search-input-field" type="text" placeholder="Type here to search...">
                              <span class="search-focus-border"></span>
                              <button type="submit">
                                 <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.55 18.1C14.272 18.1 18.1 14.272 18.1 9.55C18.1 4.82797 14.272 1 9.55 1C4.82797 1 1 4.82797 1 9.55C1 14.272 4.82797 18.1 9.55 18.1Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M19.0002 19.0002L17.2002 17.2002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg> 
                              </button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="search-popup-overlay"></div>
      <!-- search popup end -->


      <!-- offcanvas area start -->
      <div class="offcanvas__area home-3-pos">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
               <button class="offcanvas__close-btn offcanvas-close-btn">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
               </button>
            </div>
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-50 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo logo">
                     <a href="home-main.html">
                        <img src="assetso/img/logo/logo.png" alt="logo">
                     </a>
                  </div>
               </div>
               <div class="mobile-menu fix d-lg-none"></div>
               <div class="tp-mobile-menu-pos"></div>
               <div class="offcanvas__popup">
                  <p>Equipo de desarrollo.</p>
                  <div class="offcanvas__popup-gallery">
                     <h4 class="offcanvas__title">Desarrolladores</h4>
                     <a class="popup-image" href="assetso/img/portfolio/img-1.jpg">
                        <img src="assetso/img/portfolio/img-1.jpg" alt="">
                     </a>
                     <a class="popup-image" href="assetso/img/portfolio/img-2.jpg">
                        <img src="assetso/img/portfolio/img-2.jpg" alt="">
                     </a>
                     <a class="popup-image" href="assetso/img/portfolio/img-3.jpg">
                        <img src="assetso/img/portfolio/img-3.jpg" alt="">
                     </a>
                     <a class="popup-image" href="assetso/img/portfolio/img-4.jpg">
                        <img src="assetso/img/portfolio/img-4.jpg" alt="">
                     </a>
                     <a class="popup-image" href="assetso/img/portfolio/img-5.jpg">
                        <img src="assetso/img/portfolio/img-5.jpg" alt="">
                     </a>
                     <a class="popup-image" href="assetso/img/portfolio/img-6.jpg">
                        <img src="assetso/img/portfolio/img-6.jpg" alt="">
                     </a>
                  </div>
               </div>
               <div class="offcanvas__contact">
                  <h4 class="offcanvas__title">Contactos</h4>
                  <div class="offcanvas__contact-content d-flex">
                     <div class="offcanvas__contact-content-icon">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                     </div>
                     <div class="offcanvas__contact-content-content">
                        <a href="https://www.google.com/maps/search/86+Road+Broklyn+Street,+600+New+York,+USA/@40.6897806,-74.0278086,12z/data=!3m1!4b1">86 Road Broklyn Street, 600 </a>
                     </div>
                  </div>
                  <div class="offcanvas__contact-content d-flex">
                     <div class="offcanvas__contact-content-icon">
                        <i class="fa-solid fa-envelope"></i>
                     </div>
                     <div class="offcanvas__contact-content-content">
                        <a href="mailto:needhelp@company.com"> Needhelp@company.com  </a>
                     </div>
                  </div>
                  @if(!is_null($intitucion->intitucion_url_telefono) && $intitucion->intitucion_url_telefono!=="")
                     <div class="offcanvas__contact-content d-flex">
                        <div class="offcanvas__contact-content-icon">
                           <i class="fa-solid fa-phone"></i>
                        </div>
                        <div class="offcanvas__contact-content-content">
                           <a href="tel:{{$intitucion->intitucion_url_telefono}}" target="_blank"> +591 {{$intitucion->intitucion_url_telefono}} </a>
                        </div>
                     </div>
                  @endif
               </div>
               <div class="offcanvas__social">
                  @if(!is_null($intitucion->intitucion_url_facebook) && $intitucion->intitucion_url_facebook!=="")
                     <a class="icon facebook" href="{{ $intitucion->intitucion_url_facebook }}"><i class="fab fa-facebook-f"></i></a> 
                  @endif
                  @if(!is_null($intitucion->intitucion_url_twitter) && $intitucion->intitucion_url_twitter!=="")
                     <a class="icon twitter" href="{{ $intitucion->intitucion_url_twitter }}"><i class="fab fa-twitter"></i></a> 
                  @endif
                  @if(!is_null($intitucion->intitucion_url_instagram) && $intitucion->intitucion_url_instagram!=="")
                  <a class="icon instagram" style="background: #d6249f; background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%);" href="{{ $intitucion->intitucion_url_instagram }}"><i class="fab fa-instagram"></i></a>
                  @endif
                  @if(!is_null($intitucion->intitucion_url_youtube) && $intitucion->intitucion_url_youtube!=="")
                  <a class="icon youtube" href="{{ $intitucion->intitucion_url_youtube }}"><i class="fab fa-youtube"></i></a>
                  @endif
                  @if(!is_null($intitucion->intitucion_url_tiktok) && $intitucion->intitucion_url_tiktok!=="")
                     <a class="icon tiktok" style="background-color: #000;" href="{{ $intitucion->intitucion_url_tiktok }}"><i class="fab fa-tiktok"></i></a>
                  @endif
               </div>
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->


      <!-- header area start -->
      <header class="tp-header-3-area tp-header-3-transparent tp-header-height p-relative">
        
         <div class="tp-header-3-top tp-header-3-space d-none d-xl-block">
            <div class="container-fluid">
               <div class="row align-items-center">
                  <div class="col-xl-10 col-xxl-8">
                     <div class="tp-header-3-top-info d-flex">
                        <div class="tp-header-3-top-call d-flex">
                           @if(!is_null($intitucion->intitucion_url_telefono) && $intitucion->intitucion_url_telefono!=="")
                              <span> Llamar </span>
                              <p>WhatsApp <a href="https://wa.me/+591{{ $intitucion->intitucion_url_telefono }}" target="_blank">Click Aquí</a></p>
                           @endif
                        </div>
                        <ul>
                           <li>
                              <a href="https://www.google.com/maps/@-16.4914421,-68.1927757,19.71z" target="_blank"><span><i class="fa-sharp fa-solid fa-location-dot"></i></span>UPEA, Av. Sucre A, Bloque B, 3er Piso</a>
                           </li>
                           <!-- <li>
                              <a href="mailto:technix@support.com"><span><i class="fa-solid fa-envelope"></i></span>technix@support.com</a>
                           </li> -->
                        </ul>
                     </div>
                  </div>
                  <div class="col-xl-2 col-xxl-4">
                     <div class="tp-header-3-top-right d-flex justify-content-end align-items-center">
                        <div class="header-social d-xxl-block d-none">
                           @if(!is_null($intitucion->intitucion_url_facebook) && $intitucion->intitucion_url_facebook!=="")
                              <a href="{{ $intitucion->intitucion_url_facebook }}"><i class="fa-brands fa-facebook-f"></i></a>
                           @endif
                           @if(!is_null($intitucion->intitucion_url_twitter) && $intitucion->intitucion_url_twitter!=="")
                              <a href="{{ $intitucion->intitucion_url_twitter }}"><i class="fa-brands fa-twitter"></i></a>
                           @endif
                           @if(!is_null($intitucion->intitucion_url_instagram) && $intitucion->intitucion_url_instagram!=="")
                              <a href="{{ $intitucion->intitucion_url_instagram }}"><i class="fa-brands fa-instagram"></i></a>
                           @endif
                           @if(!is_null($intitucion->intitucion_url_youtube) && $intitucion->intitucion_url_youtube!=="")
                              <a href="{{ $intitucion->intitucion_url_youtube }}"><i class="fa-brands fa-youtube"></i></a>
                           @endif
                           @if(!is_null($intitucion->intitucion_url_tiktok) && $intitucion->intitucion_url_tiktok!=="")
                              <a href="{{ $intitucion->intitucion_url_tiktok }}"><i class="fa-brands fa-tiktok"></i></a>
                           @endif
                        </div>

                        <!-- <div class="tp-header-3-lang-wrapper d-flex align-items-center">
                           <div class="tp-header-lang-img">
                              <img src="assetso/img/depto.png" alt="">
                           </div>
                        </div> -->

                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div id="header-sticky" class="tp-header-3-bottom header__sticky p-relative">
            <div class="tp-header-3-bottom-inner p-relative">
               <div class="container-fluid gx-0">
                  <div class="row gx-0 align-items-center">
                     <div class="col-xl-2 col-6">
                       <div class="tp-header-2-main-left d-flex align-items-center justify-content-xl-center p-relative">
                        <div class="tp-header-3-logo">
                           <a href="index.html">
                              <img src="assetso/img/logo/footer-logo.png" alt="">
                           </a>
                        </div>
                       </div>
                     </div>
                     <div class="col-xl-8 d-none d-xl-block">
                        <div class="tp-main-menu-3-area d-flex align-items-center justify-content-center">
                           <div class="tp-main-menu menu-icon">
                              <nav id="tp-mobile-menu">
                                 <ul>
                                    <li class="has-dropdown">
                                       <a href="javascript:void(0)">U P E A</a>
                                       <ul class="submenu">
                                          <li><a href="https://www.upea.bo">U P E A</a></li>
                                          <li><a href="https://registrosadmisiones.upea.bo">Registros <span class="text-lowercase">y</span> Admisiones</a></li>
                                          <li><a href="https://www.upea.bo/course/course-one">Carreras <span class="text-lowercase">y</span> Áreas</a></li>
                                       </ul>
                                    </li>
                                    <li class="menu-item @if(request()->route()->getName()=='verificar.index') current-menu-item @endif"><a href="{{ route('verificar.index') }}">Verificar Certificados</a>
                                    <!-- <li><a href="https://inscripcioneslinguistica.upea.bo">Lingüística <span class="text-lowercase">e</span> Idiomas</a> -->
                                    <!-- <li class="has-dropdown"><a href="service.html">Services</a>
                                    <ul class="submenu">
                                       <li><a href="service.html">Service</a></li>
                                       <li><a href="service-details.html">Service Details</a></li>
                                    </ul>
                                    </li>
                                    <li class="has-dropdown">
                                       <a href="javascript:void(0)">Pages</a>
                                       <ul class="submenu">
                                          <li><a href="about-us.html">About</a></li>
                                          <li><a href="portfolio.html">Portfolio</a></li>
                                          <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                          <li><a href="team.html">Team</a></li>
                                          <li><a href="team-details.html">Team Details</a></li>
                                       </ul>
                                    </li>
                                    <li class="has-dropdown"><a href="blog.html">Blog</a>
                                       <ul class="submenu">
                                          <li><a href="blog.html">Blog</a></li>
                                          <li><a href="blog-details.html">Blog Details</a></li>
                                       </ul>
                                    </li> -->
                                    <li><a href="javascript:void(0)">Escolarizado</a></li>
                                    <li><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a></li>
                                 </ul>
                              </nav>
                           </div>
                           <div class="tp-header-search search-open-btn d-none d-xl-block">
                              <a href="javascript:void(0);"> <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M8.80758 0C3.95121 0 0 3.95121 0 8.80758C0 13.6642 3.95121 17.6152 8.80758 17.6152C13.6642 17.6152 17.6152 13.6642 17.6152 8.80758C17.6152 3.95121 13.6642 0 8.80758 0ZM8.80758 15.9892C4.84769 15.9892 1.62602 12.7675 1.62602 8.80762C1.62602 4.84773 4.84769 1.62602 8.80758 1.62602C12.7675 1.62602 15.9891 4.84769 15.9891 8.80758C15.9891 12.7675 12.7675 15.9892 8.80758 15.9892Z" fill="black"/>
                                 <path d="M19.76 18.6124L15.0988 13.9511C14.7811 13.6335 14.2668 13.6335 13.9492 13.9511C13.6315 14.2684 13.6315 14.7834 13.9492 15.1007L18.6104 19.762C18.7692 19.9208 18.9771 20.0002 19.1852 20.0002C19.3931 20.0002 19.6012 19.9208 19.76 19.762C20.0776 19.4446 20.0776 18.9297 19.76 18.6124Z" fill="black"/>
                                 </svg>
                                 </a>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-2 col-6">
                        <div class="tp-header-3-right">
                           <div class="tp-header-3-main-right d-flex align-items-center justify-content-end">
                              @if(!is_null($intitucion->intitucion_url_telefono) && $intitucion->intitucion_url_telefono!=="")
                                 <div class="tp-header-3-phone d-flex align-items-center">
                                    <div class="tp-header-3-phone-icon">
                                       <img src="assetso/img//icon/call.svg" alt="">
                                    </div>
                                    <div class="tp-header-3-phone-content">
                                       <span>Celular: <br> <a href="tel:{{$intitucion->intitucion_url_telefono}}">+591 {{$intitucion->intitucion_url_telefono}}</a></span>
                                    </div>
                                 </div>
                              @endif
                              <div class="tp-header-3-hamburger-btn offcanvas-open-btn">
                                 <button class="hamburger-btn">
                                    <span>
                                       <svg width="29" height="24" viewBox="0 0 29 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M0 1.13163C0 0.506972 0.499692 0 1.11538 0H20.4487C21.0644 0 21.5641 0.506972 21.5641 1.13163C21.5641 1.7563 21.0644 2.26327 20.4487 2.26327H1.11538C0.499692 2.26327 0 1.7563 0 1.13163ZM27.8846 10.5619H1.11538C0.499692 10.5619 0 11.0689 0 11.6935C0 12.3182 0.499692 12.8252 1.11538 12.8252H27.8846C28.5003 12.8252 29 12.3182 29 11.6935C29 11.0689 28.5003 10.5619 27.8846 10.5619ZM14.5 21.1238H1.11538C0.499692 21.1238 0 21.6308 0 22.2555C0 22.8801 0.499692 23.3871 1.11538 23.3871H14.5C15.1157 23.3871 15.6154 22.8801 15.6154 22.2555C15.6154 21.6308 15.1157 21.1238 14.5 21.1238Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- header area end -->


      <main>

         <!-- hero area start -->
         <section class="tp-hero-3-area p-relative fix">
            <div class="hero-active-3">
               <div class="swiper-wrapper">
                  <div class="swiper-slide">
                     <div class="tp-hero-3-wrapper p-relative">
                        <div class="container">                      
   
                           <div class="tp-hero-3">

                              <div class="tp-hero-bg" data-background="/assetso/img/hero/hero-3/hero-1.png"></div>

                              <div class="row align-items-center justify-content-center">
                                 <div class="col-lg-12">
                                    <div class="tp-hero-3-content p-relative">
                                       <div class="tp-hero-3-title-wrapper">
                                          <span class="tp-section-title__pre p-relative text-uppercase">
                                             Departamento <span class="title-pre-color">de idiomas</span>
                                          </span>
                                          <h3 class="tp-hero-3-title">Departamento
                                             <span class="title-color">de</span>
                                             <svg class="circle" width="425" height="109" viewBox="0 0 225 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.1481 76.3679C55.8581 93.1793 99.7529 104.44 143.772 104.183C162.905 104.079 184.701 104.166 202.722 94.6158C211.271 90.0778 219.878 82.1335 220.977 67.646C222.363 49.2762 210.892 35.2588 200.906 27.2179C165.903 -0.962245 120.282 3.56052 82.2045 6.12755C61.2594 7.56939 40.2183 11.3015 20.4023 21.1492C14.2432 24.1994 -1.70459 30.792 5.73782 44.0162C9.5729 50.8451 16.7641 54.9568 22.1261 58.4055C62.0733 84.2021 105.527 88.9812 148.155 86.4613C150.328 86.3325 150.504 91.2898 148.331 91.4186C104.606 93.9773 59.5704 89.0201 18.8517 61.4317C12.3772 57.0608 -3.9171 46.3324 1.13856 32.0948C4.27727 23.2263 13.5355 19.7027 19.4163 16.7922C30.4826 11.3337 41.9705 7.7833 53.5703 5.39836C78.3 0.340518 103.691 0.456709 128.733 1.23489C150.355 1.92603 172.628 4.49122 193.003 16.9725C207.334 25.7434 227.976 44.79 223.586 71.8416C220.023 93.7705 201.953 100.932 188.724 103.79C130.327 116.483 69.7686 101.575 13.0061 77.3604C12.5744 77.1678 12.7173 76.2012 13.1481 76.3679Z" fill="currentColor"/>
                                             </svg>
                                             <svg class="line" width="565" height="6" viewBox="0 0 565 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.48167 4.22573C87.7577 2.55537 174.532 2.28989 261.746 5.00006C264.795 5.09962 264.753 2.61068 261.746 2.489C175.096 -0.962325 86.9432 -1.06188 0.48167 3.70582C-0.144863 3.739 -0.165748 4.23679 0.48167 4.22573Z" fill="currentColor"/>
                                             </svg>
                                             <br> Idiomas</h3>
                                          <div class="tp-hero-3-btn">
                                             <a class="tp-btn-2" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                                             <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModsal">Launch Login Modal</button> -->
                                             <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginModalss">Launch Login Modal</button> -->
                                             
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tp-hero-3-bottom p-relative d-none d-md-block">
                                     <h3 class="tp-hero-3-bottom-title">Administrativo</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="tp-hero-3-wrapper p-relative">
                        <div class="container">
                           
                           <div class="tp-hero-3">
                              <div class="tp-hero-bg" data-background="assetso/img/hero/hero-3/hero-1.png"></div>
                              <div class="row align-items-center justify-content-center">
                                 <div class="col-lg-12">
                                    <div class="tp-hero-3-content p-relative">
                                       <div class="tp-hero-3-title-wrapper">
                                          <span class="tp-section-title__pre p-relative text-uppercase">
                                             Departamento <span class="title-pre-color">de idiomas</span>
                                          </span>
                                          <h3 class="tp-hero-3-title">Cursos
                                             <span class="title-color">TGN</span>
                                             <svg class="circle" width="225" height="109" viewBox="0 0 225 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.1481 76.3679C55.8581 93.1793 99.7529 104.44 143.772 104.183C162.905 104.079 184.701 104.166 202.722 94.6158C211.271 90.0778 219.878 82.1335 220.977 67.646C222.363 49.2762 210.892 35.2588 200.906 27.2179C165.903 -0.962245 120.282 3.56052 82.2045 6.12755C61.2594 7.56939 40.2183 11.3015 20.4023 21.1492C14.2432 24.1994 -1.70459 30.792 5.73782 44.0162C9.5729 50.8451 16.7641 54.9568 22.1261 58.4055C62.0733 84.2021 105.527 88.9812 148.155 86.4613C150.328 86.3325 150.504 91.2898 148.331 91.4186C104.606 93.9773 59.5704 89.0201 18.8517 61.4317C12.3772 57.0608 -3.9171 46.3324 1.13856 32.0948C4.27727 23.2263 13.5355 19.7027 19.4163 16.7922C30.4826 11.3337 41.9705 7.7833 53.5703 5.39836C78.3 0.340518 103.691 0.456709 128.733 1.23489C150.355 1.92603 172.628 4.49122 193.003 16.9725C207.334 25.7434 227.976 44.79 223.586 71.8416C220.023 93.7705 201.953 100.932 188.724 103.79C130.327 116.483 69.7686 101.575 13.0061 77.3604C12.5744 77.1678 12.7173 76.2012 13.1481 76.3679Z" fill="currentColor"/>
                                             </svg>
                                             <svg class="line" width="265" height="6" viewBox="0 0 265 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.48167 4.22573C87.7577 2.55537 174.532 2.28989 261.746 5.00006C264.795 5.09962 264.753 2.61068 261.746 2.489C175.096 -0.962325 86.9432 -1.06188 0.48167 3.70582C-0.144863 3.739 -0.165748 4.23679 0.48167 4.22573Z" fill="currentColor"/>
                                             </svg>
                                             <br> Universitario</h3>
                                          <div class="tp-hero-3-btn">
                                          <a class="tp-btn-2" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tp-hero-3-bottom p-relative d-none d-md-block">
                                     <h3 class="tp-hero-3-bottom-title">Estudiantes</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="swiper-slide">
                     <div class="tp-hero-3-wrapper p-relative">
                        <div class="container">
                           
                           <div class="tp-hero-3">
                              <div class="tp-hero-bg" data-background="assetso/img/hero/hero-3/hero-1.png"></div>
                              <div class="row align-items-center justify-content-center">
                                 <div class="col-lg-12">
                                    <div class="tp-hero-3-content p-relative">
                                       <div class="tp-hero-3-title-wrapper">
                                          <span class="tp-section-title__pre p-relative text-uppercase">
                                             Departamento <span class="title-pre-color">de idiomas</span>
                                          </span>
                                          <h3 class="tp-hero-3-title">Cursos
                                             <span class="title-color">AutoFinanciados</span>
                                             <svg class="circle" width="225" height="109" viewBox="0 0 225 109" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.1481 76.3679C55.8581 93.1793 99.7529 104.44 143.772 104.183C162.905 104.079 184.701 104.166 202.722 94.6158C211.271 90.0778 219.878 82.1335 220.977 67.646C222.363 49.2762 210.892 35.2588 200.906 27.2179C165.903 -0.962245 120.282 3.56052 82.2045 6.12755C61.2594 7.56939 40.2183 11.3015 20.4023 21.1492C14.2432 24.1994 -1.70459 30.792 5.73782 44.0162C9.5729 50.8451 16.7641 54.9568 22.1261 58.4055C62.0733 84.2021 105.527 88.9812 148.155 86.4613C150.328 86.3325 150.504 91.2898 148.331 91.4186C104.606 93.9773 59.5704 89.0201 18.8517 61.4317C12.3772 57.0608 -3.9171 46.3324 1.13856 32.0948C4.27727 23.2263 13.5355 19.7027 19.4163 16.7922C30.4826 11.3337 41.9705 7.7833 53.5703 5.39836C78.3 0.340518 103.691 0.456709 128.733 1.23489C150.355 1.92603 172.628 4.49122 193.003 16.9725C207.334 25.7434 227.976 44.79 223.586 71.8416C220.023 93.7705 201.953 100.932 188.724 103.79C130.327 116.483 69.7686 101.575 13.0061 77.3604C12.5744 77.1678 12.7173 76.2012 13.1481 76.3679Z" fill="currentColor"/>
                                             </svg>
                                             <svg class="line" width="265" height="6" viewBox="0 0 265 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.48167 4.22573C87.7577 2.55537 174.532 2.28989 261.746 5.00006C264.795 5.09962 264.753 2.61068 261.746 2.489C175.096 -0.962325 86.9432 -1.06188 0.48167 3.70582C-0.144863 3.739 -0.165748 4.23679 0.48167 4.22573Z" fill="currentColor"/>
                                             </svg>
                                             <br> Profesional</h3>
                                          <div class="tp-hero-3-btn">
                                          <a class="tp-btn-2" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="tp-hero-3-bottom p-relative d-none d-md-block">
                                     <h3 class="tp-hero-3-bottom-title">Estudiantes</h3>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tp-hero-3-nav d-none d-xl-block">
               <button type="button" class="hero-button-prev-1 tp-btn-hover-clear alt-color"><i class="fa-regular fa-arrow-left"></i>
               <b></b>
               </button>
               <button type="button" class="hero-button-next-1 tp-btn-hover-clear alt-color"><i class="fa-regular fa-arrow-right"></i>
               <b></b>
               </button>
            </div>
         </section>
         <!-- hero area end -->


         <!-- counter area start -->
         <section class="tp-counter-3-area p-relative ">
            <div class="tp-counter-3-bg">
               <img class="shape-1" src="assetso/img/others/bg.png" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="tp-counter-3-wrapper tp-counter-3-border text-center">
                        <h3 class="counter-title"> <span data-purecounter-duration="4" data-purecounter-end="560" class="purecounter">0</span></h3>
                        <span class="counter-subtitle">Total Estudiantes</span>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="tp-counter-3-wrapper tp-counter-3-border text-center">
                        <h3 class="counter-title"> <span data-purecounter-duration="4" data-purecounter-end="100" class="purecounter">0</span>%</h3>
                        <span class="counter-subtitle">Satisfaction</span>
                     </div>
                  </div>
                  <!-- <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="tp-counter-3-wrapper tp-counter-3-border text-center">
                        <h3 class="counter-title"> <span data-purecounter-duration="4" data-purecounter-end="3" class="purecounter">0</span>m+</h3>
                        <span class="counter-subtitle">Monthly Revinew</span>
                     </div>
                  </div> -->
                  <div class="col-lg-4 col-md-6 col-sm-6">
                     <div class="tp-counter-3-wrapper text-center">
                        <h3 class="counter-title"> <span data-purecounter-duration="4" data-purecounter-end="15" class="purecounter">0</span>+</h3>
                        <span class="counter-subtitle">Años de <br> Experiencia</span>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- counter area end -->


         <!-- about area start -->
         <section class="tp-about-3-area p-relative pt-185 pb-170">
            <div class="shape-bg">
               <img src="assetso/img/about/home-3/shape-4.png" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="tp-about-3-img p-relative fadeLeft">
                        <img src="assetso/img/front/encargada.png" alt="">
                        <!-- <img class="shape-1" src="assetso/img/about/home-3/img-2.jpg" alt=""> -->
                        <div class="shape-2 p-relative">
                           <img src="assetso/img/front/panelyoutube.png" alt="">
                           <div class="tp-video-play">
                              <a class="popup-video" href="https://youtu.be/XAIlbCVgVvA"><i class="fa-sharp fa-solid fa-play"></i></a>
                           </div>
                        </div>
                        <img class="shape-3" src="assetso/img/depto.png" alt="" width="140px" >
                        <img class="shape-4" src="assetso/img/front/CEUB.png" alt="" width="180px">
                        <img class="shape-5" src="assetso/img/about/home-3/shape-3.png" alt="" width="180px">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="tp-about-3-wrapper">
                        <div class="tp-about-3-title-wrapper">
                           <span class="tp-section-title__pre">Excelencia <span class="title-pre-color"> Academica</span>
                              <svg width="123" height="8" viewBox="0 0 123 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M0.384401 7.82144C0.645399 4.52972 8.83029 8.38041 10.8974 7.67652C12.4321 7.1486 11.6386 7.03474 12.9749 6.19628C14.0816 4.61253 15.7519 3.89829 17.9756 4.06391C18.6125 4.48831 19.2284 4.93342 19.8444 5.38888C21.1076 6.09277 22.1621 6.51717 23.6028 6.13417C24.8973 5.79258 25.5237 4.79885 26.6095 4.18812C30.8481 1.80732 31.3701 2.90456 34.5855 4.58147C36.0993 5.36817 37.634 6.48612 39.461 6.08242C40.1604 5.92715 40.2127 5.67871 40.672 5.54415C42.1023 4.10531 43.9606 3.52564 46.2469 3.80512C47.0612 4.28129 47.8651 4.75745 48.669 5.25431C50.9866 6.22733 54.5049 6.23769 54.6615 3.08053C54.3065 3.22545 53.962 3.37037 53.6175 3.51529C55.622 5.75117 58.6078 6.59998 61.5205 5.5752C64.8091 4.41585 63.8277 3.02877 67.1685 4.35374C68.6614 4.94377 70.2587 5.14045 71.856 4.96447C73.6412 4.7678 75.1028 3.27721 76.6271 3.07018C79.0491 2.73894 81.3354 4.89201 84.2482 4.15707C85.3235 3.88793 86.9417 2.27313 87.7978 2.21102C88.6329 2.14891 89.9484 3.68091 90.8358 4.14672C93.3936 5.51309 96.5882 5.75117 99.3234 4.7471C101.902 3.80512 100.858 3.60845 103.124 4.30199C104.366 4.67464 105.253 5.34747 106.652 5.45099C109.628 5.65801 112.175 4.26058 113.678 1.77626C113.25 1.77626 112.822 1.77626 112.384 1.77626C114.722 5.49239 119.587 6.10312 122.771 3.05983C123.471 2.39734 122.406 1.34151 121.707 2.00399C119.316 4.29164 115.516 3.95004 113.678 1.03097C113.386 0.554807 112.687 0.544455 112.384 1.03097C110.223 4.62288 105.159 4.84026 102.549 1.7038C102.278 1.38291 101.777 1.46572 101.495 1.7038C97.6113 4.99553 91.8171 4.46761 88.6747 0.368483C88.4242 0.0372403 87.85 -0.190489 87.5159 0.223564C84.9685 3.37037 80.7717 3.86723 77.6606 1.10343C77.3787 0.854995 76.9507 0.823941 76.6584 1.10343C73.422 4.26058 68.6823 4.52972 65.1432 1.63134C64.83 1.37256 64.3706 1.38291 64.1409 1.75556C61.9799 5.40958 57.2297 5.74082 54.4631 2.65613C54.0873 2.24207 53.44 2.59402 53.4191 3.09088C53.2103 7.04509 45.6727 1.72451 43.8979 1.92118C40.4841 2.30418 40.2127 5.74082 35.7026 3.82583C33.4894 2.88386 31.8085 0.989563 29.1777 1.39326C26.9226 1.74521 25.9622 3.86723 23.9682 4.63323C20.4603 5.9789 19.2702 2.13856 16.2531 2.33524C11.2941 2.66648 14.1442 7.41774 6.43955 5.75117C4.22629 5.27501 -0.221114 3.93969 0.00856432 7.82144C0.0190042 8.05952 0.363521 8.05952 0.384401 7.82144Z" fill="currentColor"></path>
                              </svg>
                           </span>
                           <h3 class="tp-section-title">Nuestros <span class="title-color">Estudiantes</span> <br> Universitarios y Profesionales</h3>
                        </div>
                        <!-- <p class="text">Transmax is the world’s driving worldwide coordinations supplier — we <br> uphold industry and exchange the worldwide trade of merchandise <br> through land transport.</p> -->
                        <p class="text">Los universitarios y profesionales autofinanciados del Departamento de <br> Idiomas de nuestra Universidad están comprometidos con su desarrollo <br> académico y profesional. </p>

                        <div class="tp-about-progressbar-inner d-flex flex-wrap pt-20">
                           <div class="tp-about-3-progressbar d-flex align-items-center">
                              <div class="circular tl-progress">
                                 <input type="text" class="knob" value="0" data-rel="85" data-linecap="round"
                                    data-width="96" data-height="96" data-bgcolor="#ECEEF3" data-fgcolor="#05DAC3" data-thickness=".07" data-readonly="true" disabled/>
                              </div>
                               <div class="tp-about-3-progressbar-title">
                                 <p>Universitarios <br> TGN</p>
                               </div>
                           </div>
                           <div class="tp-about-3-progressbar d-flex align-items-center">
                              <div class="circular tl-progress">
                                 <input type="text" class="knob" value="0" data-rel="87" data-linecap="round"
                                    data-width="96" data-height="96" data-bgcolor="#ECEEF3" data-fgcolor="#05DAC3" data-thickness=".07" data-readonly="true" disabled/>
                              </div>
                               <div class="tp-about-3-progressbar-title">
                                 <p>Profesionales <br>AutoFinanciados</p>
                               </div>
                           </div>
                        </div>
                        <div class="tp-about-3-btn-inner d-flex flex-wrap">
                           <div class="tp-about-btn ">
                              <a class="tp-btn" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#loginModal">Ingresar <i class="fa-regular fa-arrow-right-long"></i>
                              </a>
                           </div>
                           <div class="tp-about-3-year">
                              <p>
                                 Recopilación de datos: 2024
                                 <br>
                                 <span>
                                    By: D. Julian Zenteno T.
                                 </span>
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- about area start -->


         <section class="tp-feature-area">
            <div class="tp-feature-shape">
               <img src="assetso/img/feature/shape-1.png" alt="">
            </div>
            <div class="container container-large">
               <div class="row align-items-center">
                  <div class="col-lg-6">
                     <div class="tp-feature-title-wrapper">
                        <span class="tp-section-title__pre">
                           Nuestro <span class="title-pre-color">Personal</span>
                           <svg width="123" height="8" viewBox="0 0 123 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.384401 7.82144C0.645399 4.52972 8.83029 8.38041 10.8974 7.67652C12.4321 7.1486 11.6386 7.03474 12.9749 6.19628C14.0816 4.61253 15.7519 3.89829 17.9756 4.06391C18.6125 4.48831 19.2284 4.93342 19.8444 5.38888C21.1076 6.09277 22.1621 6.51717 23.6028 6.13417C24.8973 5.79258 25.5237 4.79885 26.6095 4.18812C30.8481 1.80732 31.3701 2.90456 34.5855 4.58147C36.0993 5.36817 37.634 6.48612 39.461 6.08242C40.1604 5.92715 40.2127 5.67871 40.672 5.54415C42.1023 4.10531 43.9606 3.52564 46.2469 3.80512C47.0612 4.28129 47.8651 4.75745 48.669 5.25431C50.9866 6.22733 54.5049 6.23769 54.6615 3.08053C54.3065 3.22545 53.962 3.37037 53.6175 3.51529C55.622 5.75117 58.6078 6.59998 61.5205 5.5752C64.8091 4.41585 63.8277 3.02877 67.1685 4.35374C68.6614 4.94377 70.2587 5.14045 71.856 4.96447C73.6412 4.7678 75.1028 3.27721 76.6271 3.07018C79.0491 2.73894 81.3354 4.89201 84.2482 4.15707C85.3235 3.88793 86.9417 2.27313 87.7978 2.21102C88.6329 2.14891 89.9484 3.68091 90.8358 4.14672C93.3936 5.51309 96.5882 5.75117 99.3234 4.7471C101.902 3.80512 100.858 3.60845 103.124 4.30199C104.366 4.67464 105.253 5.34747 106.652 5.45099C109.628 5.65801 112.175 4.26058 113.678 1.77626C113.25 1.77626 112.822 1.77626 112.384 1.77626C114.722 5.49239 119.587 6.10312 122.771 3.05983C123.471 2.39734 122.406 1.34151 121.707 2.00399C119.316 4.29164 115.516 3.95004 113.678 1.03097C113.386 0.554807 112.687 0.544455 112.384 1.03097C110.223 4.62288 105.159 4.84026 102.549 1.7038C102.278 1.38291 101.777 1.46572 101.495 1.7038C97.6113 4.99553 91.8171 4.46761 88.6747 0.368483C88.4242 0.0372403 87.85 -0.190489 87.5159 0.223564C84.9685 3.37037 80.7717 3.86723 77.6606 1.10343C77.3787 0.854995 76.9507 0.823941 76.6584 1.10343C73.422 4.26058 68.6823 4.52972 65.1432 1.63134C64.83 1.37256 64.3706 1.38291 64.1409 1.75556C61.9799 5.40958 57.2297 5.74082 54.4631 2.65613C54.0873 2.24207 53.44 2.59402 53.4191 3.09088C53.2103 7.04509 45.6727 1.72451 43.8979 1.92118C40.4841 2.30418 40.2127 5.74082 35.7026 3.82583C33.4894 2.88386 31.8085 0.989563 29.1777 1.39326C26.9226 1.74521 25.9622 3.86723 23.9682 4.63323C20.4603 5.9789 19.2702 2.13856 16.2531 2.33524C11.2941 2.66648 14.1442 7.41774 6.43955 5.75117C4.22629 5.27501 -0.221114 3.93969 0.00856432 7.82144C0.0190042 8.05952 0.363521 8.05952 0.384401 7.82144Z" fill="currentColor"/>
                           </svg>
                        </span>
                        <h3 class="tp-section-title">Responsables <span class="title-color">Sistema Academico </span>
                           <span class="title-right-shape">
                              <svg width="153" height="5" viewBox="0 0 153 5" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M0.276872 4.22307C50.8548 2.55338 101.142 2.288 151.684 4.99709C153.451 5.09661 153.427 2.60867 151.684 2.48703C101.469 -0.962917 50.3828 -1.06243 0.276872 3.70336C-0.0862144 3.73653 -0.0983172 4.23412 0.276872 4.22307Z" fill="#05DAC3"/>
                              </svg>
                           </span>
                        </h3>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="tp-feature-wrapper p-relative">
                        <p>As the complexity of buildings to increase, the field of architecture <br> became multi-disciplinary with technological expertise.</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-4 col-md-6">
                     <div class="tp-feature-item-box p-relative wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s">
                        <div class="tp-feature-item p-relative mb-30">
                           <div class="tp-feature-item-shape">
                              <img src="assetso/img/feature/shape-2.png" alt="">
                           </div>
                           <div class="tp-feature-item-wrapper">
                              <div class="tp-feature-item-thumb">
                                 <div class="shape">
                                    <img src="assetso/img/feature/img-shape.png" alt="">
                                 </div>
                                 <img class="thumb" src="assetso/img/feature/img-1.jpg" alt="">
                              </div>
                              <div class="tp-feature-item-content">
                                 <h3 class="feature-title"><a href="about-us.html">Our mission</a>
                                    <span><svg width="130" height="8" viewBox="0 0 130 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M0.406277 7.82144C0.682129 4.52972 9.33282 8.38041 11.5176 7.67652C13.1396 7.1486 12.301 7.03474 13.7133 6.19628C14.8829 4.61253 16.6484 3.89829 18.9986 4.06391C19.6717 4.48831 20.3227 4.93342 20.9737 5.38888C22.3089 6.09277 23.4233 6.51717 24.946 6.13417C26.3142 5.79258 26.9763 4.79885 28.1238 4.18812C32.6036 1.80732 33.1553 2.90456 36.5538 4.58147C38.1538 5.36817 39.7758 6.48612 41.7067 6.08242C42.446 5.92715 42.5012 5.67871 42.9867 5.54415C44.4983 4.10531 46.4624 3.52564 48.8789 3.80512C49.7395 4.28129 50.5891 4.75745 51.4388 5.25431C53.8883 6.22733 57.6068 6.23769 57.7723 3.08053C57.3971 3.22545 57.033 3.37037 56.6689 3.51529C58.7874 5.75117 61.9432 6.59998 65.0217 5.5752C68.4974 4.41585 67.4602 3.02877 70.9911 4.35374C72.569 4.94377 74.2572 5.14045 75.9454 4.96447C77.8322 4.7678 79.377 3.27721 80.9879 3.07018C83.5478 2.73894 85.9643 4.89201 89.0428 4.15707C90.1793 3.88793 91.8896 2.27313 92.7944 2.21102C93.6771 2.14891 95.0674 3.68091 96.0053 4.14672C98.7086 5.51309 102.085 5.75117 104.976 4.7471C107.701 3.80512 106.598 3.60845 108.992 4.30199C110.305 4.67464 111.243 5.34747 112.722 5.45099C115.867 5.65801 118.559 4.26058 120.148 1.77626C119.695 1.77626 119.243 1.77626 118.78 1.77626C121.251 5.49239 126.393 6.10312 129.758 3.05983C130.498 2.39734 129.372 1.34151 128.633 2.00399C126.106 4.29164 122.09 3.95004 120.148 1.03097C119.839 0.554807 119.1 0.544455 118.78 1.03097C116.496 4.62288 111.144 4.84026 108.385 1.7038C108.099 1.38291 107.569 1.46572 107.271 1.7038C103.166 4.99553 97.0425 4.46761 93.7212 0.368483C93.4564 0.0372403 92.8495 -0.190489 92.4965 0.223564C89.8042 3.37037 85.3685 3.86723 82.0803 1.10343C81.7824 0.854995 81.33 0.823941 81.021 1.10343C77.6005 4.26058 72.591 4.52972 68.8505 1.63134C68.5195 1.37256 68.034 1.38291 67.7912 1.75556C65.5072 5.40958 60.4867 5.74082 57.5626 2.65613C57.1654 2.24207 56.4813 2.59402 56.4592 3.09088C56.2386 7.04509 48.272 1.72451 46.3962 1.92118C42.7881 2.30418 42.5012 5.74082 37.7345 3.82583C35.3952 2.88386 33.6188 0.989563 30.8382 1.39326C28.4548 1.74521 27.4397 3.86723 25.3322 4.63323C21.6248 5.9789 20.3669 2.13856 17.178 2.33524C11.9369 2.66648 14.9492 7.41774 6.80603 5.75117C4.46681 5.27501 -0.233697 3.93969 0.00905172 7.82144C0.0200858 8.05952 0.384209 8.05952 0.406277 7.82144Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </h3>
                                 <p>As far as we might be concerned <br> making an extraordinary ad</p>
                              </div>
                           </div>
                        </div>
                        <div class="tp-feature-item-btn">
                           <a href="about-us.html"><i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     <div class="tp-feature-item-box p-relative wow fadeInUp" data-wow-duration="1s" data-wow-delay=".5s">
                        <div class="tp-feature-item p-relative mb-30">
                           <div class="tp-feature-item-shape">
                              <img src="assetso/img/feature/shape-2.png" alt="">
                           </div>
                           <div class="tp-feature-item-wrapper">
                              <div class="tp-feature-item-thumb">
                                 <div class="shape">
                                    <img src="assetso/img/feature/img-shape.png" alt="">
                                 </div>
                                 <img class="thumb" src="assetso/img/feature/img-2.jpg" alt="">
                              </div>
                              <div class="tp-feature-item-content">
                                 <h3 class="feature-title"><a href="about-us.html">About History</a>
                                    <span><svg width="130" height="8" viewBox="0 0 130 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M0.406277 7.82144C0.682129 4.52972 9.33282 8.38041 11.5176 7.67652C13.1396 7.1486 12.301 7.03474 13.7133 6.19628C14.8829 4.61253 16.6484 3.89829 18.9986 4.06391C19.6717 4.48831 20.3227 4.93342 20.9737 5.38888C22.3089 6.09277 23.4233 6.51717 24.946 6.13417C26.3142 5.79258 26.9763 4.79885 28.1238 4.18812C32.6036 1.80732 33.1553 2.90456 36.5538 4.58147C38.1538 5.36817 39.7758 6.48612 41.7067 6.08242C42.446 5.92715 42.5012 5.67871 42.9867 5.54415C44.4983 4.10531 46.4624 3.52564 48.8789 3.80512C49.7395 4.28129 50.5891 4.75745 51.4388 5.25431C53.8883 6.22733 57.6068 6.23769 57.7723 3.08053C57.3971 3.22545 57.033 3.37037 56.6689 3.51529C58.7874 5.75117 61.9432 6.59998 65.0217 5.5752C68.4974 4.41585 67.4602 3.02877 70.9911 4.35374C72.569 4.94377 74.2572 5.14045 75.9454 4.96447C77.8322 4.7678 79.377 3.27721 80.9879 3.07018C83.5478 2.73894 85.9643 4.89201 89.0428 4.15707C90.1793 3.88793 91.8896 2.27313 92.7944 2.21102C93.6771 2.14891 95.0674 3.68091 96.0053 4.14672C98.7086 5.51309 102.085 5.75117 104.976 4.7471C107.701 3.80512 106.598 3.60845 108.992 4.30199C110.305 4.67464 111.243 5.34747 112.722 5.45099C115.867 5.65801 118.559 4.26058 120.148 1.77626C119.695 1.77626 119.243 1.77626 118.78 1.77626C121.251 5.49239 126.393 6.10312 129.758 3.05983C130.498 2.39734 129.372 1.34151 128.633 2.00399C126.106 4.29164 122.09 3.95004 120.148 1.03097C119.839 0.554807 119.1 0.544455 118.78 1.03097C116.496 4.62288 111.144 4.84026 108.385 1.7038C108.099 1.38291 107.569 1.46572 107.271 1.7038C103.166 4.99553 97.0425 4.46761 93.7212 0.368483C93.4564 0.0372403 92.8495 -0.190489 92.4965 0.223564C89.8042 3.37037 85.3685 3.86723 82.0803 1.10343C81.7824 0.854995 81.33 0.823941 81.021 1.10343C77.6005 4.26058 72.591 4.52972 68.8505 1.63134C68.5195 1.37256 68.034 1.38291 67.7912 1.75556C65.5072 5.40958 60.4867 5.74082 57.5626 2.65613C57.1654 2.24207 56.4813 2.59402 56.4592 3.09088C56.2386 7.04509 48.272 1.72451 46.3962 1.92118C42.7881 2.30418 42.5012 5.74082 37.7345 3.82583C35.3952 2.88386 33.6188 0.989563 30.8382 1.39326C28.4548 1.74521 27.4397 3.86723 25.3322 4.63323C21.6248 5.9789 20.3669 2.13856 17.178 2.33524C11.9369 2.66648 14.9492 7.41774 6.80603 5.75117C4.46681 5.27501 -0.233697 3.93969 0.00905172 7.82144C0.0200858 8.05952 0.384209 8.05952 0.406277 7.82144Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </h3>
                                 <p>As far as we might be concerned <br> making an extraordinary ad</p>
                              </div>
                           </div>
                        </div>
                        <div class="tp-feature-item-btn">
                           <a href="about-us.html"><i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                     <div class="tp-feature-item-box p-relative wow fadeInUp" data-wow-duration="1s" data-wow-delay=".7s">
                        <div class="tp-feature-item p-relative mb-30">
                           <div class="tp-feature-item-shape">
                              <img src="assetso/img/feature/shape-2.png" alt="">
                           </div>
                           <div class="tp-feature-item-wrapper">
                              <div class="tp-feature-item-thumb">
                                 <div class="shape">
                                    <img src="assetso/img/feature/img-shape.png" alt="">
                                 </div>
                                 <img class="thumb" src="assetso/img/feature/img-3.jpg" alt="">
                              </div>
                              <div class="tp-feature-item-content">
                                 <h3 class="feature-title"><a href="about-us.html">Our Partners</a>
                                    <span><svg width="130" height="8" viewBox="0 0 130 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                       <path d="M0.406277 7.82144C0.682129 4.52972 9.33282 8.38041 11.5176 7.67652C13.1396 7.1486 12.301 7.03474 13.7133 6.19628C14.8829 4.61253 16.6484 3.89829 18.9986 4.06391C19.6717 4.48831 20.3227 4.93342 20.9737 5.38888C22.3089 6.09277 23.4233 6.51717 24.946 6.13417C26.3142 5.79258 26.9763 4.79885 28.1238 4.18812C32.6036 1.80732 33.1553 2.90456 36.5538 4.58147C38.1538 5.36817 39.7758 6.48612 41.7067 6.08242C42.446 5.92715 42.5012 5.67871 42.9867 5.54415C44.4983 4.10531 46.4624 3.52564 48.8789 3.80512C49.7395 4.28129 50.5891 4.75745 51.4388 5.25431C53.8883 6.22733 57.6068 6.23769 57.7723 3.08053C57.3971 3.22545 57.033 3.37037 56.6689 3.51529C58.7874 5.75117 61.9432 6.59998 65.0217 5.5752C68.4974 4.41585 67.4602 3.02877 70.9911 4.35374C72.569 4.94377 74.2572 5.14045 75.9454 4.96447C77.8322 4.7678 79.377 3.27721 80.9879 3.07018C83.5478 2.73894 85.9643 4.89201 89.0428 4.15707C90.1793 3.88793 91.8896 2.27313 92.7944 2.21102C93.6771 2.14891 95.0674 3.68091 96.0053 4.14672C98.7086 5.51309 102.085 5.75117 104.976 4.7471C107.701 3.80512 106.598 3.60845 108.992 4.30199C110.305 4.67464 111.243 5.34747 112.722 5.45099C115.867 5.65801 118.559 4.26058 120.148 1.77626C119.695 1.77626 119.243 1.77626 118.78 1.77626C121.251 5.49239 126.393 6.10312 129.758 3.05983C130.498 2.39734 129.372 1.34151 128.633 2.00399C126.106 4.29164 122.09 3.95004 120.148 1.03097C119.839 0.554807 119.1 0.544455 118.78 1.03097C116.496 4.62288 111.144 4.84026 108.385 1.7038C108.099 1.38291 107.569 1.46572 107.271 1.7038C103.166 4.99553 97.0425 4.46761 93.7212 0.368483C93.4564 0.0372403 92.8495 -0.190489 92.4965 0.223564C89.8042 3.37037 85.3685 3.86723 82.0803 1.10343C81.7824 0.854995 81.33 0.823941 81.021 1.10343C77.6005 4.26058 72.591 4.52972 68.8505 1.63134C68.5195 1.37256 68.034 1.38291 67.7912 1.75556C65.5072 5.40958 60.4867 5.74082 57.5626 2.65613C57.1654 2.24207 56.4813 2.59402 56.4592 3.09088C56.2386 7.04509 48.272 1.72451 46.3962 1.92118C42.7881 2.30418 42.5012 5.74082 37.7345 3.82583C35.3952 2.88386 33.6188 0.989563 30.8382 1.39326C28.4548 1.74521 27.4397 3.86723 25.3322 4.63323C21.6248 5.9789 20.3669 2.13856 17.178 2.33524C11.9369 2.66648 14.9492 7.41774 6.80603 5.75117C4.46681 5.27501 -0.233697 3.93969 0.00905172 7.82144C0.0200858 8.05952 0.384209 8.05952 0.406277 7.82144Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </h3>
                                 <p>As far as we might be concerned <br> making an extraordinary ad</p>
                              </div>
                           </div>
                        </div>
                        <div class="tp-feature-item-btn">
                           <a href="about-us.html"><i class="fa-regular fa-arrow-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         



         <!-- service area start -->
         <section class="tp-service-3-area p-relative pt-120 pb-60" data-background="assetso/img/services/home-3/service-bg.png">
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-xl-6">
                     <div class="tp-service-3-title-wrapper">
                        <span class="tp-section-title__pre">
                           service <span class="title-pre-color">IT Solutions</span>
                           <svg width="123" height="8" viewBox="0 0 123 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.384401 7.82144C0.645399 4.52972 8.83029 8.38041 10.8974 7.67652C12.4321 7.1486 11.6386 7.03474 12.9749 6.19628C14.0816 4.61253 15.7519 3.89829 17.9756 4.06391C18.6125 4.48831 19.2284 4.93342 19.8444 5.38888C21.1076 6.09277 22.1621 6.51717 23.6028 6.13417C24.8973 5.79258 25.5237 4.79885 26.6095 4.18812C30.8481 1.80732 31.3701 2.90456 34.5855 4.58147C36.0993 5.36817 37.634 6.48612 39.461 6.08242C40.1604 5.92715 40.2127 5.67871 40.672 5.54415C42.1023 4.10531 43.9606 3.52564 46.2469 3.80512C47.0612 4.28129 47.8651 4.75745 48.669 5.25431C50.9866 6.22733 54.5049 6.23769 54.6615 3.08053C54.3065 3.22545 53.962 3.37037 53.6175 3.51529C55.622 5.75117 58.6078 6.59998 61.5205 5.5752C64.8091 4.41585 63.8277 3.02877 67.1685 4.35374C68.6614 4.94377 70.2587 5.14045 71.856 4.96447C73.6412 4.7678 75.1028 3.27721 76.6271 3.07018C79.0491 2.73894 81.3354 4.89201 84.2482 4.15707C85.3235 3.88793 86.9417 2.27313 87.7978 2.21102C88.6329 2.14891 89.9484 3.68091 90.8358 4.14672C93.3936 5.51309 96.5882 5.75117 99.3234 4.7471C101.902 3.80512 100.858 3.60845 103.124 4.30199C104.366 4.67464 105.253 5.34747 106.652 5.45099C109.628 5.65801 112.175 4.26058 113.678 1.77626C113.25 1.77626 112.822 1.77626 112.384 1.77626C114.722 5.49239 119.587 6.10312 122.771 3.05983C123.471 2.39734 122.406 1.34151 121.707 2.00399C119.316 4.29164 115.516 3.95004 113.678 1.03097C113.386 0.554807 112.687 0.544455 112.384 1.03097C110.223 4.62288 105.159 4.84026 102.549 1.7038C102.278 1.38291 101.777 1.46572 101.495 1.7038C97.6113 4.99553 91.8171 4.46761 88.6747 0.368483C88.4242 0.0372403 87.85 -0.190489 87.5159 0.223564C84.9685 3.37037 80.7717 3.86723 77.6606 1.10343C77.3787 0.854995 76.9507 0.823941 76.6584 1.10343C73.422 4.26058 68.6823 4.52972 65.1432 1.63134C64.83 1.37256 64.3706 1.38291 64.1409 1.75556C61.9799 5.40958 57.2297 5.74082 54.4631 2.65613C54.0873 2.24207 53.44 2.59402 53.4191 3.09088C53.2103 7.04509 45.6727 1.72451 43.8979 1.92118C40.4841 2.30418 40.2127 5.74082 35.7026 3.82583C33.4894 2.88386 31.8085 0.989563 29.1777 1.39326C26.9226 1.74521 25.9622 3.86723 23.9682 4.63323C20.4603 5.9789 19.2702 2.13856 16.2531 2.33524C11.2941 2.66648 14.1442 7.41774 6.43955 5.75117C4.22629 5.27501 -0.221114 3.93969 0.00856432 7.82144C0.0190042 8.05952 0.363521 8.05952 0.384401 7.82144Z" fill="currentColor"></path>
                           </svg>
                        </span>
                        <h3 class="tp-section-title">Best Digital <span class="title-color">Technology</span> <br> Agency For People
                        </h3>
                     </div>
                  </div>
                  <div class="col-xl-6">
                     <div class="tp-service-3-title-wrapper justify-content-start justify-content-xl-end d-flex">
                        <p>Transmax is the world’s driving worldwide coordinations supplier <br>
                           we uphold industry and exchange the worldwide trade of about <br>
                           merchandise through land transport.w much you know</p>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-service-3-content OneByOne mb-30">
                        <div class="tp-service-3-content-thumb">
                           <img src="assetso/img/services/home-3/icon-1.png" alt="">
                        </div>
                        <h4 class="tp-service-3-title"><a href="service-details.html">It Server & <br> Cyber Security</a></h4>
                        <p>Transmax is the world tr
                           we uphold industry Cu
                           stomer Oriented </p>
                        <div class="tp-service-btn">
                           <a href="service-details.html">Read More <i class="fa-solid fa-arrow-up-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-service-3-content OneByOne mb-30">
                        <div class="tp-service-3-content-thumb">
                           <img src="assetso/img/services/home-3/icon-2.png" alt="">
                        </div>
                        <h4 class="tp-service-3-title"><a href="service-details.html">Machine Learning <br> And Ai</a></h4>
                        <p>Transmax is the world tr
                           we uphold industry Cu
                           stomer Oriented </p>
                        <div class="tp-service-btn">
                           <a href="service-details.html">Read More <i class="fa-solid fa-arrow-up-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-service-3-content OneByOne mb-30">
                        <div class="tp-service-3-content-thumb">
                           <img src="assetso/img/services/home-3/icon-3.png" alt="">
                        </div>
                        <h4 class="tp-service-3-title"><a href="service-details.html">It Server & <br> Cyber Security</a></h4>
                        <p>Transmax is the world tr
                           we uphold industry Cu
                           stomer Oriented </p>
                        <div class="tp-service-btn">
                           <a href="service-details.html">Read More <i class="fa-solid fa-arrow-up-right"></i></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-3 col-md-6">
                     <div class="tp-service-3-content OneByOne mb-30">
                        <div class="tp-service-3-content-thumb">
                           <img src="assetso/img/services/home-3/icon-4.png" alt="">
                        </div>
                        <h4 class="tp-service-3-title"><a href="service-details.html">Clouds Backup <br> Services</a></h4>
                        <p>Transmax is the world tr
                           we uphold industry Cu
                           stomer Oriented </p>
                        <div class="tp-service-btn">
                           <a href="service-details.html">Read More <i class="fa-solid fa-arrow-up-right"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-12">
                     <div class="tp-service-3-trend text-center mt-50">
                        <p><i class="fa-regular fa-arrow-right-long"></i> Bring them together and you overcome the ordinary. <a href="service-details.html">View More SErvice</a> <i class="fa-regular fa-arrow-left-long"></i></p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- service area end -->


         <!-- category area start -->
         <section id="mousemove" class="tp-category-area p-relative fix pt-120 pb-120">
            <div class="tp-category-shape">
               <img class="shape-1 mousemove__image" src="assetso/img/category/shape-1.png" alt="">
               <img class="shape-2 mousemove__image" src="assetso/img/category/shape-2.png" alt="">
               <span class="shape-3">
                  <svg width="1093" height="128" viewBox="0 0 1093 128" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M1 50.9659C56.3481 18.4898 187.969 -31.1736 271.668 29.9813C376.292 106.425 498.092 148.394 553.787 115.918C609.482 83.4422 719.311 -19.4825 816.127 29.9813C912.943 79.4452 896.286 151.392 1092 110.422" stroke="currentColor"/>
                  </svg>
               </span>
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="tp-category-title-wrapper text-center">
                        <span class="tp-section-title__pre">
                           Flujo <span class="title-pre-color">de Inscripcion</span>
                           <svg width="123" height="8" viewBox="0 0 123 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.384401 7.82144C0.645399 4.52972 8.83029 8.38041 10.8974 7.67652C12.4321 7.1486 11.6386 7.03474 12.9749 6.19628C14.0816 4.61253 15.7519 3.89829 17.9756 4.06391C18.6125 4.48831 19.2284 4.93342 19.8444 5.38888C21.1076 6.09277 22.1621 6.51717 23.6028 6.13417C24.8973 5.79258 25.5237 4.79885 26.6095 4.18812C30.8481 1.80732 31.3701 2.90456 34.5855 4.58147C36.0993 5.36817 37.634 6.48612 39.461 6.08242C40.1604 5.92715 40.2127 5.67871 40.672 5.54415C42.1023 4.10531 43.9606 3.52564 46.2469 3.80512C47.0612 4.28129 47.8651 4.75745 48.669 5.25431C50.9866 6.22733 54.5049 6.23769 54.6615 3.08053C54.3065 3.22545 53.962 3.37037 53.6175 3.51529C55.622 5.75117 58.6078 6.59998 61.5205 5.5752C64.8091 4.41585 63.8277 3.02877 67.1685 4.35374C68.6614 4.94377 70.2587 5.14045 71.856 4.96447C73.6412 4.7678 75.1028 3.27721 76.6271 3.07018C79.0491 2.73894 81.3354 4.89201 84.2482 4.15707C85.3235 3.88793 86.9417 2.27313 87.7978 2.21102C88.6329 2.14891 89.9484 3.68091 90.8358 4.14672C93.3936 5.51309 96.5882 5.75117 99.3234 4.7471C101.902 3.80512 100.858 3.60845 103.124 4.30199C104.366 4.67464 105.253 5.34747 106.652 5.45099C109.628 5.65801 112.175 4.26058 113.678 1.77626C113.25 1.77626 112.822 1.77626 112.384 1.77626C114.722 5.49239 119.587 6.10312 122.771 3.05983C123.471 2.39734 122.406 1.34151 121.707 2.00399C119.316 4.29164 115.516 3.95004 113.678 1.03097C113.386 0.554807 112.687 0.544455 112.384 1.03097C110.223 4.62288 105.159 4.84026 102.549 1.7038C102.278 1.38291 101.777 1.46572 101.495 1.7038C97.6113 4.99553 91.8171 4.46761 88.6747 0.368483C88.4242 0.0372403 87.85 -0.190489 87.5159 0.223564C84.9685 3.37037 80.7717 3.86723 77.6606 1.10343C77.3787 0.854995 76.9507 0.823941 76.6584 1.10343C73.422 4.26058 68.6823 4.52972 65.1432 1.63134C64.83 1.37256 64.3706 1.38291 64.1409 1.75556C61.9799 5.40958 57.2297 5.74082 54.4631 2.65613C54.0873 2.24207 53.44 2.59402 53.4191 3.09088C53.2103 7.04509 45.6727 1.72451 43.8979 1.92118C40.4841 2.30418 40.2127 5.74082 35.7026 3.82583C33.4894 2.88386 31.8085 0.989563 29.1777 1.39326C26.9226 1.74521 25.9622 3.86723 23.9682 4.63323C20.4603 5.9789 19.2702 2.13856 16.2531 2.33524C11.2941 2.66648 14.1442 7.41774 6.43955 5.75117C4.22629 5.27501 -0.221114 3.93969 0.00856432 7.82144C0.0190042 8.05952 0.363521 8.05952 0.384401 7.82144Z" fill="currentColor"></path>
                           </svg>
                        </span>
                        <h3 class="tp-section-title">Flujo <span class="title-color">Admision</span> <br> Inscripcion</h3>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-xl-5 col-lg-5 col-md-6">
                     <div class="tp-category-content-wrapper d-flex">
                        <div class="tp-category-content one">
                           <div class="tp-category-icon">
                              <img src="assetso/img/category/icon-1.png" alt="">
                              <h4 class="tp-category-content-title">Convocatoria</h4>
                           </div>
                        </div>
                        <div class="tp-category-content two">
                           <div class="tp-category-icon">
                              <img src="assetso/img/category/icon-2.png" alt="">
                              <h4 class="tp-category-content-title">Web </h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-2 col-lg-2 col-md-4 order-3 order-md-2">
                     <div class="tp-category-content-wrapper d-flex">
                        <div class="tp-category-content three">
                           <div class="tp-category-icon">
                              <img src="assetso/img/category/icon-3.png" alt="">
                              <h4 class="tp-category-content-title">Datos <br> personales</h4>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-5 col-lg-5 col-md-12 order-2 order-md-3">
                     <div class="tp-category-content-wrapper d-flex">
                        <div class="tp-category-content four">
                           <div class="tp-category-icon">
                              <img src="assetso/img/category/icon-4.png" alt="">
                              <h4 class="tp-category-content-title">Seguridad Informacion</h4>
                           </div>
                        </div>
                        <div class="tp-category-content five">
                           <div class="tp-category-icon">
                              <img src="assetso/img/category/icon-5.png" alt="">
                              <h4 class="tp-category-content-title">Aprendizaje </h4>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="tp-offer-all-btn text-center mt-50">
                        <p>Bring them together and you overcome the ordinary. <a href="service-details.html">View More SErvice <span><i class="fa-regular fa-plus"></i></span></a></p>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- category area end -->
         <!-- cta area start -->
         

         <!-- industry area start -->
         @include('modulos.home_guest_assetso.section_publicaciones')
         <!-- industry area end -->


         <!-- feature area start -->
         <section class="tp-feature-3-area pt-100" data-background="assetso/img/feature/home-3/feature-bg.png">
            <div class="container-fluid gx-0">
               <div class="row gx-0">
                  <div class="feature-3-active swiper-container">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="tp-feature-3-content-inner d-flex align-items-center">
                              <div class="tp-feature-3-content-thumb">
                                 <img src="assetso/img/feature/home-3/icon-1.png" alt="">
                              </div>
                              <div class="tp-feature-3-content">
                                 <h3 class="tp-feature-title">Respuesta rápida</h3>
                                 <p>Respuesta rápida ante la diversidad de idiomas.</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-feature-3-content-inner d-flex align-items-center">
                              <div class="tp-feature-3-content-thumb">
                                 <img src="assetso/img/feature/home-3/icon-2.png" alt="">
                              </div>
                              <div class="tp-feature-3-content">
                                 <h3 class="tp-feature-title">Soluciones perfectas</h3>
                                 <p>Soluciones perfectas para el aprendizaje de idiomas.</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-feature-3-content-inner d-flex align-items-center">
                              <div class="tp-feature-3-content-thumb">
                                 <img src="assetso/img/feature/home-3/icon-3.png" alt="">
                              </div>
                              <div class="tp-feature-3-content">
                                 <h3 class="tp-feature-title">Sin jerga técnica</h3>
                                 <p>Nosotros eliminamos la jerga técnica para hacer el aprendizaje de idiomas accesible.</p>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-feature-3-content-inner d-flex align-items-center">
                              <div class="tp-feature-3-content-thumb">
                                 <img src="assetso/img/feature/home-3/icon-4.png" alt="">
                              </div>
                              <div class="tp-feature-3-content">
                                 <h3 class="tp-feature-title">Satisfacción al 100%</h3>
                                 <p>Satisfacción garantizada en el proceso de aprendizaje de idiomas.</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row gx-0">
               <div class="col-xl-12">
                  <div class="tp-feature-3-text-style text-center fadeUp pt-80">
                     <h3 class="feature-title">Testimonios</h3>
                  </div>
               </div>
            </div>
         </section>

         <!-- feature area end -->


         <!-- testimonial area start -->
         <section class="tp-testimonial-3-area pb-120">
            <div class="tp-testimonial-3-large-box"></div>
            <div class="tp-testimonial-3-shape">
               <img class="shape-1" src="assetso/img/testimonial/home-3/shape-1.png" alt="">
               <img class="shape-2" src="assetso/img/testimonial/home-3/shape-2.png" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-5 col-lg-4">
                     <div class="tp-testimonial-3-wrapper">
                        <div class="tp-testimonial-3-wrapper-thumb p-relative">
                           <div class="testimonial-navigation-active splide z-index-1">
                              <div class="splide__track">
                                 <div class="splide__list">
                                    <div class="splide__slide">
                                       <img class="slide" src="assetso/img/testimonial/home-3/img-1.png" alt="">
                                    </div>
                                    <div class="splide__slide">
                                       <img class="slide" src="assetso/img/testimonial/home-3/img-2.jpg" alt="">
                                    </div>
                                    <div class="splide__slide">
                                       <img class="slide" src="assetso/img/testimonial/home-3/img-3.jpg" alt="">
                                    </div>
                                    <div class="splide__slide">
                                       <img class="slide" src="assetso/img/testimonial/home-3/img-4.jpg" alt="">
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <img class="shape-1" src="assetso/img/testimonial/home-3/img-2.png" alt="">
                           <img class="shape-2" src="assetso/img/testimonial/home-3/img-3.png" alt="">
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-7 col-lg-8">
                     <div class="tp-testimonial-3-content">
                        <div class="testimonial-3-active splide">
                           <div class="splide__track">
                              <div class="splide__list">
                                 <div class="splide__slide">
                                    <div class="tp-testimonial-3-slider-wrapper">
                                       <p>Denouncing <span>pleasure</span> and praising pain was <br>
                                       born and I will give you a complete account <br>
                                       of the system, and expound the actual  <br>
                                       teachings of the great explorer of truth the <br>
                                       master builder</p>
                                    </div>
                                 </div>
                                 <div class="splide__slide">
                                    <div class="tp-testimonial-3-slider-wrapper">
                                       <p>Ennings appetite disposed me an at <span>subjects</span> an. To no indulgence diminution so discovered mr apartments. Are off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week.</p>
                                    </div>
                                 </div>
                                 <div class="splide__slide">
                                    <div class="tp-testimonial-3-slider-wrapper">
                                       <p>Maximum consultation discover <span>apartments</span>. ndulgence off under folly death wrote cause her way spite. Plan upon yet way get cold spot its week. Almost do am or limits hearts.</p>
                                    </div>
                                 </div>
                                 <div class="splide__slide">
                                    <div class="tp-testimonial-3-slider-wrapper">
                                       <p>The system, and expound the <span>actual Denouncing</span> pleasure and praising pain was
                                       born and I will give you a complete account
                                       of teachings of the great explorer of truth the
                                       master builder</p>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tp-testimonial-3-descreiption text-start text-sm-end">
                           <h4 class="testimonial-title">Mathias Herasen</h4>
                           <p>Founder of <span>GamerPay</span></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- testimonial area end -->


         <!-- brand area start -->
         <div class="tp-brand-3-area p-relative pt-65 pb-60">
            <div class="tp-brand-3-right-color"></div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="tp-brand-3-wrapper">
                        <div class="brand-3-active swiper-container">
                           <div class="swiper-wrapper">
                              <div class="swiper-slide">
                                 <div class="tp-brand-3-thumb">
                                    <img src="assetso/img/brand/home-3/brand-1.png" alt="">
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="tp-brand-3-thumb">
                                    <img src="assetso/img/brand/home-3/brand-2.png" alt="">
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="tp-brand-3-thumb">
                                    <img src="assetso/img/brand/home-3/brand-3.png" alt="">
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="tp-brand-3-thumb">
                                    <img src="assetso/img/brand/home-3/brand-4.png" alt="">
                                 </div>
                              </div>
                              <div class="swiper-slide">
                                 <div class="tp-brand-3-thumb">
                                    <img src="assetso/img/brand/home-3/brand-5.png" alt="">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- brand area end -->


         <!-- team area start -->
         <section class="tp-team-area p-relative pb-100">
            <div class="tp-team-shape">
               <img src="assetso/img/testimonial/home-3/shape-3.png" alt="">
            </div>
            <div class="container">
               <div class="row align-items-center">
                  <div class="col-lg-6">
                     <div class="tp-team-title-wrapper">
                        <span class="tp-section-title__pre">
                           best <span class="title-pre-color">IT Solutions</span>
                           <svg width="123" height="8" viewBox="0 0 123 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.384401 7.82144C0.645399 4.52972 8.83029 8.38041 10.8974 7.67652C12.4321 7.1486 11.6386 7.03474 12.9749 6.19628C14.0816 4.61253 15.7519 3.89829 17.9756 4.06391C18.6125 4.48831 19.2284 4.93342 19.8444 5.38888C21.1076 6.09277 22.1621 6.51717 23.6028 6.13417C24.8973 5.79258 25.5237 4.79885 26.6095 4.18812C30.8481 1.80732 31.3701 2.90456 34.5855 4.58147C36.0993 5.36817 37.634 6.48612 39.461 6.08242C40.1604 5.92715 40.2127 5.67871 40.672 5.54415C42.1023 4.10531 43.9606 3.52564 46.2469 3.80512C47.0612 4.28129 47.8651 4.75745 48.669 5.25431C50.9866 6.22733 54.5049 6.23769 54.6615 3.08053C54.3065 3.22545 53.962 3.37037 53.6175 3.51529C55.622 5.75117 58.6078 6.59998 61.5205 5.5752C64.8091 4.41585 63.8277 3.02877 67.1685 4.35374C68.6614 4.94377 70.2587 5.14045 71.856 4.96447C73.6412 4.7678 75.1028 3.27721 76.6271 3.07018C79.0491 2.73894 81.3354 4.89201 84.2482 4.15707C85.3235 3.88793 86.9417 2.27313 87.7978 2.21102C88.6329 2.14891 89.9484 3.68091 90.8358 4.14672C93.3936 5.51309 96.5882 5.75117 99.3234 4.7471C101.902 3.80512 100.858 3.60845 103.124 4.30199C104.366 4.67464 105.253 5.34747 106.652 5.45099C109.628 5.65801 112.175 4.26058 113.678 1.77626C113.25 1.77626 112.822 1.77626 112.384 1.77626C114.722 5.49239 119.587 6.10312 122.771 3.05983C123.471 2.39734 122.406 1.34151 121.707 2.00399C119.316 4.29164 115.516 3.95004 113.678 1.03097C113.386 0.554807 112.687 0.544455 112.384 1.03097C110.223 4.62288 105.159 4.84026 102.549 1.7038C102.278 1.38291 101.777 1.46572 101.495 1.7038C97.6113 4.99553 91.8171 4.46761 88.6747 0.368483C88.4242 0.0372403 87.85 -0.190489 87.5159 0.223564C84.9685 3.37037 80.7717 3.86723 77.6606 1.10343C77.3787 0.854995 76.9507 0.823941 76.6584 1.10343C73.422 4.26058 68.6823 4.52972 65.1432 1.63134C64.83 1.37256 64.3706 1.38291 64.1409 1.75556C61.9799 5.40958 57.2297 5.74082 54.4631 2.65613C54.0873 2.24207 53.44 2.59402 53.4191 3.09088C53.2103 7.04509 45.6727 1.72451 43.8979 1.92118C40.4841 2.30418 40.2127 5.74082 35.7026 3.82583C33.4894 2.88386 31.8085 0.989563 29.1777 1.39326C26.9226 1.74521 25.9622 3.86723 23.9682 4.63323C20.4603 5.9789 19.2702 2.13856 16.2531 2.33524C11.2941 2.66648 14.1442 7.41774 6.43955 5.75117C4.22629 5.27501 -0.221114 3.93969 0.00856432 7.82144C0.0190042 8.05952 0.363521 8.05952 0.384401 7.82144Z" fill="currentColor"></path>
                           </svg>
                        </span>
                        <h3 class="tp-section-title">Best Digital <span class="title-color">Technology</span> <br> Agency For People
                        </h3>
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="tp-team-nav d-flex justify-content-start justify-content-lg-end align-items-end mb-30">
                        <button type="button" class="team-button-prev-1 tp-btn-hover-clear alt-color" tabindex="0" aria-label="Previous slide"><i class="fa-regular fa-arrow-left"></i>
                        <b></b>
                        </button>
                        <button type="button" class="team-button-next-1 tp-btn-hover-clear alt-color" tabindex="0" aria-label="Next slide"><i class="fa-regular fa-arrow-right"></i>
                        <b></b>
                        </button>
                     </div>
                  </div>
               </div>
            </div>
            <div class="container-fluid">
               <div class="row">
                  <div class="team-active swiper-container">
                     <div class="swiper-wrapper">
                        <div class="swiper-slide">
                           <div class="tp-team-wrapper p-relative">
                              <div class="tp-team-wrapper-thumb">
                                 <a href="team-details.html"><img src="assetso/img/team/team-5.jpg" alt=""></a>
                                 <div class="tp-team-social-info">
                                    <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                 </div>
                              </div>
                              <div class="tp-team-wrapper-content d-flex align-items-center justify-content-between">
                                 <div class="tp-team-wrapper-content-text">
                                    <h3 class="team-title"><a href="team-details.html">Alextina Ditarson</a></h3>
                                    <p>App Developer</p>
                                 </div>
                                 <div class="tp-team-wrapper-icon">
                                    <span class="tp-team-social">
                                       <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M6.17963 0.813046L6.19966 6.20109L0.813128 6.17955L0.819197 7.81233L6.20573 7.83388L6.22576 13.2219L7.85808 13.2285L7.83805 7.84041L13.2246 7.86195L13.2185 6.22917L7.83198 6.20762L7.81195 0.819575L6.17963 0.813046Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-team-wrapper p-relative">
                              <div class="tp-team-wrapper-thumb">
                                 <a href="team-details.html"><img src="assetso/img/team/team-1.jpg" alt=""></a>
                                 <div class="tp-team-social-info">
                                    <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                 </div>
                              </div>
                              <div class="tp-team-wrapper-content d-flex align-items-center justify-content-between">
                                 <div class="tp-team-wrapper-content-text">
                                    <h3 class="team-title"><a href="team-details.html">Leslie Alexander</a></h3>
                                    <p>Web Developer</p>
                                 </div>
                                 <div class="tp-team-wrapper-icon">
                                    <span class="tp-team-social">
                                       <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M6.17963 0.813046L6.19966 6.20109L0.813128 6.17955L0.819197 7.81233L6.20573 7.83388L6.22576 13.2219L7.85808 13.2285L7.83805 7.84041L13.2246 7.86195L13.2185 6.22917L7.83198 6.20762L7.81195 0.819575L6.17963 0.813046Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-team-wrapper p-relative">
                              <div class="tp-team-wrapper-thumb">
                                 <a href="team-details.html"><img src="assetso/img/team/team-2.jpg" alt=""></a>
                                 <div class="tp-team-social-info">
                                    <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                 </div>
                              </div>
                              <div class="tp-team-wrapper-content d-flex align-items-center justify-content-between">
                                 <div class="tp-team-wrapper-content-text">
                                    <h3 class="team-title"><a href="team-details.html">Brooklyn Simmons</a></h3>
                                    <p>Game Developer</p>
                                 </div>
                                 <div class="tp-team-wrapper-icon">
                                    <span class="tp-team-social">
                                       <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M6.17963 0.813046L6.19966 6.20109L0.813128 6.17955L0.819197 7.81233L6.20573 7.83388L6.22576 13.2219L7.85808 13.2285L7.83805 7.84041L13.2246 7.86195L13.2185 6.22917L7.83198 6.20762L7.81195 0.819575L6.17963 0.813046Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-team-wrapper p-relative">
                              <div class="tp-team-wrapper-thumb">
                                 <a href="team-details.html"><img src="assetso/img/team/team-3.jpg" alt=""></a>
                                 <div class="tp-team-social-info">
                                    <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                 </div>
                              </div>
                              <div class="tp-team-wrapper-content d-flex align-items-center justify-content-between">
                                 <div class="tp-team-wrapper-content-text">
                                    <h3 class="team-title"><a href="team-details.html">Marvin McKinney</a></h3>
                                    <p>Website Developer</p>
                                 </div>
                                 <div class="tp-team-wrapper-icon">
                                    <span class="tp-team-social">
                                       <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M6.17963 0.813046L6.19966 6.20109L0.813128 6.17955L0.819197 7.81233L6.20573 7.83388L6.22576 13.2219L7.85808 13.2285L7.83805 7.84041L13.2246 7.86195L13.2185 6.22917L7.83198 6.20762L7.81195 0.819575L6.17963 0.813046Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="swiper-slide">
                           <div class="tp-team-wrapper p-relative">
                              <div class="tp-team-wrapper-thumb">
                                 <a href="team-details.html"><img src="assetso/img/team/team-4.jpg" alt=""></a>
                                 <div class="tp-team-social-info">
                                    <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-linkedin"></i></a>
                                    <a href="javascript:void(0)"><i class="fab fa-youtube"></i></a>
                                 </div>
                              </div>
                              <div class="tp-team-wrapper-content d-flex align-items-center justify-content-between">
                                 <div class="tp-team-wrapper-content-text">
                                    <h3 class="team-title"><a href="team-details.html">Kathryn Murphy</a></h3>
                                    <p>GRAPHIC DESIGNER</p>
                                 </div>
                                 <div class="tp-team-wrapper-icon">
                                    <span class="tp-team-social">
                                       <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                          <path d="M6.17963 0.813046L6.19966 6.20109L0.813128 6.17955L0.819197 7.81233L6.20573 7.83388L6.22576 13.2219L7.85808 13.2285L7.83805 7.84041L13.2246 7.86195L13.2185 6.22917L7.83198 6.20762L7.81195 0.819575L6.17963 0.813046Z" fill="currentColor"/>
                                       </svg>
                                    </span>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- team area end -->


         <!-- blog area start -->
         <section class="tp-blog-3-area p-relative fix pt-100 pb-90">
            <div class="tp-blog-3-shape">
               <img class="shape-1" src="assetso/img/blog/shaep-2.png" alt="">
               <img class="shape-2" src="assetso/img/blog/shaep-2.png" alt="">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="tp-blog-3-title-wrapper text-center">
                        <span class="tp-section-title__pre">
                           blog <span class="title-pre-color">IT Solutions</span>
                           <svg width="123" height="8" viewBox="0 0 123 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                              <path d="M0.384401 7.82144C0.645399 4.52972 8.83029 8.38041 10.8974 7.67652C12.4321 7.1486 11.6386 7.03474 12.9749 6.19628C14.0816 4.61253 15.7519 3.89829 17.9756 4.06391C18.6125 4.48831 19.2284 4.93342 19.8444 5.38888C21.1076 6.09277 22.1621 6.51717 23.6028 6.13417C24.8973 5.79258 25.5237 4.79885 26.6095 4.18812C30.8481 1.80732 31.3701 2.90456 34.5855 4.58147C36.0993 5.36817 37.634 6.48612 39.461 6.08242C40.1604 5.92715 40.2127 5.67871 40.672 5.54415C42.1023 4.10531 43.9606 3.52564 46.2469 3.80512C47.0612 4.28129 47.8651 4.75745 48.669 5.25431C50.9866 6.22733 54.5049 6.23769 54.6615 3.08053C54.3065 3.22545 53.962 3.37037 53.6175 3.51529C55.622 5.75117 58.6078 6.59998 61.5205 5.5752C64.8091 4.41585 63.8277 3.02877 67.1685 4.35374C68.6614 4.94377 70.2587 5.14045 71.856 4.96447C73.6412 4.7678 75.1028 3.27721 76.6271 3.07018C79.0491 2.73894 81.3354 4.89201 84.2482 4.15707C85.3235 3.88793 86.9417 2.27313 87.7978 2.21102C88.6329 2.14891 89.9484 3.68091 90.8358 4.14672C93.3936 5.51309 96.5882 5.75117 99.3234 4.7471C101.902 3.80512 100.858 3.60845 103.124 4.30199C104.366 4.67464 105.253 5.34747 106.652 5.45099C109.628 5.65801 112.175 4.26058 113.678 1.77626C113.25 1.77626 112.822 1.77626 112.384 1.77626C114.722 5.49239 119.587 6.10312 122.771 3.05983C123.471 2.39734 122.406 1.34151 121.707 2.00399C119.316 4.29164 115.516 3.95004 113.678 1.03097C113.386 0.554807 112.687 0.544455 112.384 1.03097C110.223 4.62288 105.159 4.84026 102.549 1.7038C102.278 1.38291 101.777 1.46572 101.495 1.7038C97.6113 4.99553 91.8171 4.46761 88.6747 0.368483C88.4242 0.0372403 87.85 -0.190489 87.5159 0.223564C84.9685 3.37037 80.7717 3.86723 77.6606 1.10343C77.3787 0.854995 76.9507 0.823941 76.6584 1.10343C73.422 4.26058 68.6823 4.52972 65.1432 1.63134C64.83 1.37256 64.3706 1.38291 64.1409 1.75556C61.9799 5.40958 57.2297 5.74082 54.4631 2.65613C54.0873 2.24207 53.44 2.59402 53.4191 3.09088C53.2103 7.04509 45.6727 1.72451 43.8979 1.92118C40.4841 2.30418 40.2127 5.74082 35.7026 3.82583C33.4894 2.88386 31.8085 0.989563 29.1777 1.39326C26.9226 1.74521 25.9622 3.86723 23.9682 4.63323C20.4603 5.9789 19.2702 2.13856 16.2531 2.33524C11.2941 2.66648 14.1442 7.41774 6.43955 5.75117C4.22629 5.27501 -0.221114 3.93969 0.00856432 7.82144C0.0190042 8.05952 0.363521 8.05952 0.384401 7.82144Z" fill="currentColor"></path>
                           </svg>
                        </span>
                        <h3 class="tp-section-title">Best Digital <span class="title-color">Technology</span> <br> Agency For People</h3>
                     </div>
                  </div>
                  <div class="col-xl-4 col-md-6">
                     <div class="tp-blog-3-wrapper mb-30 OneByOne">
                        <div class="tp-blog-3-thumb">
                           <a href="blog-details.html"><img src="assetso/img/blog/img-7.jpg" alt=""></a>
                           <div class="tp-blog-3-user">
                              <img src="assetso/img/blog/user.png" alt="">
                              <p>By:Naim Ali</p>
                           </div>
                        </div>
                        <div class="tp-blog-3-content">
                           <div class="tp-blog-date">
                              <span><i class="fa-light fa-calendar-days"></i> 02 Apr 2021 </span>
                              <span>-</span>
                              <span><i class="fa-sharp fa-solid fa-comments"></i> Coments (03)</span>
                           </div>
                           <h3 class="tp-blog-3-title"><a href="blog-details.html">Providing solutions for Industrial <br> men, and restoration.</a></h3>
                        </div>
                        <div class="tp-blog-3-btn d-flex justify-content-between">
                           <div class="read-more p-relative">
                              <a href="blog-details.html">Read More <span><svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M16.1658 4.7457L4.64685 14.7646C4.31796 15.0507 3.88211 15.0938 3.67396 14.8608C3.46581 14.6278 3.5638 14.2066 3.89268 13.9205L15.4116 3.90159C15.7405 3.61553 16.1764 3.57245 16.3845 3.80542C16.5927 4.0384 16.4947 4.45964 16.1658 4.7457Z" fill="currentColor"/>
                                 <path d="M16.7227 9.69055C16.5861 9.80933 16.4034 9.87621 16.2062 9.86208C15.8118 9.83504 15.5102 9.49748 15.5324 9.10795L15.7964 4.49597L11.1258 4.17577C10.7314 4.14873 10.4297 3.81104 10.452 3.42164C10.4744 3.03214 10.8121 2.7384 11.2065 2.76543L16.5904 3.13466C16.9848 3.16169 17.2864 3.49926 17.2641 3.88865L16.9599 9.20509C16.9494 9.40129 16.8593 9.57176 16.7227 9.69055Z" fill="currentColor"/>
                                 </svg></span></a>
                           </div>
                           <div class="fvrt">
                              <span><i class="fa-light fa-heart"></i></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-md-6">
                     <div class="tp-blog-3-wrapper mb-30 OneByOne">
                        <div class="tp-blog-3-thumb">
                           <a href="blog-details.html"><img src="assetso/img/blog/img-8.jpg" alt=""></a>
                           <div class="tp-blog-3-user active">
                              <img src="assetso/img/blog/user.png" alt="">
                              <p>By:Rasalina</p>
                           </div>
                        </div>
                        <div class="tp-blog-3-content">
                           <div class="tp-blog-date">
                              <span><i class="fa-light fa-calendar-days"></i> 02 Apr 2021 </span>
                              <span>-</span>
                              <span><i class="fa-sharp fa-solid fa-comments"></i> Coments (03)</span>
                           </div>
                           <h3 class="tp-blog-3-title"><a href="blog-details.html">Everything melancholy uncommonly but solicitude.</a></h3>
                        </div>
                        <div class="tp-blog-3-btn d-flex justify-content-between">
                           <div class="read-more p-relative">
                              <a href="blog-details.html">Read More <span><svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M16.1658 4.7457L4.64685 14.7646C4.31796 15.0507 3.88211 15.0938 3.67396 14.8608C3.46581 14.6278 3.5638 14.2066 3.89268 13.9205L15.4116 3.90159C15.7405 3.61553 16.1764 3.57245 16.3845 3.80542C16.5927 4.0384 16.4947 4.45964 16.1658 4.7457Z" fill="currentColor"/>
                                 <path d="M16.7227 9.69055C16.5861 9.80933 16.4034 9.87621 16.2062 9.86208C15.8118 9.83504 15.5102 9.49748 15.5324 9.10795L15.7964 4.49597L11.1258 4.17577C10.7314 4.14873 10.4297 3.81104 10.452 3.42164C10.4744 3.03214 10.8121 2.7384 11.2065 2.76543L16.5904 3.13466C16.9848 3.16169 17.2864 3.49926 17.2641 3.88865L16.9599 9.20509C16.9494 9.40129 16.8593 9.57176 16.7227 9.69055Z" fill="currentColor"/>
                                 </svg></span></a>
                           </div>
                           <div class="fvrt">
                              <span><i class="fa-light fa-heart"></i></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-4 col-md-6">
                     <div class="tp-blog-3-wrapper mb-30 OneByOne">
                        <div class="tp-blog-3-thumb">
                           <a href="blog-details.html"><img src="assetso/img/blog/img-9.jpg" alt=""></a>
                           <div class="tp-blog-3-user">
                              <img src="assetso/img/blog/user.png" alt="">
                              <p>By:Hamim</p>
                           </div>
                        </div>
                        <div class="tp-blog-3-content">
                           <div class="tp-blog-date">
                              <span><i class="fa-light fa-calendar-days"></i> 02 Apr 2021 </span>
                              <span>-</span>
                              <span><i class="fa-sharp fa-solid fa-comments"></i> Coments (03)</span>
                           </div>
                           <h3 class="tp-blog-3-title"><a href="blog-details.html">Discovery incommode earnestly commanded mentions.</a></h3>
                        </div>
                        <div class="tp-blog-3-btn d-flex justify-content-between">
                           <div class="read-more p-relative">
                              <a href="blog-details.html">Read More <span><svg width="21" height="19" viewBox="0 0 21 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M16.1658 4.7457L4.64685 14.7646C4.31796 15.0507 3.88211 15.0938 3.67396 14.8608C3.46581 14.6278 3.5638 14.2066 3.89268 13.9205L15.4116 3.90159C15.7405 3.61553 16.1764 3.57245 16.3845 3.80542C16.5927 4.0384 16.4947 4.45964 16.1658 4.7457Z" fill="currentColor"/>
                                 <path d="M16.7227 9.69055C16.5861 9.80933 16.4034 9.87621 16.2062 9.86208C15.8118 9.83504 15.5102 9.49748 15.5324 9.10795L15.7964 4.49597L11.1258 4.17577C10.7314 4.14873 10.4297 3.81104 10.452 3.42164C10.4744 3.03214 10.8121 2.7384 11.2065 2.76543L16.5904 3.13466C16.9848 3.16169 17.2864 3.49926 17.2641 3.88865L16.9599 9.20509C16.9494 9.40129 16.8593 9.57176 16.7227 9.69055Z" fill="currentColor"/>
                                 </svg></span></a>
                           </div>
                           <div class="fvrt">
                              <span><i class="fa-light fa-heart"></i></span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- blog area end -->


         <!-- cta area start -->
         <div class="tp-cta-4-area p-relative">
            <div class="tp-cta-4-shape">
               <img src="assetso/img/cta/home-3/shape-2.png" alt="">
            </div>
            <div class="container">
               <div class="row gx-0">
                  <div class="col-xl-6">
                     <div class="tp-cta-4-wrapper-left">
                        <img class="shape-1" src="assetso/img/cta/home-3/shape-3.png" alt="">
                        <div class="tp-cta-4-mail d-flex flex-wrap justify-content-center justify-content-xl-start align-items-center">
                              <img src="assetso/img/cta/home-3/conversation.png" alt="">
                              <a href="https://wa.me/59174002216" class="tp-cta-4-mail-text">Depto de Idiomas <span>WhastApp</span></a>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-6">
                     <div class="tp-cta-4-wrapper-right">
                        <div class="tp-cta-4-headphone d-flex flex-wrap justify-content-center ">
                           <div class="tp-cta-4-headphone-thumb">
                              <img src="assetso/img/cta/home-3/headphone.png" alt="">
                           </div>
                           <div class="tp-cta-4-content">
                              <p>Departamento  <span>de Idiomas</span></p>
                              <a href="tel:9266688000">+591 74002216</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- cta area end -->
      </main>

       <!-- Modal -->
    

  <!-- Modal -->

  {{-- @yield('body-page') --}}
    

    

      <!-- footer area start -->
      <footer class="tp-footer-3-area p-relative">
         <div class="tp-footer-bg" data-background="assetso/img/footer/footer-bg.jpg"></div>
         <div class="container">
         <div class="tp-footer-3-main-area">
            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="tp-footer-widget tp-footer-3-col-1">
                     <div class="tp-footer-logo">
                        <a href="index.html"> <img src="assetso/img/logo/footer-logo.png" alt=""></a>
                     </div>
                     <div class="tp-footer-widget-content">
                        <div class="tp-footer-info">
                           <p class="p">Universidad publica de El Alto<br> Departamento de idiomas</p>
                           <div class="tp-footer-main-location">
                              <a href="https://maps.app.goo.gl/A8Q76K95DfFZXnnT6" target="_blank">
                                 <i class="fa-sharp fa-light fa-location-dot"></i> GR54+7GF, P.º <br>  Universitario, El Alto
                              </a>
                           </div>
                           <div class="tp-footer-main-mail">
                              <a href="mailto:depto.idiomas.upea@gmail.com"><i class="fa-light fa-message-dots"></i> depto.idiomas.upea@gmail.com <br> +591 74002216</a>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="tp-footer-widget tp-footer-3-col-2">
                     <h3 class="tp-footer-widget-title">Enlaces</h3>
                     <div class="tp-footer-widget-content">
                        <ul>
                           <li><a href="javascript:void(0)">U P E A</a></li>
                           <li><a href="javascript:void(0)">Carrera</a></li>
                           <li><a href="javascript:void(0)">Verifica tu certificado</a></li>
                           <li><a href="javascript:void(0)">Escolarizado</a></li>
                           <!-- <li><a href="javascript:void(0)">Vendor Registration</a></li>
                           <li><a href="javascript:void(0)">City Board Applications</a></li> -->
                        </ul>
                     </div>
                  </div> 
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="tp-footer-widget tp-footer-3-col-3">
                     <h3 class="tp-footer-widget-title">Contactos</h3>
                     <div class="tp-footer-from">
                        <div class="tp-footer-text-email p-relative">
                           <input type="text" placeholder="Enter Email Address">
                           <span>
                              <svg width="25" height="21" viewBox="0 0 25 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M3.49316 13.7164C3.63379 13.8458 3.84046 13.8759 4.01071 13.7908L11.4654 10.1149L5.90522 14.0488C5.77478 14.1412 5.70122 14.2939 5.71058 14.4538L5.90157 17.7137C5.93936 18.3587 6.06262 18.9045 6.25825 19.2917C6.59438 19.9576 7.06242 20.0322 7.31139 20.0176C7.61259 20 7.90192 19.8421 8.17074 19.5482L9.20637 18.4157L10.8851 19.4378C11.3043 19.6933 11.7985 19.8118 12.3141 19.7816C13.3786 19.7192 14.4435 19.0328 15.0945 17.9905L24.1844 3.42754C24.8108 2.42378 24.7071 1.81746 24.5101 1.48593C24.38 1.26641 24.0445 0.904988 23.2627 0.950786C23.0031 0.965999 22.7113 1.02528 22.3941 1.12637L1.78045 7.70011C0.860734 7.99324 0.267482 8.54997 0.108773 9.26713C-0.0494808 9.98477 0.254344 10.7393 0.964829 11.3921L3.49316 13.7164ZM1.01287 9.46688C1.09713 9.08504 1.46951 8.7707 2.06157 8.58208L22.6756 2.00782C23.23 1.83163 23.6608 1.86665 23.7149 1.95852C23.7648 2.04228 23.7632 2.35484 23.3995 2.93758L14.3102 17.5006C13.8156 18.2927 13.0301 18.8124 12.2603 18.8575C11.9286 18.877 11.6283 18.8065 11.3672 18.6474L9.36306 17.4269C9.27991 17.3767 9.18683 17.3548 9.09535 17.3601C8.97847 17.367 8.86461 17.4181 8.781 17.5097L7.48832 18.9234C7.33843 19.087 7.25818 19.0935 7.2577 19.094C7.1674 19.0715 6.88551 18.6754 6.82599 17.6595L6.65003 14.656L16.785 7.48526C16.9817 7.34623 17.0388 7.07823 16.9149 6.87079C16.7915 6.66195 16.5265 6.58619 16.3129 6.69237L3.88618 12.8204L1.59108 10.7106C1.13392 10.2906 0.928189 9.84874 1.01287 9.46688Z" fill="#05DAC3"></path>
                                 </svg>
                           </span>
                        </div>
                        <div class="tp-footer-form-check">
                           <input class="form-check-input" id="flexCheckChecked" type="checkbox">
                           <label class="form-check-label" for="flexCheckChecked">
                              I agree to all your terms and policies
                           </label>
                     </div>
                     <div class="tp-footer-widget-social">
                        <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                        <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                        <a href="javascript:void(0)"><i class="fa-brands fa-instagram"></i></a>
                        <a href="javascript:void(0)"><i class="fa-brands fa-pinterest"></i></a>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tp-footer-copyright-area p-relative">
            <div class="row">
               <div class="col-md-12 col-lg-6">
                  <div class="tp-footer-copyright-inner">
                     <p> Departamento de Idiomas <span>©2023</span> UPEA</p>
                  </div>
               </div>
               <div class="col-md-12 col-lg-6">
                  <div class="tp-footer-copyright-inner text-lg-end">
                     <a href="javascript:void(0)"></a>
                     <a class="ml-50" href="javascript:void(0)"></a>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </footer>
      <!-- footer area end -->
      {{-- @include('modulos.home_guest.acerca_desarrollo') --}}
        @livewire('landig-page.preinscripcion-index')

      <!-- JS here -->
      <script src="{{ asset('assetso/js/vendor/jquery.js') }}"></script>
      <script src="{{ asset('assetso/js/vendor/waypoints.js') }}"></script>
      <script src="{{ asset('assetso/js/bootstrap-bundle.js') }}"></script>
      <script src="{{ asset('assetso/js/meanmenu.js') }}"></script>
      <script src="{{ asset('assetso/js/swiper-bundle.js') }}"></script>
      <script src="{{ asset('assetso/js/splide.js') }}"></script>
      <script src="{{ asset('assetso/js/purecounter.js') }}"></script>
      <script src="{{ asset('assetso/js/nouislider.js') }}"></script>
      <script src="{{ asset('assetso/js/magnific-popup.js') }}"></script>
      <script src="{{ asset('assetso/js/nice-select.js') }}"></script>
      <script src="{{ asset('assetso/js/wow.js') }}"></script>
      <script src="{{ asset('assetso/js/gsap.min.js') }}"></script>
      <script src="{{ asset('assetso/js/split-text.min.js') }}"></script>
      <script src="{{ asset('assetso/js/scrool-triger.js') }}"></script>
      <script src="{{ asset('assetso/js/scrollMagic.min.js') }}"></script>
      <script src="{{ asset('assetso/js/parallax-scroll.js') }}"></script>
      <script src="{{ asset('assetso/js/animation.gsap.min.js') }}"></script>
      <script src="{{ asset('assetso/js/isotope-pkgd.js') }}"></script>
      <script src="{{ asset('assetso/js/imagesloaded-pkgd.js') }}"></script>
      <script src="{{ asset('assetso/js/jquery-appear.js') }}"></script>
      <script src="{{ asset('assetso/js/jquery-knob.js') }}"></script>
      <script src="{{ asset('assetso/js/ajax-form.js') }}"></script>
      <script src="{{ asset('assetso/js/main.js') }}"></script>

      <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');

        togglePassword.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    </script>
   <!-- <script>
      function validateCI() {
    var ciInput = document.getElementById('ciInput').value;
    var ciRegex = /^(?:[a-zA-Z]?-?\d+|\d+-\d+[a-zA-Z]?)$/;

    if (ciInput.length <= 15 && ciRegex.test(ciInput)) {
        document.getElementById('ciError').innerText = '';
        // alert('Número de carnet de identidad válido.');
    } else {
        document.getElementById('ciError').innerText = 'Formato inválido de carnet de identidad';
    }
}

   </script> -->
   
   <script>
        Livewire.on('alert', function(message) {
            Swal.fire(
                'Guardado con exito!',
                message,
                'success'
            )
        })
        Livewire.on('error', function(message) {
            Swal.fire(
                'Error!',
                message,
                'error'
            )
        })
        Livewire.on('errorvalidate', function(message) {
            Swal.fire(
                'Error!',
                message,
                'error'
            )
        })
    </script>
    @stack('navi-js-front')
   </body>
</html>
