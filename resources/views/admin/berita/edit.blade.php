<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Edit Berita</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/berita/' . $berita->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')

                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @elseif (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="judul" class="form-label">Judul Berita</label>
                                <input type="text" class="form-control" name="judul" placeholder="Masukkan judul berita!" value="{{ old('judul', $berita->judul) }}">
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi Berita</label>
                                <textarea type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="Masukkan deskripsi berita!">{{ old('deskripsi', $berita->deskripsi) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="dokumentasi" class="form-label">Dokumentasi</label>
                                <img src="{{ url('storage/' . $berita->dokumentasi) }}" alt="{{ $berita->judul }}" class="w-100 pb-3">
                                <input type="file" name="dokumentasi" class="form-control">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('admin/berita') }}" class="btn btn-dark">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                            <button class="btn btn-success" type="submit">
                                <i class="ti ti-check"></i> Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
