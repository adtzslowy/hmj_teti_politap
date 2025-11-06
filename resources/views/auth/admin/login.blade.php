<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Himpunan Mahasiswa Jurusan</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ url('source') }}/assets/images/logos/favicon.png" />

    <!-- Bootstrap & Custom Styles -->
    <link rel="stylesheet" href="{{ url('source') }}/assets/css/styles.min.css" />
</head>

<body>
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">

                        <div class="card mb-0 shadow-sm border-0 rounded-3">
                            <div class="card-body">

                                <!-- Logo -->
                                <a href="{{ url('/') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ url('source') }}/assets/images/logo.png" width="280" alt="Logo">
                                </a>

                                <!-- Login Form -->
                                <form action="{{ url('auth/login/admin') }}" method="POST">
                                    @csrf
                                    @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                            <button type="button" class="btn-close" aria-label="close"></button>
                                        </div>
                                    @endif
                                    @if (session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            {{ session('error') }}
                                            <button type="button" class="btn-close" aria-label="close"></button>
                                        </div>
                                    @endif
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter your email">
                                    </div>

                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Enter your password">
                                    </div>

                                    <div class="d-flex align-items-center justify-content-between mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input bg-dark" type="checkbox" id="remember"
                                                checked>
                                            <label class="form-check-label text-dark" for="remember">
                                                Remember this Device
                                            </label>
                                        </div>
                                    </div>

                                    <!-- Sign In Button -->
                                    <button type="submit" class="btn btn-dark w-100 py-2 fs-5 mb-4 rounded-2">
                                        Sign In
                                    </button>
                                </form>
                                <div class="d-flex justify-content-center">
                                    <span class="text-black text-center">
                                        Anda mahasiswa? <a href="{{ url('auth/login/mahasiswa') }}">Klik disini</a>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ url('source') }}/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="{{ url('source') }}/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
