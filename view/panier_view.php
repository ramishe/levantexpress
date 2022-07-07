<?php
if(isset($_SESSION['cart'])){
    $total_quantity = 0;
    $total_price = 0;
    $item_price = 0;
    ob_start();
    ?>
    <div id="shopping-cart">
        <div class="txt_heading">Votre panier</div>
        <a id="btnEmpty" href="index.php?page=panier&action=empty">Vider Panier</a>
        <table class="tbl_cart" cellpadding="20" cellspacing="1">
            <thead>
                <tr>
                    <th>Nom de prduit</th>
                    <th>Promotion</th>
                    <th>Quantité</th>
                    <th>Prix unitaire</th>
                    <th>Prix</th>
                    <th>Supprimer</th>
                </tr>
            </thead>
    <?php
    foreach($_SESSION['cart'] as $prod_id => $quantity){
        $info_product = $allproducts->addProductToPanier($prod_id);
        $r = $info_product->fetch(PDO::FETCH_ASSOC);
        if($r['discount']==0 || $r['discount']=='' ){
            $price_unitaire =  $r["price"];
            $item_price = $_SESSION['cart'][$r['id']]*$r["price"];
        } else{ 
            $item_price = $_SESSION['cart'][$r['id']] * $r["price"]*((100-intval($r['discount']  ))/100);
            $price_unitaire = $r["price"]*((100-intval($r['discount']  ))/100);
        }
        $price_ancien = (($price_unitaire == $r["price"])? '' : ($r["price"]));
    ?>
            <tbody>
                <tr>
                    <td align="left"><img src="./public/images/categories/<?=$r['category_id']?>/<?=$r['photo_name']?>" class="cart-item-image"/><?=$r["name"]?></td>
                    <td><?=$r["discount"]?> %</td>
                    <td><?=$_SESSION['cart'][$r['id']]?></td>
                    <td><strike><?= $price_ancien?> </strike> <?=$price_unitaire?> €</td>
                    <td><?= number_format($item_price,2) ?> €</td>
                    <td><a href="index.php?page=panier&action=remove&code=<?=$r['id']?>" class="btnRemoveAction"><i class="fa-solid fa-trash-can" fa-2xl></i></a></td>
                </tr>
        <?php
        $total_quantity += $_SESSION['cart'][$r['id']];
        $total_price += $item_price;
    }
    $_SESSION['total_quantity'] = $total_quantity;
    $_SESSION['total_price'] = number_format($total_price,2);
    ?>
            </tbody>
        </table>
        <div class="div_total_price_panier">
            <p>Numbtre des articles: <?=$total_quantity?> </p>
            <p><strong>Total prix: <?=number_format($total_price, 2)?> €</strong></p>
        </div>
        
        <div class="div_btn_panier"><a href="index.php?page=checkout" class="btn_payer">Payer</a>
        </div>
        <?php     
}else{
    ?>
        <div class="no-records">Votre panier est vide</div>
    <?php
    }
?>
    </div>
<?php
$content=ob_get_clean();
require 'template.php';
