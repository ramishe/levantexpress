<?php

require_once'Manage.php';

class ManageCategories extends Manage {
    
        public function getCategoriesList():object{
            $data = [];
            $qeury = "SELECT * FROM categories";
   
             return $this->getQuery($qeury,$data);
     }
     
    public function getCategory(int $id):object{
        $data = ['id' => $id];
        $qeury = "SELECT * FROM categories WHERE section_id=:id";
        return $this->getQuery($qeury,$data);
    }
     
    public function deleteCategory(int $id):object {
           $data = ['id'=>$id];
           $qeury = "DELETE  FROM categories WHERE id=:id";
           $this->getQuery($data,$qeury) ;
    }
     

}

