<?php
/* @var $cliente User */
/* @var $fatura Fatura */
/* @var $linhasFatura Linhasfatura[] */
?>
<a href="<?= Url::toRoute('Faturas', 'EmitirTerceiraFase', $fatura->id) ?>" class="btn btn-success" role="button">Adicionar Linha Fatura</a>
<br>
<section class="mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header row">
                    <h6 class="col">Linhas de Fatura para: <?= $cliente->username ?></h6>
                    <?php
                    if (!empty($linhasFatura)) {
                    ?>
                        <form class="col-3" method="post" action="<?= Url::toRoute('Faturas', 'PrevisualizarFatura') ?>">
                            <input type="hidden" name="clienteId" value="<?= $cliente->id ?>">
                            <input type="hidden" name="faturaId" value="<?= $fatura->id ?>">
                            <input type="submit" class="btn btn-primary" value="Pré-visualizar Fatura">
                        </form>
                    <?php
                    }
                    ?>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Produto</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Quantidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor Unitário</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor Iva</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($linhasFatura as $linhaFatura){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $linhaFatura->produto->referencia.' | '.$linhaFatura->produto->descricao ?></td>
                                    <td><?= $linhaFatura->quantidade ?></td>
                                    <td><?= $fatura->paraEuro($linhaFatura->valorunitario) ?> €</td>
                                    <td><?= $fatura->paraEuro($linhaFatura->valoriva) ?> €</td>
                                    <td class="align-middle text-end">
                                        <form method="post" action="<?= Url::toRoute('Faturas', 'DeleteLinhaFatura', $linhaFatura->id) ?>" onsubmit="return confirm('Tem a certeza que quer Remover esta Linha de Fatura?');">
                                            <input type="hidden" name="clienteId" value="<?= $cliente->id ?>">
                                            <input type="hidden" name="produtoId" value="<?= $linhaFatura->produto_id ?>">
                                            <input type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" role="button" value="Remover">
                                        </form>
                                    </td>
                                    <td></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
