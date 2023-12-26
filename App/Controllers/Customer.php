<?php

namespace App\Controllers;

use App\Model\ModelCustomer;
use Core\BaseController;

class Customer extends BaseController
{
    public function Index(){
        $CustomerModel = new ModelCustomer();
        $data['customers'] = $CustomerModel->getCustomers();

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('customer/index', compact('data'));
    }
    public function Add(){
        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('customer/add', compact('data'));
    }
    public function Edit($id){
        $CustomerModel = new ModelCustomer();
        $data['customer'] = $CustomerModel->getCustomer($id);

        $data['navbar'] = $this->view->load('static/navbar');
        $data['sidebar'] = $this->view->load('static/sidebar');
        $data['footer'] = $this->view->load('static/footer');

        echo $this->view->load('customer/edit', compact('data'));
    }
    public function CreateCustomer(){
        $data = $this->request->post();
        if(!$data['customer_name']){
            $status = 'error';
            $title = 'Register Error';
            $msg ='The customer name field cannot be left empty.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }else{
            $CustomerModel = new ModelCustomer();
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