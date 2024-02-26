<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Album</h3>
            </div>
            <div class="card-body">
    <?php echo validation_errors(); ?>
    <?php if(isset($error)) { echo $error['error']; } ?>

    <?php echo form_open_multipart('album/edit/'.$album->album_id, 'class="form"') ?>
        <div class="form-group row">
            <label for="nama_album" class="col-sm-4 col-form-label text-right">Nama Album</label>
            <div class="col-sm-5">
                <input type="text" class="form-control bg-light" id="nama_album" name="nama_album" value="<?php echo $album->nama_album; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="deskripsi" class="col-sm-4 col-form-label text-right">Deskripsi</label>
            <div class="col-sm-5">
                <textarea class="form-control bg-light" id="deskripsi" name="deskripsi" rows="3" required><?php echo $album->deskripsi; ?></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="gambar" class="col-sm-4 col-form-label text-right">Gambar</label>
            <div class="col-sm-5">
                <input type="file" name="gambar" class="form-control" id="gambar">
            </div>
        </div>

        <div class="form-group row">
            <label for="tgl_buat" class="col-sm-4 col-form-label text-right">Tanggal Buat</label>
            <div class="col-sm-5">
                <input type="text" class="form-control bg-light" id="tgl_buat" name="tgl_buat" value="<?php echo $album->tgl_buat; ?>" required>
            </div>
        </div>

        <div class="form-group row">
            <label for="user_id" class="col-sm-4 col-form-label text-right">User ID</label>
            <div class="col-sm-5">
                <input type="text" class="form-control bg-light" id="user_id" name="user_id" value="<?php echo $album->user_id; ?>" required>
            </div>
        </div>

        <div class="form-group row text-center">
            <div class="col-sm-12">
                <a href="<?= base_url('album') ?>" class="btn btn-secondary mr-2">
                    <i class="mdi mdi-arrow-left"></i> Kembali
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="mdi mdi-content-save"></i> Simpan
                </button>
            </div>
        </div>
    <?= form_close() ?>
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
    max-width: fit-content; /* agar tombol tidak melebihi lebar konten */
    margin-left: 5em; /* menggeser tombol sedikit ke kanan */
}

.btn i {
    font-size: 1.25em; /* adjust as needed */
}


</style>