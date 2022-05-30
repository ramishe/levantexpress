<?php 
//pour sub menu de reyons
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();
//
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
 /*
    <?php 
//pour sub menu de reyons
require './model/ManageRayons.php';
$ray= new ManageRayons();
$liste_rayon = $ray->getRayonsNav();
//
require './model/ManageUsers.php';
 $user= new ManageUsers();
 
  var_dump($_POST);
if(isset($_POST['submit'])&&$_POST['submit']=='Enregistrer'){
  
};
 
$first_name=isset($_POST['firstname'])?htmlspecialchars($_POST['firstname']):''; 
   $last_name=isset($_POST['lastname'])?htmlspecialchars($_POST['lastname']):''; 
   $birth_date=isset($_POST['birth_date'])?htmlspecialchars($_POST['birth_date']):''; 
   $username=isset($_POST['username'])?htmlspecialchars($_POST['username']):''; 
   $email=isset($_POST['mail'])?htmlspecialchars($_POST['mail']):''; 
   $telephone=isset($_POST['telephone'])?htmlspecialchars($_POST['telephone']):'';  
   $shipping_address=isset($_POST['shipping_address'])?htmlspecialchars($_POST['shipping_address']):'';  
   $psd=isset($_POST['psd'])?htmlspecialchars($_POST['psd']):''; 
   $home_address=isset($_POST['home_address'])?htmlspecialchars($_POST['home_address']):'';  
   $country=isset($_POST['country'])?htmlspecialchars($_POST['country']):''; 
   $city=isset($_POST['city'])?htmlspecialchars($_POST['city']):'';    
   $code_postal=isset($_POST['code_postal'])?htmlspecialchars($_POST['code_postal']):''; 
    $new_users= $user->createCompte($username,$psd,$first_name,$last_name,$birth_date,$email,$telephone,$shipping_address,$home_address,$country,$city,$code_postal);
    
    
    <script>
   
    let myForm=document.getElementById('form_signin');
    myForm.addEventListener("submit", function(e){
      e.preventDefault();
      
      let nom=document.getElementById('nom').value;
      let psd=document.getElementById('psd').value;
      
    console.log(nom);
    
      
        
        });
        </script> 


require './view/user_view.php';
*/

