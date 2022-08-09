<?php

namespace App\Controllers;

use App\Models\MovieModel;
use \CodeIgniter\Exceptions\PageNotFoundException;
use \Config\Web;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function my_request()
    {
        $config = new Web();
        $dataHeader = [
            'title' => 'Request',
            'site' => $config->siteName
        ];
        //Esto:
        $r = $this->request;
        //Es lo mismo que esto:
        $r = \Config\Services::request(); 
        // var_dump($r);
        
        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("home/my_request",['request'=> $r]);
        echo view ("dashboard/templates/footer");
    }

    public function my_transaction()
    {
        $db = \Config\Database::connect();

        $movie = new MovieModel();

        $db->transStart();

        $movie->update
        (
            2,
            [
                'movie_title' => 'MeC  V.1 - Millestone Comics',
            ]
        );
        
        $movie->update
        (
            4,
            [
                'movie_title' => 'MeC  V.2 - Detective Comics',
            ]
        );
        
        if ($db->transStatus())
        {
            echo "Éxito";
            $db->transRollback();
        }
        
        $db->transComplete();
        
    }

    public function obtenerImagen($movie_id = null, $image = null)
    {

        if(!$movie_id)
        {
            $movie_id = $this->request->getGet('pelicula');
        }

        if(!$image)
        {
            $image = $this->request->getGet('imagen');
        }

        if($movie_id == '' || $image == '')
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $name = WRITEPATH.'uploads/movies/'.$movie_id.'/'.$image;

        if(!file_exists($name))
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $fp = fopen($name, 'rb');

        // envía las cabeceras correctas
        header("Content-Type: image/png");
        header("Content-Length: " . filesize($name));

        // vuelca la imagen y detiene el script
        fpassthru($fp);
        exit;
    }

    public function contacto($name = "Pepe")
    {
        $config = new Web();
        $dataHeader = [
            'title' => 'Contacto '.$name,
            'site' => $config->siteName,
        ];

        echo view ("dashboard/templates/header", $dataHeader);
        echo view('welcome_message');
        echo view ("dashboard/templates/footer");

    }
}
