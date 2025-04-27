<div class="col-12">
    <div class="card card-round rounded-4 shadow-sm border-0">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div class="card-title mb-0">Riwayat Peminjaman Barang Terbaru</div>
            <div class="dropdown">
                <button class="btn btn-icon btn-clean me-0" type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-h"></i>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Export PDF</a>
                    <a class="dropdown-item" href="#">Filter</a>
                    <a class="dropdown-item" href="#">Lihat Semua</a>
                </div>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="px-3 pt-3">
            <div class="input-group mb-3">
                <span class="input-group-text bg-light text-dark border-end-0">
                    <i class="fa fa-search"></i>
                </span>
                <input type="text" id="searchInput" class="form-control border-start-0" placeholder="Cari nama peminjam atau nama barang...">
            </div>
        </div>

        <!-- Table -->
        <div class="card-body p-0">
            <div class="table-responsive" style="max-height: 350px; overflow-y: auto;">
                <table class="table table-hover align-middle mb-0">
                    <thead class="thead-light sticky-top bg-white shadow-sm" style="z-index: 1;">
                        <tr>
                            <th style="position: sticky; top: 0; background: white;">Nama Peminjam</th>
                            <th class="text-end" style="position: sticky; top: 0; background: white;">Nama Barang</th>
                            <th class="text-end" style="position: sticky; top: 0; background: white;">Tanggal Pinjam</th>
                            <th class="text-end" style="position: sticky; top: 0; background: white;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Ahmad Ramadhan</td>
                            <td class="text-end">Tenda Dome Kapasitas 4 Orang</td>
                            <td class="text-end">2025-04-20</td>
                            <td class="text-end"><span class="badge bg-warning">Diproses</span></td>
                        </tr>
                        <tr>
                            <td>Siti Nurhaliza</td>
                            <td class="text-end">Sleeping Bag Polar</td>
                            <td class="text-end">2025-04-18</td>
                            <td class="text-end"><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>Bagus Wijaya</td>
                            <td class="text-end">Kompor Portable Camping</td>
                            <td class="text-end">2025-04-17</td>
                            <td class="text-end"><span class="badge bg-danger">Dibatalkan</span></td>
                        </tr>
                        <tr>
                            <td>Nadia Zahrani</td>
                            <td class="text-end">Carrier 60L Hiking</td>
                            <td class="text-end">2025-04-19</td>
                            <td class="text-end"><span class="badge bg-success">Selesai</span></td>
                        </tr>
                        <tr>
                            <td>Rizky Febrian</td>
                            <td class="text-end">Matras Lipat Outdoor</td>
                            <td class="text-end">2025-04-21</td>
                            <td class="text-end"><span class="badge bg-warning">Diproses</span></td>
                        </tr>
                        <tr>
                            <td>Rizka Ramadhani</td>
                            <td class="text-end">Flysheet Anti Air</td>
                            <td class="text-end">2025-04-22</td>
                            <td class="text-end"><span class="badge bg-warning">Diproses</span></td>
                        </tr>
                        <tr>
                            <td>Friska Rama</td>
                            <td class="text-end">Headlamp Waterproof</td>
                            <td class="text-end">2025-04-23</td>
                            <td class="text-end"><span class="badge bg-warning">Diproses</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- No Result Message -->
            <div id="noResult" class="text-center py-3 text-muted" style="display: none;">
                <i class="fa fa-exclamation-circle me-2"></i>Data tidak ditemukan.
            </div>
        </div>
    </div>
</div>

<!-- Script Filter (Search Logic + No Result) -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const rows = document.querySelectorAll('tbody tr');
        const noResult = document.getElementById('noResult');

        searchInput.addEventListener('keyup', function () {
            const keyword = this.value.toLowerCase();
            let visibleCount = 0;

            rows.forEach(row => {
                const rowText = row.innerText.toLowerCase();
                if (rowText.includes(keyword)) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });

            noResult.style.display = visibleCount === 0 ? 'block' : 'none';
        });
    });
</script>
