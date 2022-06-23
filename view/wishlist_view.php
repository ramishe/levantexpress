<?php
if(isset($products_wishlist) && $products_wishlist->rowCount()) {
    $content='<div class="container_products">';
    while($r=$products_wishlist->fetch(PDO::FETCH_ASSOC)){
        
        if($r['discount']==0){
            $promotion = '';
            $price_promotion = '';
            $price_anyway = $r['price'];
        }
        else{
            $price_anyway = $r['price']-($r['price']*$r['discount']/100);
            $promotion='<p>'.$r['discount'].'%</p>';   
            $price_promotion='<p class="price_promotion">'.$r['price']-($r['price']*$r['discount']/100) .' <span class="type_money">€</span></p>';
        }
            if(isset($_SESSION['wishlist']) && array_search($r['id'], $_SESSION['wishlist'])) {
                $class = 'active';
            } else {
                $class = '';
            }
            $wishlist = '<a id="wl'.$r['id'].'" class="products_wishlist"><i class="fa-solid fa-heart fa-2x '.$class.'"></i></a>';
            
            $content.='<div class="products_de_un_category">
                    
                    <div class="products_photo_promotion">
                             <div class="products_photo">
                                <a href="index.php?page=product&name='.$r['name'].'&id='.$r['id'].'"     ><img src="./public/images/categories/'.$r['category_id'].'/'.$r['photo_name'].'"></a>
                             </div>
                             <div class="products_promotion">
                                 '.$promotion.'
                             </div>
                             '.$wishlist.'
                                  <h3>'.$r['name'].'</h3>
                                 
                         </div>
                        <div class="price_products_dans_un_category">
                            <p>'.$price_anyway.'€</p>
                        </div>
                            <a href="" id="'.$r['id'].'" class="btn_add_produit">Ajouter au panier</a>
                     </div>
                    
                     ';
        
    }
}else {
    $content.="<p>vous n'avez pas des produits dans votre wishlist</p>";
}
$content.='</div>';
require 'template.php';