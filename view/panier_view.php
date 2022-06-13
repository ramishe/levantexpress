<?php
if(isset($_SESSION['cart'])){
    $total_quantity = 0;
    $total_price = 0;
    $table_shopping='<div id="shopping-cart">
                     <div class="txt-heading">Panier</div>
                     <a id="btnEmpty" href="index.php?page=panier&action=empty">Vider Panier</a>
                     <table class="tbl-cart" cellpadding="10" cellspacing="1">
                     <tbody>
                     <tr>
                     <th style="text-align:left;">Nom de prduit</th>
                     <th style="text-align:left;">Promotion</th>
                     <th style="text-align:right;" width="5%">Quantité</th>
                     <th style="text-align:right;" width="10%">Prix unitaire</th>
                     <th style="text-align:right;" width="10%">Prix</th>
                     <th style="text-align:center;" width="5%">Supprimer</th>
                     </tr>	';
     
    foreach($_SESSION['cart'] as $prod_id => $quantity){
       $info_product = $allproducts->addProductToPanier($prod_id);
       $r = $info_product->fetch(PDO::FETCH_ASSOC);
       if($r['discount']==0 || $r['discount']=='' ){
        $item_price = $_SESSION['cart'][$r['id']]*$r["price"];
       } else $item_price = $_SESSION['cart'][$r['id']] * $r["price"]*((100-intval($r['discount']))/100);
         
         $table_shopping.='	<tr>
			                <td><img src="./public/images/categories/'.$r['category_id'].'/'.$r['photo_name'].'" class="cart-item-image"/>'. $r["name"].';
			                </td>
			                <td>'.$r["discount"].' %</td>
			                <td style="text-align:right;">'.$_SESSION['cart'][$r['id']].'</td>
			                <td  style="text-align:right;">'.$r["price"].' €</td>
			                <td  style="text-align:right;">'.number_format($item_price,2).' €</td>
			                <td style="text-align:center;"><a href="index.php?page=panier&action=remove&code='.$r['id'].'" class="btnRemoveAction"><i class="fa-solid fa-trash-can" fa-2xl></i></a></td>
			                </tr>';
      $total_quantity += $_SESSION['cart'][$r['id']];
   	  $total_price += ($item_price*$_SESSION['cart'][$r['id']]);
        
      }
      $_SESSION['total_quantity']=$total_quantity;
      $_SESSION['total_price']=number_format($total_price,2);
      
        $table_shopping.='<tr>
                          <td colspan="2" align="right">Total:</td>
                          <td align="right">'.$total_quantity.'</td>
                          <td align="right" colspan="2"><strong>'.number_format($total_price, 2).' €</strong></td>
                          <td></td>
                          </tr>
                          </tbody>
                          </table>
                          <div class="div_btn_panier"><a href="index.php?page=checkout" class="btn_payer">Payer</a></div>';
      
}  else {
         $table_shopping='<div class="no-records">Votre panier est vide</div>';
}
         $table_shopping.='</div>';
      

$content= $table_shopping;

require 'template.php';
