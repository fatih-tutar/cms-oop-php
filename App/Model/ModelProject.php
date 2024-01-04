<?php

namespace App\Model;

use Core\BaseModel;

class ModelProject extends BaseModel
{
    public function createProject($data){
        extract($data);
        $user = $this->db->connect->prepare("INSERT INTO projects SET 
            projects.title = ?,
            projects.description = ?,
            projects.progress = ?,
            projects.status = ?,
            projects.customer_id = ?,
            projects.start_date = ?,
            projects.end_date = ?
        ");
        $insert = $user->execute([
            $title,
            $description,
            $progress,
            $status,
            $customer_id,
            $start_date,
            $end_date
        ]);
        if ($insert) {
            return true;
        } else {
            return false;
        }
    }
    public function getProjects(){
       return $this->db->query('SELECT * FROM projects',true);
    }
    public function getProject($id){
        return $this->db->query("SELECT * FROM projects WHERE projects.id = '$id'");
    }
    public function editProject($data){
        extract($data);
        $user = $this->db->connect->prepare("UPDATE projects SET 
            projects.title = ?,
            projects.description = ?,
            projects.progress = ?,
            projects.status = ?,
            projects.customer_id = ?,
            projects.start_date = ?,
            projects.end_date = ?
            WHERE projects.id = ?
        ");
        $update = $user->execute([
            $title,
            $description,
            $progress,
            $status,
            $customer_id,
            $start_date,
            $end_date,
            $project_id
        ]);
        if ($update) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteProject($data){
        extract($data);
        $delete = $this->db->query("DELETE FROM projects WHERE projects.id = '{$data['project_id']}'");
        if ($delete) {
            return true;
        } else {
            return false;
        }
    }
}