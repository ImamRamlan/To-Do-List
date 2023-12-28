<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
  <!-- ... (kode sebelumnya) ... -->
</div>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info">
          <div class="inner">
            <h3>Tugas</h3>
            <p><?= $jumlahTugas; ?> Tugas Total</p>
          </div>
          <div class="icon"></div>
          <a href="/tugas" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>

      <!-- Menampilkan daftar warna -->
      <!-- <div class="col-lg-3 col-6">
        <?php foreach ($distinctColors as $color) : ?>
          <div class="small-box" style="background-color: <?= $color['211127_kodewarna'] ?? ''; ?>">
            <div class="inner">
              <h3><?= $modelTugas->countTugasByKodewarna($color['211127_kodewarna'] ?? ''); ?></h3>
              <p><?= $color['211127_kodewarna'] ?? ''; ?> Tugas dengan Warna Tertentu</p>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        <?php endforeach; ?>
      </div> -->
    </div>
    <?= session()->get('email'); ?>
  </div>
</section>

<?= $this->endSection(); ?>