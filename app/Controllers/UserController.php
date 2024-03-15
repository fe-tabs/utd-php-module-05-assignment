<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public  function  add()
    {
        $session = session();
        
        if (!$session->get('type') || $session->get('type') != 'Administrador') {
            return redirect()->to('books');
        }

        return  view('users/add');
    }

    public function listAll()
    {
        $session = session();
        
        if (!$session->get('type') || $session->get('type') != 'Administrador') {
            return redirect()->to('books');
        }
        
        $data['listAll'] = $this->model->findAll();

        return view('users/listAll', $data);
    }

    public function update($id) 
    {
        $session = session();
        
        if (!$session->get('type') || $session->get('type') != 'Administrador') {
            return redirect()->to('books');
        }

        $data['update'] = $this->model->find($id);
        
        return view('users/update', $data);   
    }

    public function delete($id) 
    {
        $this->model->delete($id);
    
        return  redirect()->to('users');
    }

    public function save()
    {
        $_POST['password'] = md5($_POST['password']);
        $this->model->save($_POST);

        return  redirect()->to('books');
    }
}
