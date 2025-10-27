<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Edit Mahasiswa</h3>
            </div>
            <div class="card-body bg-light">
                <form action="{{ url('admin/mahasiswa/' . $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    {{-- handle error --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    {{-- session handler --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 text-center">
                            @if ($mahasiswa->foto_profil)
                                <img src="{{ url('storage/' . $mahasiswa->foto_profil) }}"
                                    alt="{{ $mahasiswa->nama_mahasiswa }}" class="img-fluid rounded-xl shadow-sm"
                                    style="max-width: 60%;">
                            @else
                                <img src="{{ url('source') }}/assets/images/profile/default-person.jpg"
                                    alt="{{ $mahasiswa->nama_mahasiswa }}" class="img-fluid rounded-xl shadow-sm">
                            @endif
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                                <input type="text" name="nama_mahasiswa" class="form-control"
                                    placeholder="Masukkan Nama Mahasiswa"
                                    value="{{ old('nama_mahasiswa', $mahasiswa->nama_mahasiswa) }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                <input type="text" name="nim" class="form-control"
                                    placeholder="Masukkan Nomor Induk Mahasiswa"
                                    value="{{ old('nim', $mahasiswa->nim) }}">
                            </div>
                            <div class="mb-3">
                                <label for="status_mahasiswa" class="form-label">Status Mahasiswa</label>
                                <select name="status_mahasiswa" class="form-select">
                                    <option value="" selected disabled>Status Mahasiswa</option>
                                    <option value="Aktif"
                                        {{ old('status_mahasiswa', $mahasiswa->status_mahasiswa) == 'Aktif' ? 'selected' : '' }}>
                                        Aktif</option>
                                    <option value="Tidak Aktif"
                                        {{ old('status_mahasiswa', $mahasiswa->status_mahasiswa) == 'Tidak Aktif' ? 'selected' : '' }}>
                                        Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="" selected disabled>Jenis Kelamin</option>
                                    <option value="Laki-Laki"
                                        {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="foto_profil" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" name="foto_profil">
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 d-flex justify-content-end gap-3">
                        <a href="{{ url('admin/mahasiswa') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-check"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
