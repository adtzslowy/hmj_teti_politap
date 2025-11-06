<x-admin>
    <div class="container-fluid">
        <div class="card shadow-sm">
            <div class="card-header bg-dark">
                <h3 class="mb-0 text-center">Detail Jabatan</h3>
            </div>
            <div class="card-body bg-light">
                <div class="row">
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <div class="form-control" >{{ $divisi->nama_divisi }}</div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ url('admin/divisi') }}" class="btn btn-dark">
                            <i class="ti ti-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-admin>
