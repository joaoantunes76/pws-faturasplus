<?php

error_reporting(E_ALL);
ini_set('display_errors', 'on');


require_once 'startup/boot.php';

$auth = new Auth();
$authController = new AuthController($auth);
$debugController = new DebugController($auth);

    if (isset($_GET["r"])) {
        switch ($_GET["r"]) {
            case ROTA_LOGIN:
                $authController->login();
                break;
            case ROTA_DEBUG_GET_USERS:
                $debugController->index();
                break;
            default:
                echo '<h1>Error 404: Page not found</h1>';
        }
    } else {
        $authController->login();
    }