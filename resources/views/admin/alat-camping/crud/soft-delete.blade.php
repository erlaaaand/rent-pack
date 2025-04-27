<div class="container">
    <h1>Data Alat Camping yang Terhapus</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row" id="alatContainer">
        @foreach ($alatTrashed as $alat)
            <div class="col-md-4 mb-4 alat-item" data-kategori="{{ $alat->kategori }}">
                <div class="card alat-card shadow-sm">
                    @if ($alat->gambar)
                        <img src="{{ asset('storage/' . $alat->gambar) }}" class="card-img-top" alt="Gambar Alat">
                    @else
                        <img src="https://source.unsplash.com/400x250/?camping,gear" class="card-img-top"
                            alt="Default Image">
                    @endif

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $alat->nama_alat }}</h5>
                        <p class="card-text deskripsi">{{ $alat->deskripsi }}</p>
                        <p class="card-text mt-auto">
                            <strong>Harga:</strong> Rp{{ number_format($alat->harga_sewa, 0, ',', '.') }}/hari
                        </p>

                        <div class="d-flex gap-2 mt-3">
                            <!-- Tombol Restore -->
                            <form action="{{ route('alat-camping.restore', $alat->id) }}" method="POST" class="w-50">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success w-100">Restore</button>
                            </form>

                            <!-- Tombol Hapus Permanen -->
                            <form action="{{ route('alat-camping.forceDelete', $alat->id) }}" method="POST"
                                class="w-50">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100"
                                    onclick="return confirm('Yakin ingin hapus permanen?')">Hapus</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if ($alatTrashed->isEmpty())
        <div class="text-center mt-5">
            <h4>Belum ada alat yang dihapus.</h4>
        </div>
    @endif

</div>
