
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title><?= $title ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="" name="keywords">
        <meta content="" name="description">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600&family=Roboto&display=swap" rel="stylesheet"> 

        <!-- Icon Font Stylesheet -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="<?= base_url() ?>assets/page/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/page/lib/lightbox/css/lightbox.min.css" rel="stylesheet">


        <!-- Customized Bootstrap Stylesheet -->
        <link href="<?= base_url() ?>assets/page/css/bootstrap.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="<?= base_url() ?>assets/page/css/style.css" rel="stylesheet">
    </head>

    <body>

      

    <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
            <a href="" class="navbar-brand p-0 d-flex align-items-center">
    <img src="<?= base_url() ?>assets/img/log1.png" alt="Logo">
    <!-- <h3 class="m-0 ms-2" ">Madd DigiPhot's</h3> -->
    <h3 class="m-0"></i>Madd DigiPhot's</h1>

</a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="<?= base_url() ?>" class="nav-item nav-link active">Home</a>
                        <!-- <a href="#about" class="nav-item nav-link">About</a> -->
                        <a href="" class="nav-item nav-link">Gallery</a>
                        <!-- <a href="<?= base_url('auth/login') ?>" class="nav-item nav-link">Login</a> -->
                        <!-- <a href="blog.html" class="nav-item nav-link">Blog</a> -->
                        <!-- <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu m-0">
                                <a href="destination.html" class="dropdown-item">Destination</a>
                                <a href="tour.html" class="dropdown-item">Explore Tour</a>
                                <a href="booking.html" class="dropdown-item">Travel Booking</a>
                                <a href="gallery.html" class="dropdown-item">Our Gallery</a>
                                <a href="guides.html" class="dropdown-item">Travel Guides</a>
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Page</a>
                            </div>
                        </div> -->
                        <!-- <a href="contact.html" class="nav-item nav-link">Contact</a> -->
                    </div>
                    <a href="" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">
    <img src="url_gambar_profil.jpg" alt="" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 10px;">
    <?= $this->session->userdata('username') ?>
</a>

                </div>
            </nav>

      
      <!-- About Start -->
<div class="container-fluid about py-5">
    <div class="container py-5">
        <div class="row g-5 align-items-center">
            <div class="col-lg-5">
                <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                    <img src="<?= base_url('assets/img/' . $foto->lokasi_file) ?>" class="img-fluid w-100 h-100" alt="Item Image">
                </div>
            </div>
            <div class="col-lg-7">
                <div style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8));">
                    <h1 class="mb-4">Detail <span class="text-primary">Postingan</span></h1>
                    <div class="d-flex align-items-center mb-4">
                        <img class="profile-picture me-3" src="<?= base_url('assets/profil/' . $uploader->profil); ?>" alt="Profile Picture">
                        <p class="mb-0"><?= $uploader->username ?></p>
                    </div>
                    <p class="mb-4"><?= $foto->desk_ft ?></p>
                    <div class="mb-4">

                    <?php if ($is_liked) : ?>
                <div style="background-color: transparent; border: none; color: black;">
                  <a href="<?= base_url('foto/remove_like/' . $foto->foto_id) ?>"><i class="fas fa-heart"
                      style="color: red; font-size: 20px; padding: 5px; text-align: center;">
                      
                        <?= isset($total_likes_per_fotoid) ? $total_likes_per_fotoid : 0 ?>
                      
                    </i></a>
                  <!-- <a href="<?= base_url('share/' . $foto->foto_id) ?>"><i class="fa fa-paper-plane"
                      style="color: black; font-size: 20px; padding: 10px; text-align: center;">
                    </i></a> -->
                    <!-- <a href="<?= base_url('assets/image_foto/' . $foto->profil) ?>" download><i class="fa fa-download"
                      style="color: black; font-size: 20px; padding: 10px; text-align: center;">
                      <p>Unduh</p>
                    </i></a> -->
                </div>
                <?php else : ?>
                <div style="background-color: transparent; border: none; color: black;">
                  <a href="<?= base_url('foto/add_like/' . $foto->foto_id) ?>"><i class="fas fa-heart"
                      style="color: black; font-size: 20px; padding: 10px; text-align: center;">
                     
                        <?= isset($total_likes_per_fotoid) ? $total_likes_per_fotoid : 0 ?>
                    
                    </i></a>
                  <!-- <a href="<?= base_url('share/' . $foto->foto_id) ?>"><i class="fa fa-paper-plane"
                      style="color: black; font-size: 20px; padding: 10px; text-align: center;">
                    </i></a> -->
                  <!-- <a href="<?= base_url('assets/image_foto/' . $foto->profil) ?>" download><i class="fa fa-download"
                      style="color: black; font-size: 20px; padding: 10px; text-align: center;"> -->
                      <!-- <p>Unduh</p> -->
                    <!-- </i></a> -->
                </div>
                <?php endif; ?>
                    </div>
                    <!-- Form Komentar -->
                    <div>


                    <div class="row">
          <div class="col-12">
            <div style="max-height: 300px; overflow-y: auto;">
              <!-- Daftar Komentar -->
              <div class="comments-section">
                <!-- Komentar 1 -->
                <h4>Kolom Komentar</h4>
                <?php foreach ($comments as $comment): ?>
                <div class="comment" style="display: flex; align-items: flex-start;">
                  <div class="comment-meta mr-3">
                    <img src="<?= base_url('assets/profil/' . $comment->profil) ?>"
                      style="width: 50px; border-radius: 50%; height: 50px; object-fit: cover;" alt="Profile Picture">
                  </div>
                  <div class="comment-content">
                    <div class="author-info">
                      <strong style="color: black; margin-left: 10px;">
                        <?= $comment->nama_lengkap ?>
                      </strong>
                      <small style="color: black; font-size: 12px;">-
                        <?= $comment->tgl_komen ?>
                      </small>
                      <p style="color: black; padding: 5px;">
                        <?= $comment->isi_komen ?>
                      </p>
                    </div>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>

                        <form action="<?= base_url('home/add_comment') ?>" method="post" class="position-relative" onsubmit="return validateForm()">
                        <input type="hidden" name="foto_id" value="<?= $foto->foto_id ?>">
                            <div class="mb-1 position-relative">
                                <label for="comment" class="form-label"></label>
                                <div style="position: relative;">
                                    <textarea class="form-control" id="comment" name="komen" rows="2" required></textarea>
                                    <button type="submit" class="btn btn-primary position-absolute" style="right: 10px; bottom: 10px;"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>


                    <!-- Tombol Kirim dengan Icon Send -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->



          <style>
    .profile-picture {
        width: 50px; /* Atur lebar gambar sesuai kebutuhan */
        height: 50px; /* Atur tinggi gambar sesuai kebutuhan */
        border-radius: 50%; /* Membuat gambar menjadi lingkaran */
        object-fit: cover; /* Memastikan gambar terpotong dengan baik dalam lingkaran */
    }
</style>
        <!-- Back to Top -->
        <a href="#" class="btn btn-primary btn-primary-outline-0 btn-md-square back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
        <!-- JavaScript Libraries -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>assets/page/lib/easing/easing.min.js"></script>
        <script src="<?= base_url() ?>assets/page/lib/waypoints/waypoints.min.js"></script>
        <script src="<?= base_url() ?>assets/page/lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="<?= base_url() ?>assets/page/lib/lightbox/js/lightbox.min.js"></script>
        

        <!-- Template Javascript -->
        <script src="<?= base_url() ?>assets/page/js/main.js"></script>
    </body>

</html>