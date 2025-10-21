<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="text-white mb-0">Tambah Divisi</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/divisi') }}" method="POST">
                    @csrf

                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="nama_divisi" class="form-label">Jabatan</label>
                                <select name="nama_divisi" id="nama_divisi" class="form-select">
                                    <option value="" disabled selected>Masukkan Divisi</option>
                                    <option value="Ketua">Ketua</option>
                                    <option value="Koordinator">Koordinator</option>
                                    <option value="Sekertaris">Sekertaris</option>
                                    <option value="Bendahara">Bendahara</option>
                                    <option value="Pengembangan Sumber Daya Mahasiswa">Pengembangan Sumber Daya Mahasiswa</option>
                                    <option value="Akademik">Akademik</option>
                                    <option value="Hubungan Masyarakat">Hubungan Masyarakat</option>
                                    <option value="Komunikasi dan Informasi">Komunikasi dan Informasi</option>
                                    <option value="Komisi Kedisiplinan">Komisi Kedisiplinan</option>
                                </select>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('admin/divisi') }}" class="btn btn-dark">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-dark">
                                <i class="ti ti-check"></i> Simpan
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
