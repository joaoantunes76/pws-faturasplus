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
    <form class="form" method="post">
        <div class="form-group">
            <label for="name">Name: </label>
            <br>
            <input class="form-control" type="text" id="name" name="name" value="<?= isset($book) ? $book->name : "" ?>">
            <?php if(isset($book->errors)){ echo $book->errors->on('name'); }?>
        </div>
        <br>
        <div class="form-group">
            <label for="isbn">Isbn: </label>
            <br>
            <input class="form-control" type="text" id="isbn" name="isbn" value="<?= isset($book) ? $book->isbn : "" ?>">
            <?php if(isset($book->errors)){ echo $book->errors->on('isbn'); }?>
        </div>
        <br>
        <div class="form-group">
            <input class="btn btn-primary" type="submit"">
        </div>
    </form>
</section>