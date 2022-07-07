<?php

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
     <a href="index.php?page=logout" class="btn btn-danger ml-3"><li>Déconnexion</li></a>
    </ul>
   </div>
  <div class="affichage_operations_user">
     <?=$message_alert?>
<?php


if(isset($_GET['action'])) {
    switch($_GET['action']){
        case'mescommandes':
            if(count($ord)) {
                foreach($ord as $order) {
                 
                    ?>
                    <div class="commandes_user">
                        <div class="txt_heading_commandes">Numéro de commande: <?=$order['id']?></div>
                        <div class="order_info_commandes">
                            Total : <?=$order['amount']?><br>
                            Date de la commande : <?=$order['created_at']?><br>
                            <a href="index.php?page=welcome&action=mescommandes_view&order=<?=$order['id']?>">Voir le détail de la commande</a>
                        </div>
                    </div>
                    <?php
                }
            }
            break;
        
        case'mescommandes_view':
            ?>
            <div class="commandes_user">
          
            <div class="txt_heading_commandes">
                <p>Numéro de commande : <?=$orders_detail['id']?></p>
                <p>date de commande : <?=$orders_detail['created_at']?></p>
            </div>
            <table class="tbl_cart_user" cellpadding="10" cellspacing="1">
                <thead>
                    <tr>
                       <th style="text-align:left;">Nome de produit</th>
                       <th style="text-align:center;">Quantité</th>
                       <th style="text-align:center;">Prix</th>
                       <th style="text-align:center;" >Total prix:</th>
                    </tr>
                </thead>
                <?php foreach($orders_detail['productlist'] as $item) { 
                          if($item['discount']==0 || $item['discount']=='' ){
                                 $price_unitaire =  $item["price"];
        
                          } else{ 
                                
                                $price_unitaire = $item["price"]*((100-intval($item['discount']  ))/100);
                          }
                          $price_ancien = (($price_unitaire == $item["price"])? '' : ($item["price"]));               
                ?>
                    <tbody>
                      <tr>
                       <td style="text-align:left;"><img src="./public/images/categories/<?=$item['category_id']?>/<?=$item['photo_name']?>" class="cart-item-image"><?=$item["name"]?></td>
                       <td  style="text-align:center;"><?=$item["quantity"]?></td>
                       <td  style="text-align:center;"><strike><?= $price_ancien?> </strike> <?=$price_unitaire?> €</td>
                       <td  style="text-align:center;"><?=number_format(($price_unitaire*$item["quantity"]),2)?> €</td>
                      </tr>
                       <?php } ?>
                     </tbody>
            </table>
                
                   <p>Total: <strong><?=number_format($orders_detail['amount'], 2)?> €</strong>
                   </p>
               
           
                                 
         </div>
        <?php
        break;
        
        case'mesinfos':
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
            break;
            
        case'mesaddresses':
             break;
             
        case'messouhaits':
             break;
             
        default:
            echo 'welcome';
    }
  
}

?>
    </div>
</div>
<?php

$content = ob_get_clean();

require 'template.php';
