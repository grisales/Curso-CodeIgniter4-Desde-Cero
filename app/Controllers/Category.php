<?php

namespace App\Controllers;
use App\Models\CategoryModel;
use App\Controllers\BaseController;
use \CodeIgniter\Exceptions\PageNotFoundException;


class Category extends BaseController {


    /**
     * ===================================
     *    ---:::[ FUNCIÓN INDEX ]:::---   
     * ===================================
     * 
     * Descripción
     */

    public function index()
    {
        
        $category = new CategoryModel();
        
        $data = [
                'categories' => $category->asObject()
                ->paginate(6),
                'pager' => $category->pager,
            ];

        $this->_loadDefaultView('Listado de categorías',$data,'index');
            
    }

        
    /**
     * ===================================
     *    ---:::[ FUNCIÓN NUEVO REGISTRO ]:::---   
     * ===================================
     * 
     * Descripción
     */

    public function new()
    {
        $category = new CategoryModel();
        
        $validation = \Config\Services::validation();
        $this->_loadDefaultView
        (
            'Crear categoría',
            [
                'validation'=>$validation,
                'category'=> new CategoryModel(),
                'categories' => $category->asObject()->findAll()
            ],
            'new'
        );
        
    }

        
    /**
     * ===================================
     *    ---:::[ FUNCIÓN CREAR REGISTRO ]:::---   
     * ===================================
     * 
     * Descripción
     */

    public function create()
    {
        $category = new CategoryModel();
        
        if($this->validate('categories'))
            {
                
                $id = $category->insert(
                [
                    'category_name' => $this->request->getPost('title')
                ]);
            
            return redirect()->to("dashboard/category/edit/$id")->with('message', 'Categoría '.$this->request->getPost('title').' creada con éxito!');
            
        }
        return redirect()->back()->withInput();
        
    }

        
    /**
     * ==========================================
     *    ---:::[ FUNCIÓN EDITAR REGISTRO ]:::---   
     * ==========================================
     * 
     * Descripción
     */

    public function edit($id = null)
    {
        $category = new CategoryModel();

        if ($category->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $validation = \Config\Services::validation();
        $this->_loadDefaultView
        (
            'Actualizar categoría',
            [
                'validation'=>$validation,
                'category'=>$category->asObject()->find($id),
            ],
            'edit'
        );
        
    }

        
    /**
     * ==============================================
     *    ---:::[ FUNCIÓN ACTUALIZAR REGISTRO ]:::---   
     * ==============================================
     * 
     * Descripción
     */

    public function update($id = null)
    {
        $category = new CategoryModel();

        if ($category->find($id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        if($this->validate('categories'))
        {

            $category->update($id, [
                'category_name' => $this->request->getPost('title'),
            ]);

            return redirect()->to('dashboard/category')->with('message', 'Categoria '.$id.' actualizada con éxito!');
            
        }
        
        return redirect()->back()->withInput();
        
    }

        
    /**
     * ==========================================
     *    ---:::[ FUNCIÓN BORRAR REGISTRO ]:::---   
     * ==========================================
     * 
     * Descripción
     */

    public function delete($category_id = null)
    {
        $category = new CategoryModel();

        if ($category->find($category_id) == null)
        {
            throw PageNotFoundException::forPageNotFound();
        }

        $category->delete($category_id);
        return redirect()->to('dashboard/category')->with('message', 'Categoría '.$category->category_name.' eliminada con éxito!');

    }

        
    /**
     * ===================================
     *    ---:::[ FUNCIÓN CARGAR LAYOUT ]:::---   
     * ===================================
     * 
     * Descripción
     */
    
    private function _loadDefaultView($title, $data, $view)
    {
        $dataHeader = [
            'title' => $title
        ];
        
        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("dashboard/category/$view", $data);
        echo view ("dashboard/templates/footer");

    }

}