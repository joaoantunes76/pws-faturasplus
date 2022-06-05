<?php

/* @var $produto Produto */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Produtos Information</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a href="<?= Url::toRoute('Roles', 'Update', $produto->id) ?>">
                        <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                    </a>
                    <a href="<?= Url::toRoute('Roles', 'Delete', $produto->id) ?>">
                        <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">ID:</strong> <?= $produto->id ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Referencia:</strong> <?= $produto->referencia?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Descrição:</strong> <?= $produto->descricao ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Preço:</strong> <?= $produto->preco ?>€</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Stock:</strong> <?= $produto->stock ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Iva:</strong> <?= $produto->iva->percentagem ?>%</li>
            </ul>
        </div>
    </div>

</section>
