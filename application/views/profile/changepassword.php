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
						<a class="nav-link" href="<?= base_url('regitrasi/index'); ?>" type="button"><i class="bi bi-pen"></i> Registrasi</a>
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
					<i class="bi bi-person-circle"></i> <i class="bi bi-arrow-right-short"></i> <i class="bi bi-bookmark"></i>
				</span>	
			</div>
		</div>
	</nav>
<!-- AKHIR MENU NAVIGASI -->
<!-- KONTEN -->
<div class="col-sm-6 mx-auto">
    <div class="container">
      <div class="page-title mt-4">
        <h1 class="text-center">Change Password</h1>
        <center>
        <div class="row">
          <div class="col-lg-100">
            <?= $this->session->flashdata('message')?>
          </div>
        </div>
        </center>
      </div>  
    </div>
</div>
<hr>
                    <form class="calculator-form my-5 px-5 py-4" method="POST" action="<?= base_url('profile/changepassword')?>">
                        <div class="row g-2">
                            <div class="col-3">
                                <label for="current_password" class="col-sm-auto col-form-label">Current Password*</label>
                            </div>
                            <div class="col-6">
                                <input type="password" class="form-control" id="current_password" name="current_password">
                                <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-3">
                                <label for="new_pass1" class="col-sm-auto col-form-label">New Password*</label>
                            </div>
                            <div class="col-6">
                                <input type="password" class="form-control" id="new_pass1" name="new_pass1">
                                <?= form_error('new_pass1', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <br>
                        <div class="row g-2">
                            <div class="col-3">
                                <label for="new_pass2" class="col-sm-auto col-form-label">Repeat Password*</label>
                            </div>
                            <div class="col-6">
                                <input type="password" class="form-control" id="new_pass2" name="new_pass2">
                                <?= form_error('new_pass2', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                        </div>
                        <br>          
                        <div class="row g-2">
                            <div class="col-3">
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-primary" href ="" type="submit"></i><i class="bi bi-file-earmark-check-fill"> Change Password </i></button></li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 <a class="btn btn-danger" href ="<?= base_url('profile/index');?>" type="submit"><i class="bi bi-reply-fill"> Kembali</i></a></li>
                            </div>
                        </div>
					</form>		
		</div>
<!-- AKHIR KONTEN -->