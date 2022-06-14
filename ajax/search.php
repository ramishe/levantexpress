<?php

require_once '../model/ManageProducts.php';
$req = new ManageProducts();
if($_POST['wordsearch']){
    $listdeproduit = $req->searchProduct($_POST['wordsearch']);
     if($listdeproduit->rowCount()) {
       
        while($r = $listdeproduit->fetch()) {
            echo '<div class="produit_de_result_de_cherche">
                             <div class="product_photo_cherche">
                                <a href="index.php?page=product&name='.$r['name'].'&id='.$r['id'].'"     ><img src="./public/images/categories/'.$r['category_id'].'/'.$r['photo_name'].'"></a>
                             </div>
                             <div class="info_result_cherche">
                              <h4>'.$r['name'].'</h4>
                               <p>'.$r['description'].'</p>
                               </div>
                             
                     </div>';
        }
    } else {
        echo '<p value="">Pas de catégorie pour cette section</p>';
    }
}

