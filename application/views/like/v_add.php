<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tambah Like</h3>
            </div>
            <div class="card-body">
                <?= form_open('like/add', 'class="form"') ?>
                <div class="form-group row">
                    <label for="like_id" class="col-sm-4 col-form-label text-right">Like ID</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control bg-light" id="like_id" name="like_id" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="foto_id" class="col-sm-4 col-form-label text-right">Foto ID</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control bg-light" id="foto_id" name="foto_id" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="user_id" class="col-sm-4 col-form-label text-right">User ID</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control bg-light" id="user_id" name="user_id" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_like" class="col-sm-4 col-form-label text-right">Tanggal Like</label>
                    <div class="col-sm-5">
                        <input type="date" class="form-control bg-light" id="tgl_like" name="tgl_like" required>
                    </div>
                </div>
                <div class="form-group row text-center">
                    <div class="col-sm-12">
                        <a href="<?= base_url('like') ?>" class="btn btn-secondary mr-2">
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
}

.btn i {
    font-size: 1.25em; /* adjust as needed */
}
</style>