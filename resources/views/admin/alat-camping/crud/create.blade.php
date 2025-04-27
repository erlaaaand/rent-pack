<style>
    .form-floating label {
        color: #6c757d;
    }

    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.15);
    }

    .btn-primary {
        border-radius: 0.5rem;
    }

    h1 {
        font-size: 1.8rem;
    }
</style>

<div class="container form-container">
    <div class="text-center mb-4">
        <h1 class="fw-bold">Tambah Alat Camping</h1>
    </div>

    <form>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="namaAlat" placeholder="Masukkan nama alat">
            <label for="namaAlat">Nama Alat</label>
        </div>

        <div class="form-floating mb-3">
            <select class="form-select" id="kategoriAlat">
                <option selected disabled>Pilih kategori</option>
                <option value="tenda">Tent and Accessories</option>
                <option value="matras">Sleeping Equipment</option>
                <option value="kompor">Cooking Equipment</option>
                <option value="gas">Lighting</option>
                <option value="lainnya">Backpack</option>
                <option value="lainnya">Safety Gear</option>
                <option value="lainnya">Navigation and Tools</option>
            </select>
            <label for="kategoriAlat">Kategori</label>
        </div>

        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="jumlahAlat" placeholder="Masukkan jumlah alat"
                min="0">
            <label for="jumlahAlat">Jumlah</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="hargaSewa" placeholder="Masukkan harga sewa">
            <label for="hargaSewa">Harga Sewa / Hari</label>
        </div>

        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Masukkan deskripsi alat" id="deskripsiAlat" style="height: 100px"></textarea>
            <label for="deskripsiAlat">Deskripsi</label>
        </div>

        <div class="mb-4">
            <label for="gambarAlat" class="form-label">Gambar Alat</label>
            <input class="form-control" type="file" id="gambarAlat">
        </div>

        <button type="submit" class="btn btn-primary w-100 py-2">Tambah Alat</button>
    </form>
</div>

<script>
    // Mencegah angka minus
    document.getElementById('jumlahAlat').addEventListener('input', function() {
        if (this.value < 0) this.value = 0;
    });

    // Format Rupiah saat input
    const hargaInput = document.getElementById('hargaSewa');
    hargaInput.addEventListener('input', function() {
        let value = this.value.replace(/[^\d]/g, '');
        if (!value) {
            this.value = '';
            return;
        }
        this.value = formatRupiah(value);
    });

    function formatRupiah(angka) {
        return new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(angka);
    }
</script>
