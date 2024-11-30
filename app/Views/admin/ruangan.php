<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/ruangan/tambah') ?>" class="btn btn-primary">Tambah Ruangan</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nama Ruangan</th>
            <th>Kapasitas</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($ruangan as $row): ?>
            <tr>
                <td><?= esc($row['nama_ruangan']) ?></td>
                <td><?= esc($row['kapasitas']) ?></td>
                <td>
                    <a href="<?= base_url('admin/ruangan/edit/' . $row['id_ruangan']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/ruangan/hapus/' . $row['id_ruangan']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ruangan ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
