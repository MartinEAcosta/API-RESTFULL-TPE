<?php

require_once './app/models/categories.model.php';
require_once './app/views/api.view.php';

class CategoriesApiController {
    private $model;
    private $view;

    private $data;
    
    public function __construct(){
        $this->model = new CategoriesModel();
        $this->view = new ApiView();

        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    public function getCategories($params = null){
        $categories = $this->model->getAll();
        $this->view->response($categories);
    }

    public function getCategory($params = null){
        $id = $params [':ID'];
        $category = $this->model->get($id);

        if($category)
            $this->view->response($category);
        else
            $this->view->response("La categoria con el id=$id no existe, ERROR", 404);
    }

    public function deleteCategory($params = null){
        $id = $params[':ID'];
        $category = $this->model->get($id);
        if($category){
            $this->model->delete($id);
            $this->view->response($category);                              
        }
        else
            $this->view->response("La categoria con el id=$id no existe, ERROR", 404);
        
    }

    public function insertCategory($params = null){
        $category = $this->getData();

        if(empty($category->c_name)){
            $this->view->model->response("Complete los datos", 400);
        }
        else{
            $id = $this->model->insert($category->c_name);
            $category = $this->model->get($id);
            $this->view->response($category, 201);
        }
    }
    public function updateCategory($params = null){
        $id_category = $params[':ID'];
        $category = $this->getData();
        if($category){
            $this->model->update($category->c_name,$id_category);
            $this->view->response($category, 201);
        }
        else{
            $this->view->model->response("Complete los datos", 400);
        }
    }
}