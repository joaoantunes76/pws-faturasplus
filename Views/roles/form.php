<?php


/* @var $role Role */
?>

<section class="px-5">
    <form class="form" method="post">
        <div class="form-group">
            <label for="name">Name: </label>
            <br>
            <input class="form-control" type="text" id="name" name="name" value="<?= isset($role) ? $role->name : "" ?>">
            <?php if(isset($role->errors)){ echo $role->errors->on('name'); }?>
        </div>
        <br>
        <div class="form-group">
            <input class="btn btn-primary" type="submit"">
        </div>
    </form>
</section>