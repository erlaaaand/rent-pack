<h1 class="mb-3">Riwayat Peminjaman Barang</h1>
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="input-group w-50">
            <input type="text" id="searchBar" class="form-control" placeholder="Cari berdasarkan nama atau barang...">
            <button class="btn btn-outline-secondary" type="button" id="searchButton">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Kondisi Barang</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <!-- Contoh data statis -->
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>Proyektor</td>
                    <td>2023-01-01</td>
                    <td>2023-01-05</td>
                    <td><span class="badge bg-success">Dikembalikan</span></td>
                    <td class="text-center">
                        <span class="badge bg-danger">Rusak</span>
                    </td>
                    <td>
                        -
                    </td>

                </tr>
                <!-- Data dinamis akan dimasukkan di sini -->
            </tbody>
        </table>
    </div>
</div>

<!-- Tambahkan jQuery dan Bootstrap JS -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        // Tooltip initialization
        $('[data-bs-toggle="tooltip"]').tooltip();

        // Search functionality
        $('#searchBar').on('keyup', function() {
            const value = $(this).val().toLowerCase();
            $('#tableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
