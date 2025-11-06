<x-admin>
    <div class="container-fluid">
        <div class="card shadow-md">
            <div class="card-header bg-dark">
                <h3 class="mb-3 text-white">Berita</h3>
            </div>
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Berita</label>
                            <div class="form-control">{{ $berita->judul }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Isi Berita</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" readonly>{{ $berita->deskripsi }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dokumentasi" class="form-label">Dokumentasi</label>
                            <img src="{{ url('storage/'. $berita->dokumentasi) }}" alt="{{ $berita->judul }}" class="w-100">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ url('admin/berita') }}" class="btn btn-dark">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin>
