<h3 class="text-center mb-4">Stok Alat Tersedia</h3>

<div class="row mb-3">
    <div class="col-md-6">
        <input type="text" id="searchTool" class="form-control" placeholder="Cari nama atau deskripsi alat...">
    </div>
</div>

<div class="table-responsive">
    <table class="table table-striped table-bordered table-hover align-middle">
        <thead class="table-primary text-center">
            <tr>
                <th>No</th>
                <th>Nama Alat</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
            </tr>
        </thead>
        <tbody id="toolTableBody">
            <tr>
                <td>1</td>
                <td>Nama Alat</td>
                <td>Deskripsi singkat alat</td>
                <td class="text-center"><span class="badge bg-success fs-6">10</span></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Nama Alat 2</td>
                <td>Deskripsi singkat alat lainnya</td>
                <td class="text-center"><span class="badge bg-success fs-6">5</span></td>
            </tr>
            <!-- Tambah alat lain di sini -->
        </tbody>
    </table>
</div>


<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $("#searchTool").on("keyup", function() {
            const value = $(this).val().toLowerCase();
            $("#toolTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
