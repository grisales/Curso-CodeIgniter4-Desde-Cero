<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;


class User extends BaseController {


    /**
     * ===================================
     *    ---:::[ FUNCIÓN INDEX ]:::---   
     * ===================================
     * 
     * Descripción
     */

    public function login()
    {
        
        $this->_loadDefaultView([],'login');
            
    }

    
    /**
     * ======================================================
     *    ---:::[ FUNCIÓN DE AUTENTICACIÓN DE USUARIO ]:::---   
     * ======================================================
     * 
     * Descripción
     */

    public function login_post()
    {
        
        /**
         *  Code...
         */
            
    }

        
    /**
     * ===========================================
     *    ---:::[ FUNCIÓN FINALIZAR SESIÓN ]:::---   
     * ===========================================
     * 
     * Descripción
     */

    public function logout()
    {
        
        /**
         *  Code...
         */
            
    }

        
    /**
     * ========================================
     *    ---:::[ FUNCIÓN CARGAR LAYOUT ]:::---   
     * ========================================
     * 
     * Descripción
     */
    
    private function _loadDefaultView($data, $view)
    {
        
        echo view ("user/templates/header");
        echo view ("user/control/$view", $data);
        echo view ("user/templates/footer");

    }

}