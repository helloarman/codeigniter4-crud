<?= $this->extend('layouts\master.php') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card">
        <form action="<?php echo base_url('update/'.$todo['id']) ?>" method="post">
            <?= csrf_field() ?>
            <div class="card-header bg-dark">
                <dev class="d-flex align-items-center justify-content-between">
                    <h5 class="text-light">Edit Task</h5>
                    <a href="/" class="btn btn-primary align-self-end"><i class="fa-solid fa-caret-left"></i> Back</a>
                </dev>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control <?php echo (isset($validation) && $validation->hasError('title') ? 'is-invalid' : '') ?>" id="title" name="title" placeholder="Add a Title" value="<?php echo set_value('name', @$todo['title']); ?>">
                    <small class="text-danger">
                        <?php 
                            if(isset($validation) && $validation->hasError('title')){
                                echo $validation->getError('title');
                            }
                        ?>
                    </small>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control <?php echo (isset($validation) && $validation->hasError('description') ? 'is-invalid' : '') ?>" id="description" name="description" rows="3"><?php echo set_value('description', @$todo['description']); ?></textarea>
                    <small class="text-danger">
                        <?php 
                            if(isset($validation) && $validation->hasError('description')){
                                echo $validation->getError('description');
                            }
                        ?>
                    </small>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i>
                        Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>