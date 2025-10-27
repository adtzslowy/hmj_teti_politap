<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="mb-0 text-dark">Data Pendaftar Organisasi</h3>
            </div>
            <div class="card-body">
                <table class="table table-bordered text-center align-middle">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Aksi</th>
                            <th>Nama Mahasiswa</th>
                            <th>Divisi Dipilih</th>
                            <th>Divisi Ditempatkan</th>
                            <th>Alasan Masuk</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pendaftar as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @if ($item->status_pendaftaran == 'Pending')
                                        <!-- Tombol Approve (buka modal pilih divisi ditempatkan) -->
                                        <button class="btn btn-success btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#approveModal{{ $item->id }}">
                                            <i class="ti ti-check"></i> Approve
                                        </button>

                                        <!-- Tombol Decline -->
                                        <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#tolakModal{{ $item->id }}">
                                            <i class="ti ti-x"></i> Decline
                                        </button>
                                    @else
                                        <form action="{{ url('admin/pendaftar/delete/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger btn-sm" type="submit">
                                                <i class="ti ti-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>

                                <td>{{ $item->mahasiswa->nama_mahasiswa }}</td>
                                <td>{{ $item->divisiDipilih->nama_divisi ?? '-' }}</td>
                                <td>{{ $item->divisiDitempatkan->nama_divisi ?? '-' }}</td>
                                <td class="text-justify">{{ $item->alasan_bergabung ?? '-' }}</td>
                                <td>
                                    @if ($item->status_pendaftaran === 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($item->status_pendaftaran === 'Approved')
                                        <span class="badge bg-success text-dark">Approved</span>
                                    @else
                                        <span class="badge bg-danger text-dark">Decline</span>
                                    @endif
                                </td>
                            </tr>

                            <!-- MODAL APPROVE -->
                            <div class="modal fade" id="approveModal{{ $item->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('admin/pendaftar/approved/' . $item->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-header bg-success text-white">
                                                <h5 class="modal-title">Pilih Divisi Penempatan</h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body text-start">
                                                <div class="mb-3">
                                                    <label class="form-label">Divisi Ditempatkan</label>
                                                    <select name="divisi_ditempatkan_id" class="form-select" required>
                                                        <option value="">-- Pilih Divisi --</option>
                                                        @foreach ($divisi as $div)
                                                            <option value="{{ $div->id }}">
                                                                {{ $div->nama_divisi }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">
                                                    <i class="ti ti-x"></i> Batal
                                                </button>
                                                <button type="submit" class="btn btn-success">
                                                    <i class="ti ti-check"></i> Approve
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- MODAL DECLINE -->
                            <div class="modal fade" id="tolakModal{{ $item->id }}" tabindex="-1"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <form action="{{ url('admin/pendaftaran/decline/' . $item->id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="modal-header bg-danger text-white">
                                                <h5 class="modal-title">Alasan Penolakan</h5>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea name="alasan_ditolak" class="form-control" rows="3" placeholder="Tuliskan alasan penolakan..." required></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-dark"
                                                    data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-danger">Decline</button>
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
</x-admin>
