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

    public function listAll()
    {
        $db = \Config\Database::connect();

        $builder = $db->table('loans');
        $builder->select('
            loans.id,
            users.name as userName,
            books.title as bookTitle,
            loans.is_returned,
            loans.loan_date,
            loans.return_date
        ');
        $builder->join('users', 'users.id = loans.user_id');
        $builder->join('books', 'books.id = loans.book_id');
        $data['listAll'] = $builder->get()->getResultArray();

        return view('loans/listAll', $data);
    }

    public function update($id) 
    {
        $data['update'] = $this->model->find($id);
        $data['users'] = (new UserModel())->findAll();
        
        return view('loans/update', $data);   
    }

    public function delete($id) 
    {
        $this->model->delete($id);
    
        return  redirect()->to('loans');
    }

    public function save() 
    {
        $this->model->save($_POST);

        return redirect()->to('books');
    }
}
