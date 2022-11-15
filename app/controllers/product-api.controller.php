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
       
        $sort = $_GET['sort'] ?? null;
        $order = $_GET['order'] ?? null;
        $filter = $_GET['filter'] ?? null;
        $page = $_GET['page'] ?? null;
        $size = $_GET['size'] ?? null;
         // Ordename segun lo que el usuario pida por parametro
        if(isset($order) && isset($sort)){
            if($sort == "id" || $sort == "price" || $sort == "p_name" || $sort == "id_category" || $sort == "p_description" || $sort == "stock"){
                if($order == "asc" || $order == "ASC" || $order == 'desc' || $order == 'DESC'){
                    $products = $this->model->getASCorDESC($sort, $order);
                    $this->view->response($products);
                }
            }
            else{
                $this->view->response("Valor de variables sort/order incorrecto", 400);
            }
        }
        // Filtrame el numero de categoria
        if(isset($filter)){
            if($filter == null ||!is_numeric($filter)){
                $this->view->response("Valor de variables filter incorrecto", 400);
            }
            else{
            $products = $this->model->filter($filter);
            $this->view->response($products);
            }
        }
        // Paginame segun el numero y el tamaño que pida el usuario
        if(isset($page) && isset($size)){      
            if(!is_numeric($page) || !is_numeric($size)){
                $this->view->response("Valor de las paginas o tamaño invalido",400);
            }
            else{
            $products = $this->model->getPages($page,$size);
            $this->view->response($products);
            }
        }   
        else{
            $products = $this->model->getAll();
            $this->view->response($products);
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
            $this->model->update($id,$product->p_name, $product->price, $product->p_description, $product->stock,$product->img,$product->id_category);
            $this->view->response($product, 201);
        }
        else{
            $this->view->model->response("Complete los datos", 400);
        }
    }
}