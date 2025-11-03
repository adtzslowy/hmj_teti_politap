<x-admin>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-header">
                        <h3 class="fw-semibold mb-0">Edit Admin</h3>
                    </div>
                    <div class="card-body">
                        <h5 class="fw-medium text-muted mb-4 text-center">Profile Admin</h5>

                        <form action="{{ url('admin/tambah-admin/' . $admin->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @if ($errors->any())
                                @foreach ($errors->all() as $err)
                                    <div class="alert alert-danger">{{ $err }}</div>
                                @endforeach
                            @endif

                            <div class="row">
                                <div class="col-md-6 text-center mb-3 border-end">
                                    @if ($admin->foto_profil)
                                        <img src="{{ url('storage/' . $admin['foto_profil']) }}" alt="{{ $admin['name'] }}" class="img-fluid rounded-xl" style="max-height: 70%;">
                                    @else
                                        <img src="{{ url('source') }}/assets/images/default-person.jpg" alt="{{ $admin['name'] }}" class="img-fluid rounded-xl" style="max-height: 70%;">
                                    @endif

                                    <div class="mb-3">
                                        <label for="foto_profil" class="form-label">Profil Picture</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name', $admin['name']) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                        <input type="text" name="nim" class="form-control" value="{{ old('nim', $admin['nim']) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control" value="{{ old('email', $admin['email']) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select name="role" id="role" class="form-select">
                                            <option value="" disabled selected>Pilih Role</option>
                                            <option value="Operator" {{ old('role', $admin->role) === 'Operator' ? 'selected' : '' }}>Operator</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="foto_profil" class="form-label">Profile Picture</label>
                                        <input type="file" name="foto_profil" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ url('admin/tambah-admin') }}" class="btn btn-dark">
                                    <i class="ti ti-arrow-left"></i> Kembali
                                </a>
                                <button class="btn btn-success" type="submit">
                                    <i class="ti ti-check"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
