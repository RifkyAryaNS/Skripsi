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
    <div class="card" style="width:auto;">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Pegawai</th>
                        <th scope="col">Nilai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($nilai)) :
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
                    $bobot1 = 0.4;
                    $bobot2 = 0.35;
                    $bobot3 = 0.25;
                    $totalNilai = 0;
                    $index = 0;
                    foreach ($nilai as $nil) {
                        $nilai1 = round(pow($nil['kedisiplinan'], $bobot1), 2) * round(pow($nil['integritas'], $bobot1), 2) * round(pow($nil['tanggung_jawab'], $bobot1), 2) * round(pow($nil['komunikasi'], $bobot1), 2) * round(pow($nil['antusiasme'], $bobot1), 2);
                        $nilai2 = round(pow($nil['pelayanan_konsumen'], $bobot2), 2) * round(pow($nil['pengetahuan'], $bobot2), 2) * round(pow($nil['efi_efk'], $bobot2), 2) * round(pow($nil['kerjasama'], $bobot2), 2) * round(pow($nil['tindak_lanjut'], $bobot2), 2) * round(pow($nil['tgs_khusus'], $bobot2), 2);
                        $nilai3 = round(pow($nil['alur_waktu'], $bobot3), 2) * round(pow($nil['kreatif'], $bobot3), 2) * round(pow($nil['dokumen'], $bobot3), 2) * round(pow($nil['alat_kerja'], $bobot3), 2) * round(pow($nil['persuasif'], $bobot3), 2);
                        $nilai[$index]['nilai'] = round(round($nilai1 * $nilai2, 5) * $nilai3, 5);
                        $totalNilai += $nilai[$index]['nilai'];
                        $index++;
                    }
                    foreach ($nilai as $nil) :
                    ?>

                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $user['nama']; ?></td>
                            <td><?= $nil['nilai']; ?></td>
                            <td>
                                <a class="btn btn-success btn-sm bi bi-book" href="<?= base_url("admin/para_pegawai/detail") ?>"></a>
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