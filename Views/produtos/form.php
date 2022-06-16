<?php


/* @var $produto Produto */
/* @var $ivas Iva[] */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0"><?= isset($produto) ? "Editar" : "Criar" ?> Produto</h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <form class="form" method="post">
                <div class="form-group">
                    <label for="referencia">Referencia: </label>
                    <br>
                    <input class="form-control" type="number" id="referencia" name="referencia" value="<?= isset($produto) ? $produto->referencia : "" ?>">
                    <?php if(isset($produto->errors)){ echo $produto->errors->on('referencia'); }?>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição: </label>
                    <br>
                    <input class="form-control" type="text" id="descricao" name="descricao" value="<?= isset($produto) ? $produto->descricao : "" ?>">
                    <?php if(isset($produto->errors)){ echo $produto->errors->on('descricao'); }?>
                </div>
                <div class="form-group">
                    <label for="preco">Preço: </label>
                    <br>
                    <input class="form-control" type="number" id="preco" name="preco" step=".10" value="<?= isset($produto) ? $produto->preco : "" ?>">
                    <?php if(isset($produto->errors)){ echo $produto->errors->on('preco'); }?>
                </div>
                <div class="form-group">
                    <label for="stock">Stock: </label>
                    <br>
                    <input class="form-control" type="number" id="stock" name="stock" value="<?= isset($produto) ? $produto->stock : "" ?>">
                    <?php if(isset($produto->errors)){ echo $produto->errors->on('stock'); }?>
                </div>
                <div class="form-group">
                    <label for="iva_id">IVA: </label>
                    <br>
                    <select class="form-select" id="iva_id" name="iva_id">
                        <?php
                            foreach($ivas as $iva){
                                if(isset($produto) && $iva->id == $produto->iva_id){
                                    ?>
                                    <option value="<?= $iva->id ?>" selected><?= $iva->percentagem ?>% (<?= $iva->descricao ?>)</option>
                                    <?php
                                }
                                else{
                                    ?>
                                    <option value="<?= $iva->id ?>"><?= $iva->percentagem ?>% (<?= $iva->descricao ?>)</option>
                                    <?php
                                }
                            }
                        ?>
                    </select>
                    <?php if(isset($produto->errors)){ echo $produto->errors->on('iva_id'); }?>
                </div>
                <br>
                <div class="form-group">
                    <input class="btn btn-primary" type="submit" value="<?= isset($produto) ? "Editar" : "Criar" ?>">
                </div>
            </form>
        </div>
    </div>


</section>