<x-admin>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ url('admin/divisi/create') }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Tambah
                </a>
            </div>

            <div class="card px-3 py-3 table table-responsive text-center overflow-auto">
                <table class="table table-borderless align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($divisi as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex justify-content-center flex-wrap gap-1">
                                    <a href="{{ url('admin/divisi/show/' . $d->id) }}" class="btn btn-info btn-sm">
                                        <i class="fs-3 ti ti-eye"></i>
                                    </a>

                                    <a href="{{ url('admin/divisi/edit/' . $d->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ti ti-edit fs-3"></i>
                                    </a>

                                    <form action="{{ url('admin/divisi/delete/' . $d->id) }}" method="POST">
                                        @csrf
                                        @method("DELETE")

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="ti ti-trash fs-3"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $d->nama_divisi }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center fw-bold">Tidak ada divisi</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>
