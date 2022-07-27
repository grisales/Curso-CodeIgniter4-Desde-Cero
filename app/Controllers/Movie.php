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
        $validation = \Config\Services::validation();
        $this->_loadDefaultView('Crear pelicula',['validation'=>$validation],'new');
        
    }
    
    public function create()
    {
        if($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'min_length[3]|max_length[5000]'
            ]))
        {
            echo "Datos: <br>";
            
            echo $this->request->getPost('title');
            echo $this->request->getPost('description');

        }
        else{
            echo "Error";
            $validation = \Config\Services::validation();
            $this->_loadDefaultView('Crear pelicula',['validation'=>$validation],'new');
        }
        ;
        
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