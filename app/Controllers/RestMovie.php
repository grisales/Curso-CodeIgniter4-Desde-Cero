<?php

namespace App\Controllers;

use App\Models\MovieModel;
use App\Models\CategoryModel;
use App\Controllers\MyRestApi;
// use App\Models\MovieImageModel;
// use CodeIgniter\RESTful\ResourceController;


class RestMovie extends MyRestApi
{
    protected $modelName = 'App\Models\MovieModel';
    protected $format    = 'json';

    public function index()
    {
        return $this->genericResponse($this->model->findAll(),null,200);
        //
    }
    
    /**
     * ---:::[ FUNCIÓN PARA CONSULTAR REGISTRO ]:::---   
     * 
     * Esta función es para la consulta de RestApi
     */
    public function show($id = null)
    {
        return $this->respond($this->model->find($id));
        //
    }

    /**
     * ---:::[ FUNCIÓN CREAR REGISTRO ]:::---   
     * 
     * Esta función es para la creacion de registros usando la RestApi
     */

    public function create()
    {
        $movie = new MovieModel();
        $category = new CategoryModel();
        
        if($this->validate('movies'))
        {
            if (!$category->get($this->request->getPost('category_id')))
            {
                return $this->genericResponse(null,array("category_id" => "Categoria no existe"),500);
            }
            
            $id = $movie->insert(
            [
                'movie_title' => $this->request->getPost('title'),
                'movie_description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
            ]);
            
            return $this->genericResponse($this->model->find($id),null,200);
            // return redirect()->to("dashboard/movie/edit/$id")->with('message', 'Película creada con éxito!');
                
        }
            
        $validation = \Config\Services::validation();

        return $this->genericResponse(null,$validation->getErrors(),500);

        // Errores
        // return redirect()->back()->withInput();
    }

}