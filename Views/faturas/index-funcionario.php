<?php

/* @var $faturas Fatura[] */
?>

<a href="<?= Url::toRoute('Faturas', 'EmitirPrimeiraFase') ?>" class="btn btn-success" role="button">Emitir</a>
<br>
<section class="mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Faturas Emitidas</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Data</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor Total</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Iva Total</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($faturas as $fatura){
                                ?>
                                    <tr>
                                        <td class="px-5"><?= $fatura->data ?></td>
                                        <td><?= $fatura->valorTotal ?></td>
                                        <td><?= $fatura->ivaTotal ?></td>
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