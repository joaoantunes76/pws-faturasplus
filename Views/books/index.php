<?php

/* @var $books Book[] */
?>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?= Url::toRoute('Books', 'Create') ?>" class="nav-link px-2 link-dark">Books</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <a href="<?= Url::toRoute('Auth', 'Logout') ?>" class="btn btn-outline-primary me-2">Logout (<?= $_SESSION["user"] ?>)</a>
    </div>
</header>
<br>

<a href="<?= Url::toRoute('Books', 'Create') ?>" class="btn btn-success" role="button">Create</a>
<br>
<section class="foco-pagina text-center mt-3">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>ISBN</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($books as $book){
            ?>
                <tr>
                    <td><?= $book->id ?></td>
                    <td><?= $book->name ?></td>
                    <td><?= $book->isbn ?></td>
                    <td>
                        <a href="<?= Url::toRoute('Books', 'Show', $book->id) ?>"
                           class="btn btn-primary" role="button">Show</a>
                        <a href="<?= Url::toRoute('Books', 'Update', $book->id) ?>"
                           class="btn btn-warning" role="button">Edit</a>
                        <a href="<?= Url::toRoute('Books', 'Delete', $book->id) ?>"
                           class="btn btn-danger" role="button">Delete</a>
                    </td>
                </tr>
            <?php
            }
        ?>
        </tbody>
    </table>
</section>