<div class="main-panel">
    <div class="content-wrapper">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">Edit User</h3>
            </div>
            <div class="card-body">
                <?php echo form_open('user/edit/' . $user->user_id, 'class="form"') ?>
                    <!-- Hidden field to store user_id -->
                    <!-- <input type="hidden" name="user_id" value="<?= $user_id ?>"> -->

                    <div class="form-group row">
                        <label for="username" class="col-sm-4 col-form-label text-right">Username</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="username" name="username" value="<?= $user->username ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="password" class="col-sm-4 col-form-label text-right">Password</label>
                        <div class="col-sm-5">
                            <input type="password" class="form-control bg-light" id="password" name="password" value="<?= $user->password ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-sm-4 col-form-label text-right">Email</label>
                        <div class="col-sm-5">
                            <input type="email" class="form-control bg-light" id="email" name="email" value="<?= $user->email ?>" required>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="nama_lengkap" class="col-sm-4 col-form-label text-right">Nama Lengkap</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control bg-light" id="nama_lengkap" name="nama_lengkap" value="<?= $user->nama_lengkap ?>" required>
                        </div>
                    </div>

                    
                    <div class="form-group row">
                        <label for="alamat" class="col-sm-4 col-form-label text-right">Alamat</label>
                        <div class="col-sm-5">
                            <textarea class="form-control bg-light" id="alamat" name="alamat" rows="3" required><?= $user->alamat ?></textarea>
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