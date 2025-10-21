<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Detail Anggota</h3>
            </div>
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                            <select name="mahasiswa_id" id="mahasiswa_id" class="form-select" disabled>
                                @foreach ($mahasiswa as $m)
                                    <option value="{{ old('mahasiswa_id') == $m->id ? 'selected' : '' }}">
                                        {{ $m->nama_mahasiswa }} / {{ $m->nim }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="jabatan_id" class="form-label">Jabatan Organisasi</label>
                            <select name="jabatan_id" id="jabatan_id" class="form-select" disabled>
                                @foreach ($jabatan as $j)
                                    <option value="{{ old('jabatan_id') == $j->id ? 'selected' : '' }}">
                                        {{ $j->jabatan }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-2">
                    <a href="{{ url('admin/anggota') }}" class="btn btn-dark">
                        <i class="ti ti-arrow-left"></i> Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-admin>
