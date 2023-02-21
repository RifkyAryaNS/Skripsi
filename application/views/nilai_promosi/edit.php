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
                        <a class="nav-link" href="<?= base_url('beranda/index'); ?>"><i class="bi bi-house-door-fill"></i> Beranda</a>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-book"></i>
                                Penilaian Kinerja Pegawai Perpanjangan
                            </a>

                            <ul class="dropdown-menu dropdown-menu-lg" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url('nilai_kontrak/tambah'); ?>"><i class="bi bi-table"></i> Form Penilaian</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('nilai_kontrak/index'); ?>"><i class="bi bi-table"></i> Data Penilaian / Evaluasi</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('nilai_kontrak/hasil_penilaian'); ?>"><i class="bi bi-table"></i> Hasil Penilaian / Evaluasi</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('nilai_kontrak/rekomendasi'); ?>"><i class="bi bi-table"></i> Data Rekomendasi Pegawai</a></li>
                            </ul>
                        </div>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-book"></i>
                                Penilaian Kinerja Pegawai Promosi
                            </button>

                            <ul class="dropdown-menu dropdown-menu-lg" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url('nilai_promosi/tambah'); ?>"><i class="bi bi-table"></i> Form Penilaian</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('nilai_promosi/index'); ?>"><i class="bi bi-table"></i> Data Penilaian / Evaluasi</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('nilai_promosi/hasil_penilaian'); ?>"><i class="bi bi-table"></i> Hasil Penilaian / Evaluasi</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('nilai_promosi/rekomendasi'); ?>"><i class="bi bi-table"></i> Data Rekomendasi Pegawai</a></li>
                            </ul>
                        </div>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
            </div>
        </div>
    </nav>
    <!-- KONTEN -->
    <div class="container-fluid">
        <br>
        <center>
            <h3><b>Edit Nilai</b></h3>
        </center>
        <h3>
            <?= validation_errors(); ?>
        </h3>
        <br>
        <form class="user" method="post" action="<?= base_url('nilai_promosi/edit_save'); ?>">
            <div class="card" style="width:auto;">
                <div class="card-body">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted"></label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>" required readonly hidden>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Nama Pegawai</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="text" class="form-control" id="id_pegawai" name="id_pegawai" value="<?= $id_pegawai ?>" required readonly hidden>
                                <input type="text" class="form-control" id="" name="" value="<?= $namepegawai ?>" required readonly>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Pengalaman Kerja</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="5" id="pengalaman_kerja" name="pengalaman_kerja" value="<?= $pengalaman_kerja ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">loyalitas</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="5" id="loyalitas" name="loyalitas" value="<?= $loyalitas ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Jujur</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="5" id=" jujur" name="jujur" value="<?= $jujur ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Kreatif & Inisiatif</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="5" id=" kreatif_inisiatif" name="kreatif_inisiatif" value="<?= $kreatif_inisiatif ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Memberikan Solusi</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="5" id=" memberi_solusi" name="memberi_solusi" value="<?= $memberi_solusi ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Profesional</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="5" id=" profesional" name="profesional" value="<?= $profesional ?>" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted"></label>
                        <div class="col-sm-5">
                            <button class="btn btn-primary" href="" type="submit"><i class="bi bi-file-earmark-check-fill"></i> Simpan</button></li>
                            <a class="btn btn-success" href="<?= base_url('nilai_promosi/index'); ?>" type="submit"><i class="bi bi-box-arrow-left"></i> Kembali</a></li>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
<?php } else { ?>
    <div class="container mt-5">
        <div class="alert alert-danger" role="alert">
            <p class="text-center">
                Silakan login terlebih dahulu!
            </p>
        </div>
    </div>
<?php } ?>