<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="text-dark mb-0">Daftar Pengaduan Mahasiswa</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table">
                        <thead>
                            <tr>
                                <th>Aksi</th>
                                <th>Judul Pengaduan</th>
                                <th>Isi Pengaduan</th>
                                <th>Status</th>
                                <th>Tanggapan</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengaduan as $item)
                                <tr>
                                    <td class="d-flex justify-content-center gap-1">
                                        <!-- Tombol Proses / Selesai -->
                                        @if ($item->status != 'Selesai')
                                        <button type="button" class="btn btn-sm btn-dark" data-bs-toggle="modal"
                                            data-bs-target="#modalProses{{ $item->id }}">
                                            <i class="fs-3 ti ti-check"></i>
                                        </button>
                                        @endif
                                        <a href="{{ url('admin/pengaduan-mahasiswa/detail/' . $item->id) }}" class="btn btn-info btn-sm">
                                            <i class="fs-3 ti ti-eye "></i>
                                        </a>
                                        @if (Auth::user()->role === 'God')
                                            <form action="{{ url('admin/pengaduan-mahasiswa/delete' . $item['id']) }}" method="POST" class="d-inline delete-form">
                                                @csrf
                                                @method('DELETE')

                                                <button class="btn btn-sm btn-danger delete-btn" type="button">
                                                    <i class="ti ti-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                    <td class="text-justify text-truncate" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->judul_pengaduan }}</td>
                                    <td class="text-justify text-truncate" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ strip_tags($item->deskripsi) }}</td>
                                    <td>
                                        @if ($item->status == 'Pending')
                                            <span class="badge bg-warning text-dark">Pending</span>
                                        @elseif ($item->status == 'Diproses')
                                            <span class="badge bg-secondary text-dark">Diproses</span>
                                        @elseif ($item->status == 'Selesai')
                                            <span class="badge bg-success text-dark">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="text-justify text-truncate" style="max-width: 100px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $item->tanggapan}}</td>
                                    <td>{{ $item->created_at->format('H:i, d-m-Y ') }}</td>
                                </tr>

                                <!-- Modal Update Status -->
                                <div class="modal fade" id="modalProses{{ $item->id }}" tabindex="-1"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Proses Pengaduan</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('admin/pengaduan-mahasiswa', $item->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">Status</label>
                                                        <select name="status" class="form-select">
                                                            <option value="Diproses"
                                                                {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses
                                                            </option>
                                                            <option value="Selesai"
                                                                {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tanggapan</label>
                                                        <textarea name="tanggapan" class="form-control" rows="3" placeholder="Tuliskan tanggapan...">{{ $item->tanggapan }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-dark"
                                                        data-bs-dismiss="modal">
                                                        <i class="ti ti-x"></i> Tutup
                                                    </button>
                                                    <button type="submit" class="btn btn-dark">
                                                        <i class="ti ti-check"></i> Simpan Perubahan
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</x-admin>
