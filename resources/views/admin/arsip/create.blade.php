<x-admin>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0"><i class="ti ti-plus"></i> Tambah Arsip Dokumen</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/arsip') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nama_dokumen" class="form-label fw-bold">Nama Dokumen</label>
                                <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" value="{{ old('nama_dokumen') }}" placeholder="Masukkan nama dokumen">
                                @error('nama_dokumen')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tuliskan deskripsi dokumen">{{ old('deskripsi') }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="file" class="form-label fw-bold">Upload Dokumen</label>
                                <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                <small class="text-muted">
                                    Jenis file yang diizinkan: <strong>PDF, Word (.doc/.docx), Excel (.xls/.xlsx)</strong><br>
                                    Maksimal ukuran file: <strong>5 MB</strong>
                                </small>
                                @error('file')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ url('admin/arsip') }}" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-dark">
                                    <i class="ti ti-device-floppy"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
