<?php


/* @var $iva */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0"><?= isset($iva) ? "Editar" : "Criar" ?> Iva</h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <form class="form" method="post">
                <div class="form-group">
                    <label for="percentagem">Percentagem: </label>
                    <br>
                    <input class="form-control" type="number" id="percentagem" name="percentagem" value="<?= isset($iva) ? $iva->percentagem : "" ?>">
                    <?php if(isset($iva->errors)){ echo $iva->errors->on('percentagem'); }?>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição: </label>
                    <br>
                    <input class="form-control" type="text" id="descricao" name="descricao" value="<?= isset($iva) ? $iva->descricao : "" ?>">
                    <?php if(isset($iva->errors)){ echo $iva->errors->on('descricao'); }?>
                </div>
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" <?= isset($iva) && $iva->vigor ? "checked" : "" ?>  name="vigor" id="vigor">
                    <label class="form-check-label" for="vigor">
                        Em Vigor
                    </label>
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="<?= isset($iva) ? "Editar" : "Criar" ?>">
                </div>
            </form>
        </div>
    </div>


</section>