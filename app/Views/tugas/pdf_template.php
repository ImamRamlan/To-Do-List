<!-- views/admin/daftarpenawaran/pdf.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tugas Anda.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1>Tugas.</h1>
    <div class="card-body">
        <hr class="opacity-75">
        <table style="margin-bottom: 10px;" id="nama">
            <tbody>
                <tr>
                    <td style="padding-bottom: 5px;">Nama Anda</td>
                    <td style="padding-bottom: 5px;">:</td>
                    <td style="padding-bottom: 5px;"><?= session('nama') ?></td>
                </tr>
                <tr>
                    <td style=" width: 15%; padding-bottom: 5px;">Simpel Life</td>
                </tr>
            </tbody>
        </table>
        <!-- Default Table -->
        <table style="text-align: center; border-collapse: collapse; border: 1px solid #ddd;" id="table" width="100%">
            <thead>
                <tr>
                    <th style="text-align:center" scope="col">No</th>
                    <th style="text-align:center" scope="col">Nama Tugas</th>
                    <th style="text-align:center" scope="col">Label</th>
                    <th style="text-align:center" scope="col">Waktu Terakhir</th>
                    <th style="text-align:center" scope="col">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($archivedTugas as $tugas) : ?>
                    <?php if ($tugas['211127_archived'] == 1) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $tugas['211127_namatugas']; ?></td>
                        <td><?= $tugas['211127_label']; ?></td>
                        <td><?= $tugas['211127_waktuterakhir']; ?></td>
                        <td>
                            <!-- Sesuaikan dengan logika warna prioritas yang Anda gunakan -->
                            <?php if ($tugas['211127_kodewarna'] === '#00FF00') : ?>
                                <h6 class="mb-0"><span class="badge bg-success">Prioritas Rendah</span></h6>
                            <?php elseif ($tugas['211127_kodewarna'] === '#FFFF00') : ?>
                                <h6 class="mb-0"><span class="badge bg-warning">Prioritas Menengah</span></h6>
                            <?php elseif ($tugas['211127_kodewarna'] === '#FF0000') : ?>
                                <h6 class="mb-0"><span class="badge bg-danger">Prioritas Tinggi</span></h6>
                            <?php else : ?>
                                <h6 class="mb-0"><span class="badge bg-info">Other priority</span></h6>
                            <?php endif; ?>
                        </td>
                        <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                    </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>