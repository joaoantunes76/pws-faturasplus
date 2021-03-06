<?php

/**
 *
 * @property int id;
 * @property string referencia;
 * @property string descricao;
 * @property double preco;
 * @property int stock;
 * @property int iva_id;
 *
 */

class Produto extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('iva')
    );

    static $has_many = array(
        array('fatura')
    );

    static $validates_presence_of = array(
        array('referencia', 'message' => 'It must be provided'),
        array('descricao', 'message' => 'It must be provided'),
        array('preco', 'message' => 'It must be provided'),
        array('stock', 'message' => 'It must be provided'),
    );
}