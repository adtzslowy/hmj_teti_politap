<x-admin>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ url('admin/prodi/create') }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Tambah Prodi
                </a>
            </div>
            <div class="card px-3 py-3 table table-responsive text-center overflow-auto">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Koordinator Program Studi</th>
                            <th>Program Studi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prodi as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex justify-content-center flex-wrap gap-1">
                                    <a href="{{ url('admin/prodi/edit/' . $p['id']) }}" class="btn btn-sm btn-warning">
                                        <i class="ti ti-edit fs-3"></i>
                                    </a>
                                    <form action="{{ url('admin/prodi/delete/' . $p['id']) }}" method="POST" class="d-inline delete-form">
                                        <button class="btn btn-sm btn-danger delete-btn" type="button">
                                            <i class="ti ti-trash fs-3"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $p->kaprodi }}</td>
                                <td>{{ $p->nama_prodi }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center fw-bold">Tidak ada program studi.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>
