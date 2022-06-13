<?php
session_start();
require '../model/ManageUsers.php';
$user = new ManageUsers;

 
if(isset($_POST['mail']) && isset($_POST['shipping_address'])){

   $user->updateInfoDeCompte($_SESSION["id"],$_POST['first_name'],$_POST['last_name'],$_POST['birth_date'],$_POST['mail'],intval($_POST['telephone']),$_POST['shipping_address'],$_POST['home_address'],$_POST['country'],$_POST['city'],$_POST['code_postal']);  

?>
<div class="message_modification">
    <p>Vos données ont été modifiées avec succès</p>
    <a href="index.php?page=checkout" class="btn_modifier"> Re-modifier</a>
</div>
<?php
}
if(isset($_POST['radio'])){
$status=1;
$tot = number_format($_SESSION['total_price'], 2);
var_dump($_POST);
 foreach($_SESSION['cart'] as $prod_id => $quantity){
     var_dump($prod_id);
     var_dump($quantity);
 $user->enregistrerInfosDeLaCommande($_SESSION['id'],$prod_id,$prod_id,$tot,$_POST['radio'],$status);
 
 } 
}

