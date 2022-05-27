<?php

class Fatura extends \ActiveRecord\Model
{
    static $belongs_to = array(
        array('user'),
        array('funcionario')
    );

    static $has_many = array(
        array('linhasfatura')
    );

    static $validates_presence_of = array(
        array('data', 'message' => 'It must be provided'),
        array('valortotal', 'message' => 'It must be provided'),
        array('ivatotal', 'message' => 'It must be provided'),
        array('estado', 'message' => 'It must be provided')
    );
}