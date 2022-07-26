<?php

namespace App\Models;

use CodeIgniter\Model;

class MovieModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';

    public function get($id = false)
    {
        if ($id === false) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['category_id' => $id])
            ->first();
    }

}