<?php

/* @var $empresas Empresa[] */
?>


<a href="<?= Url::toRoute('Empresas', 'Create') ?>" class="btn btn-success" role="button">Criar Empresa</a>
<br>
<section class="mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Empresas</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-5">Designacao Social</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Telefone</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIF</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Codigo Postal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Localidade</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Capital Social</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($empresas as $empresa){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $empresa->designacaosocial ?></td>
                                    <td><?= $empresa->email ?></td>
                                    <td><?= $empresa->telefone ?></td>
                                    <td><?= $empresa->nif ?></td>
                                    <td><?= $empresa->codigopostal ?></td>
                                    <td><?= $empresa->localidade ?></td>
                                    <td><?= $empresa->capitalsocial ?> €</td>
                                    <td class="align-middle text-end">
                                        <a href="<?= Url::toRoute('Empresas', 'Funcionarios', $empresa->id) ?>"
                                           class="btn btn-link text-info text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-address-card me-2" aria-hidden="true"></i>
                                            Funcionarios
                                        </a>
                                        <a href="<?= Url::toRoute('Empresas', 'Show', $empresa->id) ?>"
                                           class="btn btn-link text-primary text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                            Visualizar
                                        </a>
                                        <a href="<?= Url::toRoute('Empresas', 'Update', $empresa->id) ?>"
                                           class="btn btn-link text-warning text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                                            Editar
                                        </a>
                                        <a href="<?= Url::toRoute('Empresas', 'Delete', $empresa->id) ?>"
                                           class="btn btn-link text-danger text-gradient px-3 mb-0" role="button" onclick="return confirm('Tem a certeza que quer Remover esta Empresa?');">
                                            <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                                            Remover
                                        </a>
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