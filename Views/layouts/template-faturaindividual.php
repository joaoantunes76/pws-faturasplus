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
<body>
<?= $content ?>
</body>
<script src="<?= Url::getBaseUrl() ?>/public/js/core/bootstrap.js"></script>
</html>