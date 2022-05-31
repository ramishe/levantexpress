<?php
var_dump($_POST);
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="./public/css/admin.css" type="text/css" />
    <script type="text/javascript" src="public/js/admin.js"></script>
</head>
<body>
     <div id="div_form_register_admin" class="div_form_register_admin">
      <form action="" method="POST" id="form_signup_admin" class="form_signin_admin"> 
           <h2>Creéz new admin</h2>
           <label for="firstname" >Prenom</label><br>
           <input type="text" name="firstname" placeholder="Prenom" id="firstname" required/><br>
           <label for="lastname">Nom</label><br>
           <input type="text" name="lastname" placeholder="Nom" id="lastname" required/><br>
           <label for="birth_date">Date de naissance</label><br>
           <input type="date" name="birth_date" placeholder="Date de naissance" id="birth_date"  required/><br>
           <input type="email" name="mail" placeholder="Email" id="mail"  required/><br>
           <label for="psd">Mot de passe</label><br>
           <input type="password" name="psd_admin" placeholder="Mot de passe" id="psd_admin"  required/><br>
           <input type="submit" value="Enregistrer" name="submit_signup_admin" id="btn_register_admin"/>
       </form>';
   </div>
      
<?php

?> 
</body>
</html>
   
<?php
/*
<label for="security_number">security number qui est envoyé par provider</label><br>
           <input type="text" name="security_number" placeholder="security_number" id="security_number"  required/><br><label for="mail">Email</label><br>  
*/
