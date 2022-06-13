<?php
var_dump($_SESSION);
if(!isset($_SESSION["loggedin_admin"]) || $_SESSION["loggedin_admin"] !== true){
    header("location:../controller/admin/login.php");
    exit;
}

    ob_start();
?> 
    <form id="form_new_produit" enctype="multipart/form-data"  action="index.php?page=welcome_admin" method="POST">
      <fieldset>
        <legend>Informations de produits</legend>
        <label for="nom">Nom d'produit:</label>
        <input type="text" name="nom" id="name_new_produit">
        <label for="small_desc">Description essentielle:</label>
        <input type="text" name="small_desc" id="small_desc">
       
        <label for="sku"> Numéro de SKU:</label>
        <input type="text" name="sku" id="sku">
    </fieldset>
    <fieldset>
        <legend>Classe de produit:</legend>
         <label for="description">Description:</label>
        <textarea name="description" id="description" rows="10" cols="33"></textarea>
        <label for="sections">Choisir un section:</label>
         <select name="sections" id="sections" required>
            <option value="">--Veuillez choisir une option--</option>
<?php
$info_Rayon= $ray->getRayonsList();
while($r=$info_Rayon->fetch(PDO::FETCH_ASSOC)){
 ?>
            <option value="<?=$r['id']?>"><?=$r['name']?></option>
<?php
};
?>
         </select>
         
         <label for="categories">Choisir un categorie:</label>
         <select name="categories" id="categories" required>
            <option value="">--Choisissez d'abord une section--</option>
         </select>
    </fieldset>
    
    <fieldset>
         <legend>Quantité et prix:</legend>
         <label for="^price">prix:(€)</label>
         <input type="text" name="price" id="price">
         <label for="inventory">Inventaire:</label>
         <input type="text" name="inventory" id="inventory">
          <label for="discount">Promotion:(%)</label>
         <input type="text" name="discount" id="discount">
         <label for="tva">TVA:(%)</label>
         <input type="text" name="tva" id="tva">
    </fieldset>
    <fieldset>
         <legend>Image de produit:</legend>
         <p>Veuillez ajouter une image principale du produit au format :<strong>png</strong> </p>
         <input type="file" name="photo_produit"  class="photo_produit" id="photo_produit">
    </fieldset>
    <input type="submit" name="submit" id="submit"  value="Ajouter le produit" class="btn_ajoute">
   </form>
<?php
   $form_infos=ob_get_clean();
   ?>
<!doctype html>
<html lang="fr">
   
<head>
 <meta charset="UTF-8">
 <title>admin</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="./public/css/admin.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script type="text/javascript" src="./public/js/admin.js"></script>
</head>
<body>
 <div class="container">
 <div class="titre">
   <h1>Adminstration de site levantexpress</h1>
   <p> Bonjour <b><?=$_SESSION['username_admin'] ?></b> Bienvenue.<p>
</div>
<div class="container_admin_page" id="container_admin_page">
   <div class="list_operations_admin">
    <ul>
     <a href="index.php?page=welcome_admin&action=newproduit"><li>Ajouter un produit</li></a>
     <a href="index.php?page=welcome_admin&action=modifierinfoproduit"><li>Modifier les infos</li></a>
     <a href="index.php?page=welcome_admin&action=gererrayons"><li>gérer les rayons </li></a>
     <a href="index.php?page=reset" class="btn btn-warning"><li>Réinitialiser mot de passe</li></a>
     <a href="index.php?page=logout_admin" class="btn btn-danger ml-3"><li>Déconnection</li></a>
    </ul>
   </div>
   
  <div class="affichage_operations_admin" id="affichage_operations_admin">
  
<?php

   echo $form_infos;
   ?>
  </div>
</div>
 </div>
 
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>