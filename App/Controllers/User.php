<?php

namespace App\Controllers;

use Core\BaseController;
use Core\Session;

class User extends BaseController{

    public function showProfile($id) {
        //$users = $this->db->connect->query("SELECT * FROM users WHERE id = '$id' ")->fetch(\PDO::FETCH_ASSOC);
        $users = $this->db->query("SELECT * FROM users WHERE id = '$id'");
        echo '<pre>';
        print_r($users);
    }

}

?>