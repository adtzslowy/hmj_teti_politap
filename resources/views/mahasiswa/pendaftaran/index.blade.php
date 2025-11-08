<x-mahasiswa>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                @if (!$sudahDaftar && $pendaftaranDibuka)
                    <a href="{{ url('mahasiswa/pendaftaran-anggota/create') }}" class="btn btn-dark">
                        <i class="ti ti-plus"></i> Daftar Keanggotaan
                    </a>
                @elseif ($sudahDaftar)
                    <button class="btn btn-dark" disabled>
                        <i class="ti ti-lock"></i> Kamu sudah mendaftar
                    </button>
                @elseif (!$pendaftaranDibuka)
                    <button class="btn btn-dark" disabled>
                        <i class="ti ti-clock"></i> Pendaftaran belum dibuka
                    </button>
                @endif
            </div>

            <div class="card px-3 py-3 table table-responsive text-center overflow-auto">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Divisi Dipilih</th>
                            <th>Divisi Terpilih</th>
                            <th>Status</th>
                            <th>Alasan Ditolak</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pendaftaran as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->divisiDipilih->nama_divisi ?? '-' }}</td>
                                <td>{{ $item->divisiDitempatkan->nama_divisi ?? '-' }}</td>
                                <td>
                                    @if ($item->status_pendaftaran == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($item->status_pendaftaran == 'Approved')
                                        <span class="badge bg-success text-dark">Approved</span>
                                    @else
                                        <span class="badge bg-danger text-dark">Decline</span>
                                    @endif
                                </td>
                                <td>{{ $item->alasan_ditolak ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td class="justify-content-center fw-italic" colspan="7">
                                    Data Tidak Ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mahasiswa>
