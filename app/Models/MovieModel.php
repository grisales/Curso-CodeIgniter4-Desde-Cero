<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'movie_id';
    protected $allowedFields = ['movie_title', 'movie_description'];
    
}