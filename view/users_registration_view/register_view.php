<?php
ob_start();
?>
<div class="wrapper">
    <h2>S'inscrire</h2>
    <p>Veuillez remplir ce formulaire pour créer un compte</p>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" placeholder = "username" class=" normal_champs form-control<?=!empty($username_err)?> is-invalid" value="<?=$username?>">
            <span class="invalid-feedback"><?= $username_err?></span>
        </div>    
        <div class="form-group">
            <input type="password" name="password" placeholder = "Password" class="normal_champs form-control<?=!empty($password_err) ?> is-invalid" value="<?= $password ?>">
            <span class="invalid-feedback"><?= $password_err ?></span>
        </div>
        <div class="form-group">
            <input type="password" name="confirm_password" placeholder = " confirm password" class="form-control<?=!empty($confirm_password_err)?> is-invalid" value="<?=$confirm_password?>">
            <span class="invalid-feedback "><?= $confirm_password_err ?></span>
        </div>
        <div class="form-group">
            <input type="submit" class="btn  normal_champs" value="Submit">
            <input type="reset" class="btn  normal_champs" value="Remettre">
        </div>
            <p>Vous avez déjà un compte? <a href="index.php?page=login">Login here</a>.</p>
    </form>
</div>
<?php
$content = ob_get_clean();
require'./view/template.php';