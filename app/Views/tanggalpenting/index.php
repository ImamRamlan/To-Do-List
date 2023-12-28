<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Kalender Tanggal Penting</h3>
                    </div>
                    <?php if (session()->has('message')) : ?>
                        <div class="alert alert-success" role="alert">
                            <?= session('message') ?>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <!-- Form untuk memilih bulan dan tahun -->
                        <form action="<?= base_url('/tanggalpenting') ?>" method="get" class="mb-3">
                            <div class="row">
                                <div class="col-md-4">
                                    <select name="bulan" class="form-control">
                                        <?php for ($i = 1; $i <= 12; $i++) : ?>
                                            <option value="<?= $i ?>" <?= ($i == $bulan) ? 'selected' : '' ?>>
                                                <?= date("F", mktime(0, 0, 0, $i, 1)); ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="tahun" class="form-control">
                                        <?php for ($i = date('Y') - 5; $i <= date('Y') + 5; $i++) : ?>
                                            <option value="<?= $i ?>" <?= ($i == $tahun) ? 'selected' : '' ?>><?= $i ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary">Tampilkan</button>
                                </div>
                            </div>
                        </form>

                        <!-- Form untuk menambahkan tanggal penting -->
                        <form action="<?= base_url('/tanggalpenting/add') ?>" method="post">
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <input type="datetime-local" name="tanggal" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="namatanggal" class="form-control" placeholder="Nama Tanggal" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="notetanggal" class="form-control" placeholder="Note" required>
                                </div>
                            </div>
                            <input type="hidden" name="idpengguna" value="<?= session()->get('idpengguna'); ?>">
                            <button type="submit" class="btn btn-success">Tambahkan Tanggal Penting</button>
                        </form>

                        <table class="table table-bordered-2">
                            <thead>
                                <tr>
                                    <th>Sun</th>
                                    <th>Mon</th>
                                    <th>Tue</th>
                                    <th>Wed</th>
                                    <th>Thu</th>
                                    <th>Fri</th>
                                    <th>Sat</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun);
                                $firstDay = date('w', strtotime($tahun . '-' . $bulan . '-01'));

                                $counter = 1;

                                // Loop for each week
                                for ($i = 0; $i < 6; $i++) {
                                    echo '<tr>';
                                    // Loop for each day in a week
                                    for ($j = 0; $j < 7; $j++) {
                                        echo '<td>';
                                        if ($counter > $firstDay && $counter <= ($daysInMonth + $firstDay)) {
                                            $dayCounter = $counter - $firstDay;
                                            $tanggal = date('Y-m-d', strtotime($tahun . '-' . $bulan . '-' . $dayCounter));

                                            // Display day number
                                            echo '<p><strong>' . $dayCounter . '</strong></p>';

                                            // Find data for the date from the database
                                            $foundData = array_filter($tanggalpenting, function ($row) use ($tanggal) {
                                                return date('Y-m-d', strtotime($row['211127_tanggal'])) == $tanggal;
                                            });

                                            // If data is found, display it
                                            if (!empty($foundData)) {
                                                foreach ($foundData as $row) {
                                                    echo '<b>' . $row['211127_namatanggal'] . '</b>';
                                                    echo '<p>Note: ' . $row['211127_notetanggal'] . '</p>';
                                                    // Additional information as needed
                                                }
                                            } else {
                                                // If no data, display a placeholder
                                                echo '<p class="text-muted">Tidak ada kegiatan.</p>';
                                            }
                                        }
                                        echo '</td>';
                                        $counter++;
                                    }
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection(); ?>
