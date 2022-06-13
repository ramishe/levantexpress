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
             $folder = '../public/images/categories/'.intval($post['category_id']).'/';
             if(!file_exisits($folder)) {
                 mkdir($folder,0755);
             }
             moveuploadedfile($_FILES['photo_produit']['tmp_name'], $folder.$photo_name);
              $data = ['photo_name' => $photo_name,
                'id'=>$prod_id];
             $query = "UPDATE product SET photo_name=:photo_name WHERE id=:id";  
             $this->getQuery($query, $data) ;
         }
     }
    
     
    
   
}

/*
public function crypterPassword($plaintext_password){
         $hash = password_hash($plaintext_password, 
          PASSWORD_DEFAULT);
          return $hash;
     }
     public function decrypterPassword($plaintext_password,$hash){
          $verify = password_verify($plaintext_password, $hash);
          if ($verify) {
              return $verify;
          }
          else {
              echo 'Incorrect Password!';
         }
     }
    
    public function getAdmins(){
     return $this->getQuery("SELECT * FROM admins");    
    }
    public function verifierCompteAdmin($username,$psd):object{
        
    
        return $this->getQuery("SELECT username,psd FROM users WHERE username='".$username."' AND psd='".$psd."'");
     }

    public function createCompteAdmin($first_name,$last_name,$birth_date,$email,$psd):object {
           $password_crypted=$this->crypterPassword($psd);
         return $this->getQuery("INSERT INTO admins SET psd='$password_crypted',first_name='$first_name',last_name='$last_name',birth_date='$birth_date',mail='$email'") ;
    }
    

*/