<!-- Sidebar untuk Admin Pengelola Alat Camping -->
<!-- Versi 6 -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="{{ url('/admin') }}"
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
                <li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#dashboard"
                        aria-expanded="{{ request()->is('admin') ? 'true' : 'false' }}"
                        class="{{ request()->is('admin') ? '' : 'collapsed' }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('admin') ? 'show' : '' }}" id="dashboard">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('admin') ? 'active' : '' }}">
                                <a href="{{ url('/admin') }}">
                                    <span class="sub-item">Ringkasan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Manajemen Alat -->
                <li class="nav-section">
                    <span class="sidebar-mini-icon"><i class="fa fa-ellipsis-h"></i></span>
                    <h4 class="text-section">Manajemen</h4>
                </li>

                <!-- Alat Camping -->
                <li class="nav-item {{ request()->is('alat') || request()->is('alat/*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#alat"
                        class="{{ request()->is('alat') || request()->is('alat/*') ? '' : 'collapsed' }}">
                        <i class="fas fa-compass"></i>
                        <p>Alat Camping</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('alat') || request()->is('alat/*') ? 'show' : '' }}"
                        id="alat">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('alat/tambah') ? 'active' : '' }}">
                                <a href="{{ url('/alat/tambah') }}">
                                    <span class="sub-item">Tambah Alat</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('alat/daftar') ? 'active' : '' }}">
                                <a href="{{ url('/alat/daftar') }}">
                                    <span class="sub-item">Daftar Alat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Riwayat Peminjaman -->
                <li
                    class="nav-item {{ request()->is('peminjaman') || request()->is('peminjaman/*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#riwayatPeminjaman"
                        class="{{ request()->is('peminjaman') || request()->is('peminjaman/*') ? '' : 'collapsed' }}">
                        <i class="fas fa-history"></i>
                        <p>Riwayat Peminjaman</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('peminjaman') || request()->is('peminjaman/*') ? 'show' : '' }}"
                        id="riwayatPeminjaman">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('peminjaman/riwayat') ? 'active' : '' }}">
                                <a href="{{ url('/peminjaman/riwayat') }}">
                                    <span class="sub-item">Daftar Riwayat</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('peminjaman/belum-dikembalikan') ? 'active' : '' }}">
                                <a href="{{ url('/peminjaman/belum-dikembalikan') }}">
                                    <span class="sub-item">Daftar Riwayat Belum Dikembalikan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>


                <!-- Pengguna -->
                <li class="nav-item {{ request()->is('pengguna') || request()->is('pengguna/*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#pengguna"
                        class="{{ request()->is('pengguna') || request()->is('pengguna/*') ? '' : 'collapsed' }}">
                        <i class="fas fa-users"></i>
                        <p>Pengguna</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('pengguna') || request()->is('pengguna/*') ? 'show' : '' }}"
                        id="pengguna">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('pengguna/list') ? 'active' : '' }}">
                                <a href="{{ url('/pengguna/list') }}">
                                    <span class="sub-item">Daftar Pengguna</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Laporan -->
                <li class="nav-item {{ request()->is('laporan') || request()->is('laporan/*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#laporan"
                        class="{{ request()->is('laporan') || request()->is('laporan/*') ? '' : 'collapsed' }}">
                        <i class="fas fa-file-alt"></i>
                        <p>Laporan</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('laporan') || request()->is('laporan/*') ? 'show' : '' }}"
                        id="laporan">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('laporan/transaksi') ? 'active' : '' }}">
                                <a href="{{ url('/laporan/transaksi') }}">
                                    <span class="sub-item">Laporan Transaksi</span>
                                </a>
                            </li>
                            <li class="{{ request()->is('laporan/stok') ? 'active' : '' }}">
                                <a href="{{ url('/laporan/stok') }}">
                                    <span class="sub-item">Laporan Stok Alat</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- Log -->
                <li class="nav-item {{ request()->is('log') || request()->is('log/*') ? 'active' : '' }}">
                    <a data-bs-toggle="collapse" href="#log"
                        class="{{ request()->is('log') || request()->is('log/*') ? '' : 'collapsed' }}">
                        <i class="fas fa-history"></i>
                        <p>Log Aktivitas</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse {{ request()->is('log') || request()->is('log/*') ? 'show' : '' }}"
                        id="log">
                        <ul class="nav nav-collapse">
                            <li class="{{ request()->is('log/lihat') ? 'active' : '' }}">
                                <a href="{{ url('/log/lihat') }}">
                                    <span class="sub-item">Lihat Log</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</div>
