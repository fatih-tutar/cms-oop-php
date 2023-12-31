<?php

namespace App\Controllers;

use App\Model\ModelAuth;
use Core\BaseController;
use Core\Session;

class Auth extends BaseController
{
    public function Index()
    {
        echo $this->view->load('auth/index');
    }
    public function Login()
    {
        $data = $this->request->post();

        if(!$data['email']){
            $status = 'error';
            $title = 'Access Error';
            $msg ='The email field cannot be left empty.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
        if(!$data['password']){
            $status = 'error';
            $title = 'Access Error';
            $msg ='The password field cannot be left empty.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }

        $AuthModel = new ModelAuth();
        $access = $AuthModel->userLogin($data);

        if($access){
            $status = 'success';
            $title = 'Login successful';
            $msg ='Process completed succesfully';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link()]);
            exit();
        }else{
            $status = 'error';
            $title = 'Ops! Warning!';
            $msg = 'Error. Refresh the page and try again, please';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }
    public function Logout()
    {
        Session::removeSession();
        redirect('login');
    }
}