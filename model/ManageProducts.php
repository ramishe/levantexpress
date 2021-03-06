<?php
require_once'Manage.php';
class ManageProducts extends Manage {
    
    public function getProduitsDeCategory(int $id) :object{
       $data = ['id'=>$id];
       $query = "SELECT product.*  FROM product JOIN categories WHERE product.category_id=:id AND  categories.id=:id";
       return $this->getQuery($query,$data);
     }
     
     public function getAllProducts() :object{
       $data = [];
       $query = "SELECT * FROM product";
       return $this->getQuery($query,$data);
     }
     
     public function getAllProductsEnPromotion() :object{
       $data = [];
       $query = "SELECT * FROM `product` WHERE (discount>0 OR discount!='')";
       return $this->getQuery($query,$data);
     }
     
     public function getOneProduct($id) :object{
       $data = ['id'=>$id];
       $query = "SELECT * FROM `product` WHERE id=:id";
       return $this->getQuery($query,$data);
     }
     
     public function getPhotosOfProduct($id) :object{
       $data = ['id'=>$id];
       $query = "SELECT name,legend FROM photo WHERE product_id =:id";
       return $this->getQuery($query,$data);
     }
     
     public function searchProduct($wordsearch) :object{
       $data = ['name' => '%'.$wordsearch.'%'];
       $query = "SELECT * FROM product WHERE name LIKE :name OR description LIKE :name";
       return $this->getQuery($query,$data);
     }
     
      public function setPhotosOfProduct(int $id,string $name,string $legend){
       $data = ['id'=>$id,
                 'name'=>$name,
                  'legend'=>$legend];
       $query = "INSERT INTO photo SET product_id = :id, name = :name, legend = :legend";
       $this->getQuery($query,$data);
     }
     
     
   
}