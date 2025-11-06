<x-mahasiswa>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Form Pengaduan Anggota HMJ</h3>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger">{{ $err }}</div>
                    @endforeach
                @endif

                <form action="{{ url('mahasiswa/pengaduan-anggota') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="deskripsi" class="form-label">Isi Pengaduan</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                required>{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bukti_aduan" class="form-label">Bukti Aduan</label>
                            <input type="file" class="form-control" name="bukti_aduan" required>
                            @error('bukti_auduan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ url('mahasiswa/pengaduan-anggota') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-dark">
                                <i class="ti ti-send"></i> Kirim Pengaduan
                            </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</x-mahasiswa>
