<div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-15">
                    <div class="d-flex align-items-center mb-5">
                        <i class="mdi mdi-home text-muted hover-cursor"></i>
                        <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                        <p class="text-primary mb-0 hover-cursor"> Foto</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="card-title">Data Foto</h2>
                            <a href="<?= base_url('foto/add') ?>" class="btn btn-success float-right">
                                <span class="d-flex align-items-center">
                                    <i class="mdi mdi-plus"></i>
                                    <span class="ml-2">Tambah Foto</span>
                                </span>
                            </a>

                            <!-- Tabel -->
                            <div class="table-responsive">
                                <table id="fotoTable" class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto ID</th>
                                            <th>Judul Foto</th>
                                            <th>Deskripsi Foto</th>
                                            <th>Tanggal Unggah</th>
                                            <th>Lokasi File</th>
                                            <th>Album ID</th>
                                            <th>User ID</th>
                                            <th>Action</th>     
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($foto as $key => $value ):?>
                                            <tr>
                                                <td class="text-left"><?= $no++ ?></td>
                                                <td class="text-left"><?= $value->foto_id ?></td>
                                                <td class="text-left"><?= $value->judul_ft ?></td>
                                                <td class="text-left"><?= $value->desk_ft ?></td>
                                                <td class="text-left"><?= $value->tgl_unggah ?></td>
                                                <td class="text-left">
                                                    <img src="<?= base_url('assets/img/'. $value->lokasi_file) ?>" width="1000px" height="500px" style="border-radius: 10px;">
                                                </td>

                                                <td class="text-left"><?= $value->album_id ?></td>
                                                <td class="text-left"><?= $value->user_id ?></td>
                                                <td class="text-left">
                                                    <a href="<?= base_url('foto/edit/' . $value->foto_id) ?>" class="btn btn-warning"><i class="mdi mdi-pencil"></i></a>
                                                    <a href="<?= base_url('foto/delete/' . $value->foto_id) ?>" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
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
                $('#fotoTable').DataTable();
            });
        </script>