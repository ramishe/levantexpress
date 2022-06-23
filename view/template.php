<?php
ob_start();
?> 
      <a href="index.php?page=rayons" > Les rayons</a>
      <a href="index.php">Accueil</a>
      <a href="index.php?page=allproducts">Les produits</a>
      <a href="index.php?page=promotion">Promotion</a>
      <a href="index.php?page=contact">Contact</a>
      <a href="index.php?page=about">A propos</a>
   
<?php
$menu = ob_get_clean();
if(!isset($_SESSION['number_articles'])) $_SESSION['number_articles']='';
if(!isset($_SESSION['number_wishlist'])) $_SESSION['number_wishlistS']='';
if(!isset($_SESSION["username"])) $_SESSION["username"]='';

?>
<!doctype html>
<html lang="fr">
<head>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <meta name="viewport" content="width=device-width,initial-scale=1">
     <title>Levant-Express</title>
     <link rel="stylesheet" href="./public/css/generalstyle.css" type="text/css"/>
     <link rel="shortcut icon" href="./public/images/logo-levant-expres.png" type="public/image/png" />
     <link rel="stylesheet" href="./public/css/users.css" type="text/css"/>
     <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@300;400&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Red+Hat+Text:wght@500&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Jua&display=swap" rel="stylesheet">
     <link href="https://fonts.googleapis.com/css2?family=Krub:wght@300&display=swap" rel="stylesheet">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <link rel="stylesheet" type="text/css" href="slick/slick.css"/>
     <link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
    <script type="text/javascript" src="public/js/site.js"></script>
</head>
<body>
  <header>
     <div class="top_bar">
       <div class="telephone">
        <i class="fa-solid fa-square-phone fa-2xl"></i>+33-0761703769
       </div>
        <div class="langues">
         <form>
           <select name="" id="">
             <option value="french">Français</option>
             <option value="english">Anglais</option>
             <option value="arabic">Arabe</option>
           </select>
         </form>
       </div>
       <div class="social_media">
         <a href=""> <i class="fa-brands fa-instagram fa-2xl"></i></a>
         <a href=""> <i class="fa-brands fa-facebook-square fa-2xl"></i></a>
         <a href=""> <i class="fa-brands fa-youtube fa-2xl"></i></a>
         <a href=""> <i class="fa-brands fa-twitter-square fa-2xl"></i></a>
       </div>
     </div>
     <div class="middle_bar">
       <div class="logo">
         <a href="index.php"><img src="./public/images/logo-levant-expres.png" alt="logo levant expres"></img></a>
       </div>
       <div class="filed_search">
          <form role="search" action="" method="POST">

            <input type="search"  id="bar_recherch" placeholder="cherchez vos produits"/>
            
          </form>
          <div class="box_search">
              
          </div>
       </div>  
       <div class="wishlist">
           <div id="list_wishlist" class="list_panier hidden">
                <span id="btn_close_popup_wishlist" class="btnClose"> &times;</span>
                <div id="wishlist_content"></div>
           </div>
          <a href="index.php?page=wishlist"><i class="fa-brands fa-gratipay fa-2xl"></i></a>
          <div class="number_articles_in_wishlist" id="number_articles_in_wishlist"> 
            
                 <?=$_SESSION['number_wishlist'] ?>
            
            
          
          </div>
       </div>
       <div class="sign_in">
          <a href="index.php?page=login" id="btn_open_popup"><i class="fa-solid fa-circle-user fa-2xl"></i></a>
          <span id="user_name"><?=$_SESSION["username"]?></span>
          
       </div>
       <div class="shopping_basket">
          <a href="index.php?page=panier"><i class="fa-solid fa-bag-shopping fa-2xl"></i></a>
          <div class="number_articles_in_basket" id="number_articles_in_basket"> 
            
                 <?=$_SESSION['number_articles'] ?>
            
            
          
          </div>
       </div>
      
     </div> 
     <nav>
         <a href="index.php?action=menu" id="rayon"><i class="fa-solid fa-bars fa-xl"  > </i></a>
         <div class="menu_nav">
          <?=$menu?>
          </div>
    </nav>
    <div id="liste_rayon" class="liste_rayon"><span id="btnClose1" class="btnClose">&times;</span><?=$menu?></div>
    
    <div id="list_panier" class="list_panier hidden">
        <span id="btn_close_popup_panier" class="btnClose">
            &times;
        </span>
        <div id="cart_content">
       </div>
    </div>
     
  </header>
  <main>
      <?=$content; ?>
       <div class="overlay hidden" id="overlay">
             <div class="user_popup scroller" id="user_popup">
                 <span id="btnClose" class="btnClose">&times;</span>
             
      </div>
  </main>
  <footer>
     <div class="livraison">
          <h4>LIVRAISON GRATUITE</h4>
          <p>Livraison gratuite à partir de 50 € en France tous pays européens à partir de 100 €</p>
     </div>
     <div class="liens_utiles">
           <h4>LIENS UTILES</h4>
          <ul>
               <li><a href="">politique de confidentialité</a></li>
               <li><a href="">Politique de retour</a></li>
               <li><a href="">Conditions d'utilisation</a></li>
               <li><a href="">Service de livraison</a></li>
               <li><a href="">Contactez-nous</a></li>
          </ul>
     </div>
     <div class="aplli">
          <h4>APPLICATION MOBILE</h4>
          <p>avec l'application Levant Express, vous pouvez faire vos achats plus facilement. Avec notre application, vous avez un large choix et nous vous proposons de bons prix et des offres spéciales !</p>
     </div>
     <div class="social_payment_method">
         <h4>SOCIALS MEDIAS</h4>
        <div class="social_media_footer">
         <a href=""> <i class="fa-brands fa-instagram fa-2X "></i></a>
         <a href=""> <i class="fa-brands fa-facebook-square fa-2X"></i></a>
         <a href=""> <i class="fa-brands fa-youtube fa-2X"></i></a>
         <a href=""> <i class="fa-brands fa-twitter-square fa-2X"></i></a>
       </div> 
        <h4>METHOD DE PAYMENTS</h4>
        <div class="payment_method">
            <a href=""> <i class="fa-brands fa-cc-visa fa-2X"></i> </a>
            <a href=""> <i class="fa-brands fa-cc-paypal fa-2X"></i> </a>
            <a href=""> <i class="fa-brands fa-cc-stripe fa-2X"></i> </a>
            <a href=""> <i class="fa-brands fa-cc-mastercard fa-2X"></i> </a>
        </div>
     </div>
     
  </footer>
  <div class="footer_copyright"><span >Levantexpress eCommerce.&nbsp;©&nbsp;&nbsp;2022.&nbsp;&nbsp;All Rights Reserved.</span></div>
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>