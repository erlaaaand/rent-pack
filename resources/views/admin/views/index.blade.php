@extends('layouts.template.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Header Main -->
    @include('layouts.components.content-admin.header')
    <!-- end header main -->

    <!-- main -->
    <div class="row">
        <!-- barang sewa section -->
        @include('layouts.components.content-admin.barang-sewa')
        <!-- End barang sewa section -->

        <!-- barang rusak section -->
        @include('layouts.components.content-admin.barang-rusak')
        <!-- End barang rusak section -->

        <!-- barang sedang dipinjam section -->
        @include('layouts.components.content-admin.pinjaman-aktif')
        <!-- End Sales barang sedang dipinjam -->

        <!-- Dosen Pembimbing section -->
        @include('layouts.components.content-admin.sewa-dikembalikan')
        <!-- End Dosen Pembimbing -->
    </div>
    <!-- end main -->

    <div class="row">
        <!-- Transaction History -->
        @include('layouts.components.content-admin.daftar-pinjaman-terbaru')
        <!-- End Transaction History -->
    </div>

    <!-- main -->
    <div class="row">
        <!-- Log Activity -->
        @include('layouts.components.content-admin.logactivity')
        <!-- end Log Activity -->

        <!-- dosen aktif -->
        <div class="col-md-4">
            @include('layouts.components.content-admin.status-barang')
        </div>
        <!-- end dosen aktif -->
    </div>
    <!-- end main -->
@endsection
