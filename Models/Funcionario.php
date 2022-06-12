<?php

/**
 *
 * @property int user_id;
 * @property int empresa_id;
 *
 */

class Funcionario extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('user'),
        array('empresa')
    );
}