<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'movies';
    protected $primaryKey = 'movie_id';

    public function get($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        // return $this->asObject()
        return $this->asArray()
        // return $this
            ->where(['movie_id' => $id])
            ->first();
    }

}