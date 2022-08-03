<?php

namespace App\Controllers;

use \CodeIgniter\Exceptions\PageNotFoundException;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
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

        $dataHeader = [
            'title' => 'Contacto '.$name,
        ];

        echo view ("dashboard/templates/header", $dataHeader);
        echo view('welcome_message');
        echo view ("dashboard/templates/footer");

    }
}
