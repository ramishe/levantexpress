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
   $tot = number_format($_SESSION['total_price'], 2);
   $id_order = $user->enregisterOrder($_SESSION['id']);
   foreach($_SESSION['cart'] as $prod_id => $quantity){
     $user->enregisterItemsDeUnOrder($id_order,$prod_id,$quantity);
   } 
   $id_payment = $user->enregisterPaymentDeUnOrder(intval($id_order),$tot,$_POST['radio']);
   $user->metrreIdPaymentDansOrder($id_payment,$id_order);
   unset($_SESSION["cart"]);
		$_SESSION['number_articles']=0;
		unset($_SESSION['noms_produits']);
?>
<div class="message_modification">
    <p><strong> Merci d'avoir acheté sur notre site.</strong>Nous n'avons pas activé l'aventage de payer en ligne jusqu'a maintenant, mais  nous avons bien enregisté votre order.<strong>Nous vous contacterons bientôt </strong></p>
    <a href="index.php" class="btn_modifier"> Retourner à la page d'accueil</a>
</div>
<?php
} else {
    echo'Veuillez choisir un moyen de payment';
}


