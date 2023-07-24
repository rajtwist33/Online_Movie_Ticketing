<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-block">
            <span style="font-size: 140%;margin-left:10px; color:green; font-weight:500;" id="nepali_date"></span>
        </li>
        <li class="nav-item ">
            <span id="clock"></span>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto" style="font-size: 20px;">

        <li class="nav-item mr-3">
            <a class="nav-link btn btn-outline-success text-dark " data-widget="fullscreen" href="#"
                role="button">
                <i class="bi bi-arrows-angle-expand "></i>
            </a>
        </li>

        <li class="nav-item mr-3">
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button class=" btn btn-danger text-light" type="submit" role="button">
                    <i class="bi bi-box-arrow-left "></i> Logout
                </button>
            </form>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('home.index')}}" class="brand-link">
        <img src="{{ asset('backend/logo/logo.png') }}" alt="Bross Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Admin</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/avatar/avatar.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('home.index')}}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{route('manage_movie.index')}}" class="nav-link {{ request()->is('admin/manage_movie*') ? 'active' : '' }}">
                        <i class="bi bi-person-fill-add m-3" style="font-size:130%; color:orange"></i>
                        <p>
                            Manage Movie
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('paymment_check.index')}}"
                        class="nav-link {{ request()->is('admin/paymment_check*') ? 'active' : '' }}">
                        <i class="bi bi-gear m-3" style="font-size:130%; color:orange"></i>
                        <p>
                            Payment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link {{ request()->is('changepassword*') ? 'active' : '' }}">
                        <i class="bi bi-gear m-3" style="font-size:130%; color:orange"></i>
                        <p>
                            Setting
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</aside>
