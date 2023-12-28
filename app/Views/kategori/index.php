<!-- resources/views/kategori/index.php -->

<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card ">
                    <div class="card-body">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan'); ?></h5>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('hapus')) : ?>
                            <div class="alert alert-danger alert-dismissible col-md-5">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('hapus'); ?></h5>
                            </div>
                        <?php endif; ?>

                        <br>

                        <h5>Form Tambah Kategori Produk</h5>
                        <form action="/kategori/save" method="post">
                            <?= csrf_field(); ?>
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Nama Kategori</label>
                                        <input type="text" name="namakategori" class="form-control form-control-border border-width-2 col-md-10" placeholder="Masukkan Nama Kategori" autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Pilih Warna Penting Tugas</label>
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <ul class="fc-color-picker" id="color-chooser">
                                        <li><a class="text-success" href="#" data-color="#00FF00"><i class="fas fa-circle"></i> Hijau</a></li>
                                        <li><a class="text-warning" href="#" data-color="#FFFF00"><i class="fas fa-circle"></i> Kuning</a></li>
                                        <li><a class="text-danger" href="#" data-color="#FF0000"><i class="fas fa-circle"></i> Merah</a></li>
                                        <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                                    </ul>
                                </div>
                                <input type="hidden" name="kodewarna" id="kodewarna" value="" />
                                <button type="submit" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i> Tambah Kategori</button>
                            </div>
                        </form>
                        <br>
                        <h5>Data Kategori</h5>
                        <div class="row">
                            <?php foreach ($kategori as $index => $row) : ?>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="card-title"><?= $row['211127_namakategori']; ?></h5>
                                            <!-- ... -->
                                            <p class="card-text">
                                                Kode Warna:
                                                <?php if ($row['211127_kodewarna'] === '#00FF00') : ?>
                                                    <span class="text-success"> Warna Hijau</span>
                                                <?php elseif ($row['211127_kodewarna'] === '#FFFF00') : ?>
                                                    <span class="text-warning"> Warna Kuning</span>
                                                <?php elseif ($row['211127_kodewarna'] === '#FF0000') : ?>
                                                    <span class="text-danger"> Warna Merah</span>
                                                <?php else : ?>
                                                    <span class="text-dark"> Warna Lainnya</span>
                                                 <?php endif; ?>
                                            </p>
                                            <div class="badge" style="position: absolute; top: 5px; right: 5px;">
                                                <i class="fas fa-circle" style="color: <?= $row['211127_kodewarna']; ?>;"></i>
                                            </div>

                                            <!-- Tombol delete -->
                                            <a href="<?= base_url('/kategori/delete/' . $row['211127_idkategori']); ?>" class="btn btn-danger btn-sm float-right" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const colorChooser = document.getElementById("color-chooser");
        const hiddenInput = document.getElementById("kodewarna");

        colorChooser.addEventListener("click", function (event) {
            event.preventDefault();

            // Mendapatkan warna dari kelas teks
            const selectedColor = event.target.classList.contains("text-success") ? "#00FF00" :
                event.target.classList.contains("text-warning") ? "#FFFF00" :
                event.target.classList.contains("text-danger") ? "#FF0000" :
                "#000000";  // Default, jika kelas teks tidak dikenali

            hiddenInput.value = selectedColor;
        });
    });
</script>

<?= $this->endSection(); ?>
