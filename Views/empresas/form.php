<?php


/* @var $empresa Empresa */
?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0"><?= isset($empresa) ? "Editar" : "Criar" ?> Empresa</h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <form class="form" method="post">
                <div class="form-group">
                    <label for="designacaosocial">Designacao Social: </label>
                    <br>
                    <input class="form-control" type="text" id="designacaosocial" name="designacaosocial" value="<?= isset($empresa) ? $empresa->designacaosocial : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('designacaosocial'); }?>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <br>
                    <input class="form-control" type="text" id="email" name="email" value="<?= isset($empresa) ? $empresa->email : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('email'); }?>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone: </label>
                    <br>
                    <input class="form-control" type="text" id="telefone" name="telefone" value="<?= isset($empresa) ? $empresa->telefone : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('telefone'); }?>
                </div>
                <div class="form-group">
                    <label for="nif">NIF: </label>
                    <br>
                    <input class="form-control" type="text" id="nif" name="nif" value="<?= isset($empresa) ? $empresa->nif : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('nif'); }?>
                </div>
                <div class="form-group">
                    <label for="morada">Morada: </label>
                    <br>
                    <input class="form-control" type="text" id="morada" name="morada" value="<?= isset($empresa) ? $empresa->morada : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('morada'); }?>
                </div>
                <div class="form-group">
                    <label for="codigopostal">Codigo Postal: </label>
                    <br>
                    <input class="form-control" type="text" id="codigopostal" name="codigopostal" value="<?= isset($empresa) ? $empresa->codigopostal : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('codigopostal'); }?>
                </div>
                <div class="form-group">
                    <label for="localidade">Localidade: </label>
                    <br>
                    <input class="form-control" type="text" id="localidade" name="localidade" value="<?= isset($empresa) ? $empresa->localidade : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('localidade'); }?>
                </div>
                <div class="form-group">
                    <label for="capitalsocial">Capital Social: </label>
                    <br>
                    <input class="form-control" type="text" id="capitalsocial" name="capitalsocial" value="<?= isset($empresa) ? $empresa->capitalsocial : "" ?>">
                    <?php if(isset($empresa->errors)){ echo $empresa->errors->on('capitalsocial'); }?>
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="<?= isset($empresa) ? "Editar" : "Criar" ?>">
                </div>
            </form>
        </div>
    </div>

</section>