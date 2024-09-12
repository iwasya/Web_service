<?php

namespace App\Controllers;
namespace codelgniter\Models;
use Codelgniter\Model;



class AdminModel extends Model{
    protected $table = 'admin';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id','username', 'password','nama','foto'];

    public function getAdminData(){
        return $this->findAll();
    }
    public function getAdminDataById($id){
        return $this->find($id);
    }
}