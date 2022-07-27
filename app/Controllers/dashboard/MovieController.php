<?php

namespace App\Controllers\dashboard;
use App\Models\MovieModel;
use App\Controllers\BaseController;


class MovieController extends BaseController {

    public function index()

    
    {
        $movie = new MovieModel();
        $dataHeader = [
            'title' => 'Listado de peliculas',
        ];

        //var_dump($movie->asObject()->findAll());

        $data = [
            'movies' => $movie->asObject()->findAll(5,0),
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

    public function show()
    {
        $movie = new MovieModel();
        
        // var_dump($movie->get(7)->movie_title); //selección del valor como elemento del objeto
        var_dump($movie->get(7)['movie_title']); //selección del valor como elemento dentro del array
        
    }

}