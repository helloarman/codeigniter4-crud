<?php 
    namespace App\Controllers;

use App\Models\Todo;
use Config\Services;

class TodoController extends BaseController{
    public function index(){
        $session = Services::session();
        $todo = new Todo();
        $data['session'] = $session;
        $data['todo'] = $todo->getRecords();

        return view('todo/index', $data);
    }

    public function create(){
        echo view('todo/create');
    }

    public function store(){
        $session = Services::session();
        helper('form');

        $input = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if($input == true){
            
            $todo = new Todo();
            $todo->save([
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description')
            ]);

            $session->setFlashdata('success', 'Your Note Added Successfully');
            return redirect()->to('/');
        }else{
            $data['validation'] = $this->validator;
            return view('todo/create', $data);
        }
        
    }

    public function edit($id){
        $session = Services::session();
        helper('form');

        $todo = new Todo();
        $data['todo'] = $todo->getRow($id);

        // If Visit On Wrong Id 
        if(empty($data['todo'])){
            $session->setFlashdata('error', 'No Record Found!');
            return redirect()->to('/');
        }

        echo view('todo/edit', $data);
    }

    public function update($id){
        $session = Services::session();
        helper('form');

        $input = $this->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        if($input == true){
            
            $todo = new Todo();
            $todo->update($id, [
                'title' => $this->request->getPost('title'),
                'description' => $this->request->getPost('description')
            ]);

            $session->setFlashdata('success', 'Your Task Updated Successfully');
            return redirect()->to('/');
        }else{
            $data['validation'] = $this->validator;
            return view('todo/create', $data);
        }
    }

    public function delete($id){
        $session = Services::session();
        helper('form');

        $todo = new Todo();
        $data['todo'] = $todo->getRow($id);

        // If Visit On Wrong Id 
        if(empty($data['todo'])){
            $session->setFlashdata('error', 'No Record Found!');
            return redirect()->to('/');
        }

        $todo->delete($id);
        $session->setFlashdata('success', 'Task Delete Successfully');
        return redirect()->to('/');
    }

    public function master(){
        echo view('layouts/master');
    }
}
