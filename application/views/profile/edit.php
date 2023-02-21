<!-- MENU NAVIGASI -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('beranda/index'); ?>"><i class="bi bi-house-door-fill"></i> Beranda</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('registrasi/index'); ?>" type="button"><i class="bi bi-pen"></i> Registrasi</a>
                </li>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('hasiltest/index'); ?>"><i class="bi bi-journal-text"></i> Hasil Test</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('dashboard/index'); ?>"><i class="bi bi-speedometer"></i> Dashboard</a>
                </li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </ul>
            <span class="navbar-text text-end">
                <i class="bi bi-person-circle"></i> <i class="bi bi-arrow-right-short"></i> <i class="bi bi-clipboard"></i>
            </span>
        </div>
    </div>
</nav>
<!-- AKHIR MENU NAVIGASI -->
<div class="container-fluid">
    <div class="col-sm-6 mx-auto">
        <div class="container">
            <div class="page-title mt-4">
                <h1 class="text-center">Edit Profile</h1>
            </div>
        </div>
    </div>
    <hr>
    <form class="calculator-form my-5 px-5 py-4" method="POST" action="" enctype="multipart/form-data">
        <div class="mb-3 row">
            <label for="email" class="col-sm-2 col-form-label text-muted">Email*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" name="email" value=<?= $user['email']; ?> readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nik" class="col-sm-2 col-form-label text-muted">NIK*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nik" name="nik" value="<?= $user['nik']; ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="username" class="col-sm-2 col-form-label text-muted">Username*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="username" name="username" value=<?= $user['username']; ?>>
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label text-muted">Nama*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>

        </div>
        <div class="mb-3 row">
            <label for="ttl" class="col-sm-2 col-form-label text-muted">Tempat/Tanggal Lahir*</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="tempat" name="tempat" value="<?= $user['tempat']; ?>">
                <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" id="ttl" name="ttl" value="<?= $user['ttl']; ?>">
                <?= form_error('ttl', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label text-muted">Jenis Kelamin*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="jk" name="jk" value="<?= $user['jk']; ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="alamat" class="col-sm-2 col-form-label text-muted">Alamat*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $user['alamat']; ?>">
                <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="rtrw" class="col-sm-2 col-form-label text-muted">RT/RW*</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="rt" name="rt" value="<?= $user['rt']; ?>">
                <?= form_error('rt', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="rw" name="rw" value="<?= $user['rw']; ?>">
                <?= form_error('rw', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nohp" class="col-sm-2 col-form-label text-muted">No Handphone*</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nohp" name="nohp" value="<?= $user['nohp']; ?>">
                <?= form_error('nohp', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
        </div>
        <br>
        <div class="row g-2">
            <div class="col-sm-3">
                <p class="card-text text-muted">Picture*</p>
            </div>
            <div class="col-sm-9">
                <div class="row">
                    <div class="col-sm-2">
                        <img src="<?= base_url('assets/img/') . $user['image'] ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-8">

                        <div class="custom-file">
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row g-2">
            <div class="col-3">
            </div>
            <div class="col-auto">
                <button class="btn btn-primary" href="" type="submit"><i class="bi bi-file-earmark-check-fill"> Simpan</i></button></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a class="btn btn-danger" href="<?= base_url('profile/index'); ?>" type="submit"><i class="bi bi-reply-fill"> Kembali</i></a>
            </div>
        </div>
    </form>
</div>
</div>