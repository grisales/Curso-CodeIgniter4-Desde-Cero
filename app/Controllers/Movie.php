<?php

namespace App\Controllers;
// namespace App\Controllers\dashboard;
use App\Models\MovieModel;
use App\Models\CategoryModel;
use App\Models\MovieImageModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;
use \Config\App;
use \Config\Web;

class Movie extends BaseController {


    /**
     * ===================================
     *    ---:::[ FUNCIÓN INDEX ]:::---   
     * ===================================
     * 
     * Descripción
     */

    public function index()
    {

        echo lang("Form.name");

        //$config = new \Config\Web();
        $config = config('Web');
        $config2 = new App();


        // var_dump($config);
        //  echo $config->siteName;
        

        // $this->cachePage(60);

        $movie = new MovieModel();

        // if (!$movies = cache('movies'))
        // {
        //     echo "Cache no existe";

            $movies = $movie->asObject()
            ->select('movies.*, categories.category_name')
            ->join('categories','categories.category_id = movies.category_id')
            ->paginate(6);

        //     cache()->save('movies',$movies,60);

        //     // var_dump($movies);
        // }
        // else
        // {
        //     echo "Cache existe!";
        //     // var_dump($movies);
        // }
        
        $data = [
                'movies' => $movies,
                'pager' => $movie->pager,
            ];

        $this->_loadDefaultView('Listado de películas',$data,'index');
            
    }

        
    /**
     * ===========================================
     *    ---:::[ FUNCIÓN NUEVO REGISTRO ]:::---   
     * ===========================================
     * 
     * Descripción
     */

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

        
    /**
     * ===========================================
     *    ---:::[ FUNCIÓN CREAR REGISTRO ]:::---   
     * ===========================================
     * 
     * Descripción
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
            
            return redirect()->to("dashboard/movie/edit/$id")->with('message', 'Película creada con éxito!');
            
        }
        return redirect()->back()->withInput();
        
    }

        
    /**
     * ============================================
     *    ---:::[ FUNCIÓN EDITAR REGISTRO ]:::---   
     * ============================================
     * 
     * Descripción
     */

    public function edit($id = null)
    {
        $category = new CategoryModel();
        $images = new MovieImageModel();
        $movie = new MovieModel();

        if ($movie->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        $this->_loadDefaultView
        (
            'Actualizar película',
            [
                'validation'=>$validation,
                'movie'=>$movie->asObject()->find($id),
                'categories' => $category->asObject()->findAll(),
                'images' => $images->getByMovieId($id)
            ],
            'edit'
        );
        
    }

        
    /**
     * ================================================
     *    ---:::[ FUNCIÓN ACTUALIZAR REGISTRO ]:::---   
     * ================================================
     * 
     * Descripción
     */

    public function update($id = null)
    {
        $movie = new MovieModel();
        $session = session();

        if ($movie->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        if($this->validate('movies'))
        {

            $movie->update($id, [
                'movie_title' => $this->request->getPost('title'),
                'movie_description' => $this->request->getPost('description'),
                'category_id' => $this->request->getPost('category_id'),
            ]);

            log_message("info","Película \"Id:[{id}] - {movie}\" actualizada por: {username}",['id' => $id,'movie' => $this->request->getPost('title'),'username' => $session->username]);

            // cache()->delete('movies');

            $this->_upload($id);

            return redirect()->to('dashboard/movie')->with('message', 'Película '.$id.' actualizada con éxito!');
            
        }
        
        return redirect()->back()->withInput();
        
    }

        
    /**
     * ============================================
     *    ---:::[ FUNCIÓN BORRAR REGISTRO ]:::---   
     * ============================================
     * 
     * Descripción
     */

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

        
    /**
     * =============================================
     *    ---:::[ FUNCIÓN MOSTRAR REGISTRO ]:::---   
     * =============================================
     * 
     * Descripción
     */

    public function show($id = null)
    {
        $movieModel = new MovieModel();
        $imageModel = new MovieImageModel();

        $movie = $movieModel->asObject()->find($id);

        if ($movie == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->_loadDefaultView
        (
            $movie->movie_title,
            [
                'movie'=>$movie,
                'images' => $imageModel->getByMovieId($id)
            ],
            'show'
        );

    }

        
    /**
     * ===========================================
     *    ---:::[ FUNCIÓN CARGAR ARCHIVO ]:::---   
     * ===========================================
     * 
     * Descripción
     */

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

        
    /**
     * ===========================================
     *    ---:::[ FUNCIÓN BORRAR ARCHIVO ]:::---   
     * ===========================================
     * 
     * Descripción
     */

    public function deleteImage($imageId)
    {
        $imageModel = new MovieImageModel();
        
        
        $image = $imageModel->asObject()->find($imageId);
        
        //var_dump($this->$image);

        if ($image == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $imgPath = WRITEPATH.'uploads/movies/'.$image->movie_id.'/'.$image->movie_image;

        //echo $imgPath;

        if(!file_exists($imgPath))
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $imageModel->delete($imageId);

        unlink($imgPath);
        // echo "Delete $movie_id";
        return redirect()->to('dashboard/movie')->with('message', 'Imagen <b>['.$image->movie_image.']</b> removida con éxito!');

    }

    
    /**
     * ==========================================
     *    ---:::[ FUNCIÓN CARGAR LAYOUT ]:::---   
     * ==========================================
     * 
     * Descripción
     */
    
    private function _loadDefaultView($title, $data, $view)
    {
        $config = new Web();
        $dataHeader = [
            'title' => $title,
            'site' => $config->siteName
        ];
        
        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("dashboard/movie/$view", $data);
        echo view ("dashboard/templates/footer");

    }

}