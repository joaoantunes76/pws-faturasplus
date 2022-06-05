<?php
/* @var $fatura Fatura */
/* @var $cliente User */
/* @var $funcionario User */
/* @var $empresa Empresa */
/* @var $linhasFatura Linhasfatura[] */
/* @var $totalSemIva */
?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-9">
                    <h3 class="mb-0">Fatura</h3>
                </div>
                <div class="col-3">
                    <form method="post" action="<?= Url::toRoute('Faturas', 'EmitirFatura') ?>">
                        <input type="submit" class="btn btn-success" value="Emitir">
                    </form>
                </div>
            </div>
        </div>
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
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Quantidade</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produto</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor Unitário</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor Iva</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">TOTAL</th>
                        <th class="text-secondary opacity-7"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($linhasFatura as $linhaFatura) {
                    ?>
                        <tr>
                            <td class="px-5"><?= $linhaFatura->quantidade ?></td>
                            <td><?= $linhaFatura->produto->referencia ?> | <?= $linhaFatura->produto->descricao ?></td>
                            <td><?= $fatura->paraEuro($linhaFatura->valorunitario) ?> €</td>
                            <td><?= $fatura->paraEuro($linhaFatura->valoriva) ?> €</td>
                            <td><?= $fatura->paraEuro($linhaFatura->totalPorLinha()) ?> €</td>
                            <td></td>
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
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</section>

