<?= $this->extend('layouts\master.php') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-dark">
            <dev class="d-flex align-items-center justify-content-between">
                <h5 class="text-light">All Task</h5>
                <a href="/create" class="btn btn-primary align-self-end">Add Task</a>
            </dev>
        </div>
        <div class="card-body">
            <?php 
                if(!empty($session->getFlashdata('success'))){
                    ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $session->getFlashdata('success'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <?php 
                if(!empty($session->getFlashdata('error'))){
                    ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $session->getFlashdata('error'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
                }
            ?>
            <div class="row">
                <?php if(!empty($todo)){ 
                    foreach($todo as $data){
                    ?>
                <div class="col-6 mt-3">
                    <div class="card">
                        <div class="card-body" title="<?php echo 'Created: '.$data['created_at'] ?>">
                            <h5 class="card-title"><?php echo $data['title'] ?></h5>
                            <p class="card-text"><?php echo $data['description'] ?></p>
                            <div class="text-end">
                                <a href="<?php echo base_url('edit/'.$data['id']) ?>" class="card-link text-primary"><i class="fa-solid fa-file-pen"></i></a>
                                <a href="<?php echo base_url('delete/'.$data['id']) ?>" class="card-link text-danger"><i class="fa-solid fa-trash-can"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } }else{ ?>
                <div class="alert alert-light text-center" role="alert">
                    No Task Found!
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>