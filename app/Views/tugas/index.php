<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<!-- Main content -->

<section class="content">
    <div class="container-fluid py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-12 col-xl-10">
                <div class="card-tools">
                    <a href="/tugas/archived" class="btn btn-info">Lihat Arsip</a>
                </div>
                <div class="card">
                    <div class="card-body p-4">
                        <?php if (session()->getFlashdata('pesan')) : ?>
                            <div class="alert alert-success alert-dismissible">
                                <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan'); ?></h5>
                            </div>
                        <?php endif; ?>

                        <?php if (session()->getFlashdata('hapus')) : ?>
                            <div class="alert alert-danger alert-dismissible">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('hapus'); ?></h5>
                            </div>
                        <?php endif; ?>
                        <?php if (session()->getFlashdata('error')) : ?>
                            <div class="alert alert-danger alert-dismissible ">
                                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('error'); ?></h5>
                            </div>
                        <?php endif; ?>



                        <div class="text-center">

                            <h2 class="my-4">Task List</h2>
                        </div>
                        <div class="card-tools">
                            <a href="/tugas/create" class="btn btn-primary">Tambah Tugas</a>
                        </div>
                        <?php if (empty($tugas)) : ?>
                            <div class="alert alert-info">
                                <p>Tidak ada tugas yang tersedia.</p>
                            </div>
                        <?php else : ?>
                            <table class="table mb-0">
                                <thead>
                                    <tr>
                                        <th scope="col">Email</th>
                                        <th scope="col">Task</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Prioritas</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tugas as $index => $row) : ?>
                                        <tr class="fw-normal">
                                            <th>
                                                <span class="ms-2"><?= $row['211127_email']; ?></span>
                                            </th>
                                            <td>
                                                <span><?= $row['211127_namatugas']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $row['211127_waktuterakhir']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $row['211127_deskripsi']; ?></span>
                                            </td>
                                            <td>
                                                <span><?= $row['211127_namakategori']; ?></span>
                                            </td>
                                            <td>
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
                                                <a href="/tugas/archive/<?= $row['211127_idtugas']; ?>" data-mdb-toggle="tooltip" title="Archive"><i class="fas fa-archive fa-lg text-info me-3"></i></a>
                                                <a href="/tugas/edit/<?= $row['211127_idtugas']; ?>" data-mdb-toggle="tooltip" title="Edit"><i class="fas fa-edit fa-lg text-warning me-3"></i></a>
                                                <a href="/tugas/delete/<?= $row['211127_idtugas']; ?>" data-mdb-toggle="tooltip" title="Remove"><i class="fas fa-trash-alt fa-lg text-danger"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>