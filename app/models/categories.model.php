<?php

class CategoriesModel{

    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=db_products;charset=utf8', 'root', '');
    }

    public function getAll(){

        $query = $this->db->prepare('SELECT * FROM Categories');
        $query->execute();
        
        $categories = $query->fetchAll(PDO::FETCH_OBJ);

        return $categories;
    }

    public function get($id){
        
        $query = $this->db->prepare("SELECT * FROM Categories WHERE id = ?");
        $query->execute([$id]);

        $category = $query->fetch(PDO::FETCH_OBJ);
        
        return $category;
    }

    public function insert($c_name){

        $query = $this->db->prepare("INSERT INTO Categories (c_name) VALUES ?");
        $query->execute([$c_name]);

        return $this->db->lastInsertId(); 
    }
    function delete($id){
        $query= $this->db->prepare('DELETE FROM Categories WHERE id_category = ? ');
        $query->execute([$id]);
    }
}