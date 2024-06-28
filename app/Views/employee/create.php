<?= $this->extend('layouts/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-5">
    <div class="container mt-5">
        <div class="d-flex justify-content-between">
            <h1><?= $title ?></h1>
            <div>
                <a href="<?= base_url('/empolyees') ?>" class="btn btn-dark flex justify-content-end">Back</a>
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
                    <form action="<?= base_url('/employees/store') ?>" method="post">
                        <div class="form-outline">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" name="name" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="status">Status</label>
                            <input type="text" id="status" name="status" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="email" name="email" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="position">Postion</label>
                            <input type="text" id="position" name="position" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="photo">Photo (JPG/JPEG, max 300KB)</label>
                            <input type="file" id="photo" name="photo" class="form-control form-control-lg" />
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