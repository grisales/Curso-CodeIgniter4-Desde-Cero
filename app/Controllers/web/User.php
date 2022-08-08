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
        
        $this->_loadDefaultView([],'login');
        
        return $this->_redirectAuth();
        
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

        $user = $userModel->select('user_id,username,email,password,user_type')->orWhere('email',$emailUserName)->orWhere('username',$emailUserName)->first();

        if(!$user)
        {
            return redirect()->back()->with('message','Usuario y/o contraseña incorrecto');
        }
        
        if(verifyPassword($password,$user['password']))
        {
            unset($user['password']); //Este llamado lo hacemos para no asignar la contraseña de las variables de sesión ni por error
            // var_dump($user);
            
            //Acá es donde se construye la sesión
            $session = session();
            $session->set($user);
            return $this->_redirectAuth();
        }
        
        return redirect()->back()->with('message','Usuario y/o contraseña incorrecto');
        
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
        $session->destroy();
        return redirect()->to("/login")->with('message','Sesión finalizada');
        
        // if ($session->username)
        // {
        //     $session->destroy();
        //     $url1=$_SERVER['REQUEST_URI'];
        //     echo "Ahora me ves:".$session->username." ( •_•)";
        //     header("Refresh: 2; URL=$url1");
        // }
        // else
        // {
        //     $url1= base_url('/login');
        //     echo "Ahora no me ves:".$session->username." ⌐■-■";
        //     header("Refresh: 2; URL=$url1");
        // }
            
    }

        
    /**
     * =======================================================
     *    ---:::[ FUNCIÓN REDIRECIONAMIENTO AUTOMÁTICO ]:::---   
     * =======================================================
     * 
     * Descripción
     */
    
    private function _redirectAuth()
    {
        
        $session = session();

        if($session->user_type == "admin")
        {
            return redirect()->to("/dashboard/movie")->with('message','Hola '.$session->username);
        }

        else if($session->user_type == "regular")
        {
            // return ;
            return redirect()->to("/contacto/$session->username")->with('message','Hola '.$session->username);
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