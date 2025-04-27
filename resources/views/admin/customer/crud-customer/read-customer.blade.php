<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold">Daftar Akun Pengguna</h2>

    <div class="d-flex justify-content-between mb-3">
        <input type="text" id="searchUser" class="form-control w-50" placeholder="Cari nama atau email...">
        <a href="{{ route('users.download') }}" class="btn btn-success ms-2">
            <i class="fas fa-download"></i> Unduh Data
        </a>
    </div>

    <div id="userTableContainer" class="table-responsive shadow-sm rounded">
        @include('admin.customer.partials.table', ['users' => $users])  <!-- Partial view -->
    </div>
</div>

<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>

<script>
    $(document).ready(function() {
        // Fitur pencarian
        $("#searchUser").on("keyup", function() {
            const value = $(this).val().toLowerCase();
            $("#userTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });

        // AJAX pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#userTableContainer').html(data.view); // Update table content
                }
            });
        });
    });
</script>
