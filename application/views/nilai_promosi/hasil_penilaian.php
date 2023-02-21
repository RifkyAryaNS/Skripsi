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
            <h4><b>Hasil Penilaian / Evaluasi Pegawai Promosi Pegawai</b></h4>
        </center>
    </div>
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
                        <th scope="col">Status</th>
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
                    $bobot1 = 0.23;
                    $bobot2 = 0.14;
                    $bobot3 = 0.14;
                    $bobot4 = 0.14;
                    $bobot5 = 0.18;
                    $bobot6 = 0.18;
                    $totalNilai = 0;
                    $index = 0;
                    foreach ($promosi as $pro) {
                        $nilai = round(pow($pro['pengalaman_kerja'], $bobot1), 2) * round(pow($pro['loyalitas'], $bobot2), 2) * round(pow($pro['jujur'], $bobot3), 2) * round(pow($pro['kreatif_inisiatif'], $bobot4), 2) * round(pow($pro['memberi_solusi'], $bobot5), 2) * round(pow($pro['profesional'], $bobot6), 2);
                        $promosi[$index]['nilai'] = round($nilai, 5);
                        $totalNilai += $promosi[$index]['nilai'];
                        $index++;
                    }
                    usort($promosi, function ($item1, $item2) {
                        return $item2['nilai'] <=> $item1['nilai'];
                    });
                    foreach ($promosi as $pro) :
                        $persentase = $pro['nilai'] / $totalNilai;
                    ?>
                        <?php
                        $total_nilai = $pro['nilai'];
                        if ($total_nilai >= 3.9) {
                            $promosi["rekomendasi"] = "<div class='btn btn-success'><b>Di Rekomendasikan</b></div>";
                        } else {
                            $promosi["rekomendasi"] = "<div class='btn btn-danger'>Tidak Direkomendasikan</div>";
                        }

                        ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $pro['namepegawai']; ?></td>
                            <td><?= $pro['namenip']; ?></td>
                            <td><?= $pro['namadiv']; ?></td>
                            <td><?= $pro['nilai']; ?></td>
                            <!-- <td><?= round($persentase, 3); ?></td> -->
                            <td><?= $promosi['rekomendasi']; ?></td>
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