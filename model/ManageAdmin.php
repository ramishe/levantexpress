<?php

require_once'Manage.php';
class ManageAdmins extends Manage {
    
    public function verifierCompteAdmin($username,$psd):object{
        
    
        return $this->getQuery("SELECT username,psd FROM users WHERE username='".$username."' AND psd='".$psd."'");
     }

    public function createCompteAdmin($first_name,$last_name,$birth_date,$email,$psd):object {
           $password_crypted=$this->crypterPassword($psd);
         return $this->getQuery("INSERT INTO admins SET psd='$password_crypted',first_name='$first_name',last_name='$last_name',birth_date='$birth_date',mail='$email'") ;
    }
    
    
   
}