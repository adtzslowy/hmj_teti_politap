<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between mt-2">
            <a href="{{ url('/admin') }}" class="text-nowrap logo-img">
                <img src="{{ url('source') }}/assets/images/logo.png" width="220" alt="" />
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
                    <a class="sidebar-link @if (request()->is('admin')) active @endif" href="{{ url('admin') }}"
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
                    <a href="{{ url('admin/divisi') }}"
                        class="sidebar-link @if (request()->is('admin/divisi*')) active @endif" aria-expanded="false">
                        <span>
                            <i class="ti ti-podium"></i>
                        </span>
                        <span class="hide-menu">Divisi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/mahasiswa*')) active @endif"
                        href="{{ url('admin/mahasiswa') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-user"></i>
                        </span>
                        <span class="hide-menu">Mahasiswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/anggota*')) active @endif"
                        href="{{ url('admin/anggota') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-users"></i>
                        </span>
                        <span class="hide-menu">Anggota</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/berita*')) active @endif"
                        href="{{ url('admin/berita') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-news"></i>
                        </span>
                        <span class="hide-menu">Berita</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/pendaftar*')) active @endif"
                        href="{{ url('admin/pendaftar') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list-check"></i>
                        </span>
                        <span class="hide-menu">Pendaftaran Anggota</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/arsip*')) active @endif"
                        href="{{ url('admin/arsip') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-brand-google-drive"></i>
                        </span>
                        <span class="hide-menu">Arsip</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/pengaduan-mahasiswa*')) active @endif"
                        href="{{ url('admin/pengaduan-mahasiswa') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layers-linked"></i>
                        </span>
                        <span class="hide-menu">Aduan Mahasiswa</span>
                    </a>
                </li>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">GOD MODE FEATURE</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/tambah-admin*')) active @endif" href="{{ url('admin/tambah-admin') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-crown"></i>
                        </span>
                        <span class="hide-menu">Operator</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/prodi*')) active @endif" href="{{ url('admin/prodi') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-pin"></i>
                        </span>
                        <span class="hide-menu">Program Studi</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link @if (request()->is('admin/impersonate*')) active @endif" href="{{ url('admin/impersonate') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-login"></i>
                        </span>
                        <span class="hide-menu">Take Over</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
