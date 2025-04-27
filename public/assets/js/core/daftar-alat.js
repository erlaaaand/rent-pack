$(document).ready(function () {
    const itemsPerPage = 6;
    const items = $(".alat-item").toArray();
    const pagination = $("#paginationContainer");
    const jumlahData = $("#jumlahData");

    function applyFilters() {
        const searchText = $("#searchInput").val().toLowerCase();
        const selectedKategori = $("#filterKategori").val().toLowerCase().replace(/\s/g, '');
        const sortOption = $("#sortOption").val();

        return items.filter(item => {
            const nama = $(item).find(".card-title").text().toLowerCase();
            const kategori = ($(item).data("kategori") || '').toLowerCase().replace(/\s/g, '');
            const matchSearch = !searchText || nama.includes(searchText);
            const matchKategori = !selectedKategori || kategori === selectedKategori;
            return matchSearch && matchKategori;
        }).sort((a, b) => {
            const hargaA = parseInt($(a).find(".card-text strong").next().text().replace(/\D/g, "")) || 0;
            const hargaB = parseInt($(b).find(".card-text strong").next().text().replace(/\D/g, "")) || 0;
            const namaA = $(a).find(".card-title").text().toLowerCase();
            const namaB = $(b).find(".card-title").text().toLowerCase();
            const kategoriA = ($(a).data("kategori") || '').toLowerCase().replace(/\s/g, '');
            const kategoriB = ($(b).data("kategori") || '').toLowerCase().replace(/\s/g, '');

            switch (sortOption) {
                case "hargaAsc": return hargaA - hargaB;
                case "hargaDesc": return hargaB - hargaA;
                case "namaAsc": return namaA.localeCompare(namaB);
                case "namaDesc": return namaB.localeCompare(namaA);
                case "kategoriAsc": return kategoriA.localeCompare(kategoriB);
                case "kategoriDesc": return kategoriB.localeCompare(kategoriA);
                default: return 0;
            }
        });
    }

    function renderItems(itemsToRender) {
        $(".alat-item").hide();
        $(itemsToRender).show();
    }

    function showPage(pageNumber, data) {
        const startIndex = (pageNumber - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageItems = data.slice(startIndex, endIndex);

        renderItems(pageItems);

        jumlahData.text(`Menampilkan ${pageItems.length} data`);
    }

    function generatePagination(filteredItems) {
        pagination.empty();
        const totalPages = Math.ceil(filteredItems.length / itemsPerPage);

        for (let i = 1; i <= totalPages; i++) {
            const pageItem = $(`<li class="page-item"><a class="page-link" href="#">${i}</a></li>`);
            if (i === 1) pageItem.addClass("active");
            pagination.append(pageItem);
        }

        pagination.find(".page-link").on("click", function (e) {
            e.preventDefault();
            const page = parseInt($(this).text());
            pagination.find(".page-item").removeClass("active");
            $(this).parent().addClass("active");
            const filteredItems = applyFilters();
            showPage(page, filteredItems);
        });
    }

    function updateDisplay() {
        const filteredItems = applyFilters();
        showPage(1, filteredItems);
        generatePagination(filteredItems);
    }

    $("#searchInput, #filterKategori, #sortOption").on("input change", updateDisplay);

    $("#resetButton").click(function () {
        $("#searchInput").val('');
        $("#filterKategori").val('');
        $("#sortOption").val('');
        updateDisplay();
    });

    updateDisplay();
});
