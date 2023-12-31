<!-- Extend the 'link' view -->
@extends('user_link')

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#"><span class="text-warning">Sfc</span>Cfc</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('usergroup')}}#group">Groups</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('userevent')}}#event">Events</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('userdonate')}}#donation">Donations</a>
        </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('logout') }}">Logout</a>
          </li>

          
        <li class="nav-item">
          <a class="nav-link dropdown-toggle"  href="{{ route('user.profile') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            {{ session('user_name') }}
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                @yield('profile-content')
                <a class="dropdown-item" href="{{ route('userprofile') }}">User Profile</a>
                
          </div>
        </li>

      </ul>
    </div>
  </div>
</nav>


<!-- Rest of your HTML content -->

    <br>
    <br>

    
  
  <br>
  <div class="container">
    <div id="home">
      <section class="home-section">
        <!-- Home content -->
        <div class="container">
  <div id="home">
    <section class="home-section">
      <!-- Home content -->
      <div class="container">
        <div class="mt-3">
          <div class="row">
            <div class="col-md-6">
              <h3 class="subheading text-warning fw-bold">Welcome to Sfc|Cfc</h3>
              <p class="text-dark fw-bold">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <p class="text-dark fw-bold">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.
                <span id="additionalContent" style="display: none;"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. </span></p>
              <p class="mt-5"><a href="#" class="btn btn-primary" onclick="toggleContent()">Know more about us</a></p>
            </div>
            <div class="col-md-6">
              <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8eW91dGh8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="Image" class="img-fluid">
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<script>
  function toggleContent() {
    var additionalContent = document.getElementById("additionalContent");
    additionalContent.style.display = additionalContent.style.display === "none" ? "inline" : "none";
  }
</script>



    <br>
        <div id="group">
            <div class="container">
                <div class="container">
                    @yield('group-content')
                </div>
            </div>
        </div>
    
         <div id="event">
            <div class="container">
              <div class="card">
                @yield('Eventcontent')
              </div>
            </div>
         </div>
            <div id="donation">
                <div class="container">
                    <div class="card">
                @yield('donation-content')
            </div>
                </div>
            </div>
        
        </div>
    </div>
    <br>
    
    <section id="gallery">
      <div class="container">
        <div class="card">
          <div class="card-body">
            <h1 class="card-title text-center fw-bold">
              <span class="text-warning">Youth</span> Activities
            </h1>
            <hr />
            <div class="row">
              <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                <div class="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1507692049790-de58290a4334?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGNodXJjaHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />
                  <div class="overlay">
                    <div class="text">Jesus Loves You</div>
                  </div>
                </div>
    
                <div class="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1630467630122-4bfb7c4984a2?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8eW91dGglMjBjb25mZXJlbmNlfGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Wintry Mountain Landscape"
                  />
                  <div class="overlay">
                    <div class="text">Learn to sing and praise God</div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1540317580384-e5d43616b9aa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NTB8fHlvdXRoJTIwY29uZmVyZW5jZXxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Mountains in the Clouds"
                  />
                  <div class="overlay">
                    <div class="text">Imagine Everything</div>
                  </div>
                </div>
    
                <div class="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Y2h1cmNofGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Boat on Calm Water"
                  />
                  <div class="overlay">
                    <div class="text">Trust everyhting will pass according to my will</div>
                  </div>
                </div>
              </div>
    
              <div class="col-lg-4 mb-4 mb-lg-0">
                <div class="image-container">
                  <img
                    src="https://media.istockphoto.com/id/1048187866/photo/teenagers-talking-in-youth-club.jpg?s=612x612&w=0&k=20&c=IzKTcCZD5dusZ0ux9d-ekQAqP-tjR0F8mB1meESEJ_I="
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Waves at Sea"
                  />
                  <div class="overlay">
                    <div class="text">I worship you</div>
                  </div>
                </div>
    
                <div class="image-container">
                  <img
                    src="https://images.unsplash.com/photo-1496516348160-24b35a31856f?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTExfHx5b3V0aCUyMGNvbmZlcmVuY2V8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60"
                    class="w-100 shadow-1-strong rounded mb-4"
                    alt="Yosemite National Park"
                  />
                  <div class="overlay">
                    <div class="text">Let's be together</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
   <br>
   <footer class="py-2 text-dark" style="background: rgba(255, 255, 255, 0.8);">
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
              <div class="social-networks">
                <p>Follow Us on </p>
                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://www.facebook.com/SFCHilongosChapter" class="facebook"><i class="fab fa-facebook"></i></a>
                <a href="#" class="google"><i class="fab fa-google-plus"></i></a>
              </div>
             
              <!-- Widget content goes here -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="card-body p-2 text-center">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1648.0369629243794!2d124.74785286653088!3d10.37306193248466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33076ee956378fb5%3A0xae7f36f0e4559671!2sImmaculate%20Concepcion%20Parish!5e1!3m2!1sen!2sph!4v1686923578969!5m2!1sen!2sph" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  
    <div class="footer-bottom text-center py-3">
      <p>© 2023 SFC_CFC Event System. All rights reserved.</p>
    </div>
  </footer>
