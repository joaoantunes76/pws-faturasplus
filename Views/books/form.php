<?php


/* @var $book Book */
?>

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