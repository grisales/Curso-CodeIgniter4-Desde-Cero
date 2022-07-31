<?php

namespace App\Controllers;
// namespace App\Controllers\dashboard;
use App\Models\MovieModel;
use App\Models\CategoryModel;
use App\Models\MovieImageModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;


class Movie extends BaseController {

    public function index()
    {

        $movie = new MovieModel();
        
        $data = [
            'movies' => $movie->asObject()
            ->select('movies.*, categories.category_name')
            ->join('categories','categories.category_id = movies.category_id')
            ->paginate(10),
            'pager' => $movie->pager,
        ];

        $this->_loadDefaultView('Listado de peliculas',$data,'index');
        
    }

    public function new()
    {
        $category = new CategoryModel();
        
        $validation = \Config\Services::validation();
        $this->_loadDefaultView
        (
            'Crear pelicula',
            [
                'validation'=>$validation,
                'movie'=> new MovieModel(),
                'categories' => $category->asObject()->findAll()
            ],
            'new'
        );
        
    }
    
    public function create()
    {
        $movie = new MovieModel();
        
        if($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'min_length[3]|max_length[5000]'
            ]))
            {
                
                $id = $movie->insert(
                [
                    'movie_title' => $this->request->getPost('title'),
                    'movie_description' => $this->request->getPost('description'),
                    'category_id' => $this->request->getPost('category_id'),
                ]);
            
            return redirect()->to("dashboard/movie/edit/$id")->with('message', 'Película creada con éxito!');
            
        }
        return redirect()->back()->withInput();
        
    }
    
    public function edit($id = null)
    {
        $category = new CategoryModel();

        $movie = new MovieModel();

        if ($movie->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        echo "Sesión: ".session('message')."<br>";
        
        $validation = \Config\Services::validation();
        $this->_loadDefaultView
        (
            'Crear pelicula',
            [
                'validation'=>$validation,
                'movie'=>$movie->asObject()->find($id),
                'categories' => $category->asObject()->findAll()
            ],
            'edit'
        );
        
    }
    
    public function update($id = null)
    {
        $movie = new MovieModel();

        if ($movie->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        if($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'min_length[3]|max_length[5000]'
            ]))
        {

            $movie->update($id, [
                'movie_title' => $this->request->getPost('title'),
                'movie_description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
            ]);

            $this->_upload($id);

            return redirect()->to('dashboard/movie')->with('message', 'Película '.$id.' actualizada con éxito!');
            
        }
        
        return redirect()->back()->withInput();
        
    }
    
    public function delete($movie_id = null)
    {
        $movie = new MovieModel();

        if ($movie->find($movie_id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $movie->delete($movie_id);
        // echo "Delete $movie_id";
        return redirect()->to('dashboard/movie')->with('message', 'Película eliminada con éxito!');

    }
    
    public function show($id = null)
    {
        $movie = new MovieModel();

        if ($movie->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }
        // var_dump($movie->get(7)->movie_title); //selección del valor como elemento del objeto
        var_dump($movie->asObject()->find($id)->movie_id); //selección del valor como elemento dentro del array
    }
    
    private function _upload($movie_id)
    {

        $images = new MovieImageModel();
        
        if ($imagefile = $this->request->getFile('image'))
        {
            if ($imagefile->isValid() && ! $imagefile->hasMoved())
            {
                $validated = $this->validate([
                    'image' => [
                        'uploaded[image]',
                        'mime_in[image,image/jpg,image/jpeg,image/gif,image/png]',
                        'max_size[image,4096]',
                    ],
                ]);
            
                if ($validated)
                {
                    $newName = $imagefile->getRandomName();
                    $imagefile->move(WRITEPATH . 'uploads/movies/'.$movie_id, $newName);
    
                    $images->save([
                        'movie_id' => $movie_id,
                        'movie_image' => $newName
                    ]);
                }
                else
                {
                    // $newName = 'Errado-'.$imagefile->getRandomName();
                    // $imagefile->move(WRITEPATH . 'uploads', $newName);
                    var_dump($this->validator->listErrors());
                    echo "Error";
                    // El retorno que esta abajo no funciona, prevalecen
                    // los retornos de la funcion update ¯\_(ツ)_/¯
                    // return false;
                }
            }
        }
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