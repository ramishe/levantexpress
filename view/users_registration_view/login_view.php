<?php
?>
<div class="wrapper">
    <h2>Se connecter </h2>
    <p>Veuillez saisir vos identifiants pour vous connecter.</p>
<?php
if(!empty($login_err)){
?>
    <div class="alert alert-danger"><?= $login_err ?></div>
<?php
} 
?>
    <form action="" method="post">
        <div class="form-group">
            <p>
            <input type="text" placeholder="Nom utilisateur" name="username" class="form-control<?= (!empty($username_err))?> is-invalid" value="<?= $username?>">
            <span class="invalid-feedback"><?= $username_err ?></span>
            </p>
        </div>    
        <div class="form-group">
            <p>
            <input type="password" name="password" placeholder="Mot de passe" class="form-control<?= !empty($password_err)?> is-invalid">
            <span class="invalid-feedback"><?= $password_err?></span>
            </p> 
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Se connecter">
        </div>
        <p>Vous n'avez pas de compte? <a href="index.php?page=signup">S'inscrire maintenant</a>.</p>
    </form>
</div>
<?php
$content = ob_get_clean();
require'./view/template.php';