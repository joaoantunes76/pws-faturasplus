<?php

require_once 'vendor/autoload.php';
require_once 'helpers/Url.php';
include_once 'Models/Auth.php';
include_once 'Controllers/BaseController.php';
include_once 'Controllers/BaseAuthController.php';
include_once 'Controllers/AuthController.php';
include_once 'Controllers/RolesController.php';
include_once 'Controllers/UsersController.php';

const NOME_APP = 'Faturas+';

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('Models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/faturas',
        )
    );
});