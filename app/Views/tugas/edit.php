<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Tugas</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url('/tugas/update') ?>" method="post">
                            <input type="hidden" name="idtugas" value="<?= $tugas['211127_idtugas']; ?>">
                            <div class="form-group">
                                <label for="namatugas">Nama Tugas</label>
                                <input type="text" name="namatugas" class="form-control" value="<?= $tugas['211127_namatugas']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" required><?= $tugas['211127_deskripsi']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="tanggalterakhir">Tanggal Terakhir</label>
                                <input type="date" name="tanggalterakhir" class="form-control" value="<?= $tugas['211127_waktuterakhir']; ?>" required>
                            </div>
                            <input type="hidden" name="idpengguna" value="<?= session()->get('idpengguna'); ?>">
                            <div class="form-group">
                                <label for="label">Label</label>
                                <input type="text" name="label" class="form-control" value="<?= $tugas['211127_label']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="waktuterakhir">Waktu Terakhir</label>
                                <input type="datetime-local" name="waktuterakhir" class="form-control" value="<?= $tugas['211127_waktuterakhir']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="idkategori">Pilih Kategori</label>
                                <select name="idkategori" class="form-control" required>
                                    <?php foreach ($kategori as $row) : ?>
                                        <option value="<?= $row['211127_idkategori']; ?>" <?= ($row['211127_idkategori'] == $tugas['211127_idkategori']) ? 'selected' : ''; ?>>
                                            <?= $row['211127_namakategori']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Tugas</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
