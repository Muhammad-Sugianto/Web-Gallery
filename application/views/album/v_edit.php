<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Album</h3>
            </div>
            <div class="card-body">
                <?= form_open('album/edit/' . $album->album_id, 'class="form"') ?>
                    <div class="form-group row">
                        <label for="album_id" class="col-sm-4 col-form-label text-right">Album Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="album_id" name="album_id" value="<?= $album->album_id ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama_album" class="col-sm-4 col-form-label text-right">Nama Album</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="nama_album" name="nama_album" value="<?= $album->nama_album ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="deskripsi" class="col-sm-4 col-form-label text-right">Deskripsi</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="deskripsi" name="deskripsi" value="<?= $album->deskripsi ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_buat" class="col-sm-4 col-form-label text-right">Tgl Buat</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control bg-light" id="tgl_buat" name="tgl_buat" value="<?= $album->tgl_buat ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-4 col-form-label text-right">User Id</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="user_id" name="user_id" value="<?= $album->user_id ?>" required>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-sm-5">
                            <button type="submit" class="btn btn-primary text-center">
                                <i class="mdi mdi-content-save"></i>
                                <span>Update</span>
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