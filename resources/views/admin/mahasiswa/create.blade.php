<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Tambah Mahasiswa</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/mahasiswa') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- handle error --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif


                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_mahasiswa" class="form-label">Nama Mahasiswa</label>
                                <input type="text" name="nama_mahasiswa" class="form-control" placeholder="Masukkan Nama Mahasiswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                <input type="text" name="nim" class="form-control" placeholder="Masukkan Nomor Induk Mahasiswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="status_mahasiswa" class="form-label">Status Mahasiswa</label>
                                <select name="status_mahasiswa" class="form-select">
                                    <option value="" selected disabled>Status Mahasiswa</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Tidak Aktif">Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-select">
                                    <option value="" selected disabled>Jenis Kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
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
