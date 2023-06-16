

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
<section id="about" class="py-5">
  <div class="container">
    <div class="card sectioning bg-white rounded-0 shadow">
      <div class="card-body p-4 text-center">
        <h2 class="mb-4">About Us</h2>
        <p>
          We are a group of passionate youth dedicated to making a positive impact in our community. Our mission is to empower young individuals, provide opportunities for growth, and engage in meaningful service.
        </p>
        <p>
          Through our youth groups, we focus on leadership development, community service projects, spiritual retreats, and social gatherings. We strive to create a supportive and inclusive environment where young people can thrive and contribute to a better future.
        </p>
        <p>
          Join us today and become part of a vibrant community committed to creating positive change.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- Contact Us section -->
<section id="contact" class="py-5 bg-light">
  <div class="container">
    <div class="card bg-white rounded-0 shadow">
      <div class="card-body p-4 text-center">
        <h2 class="mb-4">Contact Us</h2>
        <p>
          If you have any inquiries or would like to get in touch with us, please fill out the form below or reach out to us using the provided contact information.
        </p>
        <form>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Enter your name">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Enter your email">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" rows="4" placeholder="Enter your message"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer class="py-2 text-dark">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <div class="footer-section">
          <div class="footer-icon">
            <div class="square-icon"></div>
          </div>
          <div class="footer-content">
            <div><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <h6>Address:</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="footer-section">
          <div class="footer-icon">
            <div class="square-icon"></div>
          </div>
          <div class="footer-content">
            <div><i class="fa fa-mobile" aria-hidden="true"></i></div>
            <h6>Phone:</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="footer-section">
          <div class="footer-icon">
            <div class="square-icon"></div>
          </div>
          <div class="footer-content">
            <div><i class="fa fa-envelope" aria-hidden="true"></i></div>
            <h6>Email:</h6>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center">
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a href="https://www.facebook.com/SFCHilongosChapter" target="_blank" rel="nofollow">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://twitter.com/example" target="_blank" rel="nofollow">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="https://www.instagram.com/example" target="_blank" rel="nofollow">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
          <div>
            <p>© 2023 SFC_CFC Event System. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
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
 