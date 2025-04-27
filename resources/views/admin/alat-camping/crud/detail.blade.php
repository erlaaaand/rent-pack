@php
    $kategoriLabels = [
        'tent' => 'Tent and Accessories',
        'sleeping' => 'Sleeping Equipment',
        'cooking' => 'Cooking Equipment',
        'lighting' => 'Lighting',
        'backpack' => 'Backpack',
        'safety' => 'Safety Gear',
        'navigation' => 'Navigation and Tools',
    ];
@endphp

<div class="container mt-5 mb-5">
    <div class="row g-5">
        <!-- Gambar -->
        <div class="col-md-6">
            @if ($alatCamping->gambar)
                <img src="{{ asset('storage/' . $alatCamping->gambar) }}" class="img-fluid rounded shadow-sm"
                    alt="Gambar Alat">
            @else
                <img src="https://source.unsplash.com/800x500/?camping,gear" class="img-fluid rounded shadow-sm"
                    alt="Gambar Alat">
            @endif
        </div>

        <!-- Detail -->
        <div class="col-md-6">
            @if ($alatCamping)
                <h2 id="namaAlatDisplay" class="fw-bold">{{ $alatCamping->nama_alat }}</h2>
                <p id="deskripsiDisplay" class="text-muted">{{ $alatCamping->deskripsi }}</p>
                <p><strong>Jumlah Barang:</strong> <span id="jumlahBarang">{{ $alatCamping->jumlah }}</span></p>
                <p><strong>Kategori:</strong>
                    <span id="kategoriDisplay" data-kategori-asli="{{ $alatCamping->kategori }}">
                        {{ $kategoriLabels[$alatCamping->kategori] ?? 'Kategori Tidak Diketahui' }}
                    </span>
                </p>
                <p><strong>Harga Sewa:</strong> <span id="hargaDisplay">
                        {{ 'Rp' . number_format($alatCamping->harga_sewa, 0, ',', '.') . '/hari' }}
                    </span></p>

                <button id="editBtn" type="button" class="btn btn-outline-primary mt-3">Edit</button>
                <button type="button" class="btn btn-primary mt-3" id="backBtn"
                    onclick="history.back()">Back</button>
            @else
                <p class="text-muted">Data alat camping tidak tersedia.</p>
                <button type="button" class="btn btn-primary mt-3" onclick="history.back()">Back</button>
            @endif
        </div>
    </div>
</div>

<!-- Form Edit -->
<div id="formEdit" class="mt-5" style="display: none;">
    <h4 class="mb-4 fw-semibold">Edit Alat Camping</h4>
    <form id="editForm">
        @csrf
        <div class="mb-3">
            <label for="namaEdit" class="form-label">Nama Alat</label>
            <input type="text" class="form-control" id="namaEdit" name="nama_alat">
        </div>
        <div class="mb-3">
            <label for="deskripsiEdit" class="form-label">Deskripsi</label>
            <textarea class="form-control" id="deskripsiEdit" name="deskripsi" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="jumlahEdit" class="form-label">Jumlah Barang</label>
            <input type="number" class="form-control" id="jumlahEdit" name="jumlah">
        </div>
        <div class="mb-3">
            <label for="kategoriEdit" class="form-label">Kategori</label>
            <select class="form-select" id="kategoriEdit" name="kategori">
                @foreach ($kategoriLabels as $key => $label)
                    <option value="{{ $key }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="hargaEdit" class="form-label">Harga Sewa / Hari</label>
            <input type="text" class="form-control" id="hargaEdit" name="harga_sewa">
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <button type="button" class="btn btn-secondary" id="cancelBtn">Batal</button>
        </div>
    </form>
</div>

<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script>
    // Helper: Format angka jadi Rupiah
    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka);
    }

    $(document).ready(function() {
        const hargaInput = document.getElementById('hargaEdit');

        // Cegah angka minus dan format saat input
        hargaInput.addEventListener('input', function() {
            let value = this.value.replace(/[^\d]/g, '');
            this.value = value ? formatRupiah(value) : '';
        });

        $('#editBtn').click(function() {
            // Ambil data dari tampilan
            $('#namaEdit').val($('#namaAlatDisplay').text());
            $('#deskripsiEdit').val($('#deskripsiDisplay').text());
            $('#jumlahEdit').val($('#jumlahBarang').text());

            // Format harga dari tampilan
            const hargaAngka = $('#hargaDisplay').text().replace(/[^\d]/g, '');
            $('#hargaEdit').val(formatRupiah(hargaAngka));

            // Set kategori
            $('#kategoriEdit').val($('#kategoriDisplay').data('kategori-asli'));

            // Tampilkan form edit
            $('#formEdit').slideDown();
            $('html, body').animate({
                scrollTop: $('#formEdit').offset().top
            }, 500);
        });

        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            const id = '{{ $alatCamping->id }}';
            const data = {
                nama_alat: $('#namaEdit').val(),
                deskripsi: $('#deskripsiEdit').val(),
                kategori: $('#kategoriEdit').val(),
                jumlah: $('#jumlahEdit').val(),
                harga_sewa: $('#hargaEdit').val().replace(/\D/g, ''),
                _token: '{{ csrf_token() }}'
            };

            $.ajax({
                url: '/alat-camping/' + id,
                method: 'PUT',
                data: data,
                success: function(response) {
                    $('#namaAlatDisplay').text(response.nama_alat);
                    $('#deskripsiDisplay').text(response.deskripsi);
                    $('#kategoriDisplay').text(response.kategori_label);
                    $('#jumlahBarang').text(response.jumlah);
                    $('#hargaDisplay').text(formatRupiah(response.harga_sewa) + '/hari');

                    $('#formEdit').slideUp();
                    $('#editForm')[0].reset();
                },
                error: function(xhr) {
                    alert('Gagal update data: ' + (xhr.responseJSON?.message ||
                        'Terjadi kesalahan'));
                }
            });
        });

        $('#cancelBtn').on('click', function() {
            $('#formEdit').slideUp();
        });
    });
</script>

<!-- CSS -->
<style>
    #formEdit input:focus,
    #formEdit textarea:focus,
    #formEdit select:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }
</style>
