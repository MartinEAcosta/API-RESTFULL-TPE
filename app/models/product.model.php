<?php

class ProductModel{

    private $db;

    public function __construct(){
        $this->db = new PDO ('mysql:host=localhost;'.'dbname=db_products;charset=utf8', 'root', '');
    }

    public function getAll(){

        $query = $this->db->prepare('SELECT Products. *, Categories.c_name as categoria FROM Products JOIN Categories ON Products.id_category = Categories.id_category ');
        $query->execute();

        $products = $query->fetchAll(PDO::FETCH_OBJ);

        return $products;
    }

    public function getASCorDESC($sort, $order){
        if($order != null && $sort != null){
            $query = $this->db->prepare("SELECT * FROM `Products` ORDER BY $sort $order");
            $query->execute();

            $products = $query->fetchAll(PDO::FETCH_OBJ);
            return $products;
        }
    }

    public function get($id){
        $query = $this->db->prepare("SELECT * FROM Products WHERE id = ?");
        $query->execute([$id]);

        $product = $query->fetch(PDO::FETCH_OBJ);
        
        return $product;
    }
    public function insert($p_name , $price , $p_description , $stock , $id_category ){

        $query = $this->db->prepare("INSERT INTO Products (p_name, price, p_description, stock ,id_category) VALUES ( ? , ? , ? , ? , ?)");
        $query->execute([$p_name , $price , $p_description , $stock ,$id_category ]);

        return $this->db->lastInsertId(); 
    }

    public function update($id, $p_name, $price, $p_description, $stock ,$img,  $id_category){

        $query= $this->db->prepare("UPDATE `Products` SET `p_name` = ? , `price` = ? , `p_description` = ? , `stock` =  ? , `img` = ?, `id_category` = ? WHERE `Products`.`id` = ?");
        
        $query->execute(array($p_name,$price,$p_description,$stock,$img,$id_category,$id));

    }


    function delete($id){
        $query= $this->db->prepare('DELETE FROM Products WHERE id = ? ');
        $query->execute([$id]);
    }
}