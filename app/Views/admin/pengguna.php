<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<div class="mb-3">
    <a href="<?= base_url('admin/pengguna/tambah') ?>" class="btn btn-primary">Tambah Pengguna</a>
</div>

<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Nama Pengguna</th>
            <th>Username</th>
            <th>Password</th>
            <th>Role</th>
            <th>fingerprint_id</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($pengguna as $row): ?>
            <tr>
                <td><?= esc($row['nama']) ?></td>
                <td><?= esc($row['username']) ?></td>
                <td><?= esc($row['password']) ?></td>
                <td><?= esc($row['role']) ?></td>
                <td><?= esc($row['fingerprint_id']) ?></td>
                <td>
                    <a href="<?= base_url('admin/pengguna/edit/' . $row['id_pengguna']) ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="<?= base_url('admin/pengguna/hapus/' . $row['id_pengguna']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus pengguna ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>