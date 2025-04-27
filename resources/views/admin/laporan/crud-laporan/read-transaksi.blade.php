<h2 class="text-center mb-4">Laporan Transaksi</h2>

<div class="row mb-3">
    <div class="col-md-6">
        <input type="text" id="searchTransaction" class="form-control" placeholder="Cari ID, nama pelanggan, status...">
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-hover table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Tanggal Transaksi</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="transactionTableBody">
            <tr>
                <td>1</td>
                <td>TRX001</td>
                <td>John Doe</td>
                <td>2023-01-01</td>
                <td>Rp 1.000.000</td>
                <td><span class="badge bg-success">Selesai</span></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-primary">Detail</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>TRX002</td>
                <td>Jane Smith</td>
                <td>2023-01-02</td>
                <td>Rp 500.000</td>
                <td><span class="badge bg-warning text-dark">Pending</span></td>
                <td class="text-center">
                    <button class="btn btn-sm btn-primary">Detail</button>
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </td>
            </tr>
            <!-- Tambahkan data dinamis di sini -->
        </tbody>
    </table>
</div>


<script>
    $(document).ready(function() {
        $("#searchTransaction").on("keyup", function() {
            const value = $(this).val().toLowerCase();
            $("#transactionTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
