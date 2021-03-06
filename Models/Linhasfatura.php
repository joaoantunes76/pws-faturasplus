<?php

/**
 *
 * @property int id;
 * @property int quantidade;
 * @property double valorunitario;
 * @property double valoriva;
 * @property int fatura_id;
 * @property int produto_id;
 *
 */

class Linhasfatura extends ActiveRecord\Model
{
    static $belongs_to = array(
        array('fatura'),
        array('produto')
    );

    static $validates_presence_of = array(
        array('quantidade', 'message' => 'It must be provided'),
        array('valorunitario', 'message' => 'It must be provided'),
        array('valoriva', 'message' => 'It must be provided'),
        array('quantidade', 'message' => 'It must be provided'),
    );

    public function totalPorLinha() {
        return $this->quantidade * ($this->valorunitario + $this->valoriva);
    }

}