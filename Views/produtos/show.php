<?php

/* @var $produto Produto */

?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Informação do Produto</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a style="margin-right: 5%" href="<?= Url::toRoute('Produtos', 'Update', $produto->id) ?>">Editar
                        <i class="fas fa-pencil-alt text-warning me-2" aria-hidden="true"></i>
                    </a>
                    <a href="<?= Url::toRoute('Produtos', 'Delete', $produto->id) ?>" confirm('Tem a certeza que quer Remover este Produto?');">Remover
                        <i class="far fa-trash-alt text-danger me-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="">ID:</strong> <?= $produto->id ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Referencia:</strong> <?= $produto->referencia?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Descrição:</strong> <?= $produto->descricao ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Preço:</strong> <?= $produto->preco ?>€</li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Stock:</strong> <?= $produto->stock ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="">Iva:</strong> <?= $produto->iva->percentagem ?>%</li>
            </ul>
        </div>
    </div>

</section>
