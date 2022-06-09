
<?php
/**
 * @var $content
 */
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= Url::getBaseUrl() ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= Url::getBaseUrl() ?>/public/css/site.css">
    <title><?= NOME_APP ?></title>
</head>
<body class="">
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
        <a href="/" class="d-flex align-items-center col-md-3 mb-2 mb-md-0  text-decoration-none">
            <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
            <li><a href="<?= Url::toRoute('Roles', 'Index') ?>" class="nav-link px-2 link-dark">Roles</a></li>
            <li><a href="<?= Url::toRoute('Users', 'Index') ?>" class="nav-link px-2 link-dark">Users</a></li>
        </ul>

        <div class="col-md-3 text-end">
            <a href="<?= Url::toRoute('Auth', 'Logout') ?>" class="btn btn-outline-primary me-2">Logout (<?= $_SESSION["user"] ?>)</a>
        </div>
    </header>
    <br>
    <?= $content ?>
</body>
<script src="<?= Url::getBaseUrl() ?>/public/js/core/bootstrap.js"></script>
</html>