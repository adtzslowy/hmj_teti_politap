<x-admin>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="card shadow-sm">
                <div class="card-header bg-dark">
                    <h3 class="text-white fw-semibold mb-0">Akses Admin</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/tambah-admin/') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
                            @foreach ($errors->all() as $err)
                                <div class="alert alert-danger">
                                    {{ $err }}
                                </div>
                            @endforeach
                        @endif

                        <div class="row align-items-center">
                            {{-- foto profil --}}
                            <div class="col-md-6 text-center border-end">
                                <img id="preview" src=""
                                    style="max-width: 200px; margin-top: 10px; display: none;"
                                    alt="Preview Foto">
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama mahasiswa" required>
                                </div>

                                <div class="mb-3">
                                    <label for="nim" class="form-label">Nomor Induk Mahasiswa</label>
                                    <input type="text" name="nim" class="form-control" placeholder="Masukkan nomor induk mahasiswa" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
                                </div>

                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <select name="role" id="role" class="form-select" required>
                                        <option value="" disabled selected>Masukkan role</option>
                                        <option value="Operator">Operator</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" value="default1234">
                                </div>

                                <div class="mb-3">
                                    <label for="foto_profil" class="form-label">Profile Picture</label>
                                    <input type="file" name="foto_profil" id="foto_profil"
                                        class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-3">
                            <a href="{{ url('admin/tambah-admin') }}" class="btn btn-dark">
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
    </div>

    {{-- Script preview foto --}}
    <script>
        const inputFoto = document.getElementById('foto_profil');
        const preview = document.getElementById('preview');

        inputFoto.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.src = "";
                preview.style.display = 'none';
            }
        });
    </script>
</x-admin>
