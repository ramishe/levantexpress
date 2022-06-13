<?php
$r = $info_product->fetch(PDO::FETCH_ASSOC);
if($r['discount'] == 0){
    $promotion = '';
    $price_promotion = '';
} else{
    $promotion='<p>Promotion: '.$r['discount'].'%</p>';   
    $price_promotion='<p class=""> Prix en promotion: '.$r['price']-($r['price']*$r['discount']/100) .' <span class="type_money">€</span></p>';
}
                         
ob_start();
?>
<div class="container_product">
    <div class="photos_product">
        <div class="diapo_principal_photo_product">
            <?php
            $photos_product = $photos_product->fetchAll();
            
            foreach($photos_product as $d) {
                echo ' <div class="diapo_principal_product_item"><img src="./public/images/categories/'.$r['category_id'].'/'.$d['name'].'"></div>';
            }
            ?>
        </div>
        
        <div class="diaporama_product">
            <?php
            foreach($photos_product as $d) {
           
                echo ' <div class="diaporama_product_item"><img src="./public/images/categories/'.$r['category_id'].'/'.$d['name'].'"></div>';
            
            }
            ?>
        </div>
    </div>
    
     <div class="infos_product">
           <h1><?=$r['name']?></h1>
           <p><?=$r['small_desc']?></p>
           <h4><?=$promotion?></h4>
           <a href="" id="wl_<?=$r['id']?>" class="products_wishlist"><i class="fa-solid fa-heart fa-2x btn_wishlist"></i></a>
           <h3>Prix: <?=$r['price']?>€ <?=$price_promotion?></h3>
        <div class="">
            <h3>Description:</h3>
            <p><?=$r['description']?></p>
       </div>
        <a href="" id="<?=$r['id']?>" class="btn_add_produit">Ajouter au panier</a>
    </div>

</div>

<?php
$content = ob_get_clean();
          
require'template.php';