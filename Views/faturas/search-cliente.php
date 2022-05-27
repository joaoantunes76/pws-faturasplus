<?php

/* @var $clientes User[] */
?>

<section class="mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h6>Selecione um Cliente para associar à Fatura</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Username</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefone</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Morada</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Codigo Postal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Localidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($clientes as $cliente){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $cliente->username ?></td>
                                    <td><?= $cliente->email ?></td>
                                    <td><?= $cliente->telefone ?></td>
                                    <td><?= $cliente->nif ?></td>
                                    <td><?= $cliente->morada ?></td>
                                    <td><?= $cliente->codigopostal ?></td>
                                    <td><?= $cliente->localidade ?></td>
                                    <td class="align-middle text-end">
                                        <a href="<?= Url::toRoute('Faturas', 'Create', $cliente->id) ?>"
                                           class="btn btn-link text-warning text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-hand-pointer me-2" aria-hidden="true"></i>
                                            Selecionar
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


