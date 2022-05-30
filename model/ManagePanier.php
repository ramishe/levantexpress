<?php
require_once'Manage.php';
class ManagePanier extends Manage {
    
       public function addProductToPanier($prod_id){
           return $this->getQuery("SELECT id,name,price,discount,photo_name,category_id FROM product WHERE id='$prod_id'");
       }
       public function getAllProducts(){
         return $this->getQuery("SELECT * FROM product");
     }
}
