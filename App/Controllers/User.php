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

    public function Test() {
        $this->view->load('test',['name' => 'Fatih']);
    }

    public function getTest() {
        $get = $this->request->get();
        print_r($get);
    }

}

?>