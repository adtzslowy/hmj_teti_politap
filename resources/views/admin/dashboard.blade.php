<x-admin>
    <div class="row">
        <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                        <div class="mb-3 mb-sm-0">
                            <h5 class="card-title fw-semibold">Login Mahasiswa 7 Hari Terakhir</h5>
                        </div>
                        <div>
                            <select id="filterRange" class="form-control" disabled>
                                <option value="7">7 Hari Terakhir</option>
                                <option value="30">1 Bulan Terakhir</option>
                                <option value="365">1 Tahun Terakhir</option>
                            </select>
                        </div>
                    </div>
                    <div id="chart"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Yearly Breakup -->
                    <div class="card bg-dark text-white  overflow-hidden">
                        <div class="card-body p-4">

                            <!-- Title -->
                            <h2 class="card-title fw-semibold mb-3 text-white">Total Mahasiswa</h2>

                            <!-- Total Angka -->
                            <h1 class="fw-bold display-5 text-white mb-4">{{ $totalMahasiswa }}</h1>

                            <!-- Keterangan -->
                            <div class="d-flex align-items-center">
                                <span
                                    class="me-2 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                                    <i class="ti ti-arrow-right text-success"></i>
                                </span>
                                <span class="fs-5">Total mahasiswa terdaftar</span>
                            </div>

                        </div>
                    </div>


                </div>
                <div class="col-lg-12">
                    <!-- Monthly Earnings -->
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="row alig n-items-start">
                                <div class="col-12">
                                    <h2 class="card-title mb-9 fw-semibold"> Aduan Mahasiswa </h2>
                                    <h1 class="fw-semibold display-5 mb-3">{{ $aduanMahasiswa }}</h1>
                                    <div class="d-flex align-items-center pb-1">
                                        <span
                                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-arrow-right text-dark"></i>
                                        </span>
                                        <p class="fs-3 mb-0">Total Aduan Mahasiswa</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="earning"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <div class="mb-4">
                        <h5 class="card-title fw-semibold">Recent Activity</h5>
                    </div>
                    <ul class="timeline-widget mb-0 position-relative mb-n5">
                        @foreach ($recentActivity as $activity)
                            <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">
                                    {{ \Carbon\Carbon::parse($activity->logged_in_at)->setTimezone('Asia/Jakarta')->format('H:i') }}
                                </div>

                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                    <span
                                        class="timeline-badge border-2 border
                    @if ($activity->user_type === 'admin') border-primary
                    @elseif($activity->user_type === 'operator') border-info
                    @else border-success @endif
                    flex-shrink-0 my-8"></span>

                                    <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>

                                <div class="timeline-desc fs-3 text-dark mt-n1">
                                    {{ $activity->user_type }} login
                                    <div class="fw-semibold">
                                        {{ $activity->ip_address ?? 'Unknown IP' }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
        <div class="col-lg-8 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Daftar Aduan Mahasiswa</h5>
                    <div class="table-responsive">
                        <table class="table table-bordered text-nowrap mb-0 align-middle">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama/NIM</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Judul Aduan</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Priority</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Waktu</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($recentAduan as $aduan)
                                    <tr>
                                        <td class="border-bottom-0">
                                            {{ $loop->iteration }}
                                        </td>

                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-1">
                                                {{ $aduan->mahasiswa->nama_mahasiswa ?? 'Tidak diketahui' }}
                                            </h6>
                                            <span class="fw-normal text-muted">
                                                {{ $aduan->mahasiswa->nim ?? '-' }}
                                            </span>
                                        </td>

                                        <td class="border-bottom-0">
                                            <p class="mb-0 fw-normal">
                                                {{ \Illuminate\Support\Str::limit($aduan->judul_pengaduan, 10) }}
                                            </p>
                                        </td>

                                        <td class="border-bottom-0">
                                            <div class="d-flex align-items-center gap-2">
                                                <span
                                                    class="badge
                        @if ($aduan->status == 'Pending') bg-warning
                        @elseif($aduan->status == 'Diproses') bg-info
                        @elseif($aduan->status == 'Selesai') bg-success
                        @else bg-secondary @endif
                        rounded fw-semibold">
                                                    {{ ucfirst($aduan->status) }}
                                                </span>
                                            </div>
                                        </td>

                                        <td class="border-bottom-0">
                                            <h6 class="fw-semibold mb-0 fs-4">
                                                {{ $aduan->created_at->diffForHumans() }}
                                            </h6>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="bg-light card">

    </footer>

    <script>
        window.dashboardData = {
            labels: @json($labels ?? []),
            data: @json($data ?? [])
        }

        const dashboardValue = {
            labels: @json($aduanLabels),
            data: @json($aduanData)
        }
    </script>
</x-admin>
