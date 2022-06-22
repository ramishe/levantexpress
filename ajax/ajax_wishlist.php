<?php
session_start();
require_once'../model/ManagePanier.php';
require_once '../model/ManageUsers.php';
if(isset($_SESSION['id'])) {
    $req = new ManagePanier();
    $usr = new ManageUsers();
    
    if(!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }
    
    $content_cart_wishlist = '';
    
    if(isset($_POST['prod_id1'])) {
        $id = intval(str_replace('wl', '', $_POST['prod_id1']));
        $_SESSION['wishlist'][] = $id;
        var_dump($_SESSION['wishlist']);
        $usr->addWishlist($id, $_SESSION['id']);
        var_dump($_SESSION['wishlist'],$_POST);
        foreach($_SESSION['wishlist'] as $prod_id) {
            $info_product = $req->getProductInfos(intval($prod_id));
            if($info_product->rowCount()) {
                $info_product = $info_product->fetch(PDO::FETCH_ASSOC);
            
                $content_cart_wishlist .= '
                    <div class="cart_item">
                        <div class="items_info">
                            <div class="image_panier">
                                <img src="./public/images/categories/'.$info_product['category_id'].'/'.$info_product['photo_name'].'">
                            </div>
                            <div class="info_panier">
                                '.$info_product['name'].'<br>prix:'.$info_product['price'].'€ <br>promotion:'.$info_product['discount'].'
                            </div>
                        </div>
                    </div>
                ';
            } else {
                $usr->removeWishlist($prod_id,$_SESSION['id']);
            }
        }
        $content_cart_wishlist .='<a href="index.php?page=wishlist" class="normal_btn">Voir mes choix</a>';
    }
    
    echo $content_cart_wishlist;
} else {
    echo 'Vous devez vous connecter pour ajouter un produit à votre wishlist';
}
