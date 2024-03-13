<?php

namespace App\Models;

use CodeIgniter\Model;

class BookModel extends Model
{
    protected $table      = 'books';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType    = 'array';

    protected $allowedFields = [
      'id',	
      'title',
      'author',
      'genre',
      'language',
      'isbn_13',
      'series_name',
      'series_volume',
      'quantity',
      'cover_image'
    ];
}