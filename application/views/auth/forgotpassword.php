<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- CSS ICON -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <title>Intens Covid Test Management</title>
</head>

<body>

    <!-- KONTEN -->
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center mt-5">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header bg-transparent mb-0">
                            <h5 class="text-center"><span class="font-weight-bold text-success fw-bold">Forgot Your Password?</span></h5>
                        </div>
                        <div class="row">
                            <div class="col">
                                <?= $this->session->flashdata('message'); ?>
                            </div>
                        </div>
                        <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                            <div class="card-body">
                                <div class="form-floating mb-3">
                                    <input type="text" name="email" class="form-control" placeholder="Email" value="<?= set_value('email'); ?>">
                                    <label for="floatingInput"><i class="bi bi-envelope-fill"></i> Email</label>
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group custom-control custom-checkbox">
                                        </div>
                                    </div>
                                    <!--
				<div class="col">
				<a href="http://localhost/intens/beranda" class="text-muted">Login as Admin</a></div> -->
                                </div>
                                <br>
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="w-100 btn btn-lg btn-success"></i>Reset Password</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                        <div class="card-header bg-transparent mb-0"></div>
                        <div class="card-body">
                            <center>
                                <p class="text-muted">
                                    kembali ke halaman <a href="<?= base_url('auth'); ?>" class="text-reset">Login</a>
                            </center>
                            </p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>



    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>