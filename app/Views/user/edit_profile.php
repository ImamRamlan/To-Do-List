<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
    <section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Ubah Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="ProfileController/editProfileSubmit" method="post">
                            <div class="form-group">
                                <label for="namapengguna">Nama Pengguna:</label>
                                <input type="text" class="form-control" name="namapengguna" value="<?= session()->get('username'); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Kata Sandi:</label>
                                <input type="password" class="form-control" name="password" required value="">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama:</label>
                                <input type="text" class="form-control" name="nama" value="<?= session()->get('nama'); ?>" required>
                            </div>
                            <!-- Tambahkan field lainnya yang ingin diubah -->

                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button> <a href="/user" class="btn btn-success col-md-3">Kembali</a>
                        </form>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>