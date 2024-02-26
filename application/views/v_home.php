  <!-- Spinner Start -->
  <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Topbar Start -->
        <!-- <div class="container-fluid bg-primary px-5 d-none d-lg-block">
            <div class="row gx-0">
                <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-twitter fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-facebook-f fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-linkedin-in fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href=""><i class="fab fa-instagram fw-normal"></i></a>
                        <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle" href=""><i class="fab fa-youtube fw-normal"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 text-center text-lg-end">
                    <div class="d-inline-flex align-items-center" style="height: 45px;">
                        <a href="#"><small class="me-3 text-light"><i class="fa fa-user me-2"></i>Register</small></a>
                        <a href="#"><small class="me-3 text-light"><i class="fa fa-sign-in-alt me-2"></i>Login</small></a>
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle text-light" data-bs-toggle="dropdown"><small><i class="fa fa-home me-2"></i> My Dashboard</small></a>
                            <div class="dropdown-menu rounded">
                                <a href="#" class="dropdown-item"><i class="fas fa-user-alt me-2"></i> My Profile</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-comment-alt me-2"></i> Inbox</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-bell me-2"></i> Notifications</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-cog me-2"></i> Account Settings</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-power-off me-2"></i> Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
        <!-- Topbar End -->

        <!-- Navbar & Hero Start -->
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
        <a href="#about" class="nav-item nav-link">About</a>
        <a href="#" class="nav-item nav-link">Upload</a>
    </div>
    <?php if ($this->session->userdata('user_id')) : ?>
        <!-- Dropdown untuk pengguna yang sudah login -->
        <div class="dropdown">
            <a href="#" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4 dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php
                $user_id = $this->session->userdata('user_id');
                // Mengambil informasi profil dari model atau basis data
                $profil_info = $this->m_user->get_user_by_id($user_id);
                ?>
                <img src="<?= base_url('assets/profil/' . $profil_info->profil) ?>" alt="" style="width: 30px; height: 30px; border-radius: 50%; margin-right: 10px;">
                <?= $profil_info->username ?>
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="<?= base_url('profile') ?>">Profile</a>
                <a class="dropdown-item" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    <?php else : ?>
        <!-- Tautan Login untuk pengguna yang belum login -->
        <a href="<?= base_url('auth/login') ?>" class="btn btn-primary rounded-pill py-2 px-4 ms-lg-4">Login</a>
    <?php endif; ?>
</div>


            </nav>

            <!-- Carousel Start -->
            <div class="carousel-header">
                <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
                        <li data-bs-target="#carouselId" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img src="<?= base_url() ?>assets/img/a4.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Eksplorasi Visual Terbaik
</h4>
<!-- <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Pesona Foto Terpopuler -->
</h4>
<p class="mb-5 fs-5">Pesona Foto Terpopuler </p>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Madd DigiPhot's</h1>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <!-- <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="carousel-item">
                            <img src="<?= base_url() ?>assets/page/<?= base_url() ?>assets/page/img/carousel-1.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">Find Your Perfect Tour At Travel</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= base_url() ?>assets/page/<?= base_url() ?>assets/page/img/carousel-3.jpg" class="img-fluid" alt="Image">
                            <div class="carousel-caption">
                                <div class="p-3" style="max-width: 900px;">
                                    <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Explore The World</h4>
                                    <h1 class="display-2 text-capitalize text-white mb-4">You Like To Go?</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
                                    </p>
                                    <div class="d-flex align-items-center justify-content-center">
                                        <a class="btn-hover-bg btn btn-primary rounded-pill text-white py-3 px-5" href="#">Discover Now</a>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                        <span class="carousel-control-next-icon btn bg-primary" aria-hidden="false"></span>
                        <span class="visually-hidden">Next</span>
                    </button> -->
                </div>
            </div>
            <!-- Carousel End -->
        </div>
        <!-- <div class="container-fluid search-bar position-relative" style="top: -50%; transform: translateY(-50%);">
            <div class="container">
                <div class="position-relative rounded-pill w-100 mx-auto p-5" style="background: rgba(19, 53, 123, 0.8);">
                    <input class="form-control border-0 rounded-pill w-100 py-3 ps-4 pe-5" type="text" placeholder="Eg: Thailand">
                    <button type="button" class="btn btn-primary rounded-pill py-2 px-4 position-absolute me-2" style="top: 50%; right: 46px; transform: translateY(-50%);">Search</button>
                </div>
            </div>
        </div> -->
        <!-- Navbar & Hero End -->

        <!-- About Start -->
        <div id="about" class="container-fluid about py-5">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-5">
                        <div class="h-100" style="border: 50px solid; border-color: transparent #13357B transparent #13357B;">
                            <img src="<?= base_url() ?>assets/img/icon.png" class="img-fluid w-100 h-100" alt="">
                        </div>
                    </div>
                    <div class="col-lg-7" style="background: linear-gradient(rgba(255, 255, 255, .8), rgba(255, 255, 255, .8)), url(img/about-img-1.png);">
                        <h2 class="section-about-title pe-3">About Us</h2>
                        <h1 class="mb-4">Welcome to <span class="text-primary">Madd DigiPhot's</span></h1>
                        <p class="mb-4">Tempat Dimana Kreativitas Bertemu Keindahan</p>
                        <p class="mb-4">Selamat datang di website Galeri Madd DigiPhot's, destinasi utama Anda untuk berekspresi kreatif melalui visual yang memukau. Lebih dari sekadar galeri foto, kami menyediakan platform di mana individu dari berbagai latar belakang dapat dengan mudah membuat akun, berbagi karya seni , dan menjelajahi dunia inspirasi.</p>
                        <div class="row gy-2 gx-4 mb-4">
                            <!-- <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>First Class Flights</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Handpicked Hotels</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>5 Star Accommodations</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Latest Model Vehicles</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>150 Premium City Tours</p>
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>24/7 Service</p>
                            </div> -->
                        </div>
                        <!-- <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Read More</a> -->
                        <br>
                        <br>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->


        <!-- Services Start -->
        <!-- <div class="container-fluid bg-light service py-5">
            <div class="container py-5">
                <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                    <h5 class="section-title px-3">Searvices</h5>
                    <h1 class="mb-0">Our Services</h1>
                </div>
                <div class="row g-4">
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">WorldWide Tours</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center  bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Hotel Reservation</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Travel Guides</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-user fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 pe-0">
                                    <div class="service-content text-end">
                                        <h5 class="mb-4">Event Management</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row g-4">
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-globe fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">WorldWide Tours</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-hotel fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Hotel Reservation</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-user fa-4x text-primary"></i>
                                    </div>
                                    <div class="service-content">
                                        <h5 class="mb-4">Travel Guides</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="service-content-inner d-flex align-items-center bg-white border border-primary rounded p-4 ps-0">
                                    <div class="service-icon p-4">
                                        <i class="fa fa-cog fa-4x text-primary"></i>
                                    </div>  
                                    <div class="service-content">
                                        <h5 class="mb-4">Event Management</h5>
                                        <p class="mb-0">Dolor sit amet consectetur adipisicing elit. Non alias eum, suscipit expedita corrupti officiis debitis possimus nam laudantium beatae quidem dolore consequuntur voluptate rem reiciendis, omnis sequi harum earum.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="text-center">
                            <a class="btn btn-primary rounded-pill py-3 px-5 mt-2" href="">Service More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
      
        <!-- Services End -->
        
    
<div class="container-fluid blog py-5">
    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
        <h5 class="section-title px-3">Postingan</h5>
        <h1 class="mb-4">Terbaru</h1>
    </div>
    <div class="container py-5">
        <div class="row justify-content-center align-items-center mb-6">
            <div class="col-lg-4 col-md-4">
                <!-- Kotak pencarian -->
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search" aria-describedby="basic-addon2">
                    <button class="btn btn-primary" type="button">Search</button>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <?php foreach ($foto as $value) : ?>
                    <div class="col-lg-3 col-md-4">
                        <div class="blog-item">
                            <!-- Foto -->
                            <div class="blog-img">
                                <!-- Tautan -->
                                <a href="<?= base_url('foto/detail/' . $value->foto_id) ?>">
                                    <div class="blog-img-inner" style="height: 250px; overflow: hidden;">
                                        <img class="img-fluid rounded-top" src="<?= base_url('assets/img/' . $value->lokasi_file) ?>" alt="" style="width: 100%; height: 100%; object-fit: cover;">
                                    </div>
                                </a>
                                <!-- Ikon -->
                                <div class="blog-icon d-flex justify-content-between align-items-center px-3 pt-3">
                                    <div>
                                        <a href="<?= base_url('foto/detail/' . $value->foto_id) ?>" class="text-primary me-3"><i class="fas fa-heart"></i> <?= isset($total_likes_per_fotoid[$value->foto_id]) ? $total_likes_per_fotoid[$value->foto_id] : 0 ?></a>
                                        <a href="<?= base_url('foto/detail/' . $value->foto_id) ?>" class="text-primary"><i class="fas fa-comments"></i> <?= isset($total_comments_per_fotoid[$value->foto_id]) ? $total_comments_per_fotoid[$value->foto_id] : 0 ?></a>
                                    </div>
                                </div>
                            </div>
                            <!-- Konten -->
                            <div class="blog-content border border-top-0 rounded-bottom p-4">
                            <p class="mb-2">
    <img class="profile-picture" src="<?= base_url('assets/profil/' . $value->profil); ?>" alt="Profile Picture">
    <span class="username"><?= $value->username; ?></span>
</p>
                                       
                                <a href="#" class="h4 mb-3"><?= $value->judul_ft; ?></a>
                                <div class="product-descc mb-3">
                                    <p class="mb-0">
                                        <span class="short-descc"><?= implode(' ', array_slice(explode(' ', $value->desk_ft), 0, 3)); ?>...</span>
                                        <span class="full-descc" style="display: none;"><?= $value->desk_ft; ?></span>
                                        <a class="toggle-link" href="javascript:void(0);" onclick="toggleDescription(this)">Selengkapnya</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>



<style>
 .profile-picture {
        width: 50px; /* Atur lebar gambar sesuai kebutuhan */
        height: 50px; /* Atur tinggi gambar sesuai kebutuhan */
        border-radius: 50%; /* Membuat gambar menjadi lingkaran */
        object-fit: cover; /* Memastikan gambar terpotong dengan baik dalam lingkaran */
    }
    .username {
        margin-bottom: 2px; /* Menambahkan jarak bawah antara foto profil dan teks username */
    }
</style>


<!-- JavaScript -->
<script>

     // Fungsi untuk menangani pengguliran ke bagian "About" saat tautan diklik
     document.querySelector('a[href="#about"]').addEventListener('click', function(e) {
        e.preventDefault(); // Mencegah perilaku default dari tautan
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth' // Efek gulir halus
        });
    });
function toggleDescription(link) {
    var parentDiv = link.closest('.product-descc');
    var shortDesc = parentDiv.querySelector('.short-descc');
    var fullDesc = parentDiv.querySelector('.full-descc');

    if (shortDesc.style.display === 'none' || shortDesc.style.display === '') {
        shortDesc.style.display = 'inline';
        fullDesc.style.display = 'none';
        link.innerHTML = 'Selengkapnya';
    } else {
        shortDesc.style.display = 'none';
        fullDesc.style.display = 'inline';
        link.innerHTML = 'Sembunyikan';
    }
}
</script>



</div>

<!-- Gallery Start -->
<div class="container-fluid gallery py-5 my-5">
    <div class="mx-auto text-center mb-5" style="max-width: 900px;">
        <h5 class="section-title px-3"></h5>
        <h1 class="mb-4">Album</h1>
    </div>
    <div class="tab-class text-center">
        <ul class="nav nav-pills d-inline-flex justify-content-center mb-5">
            <?php foreach ($data_album as $value) { ?>
                <li class="nav-item">
                    <a class="d-flex mx-3 py-2 border border-primary bg-light rounded-pill" data-bs-toggle="pill" href="<?= base_url('home/dataalbum/' . $value->album_id); ?>">
                        <img src="<?= base_url('assets/album/' . $value->gambar); ?>" class="img-thumbnail" style="width: 40px; height: 40px; object-fit: cover; border-radius: 50%; margin-right: 10px;">
                        <span class="text-dark"><?= $value->nama_album ?></span>
                    </a>
                </li>
            <?php } ?>
        </ul>
    </div>
</div>


