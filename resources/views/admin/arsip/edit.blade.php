<x-admin>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-warning text-dark">
                        <h5 class="mb-0"><i class="ti ti-edit"></i> Edit Arsip Dokumen</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('admin/arsip' . $arsip->id) }}" method="POST" enctype="multipart/form-data">
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

                            <div class="mb-3">
                                <label for="nama_dokumen" class="form-label fw-bold">Nama Dokumen</label>
                                <input type="text" name="nama_dokumen" id="nama_dokumen" class="form-control" 
                                    value="{{ old('nama_dokumen', $arsip->nama_dokumen) }}" placeholder="Masukkan nama dokumen">
                                @error('nama_dokumen')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label fw-bold">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control" placeholder="Tuliskan deskripsi dokumen">{{ old('deskripsi', $arsip->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="file" class="form-label fw-bold">Ganti Dokumen (Opsional)</label>
                                <input type="file" name="file" id="file" class="form-control" accept=".pdf,.doc,.docx,.xls,.xlsx">
                                <small class="text-muted">
                                    Jenis file yang diizinkan: <strong>PDF, Word (.doc/.docx), Excel (.xls/.xlsx)</strong><br>
                                    Maksimal ukuran file: <strong>5 MB</strong>
                                </small>
                                @error('file')
                                    <small class="text-danger d-block">{{ $message }}</small>
                                @enderror

                                @if ($arsip->file)
                                    <div class="mt-2">
                                        <p class="fw-bold mb-1">File saat ini:</p>
                                        <a href="{{ url('storage/' . $arsip->file) }}" target="_blank" class="btn btn-outline-primary btn-sm">
                                            <i class="ti ti-file"></i> Lihat Dokumen
                                        </a>
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-end gap-2">
                                <a href="{{ url('admin/arsip') }}" class="btn btn-secondary">
                                    <i class="ti ti-arrow-left"></i> Kembali
                                </a>
                                <button type="submit" class="btn btn-warning text-dark">
                                    <i class="ti ti-device-floppy"></i> Perbarui
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
