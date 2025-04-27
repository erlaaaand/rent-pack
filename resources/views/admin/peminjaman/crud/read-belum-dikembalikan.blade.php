<h1 class="mb-3">Daftar Peminjam Belum Mengembalikan Barang</h1>
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
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-primary text-center">
                <tr>
                    <th>No</th>
                    <th>Nama Peminjam</th>
                    <th>Nama Barang</th>
                    <th>Tanggal Pinjam</th>
                    <th>Estimasi Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody id="tableBody">
                <tr>
                    <td>1</td>
                    <td>Jane Smith</td>
                    <td>Kamera DSLR</td>
                    <td>2023-01-10</td>
                    <td>2023-01-15</td>
                    <td><span class="badge bg-warning text-dark">Belum Dikembalikan</span></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-success btn-validasi" data-id="1" data-nama="Jane Smith" data-barang="Kamera DSLR">Validasi</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Ahmad Rizky</td>
                    <td>Tripod</td>
                    <td>2023-01-12</td>
                    <td>2023-01-18</td>
                    <td><span class="badge bg-warning text-dark">Belum Dikembalikan</span></td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-success btn-validasi" data-id="2" data-nama="Ahmad Rizky" data-barang="Tripod">Validasi</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Validasi -->
<div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="validasiModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="formValidasi">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="validasiModalLabel">Validasi Pengembalian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <p><strong>Nama Peminjam:</strong> <span id="modalNamaPeminjam"></span></p>
          <p><strong>Nama Barang:</strong> <span id="modalNamaBarang"></span></p>
          <div class="mb-3">
            <label class="form-label">Kondisi Barang</label>
            <select class="form-select" id="kondisiBarang" required>
              <option value="">-- Pilih Kondisi --</option>
              <option value="Aman">Aman</option>
              <option value="Rusak Ringan">Rusak Ringan</option>
              <option value="Rusak Berat">Rusak Berat</option>
              <option value="Hilang">Hilang</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="catatan" class="form-label">Catatan (Opsional)</label>
            <textarea class="form-control" id="catatan" rows="3" placeholder="Tambahkan catatan jika perlu..."></textarea>
          </div>
          <input type="hidden" id="peminjamanId">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Bootstrap 5 + jQuery -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>

<!-- Script -->
<script>
    $(document).ready(function() {
        const validasiModal = new bootstrap.Modal(document.getElementById('validasiModal'));

        // Search filter
        $('#searchBar').on('keyup', function() {
            const value = $(this).val().toLowerCase();
            $('#tableBody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });

        // Tampilkan modal validasi
        $('.btn-validasi').on('click', function() {
            const id = $(this).data('id');
            const nama = $(this).data('nama');
            const barang = $(this).data('barang');

            $('#peminjamanId').val(id);
            $('#modalNamaPeminjam').text(nama);
            $('#modalNamaBarang').text(barang);
            $('#kondisiBarang').val('');
            $('#catatan').val('');

            validasiModal.show();
        });

        // Submit validasi
        $('#formValidasi').on('submit', function(e) {
            e.preventDefault();
            const id = $('#peminjamanId').val();
            const kondisi = $('#kondisiBarang').val();
            const catatan = $('#catatan').val();

            console.log('Validasi ID:', id, 'Kondisi:', kondisi, 'Catatan:', catatan);

            // Simulasi kirim ke server
            // $.post('/peminjaman/validasi/' + id, { kondisi, catatan, _token: '{{ csrf_token() }}' }, function(response) {
            //     location.reload();
            // });

            validasiModal.hide();
            alert('Validasi berhasil disimpan!');
        });
    });
</script>
