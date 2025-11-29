<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="text-white mb-0">Tambah Divisi</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/prodi') }}" method="POST">
                    @csrf
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_prodi" class="form-label">Nama Prodi</label>
                                <select name="nama_prodi" id="nama_prodi" class="form-select">
                                    <option value="" disabled selected>Masukkan Program Studi</option>
                                    <option value="Teknologi Pemeliharaan Mesin">Teknologi Pemeliharaan Mesin</option>
                                    <option value="Teknologi Pertambangan">Teknologi Pertambangan</option>
                                    <option value="Agroindustri">Agroindustri</option>
                                    <option value="Teknologi Informasi">Teknologi Informasi</option>
                                    <option value="Teknologi Listrik">Teknologi Listrik</option>
                                    <option value="Teknologi Hasil Perkebunan">Teknologi Hasil Perkebunan</option>
                                    <option value="Teknologi Rekayasa Jalan dan Jembatan">Teknologi Rekayasa Jalan dan Jembatan</option>
                                    <option value="Teknologi Produksi Tanaman Perkebunan">Teknologi Produksi Tanaman Perkebunan</option>
                                    <option value="Manajemen Agri Bisnis">Menejemen Agri Bisnis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="kaprodi" class="form-label">Koordinator Program Studi</label>
                                <input type="text" name="kaprodi" class="form-control" placeholder="Masukkan nama Kaprodi!">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('admin/prodi') }}" class="btn btn-dark">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                            <button class="btn btn-dark" type="submit">
                                <i class="ti ti-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
