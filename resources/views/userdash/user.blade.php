@extends('main_user')

@section('content')
@yield('content')
<!-- Navbar 
<nav class="navbar sticky-top navbar-expand-lg" style="margin-top: 0; padding-top: 0;">
    <div class="container">
        <a class="navbar-brand" href="#home">SFC_CFC Event System</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar links 
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('usergroup')}}#events" class="nav-link" aria-current="page">Groups</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('userevent')}}#events" class="nav-link" aria-current="page">Event Information</a></li>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-user-circle" aria-hidden="true"></i>
                        {{ session('user_name') }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('userprofile') }}">User Profile</a>
                            @yield('profile-content')
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <form action="{{ route('logout') }}" method="POST" id="logout-form">
                        @csrf
                        <a class="nav-link" onclick="return confirm('Are you sure you want to log out?')"
                            href="{{ route('logout') }}">
                            Logout
                        </a>
                    </form>
                </li>
            </ul>
                
        </div>
    </div>
</nav>
<!-- Navbar 


<section id="home">
    <div class="hero-container" id="hero-sec">
        <div id="background-carousel" class="carousel slide" data-ride="carousel">
            <!-- Slides 
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://scontent.fceb1-1.fna.fbcdn.net/v/t39.30808-6/297817318_105402542276663_5088582834067287320_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=e3f864&_nc_eui2=AeHQZZKkil43FD95Ol_id27Lg-lXNQILvd6D6Vc1Agu93u6rBjGhdJ2GIX_xKB6WqVjbZ9zdhAQ0qztz5h4tmccq&_nc_ohc=Y8fy0FQDIG4AX9Bd1XQ&_nc_ht=scontent.fceb1-1.fna&oh=00_AfD51azHgHaqT78DM6sQzyfmUk2nnYtCTNE0a-zvs1-s1A&oe=6473FF2C" alt="Slide 1" class="w-100 blurry-image">
                </div>
                <div class="carousel-item">
                    <img src="https://scontent.fceb1-3.fna.fbcdn.net/v/t39.30808-6/296121973_105438375606413_2731520513494494196_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeGlgBGbbFEr_ax6yAxRWFJ9hsGHgpoeWZWGwYeCmh5ZlfBPNqasf9WwZZvSaoCwJRyzQYoLT49wEZ7C6sjRbyDA&_nc_ohc=Qqid18CbjEgAX8RH5ut&_nc_oc=AQmCfLTSiBsORHVZfErjMe-UPZpxSKb7wys7T0gdfFkmqMGQrFVsq208TGAUzSh1pPg&_nc_ht=scontent.fceb1-3.fna&oh=00_AfATIJfxC15DOYMfimupU4TDP90T7QllGeOBsT3de-cZgw&oe=6474B777" alt="Slide 2" class="w-100 blurry-image">
                </div>
                <div class="carousel-item">
                    <img src="https://scontent.fceb1-1.fna.fbcdn.net/v/t39.30808-6/303058293_120378667445717_2586531993960585912_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=8bfeb9&_nc_eui2=AeEFXr0pTGCI8ncASBxxt0FX4G1YptmcUTrgbVim2ZxROkhG16WW-521yc0v1feqlLbsRXwsDj2pphm7G83PG64I&_nc_ohc=T2aOF2jkcGIAX-Xgx_E&_nc_ht=scontent.fceb1-1.fna&oh=00_AfAUHTGr8NND5ZS7KkKf29mktcch9HparcTegwtRZlHQAQ&oe=64735E12" alt="Slide 3" class="w-100 blurry-image">
                </div>
            </div>
        </div>

        <div class="container-fluid ">
            <div class="row h-100 align-items-center">
                <div class="col">
                    <div class="px-5 py-5">
                        <div class="px-2 py-2">
                            <h4>Every single man and woman all over the world experiencing Christ.</h4>
                            <p class="description">"We heard about God's love and His undying love for us. God's love creates, saves and sustains.
                                 He is the Father you have been looking for.He continues to touch the hearts of many.
                                  No matter what we have done, the Lord continues to love us, His love will never change 
                                In photos, the CLP Participants with the SFC Service team together in experiencing God's love"</p>
                        </div>
                        <div class="px-2 py-2">
                            <button type="button" class="btn btn-outline-primary">Contact Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>
<div class="container bg-light rounded p-4" id="events">
    <div class="row">
        <div class="col-md-12">
         @yield('group-content')
         @yield('Eventcontent')
        </div>
    </div>
</div>
<hr class="hr">
<!-- Hero section with background image 
<section id="about">
    <div class="container bg-light rounded p-4">
        <div class="row">
            <div class="col-md-12">
                <div class="sec-title text-center">
                    <span class="title">About Us</span>
                    <h2>We unite for we are christians since 2015</h2>
                </div>
                <p>
                    ABOUT US
                    CFC Singles for Christ (SFC) is one of the family ministries of Couples for Christ (CFC). 
                    It was founded to cater to the needs of single men and women from 21 to 40 years of age. 
                    “Single” refers to anyone within that age group who is free from any legal impediments to marriage. 
                    The pastoral care offered by the ministry, though, is not limited to those who are called for marriage,
                     but includes as well those who may be considering either single blessedness or religious vocation as a state of life.
                </p>
                <p>
                    This year, we are celebrating SFC’s 30th International Conference (ICON),
                     entitled, “BREAKTHROUGH”. Anchored on the verse from Mark 2:10-11 NABRE, 
                     " “But that you may know that the Son of Man has authority to forgive sins on earth," 
                     he said to the paralytic, "I say to you, rise, pick up your mat, and go home." "
                </p>
                    
            </div>
            <div class="col-md-12 text-center">
                <div class="small-button-container text-center">
                    <button class="btn btn-primary btn-sm">Read More</button>
                </div>
            </div>
        </div>
    </div>
</section>
<br>
<footer class="bg-light text-center text-white">
    <!-- Grid container 
    <div class="container p-4 pb-0">
      <!-- Section: Social media 
      <section class="mb-4">
        <!-- Facebook 
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #3b5998;"
          href="https://www.facebook.com/SFCHilongosChapter"
          role="button"
          ><i class="fab fa-facebook-f"></i
        ></a>
  
        <!-- Twitter 
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #55acee;"
          href="#!"
          role="button"
          ><i class="fab fa-twitter"></i
        ></a>
  
        <!-- Google 
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #dd4b39;"
          href="#!"
          role="button"
          ><i class="fab fa-google"></i
        ></a>
  
        <!-- Instagram 
        <a
          class="btn text-white btn-floating m-1"
          style="background-color: #ac2bac;"
          href="#!"
          role="button"
          ><i class="fab fa-instagram"></i
        ></a>
      </section>
      <!-- Section: Social media 
    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        &copy; 2023 SFC_CFC Event System. All rights reserved.
    </div>

  </footer>
  -->
@endsection

