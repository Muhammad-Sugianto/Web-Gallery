<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Tambah User</h3>
            </div>
            <div class="card-body">
                <?= form_open('user/add', 'class="form"') ?>
                <div class="form-group row">
                    <label for="username" class="col-sm-4 col-form-label text-right">Username</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control bg-light" id="username" name="username" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-4 col-form-label text-right">Password</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control bg-light" id="password" name="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-4 col-form-label text-right">Email</label>
                    <div class="col-sm-5">
                        <input type="email" class="form-control bg-light" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_lengkap" class="col-sm-4 col-form-label text-right">Nama Lengkap</label>
                    <div class="col-sm-5">
                        <input type="text" class="form-control bg-light" id="nama_lengkap" name="nama_lengkap" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat</label>
                    <div class="col-sm-5">
                        <textarea class="form-control bg-light" id="alamat" name="alamat" rows="3" required></textarea>
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