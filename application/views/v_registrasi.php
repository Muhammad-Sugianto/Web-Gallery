
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap JavaScript (optional, if you need it) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>assets/admin/images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <div class="brand-logo">
                            <!-- <img src="<?= base_url() ?>assets/page/img/icon_.png" alt="logo"> -->
                        </div>
                        <h4>Silahkan Registrasi</h4>
                        <h6 class="font-weight-light">Untuk bergabung dengan kami</h6>
                        <?php if (validation_errors()): ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Peringatan!</strong> <?php echo validation_errors(); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->flashdata('pesan')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Sukses!</strong> <?php echo $this->session->flashdata('pesan'); ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>
                        <form class="pt-3" action="<?= base_url('auth/registrasi') ?>" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputUsername1" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="exampleInputEmail1" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputNamaLengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputAlamat" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Registrasi</button>
                            </div>
                            <div class="text-center mt-4 font-weight-light">
                                Sudah punya akun? <a href="<?= base_url('auth/login') ?>" class="text-primary">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>


  <!-- container-scroller -->
  <!-- plugins:js -->
  <script>
    // Hapus alert setelah 3 detik
    window.setTimeout(function() {
        $("#alert-warning").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
        $("#alert-error").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
        $("#alert-success").fadeTo(500, 0).slideUp(500, function(){
            $(this).remove(); 
        });
    }, 3000);
</script>
  <script src="<?= base_url() ?>assets/admin/vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>assets/admin/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/hoverable-collapse.js"></script>
  <script src="<?= base_url() ?>assets/admin/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
