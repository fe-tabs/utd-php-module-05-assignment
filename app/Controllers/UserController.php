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

    public function listAll()

    {

    $data['listAll'] = $this->model->findAll();

    return view('users/listAll', $data);

    }
}
