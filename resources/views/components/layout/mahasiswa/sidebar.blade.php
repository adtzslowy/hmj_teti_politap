<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between mt-2">
            <a href="{{ url('/mahasiswa') }}" class="text-nowrap logo-img">
                <img src="{{ url('source') }}/assets/images/logo.png" width="230" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('mahasiswa')) active @endif" href="{{ url('mahasiswa') }}"
                        aria-expanded="false">
                        <span>
                            <i class="ti ti-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">MENU</span>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('mahasiswa/pendaftaran-anggota') }}" class="sidebar-link @if (request()->is('mahasiswa/pendaftaran-anggota*')) active @endif" aria-expanded="false">
                        <span>
                            <i class="ti ti-receipt"></i>
                        </span>
                        <span class="hide-menu">Pendaftaran</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ url('mahasiswa/pengaduan-anggota') }}" class="sidebar-link @if (request()->is('mahasiswa/pendaftaran-anggota*')) active @endif" aria-expanded="false">
                        <span>
                            <i class="ti ti-receipt"></i>
                        </span>
                        <span class="hide-menu">Pengaduan</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
