<?php
require_once'Manage.php';
class ManageProducts extends Manage {
    
    public function getProduitsDeCategory(int $id){
          return $this->getQuery("SELECT product.*  FROM product JOIN categories WHERE product.category_id='$id' AND categories.id='$id'");
     }
     
     public function getAllProducts(){
         return $this->getQuery("SELECT * FROM product");
     }
     
     
   
}