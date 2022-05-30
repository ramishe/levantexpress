<?php

require_once'Manage.php';

class ManageCategories extends Manage {
    
        public function getCategoriesList():object{
   
             return $this->getQuery("SELECT * FROM categories");
     }
        public function getCategory(int $id):object{
 
              return $this->getQuery("SELECT * FROM categories WHERE section_id='".$id."'") ;
     }
     
    public function deleteCategory(int $id):object {
         return $this->getQuery("DELETE  FROM categories WHERE id='".$id."'") ;
    }
     

}

