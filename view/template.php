<?php
if(!isset($_SESSION['number_articles'])) $_SESSION['number_articles']='';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Levant-Express</title>
    <link rel="stylesheet" href="./public/css/generalstyle.css" type="text/css"/>
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
         <img src="./public/images/logo-levant-expres.png" alt="logo levant expres"></img>
       </div>
       <div class="filed_search">
          <form role="search" action="" method="POST">

            <input type="search"  id="moteur_recherch" placeholder="cherchez vos produits"/>
             <i class="fa-solid fa-magnifying-glass fa-2xl"></i>
          </form>
       </div>  
       <div class="wishlist">
          <a href=""><i class="fa-brands fa-gratipay fa-2xl"></i></a>
       </div>
       <div class="sign_in">
          <a href="" id="btn_open_popup"><i class="fa-solid fa-circle-user fa-2xl"></i></a>
          
       </div>
       <div class="shopping_basket">
          <a href="index.php?page=panier"><i class="fa-solid fa-bag-shopping fa-2xl"></i></a>
          <div class="number_articles_in_basket"> 
             <span id="number_articles_in_basket">
                 <?=$_SESSION['number_articles'] ?>
             </span>
            
          
          </div>
       </div>
      
     </div> 
     <nav>
      <a href="index.php?action=menu" ><i class="fa-solid fa-bars fa-xl" id="rayon"> </i></a>
      <a href="index.php?page=rayons" > Les rayons</a>
      <a href="index.php">Accueil</a>
      <a href="index.php?page=allproducts">Les produits</a>
      <a href="index.php?page=promotion">Promotion</a>
      <a href="index.php?page=contact">Contact</a>
      <a href="index.php?page=about">A propos</a>
    </nav>
    <div id="liste_rayon" class="liste_rayon"><?=$liste_rayon?></div>
    
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
             <div class="user_popup scroller">
                 <span id="btnClose" class="btnClose">&times;</span>
                 <form action="index.php?page=users" method="POST" id="form_signin" class="form_inscription hidden">
                     <h2>Inscrivez vous</h2>
                     <label for="verifier_user">Nom d'utilisateur</label><br>
                     <input type="text" name="verifier_user" placeholder=""/><br>
                     <label for="verifier_psd">mot de passe</label><br>
                     <input type="password" name="verifier_psd" placeholder=""/><br>
                     <input type="submit" value="identifier" name="signin"/>
                     <p>Vous n'avez pas encore de compte? <a href="" id="create_account">Creér un compte</a> </p>
                 </form>
                 
                  
                  <form action="index.php?page=users" method="POST" id="form_signup" class="form_inscription hidden"> 
                     <h2>Creéz votre compte</h2>
                     <label for="firstname">Prenom</label><br>
                     <input type="text" name="firstname" placeholder="Prenom" required/><br>
                     <label for="lastname">Nom</label><br>
                     <input type="text" name="lastname" placeholder="Nom" required/><br>
                     <label for="birth_date">Date de naissance</label><br>
                     <input type="date" name="birth_date" placeholder="Date de naissance" required/><br>
                     <label for="username">Nom d'utilisateur</label><br>
                     <input type="text" name="username" placeholder="Nom d'utilisateur" required/><br>
                     <label for="mail">Email</label><br>  
                     <input type="email" name="mail" placeholder="Email" required/><br>
                     <label for="telephone">Telephone</label><br>
                     <input type="number" name="telephone" placeholder="Telephone"/><br>
                     <label for="shipping_address">adresse de livraison</label><br>
                     <input type="text" name="shipping_address" placeholder="Ex: 4 impasse des bleuets" required/><br>
                     <label for="psd">Mot de passe</label><br>
                     <input type="password" name="psd" placeholder="Mot de passe" required/><br>
                     <label for="home_address"></label><br>
                     <input type="text" name="home_address" placeholder="Ex: 4 impasse des bleuets"/><br>
                     <label for="country">Pays</label><br>
                     <input type="text" name="country" placeholder="Ex:Framce"/><br>
                     <label for="city">Ville</label><br>
                     <input type="text" name="city" placeholder="Ex: Paris"/><br>
                     <label for="code_postal">Code_postal</label><br>
                     <input type="text" name="code_postal" placeholder="Zx:49000"/><br>
                     <label for=""></label><br>
                     <input type="submit" value="Enregistrer" name="submit" id="btn_register_compte"/>
                     
                 </form>
                 
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
  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="slick/slick.min.js"></script>
</body>
</html>