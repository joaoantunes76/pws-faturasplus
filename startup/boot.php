<?php

include_once 'vendor/autoload.php';
include_once 'Models/Auth.php';
include_once 'Models/User.php';
include_once 'Models/Role.php';
include_once 'Models/Permission.php';
include_once 'Controllers/BaseController.php';
include_once 'Controllers/AuthController.php';
include_once 'Controllers/DebugController.php';

define('NOME_APP', 'Minha App');
define('ROTA_LOGIN', 'auth/login');
define('ROTA_LOGOUT', 'auth/logout');
define('ROTA_DEBUG_GET_USERS', 'debug/index');