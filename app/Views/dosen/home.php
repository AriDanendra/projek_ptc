<?= $this->extend('dosen/layout') ?>

<?= $this->section('content') ?>


<form method="GET" action="<?= base_url('dosen/home') ?>" class="row g-3 mb-3">
    <div class="col-md-3">
        <label for="hari" class="form-label">Pilih Hari:</label>
        <select name="hari" id="hari" class="form-select" onchange="this.form.submit()">
            <option value="">-- Semua Hari --</option>
            <option value="Senin" <?= ($hari == 'Senin') ? 'selected' : '' ?>>Senin</option>
            <option value="Selasa" <?= ($hari == 'Selasa') ? 'selected' : '' ?>>Selasa</option>
            <option value="Rabu" <?= ($hari == 'Rabu') ? 'selected' : '' ?>>Rabu</option>
            <option value="Kamis" <?= ($hari == 'Kamis') ? 'selected' : '' ?>>Kamis</option>
            <option value="Jumat" <?= ($hari == 'Jumat') ? 'selected' : '' ?>>Jumat</option>
        </select>
    </div>

    <div class="col-md-3">
        <label for="pekan" class="form-label">Pilih Pekan:</label>
        <select name="pekan" id="pekan" class="form-select" onchange="this.form.submit()">
            <option value="">-- Semua Pekan --</option>
            <option value="1" <?= ($pekan == '1') ? 'selected' : '' ?>>Pekan 1</option>
            <option value="2" <?= ($pekan == '2') ? 'selected' : '' ?>>Pekan 2</option>
            <option value="3" <?= ($pekan == '3') ? 'selected' : '' ?>>Pekan 3</option>
            <option value="4" <?= ($pekan == '4') ? 'selected' : '' ?>>Pekan 4</option>
        </select>
    </div>
</form>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php elseif (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>No</th>
            <th>Hari</th>
            <th>Pekan</th>
            <th>Waktu</th>
            <th>Mata Kuliah</th>
            <th>Kelas</th>
            <th>Ruangan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($jadwal) > 0): ?>
            <?php foreach ($jadwal as $index => $row): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= esc($row['hari']) ?></td>
                    <td><?= esc($row['pekan']) ?></td>
                    <td><?= esc($row['waktu_mulai']) ?> - <?= esc($row['waktu_selesai']) ?></td>
                    <td><?= esc($row['mata_kuliah'] ?? '-') ?></td>
                    <td><?= esc($row['kelas'] ?? '-') ?></td>
                    <td><?= esc($row['nama_ruangan'] ?? '-') ?></td>
                    <td>
                        <form method="POST" action="<?= base_url('dosen/home/batalkan') ?>" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="id_jadwal" value="<?= esc($row['id_jadwal']) ?>">
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin membatalkan pesanan?')">
                                Batalkan
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">Tidak ada jadwal ditemukan.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<?= $this->endSection() ?>
