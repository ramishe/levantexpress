<?php
ob_start();
?>
<div class="wrapper">
    <h2>Reset Password</h2>
    <p>Veuillez remplir ce formulaire pour réinitialiser votre mot de passe.</p>
    <form action="" method="POST"> 
        <div class="form-group">
            <input type="password" placeholder="Nouveau mot de passe" name="new_password" class="form-control<?=!empty($new_password_err)?> normal_champs" value="<?=$new_password?>">
            <span class="invalid-feedback"><?=$new_password_err?></span>
        </div>
        <div class="form-group">
            <input type="password" placeholder="Confirmer le mot de passe" name="confirm_password" class="form-control<?=!empty($confirm_password_err)?> normal_champs">
            <span class="invalid-feedback"><?=$confirm_password_err?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary normal_champs" value="Submit"> <br>
            <a class="btn btn-link ml-2" href="index.php?page=welcome">Annuler</a>
        </div>
    </form>
</div>
<?php
$content = ob_get_clean();
    
require'./view/template.php';    
    
