<x-admin>
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-semibold mb-0">Detail Arsip</h3>
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary btn-sm rounded px-3">
                <i class="ti ti-arrow-left me-1"></i> Kembali
            </a>
        </div>

        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body p-4">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 class="text-muted mb-1">Nama Dokumen</h6>
                        <p class="fw-semibold fs-5">{{ $arsip->nama_dokumen }}</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <h6 class="text-muted mb-1">Tanggal Upload</h6>
                        <p class="fw-semibold">{{ $arsip->created_at->format('d M Y • H:i') }}</p>
                    </div>
                </div>

                <hr class="my-3">

                <div class="mb-4">
                    <h6 class="text-muted mb-2">Deskripsi</h6>
                    <div class="border rounded-3 p-3 bg-light">
                        {{ $arsip->deskripsi ? strip_tags(($arsip->deskripsi)) : '<span class="text-muted fst-italic">Tidak ada deskripsi.</span>' }}
                    </div>
                </div>

                <div>
                    <h6 class="text-muted mb-2">File</h6>

                    @if($arsip->file)
                        @php
                            $ext = strtolower(pathinfo($arsip->file, PATHINFO_EXTENSION));
                            $url = asset('storage/arsip/' . $arsip->file);
                        @endphp

                        <div class="border rounded-3 p-3 bg-light text-center">
                            @if($ext === 'pdf')
                                <iframe src="{{ $url }}" width="100%" height="500px" class="rounded-3 border"></iframe>
                                <a href="{{ $url }}" target="_blank" class="btn btn-outline-primary mt-3 rounded-pill">
                                    <i class="ti ti-download me-1"></i> Unduh PDF
                                </a>
                            @elseif(in_array($ext, ['doc', 'docx', 'xls', 'xlsx']))
                                <div class="py-3">
                                    <i class="ti ti-file-text fs-1 text-primary"></i>
                                    <p class="mt-2 mb-3">File {{ strtoupper($ext) }} tidak bisa ditampilkan langsung.</p>
                                    <a href="{{ $url }}" target="_blank" class="btn btn-primary rounded-pill">
                                        <i class="ti ti-download me-1"></i> Lihat / Unduh File
                                    </a>
                                </div>
                            @else
                                <p class="text-muted fst-italic mb-3">Tipe file tidak dapat ditampilkan langsung.</p>
                                <a href="{{ $url }}" target="_blank" class="btn btn-outline-primary rounded-pill">
                                    <i class="ti ti-download me-1"></i> Unduh File
                                </a>
                            @endif
                        </div>
                    @else
                        <div class="alert alert-warning rounded-3">
                            <i class="ti ti-alert-circle me-2"></i>
                            Tidak ada file diunggah.
                        </div>
                    @endif
                </div>
            </div>

            <div class="card-footer bg-white border-0 text-end px-4 py-3">
                <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-dark text-white rounded px-3">
                    <i class="ti ti-edit me-1"></i> Edit Arsip
                </a>
            </div>
        </div>
    </div>
</x-admin>
