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
        $config = new Web();
        $dataHeader = [
            'title' => "Portada",
            'site' => $config->siteName
        ];

        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("dashboard/templates/footer");
    }

    public function show()
    {
        # code...
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
