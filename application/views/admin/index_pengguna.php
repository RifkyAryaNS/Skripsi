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
            <h3><b>Data Pengguna</b></h3>
        </center>
        <br>
        <a class="btn btn-success btn-sm pull-right bi bi-plus" href="<?= base_url("admin/pengguna/tambah") ?>">Tambah</a>
        <div class="card" style="width:auto;">
            <div class="card-body">
                <table class="table" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Email</th>
                            <th scope="col">Username</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Role ID</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($pengguna)) :
                        ?>
                            <tr>
                                <td colspan=10>
                                    <div class="alert alert-danger" role="alert">
                                        <center>Maaf, Tabel Pegawai Kosong !</center>
                                    </div>
                                </td>
                            </tr>
                        <?php endif;
                        ?>
                        <?php
                        $no = 1;
                        foreach ($pengguna as $peg) :
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $peg['email']; ?></td>
                                <td><?= $peg['username']; ?></td>
                                <td><?= $peg['nama']; ?></td>
                                <td><?= $peg['namerole']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-success btn-sm bi bi-book" data-bs-toggle="modal" data-bs-target="#detail"></button>
                                    <a class="btn btn-warning btn-sm bi bi-pencil-fill" href="<?= base_url("admin/pengguna/edit/{$peg['id']}") ?>"></a>
                                    <a class="btn btn-danger btn-sm bi bi-eraser-fill" onclick="return confirm('Apakah anda yakin untuk menghapus data?')" href="<?= base_url("admin/pengguna/hapus/{$peg['id']}") ?>"></a>
                                    <a class="btn btn-primary btn-sm" href="<?= base_url("admin/pengguna/changepassword/{$peg['id']}") ?>">Change Password</a>
                                </td>

                                <!-- Modal -->
                                <div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Pegawai</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-1 row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label"><b>ID Pegawai </b></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $peg['id']; ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-1 row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label"><b>Nama Pegawai </b></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $peg['nama']; ?>">
                                                    </div>
                                                </div>

                                                <div class="mb-1 row">
                                                    <label for="staticEmail" class="col-sm-4 col-form-label"><b>Divisi </b></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?= $peg['divisi']; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
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