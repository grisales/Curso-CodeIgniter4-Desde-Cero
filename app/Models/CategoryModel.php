<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
    protected $primaryKey = 'category_id';
    protected $allowedFields = ['category_name'];

    public function get($id = null)
    {
        if ($id === null) {
            return $this->findAll();
        }

        return $this->asArray()
            ->where(['category_id' => $id])
            ->first();
    }

}