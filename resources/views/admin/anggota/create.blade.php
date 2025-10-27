<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="text-white mb-0">Tambah Anggota Baru</h3>
            </div>
            <div class="card-body">
                <form action="{{ url('admin/anggota') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- Handling error --}}
                    @if ($errors->any())
                        @foreach ($errors->all() as $err)
                            <div class="alert alert-danger">{{ $err }}</div>
                        @endforeach
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="mahasiswa_id" class="form-label">Mahasiswa</label>
                                <select name="mahasiswa_id" id="mahasiswa_id" class="form-control select2" required>
                                    <option value="" disabled selected>Pilih Mahasiswa</option>
                                    @foreach ($mahasiswa as $mhs)
                                        <option value="{{ $mhs->id }}">{{ $mhs->nama_mahasiswa }} /
                                            {{ $mhs->nim }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="divisi_id" class="form-label">Jabatan Di Organisasi</label>
                                <select name="divisi_id" id="divisi_id" class="form-select" required>
                                    <option value="" disabled selected>Masukkan Jabatan</option>
                                    @foreach ($divisi as $d)
                                        <option value="{{ $d->id }}">{{ $d->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2 mt-2">
                        <a href="{{ url('admin/anggota') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                        <button class="btn btn-success" type="submit">
                            <i class="ti ti-check"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Cari nama mahasiswa...",
                allowClear: true
            });
        });
    </script>
    @endpush

</x-admin>
