<?php

namespace App\Models;
use CodeIgniter\Model;

class Todo extends Model{

    protected $table = 'todo';
    protected $allowedFields = ['title', 'description'];

    public function getRecords(){
        return $this->orderBy('id', 'DESC')->findAll();
    }

    public function getRow($id){
        return $this->where('id', $id)->first();
    }
    
}