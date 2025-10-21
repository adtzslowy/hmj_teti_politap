<x-admin>
    <div class="container-fluid">
        <div class="card">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Edit Divisi</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/divisi/' . $divisi->id) }}" method="post">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        @foreach ($errros->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    <div class="col-md-12">
                        <div class="row">
                            <div class="mb-3">
                                <label for="nama_divisi" class="form-label">Divisi Organisasi</label>
                                <select name="nama_divisi" id="nama_divisi" class="form-select" required>
                                    <option value="" disabled>Masukkan Divisi Organisasi!</option>
                                    <option value="Ketua" {{ old('nama_divisi', $divisi->nama_divisi) == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                    <option value="Koordinator" {{ old('nama_divisi', $divisi->nama_divisi) == 'Koordinator' ? 'selected' : '' }}>Koordinator</option>
                                    <option value="Sekertaris" {{ old('nama_divisi', $divisi->nama_divisi) == 'Sekertaris' ? 'selected' : '' }}>Sekertaris</option>
                                    <option value="Bendahara" {{ old('nama_divisi', $divisi->nama_divisi) == 'Bendahara' ? 'selected' : '' }}>Bendahara</option>
                                    <option value="Pengembangan Sumber Daya Mahasiswa" {{ old('nama_divisi', $divisi->nama_divisi) == 'Pengembangan Sumber Daya Manusia' ? 'selected' : '' }}>Pengembangan Sumber Daya Mahasiswa</option>
                                    <option value="Akademis" {{ old('nama_divisi', $divisi->nama_divisi) == 'Akademis' ? 'selected' : '' }}>Akademis</option>
                                    <option value="Hubungan Masyarakat" {{ old('nama_divisi', $divisi->nama_divisi) == 'Hubungan Masyarakat' ? 'selected' : '' }}>Hubungan Masyarakat</option>
                                    <option value="Komunikasi dan Informasi" {{ old('nama_divisi', $divisi->nama_divisi) == 'Komunikasi dan Informasi' ? 'selected' : '' }}>Komunikasi dan Informasi</option>
                                    <option value="Komisi Kedisiplinan" {{ old('nama_divisi', $divisi->nama_divisi) == 'Komisi Kedisiplinan' ? 'selected' : '' }}>Komisi Kedisiplinan</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ url('admin/divisi') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button class="btn btn-dark" type="submit">
                            <i class="ti ti-check"></i> Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
