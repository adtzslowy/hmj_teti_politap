<x-mahasiswa>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm p-4">
                    <h4 class="mb-4">Buat Pengaduan Baru</h4>

                    <form action="{{ url('mahasiswa/pengaduan') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="judul_pengaduan" class="form-label">Judul Pengaduan</label>
                            <input type="text" name="judul_pengaduan" id="judul_pengaduan"
                                class="form-control @error('judul_pengaduan') is-invalid @enderror"
                                value="{{ old('judul_pengaduan') }}" required>
                            @error('judul_pengaduan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="isi_pengaduan" class="form-label">Isi Pengaduan</label>
                            <textarea name="isi_pengaduan" id="isi_pengaduan" rows="5"
                                class="form-control @error('isi_pengaduan') is-invalid @enderror"
                                required>{{ old('isi_pengaduan') }}</textarea>
                            @error('isi_pengaduan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('mahasiswa/pengaduan') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-dark">
                                <i class="ti ti-send"></i> Kirim Pengaduan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-mahasiswa>
