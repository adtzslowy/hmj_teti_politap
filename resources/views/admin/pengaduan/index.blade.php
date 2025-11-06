<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header">
                <h3 class="text-dark mb-0">Daftar Pengaduan Mahasiswa</h3>
            </div>
            <div class="card-body">
                <table class="table-responsive table-bordered table">
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
                                <td>
                                    <form action="{{ url('admin/pengaduan-mahasiswa', $item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select name="status" class="form-select form-select-sm">
                                            <option value="Diproses"
                                                {{ $item->status == 'Diproses' ? 'selected' : '' }}>Diproses</option>
                                            <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>
                                                Selesai</option>
                                        </select>
                                        <textarea name="tanggapan" class="form-control form-control-sm mt-1" placeholder="Tulis tanggapan...">{{ $item->tanggapan }}</textarea>
                                        <button type="submit" class="btn btn-sm btn-primary mt-1">Simpan</button>
                                    </form>
                                </td>
                                <td>{{ $item->judul_pengaduan }}</td>
                                <td class="text-justify text-truncate" style="max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    {{ strip_tags($item->deskripsi) }}
                                </td>
                                <td>
                                    @if ($item->status == 'Pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif ($item->status == 'Diproses')
                                        <span class="badge bg-primary text-dark">Diproses</span>
                                    @elseif ($item->status == 'Selesai')
                                        <span class="badge bg-success text-dark">Selesai</span>
                                    @endif
                                </td>
                                <td>{{ $item->tanggapan ?? '-' }}</td>
                                <td>{{ $item->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin>
