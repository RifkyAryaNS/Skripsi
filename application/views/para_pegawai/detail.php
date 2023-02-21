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
                        <a class="nav-link" href="<?= base_url('para_pegawai/beranda/index'); ?>" type="button"><i class="bi bi-house-door-fill"></i> Beranda</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <button class="btn btn-primary" href="<?= base_url('para_pegawai/nilai_kontrak/index'); ?>" type="button"><i class="bi bi-house-door-fill"></i> Lihat Nilai</button>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </ul>
            </div>
        </div>
    </nav>
    <!-- KONTEN -->
    <div class="container-fluid">
        <h2>Lihat Nilai</h2>
    </div>
    <br>
    <br>
    <h6>*Sub Kriteria Kepribadian Dan Perilaku</h6>
    <div class="card" style="width:auto;">
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Kedisiplinan</th>
                        <th scope="col">Integritas</th>
                        <th scope="col">Tanggung Jawab</th>
                        <th scope="col">Komunikasi</th>
                        <th scope="col">Antusiasme dalam bekerja</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kontrak)) :
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
                    foreach ($kontrak as $tra) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $tra['namepegawai']; ?></td>
                            <td><?= $tra['kedisiplinan']; ?></td>
                            <td><?= $tra['integritas']; ?></td>
                            <td><?= $tra['tanggung_jawab']; ?></td>
                            <td><?= $tra['komunikasi']; ?></td>
                            <td><?= $tra['antusiasme']; ?></td>
                            <td>
                                <!--<button type="button" class="btn btn-success btn-sm bi bi-book" data-bs-toggle="modal" data-bs-target="#detail"></button> -->
                                <a class="btn btn-warning btn-sm bi bi-pencil-fill" href="<?= base_url("nilai_kontrak/edit/{$tra['id']}") ?>"></a>
                                <a class="btn btn-danger btn-sm bi bi-eraser-fill" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" href="<?= base_url("nilai_kontrak/hapus/{$tra['id']}") ?>"></a>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <br>
    <h6>*Sub Kriteria Prestasi dan Hasil Kerja</h6>
    <div class="card" style="width:auto;">
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Pelayanan Kepada Konsumen</th>
                        <th scope="col">Pengetahuan dan Kemampuan Teknis</th>
                        <th scope="col">Efisiensi dan Efektifitas</th>
                        <th scope="col">Kerjasama dalam bekerja</th>
                        <th scope="col">Tindak lanjut dari pedelegasian</th>
                        <th scope="col">Pelaksanaan Tugas Khusus / saat kritis</th>
                        <th scope="col">Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kontrak)) :
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
                    foreach ($kontrak as $tra) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $tra['namepegawai']; ?></td>
                            <td><?= $tra['pelayanan_konsumen']; ?></td>
                            <td><?= $tra['pengetahuan']; ?></td>
                            <td><?= $tra['efi_efk']; ?></td>
                            <td><?= $tra['kerjasama']; ?></td>
                            <td><?= $tra['tindak_lanjut']; ?></td>
                            <td><?= $tra['tgs_khusus']; ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm bi bi-pencil-fill" href="<?= base_url("nilai_kontrak/edit/{$tra['id']}") ?>"></a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm bi bi-eraser-fill" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" href="<?= base_url("nilai_kontrak/hapus/{$tra['id']}") ?>"></a>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
            <br>
        </div>
    </div>
    <br>
    <h6>*Sub Kriteria Proses Kerja</h6>
    <div class="card" style="width:auto;">
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Pengaturan waktu kerja</th>
                        <th scope="col">Kreatifitas dalam bekerja</th>
                        <th scope="col">Pencatatan, penyimpanan, dan pelaporan</th>
                        <th scope="col">Pengelolaan alat dan lingkungan kerja</th>
                        <th scope="col">Kemampuan Persuasif</th>
                        <th scope="col">Aksi</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($kontrak)) :
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
                    foreach ($kontrak as $tra) :
                    ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $tra['namepegawai']; ?></td>
                            <td><?= $tra['alur_waktu']; ?></td>
                            <td><?= $tra['kreatif']; ?></td>
                            <td><?= $tra['dokumen']; ?></td>
                            <td><?= $tra['alat_kerja']; ?></td>
                            <td><?= $tra['persuasif']; ?></td>
                            <td>
                                <a class="btn btn-warning btn-sm bi bi-pencil-fill" href="<?= base_url("nilai_kontrak/edit/{$tra['id']}") ?>"></a>
                            </td>
                            <td>
                                <a class="btn btn-danger btn-sm bi bi-eraser-fill" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" href="<?= base_url("nilai_kontrak/hapus/{$tra['id']}") ?>"></a>
                            </td>
                        </tr>
                    <?php endforeach;
                    ?>
                </tbody>
            </table>
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