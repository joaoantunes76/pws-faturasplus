<?php

/* @var $user User */

?>

<section class="px-5">
    <table class="table table-bordered">
        <tbody>
        <tr>
            <td>ID:</td>
            <td><?= $user->id ?></td>
        </tr>
        <tr>
            <td>Role:</td>
            <td><?= $user->role->name ?></td>
        </tr>
        <tr>
            <td>Name:</td>
            <td><?= $user->username ?></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><?= $user->email ?></td>
        </tr>
        <tr>
            <td>Telefone:</td>
            <td><?= $user->telefone ?></td>
        </tr>
        <tr>
            <td>Nif:</td>
            <td><?= $user->nif ?></td>
        </tr>
        <tr>
            <td>Morada:</td>
            <td><?= $user->morada ?></td>
        </tr>
        <tr>
            <td>Codigo Postal:</td>
            <td><?= $user->codigopostal ?></td>
        </tr>
        <tr>
            <td>Localidade:</td>
            <td><?= $user->localidade ?></td>
        </tr>
        </tbody>
    </table>
</section>
