<?php

class Role extends \ActiveRecord\Model
{
    static $has_many = array(
        array('users')
    );

    static $validates_presence_of = array(
        array('name', 'message' => 'It must be provided')
    );
}