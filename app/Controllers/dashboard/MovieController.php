<?php

namespace App\Controllers\dashboard;
use App\Controllers\BaseController;


class MovieController extends BaseController {

    public function index()
    {
        
        echo view ("dashboard/template/header");
        echo view ("dashboard/movie/index");
        echo view ("dashboard/template/footer");
        
    }

    public function test()
    {
        echo "Hola mundo CodeIgniter 4.2.1, soy el test";
    }

}