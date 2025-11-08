<x-admin>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ url('admin/divisi/create') }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Tambah Divisi
                </a>
            </div>

            <div class="card px-3 py-3 table table-responsive text-center overflow-auto">
                <table class="table table-bordered align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Status Pendaftaran</th>
                            <th>Divisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($divisi as $d)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex justify-content-center flex-wrap gap-1">
                                    <form action="{{ route('divisi.toggle', $d->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        <button type="submit"
                                            class="btn btn-sm {{ $d->is_open ? 'btn-warning' : 'btn-success' }}">
                                            {{ $d->is_open ? 'Tutup Pendaftaran' : 'Buka Pendaftaran' }}
                                        </button>
                                    </form>

                                    <a href="{{ url('admin/divisi/edit/' . $d->id) }}" class="btn btn-warning btn-sm">
                                        <i class="ti ti-edit fs-3"></i>
                                    </a>

                                    <form action="{{ url('admin/divisi/delete/' . $d->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="ti ti-trash fs-3"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>
                                    @if ($d->is_open)
                                        <span class="badge bg-success">Dibuka</span>
                                    @else
                                        <span class="badge bg-danger">Ditutup</span>
                                    @endif
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
