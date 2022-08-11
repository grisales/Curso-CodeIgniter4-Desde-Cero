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

    /**
     * ---:::[ FUNCIÓN CREAR REGISTRO ]:::---   
     * 
     * Esta función es para la RestApi
     */

    public function create()
    {
        $movie = new MovieModel();
        
        if($this->validate('movies'))
        {
            
            $id = $movie->insert(
            [
                'movie_title' => $this->request->getPost('title'),
                'movie_description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
            ]);
        
            return $this->respond($this->model->find($id));
            // return redirect()->to("dashboard/movie/edit/$id")->with('message', 'Película creada con éxito!');
            
        }

        $validation = \Config\Services::validation();
        return $this->respond($validation->getErrors());

        // Errores
        // return redirect()->back()->withInput();
    }

}