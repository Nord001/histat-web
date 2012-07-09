<?php

defined('SYSPATH') or die('No direct access allowed.');

class Model_Tableheadlog extends ORM {

    protected $_table_name = 'table_head_logs';
    protected $_table_columns = array(
        'id'=>array(),
        'ID_HS' => array(),
        'ID_Projekt' => array(),
        'Schluessel' => array(),
        'head' => array(),
        'username' => array(),
        'old_value' => array(),
        'new_value' => array(),
        'chdate' => array()
    );
    protected $_has_many = array();
    protected $_belongs_to = array(
        'project'=>array('model'=>'project','foreign_key'=>'ID_Projekt')
    );
}