<?php

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php?page=login");
    exit;
}
if(isset($_POST['submit']) && $_POST['submit'] = 'submit'){
   $user->updateInfoDeCompte($_SESSION["id"],$_POST['first_name'],$_POST['last_name'],$_POST['birth_date'],$_POST['mail'],intval($_POST['telephone']),$_POST['shipping_address'],$_POST['home_address'],$_POST['country'],$_POST['city'],$_POST['code_postal']);   
}
$affichage='Wlcome';

if(isset($_GET['action'])) {
    switch($_GET['action']){
        case'mescommandes':
             $affichage='ddd';
              $form_infos='';
             break;
        case'mesinfos':
             $user_infos = $user->getInfosOfUser($_SESSION["id"]);
             $u = $user_infos->fetch(PDO::FETCH_ASSOC);
             ob_start();
?>
 <form action="" method="POST">
      <fieldset>
        <legend>Informations personnelles</legend>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username"  value="<?=$u['username']?>">
        <label for="first_name">Prénom:</label>
        <input type="text" name="first_name"  value="<?=$u['first_name']?>">
        <label for="last_name">Nom:</label>
        <input type="text" name="last_name"  value="<?=$u['last_name']?>">
        <label for="birth_date"> Date de naissance</label>
        <input type="date" name="birth_date"  value="<?=$u['birth_date']?>">
    </fieldset>
    <fieldset>
        <legend>Email & Telephone</legend>
        <label for="mail">Email:</label>
        <input type="text" name="mail"  value="<?=$u['mail']?>">
        <label for="telephone">Telephone:</label>
        <input type="text" name="telephone"  value="<?=$u['telephone']?>">
    </fieldset>
    <fieldset>
         <legend>Addresses</legend>
         <label for="shipping_address">Adresse de livraison:</label>
         <input type="text" name="shipping_address"  value="<?=$u['shipping_address']?>">
         <label for="home_address">Adresse du domicile:</label>
         <input type="text" name="home_address"  value="<?=$u['home_address']?>">
    </fieldset>
    <fieldset>
         <legend>Region</legend>
         <label for="country">Pays:</label>
         <input type="text" name="country"  value="<?=$u['country']?>">
         <label for="city">Ville:</label>
         <input type="text" name="city"  value="<?=$u['city']?>">
         <label for="code_postal">Code Postal:</label>
         <input type="text" name="code_postal"  value="<?=$u['code_postal']?>">
    </fieldset>
    <input type="submit" name="submit"  value="Modifier" class="btn_modifier">
   </form>
<?php
 $form_infos=ob_get_clean();
             $affichage=$form_infos;
             break;
        case'mesaddresses':
             $affichage='aaa';
             break;
        case'messouhaits':
             $affichage='mmm';
             break;
        default:
            $affichage='welcome';
    }
  
}


ob_start();
?>
<div class="titre">
   <h1>Mon compte</h1>
   <p> Bonjour <b><?=$_SESSION["username"]?></b> Bienvenue.<p>
</div>
<div class="container_user_page">
   <div class="list_operations_users">
    <ul>
     <a href="index.php?page=welcome&action=mescommandes"><li>Mes commandes</li></a>
     <a href="index.php?page=welcome&action=mesinfos"><li>Mon compte</li></a>
     <a href="index.php?page=welcome&action=messouhaits"><li>liste de souhaits</li></a>
     <a href="index.php?page=reset" class="btn btn-warning"><li>Réinitialiser mot de passe</li></a>
     <a href="index.php?page=logout" class="btn btn-danger ml-3"><li>Déconnection</li></a>
    </ul>
   </div>
  <div class="affichage_operations_user">
    <?=$affichage?>
  </div>
</div>
<?php
$content=ob_get_clean();
require 'template.php';

/* if($user_check['username']==$verifier_user && $user_check['psd']==$verifier_psd)*/