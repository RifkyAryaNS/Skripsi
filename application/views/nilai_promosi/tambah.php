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
            <h4><b>Form Penilaian Kinerja Pegawai Promosi</b></h4>
        </center>
        <h3>
            <?= validation_errors(); ?>
        </h3>
        <br>
        <form class="user" method="post" action="<?= base_url('nilai_promosi/tambah_save'); ?>">
            <div class="card" style="width:auto;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label text-muted">Nama Pegawai</label>
                                <div class="col-sm-6">
                                    <select class="form-select" id="id_pegawai" aria-label="Default select example" name="id_pegawai">
                                        <option value=""> Pilih Pegawai </option>
                                        <?php
                                        foreach ($pegawai as $peg) {
                                        ?>
                                            <option value="<?= $peg['id'] ?>"><?= $peg['nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label text-muted">Pengalaman Kerja</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control" id="pengalaman_kerja" name="pengalaman_kerja" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label text-muted">Loyalitas</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="1" max="5" id="loyalitas" name="loyalitas" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label text-muted">Jujur</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="1" max="5" id="jujur" name="jujur" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label text-muted">Kreatif & Inisiatif</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="1" max="5" id="kreatif_inisiatif" name="kreatif_inisiatif" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label text-muted">Memberikan Solusi</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="1" max="5" id="memberi_solusi" name="memberi_solusi" required>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-3 col-form-label text-muted">Profesional</label>
                                <div class="col-sm-6">
                                    <div class="input-group">
                                        <input type="number" class="form-control" min="1" max="5" id="profesional" name="profesional" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <table class="table table-stripped" style="width: 100%;">
                                <colgroup>
                                    <col width="10%" />
                                    <col width="60%" />
                                    <col width="30%" />
                                </colgroup>
                                <h6><b>* Penilaian / Daftar Nilai<b></h6>
                                <tr>
                                    <th>No</th>
                                    <th>Kriteria</th>
                                    <th>Nilai</th>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">Baik</td>
                                    <td>5</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">Cukup Baik</td>
                                    <td>4</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">Cukup</td>
                                    <td>3</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">Kurang</td>
                                    <td>2</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td style="white-space: nowrap; text-overflow:ellipsis; overflow: hidden; max-width:1px;">Kurang Sekali</td>
                                    <td>1</td>
                                </tr>
                            </table>
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