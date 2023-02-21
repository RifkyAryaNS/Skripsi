<?php if ($this->session->userdata('email')) { ?>
    <!-- MENU NAVIGASI -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <button class="btn btn-primary" href="<?= base_url('para_pegawai/beranda/index'); ?>" type="button"><i class="bi bi-house-door-fill"></i> Beranda</button>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('para_pegawai/lihat_nilai/index'); ?>" type="button"><i class="bi bi-house-door-fill"></i> Lihat Nilai</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
            </div>
        </div>
    </nav>
    <!-- KONTEN -->
    <div class="container-fluid">
        <h2>Beranda</h2>
    </div>
    <br>
    <br>
    <center>
        <h2>Selamat Datang <?= $user['username']; ?>.</h2>
        <p>Jangan Lupa <b>LOGOUT</b> Apabila Telah Selesai Menggunakan Aplikasi Ini.<br>
            Apabila Ada Masalah Dalam Penggunaannya,Silahkan Hubungi Administrator Aplikasi Ini.</p>
    <?php } else { ?>
        <div class="container mt-5">
            <div class="alert alert-danger" role="alert">
                <p class="text-center">
                    Silakan login terlebih dahulu!
                </p>
            </div>
        </div>
    <?php } ?>