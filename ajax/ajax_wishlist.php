 <?php
session_start();
require_once'../model/ManagePanier.php';
require_once '../model/ManageUsers.php';
if(isset($_SESSION['id'])) {
    $req = new ManagePanier();
    $usr = new ManageUsers();
    if(!isset($_SESSION['number_wishlist'])) $_SESSION['number_wishlist'] =0;
    if(!isset($_SESSION['wishlist'])) {
        $_SESSION['wishlist'] = array();
    }
    $content_cart_wishlist = '';
    if(isset($_POST['prod_id1'])) {
        $id = intval(str_replace('wl', '', $_POST['prod_id1']));
        $_SESSION['prd_id'] = $id;
        $key = array_search($id, $_SESSION['wishlist']);
        if($key!==false) {
            unset($_SESSION['wishlist'][$key]);
            $usr->removeWishlist($id,$_SESSION['id']);
        }else {
            $_SESSION['wishlist'][] = $id;
            $usr->addWishlist($id, $_SESSION['id']);
        }
        $info_wishlist = $usr->getWishlistOfUser(intval($_SESSION['id']));
        if($info_wishlist->rowCount()){
            $info_wishlist = $info_wishlist->fetchAll(PDO::FETCH_ASSOC);
            foreach($info_wishlist as $r){
                $content_cart_wishlist .= '
                    <div class="cart_item_wishlist">
                        <div class="items_info">
                            <div class="image_panier">
                                <img src="./public/images/categories/'.$r['category_id'].'/'.$r['photo_name'].'">
                            </div>
                            <div class="info_panier">
                                '.$r['name'].'<br>prix:'.$r['price'].'€ <br>promotion:'.$r['discount'].'
                            </div>
                        </div>
                    </div>
                ';
            }
            $content_cart_wishlist .='<a href="index.php?page=wishlist" class="normal_btn">Voir mes choix</a>';
        }else{
            $content_cart_wishlist = "Vous avez vidé votre wishlist";
        }
         
        echo $content_cart_wishlist;
    }

} else {
echo 'Vous devez vous connecter pour ajouter un produit à votre wishlist';
}





