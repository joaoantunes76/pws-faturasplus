<?php

class Linhasfatura extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('fatura'),
        array('produto')
    );

    static $validates_presence_of = array(
        array('quantidade', 'message' => 'It must be provided'),
        array('valorUnitario', 'message' => 'It must be provided'),
        array('valorIva', 'message' => 'It must be provided'),
        array('quantidade', 'message' => 'It must be provided'),
    );

}