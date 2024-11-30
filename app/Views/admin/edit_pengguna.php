<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>


<form action="<?= base_url('admin/pengguna/update/' . $id_pengguna) ?>" method="post">
    <?= csrf_field() ?>
    <div class="mb-3">
        <label for="nama">Nama Pengguna</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= old('nama', $pengguna['nama']) ?>">
    </div>
    <div class="mb-3">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" class="form-control" value="<?= old('username', $pengguna['username']) ?>">
    </div>
    <div class="mb-3">
        <label for="password">Password (Kosongkan jika tidak ingin diubah)</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="role">Role</label>
        <select name="role" id="role" class="form-control">
            <option value="Admin" <?= $pengguna['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
            <option value="Dosen" <?= $pengguna['role'] == 'Dosen' ? 'selected' : '' ?>>Dosen</option>
        </select>
    </div>
    <div class="mb-3">
        <label for="fingerprint_id">Fingerprint ID</label>
        <input type="text" name="fingerprint_id" id="fingerprint_id" class="form-control" value="<?= old('fingerprint_id', $pengguna['fingerprint_id']) ?>">
    </div>
    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
    <a href="<?= base_url('admin/pengguna') ?>" class="btn btn-secondary mt-3">Batal</a>
</form>

<?= $this->endSection() ?>
