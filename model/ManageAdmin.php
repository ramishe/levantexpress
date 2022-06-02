<?php

require_once'Manage.php';
class ManageAdmins extends Manage {
    
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
    
    
   
}