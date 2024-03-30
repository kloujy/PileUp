<?php
namespace App\Controllers;
use App\Controllers\BaseController;
//use App\Models\LoginM;
defined('_DEFVAR') or exit('Restricted Access');

class Home extends BaseController {
    function __construct()
    {
        parent::__construct();
    }
    
    function index(){
        $data = [];
        $this->load_view('header.php', $data);
    }

}
?>