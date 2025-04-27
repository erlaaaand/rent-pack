<div class="container mt-5 mb-5">
    <div class="row g-5">
        <!-- Gambar Alat -->
        <div class="col-md-6">
            <img src="https://source.unsplash.com/800x500/?camping,gear" class="img-fluid rounded shadow-sm"
                alt="Gambar Alat">
        </div>

        <!-- Detail Alat -->
        <div class="col-md-6">
            <h2 id="namaAlatDisplay" class="fw-bold">Tenda Dome 4 Orang</h2>
            <p id="deskripsiDisplay" class="text-muted">Tenda nyaman untuk 4 orang, tahan air dan cocok untuk semua musim.</p>
            <p><strong>Jumlah Barang:</strong> <span id="jumlahBarang">4</span></p>
            <p><strong>Kategori:</strong> <span id="kategoriDisplay">Tenda</span></p>
            <p><strong>Harga Sewa:</strong> <span id="hargaDisplay">Rp100.000/hari</span></p>

            <button id="editBtn" class="btn btn-outline-primary mt-3">Edit</button>
            <button type="button" class="btn btn-primary mt-3" id="backBtn" onclick="history.back()">Back</button>
        </div>
    </div>

    <!-- Form Edit (disembunyikan awalnya) -->
    <div id="formEdit" class="mt-5" style="display: none;">
        <h4 class="mb-4 fw-semibold">Edit Alat Camping</h4>
        <form id="editForm">
            <div class="mb-3">
                <label for="namaEdit" class="form-label">Nama Alat</label>
                <input type="text" class="form-control" id="namaEdit">
            </div>
            <div class="mb-3">
                <label for="deskripsiEdit" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsiEdit" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="jumlahEdit" class="form-label">Jumlah Barang</label>
                <input type="number" class="form-control" id="jumlahEdit">
            </div>
            <div class="mb-3">
                <label for="kategoriEdit" class="form-label">Kategori</label>
                <select class="form-select" id="kategoriEdit">
                    <option value="Tenda">Tenda</option>
                    <option value="Matras">Matras</option>
                    <option value="Kompor">Kompor</option>
                    <option value="Gas">Gas</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="hargaEdit" class="form-label">Harga Sewa / Hari</label>
                <input type="text" class="form-control" id="hargaEdit">
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <button type="button" class="btn btn-secondary" id="cancelBtn">Batal</button>
            </div>
        </form>
    </div>
</div>

<!-- CSS -->
<style>
    #formEdit input:focus,
    #formEdit textarea:focus,
    #formEdit select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
</style>

<!-- jQuery + Interaksi -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#editBtn').click(function() {
            // Isi form dengan data dari tampilan detail
            $('#namaEdit').val($('#namaAlatDisplay').text());
            $('#deskripsiEdit').val($('#deskripsiDisplay').text());
            $('#kategoriEdit').val($('#kategoriDisplay').text());
            $('#jumlahEdit').val($('#jumlahBarang').text());
            $('#hargaEdit').val($('#hargaDisplay').text().replace(/[^\d]/g, ''));

            // Tampilkan form edit
            $('#formEdit').slideDown();
            $('html, body').animate({
                scrollTop: $('#formEdit').offset().top
            }, 500);
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            // Ambil nilai dari form
            const nama = $('#namaEdit').val();
            const deskripsi = $('#deskripsiEdit').val();
            const kategori = $('#kategoriEdit').val();
            const jumlah = $('#jumlahEdit').val();
            const harga = $('#hargaEdit').val();

            // Update tampilan detail
            $('#namaAlatDisplay').text(nama);
            $('#deskripsiDisplay').text(deskripsi);
            $('#kategoriDisplay').text(kategori);
            $('#jumlahBarang').text(jumlah);
            $('#hargaDisplay').text(formatRupiah(harga) + '/hari');

            // Sembunyikan form edit
            $('#formEdit').slideUp();
            $('#editForm')[0].reset(); // Optional: reset isi form
        });

        $('#cancelBtn').on('click', function() {
            $('#formEdit').slideUp();
        });

        function formatRupiah(angka) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0
            }).format(angka);
        }
    });
</script>
