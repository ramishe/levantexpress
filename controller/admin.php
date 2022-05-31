<?php
require'./model/ManageAdmin.php';
$send= new ManageAdmins;

?>

<form action="" method="POST" id="form_signin_admin" class="form_signin_admin">
                 <h2>Pour gérer votre site insérer votre email et le mot de passe</h2>
                 <label for="champ_email_admin">Email</label><br>
                 <input type="text" name="champ_email_admin" placeholder=""/><br>
                 <label for="champ_psd_admin">mot de passe</label><br> 
                 <input type="password" name="champ_psd_admin" placeholder=""/><br>
                 <input type="submit" value="identifier" name="submit_signin_admin"/>
                 <p>? <a href="index.php?page=registeration_admin" id="create_account" >Creér un compte</a> </p>
             </form>
<?php
var_dump($_POST);
var_dump($_GET);



require'./view/admin/home.php';