<!-- app/Views/tugas/archived.php -->

<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="my-4">Tugas Diarsipkan</h2>

            <?php
            // Mengecek apakah semua data diarsipkan (211127_archived = 0)
            $allArchived = true;
            foreach ($archivedTugas as $row) {
                if ($row['211127_archived'] != 0) {
                    $allArchived = false;
                    break;
                }
            }
            ?>
            <form action="/tugas/exportPdf" method="post">
                <div class="form-group">
                    <label for="start_date">Tanggal Mulai</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>
                <div class="form-group">
                    <label for="end_date">Tanggal Akhir</label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Buat Laporan</button>
            </form>
            <?php if (empty($archivedTugas) || $allArchived) : ?>
                <div class="alert alert-info">
                    <p>Tidak ada tugas yang diarsipkan.</p>
                </div>
            <?php else : ?>
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Email</th>
                            <th scope="col">Task</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Nama Kategori</th>
                            <th scope="col">Prioritas</th>
                            <th scope="col">Tanggal</th>
                            <!-- Tambahkan kolom sesuai kebutuhan -->
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($archivedTugas as $index => $row) : ?>
                            <?php if ($row['211127_archived'] == 1) : ?>
                                <tr class="fw-normal">
                                    <th>
                                        <span class="ms-2"><?= $row['211127_email']; ?></span>
                                    </th>
                                    <td>
                                        <span><?= $row['211127_namatugas']; ?></span>
                                    </td>
                                    <td>
                                        <span><?= $row['211127_deskripsi']; ?></span>
                                    </td>
                                    <td>
                                        <span><?= $row['211127_namakategori']; ?></span>
                                    </td>
                                    <td>
                                        <!-- Sesuaikan dengan logika warna prioritas yang Anda gunakan -->
                                        <?php if ($row['211127_kodewarna'] === '#00FF00') : ?>
                                            <h6 class="mb-0"><span class="badge bg-success">Low priority</span></h6>
                                        <?php elseif ($row['211127_kodewarna'] === '#FFFF00') : ?>
                                            <h6 class="mb-0"><span class="badge bg-warning">Middle priority</span></h6>
                                        <?php elseif ($row['211127_kodewarna'] === '#FF0000') : ?>
                                            <h6 class="mb-0"><span class="badge bg-danger">High priority</span></h6>
                                        <?php else : ?>
                                            <h6 class="mb-0"><span class="badge bg-info">Other priority</span></h6>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span><?= $row['211127_waktuterakhir']; ?></span>
                                    </td>
                                    <!-- Tambahkan aksi sesuai kebutuhan -->
                                    <td>
                                        <a href="/tugas/unarchive/<?= $row['211127_idtugas']; ?>" data-mdb-toggle="tooltip" title="Unarchive"><i class="fas fa-undo-alt fa-lg text-info me-3"></i></a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>