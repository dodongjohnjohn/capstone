<!-- Extend the 'link' view -->
@extends('user_link')

<style>
  /* Add your custom styles here */
  /* Example styles */
  body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
    padding: 0;
  }

  .navbar {
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }

  .navbar-brand {
    color: #ffc107;
    font-weight: bold;
  }

  .nav-link {
    color: #333;
    font-weight: bold;
  }

  /* Add more styles as needed */

  /* Card styles */
  .card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    opacity: 0.8;
  }

  .card-title {
    color: #333;
    font-weight: bold;
  }

  .card-text {
    color: #000;
  }

  /* Section styles */
  section {
    padding: 60px 0;
  }

  /* Footer styles */
  footer {
    background-color: rgba(0, 0, 255, 0.2);
    padding: 10px 0;
    margin-top: auto;
    width: 100%;
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
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
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fa fa-user-circle" aria-hidden="true"></i>
            {{ session('user_name') }}
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
                @yield('profile-content')
                <a class="dropdown-item" href="{{ route('userprofile') }}">User Profile</a>
                
              </li>
            <li><a class="dropdown-item" href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Rest of your HTML content -->

    <br>
    <br>

    <div class="container">
        <div id="home">
            <section class="home-section">
                <!-- Home content -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8eW91dGh8ZW58MHx8MHx8fDA%3D&auto=format&fit=crop&w=500&q=60" alt="Image" class="img-fluid">
                            </div>
                            <div class="col-md-6">
                                <h5 class="card-title">Welcome to SFC_CFC Event System</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec feugiat nisi. Integer congue metus mi, id elementum leo scelerisque nec. Mauris id nisi id nulla facilisis scelerisque. Mauris consequat fringilla nulla ut iaculis. Nulla ut velit urna. Praesent dapibus ultricies sapien, at pulvinar neque tempor nec. Nunc hendrerit elit vitae enim egestas aliquet. Fusce non arcu nec elit semper tristique. Aenean ac diam sit amet urna aliquam laoreet non at neque. Suspendisse potenti.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>        
    </div>

    <br>
        <div id="group">
            <div class="container">
                <div class="card">
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
                    <h5 class="card-title">Gallery</h5>
                    <div class="row">
                        <div class="col-md-4 p-2">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1507692049790-de58290a4334?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGNodXJjaHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image 1" class="img-fluid">
                        <div class="overlay"></div>
                        </div>
                    </div>
                        <div class="col-md-4 p-2">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Y2h1cmNofGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="Image 2" class="img-fluid">
                        <div class="overlay"></div>
                        </div>
                    </div>
                        <div class="col-md-4 p-2">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1438232992991-995b7058bbb3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2h1cmNofGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="Image 3" class="img-fluid">
                        <div class="overlay"></div>
                        </div>
                    </div>
                        <div class="col-md-4 p-2">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1529070538774-1843cb3265df?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Y2h1cmNofGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="Image 2" class="img-fluid">
                        <div class="overlay"></div>
                        </div>
                    </div>
                        <div class="col-md-4 p-2">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1438232992991-995b7058bbb3?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2h1cmNofGVufDB8fDB8fHww&auto=format&fit=crop&w=500&q=60" alt="Image 3" class="img-fluid">
                        <div class="overlay"></div>
                        </div>
                    </div>
                        <div class="col-md-4 p-2">
                        <div class="image-container">
                            <img src="https://images.unsplash.com/photo-1507692049790-de58290a4334?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGNodXJjaHxlbnwwfHwwfHx8MA%3D%3D&auto=format&fit=crop&w=500&q=60" alt="Image 1" class="img-fluid">
                        <div class="overlay"></div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    

   <br>
   <footer class="py-2 text-light" style="background-color: rgba(0, 0, 0, 0.8);">
    <div class="container text-center">
        <p style="margin-bottom: 10px;">&copy; 2023 SFC_CFC Event System. All rights reserved.</p>
        <div>
            <p style="margin-bottom: 5px;">Stay updated with our church activities:</p>
            <ul style="list-style-type: none; padding-left: 0;">
                <li style="display: inline-block; margin-right: 10px;">
                    <a href="https://www.facebook.com/examplechurch" target="_blank" rel="noopener noreferrer" style="color: #fff; text-decoration: none;">Facebook</a>
                </li>
                <li style="display: inline-block; margin-right: 10px;">
                    <a href="https://www.instagram.com/examplechurch" target="_blank" rel="noopener noreferrer" style="color: #fff; text-decoration: none;">Instagram</a>
                </li>
                <li style="display: inline-block;">
                    <a href="https://twitter.com/examplechurch" target="_blank" rel="noopener noreferrer" style="color: #fff; text-decoration: none;">Twitter</a>
                </li>
            </ul>
        </div>
    </div>
</footer>

