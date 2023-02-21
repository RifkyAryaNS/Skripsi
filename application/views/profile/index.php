<?php if ($this->session->userdata('email')) { ?>
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
					<i class="bi bi-person-circle"></i> Account
				</span>
			</div>
		</div>
	</nav>
	<!-- AKHIR MENU NAVIGASI -->

	<!-- KONTEN -->

	<div class="container-fluid">
		<div class="container">
			<center>
				<h2 class="h2">MY PROFILE</h2>
			</center>
			<center>
				<div class="row">
					<div class="col-lg-100">
						<?= $this->session->flashdata('message') ?>
					</div>
				</div>
			</center>
		</div>
		<br>
		<div class="container-fluid">
			<br>
			<div class="card" style="width:auto;">
				<div class="card-body">
					<center>
						<div class="card" style="width: 16rem;">
							<img src="<?= base_url('/assets/img/') . $user['image']; ?>" class="card-img-top">
						</div>
					</center>
					<hr>
					<br>
					<div class="container-fluid">

						<h5 class="card-title text-muted"><?= $user['nama']; ?></h5>
						<p class="card-text text-muted"><?= $user['nik']; ?></p>
						<p class="card-text text-muted"><?= $user['jk']; ?></p>
						<p class="card-text text-muted"><?= $user['tempat']; ?>, <?= $user['ttl']; ?></p>
						<p class="card-text text-muted"><?= $user['alamat']; ?> RT <?= $user['rt']; ?> RW <?= $user['rw']; ?></p>
						<p class="card-text text-muted"><?= $user['email']; ?></p>
						<p class="card-text text-muted"><?= $user['nohp']; ?></p>



						<br>
						<br>
						<div class="container-fluid">
							<a class="btn btn-primary" href="<?= base_url('profile/editProfile/') . $user['id']; ?>" type="submit"><i class="bi bi-pencil-square"> Edit Account</i></a>
							<a class="btn btn-danger" href="<?= base_url('profile/changepassword/') . $user['id']; ?>" type="submit" style="float: right;"><i class="bi bi-pen-fill"> Change Password</i></a>
						</div>
					</div>
				</div>
				<div class="card-footer text-muted">
					<center>
						Member Since <?= date('d F Y', $user['date_created']); ?>
					</center>
				</div>
			</div>

		</div>


		<!-- AKHIR KONTEN -->

		<!-- SESSION -->
	<?php } else { ?>
		<div class="container mt-5">
			<div class="alert alert-danger" role="alert">
				<p class="text-center">
					Silakan login terlebih dahulu!
				</p>
			</div>
		</div>
	<?php } ?>

	</div>