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
        return  view('users/add');
    }

    public function listAll()
    {
        $data['listAll'] = $this->model->findAll();

        return view('users/listAll', $data);
    }

    public  function  update($id) 
    {
        $data['update'] =  $this->model->find($id);
        
        return  view('users/update',  $data);   
    }

    public  function  delete($id) 
    {
        $this->model->delete($id);
    
        return  redirect()->to('users');
    }

    public  function  save()
    {
        $this->model->save($_POST);

        return  redirect()->to('users');
    }
}
