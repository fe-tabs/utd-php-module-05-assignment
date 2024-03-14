<?php

namespace App\Models;

use CodeIgniter\Model;

class LoanModel extends Model
{
    protected $table      = 'loans';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType    = 'array';

    protected $allowedFields = [
      'id',	
      'user_id',
      'book_id',
      'loan_date',
      'return_date',
      'is_returned'
    ];
}