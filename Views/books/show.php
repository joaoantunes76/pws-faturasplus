<?php

/* @var $book Book */
?>

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
