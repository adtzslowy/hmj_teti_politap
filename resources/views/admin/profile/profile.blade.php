<x-admin>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="card shadow-sm border-0">
                    <div class="card-body">
                        <div class="row align-items-center">
                            {{-- Bagian Foto Profil --}}
                            <div class="col-md-5 text-center border-end">
                                @if ($admin->foto_profil)
                                    <img src="{{ url('storage/' . $admin->foto_profil) }}" alt="{{ $admin->name }}"
                                        class="img-fluid rounded shadow-sm"
                                        style="max-width: 250px; height: 250px; object-fit: cover;">
                                @else
                                    <img src="{{ url('source/assets/images/profile/default-person.jpg') }}"
                                        alt="{{ $admin->name }}" class="img-fluid rounded shadow-sm"
                                        style="max-width: 250px; height: 250px; object-fit: cover;">
                                @endif
                            </div>

                            {{-- Bagian Data Profil --}}
                            <div class="col-md-7">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="mb-0 fw-semibold text-muted">PROFIL ADMIN HMJ</h5>
                                    <a href="{{ url('admin/profile/edit/' . $admin->id) }}" class="btn btn-dark btn-sm">
                                        <i class="ti ti-edit"></i> Edit
                                    </a>
                                </div>

                                <table class="table table-borderless mb-0">
                                    <tr>
                                        <td class="fw-medium text-muted" width="40%">Username</td>
                                        <td>{{ $admin->name }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium text-muted">Nomor Induk Mahasiswa</td>
                                        <td>{{ $admin->nim }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-medium text-muted">Email</td>
                                        <td>{{ $admin->email }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
