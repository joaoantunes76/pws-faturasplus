<?php
/**
 * @var $content
 */

$route = explode( '/' , $_SERVER['REQUEST_URI']);
$controller = $route[2];
?>
<!--
=========================================================
* Argon Dashboard 2 - v2.0.2
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="<?= Url::getBaseUrl() ?>/public/img/apple-icon.png">
    <link rel="icon" type="image/png" href="<?= Url::getBaseUrl() ?>/public/img/favicon.png">
    <title>
        Faturas+
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="<?= Url::getBaseUrl() ?>/public/css/nucleo-icons.css" rel="stylesheet" />
    <link href="<?= Url::getBaseUrl() ?>/public/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="<?= Url::getBaseUrl() ?>/public/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= Url::getBaseUrl() ?>/public/css/argon-dashboard.css?v=2.0.2" rel="stylesheet" />
</head>

<body class="g-sidenav-show dark-version bg-gray-100">
<div class="min-height-300 bg-primary position-absolute w-100"></div>
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <div class="navbar-brand m-0">
            <img src="<?= Url::getBaseUrl() ?>/public/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white"><?= NOME_APP ?></span>
        </div>
    </div>
    <hr class="horizontal light mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <?php
                    $acceptedRoles = array(2,3);
                    if(in_array(Auth::getUserRole(), $acceptedRoles)){
                ?>
                <a class="nav-link <?= strtolower($controller) === "site" ? "active" : ""  ?>" href="<?= Url::toRoute("Site", "Index") ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
                <?php
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    $acceptedRoles = array(3);
                    if(in_array(Auth::getUserRole(), $acceptedRoles)){
                ?>
                <a class="nav-link <?= strtolower($controller) === "roles" ? "active" : ""  ?> " href="<?= Url::toRoute("Roles", "Index") ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Roles</span>
                </a>
                <?php
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    $acceptedRoles = array(2, 3);
                    if(in_array(Auth::getUserRole(), $acceptedRoles)){
                ?>
                <a class="nav-link <?= strtolower($controller) === "users" ? "active" : ""  ?> " href="<?= Url::toRoute("Users", "Index") ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-success text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Users</span>
                </a>
                <?php
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    $acceptedRoles = array(2, 3);
                    if(in_array(Auth::getUserRole(), $acceptedRoles)){
                ?>
                <a class="nav-link <?= strtolower($controller) === "empresas" ? "active" : ""  ?> " href="<?= Url::toRoute("Empresas", "Index") ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Empresas</span>
                </a>
                <?php
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                    $acceptedRoles = array(1,2,3);
                    if(in_array(Auth::getUserRole(), $acceptedRoles)){
                ?>
                <a class="nav-link <?= strtolower($controller) === "faturas" ? "active" : ""  ?> " href="<?= Url::toRoute("Faturas", "Index") ?>">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-copy-04 text-info text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Faturas</span>
                </a>
                <?php
                    }
                ?>
            </li>
            <li class="nav-item">
                <?php
                $acceptedRoles = array(2,3);
                if(in_array(Auth::getUserRole(), $acceptedRoles)){
                    ?>
                    <a class="nav-link <?= strtolower($controller) === "produtos" ? "active" : ""  ?> " href="<?= Url::toRoute("Produtos", "Index") ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Produtos</span>
                    </a>
                    <?php
                }
                ?>
            </li>
            <li class="nav-item">
                <?php
                $acceptedRoles = array(2,3);
                if(in_array(Auth::getUserRole(), $acceptedRoles)){
                    ?>
                    <a class="nav-link <?= strtolower($controller) === "ivas" ? "active" : ""  ?> " href="<?= Url::toRoute("Ivas", "Index") ?>">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Ivas</span>
                    </a>
                    <?php
                }
                ?>
            </li>
        </ul>
    </div>
</aside>
<main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
            </nav>
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <ul class=" ms-md-auto pe-md-3 d-flex align-items-center navbar-nav  justify-content-end">
                    <div class="dropdown">
                        <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user me-sm-1"></i>
                            <?= $_SESSION["user"] ?>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
                            <?php
                            $acceptedRoles = array(2,3);
                            if(in_array(Auth::getUserRole(), $acceptedRoles)){
                            ?>
                                <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#modalAlterarPass" >Alterar Password</a></li>
                            <?php
                            }
                            ?>
                            <li><a class="dropdown-item" href="<?= Url::toRoute("Auth", "Logout") ?>">Logout</a></li>
                        </ul>
                    </div>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="modalAlterarPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content bg-dark">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Alterar Password</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="<?= Url::toRoute('Auth', 'AlterarPassword') ?>">
                    <div class="modal-body ">
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="modalPassword" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password">Confirmar Password:</label>
                                <input type="password" name="confirmarPassword" id="modalConfirmarPassword" class="form-control">
                            </div>
                            <div id="alertaPass" style="display: none">Atenção: As passwords não são iguais!</div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <input id="btnAlterar" type="submit" class="btn btn-primary" disabled value="Alterar Password">
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php

    if($_SESSION["error"] != null){
        ?>
        <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
            <span class="alert-icon"><i class="ni ni-like-2"></i></span>
            <span class="alert-text"><strong>Erro!</strong> <?= $_SESSION["error"] ?></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php
        unset($_SESSION["error"]);
    }
    ?>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <?= $content ?>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</main>

<!-- JS alterar password -->
<script src="<?= Url::getBaseUrl() ?>/public/js/alterarpass.js"></script>
<!--   Core JS Files   -->
<script src="<?= Url::getBaseUrl() ?>/public/js/core/popper.min.js"></script>
<script src="<?= Url::getBaseUrl() ?>/public/js/core/bootstrap.min.js"></script>
<script src="<?= Url::getBaseUrl() ?>/public/js/plugins/perfect-scrollbar.min.js"></script>
<script src="<?= Url::getBaseUrl() ?>/public/js/plugins/smooth-scrollbar.min.js"></script>
<script src="<?= Url::getBaseUrl() ?>/public/js/plugins/chartjs.min.js"></script>

<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
<script src="<?= Url::getBaseUrl() ?>/public/js/argon-dashboard.js"></script>
</body>

</html>