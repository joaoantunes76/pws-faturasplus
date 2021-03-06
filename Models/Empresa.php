<?php

/**
 *
 * @property int id;
 * @property string designacaosocial;
 * @property string email;
 * @property string telefone;
 * @property string nif;
 * @property string morada;
 * @property string codigopostal;
 * @property string localidade;
 * @property string capitalsocial;
 *
 */

class Empresa extends \ActiveRecord\Model
{

    static $validates_numericality_of = array(
        array('telefone', 'less_than_or_equal_to' => 999999999, 'greater_than_or_equal_to' => 100000000)
    );

    static $has_many = array(
        array('funcionarios')
    );

    static $validates_presence_of = array(
        array('designacaosocial', 'message' => 'It must be provided'),
        array('email', 'message' => 'It must be provided'),
        array('telefone', 'message' => 'It must be provided'),
        array('nif', 'message' => 'It must be provided'),
        array('morada', 'message' => 'It must be provided'),
        array('codigopostal', 'message' => 'It must be provided'),
        array('localidade', 'message' => 'It must be provided'),
        array('capitalsocial', 'message' => 'It must be provided')
    );

}