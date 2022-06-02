<?php

require_once'Manage.php';
class ManageUsers extends Manage {
    
    public function verifierCompte($username,$psd):object{
    
        return $this->getQuery("SELECT username,psd FROM users WHERE username='".$username."' AND psd='".$psd."'");
     }

    public function createCompte($username,$psd,$first_name,$last_name,$birth_date,$email,$telephone,$shipping_address,$home_address,$country,$city,$code_postal):object {
         return $this->getQuery("INSERT INTO users SET username='$username',psd='$psd',first_name='$first_name',last_name='$last_name',birth_date='$birth_date',mail='$email',telephone='$telephone',shipping_address='$shipping_address',home_address='$home_address',country='$country',city='$city',code_postal='$code_postal'") ;
    }
    
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
   
}