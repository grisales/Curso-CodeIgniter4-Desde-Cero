<?php

namespace App\Controllers\Store;

use Config\Web;
use App\Models\MovieModel;
use App\Models\CategoryModel;
use App\Models\MovieImageModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;


// use PayPalCheckoutSdk\Core\PayPalHttpClient;
// use PayPalCheckoutSdk\Core\SandboxEnvironment;
// use App\Controllers\Store\CustomBaseController;
// use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
// use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
// use App\Models\PaymentModel;

class Movie extends BaseController
{
    public function index()
    {
        helper('text');

        $movie = new MovieModel();

        $data = [
            'movies' => $movie->asObject()
            ->select('movies.*, categories.category_name, any_value(movies_images.movie_image) as image')
            ->join('categories','categories.category_id = movies.category_id')
            ->join('movies_images','movies_images.movie_id = movies.movie_id','left')
            ->groupBy('movies.movie_id')
            ->paginate(6),
            'pager' => $movie->pager
        ];

        $this->_loadDefaultView('Listado de películas',$data,'index');
    }

    public function show($id = null)
    {

        $movieModel = new MovieModel();
        $movie = $movieModel->asObject()->find($id);
        $imageModel = new MovieImageModel();

        if ($movie == null) {
            throw PageNotFoundException::forPageNotFound();
        }

        $this->_loadDefaultView(
            $movie->movie_title,
            [
                'movie' => $movie,
                'images' => $imageModel->getByMovieId($id)
            ],
            'show'
        );
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
        
        echo view ("store/templates/header", $dataHeader);
        echo view ("store/movie/$view", $data);
        echo view ("store/templates/footer");
    }

}
