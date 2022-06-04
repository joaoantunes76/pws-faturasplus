<?php

class Iva extends ActiveRecord\Model
{
    static $has_many = array(
        array('produto')
    );

    static $validates_presence_of = array(
        array('percentagem', 'mensagem' => 'It must be provided')
    );
}