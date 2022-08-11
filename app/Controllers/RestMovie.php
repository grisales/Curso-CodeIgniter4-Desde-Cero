<?php

namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\CategoryModel;
use App\Models\MovieImageModel;
use CodeIgniter\RESTful\ResourceController;


class RestMovie extends ResourceController
{
    protected $modelName = 'App\Models\MovieModel';
    protected $format    = 'xml';

    public function index()
    {
        return $this->respond($this->model->findAll(),404,"Mecatiado en cositas");
        //
    }
}