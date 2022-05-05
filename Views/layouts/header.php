
<?php
/**
 * @var $bodycss
 */


$route = explode( '/' , $_SERVER['REQUEST_URI']);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/<?= $route[1] ?>/public/css/bootstrap.min.css">
    <link rel="stylesheet" href="/<?= $route[1] ?>/public/css/site.css">
    <title><?= NOME_APP ?></title>
</head>
<body class="<?= isset($bodycss) ? $bodycss : "" ?>">