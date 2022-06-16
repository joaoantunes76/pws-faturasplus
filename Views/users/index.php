<?php

/* @var $users User[] */
?>


<a href="<?= Url::toRoute('Users', 'Create') ?>" class="btn btn-success" role="button">Create</a>
<br>
<section class="mt-3">
    <form>
        <div class="row">
            <div class="col">
                <label for="pesquisa">Pesquisar</label>
                <input type="text" name="pesquisa" id="pesquisa" class="form-control" value="<?= $_GET["pesquisa"] ?>"/>
            </div>
            <div class="col pt-1">
                <br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <input type="submit" class="btn btn-primary" name="limpar" value="Limpar">
            </div>
        </div>
    </form>
    <br>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users table</h6>
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
                            foreach($users as $user){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $user->id ?></td>
                                    <td><?= $user->role->name ?></td>
                                    <td><?= $user->username ?></td>
                                    <td><?= $user->email ?></td>
                                    <td><?= $user->telefone ?></td>
                                    <td><?= $user->nif ?></td>
                                    <td><?= $user->morada ?></td>
                                    <td><?= $user->codigopostal ?></td>
                                    <td><?= $user->localidade ?></td>
                                    <td class="align-middle text-end">
                                        <a href="<?= Url::toRoute('Users', 'Show', $user->id) ?>"
                                           class="btn btn-link text-primary text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                            Show
                                        </a>
                                        <a href="<?= Url::toRoute('Users', 'Update', $user->id) ?>"
                                           class="btn btn-link text-warning text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                                            Edit
                                        </a>
                                        <a href="<?= Url::toRoute('Users', 'Delete', $user->id) ?>"
                                           class="btn btn-link text-danger text-gradient px-3 mb-0" role="button">
                                            <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                                            Delete
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