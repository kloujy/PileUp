<?php
namespace App\Controllers;
use App\Controllers\BaseController;
//use App\Models\LoginM;
defined('_DEFVAR') or exit('Restricted Access');

class Login extends BaseController {
    function __construct()
    {
        parent::__construct();
    }
    
    function index(){
        $data = [];
        if(!empty($_POST['username']) && !empty($_POST['password'])){
            $user = $this->models->login->check_login(trim($_POST['username']));
            if (!empty($user) && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user['user_id'];
                redirect('home');
            } else {
                $data['error'] = 'Invalid password';
            }
        }else{
            $data['error'] = 'Invalid password';
        }
        $this->load_view('Login/index.php', $data);
    }

}
?>