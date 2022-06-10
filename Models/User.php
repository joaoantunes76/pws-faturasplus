<?php

/**
 *
 * @property int id;
 * @property int role_id;
 * @property string username;
 * @property string password;
 * @property string email;
 * @property string telefone;
 * @property string nif;
 * @property string morada;
 * @property string codigopostal;
 * @property string localidade;
 *
 */

class User extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('role')
    );

    static $validates_presence_of = array(
        array('role_id', 'message' => 'It must be provided'),
        array('username', 'message' => 'It must be provided'),
        array('password', 'message' => 'It must be provided'),
        array('email', 'message' => 'It must be provided')
    );
}