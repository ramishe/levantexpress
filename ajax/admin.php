<?php
require_once '../model/ManageCategory.php';
require_once '../model/ManageProducts.php';

$prod = new ManageProducts();
$req = new ManageCategories();

if(isset($_POST['sections'])){
    // on recupère tous les categ de la section
    $list = $req->getCategory(intval($_POST['sections']));
    // On affiche le resultat
    if($list->rowCount()) {
        echo '<option value="">Choisir une catégorie</option>';
        while($r = $list->fetch()) {
            echo '<option value="'.$r['id'].'">'.$r['name'].'</option>';
        }
    } else {
        echo '<option value="">Pas de catégorie pour cette section</option>';
    }
}

if(isset($_POST['id_category'])){
    // on recupère tous les categ de la section
    $list = $prod->getProduitsDeCategory(intval($_POST['id_category']));
    // On affiche le resultat
    if($list->rowCount()) {
        echo '<option value="">Choisir une catégorie</option>';
        while($r = $list->fetch()) {
            echo '<option value="'.$r['id'].'">'.$r['name'].'</option>';
        }
    } else {
        echo '<option value="">Pas de products pour cette categorie</option>';
    }
}

if(isset($_POST['nbr_photos'])){
    if(empty($_POST['products'])){
        echo'dfdfd';
    }else {
    for($i = 1;$i <= intval($_POST['nbr_photos']);$i++){
        echo' <input type="file" name="photo_produit'.$i.'"  class="photo_produit" id="photo_produit'.$i.'">';
    }
}} else {
    echo 'veuillez choisir numbre des photos';
}
