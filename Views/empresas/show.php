<?php

/* @var $empresa Empresa */
/* @var $role Role */

?>



<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Informação da Empresa</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a href="<?= Url::toRoute('Empresas', 'Update', $empresa->id) ?>">
                        <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                    </a>
                    <?php
                        if($role->id == 3){
                        ?>
                            <a href="<?= Url::toRoute('Empresas', 'Delete', $empresa->id) ?>">
                                <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                            </a>
                        <?php
                        }
                    ?>

                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>ID:</strong> <?= $empresa->id ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong>Designacao Social:</strong> <?= $empresa->designacaosocial ?></li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Email:</strong> <?= $empresa->email ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong>Telefone:</strong> <?= $empresa->telefone ?></li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>NIF:</strong> <?= $empresa->nif ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong>Morada:</strong> <?= $empresa->morada ?></li>
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong>Codigo Postal:</strong> <?= $empresa->codigopostal ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong>Localidade:</strong> <?= $empresa->localidade ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong>Capital Social:</strong> <?= $empresa->capitalsocial ?></li>
            </ul>
        </div>
    </div>

</section>
