<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function obtenerImagen($movie_id, $image)
    {
        $name = WRITEPATH.'uploads/movies/'.$movie_id.'/'.$image;
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
