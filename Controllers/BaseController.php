<?php
namespace App\Controllers;
use App\Models\Login;
defined('_DEFVAR') or exit('Restricted Access');

class BaseController extends \stdClass {

    function __construct()
    {
        //$this->__set('logins', new Login);
        $this->models = new \stdClass;
        $this->models->login = new Login;
    }
    
    function load_view($path, $data=[]){
        if(!empty($data)){
            extract($data);
        }
        if(file_exists(__DIR__.'/../Views/'.$path)){
            require_once(__DIR__.'/../Views/'.$path);
        }
    }
    
    public function __set($name, $value){
        $this->{$name} = $value;
    }
    
    public function __get($name){
        return $this->{$name};
    }

}