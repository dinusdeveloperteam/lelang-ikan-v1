<nav class="sidebar sidebar-offcanvas fixed-left" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="<?= base_url('dashboard.php') ?>" class="nav-link">
                <div class="nav-profile-image">
                    <img src="<?= ($user->foto != "" ? base_url($user->foto) : base_url('vendors/uploads/panitia/profile.png')) ?>" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">Panitia</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?= base_url('panitia/dashboard') ?>">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#kelola-lelang" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Kelola Lelang</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi mdi-account-multiple menu-icon"></i>
            </a>
            <div class="collapse" id="kelola-lelang">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pelelang') ?>">Pelelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/peserta') ?>">Peserta Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/Pembukaanlelang') ?>">Pembukaan & Penawaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pemenang') ?>">Pemenang Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/penerima') ?>">Penerima Lelang</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#pembayaran" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Pembayaran</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-wallet menu-icon"></i>
            </a>
            <div class="collapse" id="pembayaran">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/pembayaran') ?>">Pembayaran Lelang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/hasillelang') ?>">Hasil Lelang</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#Deposit" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Deposit</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-cash-usd menu-icon"></i>
            </a>
            <div class="collapse" id="Deposit">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/deposit') ?>">Peserta Deposit</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="<?= base_url('panitia/pengiriman') ?>">
                <span class="menu-title">Pengiriman</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-truck-delivery menu-icon"></i>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" data-toggle="collapse" href="#riwayat" aria-expanded="false" aria-controls="ui-basic1">
                <span class="menu-title">Riwayat</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-wallet menu-icon"></i>
            </a>
            <div class="collapse" id="riwayat">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/riwayatbid') ?>">Riwayat Bid</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('panitia/riwayat') ?>">Riwayat Lelang</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>