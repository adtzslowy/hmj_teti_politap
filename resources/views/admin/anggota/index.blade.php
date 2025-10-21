<x-admin>
    <div class="container-fluid">
        <div class="row d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ url('admin/anggota/create') }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Tambah
                </a>
            </div>
        </div>

        <div class="mb-3">
            <form action="{{ url('admin/anggota/') }}" method="GET" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control" placeholder="Masukkan Nama Angota!" value="{{ request('search') }}" >
                    <button type="submit" class="btn btn-dark">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="card px-3 table table-responsive text-center overflow-auto">
            <table class="table table-borderless align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Anggota</th>
                        <th>Jabatan</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($anggota as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="d-flex justify-content-center flex-wrap gap-1">
                                <a href="{{ url('admin/anggota/show/' . $item->id) }}" class="btn btn-info btn-sm">
                                    <i class="fs-3 ti ti-eye"></i>
                                </a>

                                <a href="{{ url('admin/anggota/edit/' . $item->id) }}" class="btn btn-warning btn-sm text-black">
                                    <i class="fs-3 ti ti-edit"></i>
                                </a>
                                <form action="{{ url('admin/anggota/delete/' . $item->id) }}" class="d-inline delete-form" method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm" type="submit">
                                        <i class="fs-3 ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                            <td>{{ $item->jabatan->nama_jabatan }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center fw-bold">
                                Anggota tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mb-3">
                <div class="mb-2 mb-md-0">
                    <span>Menampilkan {{ $anggota->firstItem() ?? 0}} sampai {{ $anggota->lastItem() ?? 0 }} dari {{ $anggota->total() ?? 0 }}</span>
                </div>
                <div>
                    {{ $anggota->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</x-admin>
