<?php
require_once'Manage.php';
class ManagePanier extends Manage {
    
       public function addProductToPanier(int $id) :object{
           $data = ['id'=>$id];
           $query = "SELECT id,name,price,discount,photo_name,category_id FROM product WHERE id=:id";
          return $this->getQuery($query,$data);
       }
       public function getProductInfos(int $id) :object{
           $data = ['id'=>$id];
           $query = "SELECT id,name,price,discount,photo_name,category_id FROM product WHERE id=:id";
           return $this->getQuery($query,$data);
       }
}

/*
public function getAllProducts(){
         return $this->getQuery("SELECT * FROM product");
     }
     
      public function insererLaComande($user_id,$total){
         return $this->getQuery("INSERT INTO orders(user_id,total) VALUES($user_id,$total)");
     }
     public function insererDetailsDeLaComande($user_id,$total){
         return $this->getQuery("INSERT INTO orders(user_id,total) VALUES($user_id,$total)");
     }
     */