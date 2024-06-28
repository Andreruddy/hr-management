<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h1>Employee List</h1>
            <div>
                <a href="<?= base_url('/users') ?>" class="btn btn-dark flex justify-content-end">Back</a>
            </div>
        </div>
        <div class="card p-4">
            <div class="row">
                <div class="col-md-12">
                    <?php if (isset($validation)) { ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $validation->listErrors() ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="card-body">
                <div>
                    <form action="<?= base_url('/users/update') ?>" method="post">
                        <div class="form-outline">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?= $data['username'] ?>" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="username">Username</label>
                            <input type="text" id="username" name="username" value="<?= $data['username'] ?>" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" id="password" name="password" value="<?= $data['pasword'] ?>" class="form-control form-control-lg" />
                        </div>
                        <div class="my-4 ml-auto">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>