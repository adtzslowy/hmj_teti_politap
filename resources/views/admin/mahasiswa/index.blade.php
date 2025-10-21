<x-admin>
    <div class="container-fluid">

        <!-- Form Tambah & Import -->
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-2 mb-2">
                <a href="{{ url('admin/mahasiswa/create') }}" class="btn btn-dark w-100 w-md-40">
                    <i class="ti ti-plus"></i> Tambah
                </a>
            </div>

            <div class="col-12 col-md-4 mb-2">
                <div class="d-flex flex-column flex-md-row justify-content-md-end align-items-stretch gap-2">
                    <form action="{{ url('admin/mahasiswa/import') }}" method="POST" enctype="multipart/form-data"
                        id="importForm">
                        @csrf
                        <input type="file" name="file" id="importInput" class="d-none" accept=".xlsx,.xls,.csv">
                        <button type="button" class="btn btn-dark w-100 w-md-auto" id="importBtn">
                            <i class="ti ti-upload"></i> Import
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Form Search -->
        <div class="mb-3">
            <form method="GET" action="{{ url('admin/mahasiswa') }}" id="searchForm">
                <div class="input-group">
                    <input type="text" name="search" id="searchInput" class="form-control"
                        placeholder="Masukkan Nomor Induk Mahasiswa..." value="{{ request('search') }}">
                    <button class="btn btn-dark" type="submit">
                        <i class="ti ti-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Table -->
        <div class="card px-3 py-3 table-responsive text-center overflow-auto">
            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Aksi</th>
                        <th>Nama Mahasiswa</th>
                        <th>NIM</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($mahasiswa as $index => $m)
                        <tr>
                            <td>{{ $mahasiswa->firstItem() + $index }}</td>
                            <td class="d-flex justify-content-center flex-wrap gap-1">
                                <a href="{{ url('admin/mahasiswa/show/' . $m->id) }}" class="btn btn-info btn-sm"
                                    title="Detail">
                                    <i class="ti ti-eye"></i>
                                </a>
                                <a href="{{ url('admin/mahasiswa/edit/' . $m->id) }}"
                                    class="btn btn-warning btn-sm text-white" title="Edit">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <form action="{{ url('admin/mahasiswa/delete/' . $m->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <td>{{ $m->nama_mahasiswa }}</td>
                            <td>{{ $m->nim }}</td>
                            <td>
                                <span
                                    class="badge {{ $m->status_mahasiswa === 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                    {{ ucfirst($m->status_mahasiswa) }}
                                </span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center fw-bold">
                                Data tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 mb-3">
                <div class="mb-2 mb-md-0">
                    <span>
                        Menampilkan {{ $mahasiswa->firstItem() ?? 0 }} sampai {{ $mahasiswa->lastItem() ?? 0 }} dari
                        {{ $mahasiswa->total() ?? 0 }} data
                    </span>
                </div>
                <div>
                    {{ $mahasiswa->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>

        <script>
            document.getElementById('importBtn').addEventListener('click', function() {
                Swal.fire({
                    title: 'Import Data Mahasiswa',
                    text: 'Pilih file Excel/CSV untuk diimpor.',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonText: 'Pilih File',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('importInput').click();
                    }
                });
            });

            document.getElementById('importInput').addEventListener('change', function() {
                if (this.files.length > 0) {
                    Swal.fire({
                        title: 'Sedang mengimpor...',
                        text: 'Mohon tunggu beberapa saat.',
                        icon: 'info',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                    document.getElementById('importForm').submit();
                }
            });

            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: 'Apakah anda yakin?',
                        text: "Data mahasiswa akan dihapus secara permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });

            // Search debounce
            const searchInput = document.getElementById('searchInput');
            const searchForm = document.getElementById('searchForm');
            let debounceTimeout;

            searchInput.addEventListener('input', () => {
                clearTimeout(debounceTimeout);
                debounceTimeout = setTimeout(() => {
                    searchForm.submit();
                }, 500);
            });
        </script>

    </div>
</x-admin>
