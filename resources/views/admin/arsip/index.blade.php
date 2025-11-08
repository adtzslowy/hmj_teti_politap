<x-admin>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            {{-- Tombol tambah hanya untuk admin --}}
            @if(Auth::guard('admin')->check())
                <div class="col-12 mb-2">
                    <a href="{{ url('admin/arsip/create') }}" class="btn btn-dark">
                        <i class="ti ti-plus"></i> Tambah Arsip
                    </a>
                </div>
            @endif

            {{-- Form pencarian --}}
            <div class="mb-3">
                <form action="{{ url('admin/arsip') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari nama dokumen..." value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit"><i class="ti ti-search"></i></button>
                    </div>
                </form>
            </div>

            {{-- Tabel arsip --}}
            <div class="card px-3 py-3 table-responsive text-center">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama Dokumen</th>
                            <th>Deskripsi</th>
                            <th>File</th>
                            <th>Upload Oleh</th>
                            <th>Tanggal Upload</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($arsip as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex justify-content-center flex-wrap gap-1">
                                    <a href="{{ url('admin/arsip/show/' . $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fs-3 ti ti-eye"></i>
                                    </a>

                                    @if(Auth::guard('admin')->check() && Auth::guard('admin')->id() == $item->id_admin)
                                        <a href="{{ url('admin/arsip/edit/' . $item->id) }}" class="btn btn-warning btn-sm text-black">
                                            <i class="fs-3 ti ti-edit"></i>
                                        </a>
                                        <form action="{{ url('admin/arsip/delete/' . $item->id) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm delete-btn" type="button">
                                                <i class="fs-3 ti ti-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                                <td class="text-truncate" style="max-width: 200px;">{{ $item->nama_dokumen }}</td>
                                <td class="text-truncate" style="max-width: 400px; white-space: nowrap; overflow: hidden;">{{ strip_tags($item->deskripsi) }}</td>
                                <td>
                                    @if($item->file)
                                        <a href="{{ asset('storage/arsip/' . $item->file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="ti ti-file"></i> Lihat
                                        </a>
                                    @else
                                        <span class="text-muted">Tidak ada file</span>
                                    @endif
                                </td>
                                <td>{{ $item->admin->name ?? 'Tidak diketahui' }}</td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center fw-bold">Tidak ada arsip ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Pagination --}}
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 mb-3">
                    <div>
                        Menampilkan {{ $arsip->firstItem() ?? 0 }} sampai {{ $arsip->lastItem() ?? 0 }} dari {{ $arsip->total() ?? 0 }} data
                    </div>
                    <div>{{ $arsip->links('pagination::bootstrap-5') }}</div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
