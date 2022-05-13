<?php

class Linhasfatura extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('fatura')
    );
}