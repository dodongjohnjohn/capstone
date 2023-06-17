

<!-- Extend the 'link' view -->
@extends('link')

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="/"><span class="text-warning">Sfc</span>Cfc</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="dark-blue-text"><i
        class="fas fa-bars fa-1x"></i></span>
    </button>


<!-- Navbar links -->
<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item active">
      <a class="nav-link active" href="/">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a href="{{ route('loginform') }}" class="nav-link" aria-current="page">Login</a>
   
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{route('register')}}">Register</a>
    </li>
      
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#about">About us</a>
      </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#contact">Contact Us</a>
      </li>
  </ul>

  <!-- Social icons -->
  <ul class="navbar-nav d-flex flex-row">
    <li class="nav-item me-3 me-lg-0">
      <a class="nav-link" href="https://www.facebook.com/SFCHilongosChapter" rel="nofollow" target="_blank">
        <i class="fab fa-facebook-f"></i>
      </a>
    </li>
  </ul>
</div>
</div>
</nav>
<!-- Navbar -->
<!-- Hero section with background image -->
<div id="intro" class="bg-image shadow-2-strong">
 <h1 class="heading">Singles For Christ | Couples For Christ</h1>

  <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 255, 0.2);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-md-8">
                <!-- Show success message if set -->
      @if($message = Session::get('success'))
      <div class="alert alert-success">
          {{ $message }}
      </div>
    @endif
  </div>
  <!-- Yield the content section for the view -->
  @yield('content')
</div>
</div>
</div>
</div>
<!-- About Us section -->
<br />
<section id="about" class="py-5" style="background: rgba(237, 225, 208, 0.5);">
  <div class="container">
    <div class="row justify-content-between">
      <div class="col-lg-4 aos-init" data-aos="fade-up">
        <span class="subheading mb-4 d-block heading" style="border-bottom: {{ strlen('About us') * 1 }}px solid orange;">About us</span>
        <h2 class="mb-4 heading">Living and Sharing<br>The Gospel</h2>
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
        <p class="mt-5"><a href="#" class="btn btn-primary">Know more about us</a></p>
      </div>
      <div class="col-lg-6 aos-init" data-aos="fade-up" data-aos-delay="100">
        <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8eW91dGh8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="Image" class="img-fluid rounded">
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-lg-6 aos-init" data-aos="fade-up" style="border-right: 1px solid orange;">
        <h3 class="mb-4 heading">Our Mission</h3>
        <p>Building the Church of the Home. Building the Church of the Poor.</p>
      </div>
      <div class="col-lg-6 aos-init" data-aos="fade-up" data-aos-delay="100">
        <h3 class="mb-4 heading" id="vision">Our Vision</h3>
        <p>Every single man and woman all over the world experiencing Christ..</p>
      </div>
    </div>
  </div>
</section>


<!-- Contact Us section -->

<br />
<!-- Footer -->
<footer class="py-2 text-dark" style="background: rgba(237, 225, 208, 0.5);">
  <div class="site-footer text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 mb-4">
          <div class="widget" id="contact">
            <h3>Contact</h3>
            <address>Hilongos, Leyte</address>
            <ul class="list-unstyled links">
              <li><a href="tel://11234567890">+63(0927)-307-2133</a></li>
              <li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="widget">
            <h3>Links</h3>
            <ul class="list-unstyled links">
              <li><a href="#vision">Our Vision</a></li>
              <li><a href="#about">About us</a></li>
              <li><a href="#contact">Contact us</a></li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 mb-4">
          <div class="widget">
            <a class="navbar-brand" href="/" style="font-size: 30px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.4);">
              <span class="text-warning">Sfc</span>Cfc
            </a>
            <!-- Widget content goes here -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="card-body p-4 text-center">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1648.0369629243794!2d124.74785286653088!3d10.37306193248466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33076ee956378fb5%3A0xae7f36f0e4559671!2sImmaculate%20Concepcion%20Parish!5e1!3m2!1sen!2sph!4v1686923578969!5m2!1sen!2sph" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  </div>
  <div class="social-networks">
    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
    <a href="https://www.facebook.com/SFCHilongosChapter" class="facebook"><i class="fab fa-facebook"></i></a>
    <a href="#" class="google"><i class="fab fa-google-plus"></i></a>
  </div>
  <div class="footer-bottom text-center py-3">
    <p>© 2023 SFC_CFC Event System. All rights reserved.</p>
  </div>
</footer>






 <!-- Navbar 
 <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
  <div class="container-fluid">-->
    <!-- Navbar brand 
    <a class="navbar-brand nav-link" target="_blank" href="#">
      <strong>SFC_CFC</strong>
    </a>
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
      aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarExample01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="#intro">Home</a>
        </li>
        <li class="nav-item active">
          <a href="{{ route('login') }}" class="nav-link" aria-current="page">Login</a>
        </li>
        <li class="nav-item active">
          <a href="{{ route('register') }}" class="nav-link" aria-current="page">Register</a>
        </li>
      </ul>

      <ul class="navbar-nav d-flex flex-row">-->
        <!-- Icons 
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="https://www.facebook.com/SFCHilongosChapter" rel="nofollow" target="_blank">
            <i class="fab fa-facebook-f"></i>
          </a>
        </li>
        <li class="nav-item me-3 me-lg-0">
          <a class="nav-link" href="https://github.com/mdbootstrap/mdb-ui-kit" rel="nofollow" target="_blank">
            <i class="fab fa-github"></i>
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>-->
<!-- Navbar 
 
<div id="intro" class="bg-image shadow-2-strong">
  <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-xl-5 col-md-8">
-->
            <!-- Submit button 
            @if($message = Session::get('success'))

            <div class="alert alert-success">
                {{ $message }}
            </div>
            @endif  
        </div>
        @yield('content')
      </div>
    </div>
  </div>
</div>
-->
 