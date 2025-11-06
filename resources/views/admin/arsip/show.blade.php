<x-admin>
    <div class="container mt-4">
        <h3 class="mb-4">Detail Arsip</h3>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body">
                <div class="mb-3">
                    <strong>Nama Dokumen:</strong>
                    <p>{{ $arsip->nama_dokumen }}</p>
                </div>

                <div class="mb-3">
                    <strong>Deskripsi:</strong>
                    <p>{{ $arsip->deskripsi ?? '-' }}</p>
                </div>

                <div class="mb-3">
                    <strong>File:</strong><br>
                    @if($arsip->file)
                        @php
                            $ext = pathinfo($arsip->file, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array(strtolower($ext), ['pdf']))
                            <iframe src="{{ asset('storage/arsip/' . $arsip->file) }}" width="100%" height="500px"></iframe>
                        @elseif(in_array(strtolower($ext), ['doc', 'docx', 'xls', 'xlsx']))
                            <a href="{{ asset('storage/arsip/' . $arsip->file) }}" target="_blank" class="btn btn-primary btn-sm">
                                Lihat / Unduh File
                            </a>
                        @else
                            <p>Tipe file tidak dapat ditampilkan langsung. 
                                <a href="{{ asset('storage/arsip/' . $arsip->file) }}" target="_blank">Unduh File</a>
                            </p>
                        @endif

                    @else
                        <p class="text-muted">Tidak ada file diunggah.</p>
                    @endif
                </div>

                <div class="mb-3">
                    <strong>Tanggal Upload:</strong>
                    <p>{{ $arsip->created_at->format('d M Y H:i') }}</p>
                </div>
            </div>

            <div class="card-footer text-end">
                <a href="{{ url('index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                <a href="{{ url('edit', $arsip->id) }}" class="btn btn-warning btn-sm">Edit</a>
            </div>
        </div>\
    </div>
</x-admin>
