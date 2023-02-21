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
            <h4><b>Data Penilaian Promosi</b></h4>
        </center>
        <a class="btn btn-success btn-sm pull-right bi bi-plus" href="<?= base_url("nilai_promosi/tambah") ?>">Tambah</a>
        <br>
        <div class="card" style="width:auto;">
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Pegawai</th>
                            <th scope="col">Pengalaman Kerja</th>
                            <th scope="col">Loyalitas</th>
                            <th scope="col">Berintegrasi / Jujur</th>
                            <th scope="col">Kreatif & Inisiatif</th>
                            <th scope="col">Memberikan Solusi</th>
                            <th scope="col">Profesional</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($promosi)) :
                        ?>
                            <tr>
                                <td colspan=10>
                                    <div class="alert alert-danger" role="alert">
                                        <center>Maaf, Tabel Nilai Kosong !</center>
                                    </div>
                                </td>
                            </tr>
                        <?php endif;
                        ?>
                        <?php
                        $no = 1;
                        foreach ($promosi as $pro) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $pro['namepegawai']; ?></td>
                                <td><?= $pro['pengalaman_kerja']; ?></td>
                                <td><?= $pro['loyalitas']; ?></td>
                                <td><?= $pro['jujur']; ?></td>
                                <td><?= $pro['kreatif_inisiatif']; ?></td>
                                <td><?= $pro['memberi_solusi']; ?></td>
                                <td><?= $pro['profesional']; ?></td>
                                <td>
                                    <!--<button type="button" class="btn btn-success btn-sm bi bi-book" data-bs-toggle="modal" data-bs-target="#detail"></button>-->
                                    <a class="btn btn-warning btn-sm bi bi-pencil-fill" href="<?= base_url("nilai_promosi/edit/{$pro['id']}") ?>"></a>
                                    <a class="btn btn-danger btn-sm bi bi-eraser-fill" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" href="<?= base_url("nilai_promosi/hapus/{$pro['id']}") ?>"></a>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>

            </div>
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