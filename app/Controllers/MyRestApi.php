<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;

class MyRestApi extends ResourceController
{
    public function genericResponse($data,$msj,$code)
    {
        if ($code == 200)
        {
            return $this->respond(array(
                "data" => $data,
                "msj" => $msj,
                "code" => $code
            ));
        }
        else
        {
            return $this->respond(array(
                "msj" => $msj,
                "code" => $code
            ));
        }
    }
}
