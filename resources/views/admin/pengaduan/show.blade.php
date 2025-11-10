<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-white">Detail Pengaduan Mahasiswa</h4>
                <a href="{{ url('admin/pengaduan-mahasiswa') }}" class="btn btn-light btn-sm">
                    <i class="ti ti-arrow-left"></i> Kembali
                </a>
            </div>

            <div class="card-body">
                {{-- Informasi Laporan --}}
                <div class="mb-4">
                    <h5 class="fw-bold mb-3">Informasi Pengaduan</h5>
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <tr>
                                <th class="text-start" style="width: 200px;">Nama Pelapor</th>
                                <td>: {{ $pengaduan->mahasiswa->nama_mahasiswa ?? '-' }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Judul Laporan</th>
                                <td>: {{ $pengaduan->judul_pengaduan }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Tanggal Melapor</th>
                                <td>: {{ $pengaduan->created_at->format('H:i, d-m-Y') }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Status</th>
                                <td>:
                                    @if ($pengaduan->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($pengaduan->status == 'Diproses')
                                        <span class="badge bg-primary">Diproses</span>
                                    @elseif ($pengaduan->status == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                {{-- Isi Laporan --}}
                <div class="mb-4">
                    <h5 class="fw-bold mb-2">Isi Laporan</h5>
                    <div class="border rounded p-3 bg-light">
                        {{ strip_tags($pengaduan->deskripsi) }}
                    </div>
                </div>

                {{-- Tanggapan --}}
                <div class="mb-4">
                    <h5 class="fw-bold mb-2">Tanggapan Admin</h5>
                    @if ($pengaduan->tanggapan)
                        <div class="border rounded p-3 bg-light">
                            {{ $pengaduan->tanggapan }}
                        </div>
                    @else
                        <p class="text-muted fst-italic">Belum ada tanggapan dari admin.</p>
                    @endif
                </div>

                <hr>
            </div>
        </div>
    </div>
</x-admin>
