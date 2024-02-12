
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
              <img src="<?= base_url() ?>assets/page/img/icon_.png" alt="logo">
              </div>
              <h4>Selamat Datang</h4>
              <h6 class="font-weight-light">Silahkan Anda Login</h6>

              <form class="pt-3" action="<?= base_url('auth/login') ?>" method="POST">
              <?php 
    if (validation_errors()) {
        echo '<div id="alert-warning" class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Peringatan!</strong> ' . validation_errors() . '
              </div>';
    }

    if ($this->session->flashdata('error')) {
        echo '<div id="alert-error" class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Notifications!</strong> ' . $this->session->flashdata('error') . '
              </div>';
    }

    if ($this->session->flashdata('pesan')) {
        echo '<div id="alert-success" class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Sukses!</strong> ' . $this->session->flashdata('pesan') . '
              </div>';
    }
?>


                                <div class="form-group">
                                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Login</button>
                                </div>
                                <div class="mt-3">
                                    <a href="<?= base_url('') ?>" class="btn btn-block btn-secondary btn-lg font-weight-medium auth-form-btn">Kembali</a>
                                </div>

                                <div class="text-center mt-4 font-weight-light">
                                    Belum Punya Akun? <a href="<?= base_url('auth/registrasi') ?>" class="text-primary">Daftar</a>
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
