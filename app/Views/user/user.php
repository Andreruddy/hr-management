<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h1><?= $title ?></h1>
        <div>
            <a href="<?= base_url('/users/create') ?>" class="btn btn-dark flex justify-content-end">Add Employee</a>
        </div>
    </div>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-dark text-white">
            <tr>
                <th>Name</th>
                <th>Username</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $key => $user) : ?>
                <tr>
                    <td>
                        <?= $user['name'] ?>
                    </td>
                    <td>
                        <?= $user['username'] ?>
                    </td>
                    <td>
                        <a href="<?= base_url('/users/create/' . $user['id']) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('/users/delete/' . $user['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>