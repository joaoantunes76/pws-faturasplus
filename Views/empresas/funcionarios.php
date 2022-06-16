<?php
/* @var $funcionarios Funcionario[]  */
/* @var $empresa Empresa  */

$route = explode( '/' , $_SERVER['REQUEST_URI']);
?>

<a href="<?= Url::toRoute('Empresas', 'CreateFuncionario', $route[4])?>" class="btn btn-success" role="button">Create</a>
<br>
<section class="mt-3">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Funcionarios de <?= $empresa->designacaosocial ?></h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-5">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
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
                            foreach($funcionarios as $funcionario){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $funcionario->id ?></td>
                                    <td><?= $funcionario->user->role->name ?></td>
                                    <td><?= $funcionario->user->username ?></td>
                                    <td><?= $funcionario->user->email ?></td>
                                    <td><?= $funcionario->user->telefone ?></td>
                                    <td><?= $funcionario->user->nif ?></td>
                                    <td><?= $funcionario->user->morada ?></td>
                                    <td><?= $funcionario->user->codigopostal ?></td>
                                    <td><?= $funcionario->user->localidade ?></td>
                                    <td class="align-middle text-end">
                                        <a href="<?= Url::toRoute('Users', 'Show', $funcionario->user->id) ?>"
                                           class="btn btn-link text-primary text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                            Show
                                        </a>
                                        <a href="<?= Url::toRoute('Users', 'Update', $funcionario->user->id) ?>"
                                           class="btn btn-link text-warning text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                                            Edit
                                        </a>
                                        <a href="<?= Url::toRoute('Users', 'Delete', $funcionario->user->id) ?>"
                                           class="btn btn-link text-danger text-gradient px-3 mb-0" role="button">
                                            <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                                            Delete
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