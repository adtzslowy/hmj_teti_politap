<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">

            <!-- Header -->
            <div class="card-header bg-light py-3">
                <h3 class="text-dark mb-0 ">
                    Take Over Mahasiswa
                </h3>
            </div>

            <!-- Body -->
            <div class="card-body">

                {{-- Search --}}
                <form method="GET" action="{{ url('admin/impersonate') }}" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                            placeholder="Cari nama atau NIM mahasiswa...">
                        <button class="btn btn-dark">
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </form>

                {{-- Tabel Mahasiswa --}}
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>NIM</th>
                                <th>Prodi</th>
                                <th class="text-center" style="width: 120px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mahasiswa as $mhs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $mhs->nama_mahasiswa }}</td>
                                    <td>{{ $mhs->nim }}</td>
                                    <td>{{ $mhs->prodi_id ?? '-' }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('impersonate.start', $mhs->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-warning btn-sm">
                                                Take Over
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-muted">
                                        Tidak ada data mahasiswa ditemukan.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{-- Pagination --}}
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 mb-3">
                    <div class="mb-2 mb-md-0">
                        <span>
                            Menampilkan {{ $mahasiswa->firstItem() ?? 0 }} sampai {{ $mahasiswa->lastItem() ?? 0 }} dari
                            {{ $mahasiswa->total() ?? 0 }} data
                        </span>
                    </div>
                    <div>
                        {{ $mahasiswa->links('pagination::bootstrap-4') }}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin>
