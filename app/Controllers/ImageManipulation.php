<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class ImageManipulation extends BaseController
{
    public function image_fit()
    {
        $image = \Config\Services::image()
        // ->withFile('C:\laragon\www\ci4dc\writable\uploads\movies\10\1659279359_52e596ae1cc8e056c672.png')
        ->withFile(WRITEPATH . 'uploads/movies/10/1659279359_52e596ae1cc8e056c672.png')
        ->fit(100, 100, 'center')
        ->save(WRITEPATH . 'uploads/imagemanipulation/image_fit.png');
    }
}
