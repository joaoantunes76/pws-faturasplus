<?php


/* @var $user User */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">User <?= isset($user) ? "Update" : "Create" ?></h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <form class="form" method="post">
                <div class="form-group">
                    <label for="name">Username: </label>
                    <br>
                    <input class="form-control" type="text" id="name" name="name" value="<?= isset($user) ? $user->username : "" ?>">
                    <?php if(isset($user->errors)){ echo $user->errors->on('name'); }?>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <br>
                    <input class="form-control" type="text" id="email" name="email" value="<?= isset($user) ? $user->email : "" ?>">
                    <?php if(isset($user->errors)){ echo $user->errors->on('email'); }?>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone: </label>
                    <br>
                    <input class="form-control" type="text" id="telefone" name="telefone" value="<?= isset($user) ? $user->telefone : "" ?>">
                    <?php if(isset($user->errors)){ echo $user->errors->on('name'); }?>
                </div>
                <div class="form-group">
                    <label for="nif">NIF: </label>
                    <br>
                    <input class="form-control" type="text" id="nif" name="nif" value="<?= isset($user) ? $user->nif : "" ?>">
                    <?php if(isset($user->errors)){ echo $user->errors->on('nif'); }?>
                </div>
                <div class="form-group">
                    <label for="morada">Morada: </label>
                    <br>
                    <input class="form-control" type="text" id="morada" name="morada" value="<?= isset($user) ? $user->morada : "" ?>">
                    <?php if(isset($user->errors)){ echo $user->errors->on('morada'); }?>
                </div>
                <div class="form-group">
                    <label for="codigopostal">Codigo Postal: </label>
                    <br>
                    <input class="form-control" type="text" id="codigopostal" name="codigopostal" value="<?= isset($user) ? $user->codigopostal : "" ?>">
                    <?php if(isset($user->errors)){ echo $user->errors->on('codigopostal'); }?>
                </div>
                <div class="form-group">
                    <label for="localidade">Localidade: </label>
                    <br>
                    <input class="form-control" type="text" id="localidade" name="localidade" value="<?= isset($user) ? $user->localidade : "" ?>">
                    <?php if(isset($user->errors)){ echo $user->errors->on('localidade'); }?>
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="<?= isset($user) ? "Update" : "Create" ?>">
                </div>
            </form>
        </div>
    </div>


</section>