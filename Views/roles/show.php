<?php

/* @var $role Role */
?>

<section class="px-5">

    <div class="card h-100">
        <div class="card-header pb-0 p-3">
            <div class="row">
                <div class="col-md-8 d-flex align-items-center">
                    <h6 class="mb-0">Role Information</h6>
                </div>
                <div class="col-md-4 text-end">
                    <a href="<?= Url::toRoute('Roles', 'Update', $role->id) ?>">
                        <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>
                    </a>
                    <a href="<?= Url::toRoute('Roles', 'Delete', $role->id) ?>">
                        <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body p-3">
            <ul class="list-group">
                <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong class="text-dark">ID:</strong> <?= $role->id ?></li>
                <li class="list-group-item border-0 ps-0 text-sm"><strong class="text-dark">Name:</strong> <?= $role->name ?></li>
            </ul>
        </div>
    </div>

</section>
