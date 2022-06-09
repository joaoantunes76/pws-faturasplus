<?php

/* @var $user User */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">User Information</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a href="<?= Url::toRoute('Roles', 'Update', $user->id) ?>">
                        <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                    </a>
                    <a href="<?= Url::toRoute('Roles', 'Delete', $user->id) ?>">
                        <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
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
