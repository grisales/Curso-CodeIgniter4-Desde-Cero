<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'movie_id';
    protected $allowedFields = ['movie_title', 'movie_description'];

    public function get($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['movie_id' => $id])
            ->first();
    }

}