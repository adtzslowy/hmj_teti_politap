<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Buat Berita</h3>
            </div>

            <div class="card-body">
                <form action="{{ url('admin/berita') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Berita</label>
                                <input type="text" class="form-control" name="judul" placeholder="Masukkan judul berita!" required/>
                            </div>

                            <div class="mb-3">
                                <label for="dokumentasi" class="form-label">Foto Dokumentasi</label>
                                <input type="file" class="form-control" name="dokumentasi" required/>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="7" placeholder="Masukkan isi berita disini!" required>{{ old('deskripsi') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_post" class="form-label">Tanggal Post</label>
                                <input type="date" name="tanggal_post" id="tanggal_post" required class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end gap-2 align-items-center">
                        <a href="{{ url('admin/berita') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-check"></i> Post Berita
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
