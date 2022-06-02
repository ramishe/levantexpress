<?php 
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
   var_dump($_POST);  
    
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

$user_check=$user_info->fetch();
    if($user_check['username']==$verifier_user && $user_check['psd']==$verifier_psd){
        $content='  <h1 style="text-align:center">Bienvenue'.$verifier_user.' </h1>
                    <div class="myaccount">
                    
                    <div class="list_my_account">
                       <ul>
                          <li><a href="">Mes orders</a></li>
                          <li><a href="">Mes addresses</a></li>
                          <li><a href="">Mon compte details</a></li>
                          <li><a href="">Liste de souhaits</a></li>
                          <li><a href="">Deconnection</a></li>
                       </ul>
                    </div>
                    <div class="dashboard">
                    </div>
                  </div>';
    }else {
         $content='<p style=color:red>Votre nom ou votre mot de passe pas correct</p>
                  <form action="index.php?page=users" method="POST" id="form_signin" class="form_inscription hidden">
                     <h2>Inscrivez vous</h2>
                     <label for="verifier_user">Nom dutilisateur</label><br>
                     <input type="text" name="verifier_user" placeholder=""/><br>
                     <label for="verifier_psd">mot de passe</label><br>
                     <input type="password" name="verifier_psd" placeholder=""/><br>
                     <input type="submit" value="identifier" name="signin"/>
                     
                 </form>';
    };


*/

