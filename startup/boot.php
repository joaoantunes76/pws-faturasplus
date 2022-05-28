<?php

require_once 'vendor/autoload.php';
require_once 'helpers/Url.php';

spl_autoload_register(function ($class_name) {
    if(str_contains( $class_name, "Controller")) {
        require_once('Controllers/' . ucfirst($class_name) . '.php');
    }
});
spl_autoload_register(function ($class_name) {
    include_once('Models/' . ucfirst($class_name) . '.php');
});

const NOME_APP = 'Faturas+';
const DEFAULT_ROUTE = ['Site', 'Index'];

ActiveRecord\Config::initialize(function($cfg)
{
    $cfg->set_model_directory('Models');
    $cfg->set_connections(
        array(
            'development' => 'mysql://root@localhost/faturas',
        )
    );
});