<x-mahasiswa>
    <div class="container-fluid">
        <div class="row mb-3 justify-content-between">
            <div class="col-12 mb-2">
                <a href="{{ url('mahasiswa/pengaduan-anggota/create') }}" class="btn btn-dark">
                    <i class="ti ti-plus"></i> Buat Pengaduan
                </a>
            </div>

            <div class="card p-3 table-responsive">
                <table class="table table-bordered align-middle text-center">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul Pengaduan</th>
                            <th>Isi Pengaduan</th>
                            <th>Status</th>
                            <th>Tanggapan</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pengaduan as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="text-start">{{ $item->judul_pengaduan }}</td>
                                <td class="text-start">{{ strip_tags($item->deskripsi) }}</td>
                                <td>
                                    @if ($item->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($item->status == 'Diproses')
                                        <span class="badge bg-primary">Diproses</span>
                                    @elseif ($item->status == 'Selesai')
                                        <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->tanggapan)
                                        <button class="btn btn-sm btn-outline-info" data-bs-toggle="modal" data-bs-target="#tanggapanModal{{ $item->id }}">
                                            Lihat Tanggapan
                                        </button>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
                                </td>
                                <td>{{ $item->created_at->format('d M Y') }}</td>
                            </tr>

                            <!-- Modal -->
                            <div class="modal fade" id="tanggapanModal{{ $item->id }}" tabindex="-1" aria-labelledby="tanggapanModalLabel{{ $item->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header bg-dark text-white">
                                            <h5 class="modal-title text-white" id="tanggapanModalLabel{{ $item->id }}">
                                                Tanggapan Pengaduan
                                            </h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-muted small mb-3">Dibuat pada {{ $item->created_at->format('d M Y, H:i') }}</p>
                                            <hr>
                                            <p><strong>Deskripsi Pengaduan:</strong></p>
                                            <p>{{ strip_tags($item->deskripsi) }}</p>
                                            <hr>
                                            <p><strong>Tanggapan:</strong></p>
                                            <p>{{ $item->tanggapan }}</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-muted">
                                    Belum ada data pengaduan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-mahasiswa>
