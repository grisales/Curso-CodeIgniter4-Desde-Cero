<?php

namespace App\Controllers\dashboard;
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

        $this->_loadDefaultView(lang('Form.categories_page_title'),$data,'index');
            
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
            lang('Form.create_category'),
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
            
            return redirect()->to("dashboard/category/edit/$id")->with('message', lang('Form.sucessful_created_message'));
            
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
            lang('Form.update_category'),
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

            return redirect()->to('dashboard/category')->with('message', lang('Form.sucessful_update_message', [$id]));
            
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
        return redirect()->to('dashboard/category')->with('message', lang('Form.sucessful_delete_message'));

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
        $config = new \Config\Web();
        $dataHeader = [
            'title' => $title,
            'site' => $config->siteName
        ];
        
        echo view ("dashboard/templates/header", $dataHeader);
        echo view ("dashboard/category/$view", $data);
        echo view ("dashboard/templates/footer");

    }

}