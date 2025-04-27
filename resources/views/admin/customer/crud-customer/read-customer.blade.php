<div class="container mt-5">
    <h2 class="mb-4 text-center fw-bold">Daftar Akun Pengguna</h2>

    <div class="d-flex justify-content-between mb-3">
        <input type="text" id="searchUser" class="form-control w-50" placeholder="Cari nama, email, atau role...">
        <button class="btn btn-success ms-2" onclick="downloadData()">
            <i class="fas fa-download"></i> Unduh Data
        </button>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody id="userTableBody">
                <tr>
                    <td>1</td>
                    <td>Jane Smith</td>
                    <td>janesmith@example.com</td>
                    <td><span class="badge bg-secondary">Pengguna</span></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Michael Brown</td>
                    <td>michaelbrown@example.com</td>
                    <td><span class="badge bg-secondary">Pengguna</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Bootstrap 5 + Font Awesome -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>
<style>
    body {
        background-color: #f8f9fa;
    }

    #searchUser {
        max-width: 400px;
    }
</style>

<script>
    // Fitur search bar
    $(document).ready(function() {
        $("#searchUser").on("keyup", function() {
            const value = $(this).val().toLowerCase();
            $("#userTableBody tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    // Download CSV
    function downloadData() {
        const data = [{
                id: 1,
                nama: "John Doe",
                email: "johndoe@example.com",
                role: "Admin"
            },
            {
                id: 2,
                nama: "Jane Smith",
                email: "janesmith@example.com",
                role: "Pengguna"
            },
            {
                id: 3,
                nama: "Michael Brown",
                email: "michaelbrown@example.com",
                role: "Pengguna"
            }
        ];

        const csvContent = "data:text/csv;charset=utf-8," + ["ID,Nama,Email,Role"]
            .concat(data.map(row => `${row.id},${row.nama},${row.email},${row.role}`))
            .join("\n");

        const encodedUri = encodeURI(csvContent);
        const link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "data_pengguna.csv");
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
    }
</script>
