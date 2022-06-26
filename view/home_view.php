<?php
ob_start();
$fichiers=countFiles('public/images/slideshow');
?>
<div class="diaporama">
<?php
foreach($fichiers as $fichier){
    $img = explode('/', $fichier);
    $img = explode('.', $img[count($img)-1]);
    $text = str_replace('_', ' ',$img[0]);
?>
    <div class="item">
        <div class="item_text"><?=$text?></div>
        <img src="<?=$fichier?>" alt="">
    </div>
<?php
}
?>
</div>
<div class="container_general_info">
    <div class="general_info1">
        <div class="icon_general_info1">
            <i class="fa-solid fa-clock-rotate-left  fa-3x"></i>
        </div>  
        <div class="title_text_general_info1">
            <h4 class="porto-sicon-title">ASSISTANCE EN LIGNE 24/7</h4>
            <p> Nhésitez pas à nous contacter à tout mome.</p>
        </div> 
    </div>
    <div class="general_info1">
        <div class="icon_general_info1">
            <i class="fa-solid fa-clock-rotate-left  fa-3x"></i>
        </div>  
        <div class="title_text_general_info1">
            <h4 class="porto-sicon-title">PAIEMENT SÉCURISÉ</h4>
            <p> Tous les modes de paiement disponibles sont sécurisés.</p>
        </div> 
    </div>
    <div class="general_info1">
        <div class="icon_general_info1">
            <i class="fa-solid fa-clock-rotate-left  fa-3x"></i>
        </div>  
        <div class="title_text_general_info1">
            <h4 class="porto-sicon-title">LIVRAISON GRATUITS</h4>
            <p> Livraison gratuite à partir de 49 €.</p>
        </div> 
    </div>
</div>
<?php
$fichiers=countFiles('public/images/logos');
?>
<div class="banners">
    <div class="banner1">
        <a href="index.php?page=products&name=Thé%20et%20Café&id=17"> <img src="public/images/banners/banner1.png" alt=""></img></a>
        <div class="text_on_banner"><h3>Thé et Café</h3></div>
    </div>
    <div class="banner2">
        <a href="index.php?page=products&name=Confitures&id=9"> <img src="public/images/banners/banner2.png" alt=""></img></a>
        <div class="text_on_banner"><h3>Confiture</h3></div>
    </div>
</div>
<div class="lazy logos_slideshow">
    <?php
    foreach($fichiers as $fichier){
    ?>
    <div class="item_logos"><img src="<?=$fichier?>" alt=""></div>
<?php
}
?>
</div>
<?php
$content = ob_get_clean();
require 'template.php';

?>
