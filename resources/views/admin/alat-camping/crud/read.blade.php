<div class="container">
    <h1 class="mb-4 text-center fw-bold">Daftar Alat</h1>

    <!-- Filter, Search, Sort -->
    <div class="row mb-4">
        <div class="col-md-3 mb-2">
            <input type="text" id="searchInput" class="form-control" placeholder="Cari nama alat...">
        </div>
        <div class="col-md-3 mb-2">
            <select id="filterKategori" class="form-select">
                <option value="" selected>Pilih kategori</option>
                <option value="tent">Tent and Accessories</option>
                <option value="sleeping">Sleeping Equipment</option>
                <option value="cooking">Cooking Equipment</option>
                <option value="lighting">Lighting</option>
                <option value="backpack">Backpack</option>
                <option value="safety">Safety Gear</option>
                <option value="navigation">Navigation and Tools</option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <select id="sortOption" class="form-select">
                <option value="" selected>Urutkan</option>
                <option value="hargaAsc">Harga Terendah</option>
                <option value="hargaDesc">Harga Tertinggi</option>
                <option value="namaAsc">Nama A-Z</option>
                <option value="namaDesc">Nama Z-A</option>
                <option value="kategoriAsc">Kategori A-Z</option>
                <option value="kategoriDesc">Kategori Z-A</option>
            </select>
        </div>
        <div class="col-md-3 mb-2">
            <button id="resetButton" class="btn btn-secondary w-100">Reset Filter</button>
        </div>
    </div>

    <!-- Jumlah Data -->
    <div class="mb-3">
        <p id="jumlahData" class="text-muted"></p>
    </div>

    <!-- Alat List -->
    @if ($alatCamping->isEmpty())
        <div class="row">
            <div class="col-12 text-center">
                <p class="text-muted">Data tidak ditemukan.</p>
            </div>
        </div>
    @else
        <div class="row" id="alatContainer">
            @foreach ($alatCamping as $alat)
                <div class="col-md-4 mb-4 alat-item" data-kategori="{{ $alat->kategori }}">
                    <div class="card alat-card shadow-sm">
                        @if ($alat->gambar)
                            <img src="{{ asset('storage/' . $alat->gambar) }}" class="card-img-top" alt="Gambar Alat">
                        @else
                            <img src="https://source.unsplash.com/400x250/?camping,gear" class="card-img-top"
                                alt="Default Image">
                        @endif

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $alat->nama_alat }}</h5>
                            <p class="card-text deskripsi">{{ $alat->deskripsi }}</p>
                            <p class="card-text mt-auto">
                                <strong>Harga:</strong> Rp{{ number_format($alat->harga_sewa, 0, ',', '.') }}/hari
                            </p>
                            <div class="d-flex gap-2 mt-3">
                                <a href="{{ route('alatCamping.show', $alat->id) }}"
                                    class="btn btn-outline-primary w-50">Detail</a>
                                <form action="{{ route('alat-camping.softDelete', $alat->id) }}" method="POST"
                                    class="w-50" id="softDeleteForm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-warning w-100" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
        <nav>
            <ul class="pagination" id="paginationContainer"></ul>
        </nav>
    </div>
</div>

<!-- jQuery -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>

<!-- Script Filter, Sort, Search, Pagination -->
<script src="{{ asset('assets/js/core/daftar-alat.js') }}"></script>

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('assets/css/daftar-alat.css') }}">

<script>
    // Menangani klik tombol Hapus di modal
    var deleteButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
    deleteButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            var form = this.closest('form');
            // Simpan form yang terkait dengan tombol
            var action = form.getAttribute('action');
            // Set form action di modal
            document.getElementById('deleteForm').action = action;
        });
    });
</script>

<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm"> <!-- Sesuaikan ukuran modal dengan modal-sm -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini (soft delete)?
            </div>
            <div class="modal-footer">
                <!-- Form untuk soft delete -->
                <form id="deleteForm" method="POST" class="w-100">
                    @csrf
                    @method('DELETE')
                    <!-- Tombol Batal dan Hapus -->
                    <div class="d-flex w-100 gap-2">
                        <button type="button" class="btn btn-secondary w-50" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning w-50">Hapus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
