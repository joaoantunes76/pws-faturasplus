<?php
/* @var $cliente User */
/* @var $fatura Fatura */
/* @var $produto Produto */
/* @var $valorIva */
?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Criar Linha Fatura</h6>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <p>Produto: <?= $produto->referencia ?> | <?= $produto->descricao ?></p>
            <p>Valor Unitário: <?= $produto->preco ?> €</p>
            <p>Valor Iva: <?= $valorIva ?> €</p>
            <form class="form" method="post" action="<?= Url::toRoute('Faturas', 'EmitirQuartaFase', $cliente->id) ?>">
                <div class="form-group">
                    <label class="form-label" for="quantidade">Quantidade</label>
                    <br>
                    <input onKeyDown="return false" id="quantidade" name="quantidade" type="number" value="1" min="1" max="<?= $produto->stock ?>">
                </div>
                <div class="form-group">
                    <input type="hidden" name="produtoId" value="<?= $produto->id ?>">
                    <input type="hidden" name="clienteId" value="<?= $cliente->id ?>">
                    <input type="hidden" name="faturaId" value="<?= $fatura->id ?>">
                    <input type="hidden" name="valorUnitario" value="<?= $produto->preco ?>">
                    <input type="hidden" name="valorIva" value="<?= $valorIva ?>">
                    <input class="btn btn-primary" type="submit" value="Submeter">
                </div>
            </form>
        </div>
    </div>

</section>
