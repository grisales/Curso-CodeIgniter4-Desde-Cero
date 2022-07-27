<?php

namespace App\Controllers;
// namespace App\Controllers\dashboard;
use App\Models\MovieModel;
use App\Controllers\BaseController;


class Movie extends BaseController {

    public function index()
    {
        $movie = new MovieModel();

        $dataHeader = [
            'title' => 'Listado de peliculas',
        ];

        $data = [
            'movies' => $movie->asObject()->paginate(10),
            'pager' => $movie->pager,
        ];
        
        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("dashboard/movie/index", $data);
        echo view ("dashboard/templates/footer");
        
    }

    public function test($name = "Andrés")
    {
        $dataHeader = [
            'title' => 'Listado de peliculas',
        ];

        $data = [
            'movies' => array(0,1,2,3,4),
        ];
        
        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("dashboard/movie/index", $data);
        echo view ("dashboard/templates/footer");
        
    }

    public function show($id = null)
    {
        $movie = new MovieModel();
        
        // var_dump($movie->get(7)->movie_title); //selección del valor como elemento del objeto
        var_dump($movie->get($id)); //selección del valor como elemento dentro del array
        
    }

}