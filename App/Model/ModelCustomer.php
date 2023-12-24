<?php

namespace App\Model;

use Core\BaseModel;

class ModelCustomer extends BaseModel
{
    public function createCustomer($data){
        extract($data);
        $user = $this->db->connect->prepare("INSERT INTO customers SET 
            customers.name = ?,
            customers.surname = ?,
            customers.company = ?,
            customers.address = ?,
            customers.phone = ?,
            customers.gsm = ?,
            customers.email = ?
        ");
        $insert = $user->execute([
            $customer_name,
            $customer_surname,
            $customer_company,
            $customer_address,
            $customer_phone,
            $customer_gsm,
            $customer_email
        ]);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
    public function getCustomer(){
        
    }
}