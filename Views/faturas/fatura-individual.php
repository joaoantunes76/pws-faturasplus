<?php

/* @var $fatura Fatura */
/* @var $cliente User */
/* @var $funcionario User */
/* @var $empresa Empresa */
/* @var $linhasFatura Linhasfatura[] */
/* @var $totalSemIva */

?>

<div class="card-body p-3">
    <div class="row">
        <div class="col-7">
            <br>
            <h5>FATURA #<?= $fatura->id ?></h5>
            <h4>Data de emissão: <?= date('d/m/Y', strtotime($fatura->data)) ?></h4>
        </div>
        <div class="col-5">
            <h4 class="name"> <?= $empresa->designacaosocial ?> </h4>
            <div>Email: <?= $empresa->email ?></div>
            <div><?= $empresa->codigopostal ?> | <?= $empresa->morada ?>, <?= $empresa->localidade ?></div>
            <div>TEL: <?= $empresa->telefone ?></div>
            <div>NIF: <?= $empresa->nif ?></div>
        </div>
    </div>
    <hr class="rounded">
    <div class="row">
        <div class="col-7">
            <h5>Para:</h5>
            <h4><?= $cliente->username ?></h4>
            <div>Email: <?= $cliente->email ?></div>
            <div><?= $cliente->codigopostal ?> | <?= $cliente->morada ?>, <?= $cliente->localidade ?></div>
            <div>TEL: <?= $cliente->telefone ?></div>
            <div>NIF: <?= $cliente->nif ?></div>
        </div>
        <div class="col-5">
            <h5>Funcionario:</h5>
            <h6><?= $funcionario->username ?></h6>
            <div>Email: <?= $funcionario->email ?></div>
        </div>
    </div>
    <br>
    <div class="p-0">
        <table class="table align-items-center mb-0">
            <thead>
            <tr>
                <th>Quantidade</th>
                <th>Produto</th>
                <th>Valor Unitário</th>
                <th>Valor Iva</th>
                <th>TOTAL</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($linhasFatura as $linhaFatura) {
                ?>
                <tr>
                    <td><?= $linhaFatura->quantidade ?></td>
                    <td><?= $linhaFatura->produto->referencia ?> | <?= $linhaFatura->produto->descricao ?></td>
                    <td><?= $fatura->paraEuro($linhaFatura->valorunitario) ?> €</td>
                    <td><?= $fatura->paraEuro($linhaFatura->valoriva) ?> €</td>
                    <td><?= $fatura->paraEuro($linhaFatura->totalPorLinha()) ?> €</td>
                </tr>
                <?php
            }
            ?>
            <tr>
                <td>TOTAL:</td>
                <td></td>
                <td><?= $fatura->paraEuro($totalSemIva) ?> €</td>
                <td><?= $fatura->paraEuro($fatura->ivatotal) ?> €</td>
                <td><?= $fatura->paraEuro($fatura->valortotal) ?> €</td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
