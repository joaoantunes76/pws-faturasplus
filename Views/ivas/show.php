<?php

/* @var $iva Iva */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Iva Information</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a href="<?= Url::toRoute('Ivas', 'Update', $iva->id) ?>">
                        <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                    </a>
                    <a href="<?= Url::toRoute('Ivas', 'Delete', $iva->id) ?>">
                        <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">ID:</strong> <?= $iva->id ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Percentagem:</strong> <?= $iva->percentagem ?>%</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Descrição:</strong> <?= $iva->descricao ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Vigor:</strong> <?= $iva->vigor ? "Sim" : "Não" ?></li>
            </ul>
        </div>
    </div>

</section>
