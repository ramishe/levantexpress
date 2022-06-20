<?php

require_once'Manage.php';
class ManageAdmin extends Manage {
    
     public function addNewProduct($post, $files):void {
          $data = ['name' => $post['name'],
                  'description' => $post['description'],
                  'sku' => $post['sku'],
                  'section_id' => $post['section_id'],
                  'category_id' => $post['category_id'],
                  'inventory' => $post['inventory'],
                  'discount' => $post['discount'],
                  'price' => $post['price'],
                  'tva' => $post['tva'],
                  'small_desc' => $post['small_desc'],
                  'photo_name' => ''];
            
         $query = "INSERT INTO product(name,description,sku,section_id,category_id,inventory,discount,price,tva,small_desc,photo_name) VALUES(:name,:description,:sku,:section_id,:category_id,:inventory,:discount,:price,:tva,:small_desc,:photo_name)";  
         $prod_id = $this->setQuery($query, $data) ;
         
         if(isset($files['photo_produit'])) {
             $photo_name = $prod_id.'.jpg';
             $folder = './public/images/categories/'.intval($post['category_id']).'/';
             if(!file_exists($folder)) {
                 mkdir($folder,0755);
             }
             move_uploaded_file($_FILES['photo_produit']['tmp_name'], $folder.$photo_name);
              $data = ['photo_name' => $photo_name,
                'id'=>$prod_id];
             $query = "UPDATE product SET photo_name=:photo_name WHERE id=:id";  
             $this->getQuery($query, $data) ;
         }
     }
    
      public function addNewPhotos($id,$category_id,$files):void {
             if(!empty($files)) {
                $folder = './public/images/categories/'.intval($category_id).'/';
                 if(!file_exists($folder)) {
                     mkdir($folder,0755);
                 }
                foreach($files as $f){
                    if($f['type'] == 'image/jpeg') {
                        move_uploaded_file($f['tmp_name'], $folder.$f['name']);
                        $data = ['photo_name' => $f['name'],
                                'id'=>$id];
             $query = "INSERT INTO photo SET name =:photo_name,legend =:photo_name,product_id=:id";  
             $this->getQuery($query, $data) ;
                
            };};
             };
      }
   
};

