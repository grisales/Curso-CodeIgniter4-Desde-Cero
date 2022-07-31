<?php

namespace App\Controllers;
// namespace App\Controllers\dashboard;
use App\Models\MovieModel;
use App\Models\MovieImageModel;
use App\Controllers\BaseController;


class Movie extends BaseController {

    public function index()
    {
        $movie = new MovieModel();
        $data = [
            'movies' => $movie->asObject()->paginate(10),
            'pager' => $movie->pager,
        ];
        echo session('message')."<br>";
        $this->_loadDefaultView('Listado de peliculas',$data,'index');
        
    }

    public function new()
    {

        $validation = \Config\Services::validation();
        $this->_loadDefaultView('Crear pelicula',['validation'=>$validation,'movie'=> new MovieModel()],'new');
        
    }
    
    public function edit($id = null)
    {
        $movie = new MovieModel();

        echo "Sesión: ".session('message')."<br>";
        
        $validation = \Config\Services::validation();
        $this->_loadDefaultView('Crear pelicula',['validation'=>$validation,'movie'=>$movie->asObject()->find($id)],'edit');
        
    }
    
    public function create()
    {
        $movie = new MovieModel();
        
        if($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'min_length[3]|max_length[5000]'
            ]))
            {
                
                $id = $movie->insert([
                    'movie_title' => $this->request->getPost('title'),
                'movie_description' => $this->request->getPost('description'),
            ]);

            return redirect()->to("dashboard/movie/edit/$id")->with('message', 'Película creada con éxito!');
            
        }
        return redirect()->back()->withInput();
        
    }
    
    public function update($id = null)
    {
        $movie = new MovieModel();

        if($this->validate([
            'title' => 'required|min_length[3]|max_length[255]',
            'description' => 'min_length[3]|max_length[5000]'
            ]))
        {

            $movie->update($id, [
                'movie_title' => $this->request->getPost('title'),
                'movie_description' => $this->request->getPost('description'),
            ]);

            $this->_upload($id);

            return redirect()->to('dashboard/movie')->with('message', 'Película '.$id.' actualizada con éxito!');
            
        }
        
        return redirect()->back()->withInput();
        
    }
    
    public function delete($movie_id = null)
    {
        $movie = new MovieModel();

        $movie->delete($movie_id);
        // echo "Delete $movie_id";
        return redirect()->to('dashboard/movie')->with('message', 'Película eliminada con éxito!');

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
                    $imagefile->move(WRITEPATH . 'uploads', $newName);
    
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
}