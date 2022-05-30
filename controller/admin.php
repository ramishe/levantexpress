<?php
require'./model/ManageAdmin.php';
$send= new ManageAdmins;
if(isset($_GET['action'])){
 unset($_GET);} 
?>

<form action="" method="POST" id="form_signin_admin" class="form_signin_admin">
                 <h2>Pour gérer votre site insérer votre email et le mot de passe</h2>
                 <label for="champ_email_admin">Email</label><br>
                 <input type="text" name="champ_email_admin" placeholder=""/><br>
                 <label for="champ_psd_admin">mot de passe</label><br> 
                 <input type="password" name="champ_psd_admin" placeholder=""/><br>
                 <input type="submit" value="identifier" name="submit_signin_admin"/>
                 <p>? <a href="index.php?page=admin&action=newadmin" id="create_account" name="fff">Creér un compte</a> </p>
             </form>
<?php
var_dump($_POST);
var_dump($_GET);
 var_dump($_SESSION['submit_signup_admin']);
if(isset($_GET['action'])&&$_GET['action']=='newadmin'){
    $security_number=1234;
       $content='<form action="" method="POST" id="form_signup_admin" class="form_signin_admin"> 
           <h2>Creéz new admin</h2>
           <label for="firstname" >Prenom</label><br>
           <input type="text" name="firstname" placeholder="Prenom" required/><br>
           <label for="lastname">Nom</label><br>
           <input type="text" name="lastname" placeholder="Nom" required/><br>
           <label for="birth_date">Date de naissance</label><br>
           <input type="date" name="birth_date" placeholder="Date de naissance" required/><br>
           <label for="security_number">security number qui est envoyé par provider</label><br>
           <input type="text" name="security_number" placeholder="security_number" required/><br>
           <label for="mail">Email</label><br>  
           <input type="email" name="mail" placeholder="Email" required/><br>
           <label for="psd">Mot de passe</label><br>
           <input type="password" name="psd" placeholder="Mot de passe" required/><br>
           <input type="submit" value="Enregistrer" name="submit_signup_admin" id="btn_register_admin"/>
       </form>';
}else {
    $content='';
    unset($_POST);
    var_dump('ddd');
       
};

if(isset($_POST) && isset($_POST['submit_signup_admin'])){
    
    $send->createCompteAdmin($_POST['firstname'],$_POST['lastname'],$_POST['birth_date'],$_POST['mail'],$_POST['psd']);
     var_dump($_POST);
   
   
}


require'./view/admin/home.php';