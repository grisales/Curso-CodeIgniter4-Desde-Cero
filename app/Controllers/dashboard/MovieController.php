<?php

namespace App\Controllers\dashboard;
use App\Controllers\BaseController;


class MovieController extends BaseController {

    public function index()
    {
        $dataHeader = [
            'title' => 'Listado de peliculas',
        ];

        $data = [
            'movies' => array(0,1,2,3,4),
        ];
        
        echo view ("dashboard/template/header", $dataHeader);
        echo view ("dashboard/movie/index", $data);
        echo view ("dashboard/template/footer");
        
    }

    public function test()
    {
        echo "Hola mundo CodeIgniter 4.2.1, soy el test";
    }

}