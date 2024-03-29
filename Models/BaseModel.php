<?php
namespace App\Models;
defined('_DEFVAR') or exit('Restricted Access');

class BaseModel extends \stdClass {

    function __construct(){
        global $db_connector;
        //$this->db = $db_connector;
        $this->__set('db', $db_connector);
    }
    
    public function __set($name, $value){
        $this->{$name} = $value;
    }
    
    public function __get($name){
        return $this->{$name};
    }
}