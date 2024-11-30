<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign In</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>" />
</head>

<body class="d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <!-- ======== Preloader =========== -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
    <!-- ========== signin-section start ========== -->
    
    <div class="col-lg-6">
        <div class="signin-wrapper">
            <div class="form-wrapper">
                <h2 class="mb-15">Sign In Form</h2>
                <p class="text-sm mb-25">
                    Sign in untuk Menggunakan Aplikasi.
                </p>

                <?php if (!empty(session()->getFlashdata('pesan'))) : ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('pesan') ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif ?>

                <form method="POST" action="<?= base_url('login') ?>">
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Username</label>
                                <input type="text" class="<?= ($validation->hasError('username')) ? 'is-invalid' : '' ?> form-control" placeholder="Username" name="username" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('username') ?>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Password</label>
                                <input type="password" class="<?= ($validation->hasError('password')) ? 'is-invalid' : '' ?> form-control" placeholder="Password" name="password" />
                                <div class="invalid-feedback">
                                    <?= $validation->getError('password') ?>
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                    Sign In
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </form>
            </div>
        </div>
    </div>
    <!-- ========== signin-section end ========== -->
    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/js/main.js') ?>"></script>
</body>

</html>
