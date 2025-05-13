<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>

                    {{-- Menu umum, tampil untuk semua role --}}
                    <a class="nav-link" href="{{ url('/') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Landing Page
                    </a>

                    {{-- Menu khusus untuk Admin --}}
                    @if (Auth::user()->role == 'admin')
                        <div class="sb-sidenav-menu-heading">Admin</div>
                        <a class="nav-link" href="{{ url('/admin/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-shield"></i></div>
                            Admin Dashboard
                        </a>
                        <a class="nav-link" href="{{ url('/admin/users') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                            Kelola Pengguna
                        </a>
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                            Profil Saya
                        </a>
                    @endif

                    {{-- Menu khusus untuk Petugas --}}
                    @if (Auth::user()->role == 'petugas')
                        <div class="sb-sidenav-menu-heading">Petugas</div>
                        <a class="nav-link" href="{{ url('/petugas/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user-check"></i></div>
                            Petugas Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                            Profil Saya
                        </a>
                    @endif

                    {{-- Menu khusus untuk User --}}
                    @if (Auth::user()->role == 'user')
                        <div class="sb-sidenav-menu-heading">User</div>
                        <a class="nav-link" href="{{ url('/user/dashboard') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                            User Dashboard
                        </a>
                        <a class="nav-link" href="{{ route('profile.edit') }}">
                            <div class="sb-nav-link-icon"><i class="fas fa-id-badge"></i></div>
                            Profil Saya
                        </a>
                    @endif
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                {{ Auth::user()->name }} ({{ Auth::user()->role }})
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
