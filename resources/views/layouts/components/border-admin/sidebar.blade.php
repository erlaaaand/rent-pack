<!-- Sidebar untuk Admin Pengelola Alat Camping -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ route('admin.dashboard') }}"
                class="logo d-flex align-items-center text-decoration-none px-3 py-2 text-white w-100"
                style="max-width: 100%; overflow: hidden; transition: background-color 0.3s ease;">
                <div class="d-flex align-items-center justify-content-center bg-white bg-opacity-10 rounded-circle flex-shrink-0 me-2"
                    style="width: 36px; height: 36px; transition: background-color 0.3s ease;">
                    <img src="{{ asset('assets/img/admin/gear.svg') }}" alt="Admin Icon"
                        style="width: 60%; height: 60%; filter: brightness(0) invert(1); transition: transform 0.3s ease;">
                </div>
                <span class="fw-semibold d-none d-md-inline text-truncate"
                    style="max-width: 100%; white-space: nowrap; transition: color 0.3s ease;">
                    Rent Pack Admin
                </span>
            </a>

            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar"><i class="gg-menu-right"></i></button>
                <button class="btn btn-toggle sidenav-toggler"><i class="gg-menu-left"></i></button>
            </div>
            <button class="topbar-toggler more"><i class="gg-more-vertical-alt"></i></button>
        </div>
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                <!-- Dashboard -->
                <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <!-- Manajemen Alat -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                    <h4 class="text-section">Manajemen</h4>
                </li>

                <!-- Alat Camping -->
                <li class="nav-item {{ request()->routeIs('alat-camping.*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#alatCamping"
                        class="{{ request()->routeIs('alat-camping.*') ? '' : 'collapsed' }}">
                        <i class="fas fa-compass"></i>
                        <p>Alat Camping</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('alat-camping.*') ? 'show' : '' }}" id="alatCamping">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('alat-camping.create') ? 'active' : '' }}">
                                <a href="{{ route('alat-camping.create') }}">
                                    <span class="sub-item">Tambah Alat</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('alat-camping.index') ? 'active' : '' }}">
                                <a href="{{ route('alat-camping.index') }}">
                                    <span class="sub-item">Daftar Alat</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('alat-camping.trashed') ? 'active' : '' }}">
                                <a href="{{ route('alat-camping.trashed') }}">
                                    <span class="sub-item">Data Terhapus</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Riwayat Peminjaman -->
                <li class="nav-item {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#riwayatPeminjaman"
                        class="{{ request()->routeIs('peminjaman.*') ? '' : 'collapsed' }}">
                        <i class="fas fa-history"></i>
                        <p>Riwayat Peminjaman</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('peminjaman.*') ? 'show' : '' }}"
                        id="riwayatPeminjaman">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('peminjaman.riwayat') ? 'active' : '' }}">
                                <a href="{{ route('peminjaman.riwayat') }}">
                                    <span class="sub-item">Daftar Riwayat</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('peminjaman.belum-dikembalikan') ? 'active' : '' }}">
                                <a href="{{ route('peminjaman.belum-dikembalikan') }}">
                                    <span class="sub-item">Belum Dikembalikan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Pengguna -->
                <li class="nav-item {{ request()->routeIs('pengguna.*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#pengguna"
                        class="{{ request()->routeIs('pengguna.*') ? '' : 'collapsed' }}">
                        <i class="fas fa-users"></i>
                        <p>Pengguna</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('pengguna.*') ? 'show' : '' }}" id="pengguna">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('pengguna.list') ? 'active' : '' }}">
                                <a href="{{ route('pengguna.list') }}">
                                    <span class="sub-item">Daftar Pengguna</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Laporan -->
                <li class="nav-item {{ request()->routeIs('laporan.*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#laporan"
                        class="{{ request()->routeIs('laporan.*') ? '' : 'collapsed' }}">
                        <i class="fas fa-file-alt"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->routeIs('laporan.*') ? 'show' : '' }}" id="laporan">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->routeIs('laporan.transaksi') ? 'active' : '' }}">
                                <a href="{{ route('laporan.transaksi') }}">
                                    <span class="sub-item">Laporan Transaksi</span>
                                </a>
                            </li>
                            <li class="{{ request()->routeIs('laporan.stok') ? 'active' : '' }}">
                                <a href="{{ route('laporan.stok') }}">
                                    <span class="sub-item">Laporan Stok Alat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Log -->
                <li class="nav-item {{ request()->routeIs('admin.log') ? 'active' : '' }}">
                    <a href="{{ route('admin.log') }}">
                        <i class="fas fa-history"></i>
                        <p>Log Aktivitas</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
