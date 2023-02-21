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
                        <a class="nav-link" href="<?= base_url('admin/beranda/index'); ?>"><i class="bi bi-house-door-fill"></i> Beranda</a>
                    </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <div class="dropdown">
                            <button class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-book-fill"></i>
                                Data Master
                            </button>

                            <ul class="dropdown-menu dropdown-menu-lg" aria-labelledby="dropdownMenuLink">
                                <li><a class="dropdown-item" href="<?= base_url('admin/pengguna/index'); ?>"><i class="bi bi-table"></i> Data Pengguna</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/pegawai/index'); ?>"><i class="bi bi-table"></i> Data Pegawai</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/divisi/index'); ?>"><i class="bi bi-table"></i> Data Divisi</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= base_url('admin/jabatan/index'); ?>"><i class="bi bi-table"></i> Data Jabatan</a></li>
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
            <h3><b>Edit Pengguna</b></h3>
        </center>
        <h3>
            <?= validation_errors(); ?>
        </h3>
        <form class="form-horizontal" method="post" action="<?= base_url('admin/pengguna/edit_save') ?>">
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label text-muted"></label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="form-control" id="id" name="id" value="<?= $pengguna['id'] ?>" required hidden>
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label text-muted">Email</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="form-control" id="email" name="email" value="<?= $pengguna['email'] ?>" required readonly>
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label text-muted">Username</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $pengguna['username'] ?>" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label text-muted">Nama</label>
                <div class="col-sm-6">
                    <div class="input-group">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $pengguna['nama'] ?>" required>
                    </div>
                </div>
            </div>
            <br>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label text-muted">Hak Akses</label>
                <div class="col-sm-6">
                    <select class="form-select" id="role_id" aria-label="Default select example" name="role_id">
                        <?php
                        foreach ($role as $rol) {
                        ?>
                            <option value="<?= $rol['id'] ?>" <?= $pengguna['role_id'] == $rol['id'] ? 'selected' : '' ?>><?= $rol['role'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label text-muted"></label>
                <div class="col-sm-5">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-file-earmark-check-fill"></i> Simpan</button></li>
                    <a class="btn btn-success" href="<?= base_url('admin/pengguna'); ?>" type="submit"><i class="bi bi-box-arrow-left"></i> Kembali</a></li>
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