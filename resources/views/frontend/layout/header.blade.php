<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{url('/')}}" class="logo d-flex align-items-center">
       <img src="{{asset('frontend/assets/img/logo.png')}}" alt="">
        <h1>Online Movie Ticketing<span></span></h1>
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a href="{{route('login')}}">Login</a></li>
        </ul>
      </nav><!-- .navbar -->
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header>
