<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit Komentar</h3>
            </div>
            <div class="card-body">
                <?= form_open('komen/edit/' . $komen->komen_id, 'class="form"') ?>
                    <div class="form-group row">
                        <label for="komen_id" class="col-sm-4 col-form-label text-right">Komen ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="komen_id" name="komen_id" value="<?= $komen->komen_id ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="foto_id" class="col-sm-4 col-form-label text-right">Foto ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="foto_id" name="foto_id" value="<?= $komen->foto_id ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="user_id" class="col-sm-4 col-form-label text-right">User ID</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="user_id" name="user_id" value="<?= $komen->user_id ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="isi_komen" class="col-sm-4 col-form-label text-right">Isi Komentar</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="isi_komen" name="isi_komen" value="<?= $komen->isi_komen ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_komen" class="col-sm-4 col-form-label text-right">Tanggal Komentar</label>
                        <div class="col-sm-5">
                            <input type="date" class="form-control bg-light" id="tgl_komen" name="tgl_komen" value="<?= $komen->tgl_komen ?>" required>
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