<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="text-dark mb-0">Detail Pengaduan Mahasiswa</h3>
                <a href="{{ url('admin/pengaduan-mahasiswa') }}" class="btn btn-dark btn-sm">
                    <i class="ti ti-arrow-left"></i> Kembali
                </a>
            </div>
            <div class="card-body">
                <div class="mb-4">
                    <h5 class="fw-bold">Judul Pengaduan</h5>
                    <p class="text-muted">{{ $pengaduan->judul_pengaduan }}</p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold">Isi Pengaduan</h5>
                    <div class="p-3 border rounded bg-light">
                        {{ strip_tags($pengaduan->deskripsi) }}
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold">Status Pengaduan</h6>
                        @if ($pengaduan->status == 'Pending')
                            <span class="badge bg-warning text-dark">Pending</span>
                        @elseif ($pengaduan->status == 'Diproses')
                            <span class="badge bg-secondary text-dark">Diproses</span>
                        @elseif ($pengaduan->status == 'Selesai')
                            <span class="badge bg-success text-dark">Selesai</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold">Tanggal Dibuat</h6>
                        <p class="text-muted mb-0">{{ $pengaduan->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold">Nama Mahasiswa</h5>
                    <p class="text-muted">
                        {{ $pengaduan->mahasiswa->nama_mahasiswa ?? '-' }}
                    </p>
                </div>

                <div class="mb-4">
                    <h5 class="fw-bold">Tanggapan Admin</h5>
                    @if ($pengaduan->tanggapan)
                        <div class="p-3 border rounded bg-light">
                            {{ $pengaduan->tanggapan }}
                        </div>
                    @else
                        <p class="text-muted fst-italic">Belum ada tanggapan.</p>
                    @endif
                </div>

                <hr>

                {{-- Form Update Status --}}
                <div class="mt-4">
                    <h5 class="fw-bold mb-3">Perbarui Status Pengaduan</h5>
                    <form action="{{ url('admin/pengaduan-mahasiswa', $pengaduan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="Pending" {{ $pengaduan->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Diproses" {{ $pengaduan->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                <option value="Selesai" {{ $pengaduan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggapan</label>
                            <textarea name="tanggapan" class="form-control" rows="3" placeholder="Tuliskan tanggapan...">{{ $pengaduan->tanggapan }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ url('admin/pengaduan-mahasiswa/') }}" class="btn btn-dark">
                                <i class="ti ti-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn btn-dark">
                                <i class="ti ti-check"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin>
