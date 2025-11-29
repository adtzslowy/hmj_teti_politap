<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Edit Program Studi</h3>
            </div>
            <div class="card-body bg-light">
                <form action="{{ url('admin/prodi/' . $prodi['id']) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="aler alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_prodi" class="form-label">Nama Program Studi</label>
                                <select name="nama_prodi" id="nama_prodi" class="form-select">
                                    <option value="" disabled selected>Masukkan Program Studi</option>
                                    <option value="Teknologi Pemeliharaan Mesin" {{ old('nama_prodi', $prodi->nama_prodi) === 'Teknologi Pemeliharaan Mesin' ? 'selected' : '' }}>Teknologi Pemeliharaan Mesin</option>
                                    <option value="Teknologi Pertambangan" {{ old('nama_prodi', $prodi->nama_prodi) === 'Teknologi Pertambangan' ? 'selected' : '' }}>Teknologi Pertambangan</option>
                                    <option value="Agroindustri" {{ old('nama_prodi', $prodi->nama_prodi) === 'Agroindustri' ? 'selected' : '' }}>Agroindustri</option>
                                    <option value="Teknologi Informasi" {{ old('nama_prodi', $prodi->nama_prodi) === 'Teknologi Informasi' ? 'selected' : '' }}>Teknologi Informasi</option>
                                    <option value="Teknologi Listrik" {{ old('nama_prodi', $prodi->nama_prodi) === 'Teknologi Listrik' ? 'selected' : '' }}>Teknologi Listrik</option>
                                    <option value="Teknologi Hasil Perkebunan" {{ old('nama_prodi', $prodi->nama_prodi) === 'Teknologi Hasil Perkebunan' ? 'selected' : '' }}>Teknologi Hasil Perkebunan</option>
                                    <option value="Teknologi Rekayasa Jalan dan Jembatan" {{ old('nama_prodi', $prodi->nama_prodi) === 'Teknologi Rekayasa Jalan dan Jembatan' ? 'selected' : '' }}>Teknologi Rekayasa Jalan dan Jembatan</option>
                                    <option value="Teknologi Produksi Tanaman Perkebunan" {{ old('nama_prodi', $prodi->nama_prodi) === 'Teknologi Produksi Tanaman Perkebunan' ? 'selected' : '' }}>Teknologi Produksi Tanaman Perkebunan</option>
                                    <option value="Manajemen Agri Bisnis" {{ old('nama_prodi', $prodi->nama_prodi) === 'Manajemen Agri Bisnis' ? 'selected' : '' }}>Manajemen Agri Bisnis</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Koordinator Program Studi</label>
                                <input type="text" name="kaprodi" class="form-control" value="{{ $prodi->kaprodi }}" placeholder="Masukkan Koordinator Program Studi!">
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-1">
                            <a href="{{ url('admin/prodi') }}" class="btn btn-dark">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                            <button class="btn btn-dark" type="submit">
                                <i class="ti ti-check"></i> Perbaharui
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
