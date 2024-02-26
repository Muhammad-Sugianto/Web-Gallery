<div class="main-panel">
        <div class="content-wrapper">
           <!-- Pesan keberhasilan -->
           <?php if ($this->session->flashdata('success')): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-success" role="alert">
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        
        <!-- Pesan kesalahan -->
        <?php if (validation_errors()): ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
            <div class="row">
                <div class="col-lg-15">
                    <div class="d-flex align-items-center mb-5">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor"> User</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Data User</h2>
                            <a href="<?= base_url('user/add') ?>" class="btn btn-success float-right">
                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-plus"></i>
                                    <span class="ml-2">User</span>
                                </span>
                            </a>

                            <!-- Tabel -->
                            <div class="table-responsive">
                                <table id="userTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Email</th>
                                            <th>profil</th>
                                            <th>Nama Lengkap</th>
                                            <th>Alamat</th>
                                            <!-- <th>Level</th> -->
                                            <th>Action</th>     
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($user as $key => $value ):?>
                                            <tr>
                                                <td class="text-left"><?= $no++ ?></td>
                                                <td class="text-left"><?= $value->username ?></td>
                                                <td class="text-left"><?= $value->password ?></td>
                                                <td class="text-left"><?= $value->email ?></td>
                                                <td class="text-left">
                                                <img src="<?= base_url('assets/profil/'. $value->profil) ?>" width="4000px" height="800px" style="border-radius: 10px;">
                                                </td>
                                                <td class="text-left"><?= $value->nama_lengkap ?></td>
                                                <td class="text-left"><?= $value->alamat ?></td>
                                                <td class="text-left">
                                                    <a href="<?= base_url('user/edit/' . $value->user_id) ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i></i></a>
                                                    <a href="<?= base_url('user/delete/' . $value->user_id) ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i></i></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Akhir Tabel -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 0.5em; /* adjust as needed */
    padding: 0.5em 1em;
    border: none;
    border-radius: 0.25em;
    color: white;
    cursor: pointer;
}

.btn i {
    font-size: 1.25em; /* adjust as needed */
}

.d-flex {
    display: flex;
    align-items: center;
}

.align-items-center {
    align-items: center;
}

.ml-2 {
    margin-left: 0.5em; /* adjust as needed */
}
    </style>
    <!-- Inisialisasi DataTables -->
    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>