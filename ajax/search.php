<?php
var_dump($_POST);
require_once '../model/ManageProducts.php';
$req = new ManageProducts();
if($_POST['wordsearch']){
    $listdeproduit = $req->searchProduct($_POST['wordsearch']);
     if($listdeproduit->rowCount()) {
       
        while($r = $listdeproduit->fetch()) {
            echo '<div class="products_photo_promotion">
                             <div class="products_photo">
                                <a href="index.php?page=product&name='.$r['name'].'&id='.$r['id'].'"     ><img src="./public/images/categories/'.$r['category_id'].'/'.$r['photo_name'].'"></a>
                             </div>
                              <h3>'.$r['name'].'</h3>
                             
                     </div>';
        }
    } else {
        echo '<p value="">Pas de catégorie pour cette section</p>';
    }
}

