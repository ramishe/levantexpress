<?php



if(isset($_POST['mail']) && isset($_POST['shipping_address'])){
    var_dump('toto');
   /*$user->updateInfoDeCompte($_SESSION["id"],$_POST['first_name'],$_POST['last_name'],$_POST['birth_date'],$_POST['mail'],intval($_POST['telephone']),$_POST['shipping_address'],$_POST['home_address'],$_POST['country'],$_POST['city'],$_POST['code_postal']); */  
}
if(isset($_SESSION["cart"])){
    if(isset($_SESSION["id"])){
       $user_infos = $user->getInfosOfUser($_SESSION["id"]);
       $u = $user_infos->fetch(PDO::FETCH_ASSOC);
       
    }
    
    ob_start();
?>
    <form id="form_update_users_infos">
      <fieldset>
        <legend>Informations personnelles</legend>
        <label for="username">Nom d'utilisateur:</label>
        <input type="text" name="username" id="username" value="<?=$u['username']?>">
        <label for="first_name">Prénom:</label>
        <input type="text" name="first_name" id="first_name" value="<?=$u['first_name']?>">
        <label for="last_name">Nom:</label>
        <input type="text" name="last_name" id="last_name"  value="<?=$u['last_name']?>">
        <label for="birth_date"> Date de naissance</label>
        <input type="date" name="birth_date" id="birth_date" value="<?=$u['birth_date']?>">
    </fieldset>
    <fieldset>
        <legend>Email & Telephone</legend>
        <label for="mail">Email:</label>
        <input type="text" name="mail" id="mail" value="<?=$u['mail']?>">
        <label for="telephone">Telephone:</label>
        <input type="text" name="telephone" id="telephone"  value="<?=$u['telephone']?>">
    </fieldset>
    <fieldset>
         <legend>Addresses</legend>
         <label for="shipping_address">Adresse de livraison:</label>
         <input type="text" name="shipping_address" id="shipping_address" value="<?=$u['shipping_address']?>">
         <label for="home_address">Adresse du domicile:</label>
         <input type="text" name="home_address" id="home_address" value="<?=$u['home_address']?>">
    </fieldset>
    <fieldset>
         <legend>Region</legend>
         <label for="country">Pays:</label>
         <input type="text" name="country" id="country"  value="<?=$u['country']?>">
         <label for="city">Ville:</label>
         <input type="text" name="city" id="city" value="<?=$u['city']?>">
         <label for="code_postal">Code Postal:</label>
         <input type="text" name="code_postal" id="code_postal"  value="<?=$u['code_postal']?>">
    </fieldset>
    <input type="submit" name="submit" id="submit"  value="Modifier" class="btn_modifier">
   </form>
<?php
   $form_infos=ob_get_clean();
   $resume_panier='<div class="container_checkout">
                    <div class="infos_personnelles_checkout">
                    '.$form_infos.'
                    </div>
                    <div class="final_panier_pour_payment">
                       <h3>Votre order</h3>';
                        
   foreach($_SESSION['cart'] as $prod_id => $quantity){ 
      $info_product = $products->getProductInfos($prod_id);
      $r = $info_product->fetch(PDO::FETCH_ASSOC);
      if($r['discount']==0 || $r['discount']=='' ){
        $item_price = $_SESSION['cart'][$r['id']]*$r["price"];
       } else $item_price = $_SESSION['cart'][$r['id']] * $r["price"]*((100-intval($r['discount']))/100);
      $resume_panier.='<div class="un_produit_final_panier">
                       
			           <div class="name_produit_final_panier"><img src="./public/images/categories/'.$r['category_id'].'/'.$r['photo_name'].'" class="cart-item-image"/>'. $r["name"].'x'.$_SESSION['cart'][$r['id']].'
			           </div>
			           <div class="prix_produit_final_panier">'.number_format($item_price,2).' €
			           </div>
			        </div>';
    }
     $message_error='';
    $resume_panier.=' <div class="total_prix_fp">
                          <p>Numbre d"articles:<strong>'.$_SESSION['total_quantity'].'</strong></p>
                          <p><strong>'.number_format($_SESSION['total_price'], 2).' €</strong></p>
                      </div>
                      <form action="" method="" id="form_for_payer">
                        <fieldset class="filedset_moyen_paiment" >
                          '. $message_error.'
                           <legend>Moyen de paiment</legend>
                           <input type="radio" name="radio" id="visa" value="visa"><i class="fa-brands fa-cc-visa fa-2xl bleu"></i>
                           <input type="radio" name="radio" id="paypal" value="paypal"><i class="fa-brands fa-cc-paypal fa-2xl rouge"></i>
                           <input type="radio" name="radio" id="srtipe" value="stripe"><i class="fa-brands fa-cc-stripe fa-2xl vert"></i>
                           <input type="radio" name="radio" id="mastercard" value="mastercard"><i class="fa-brands fa-cc-mastercard fa-2xl yellow"></i>
                        </fieldset>
                       
                       
                        <fieldset class="filedset_livraison">
                           <legend>Address de livraison</legend>
                           <p>'.$u['shipping_address'].'</p>
                        </fieldset>
                       
                           <input type="submit" name="payer"   value="Payer" class="normal_btn">
                        </form>
                    
                  </div>
                 </div>
                ';
}else {
    $resume_panier="Il n'y a aucan produit pour paiment";
}



$content = $resume_panier;

require 'template.php';
