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
        $session = session();
        
        if (!$session->get('type') || $session->get('type') != 'Administrador') {
            return redirect()->to('books');
        }

        return view('books/add');    
    }
    
    public function listAll()
    {
        $data['listAll'] = $this->model->findAll();
        
        return view('books/listAll', $data);
    }

    public function update($id) {
        $session = session();
        
        if (!$session->get('type') || $session->get('type') != 'Administrador') {
            return redirect()->to('books');
        }
        
        $data['update'] = $this->model->find($id);

        return view('books/update', $data);
    }
    public function delete($id) {
        $this->model->delete($id);

        return redirect()->to('books');
    }

    public function save() 
    {
        $this->model->save($_POST);

        return redirect()->to('books');
    }

}
