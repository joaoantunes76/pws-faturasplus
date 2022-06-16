<?php

/* @var $user User */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Informação do Utilizador</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a style="margin-right: 5%" href="<?= Url::toRoute('Users', 'Update', $user->id) ?>">Editar
                        <i class="fas fa-pencil-alt text-warning me-2" aria-hidden="true"></i>
                    </a>
                    <a onclick="return confirm('Tem a certeza que quer Remover este Utilizador?');" href="<?= Url::toRoute('Users', 'Delete', $user->id) ?>">Remover
                        <i class="far fa-trash-alt text-danger me-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="">ID:</strong> <?= $user->id ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Role:</strong> <?= $user->role->name ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Name:</strong> <?= $user->username ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Email:</strong> <?= $user->email ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Telefone:</strong> <?= $user->telefone ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Nif:</strong> <?= $user->nif ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Morada:</strong> <?= $user->morada ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Codigo Postal:</strong> <?= $user->codigopostal ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Localidade:</strong> <?= $user->localidade ?></li>
            </ul>
        </div>
    </div>

</section>
