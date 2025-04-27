<div class="container">
    <h1 class="mb-4 text-center fw-bold">Daftar Alat</h1>
    <div class="row" id="alatContainer">
        @foreach ($alatCamping as $alat)
            <div class="col-md-4 mb-4 alat-item">
                <div class="card alat-card shadow-sm">
                    @if ($alat->gambar)
                        <img src="{{ asset('storage/' . $alat->gambar) }}" class="card-img-top" alt="Gambar Alat">
                    @else
                        <img src="https://source.unsplash.com/400x250/?camping,gear" class="card-img-top"
                            alt="Default Image">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $alat->nama_alat }}</h5>
                        <p class="card-text">{{ $alat->deskripsi }}</p>
                        <p class="card-text"><strong>Harga:</strong>
                            Rp{{ number_format($alat->harga_sewa, 0, ',', '.') }}/hari</p>

                        <div class="d-flex gap-2">
                            <a href="{{ route('alatCamping.show', $alat->id) }}"
                                class="btn btn-outline-primary w-50">Detail</a>
                            <button class="btn btn-danger w-50">Hapus</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    <nav>
        <ul class="pagination" id="paginationContainer">
            <!-- Will be generated via jQuery -->
        </ul>
    </nav>
</div>
</div>

<!-- CSS -->
<style>
    .alat-card {
        transition: 0.3s ease;
        border: none;
        border-radius: 1rem;
    }

    .alat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .alat-card .card-img-top {
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
        height: 250px;
        object-fit: cover;
    }

    .pagination .page-link {
        border-radius: 0.5rem;
        margin: 0 3px;
        transition: all 0.2s;
    }

    .pagination .page-link:hover,
    .pagination .page-item.active .page-link {
        background-color: #0d6efd;
        color: #fff;
    }
</style>

<!-- jQuery -->
<script src="{{ asset('assets/js/core/jquery-3.7.1.min.js') }}"></script>

<!-- Pagination Script -->
<script>
    $(document).ready(function() {
        const itemsPerPage = 3;
        const items = $(".alat-item");
        const totalPages = Math.ceil(items.length / itemsPerPage);
        const pagination = $("#paginationContainer");

        function showPage(page) {
            items.hide();
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            items.slice(start, end).fadeIn();
        }

        function generatePagination() {
            pagination.empty();
            for (let i = 1; i <= totalPages; i++) {
                const pageItem = $(`<li class="page-item"><a class="page-link" href="#">${i}</a></li>`);
                if (i === 1) pageItem.addClass("active");
                pagination.append(pageItem);
            }

            pagination.find("a").click(function(e) {
                e.preventDefault();
                const page = parseInt($(this).text());
                pagination.find(".page-item").removeClass("active");
                $(this).parent().addClass("active");
                showPage(page);
            });
        }

        showPage(1);
        generatePagination();
    });
</script>
