<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tambah Foto</h3>
            </div>
            <div class="card-body">
            <?php echo form_open_multipart('foto/add'); ?>
                <div class="form-group row">
                    <label for="judul_ft" class="col-sm-4 col-form-label text-right">Judul Foto</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control bg-light" id="judul_ft" name="judul_ft" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="desk_ft" class="col-sm-4 col-form-label text-right">Deskripsi Foto</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control bg-light" id="desk_ft" name="desk_ft" required>
                    </div>
                </div>
                <div class="form-group row">
    <label for="lokasi_file" class="col-sm-4 col-form-label text-right">Lokasi file</label>
    <div class="col-sm-5">
        <input type="file" name="lokasi_file" class="form-control" required>
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-4"></div>
    <div class="col-sm-5">
        <div class="mb-3">
            <img src="<?= base_url('assets/wallpeper6.jpg') ?>" id="gambar_load" width="250px">
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="album_id" class="col-sm-4 col-form-label text-right">Album</label>
    <div class="col-sm-5">
        <select class="form-control" id="album_id" name="album_id" required>
            <option value="">Pilih Album</option>
            <?php foreach ($album as $album): ?>
                <option value="<?= $album->album_id ?>"><?= $album->nama_album ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>

                <div class="form-group row text-center">
                    <div class="col-sm-12">
                        <a href="<?= base_url('user') ?>" class="btn btn-secondary mr-2">
                            <i class="mdi mdi-arrow-left"></i> Kembali
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="mdi mdi-content-save"></i> Simpan
                        </button>
                    </div>
                </div>
                <?php
    echo form_close();
    ?>
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
    font-size: 1.25em; /* adjust as needed */
}
</style>

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
</style>