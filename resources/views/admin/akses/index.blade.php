<x-admin>
    <div class="container-fluid">
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-12 col-md-12 mb-2">
                <a href="{{ url('admin/tambah-admin/create') }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Tambah
                </a>
            </div>

            <div class="mb-3">
                <form action="{{ url('admin/tambah-admin/') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari admin!" {{ request('search') }}>
                        <button class="btn btn-dark" type="submit">
                            <i class="ti ti-search"></i>
                        </button>
                    </div>
                </form>
            </div>

            <div class="card px-3 py-3 table table-responsive overflow-auto">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light ">
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($admin as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="d-flex justify-content-center flex-wrap gap-1">
                                    <a href="{{ url('admin/tambah-admin/edit/' . $item['id']) }}" class="btn btn-sm btn-warning">
                                        <i class="fs-3 ti ti-edit"></i>
                                    </a>
                                    <form action="{{ url('admin/tambah-admin/delete/'. $item['id']) }}" class="d-inline delete-form" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-sm btn-danger delete-btn" type="button">
                                            <i class="fs-3 ti ti-trash"></i>
                                        </button>
                                    </form>
                                </td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <span class="badge {{ $item->role === 'GOD' ? 'bg-success' : 'bg-dark'}}  text-white">
                                        {{ ucfirst($item->role) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="text-muted" colspan="7">
                                    Data tidak ditemukan
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>
