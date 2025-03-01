<div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('admin/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            @auth
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            @endauth
            @guest
            <a href="#" class="d-block">Belum login</a>    
            @endguest
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            

            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @auth
                <li class="nav-item">
                    <a href="{{ route('casts.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-theater-masks"></i>
                        <p>
                            Cast
                        </p>
                    </a>
                </li>



                
                
                @endauth
                
                <li class="nav-item">
                    <a href="{{ route('genres.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-secret"></i>
                        <p>
                            Genre
                        </p>
                    </a>
                </li>
            

            <li class="nav-item">
                <a href="{{ route('films.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-video"></i>
                    <p>
                        Film
                    </p>
                </a>
            </li>

            

            
                
            </li>
            <li class="nav-item">
                <a href="../widgets.html" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Table
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('table') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Table</p>
                        </a>
                    

                    <li class="nav-item">
                        <a href="{{ route('data-table') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Data Table</p>
                        </a>
                    </li>

                </ul>
            </li>
            @auth
            <li>
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-block">Logout</button>
                </form>
            </li>
            @endauth
            @guest
                <a href="/login" class="btn btn-info btn-block">Login</a>
            @endguest
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>