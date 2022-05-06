<?php

/* @var $books Book[] */
?>


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