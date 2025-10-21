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
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="Masukkan Tanggal Lahir" required>
                            </div>
                            <div class="mb-3">
                                <label for="agama" class="form-label">Agama</label>
                                <select name="agama" class="form-select">
                                    <option value="" selected disabled>Agama Mahasiswa</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen Protestan">Kristen Protestan</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Konghucu">Konghucu</option>
                                    <option value="Tidak Tahu">Tidak Tahu</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nomor_telepon" class="form-label">Nomor Telepon Pribadi</label>
                                <input type="text" class="form-control" name="nomor_telepon" placeholder="Masukkan Nomor Telepon" required>
                            </div>
                            <div class="mb-3">
                                <label for="email_kampus" class="form-label">Email Kampus</label>
                                <input type="email" class="form-control" name="email_kampus" placeholder="Masukkan Email Kampus" required>
                            </div>
                            <div class="mb-3">
                                <label for="email_pribadi" class="form-label">Email Pribadi</label>
                                <input type="email" class="form-control" name="email_pribadi" placeholder="Masukkan Email Pribadi" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto_profil" class="form-label">Profile Picture</label>
                                <input type="file" class="form-control" name="foto_profil" required>
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
