<header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
        <a href="{{ url('/customer/home') }}" class="logo d-flex align-items-center">
            <img src="{{ asset('frontend/assets/img/logo.png') }}" alt="">
            <h1>Online Movie Ticketing<span></span></h1>
        </a>
        <nav id="navbar" class="navbar">
            <ul>
                <li class="dropdown"><a href="#"><i class="bi bi-basket fs-4"> {{ $count }}</i></a>
                    <ul>
                        <div class="container">
                            @foreach ($baskets as $basket)
                                <div class="card mb-2">
                                    <div class="card-body">
                                        <li><label>Movie Name :</label>{{$basket->movie->movie_name}}</li>
                                        <li><label>Total Seat :</label>{{$basket->total_seats}}</li>
                                        <li><label>Paid Amount :</label>{{$basket->amount}}</li>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </ul>
                </li>
                <li><a href="javascript::void(0)"><i class="bi bi-person fs-4 mr-3"></i> {{ Auth::user()->name }}</a>
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class=" btn btn-danger text-light m-4" type="submit" role="button">
                            <i class="bi bi-box-arrow-left "></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </nav><!-- .navbar -->
        <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
        <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
</header>
