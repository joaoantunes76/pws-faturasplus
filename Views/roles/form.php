<?php


/* @var $role Role */
?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Role <?= isset($role) ? "Update" : "Create" ?></h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <form class="form" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <br>
                    <input class="form-control" type="text" id="name" name="name" value="<?= isset($role) ? $role->name : "" ?>">
                    <?php if(isset($role->errors)){ echo $role->errors->on('name'); }?>
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="<?= isset($role) ? "Update" : "Create" ?>">
                </div>
            </form>
        </div>
    </div>

</section>