<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between">
        <h1>Employee List</h1>
        <div>

            <a href="<?= base_url('/employees/create') ?>" class="btn btn-dark flex justify-content-end">Add Employee</a>
        </div>
    </div>
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-dark text-white">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Position</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $key => $employee) : ?>

                <tr>
                    <td>
                        <?= $employee['name'] ?>
                    </td>
                    <td>
                        <?= $employee['email'] ?>
                    </td>
                    <td>
                        <?= $employee['status'] ?>
                    </td>
                    <td>
                        <?= $employee['position'] ?>
                    </td>
                    <td>
                        <a href="<?= base_url('/employees/create/' . $employee['id']) ?>" class="btn btn-warning">Edit</a>
                        <a href="<?= base_url('/employees/delete/' . $employee['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection(); ?>