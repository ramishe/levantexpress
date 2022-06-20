<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>admin login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <meta name="viewport" content="width=device-width,initial-scale=1">
 <link rel="stylesheet" href="./public/css/admin.css" type="text/css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 <script type="text/javascript" src="./public/js/admin.js"></script>
</head>
<body>
    <?php
ob_start();
?>
<div class="container_admin">
<div class="wrapper">
    <h2>Se connecter </h2>
    <p>Veuillez renseigner vos identifiants pour vous connecter.</p>
    <?php     
 if(!empty($login_err)){
     ?>
    <div class="alert_alert_danger"> <?= $login_err ?> </div>
    <?php
        }  
    ?>
      <form action="" method="post">
          <div class="form_group">
             <p>
                <input type="text" placeholder="Nom utilisateur" name="username"  value="<?= $username?>">
                <span class="invalid_feedback"> <?=$username_err?></span>
            </p>
         </div>    
         <div class="form_group">
            <p>
              <input type="password" name="password" placeholder="Mot de passe">
              <span class="invalid_feedback"><?=$password_err?></span>
           </p> 
         </div>
          <div class="form_group">
            <input type="submit" class="btn_login_admin" value="Se connecter">
          </div>
        </form>
    </div>
    </div>
<?php
$content = ob_get_clean();
echo $content;
?>
</body>
</html>
