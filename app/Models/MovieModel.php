<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'movie_id';
    protected $allowedFields = ['movie_title', 'movie_description', 'category_id'];
    
    function getAll()
    {
        return $this->asArray()
        ->select('movies.*, categories.category_name')
        ->join('categories','categories.category_id = movies.category_id')
        ->first();
    }
}