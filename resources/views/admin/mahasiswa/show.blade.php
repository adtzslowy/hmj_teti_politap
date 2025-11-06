<x-admin>
    <div class="container-fluid">
        <div class="card shadow-md">
            <div class="card-header bg-dark">
                <h3 class="text-white">Data Mahasiswa</h3>
            </div>

            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-6 text-center">
                        @if ($mahasiswa->foto_profil)
                            <img src="{{ url('storage/' . $mahasiswa->foto_profil) }}" alt="{{ $mahasiswa->nama_mahasiswa }}" class="img-fluid rounded-xl shadow-sm" style="max-width: 60%;">
                        @else
                            <img src="{{ url('source') }}/assets/images/profile/default-person.jpg" alt="{{ $mahasiswa->nama_mahasiswa }}" class="img-fluid rounded-xl shadow-sm">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_mahasiswa" class="form-label">Nama Lengkap</label>
                            <div class="text-black form-control">{{ $mahasiswa->nama_mahasiswa }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                            <div class="text-black form-control">{{ $mahasiswa->nim }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="status_mahasiswa" class="form-label">Status Mahasiswa</label>
                            <div class="text-black form-control">{{ $mahasiswa->status_mahasiswa }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                            <div class="text-black form-control">{{ $mahasiswa->jenis_kelamin }}</div>
                        </div>
                        <div class="mb-3">
                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                            <div class="text-black form-control">{{ $mahasiswa->tempat_lahir }}</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ url('admin/mahasiswa') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
