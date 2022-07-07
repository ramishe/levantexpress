<?php 
 var_dump($_POST);  
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();
require './model/ManageUsers.php';
$user= new ManageUsers();

if(isset($_POST['signin']) && $_POST['signin']=='identifier'){
   
     $verifier_user=$_POST['verifier_user'];
     $verifier_psd=$_POST['verifier_psd'];
     $user_info=$user->verifierCompte($verifier_user,$verifier_psd);
};    
  
if(isset($_POST['submit']) && $_POST['submit']=='Enregistrer'){
    
   $user->createCompte($_POST['username'],$_POST['psd'],$_POST['firstname'],$_POST['lastname'],$_POST['birth_date'],$_POST['mail'],$_POST['telephone'],$_POST['shipping_address'],$_POST['home_address'],$_POST['country'],$_POST['city'],$_POST['code_postal']); 
  
};
  
    
require './view/user_view.php';

