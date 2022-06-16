<?php

/* @var $ivas Iva[] */

?>


<a href="<?= Url::toRoute('Ivas', 'Create') ?>" class="btn btn-success" role="button">Create</a>
<br>
<section class="mt-3">

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Ivas table</h6>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 px-5">Id</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Percentagem</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Descrição</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Vigor</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2"></th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($ivas as $iva){
                                ?>
                                <tr>
                                    <td class="px-5"><?= $iva->id ?></td>
                                    <td><?= $iva->percentagem ?>%</td>
                                    <td><?= $iva->descricao ?></td>
                                    <td><?= $iva->vigor ? "Sim" : "Não" ?></td>
                                    <td class="align-middle text-end">
                                        <a href="<?= Url::toRoute('Ivas', 'Show', $iva->id) ?>"
                                           class="btn btn-link text-primary text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-eye me-2" aria-hidden="true"></i>
                                            Show
                                        </a>
                                        <a href="<?= Url::toRoute('Ivas', 'Update', $iva->id) ?>"
                                           class="btn btn-link text-warning text-gradient px-3 mb-0" role="button">
                                            <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                                            Edit
                                        </a>
                                        <a href="<?= Url::toRoute('Ivas', 'Delete', $iva->id) ?>"
                                           class="btn btn-link text-danger text-gradient px-3 mb-0" role="button" onclick="return confirm('Tem a certeza que quer Remover esta Taxa?');">
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