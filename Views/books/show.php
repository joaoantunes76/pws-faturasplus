<?php

/* @var $book Book */
?>
<header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
    <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
    </a>

    <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
        <li><a href="<?= Url::toRoute('Books', 'Index') ?>" class="nav-link px-2 link-dark">Books</a></li>
    </ul>

    <div class="col-md-3 text-end">
        <a href="<?= Url::toRoute('Auth', 'Logout') ?>" class="btn btn-outline-primary me-2">Logout (<?= $_SESSION["user"] ?>)</a>
    </div>
</header>
<br>

<section class="px-5">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>ID:</td>
            <td><?= $book->id ?></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><?= $book->name ?></td>
        </tr>
        <tr>
            <td>ISBN:</td>
            <td><?= $book->isbn ?></td>
        </tr>
        </tbody>
    </table>
</section>
