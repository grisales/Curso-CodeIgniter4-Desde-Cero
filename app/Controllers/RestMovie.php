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

    public function paginate()
    {

        $movieImage = $this->model->asObject()
        ->select('movies.*,categories.category_name as category, any_value(movies_images.movie_image) as image')
        ->join('categories','categories.category_id = movies.category_id')
        ->join('movies_images','movies.movie_id = movies_images.movie_id','left')
        ->groupBy('movies.movie_id');

        // return $this->genericResponse($this->model->paginate(5),null,200);
        return $this->genericPaginateResponse($this->model->paginate(5),null,200,$movieImage->pager);

    }

    public function Search()
    {
        $search = $this->request->getGet('search');
        $category_id = $this->request->getGet('category_id');

        $movieImage = $this->model->asObject()
        ->select('movies.*,categories.category_name as category, any_value(movies_images.movie_image) as image')
        ->join('categories','categories.category_id = movies.category_id')
        ->join('movies_images','movies.movie_id = movies_images.movie_id','left')
        ->groupBy('movies.movie_id');

        if ($search) {
            $movieImage->like('movies.movie_title', $search);
        }

        if ($category_id) {
            $movieImage->where('categories.category_id', $category_id);
        }
        
        // return $this->genericResponse($movieImage->paginate(10),null,200);
        return $this->genericPaginateResponse($movieImage->paginate(10),null,200,$movieImage->pager);
    }
    
    /**
     * ---:::[ FUNCIÓN PARA CONSULTAR REGISTRO ]:::---   
     * 
     * Esta función es para la consulta de RestApi
     */
    public function show($id = null)
    {
        $movie = new MovieModel();
        if (!$movie->find($id))
        {        
            return $this->genericResponse($id,"Pelicula no encontrada",404);
        }
        return $this->genericResponse($this->model->find($id),null,200);
    }

    /**
     * ---:::[ FUNCIÓN PARA ELIMINAR UN REGISTRO ]:::---   
     * 
     * Esta función es para la eliminación dfe datos via RestApi
     */
    public function delete($id = null)
    {
        $movie = new MovieModel();

        if (!$movie->find($id))
        {
            return $this->genericResponse(null,"Pelicula no existe",404);
        }

        $movie->delete($id);
        return $this->genericResponse($id,"Pelicula eliminada con exito",200);
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
                
        }
            
        $validation = \Config\Services::validation();

        return $this->genericResponse(null,$validation->getErrors(),500);

        // Errores
        // return redirect()->back()->withInput();
    }

    /**
     * ---:::[ FUNCIÓN ACTUALIZAR REGISTRO ]:::---   
     * 
     * Esta función es para la actualización de registros usando la RestApi
     */

    public function update($id = null)
    {
        $movie = new MovieModel();
        $category = new CategoryModel();
        
        $data = $this->request->getRawInput();

        if($this->validate('movies'))
        {
            if (!$movie->get($id))
            {
                return $this->genericResponse(null,array("movie_id" => "Pelicula no existe"),500);
            }
            
            if (!$category->get($data['category_id']))
            {
                return $this->genericResponse(null,array("category_id" => "Categoria no existe"),500);
            }
            
            $movie->update($id,
            [
                'movie_title' => $data['title'],
                'movie_description' => $data['description'],
                'category_id' => $data['category_id'],
            ]);
            
            return $this->genericResponse($this->model->find($id),null,200);
                
        }
            
        $validation = \Config\Services::validation();

        return $this->genericResponse(null,$validation->getErrors(),500);

        // Errores
        // return redirect()->back()->withInput();
    }

    public function categories()
    {
        $category = new CategoryModel();
        return $this->genericResponse($category->findAll(),null,200);
    }

}