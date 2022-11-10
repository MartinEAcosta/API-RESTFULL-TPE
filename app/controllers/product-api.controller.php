<?php

require_once './app/models/product.model.php';
require_once './app/views/api.view.php';

class ProductApiController {
    private $model;
    private $view;

    private $data;
    
    public function __construct(){
        $this->model = new ProductModel();
        $this->view = new ApiView();

        $this->data = file_get_contents("php://input");
    }

    private function getData(){
        return json_decode($this->data);
    }

    public function getProducts($params = null){
        if(isset($_GET['order']) && isset($_GET['sort'])){
            if($_GET['sort'] == 'id' || $_GET['sort'] == "ID"){
                if($_GET['order'] == "asc" || $_GET['order'] == "ASC"){
                    $products = $this->model->getAscById();
                    $this->view->response($products);
                }
                elseif($_GET['order'] == 'desc' || $_GET['order'] == 'DESC'){
                    $products = $this->model->getDescById();
                    $this->view->response($products);
                }
            }
            else{
                $this->view->response("Valor de variables incorrecto", 400);
            }
        }

        if(!isset($_GET['order']) && !isset($_GET['sort'])){

            $products = $this->model->getAll();
            $this->view->response($products);
        }
        elseif (!isset($_GET['order']) && !isset($_GET['sort'])){
            $this->view->response('Error en la consulta', 400);
        }
    }
    public function getProduct($params = null){
        $id = $params [':ID'];
        $product = $this->model->get($id);

        if($product)
            $this->view->response($product);
        else
            $this->view->response("El producto con el id=$id no existe, ERROR", 404);
    }
    /*public function filterCategories($params = null, $id){
        $this->model->getAll();
        $this->model->selectCategory($id);


    }*/

    public function deleteProduct($params = null){
        $id = $params[':ID'];

        $product = $this->model->get($id);
        if($product){
            $this->model->delete($id);
            $this->view->response($product);                              
        }
        else
            $this->view->response("El producto con el id=$id no existe, ERROR", 404);
    }


    // No se necesitan paramatros, pero por las dudas se pone
    public function insertProduct($params = null){
        $product = $this->getData();

        if(empty($product->p_name) || empty($product->price) || empty($product->p_description) || empty($product->stock) || empty($product->id_category)){
            $this->view->model->response("Complete los datos", 400);
        }
        else{
            $id = $this->model->insert($product->p_name, $product->price, $product->p_description, $product->stock, $product->id_category);
            $product = $this->model->get($id);
            $this->view->response($product, 201);
        }
    }
    public function updateProduct($params = null){
        $id = $params[':ID'];
        $product = $this->getData();
        if($product){
            $this->model->update($product->id,$product->p_name, $product->price, $product->p_description, $product->stock,$product->img,$product->id_category);
            $this->view->response($product, 201);
        }
        else{
            $this->view->model->response("Complete los datos", 400);
        }
    }
}