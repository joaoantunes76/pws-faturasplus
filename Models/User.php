<?php

class User extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('role','readonly' => true)
    );

    static $validates_presence_of = array(
        array('roleId', 'message' => 'It must be provided'),
        array('username', 'message' => 'It must be provided'),
        array('password', 'message' => 'It must be provided'),
        array('email', 'message' => 'It must be provided'),
        array('telefone'),
        array('nif'),
        array('morada'),
        array('codigoPostal'),
        array('localidade'),
    );
}