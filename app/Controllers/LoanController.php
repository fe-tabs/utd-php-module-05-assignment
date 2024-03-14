<?php

namespace App\Controllers;

use App\Models\LoanModel;
use App\Models\UserModel;

class LoanController extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new LoanModel();
    }

    public function add($book_id)
    {
        $data['book_id'] = $book_id;
        $data['users'] = (new UserModel())->findAll();
        return view('loans/add', $data);
    }

    public function save() 
    {
        $this->model->save($_POST);

        return redirect()->to('books');
    }
}
