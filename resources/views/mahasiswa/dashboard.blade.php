<x-mahasiswa>
    <div class="row mb-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 bg-light text-dark">
                <div class="card-body p-4 d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div>
                        <h3 class="fw-bold mb-1">
                            👋 Selamat Datang, {{ Auth::user()->nama_mahasiswa ?? 'Mahasiswa' }}!
                        </h3>
                        <p class="mb-0 text-dark opacity-75">
                            Semoga harimu menyenangkan dan produktif hari ini.
                        </p>
                    </div>
                    <div class="mt-3 mt-md-0 text-center text-md-end">
                        <span class="badge bg-success fs-6 py-2 px-3 shadow-sm rounded text-dark">
                            {{ now()->timezone('Asia/Jakarta')->translatedFormat('l, d F Y') }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Card Time & Login Activity --}}
    <div class="row d-flex justify-content-center">
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 border-0 shadow-sm rounded-4">
                <div
                    class="card-body p-5 d-flex flex-column justify-content-center align-items-center bg-success rounded-4">
                    <h5 class="fw-semibold text-uppercase text-dark mb-3" style="letter-spacing: 1px;">
                        🕒 Recent Time
                    </h5>

                    <div class="bg-dark shadow-sm rounded-4 py-3 px-4 mb-3" style="min-width: 200px;">
                        <h1 id="clock" class="fw-bold display-5 mb-0 text-white"></h1>
                    </div>

                    <p id="date" class="text-dark mb-1 fs-5"></p>
                    <h5 id="greeting" class="fw-semibold mt-2 text-dark"></h5>
                </div>
            </div>
        </div>

        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100 border-0 shadow-sm bg-success text-dark rounded-3">
                <div class="card-body p-4 text-center">
                    <div class="mb-3">
                        <h5 class="fw-semibold text-uppercase text-dark">Login Activity</h5>
                    </div>

                    @if ($statusLogin)
                        <div class="d-flex flex-column align-items-center mb-3">
                            <div class="rounded-circle bg-dark p-3 mb-3">
                                <i class="ti ti-user-check text-success display-5"></i>
                            </div>
                            <h4 class="fw-bold text-dark mb-1">Online</h4>
                            <p class="text-dark mb-1 small">Terakhir login:</p>
                            <p class="fw-semibold mb-0">
                                {{ \Carbon\Carbon::parse($statusLogin->logged_in_at)->timezone('Asia/Jakarta')->translatedFormat('d F Y, H:i') }}
                            </p>
                            <p class="text-muted small mb-0">IP: {{ $statusLogin->ip_address }}</p>
                        </div>
                    @else
                        <div class="d-flex flex-column align-items-center mb-3">
                            <div class="rounded-circle bg-secondary bg-opacity-25 p-3 mb-3">
                                <i class="ti ti-user-x text-secondary display-5"></i>
                            </div>
                            <h4 class="fw-bold text-secondary mb-1">Offline</h4>
                            <p class="text-muted">Belum ada aktivitas login.</p>
                        </div>
                    @endif

                    <div class="mt-2">
                        <span class="badge bg-dark px-3 py-2">
                            {{ $statusLogin ? 'Active Session' : 'No Active Session' }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function updateTime() {
            const now = new Date();
            const hours = now.getHours();
            let greeting = "Selamat Malam 🌙";

            if (hours < 12) greeting = "Selamat Pagi 🌤️";
            else if (hours < 15) greeting = "Selamat Siang ☀️";
            else if (hours < 18) greeting = "Selamat Sore 🌇";

            document.getElementById("clock").textContent = now.toLocaleTimeString("id-ID", {
                hour: "2-digit",
                minute: "2-digit",
                second: "2-digit",
                hour12: false
            });

            document.getElementById("date").textContent = now.toLocaleDateString("id-ID", {
                weekday: "long",
                year: "numeric",
                month: "long",
                day: "numeric"
            });

            document.getElementById("greeting").textContent = greeting;
        }

        setInterval(updateTime, 1000);
        updateTime();
    </script>
</x-mahasiswa>
