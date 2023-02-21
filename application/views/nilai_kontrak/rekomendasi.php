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
                            <button class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-book"></i>
                                Penilaian Kinerja Pegawai Perpanjangan
                            </button>

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
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-book"></i>
                                Penilaian Kinerja Pegawai Promosi
                            </a>

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
            <h4><b>Rekomendasi Pegawai Perpanjangan Kontrak</b></h4>
        </center>
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
                        <th scope="col">NIP</th>
                        <th scope="col">Divisi</th>
                        <th scope="col">Nilai</th>
                        <!-- <th scope="col">Persentase</th> -->
                        <th scope="col">Rekomendasi</th>
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
                    $bobot1 = 0.4;
                    $bobot2 = 0.35;
                    $bobot3 = 0.25;
                    $totalNilai = 0;
                    $index = 0;
                    foreach ($kontrak as $tra) {
                        $nilai1 = round(pow($tra['kedisiplinan'], $bobot1), 2) * round(pow($tra['integritas'], $bobot1), 2) * round(pow($tra['tanggung_jawab'], $bobot1), 2) * round(pow($tra['komunikasi'], $bobot1), 2) * round(pow($tra['antusiasme'], $bobot1), 2);
                        $nilai2 = round(pow($tra['pelayanan_konsumen'], $bobot2), 2) * round(pow($tra['pengetahuan'], $bobot2), 2) * round(pow($tra['efi_efk'], $bobot2), 2) * round(pow($tra['kerjasama'], $bobot2), 2) * round(pow($tra['tindak_lanjut'], $bobot2), 2) * round(pow($tra['tgs_khusus'], $bobot2), 2);
                        $nilai3 = round(pow($tra['alur_waktu'], $bobot3), 2) * round(pow($tra['kreatif'], $bobot3), 2) * round(pow($tra['dokumen'], $bobot3), 2) * round(pow($tra['alat_kerja'], $bobot3), 2) * round(pow($tra['persuasif'], $bobot3), 2);
                        $kontrak[$index]['nilai'] = round(round($nilai1 * $nilai2, 5) * $nilai3, 5);
                        $totalNilai += $kontrak[$index]['nilai'];
                        $index++;
                    }
                    usort($kontrak, function ($item1, $item2) {
                        return $item2['nilai'] <=> $item1['nilai'];
                    });
                    $kontrak = array_filter($kontrak, function ($item) {
                        return $item['nilai'] >= 70;
                    });
                    foreach ($kontrak as $tra) :
                        $persentase = $tra['nilai'] / $totalNilai;
                    ?>
                        <?php
                        $total_nilai = $tra['nilai'];
                        if ($total_nilai >= 70) {
                            $tra["rekomendasi"] = "<div class='btn btn-success'><b>Perpanjangan Kontrak</b></div>";
                        } else {
                            $tra["rekomendasi"] = "Tidak Direkomendasikan";
                        }

                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $tra['namepegawai']; ?></td>
                            <td><?= $tra['namenip']; ?></td>
                            <td><?= $tra['namadiv']; ?></td>
                            <td><?= $tra['nilai']; ?></td>
                            <!-- <td><?= round($persentase, 3); ?></td> -->
                            <td><?= $tra['rekomendasi'] ?></td>
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