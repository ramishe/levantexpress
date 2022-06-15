<?php
var_dump($_POST);

require_once '../model/ManageCategory.php';
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
