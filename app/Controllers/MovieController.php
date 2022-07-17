<?php

namespace App\Controllers;

class MovieController extends BaseController {

    public function index()
    {
        
        $sum = 1+1;

        return view ("test");
        
    }

    public function test()
    {
        echo "Hola mundo CodeIgniter 4.2.1, soy el test";
    }

}