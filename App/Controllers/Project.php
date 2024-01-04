<?php

namespace App\Controllers;

use Core\BaseController;

class Project extends BaseController
{
    public function Index()
    {
        $user = [
            'name' => 'Fatih',
            'surname' => 'Tutar',
            'age' => 30
        ];

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('project/index', compact('data'));
    }
    public function Add()
    {
        $user = [
            'name' => 'Fatih',
            'surname' => 'Tutar',
            'age' => 30
        ];

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('project/add', compact('data'));
    }
    public function Edit($id)
    {
        $user = [
            'name' => 'Fatih',
            'surname' => 'Tutar',
            'age' => 30
        ];

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('project/edit', compact('data'));
    }
    public function CreateCustomer(){
        $data = $this->request->post();
        if(!$data['title']){
            $status = 'error';
            $title = 'Register Error';
            $msg ='The title field cannot be left empty.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }else{
            $ProjectModel = new ModelProject();
            $insert = $CustomerModel->createCustomer($data);
            if($insert){
                $status = 'success';
                $title = 'Registry successful';
                $msg ='Process completed succesfully';
                echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('customer')]);
                exit();
            }else{
                $status = 'error';
                $title = 'Ops! Warning!';
                $msg = 'Error. Refresh the page and try again, please';
                echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
                exit();
            }
        }
    }
    public function EditCustomer(){
        $data = $this->request->post();
        if(!$data['customer_id']){
            $status = 'error';
            $title = 'Register Error';
            $msg ='The customer name field cannot be left empty.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }else{
            $CustomerModel = new ModelCustomer();
            $edit = $CustomerModel->editCustomer($data);
            if($edit){
                $status = 'success';
                $title = 'Updating successful';
                $msg ='Process completed succesfully';
                echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('customer')]);
                exit();
            }else{
                $status = 'error';
                $title = 'Ops! Warning!';
                $msg = 'Error. Refresh the page and try again, please';
                echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
                exit();
            }
        }
    }
    public function DeleteCustomer(){
        $data = $this->request->post();
        if(!$data['customer_id']){
            $status = 'error';
            $title = 'Register Error';
            $msg ='The customer name field cannot be left empty.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }else{
            $CustomerModel = new ModelCustomer();
            $delete = $CustomerModel->deleteCustomer($data);
            $status = 'success';
            $title = 'Deleting successful';
            $msg ='Process completed succesfully';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => _link('customer'), 'deleted' => $data['customer_id']]);
            exit();
        }
    }
}