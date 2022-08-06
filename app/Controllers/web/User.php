<?php

namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\UserModel;

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

        // $session = \Config\Services::session();

        $array = array("username" => "german","email" => "german@cosa.test");

        $session = session();
        $session->set($array);

        echo $session->username;
        
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
        
        helper("user");
        
        $userModel = new UserModel();

        $emailUserName = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $userModel->asObject()->orWhere('email',$emailUserName)->orWhere('username',$emailUserName)->first();

        if(!$user)
        {
            echo "Ningún registro coincide";
            return;
        }

        if(verifyPassword($password,$user->password))
        {
            echo "Logramos entrar Batman!<br>
            <pre>        (⌐■_■)        </pre>";
        }
        // var_dump($user);
            
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
        
        $session = session();
        
        if ($session->username)
        {
            $url1=$_SERVER['REQUEST_URI'];
            echo "Ahora me ves:".$session->username." ( •_•)";
            $session->destroy();
            header("Refresh: 2; URL=$url1");
        }
        else
        {
            $url1= base_url('/login');
            echo "Ahora no me ves:".$session->username." ⌐■-■";
            header("Refresh: 2; URL=$url1");
        }
            
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