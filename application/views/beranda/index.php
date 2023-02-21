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
						<button class="btn btn-primary" href="<?= base_url('beranda/index'); ?>" type="button"><i class="bi bi-house-door-fill"></i> Beranda</button>
					</li>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
		<h2>Beranda</h2>
	</div>
	<br>
	<br>
	<center>
		<h2>SELAMAT DATANG <b><?= strtoupper($user['username']); ?></b>.</h2>
		<h3>SISTEM INFORMASI MANAJEMEN PENILAIAN KINERJA PEGAWAI</h3>
		<p>Jangan Lupa <b>LOGOUT</b> Apabila Telah Selesai Menggunakan Aplikasi Ini.<br>
			Apabila Ada Masalah Dalam Penggunaannya,Silahkan Hubungi Administrator Aplikasi Ini.</p>
	<?php } else { ?>
		<div class="container mt-5">
			<div class="alert alert-danger" role="alert">
				<p class="text-center">
					Silakan login terlebih dahulu!
				</p>
			</div>
		</div>
	<?php } ?>