<?php

/* @var $produtos Produto[] */
?>


<a href="<?= Url::toRoute('Produtos', 'Create') ?>" class="btn btn-success" role="button">Create</a>
<br>
<section class="mt-3">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Produtos table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-5">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Referencia</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descrição</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Preço</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Stock</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">IVA</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($produtos as $produto){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $produto->id ?></td>
                                    <td><?= $produto->referencia ?></td>
                                    <td><?= $produto->descricao ?></td>
                                    <td><?= $produto->preco ?>€</td>
                                    <td><?= $produto->stock ?></td>
                                    <td><?= $produto->iva->percentagem ?>%</td>
                                    <td class="align-middle text-end">
                                        <a href="<?= Url::toRoute('Produtos', 'Show', $produto->id) ?>"
                                           class="btn btn-link text-primary text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                            Show
                                        </a>
                                        <a href="<?= Url::toRoute('Produtos', 'Update', $produto->id) ?>"
                                           class="btn btn-link text-warning text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                                            Edit
                                        </a>
                                        <a href="<?= Url::toRoute('Produtos', 'Delete', $produto->id) ?>"
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