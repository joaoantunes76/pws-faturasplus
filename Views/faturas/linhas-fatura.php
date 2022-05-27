<?php
/* @var $fatura Fatura */
/* @var $linhasFatura Linhasfatura[] */
?>

<section class="mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Linhas de Fatura</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Produto</th>
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
                                    <td class="px-5"><?= $linhaFatura->id ?></td>
                                    <td><?= $linhaFatura->produto->referencia ?></td>
                                    <td><?= $linhaFatura->quantidade ?></td>
                                    <td><?= $linhaFatura->valorUnitario ?></td>
                                    <td><?= $linhaFatura->valorIva ?></td>
                                    <td class="align-middle text-end">
                                        <a href="<?= Url::toRoute('Faturas', 'DeleteLinha', $linhaFatura->id) ?>"
                                           class="btn btn-link text-warning text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-hand-pointer me-2" aria-hidden="true"></i>
                                            Remover
                                        </a>
                                    </td>
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
