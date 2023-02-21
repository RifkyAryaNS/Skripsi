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
            <h3><b>Edit Nilai</b></h3>
        </center>
        <h3>
            <?= validation_errors(); ?>
        </h3>
        <br>
        <form class="user" method="post" action="<?= base_url('nilai_kontrak/edit_save'); ?>">
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
                    <br>
                    <h6>*Sub Kriteria Kepribadian Dan Perilaku</h6>
                    <br>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Kedisiplinan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="kedisiplinan" name="kedisiplinan" value="<?= $kedisiplinan ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Integritas</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="integritas" name="integritas" value="<?= $integritas ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Tanggung Jawab</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="tanggung_jawab" name="tanggung_jawab" value="<?= $tanggung_jawab ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Komunikasi</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="komunikasi" name="komunikasi" value="<?= $komunikasi ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Antusiasme Dalam Bekerja</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="antusiasme" name="antusiasme" value="<?= $antusiasme ?>" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6>*Sub Kriteria Prestasi dan Hasil Kerja</h6>
                    <br>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Pelayanan Kepada Konsumen</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="pelayanan_konsumen" name="pelayanan_konsumen" value="<?= $pelayanan_konsumen ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Pengetahuan dan Kemampuan Teknis</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="pengetahuan" name="pengetahuan" value="<?= $pengetahuan ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Efisiensi dan Efektifitas</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="efi_efk" name="efi_efk" value="<?= $efi_efk ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Kerjasama dalam bekerja</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="kerjasama" name="kerjasama" value="<?= $kerjasama ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Tindak lanjut dari pedelegasian</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="tindak_lanjut" name="tindak_lanjut" value="<?= $tindak_lanjut ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Pelaksanaan Tugas Khusus / saat kritis</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="tgs_khusus" name="tgs_khusus" value="<?= $tgs_khusus ?>" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h6>*Sub Kriteria Proses Kerja</h6>
                    <br>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Pengaturan waktu kerja</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="alur_waktu" name="alur_waktu" value="<?= $alur_waktu ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Kreatifitas dalam bekerja</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="kreatif" name="kreatif" value="<?= $kreatif ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Pencatatan, penyimpanan, dan pelaporan</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="dokumen" name="dokumen" value="<?= $dokumen ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Pengelolaan alat dan lingkungan kerja</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="alat_kerja" name="alat_kerja" value="<?= $alat_kerja ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted">Kemampuan Persuasif</label>
                        <div class="col-sm-4">
                            <div class="input-group">
                                <input type="number" class="form-control" min="1" max="4" id="persuasif" name="persuasif" value="<?= $persuasif ?>" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label text-muted"></label>
                        <div class="col-sm-5">
                            <button class="btn btn-primary" href="" type="submit"><i class="bi bi-file-earmark-check-fill"></i> Simpan</button></li>
                            <a class="btn btn-success" href="<?= base_url('nilai_kontrak'); ?>" type="submit"><i class="bi bi-box-arrow-left"></i> Kembali</a></li>
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