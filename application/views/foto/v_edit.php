<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Foto</h3>
            </div>
            <div class="card-body">
            <?php echo form_open_multipart('foto/edit/' . $foto->foto_id); ?>
                    <!-- Hidden field to store foto_id -->
                    <!-- <input type="hidden" name="foto_id" value="<?= $foto->foto_id ?>"> -->

                    <div class="form-group row">
                        <label for="judul_ft" class="col-sm-4 col-form-label text-right">Judul Foto</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="judul_ft" name="judul_ft" value="<?= $foto->judul_ft ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="desk_ft" class="col-sm-4 col-form-label text-right">Deskripsi Foto</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="desk_ft" name="desk_ft" value="<?= $foto->desk_ft ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tgl_unggah" class="col-sm-4 col-form-label text-right">Tanggal Unggah</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control bg-light" id="tgl_unggah" name="tgl_unggah" value="<?= $foto->tgl_unggah ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
        <label for="lokasi_file" class="col-sm-4 col-form-label text-right">Gambar</label>
        <div class="col-sm-5">
            <input type="file" name="lokasi_file" class="form-control" id="lokasi_file" required>
        </div>
    </div>
                    <div class="form-group row">
                        <label for="album_id" class="col-sm-4 col-form-label text-right">Album ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="album_id" name="album_id" value="<?= $foto->album_id ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="user_id" class="col-sm-4 col-form-label text-right">User ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="user_id" name="user_id" value="<?= $foto->user_id ?>" required>
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

                    <?php echo form_close(); ?>
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
