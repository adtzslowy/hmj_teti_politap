<header class="app-header">
    <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
                <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                    <i class="ti ti-menu-2"></i>
                </a>
            </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
                <li class="nav-item dropdown d-flex align-items-center">
                    <span class="fw-semibold">
                        @if (Auth::check() && Auth::user()->role === 'GOD')
                            <span class="badge bg-success fw-bold me-2">
                                GOD MODE
                            </span>
                        @endif
                        {{ Auth::user()->name }}
                    </span>

                    <a class="nav-link nav-icon" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img src="{{ url('storage/' . Auth::user()->foto_profil) }}" alt="" width="50"
                            height="50" class="rounded-circle">
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                        <div class="message-body">
                            <a href="{{ url('admin/profile') }}" class="d-flex align-items-center gap-2 dropdown-item">
                                <i class="ti ti-user fs-6"></i>
                                <p class="mb-0 fs-3">My Profile</p>
                            </a>
                            <a href="{{ url('logout') }}" class="btn btn-outline-danger mx-3 mt-2 d-block justify-content-center">
                                <i class="ti ti-power fs-3"></i> Logout
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>
