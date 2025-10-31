<x-mahasiswa>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            {{-- Bagian Foto Profil --}}
                            <div class="col-md-5 text-center border-end">
                                @if ($mahasiswa->foto_profil)
                                    <img src="{{ url('storage/' . $mahasiswa->foto_profil) }}" alt="{{ $mahasiswa->nama_mahasiswa }}"
                                        class="img-fluid rounded shadow-sm"
                                        style="max-width: 250px; height: 250px; object-fit: cover;">
                                @else
                                    <img src="{{ url('source/assets/images/profile/default-person.jpg') }}"
                                        alt="{{ $mahasiswa->name_mahasiswa }}" class="img-fluid rounded shadow-sm"
                                        style="max-width: 250px; height: 250px; object-fit: cover;">
                                @endif
                            </div>

                            {{-- Bagian Data Profil --}}
                            <div class="col-md-7">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0 fw-semibold text-muted text-uppercase">PROFIL {{ $mahasiswa->nama_mahasiswa }}</h5>
                                    <a href="{{ url('mahasiswa/profile/edit/' . $mahasiswa['id']) }}" class="btn btn-dark btn-sm">
                                        <i class="ti ti-edit"></i> Edit
                                    </a>
                                </div>

                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td class="fw-medium text-muted" width="40%">Nama Lengkap</td>
                                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium text-muted">NIM</td>
                                        <td>{{ $mahasiswa->nim }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium text-muted">Jenis Kelamin</td>
                                        <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-mahasiswa>
