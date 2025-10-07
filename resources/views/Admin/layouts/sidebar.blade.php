<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    @if (Auth::user()->role == 'admin')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SPK</div>
        </a>
    @elseif(Auth::user()->role == 'user')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('user') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SPK</div>
        </a>
    @endif

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        @if (Auth::user()->role == 'admin')
            <a class="nav-link" href="{{ route('admin') }}">
                <i class="fas fa-fw fa-user-shield"></i>
                <span>Admin Panel</span>
            </a>
        @elseif(Auth::user()->role == 'user')
            <a class="nav-link" href="{{ route('user') }}">
                <i class="fas fa-fw fa-user"></i>
                <span>User Dashboard</span>
            </a>
        @endif
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (auth()->check())
        @if (auth()->user()->role == 'admin')
            <!-- Nav Item - Pages Collapse Menu -->
            <div class="sidebar-heading">
                Master Data
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('kriteria.index') }}">
                    <i class="fas fa-fw fa-cube"></i>
                    <span>Data Kriteria</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-cubes"></i>
                    <span>Data Sub Kriteria</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Data Alternatif</span></a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Data Penilaian</span></a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-calculator"></i>
                    <span>Data Perhitungan</span></a>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Data Hasil Akhir</span></a>
            </li> --}}

            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Master Data User
            </div>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-users-cog"></i>
                    <span>Data User</span></a>
            </li>
            {{-- 
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data Profile</span></a>
            </li> --}}
        @endif
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-edit"></i>
                <span>Data Penilaian</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Data Hasil Akhir</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-user"></i>
                <span>Data Profile</span></a>
        </li>

    @endif

    <!-- Nav Item - Utilities Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
