<x-mahasiswa>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-white">Form Pendaftaran Anggota HMJ</h3>
            </div>

            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $err)
                        <div class="alert alert-danger">{{ $err }}</div>
                    @endforeach
                @endif

                <form action="{{ url('mahasiswa/pendaftaran-anggota') }}" method="post">
                    @csrf

                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="alasan_bergabung" class="form-label">Alasan bergabung </label>
                            <textarea name="alasan_bergabung" id="alasan_bergabung" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="divisi_dipilih_id" class="form-label">Divisi</label>
                            <select name="divisi_dipilih_id" id="divisi_dipilih_id" class="form-select" required>
                                <option value="" disabled selected>Silahkan Pilih Divisi</option>
                                @foreach ($divisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ url('mahasiswa/pendaftaran-anggota') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button class="btn btn-dark" type="submit">
                            <i class="ti ti-check"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-mahasiswa>
