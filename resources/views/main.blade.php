

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
        <a class="nav-link active" aria-current="page" href="#about">About us</a>
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
<section id="about" class="py-5">
  <div class="container">
    <div class="card bg-white rounded-0 shadow">
      <div class="card-body p-4 text-center">
        <h2>About Us</h2>
        <p>
          We are a group of youth passionate about making a positive impact in our community. Through our youth groups, we strive to empower young individuals and provide them with opportunities for growth, learning, and service.
        </p>
        <p>
          Our youth groups engage in various activities such as leadership development, community service projects, spiritual retreats, and social gatherings. We believe in fostering a supportive and inclusive environment where young people can thrive and make a difference.
        </p>
        <p>
          Join us today and be part of a vibrant community of youth dedicated to creating a better future.
        </p>
      </div>
    </div>
  </div>
</section>


<footer class="py-2 text-dark" style="background-color: rgba(0, 0, 255, 0.2);">
  <div class="container text-center">
    <p>&copy; 2023 SFC_CFC Event System. All rights reserved.</p>
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
 