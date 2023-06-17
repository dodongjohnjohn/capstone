 
 @extends('link')

 @php
 $alertClosed = isset($_COOKIE['alert_closed']);
@endphp

<div class="d-flex" id="wrapper">
 <div class="bg-white" id="sidebar-wrapper">
   <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
     <i class="fas fa-user-secret me-2"></i>SFC_CFC
   </div>
   
   @if (!$alertClosed)
   <div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>Welcome, {{ session('user_name') }}! <br> Role: {{ session('user_role') }}</strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" onclick="closeAlert()"></button>
   </div>
 @endif
    
          <div class="list-group list-group-flush my-4 p-2">
              <a href="{{ route('reports')}}"
                  class="list-group-item list-group-item-action bg-transparent second-text fw-bold active"><i
                      class="fas fa-tachometer-alt me-2"></i>
                  Dashboard
              </a>
              <a href="{{ route('members') }}"
                  class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="fa fa-user me-2" aria-hidden="true"></i>
                  Members
              </a>

              <a href="{{ route('event') }}"
                  class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                  <i class="far fa-calendar-alt me-2"></i> Event Announcement
              </a>

              <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                  href="{{ route('attendance') }}">
                  <i class="fa fa-list-alt me-2"></i> Attendance
              </a>

              <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                  href="{{ route('donation.index') }}">
                  <i class="fa fa-hand-holding-usd me-2"></i> Donation
              </a>

              <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
                  href="{{ route('group') }}">
                  <i class="fa fa-users me-2" aria-hidden="true"></i> Groups
              </a>

           
              
          
            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
             href="{{ route('reports')}}">
             <i class="fa fa-bar-chart" aria-hidden="true"></i> Reports
            </a>
            @if (session('user_role') === 'admin')
            <!-- Show the button only if the user's role is 'admin' -->
            <a class="list-group-item list-group-item-action bg-transparent second-text fw-bold"
            href="{{ route('confirm.account') }}">
            <i class="fa fa-check" aria-hidden="true"></i> Account Confirmation
        </a>
        @endif



              <form action="{{ route('logout') }}" method="POST" id="logout-form">
                @csrf
                <a class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"
                onclick="return confirm('Are you sure you want to leave?')" href="{{ route('logout') }}"><i
                    class="fa fa-sign-out" aria-hidden="true"></i>
                    Logout
            </a>
            </form>

             
          </div>
      </div>
      <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent px-3">
            <div class="d-flex align-items-center">
                <i class="fas fa-align-left primary-text fs-4 me-1" id="menu-toggle"></i>
                <h2 class="fs-2 m-0">Dashboard</h2>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link primary-text fw-bold" href="{{ route('profile') }}">
                            <i class="fa fa-user-circle" aria-hidden="true"></i>
                            {{ session('user_name') }}
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
          <div class="row p-4 my-1">
              <div>
                  @yield('viewMembers')
              </div>
              <div>
                  @yield('content')
              </div>
              <div>
                  @yield('menu-content')
              </div>
              <div>
                @yield('scripts')
              </div>
              
          </div>
      </div>
  </div>

  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
  var el = document.getElementById("wrapper");
  var toggleButton = document.getElementById("menu-toggle");

  toggleButton.onclick = function () {
    el.classList.toggle("toggled");
  };

  function closeAlert() {
    // Set a cookie to mark the alert as closed
    document.cookie = "alert_closed=true; path=/;";
  }
</script>
