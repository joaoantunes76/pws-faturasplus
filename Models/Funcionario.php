<?php

class Funcionario extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('user'),
        array('empresa')
    );
}