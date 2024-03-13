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
    
    public function listAll()
    {
        $data['listAll'] = $this->model->findAll();
        
        return view('books/listAll', $data);
    }

}
