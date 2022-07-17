<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
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
