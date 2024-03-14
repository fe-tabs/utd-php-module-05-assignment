<?php

namespace App\Controllers;

use App\Models\BookModel;

class BookController extends BaseController
{
    public $model;

    public function __construct()
    {
        $this->model = new BookModel();
    }

    public function add() 
    {
        return view('books/add');    
    }
    
    public function listAll()
    {
        $data['listAll'] = $this->model->findAll();
        
        return view('books/listAll', $data);
    }

    public function save() 
    {
        $this->model->save($_POST);

        return redirect()->to('books');
    }

}
