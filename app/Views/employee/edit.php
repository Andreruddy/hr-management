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
                    <form action="<?= base_url('/employees/update/' . $data['id']) ?>" method="post" enctype="multipart/form-data">
                        <div class="form-outline">
                            <label class="form-label" for="name">Name</label>
                            <input type="text" id="name" name="name" value="<?= $data['name'] ?>" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="status">Status</label>
                            <input type="text" id="status" name="status" value="<?= $data['status'] ?>" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="email">Email</label>
                            <input type="text" id="email" name="email" value="<?= $data['email'] ?>" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label class="form-label" for="position">Postion</label>
                            <input type="text" id="position" name="position" value="<?= $data['position'] ?>" class="form-control form-control-lg" />
                        </div>
                        <div class="form-outline">
                            <label for="photo">Current Photo</label><br>
                            <?php if ($data['photo']) : ?>
                                <img src="/uploads/<?= $data['photo'] ?>" alt="Photo" width="150"><br><br>
                            <?php else : ?>
                                <p>No photo available</p>
                            <?php endif; ?>
                            <label for="photo">Change Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control-file">
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