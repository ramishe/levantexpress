<?php
$content='<div class="wrapper">
        <h2>Se connecter </h2>
        <p>Please fill in your credentials to login.</p>';
 if(!empty($login_err)){
            $content.='<div class="alert alert-danger">' . $login_err . '</div>';
        }  
         $content.='<form action="" method="post">
            <div class="form-group">
                <p>
                
                <input type="text" placeholder="Nom utilisateur" name="username" class="form-control'.(!empty($username_err)).'is-invalid" value="'. $username.'">
                <span class="invalid-feedback">'.$username_err.'</span>
                </p>
            </div>    
            <div class="form-group">
            <p>
                <input type="password" name="password" placeholder="Mot de passe" class="form-control'.!empty($password_err). 'is-invalid">
                <span class="invalid-feedback">'.$password_err.'</span>
                </p> 
            </div>
            
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Se connecter">
            </div>
            <p>Dont have an account? <a href="index.php?page=signup">Sign up now</a>.</p>
        </form>
    </div>';

require'./view/template.php';