<x-admin>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ url("admin/berita/create") }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Tambah
                </a>
            </div>

            <div class="mb-3">
                <form action="{{ url('admin/berita/') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari judul berita!" value="{{ request('search') }}">
                        <button class="btn btn-dark" type="submit">
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="card px-3 py-3 table table-responsive text-center overflow-auto">
                <table class="table table-borderless align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Judul Berita</th>
                            <th>Deskripsi</th>
                            <th>Tanggal Post</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($berita as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex justify-content-center flex-wrap gap-1">
                                    <a href="{{ url("admin/berita/show/" . $item->id) }}" class="btn btn-info btn-sm">
                                        <i class="fs-3 ti ti-eye"></i>
                                    </a>
                                    <a href="{{ url('admin/berita/edit/' . $item->id) }}" class="btn btn-warning btn-sm text-black">
                                        <i class="fs-3 ti ti-edit"></i>
                                    </a>
                                    <form action="{{ url('admin/berita/delete/' . $item->id) }}" class="d-inline" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="fs-3 ti ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td class="text-justify text-truncate" style="max-width: 200px;">{{ $item->judul }}</td>
                                <td class="text-justify text-truncate" style="max-width: 400px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ strip_tags($item->deskripsi) }}
                                </td>
                                <td>{{ $item->tanggal_post }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center fw-bold">
                                    Tidak ada berita terbaru.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-3 mb-3">
                    <div class="mb-2 mb-md-0">
                        <span>
                            Menampilkan {{ $berita->firstItem() ?? 0 }} sampai {{ $berita->lastItem() ?? 0 }} dari {{ $berita->total() ?? 0}} data
                        </span>
                    </div>
                    <div>
                        {{ $berita->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
