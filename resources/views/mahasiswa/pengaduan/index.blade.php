<x-mahasiswa>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ url('mahasiswa/pengaduan-anggota/create') }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Buat Pengaduan
                </a>
            </div>

            <div class="card px-3 py-3 table table-responsive text-center overflow-auto">
                <table class="table table-borderless align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul Pengaduan</th>
                            <th>Isi Pengaduan</th>
                            <th>Status</th>
                            <th>Tanggapan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengaduan as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->judul_pengaduan }}</td>
                                <td>{{ Str::limit($item->isi_pengaduan, 50) }}</td>
                                <td>
                                    @if ($item->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($item->status == 'Diproses')
                                        <span class="badge bg-primary text-dark">Diproses</span>
                                    @elseif ($item->status == 'Selesai')
                                        <span class="badge bg-success text-dark">Selesai</span>
                                    @endif
                                </td>
                                <td>{{ $item->tanggapan ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada data pengaduan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mahasiswa>
