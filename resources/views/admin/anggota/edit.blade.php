<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Edit Anggota</h3>
            </div>
            <div class="card-body bg-light">
                <form action="{{ url('admin/anggota/' . $anggota->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Handle error --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                                <select name="mahasiswa_id" id="mahasiswa_id" class="form-select">
                                    <option value="" disabled>Pilih Mahasiswa</option>
                                    @foreach ($mahasiswa as $m)
                                        <option value="{{ old('mahasiswa_id') . $m->id }}">{{ $m->nama_mahasiswa }} /
                                            {{ $m->nim }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="jabatan_id" class="form-label">Jabatan Di Organisasi</label>
                                <select name="jabatan_id" id="jabatan_id" class="form-select">
                                    <option value="" disabled>Masukkan Jabatan</option>
                                    @foreach ($jabatan as $j)
                                        <option value="{{ old('jabatan_id') . $j->id }}">{{ $j->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-2">
                        <a href="{{ url('admin/anggota') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-success">
                            <i class="ti ti-check"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin>
