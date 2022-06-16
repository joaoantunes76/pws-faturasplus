<?php

/* @var $iva Iva */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Informação do Iva</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a style="margin-right: 5%" href="<?= Url::toRoute('Ivas', 'Update', $iva->id) ?>">Editar
                        <i class="fas fa-pencil-alt text-warning me-2" aria-hidden="true"></i>
                    </a>
                    <a href="<?= Url::toRoute('Ivas', 'Delete', $iva->id) ?>" onclick="return confirm('Tem a certeza que quer Remover esta Taxa?');">Remover
                        <i class="far fa-trash-alt text-danger me-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="">ID:</strong> <?= $iva->id ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Percentagem:</strong> <?= $iva->percentagem ?>%</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Descrição:</strong> <?= $iva->descricao ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Vigor:</strong> <?= $iva->vigor ? "Sim" : "Não" ?></li>
            </ul>
        </div>
    </div>

</section>
