<?php
$content='<div class="container_products">';
while($r=$info_products->fetch(PDO::FETCH_ASSOC)){
    if($r['discount']==0){
     $promotion='';
     $price_promotion='';
    }
    else{
     $price_anyway = $r['price']-($r['price']*$r['discount']/100);
     $promotion='<p>'.$r['discount'].'%</p>';   
     $price_promotion='<p class="price_promotion">'.number_format($price_anyway, 2, '.', ',') .' <span class="type_money">€</span></p>';
                         }
       $content.='<div class="products_de_un_category">
                    
                    <div class="products_photo_promotion">
                             <div class="products_photo">
                                <a href="index.php?page=product&name='.$r['name'].'&id='.$r['id'].'"     ><img src="./public/images/categories/'.$r['category_id'].'/'     .$r['photo_name'].'"></a>
                             </div>
                             <div class="products_promotion">
                                 '.$promotion.'
                             </div>
                             <div >
                              <a href="" id="wl'.$r['id'].'" class="products_wishlist"><i class="fa-solid fa-heart fa-2x btn_wishlist"></i></a>
                             </div>
                            
                              <h3>'.$r['name'].'</h3>
                             
                     </div>
                    <div class="price_products_dans_un_category">
                        <p>'.number_format($price_anyway, 2, '.', ',').' €</p>
                    </div>
                        <a href="" id="'.$r['id'].'" class="btn_add_produit">Ajouter au panier</a>
                 </div>
                
                 ';
                 
}
$content.='</div>';
require 'template.php';