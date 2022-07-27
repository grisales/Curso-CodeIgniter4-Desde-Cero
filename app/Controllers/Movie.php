<?php

namespace App\Controllers;
// namespace App\Controllers\dashboard;
use App\Models\MovieModel;
use App\Controllers\BaseController;


class Movie extends BaseController {

    public function index()
    {
        $movie = new MovieModel();
        $data = [
            'movies' => $movie->asObject()->paginate(10),
            'pager' => $movie->pager,
        ];
        
        $this->_loadDefaultView('Listado de peliculas',$data,'index');
        
    }

    public function new()
    {
        
        $this->_loadDefaultView('Crear pelicula',[],'new');
        
    }
    
    public function create()
    {
        
        echo "Create";
        
    }
    
    public function show($id = null)
    {
        $movie = new MovieModel();
        
        // var_dump($movie->get(7)->movie_title); //selección del valor como elemento del objeto
        var_dump($movie->get($id)); //selección del valor como elemento dentro del array
        
    }
    
    private function _loadDefaultView($title, $data, $view)
    {
        $dataHeader = [
            'title' => $title
        ];
        
        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("dashboard/movie/$view", $data);
        echo view ("dashboard/templates/footer");

    }

}