<?php
namespace App\Models;
defined('_DEFVAR') or exit('Restricted Access');

class Login extends BaseModel {
    function check_login($username){
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username=?');
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}