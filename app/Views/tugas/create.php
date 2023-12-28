<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Tugas</h3>
                    </div>
                    <div class="card-body">
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('error'); ?></h5>
                            </div>
                        <?php endif; ?>
                        <form action="/tugas/save" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="namatugas">Nama Tugas</label>
                                <input type="text" name="namatugas" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" required></textarea>
                            </div>
                            <input type="hidden" name="idpengguna" value="<?= session()->get('idpengguna'); ?>">
                            <div class="form-group">
                                <label for="label">Label</label>
                                <input type="text" name="label" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="label">Email</label>
                                <input type="email" name="email_tujuan" class="form-control" required value="<?= session()->get('email'); ?>">
                            </div>
                            <div class="form-group">
                                <label for="waktuterakhir">Waktu Terakhir</label>
                                <input type="datetime-local" name="waktuterakhir" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="idkategori">Kategori</label>
                                <!-- Dropdown untuk kategori (gunakan data dari tabel kategori) -->
                                <select name="idkategori" class="form-control" required>
                                    <?php foreach ($kategori as $row) : ?>
                                        <option value="<?= $row['211127_idkategori']; ?>"><?= $row['211127_namakategori']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Tugas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>