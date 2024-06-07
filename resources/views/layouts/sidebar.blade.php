<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hello {{Auth::user()->name}}</a>
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
                     <li class="nav-item menu-open">
                <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i> <!-- Ikon dashboard -->
                    <p>
                        Dashboard
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
            <ul class="nav nav-treeview">
                
            <li class="nav-item has-treeview">
                <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-graduation-cap"></i> <!-- Ikon Manajemen User -->
                    <p>
                    Beasiswa
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-pen"></i> <!-- Ikon Manajemen User -->
                            <p>
                                Admin
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        
                <ul class="nav nav-treeview">
                <li class="nav-item" style="padding-left: 20px;"> <!-- Menambahkan padding kiri -->
                                <a href="{{ route('user-create') }}" class="nav-link">
                                    <i class="nav-icon fas "></i>
                                    <p>Jenis Beasiswa</p>
                                </a>
                            </li>
                        </ul>
                
            </li>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-create') }}" class="nav-link">
                        <i class="nav-icon fas fa-building"></i> <!-- Ikon Add User -->
                        <p>Fakultas</p>
                    </a>
                </li>
                <li class="nav-item">
            <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas  fa-user"></i> <!-- Ikon Manajemen User -->
                <p>Mahasiswa
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
            <li class="nav-item" style="padding-left: 20px;"> <!-- Menambahkan padding kiri -->
                            <a href="{{ route('user-create') }}" class="nav-link">
                                <i class="nav-icon fas "></i>
                                <p>Timeline Beasiswa</p>
                            </a>
                            <a href="{{ route('user-create') }}" class="nav-link">
                                <i class="nav-icon fas "></i>
                                <p>Pendfataran</p>
                            </a>
                            <a href="{{ route('user-create') }}" class="nav-link">
                                <i class="nav-icon fas "></i>
                                <p>History</p>
                            </a>
                        </li>
                    </ul>
            
        </li>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">
                        <i class="nav-icon fas fa-chalkboard-teacher"></i> <!-- Ikon Add Role -->
                        <p>Prodi</p>
                    </a>
                </li>
                
            </ul>
            
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user-cog"></i> <!-- Ikon Manajemen User -->
                <p>
                    Manajemen User
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('user-create') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-plus"></i> <!-- Ikon Add User -->
                        <p>Tambahkan User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('user-rolelist') }}" class="nav-link">
                        <i class="nav-icon fas fa-user-tag"></i> <!-- Ikon Add Role -->
                        <p>Tambahkan Role</p>
                    </a>
                </li>
            </ul>
            
        </li>
    </ul>
</li>
                <li class="nav-item">
                    <form id="logout-form" action="{{route('logout')}}" method="post">
                        @csrf
                    </form>
                    <a href="javascript:void(0)" class="nav-link" onclick="$('#logout-form').submit();">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar-->
</aside>
<!-- Atau jika Anda menggunakan jQuery dari CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    console.log({{Auth::user()}});
    $(document).ready(function(){
        $('a.nav-link').click(function(){
            $('a.nav-link').removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
