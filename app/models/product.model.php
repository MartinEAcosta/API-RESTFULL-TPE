<?php

class ProductModel{

    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=db_products;charset=utf8', 'root', '');
    }

    public function getAll(){

        $query = $this->db->prepare("SELECT * FROM Products");
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM Products WHERE id = ?");
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);
        
        return $product;
    }

    public function insert($name,$price,$description,$stock,$id_category){
        $query = $this->db->prepare("INSERT INTO Products (p_name, price, p_description , stock, id_category) VALUES (?, ?, ?, ?, ?");
        $query->execute([$name,$price,$description,$stock,$id_category]);

        return $this->db->lastInsertId();
    }

    function delete($id){
        $query= $this->db->prepare('DELETE FROM Products WHERE id = ? ');
        $query->execute([$id]);
    }
}