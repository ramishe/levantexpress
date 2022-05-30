<?php
$user_check=$user_info->fetch();
    if($user_check['username']==$verifier_user && $user_check['psd']==$verifier_psd){
        $content='  <h1 style="text-align:center">Bienvenue'.$verifier_user.' </h1>
                    <div class="myaccount">
                    
                    <div class="list_my_account">
                       <ul>
                          <li><a href="">Mes orders</a></li>
                          <li><a href="">Mes addresses</a></li>
                          <li><a href="">Mon compte details</a></li>
                          <li><a href="">Liste de souhaits</a></li>
                          <li><a href="">Deconnection</a></li>
                       </ul>
                    </div>
                    <div class="dashboard">
                    </div>
                  </div>';
    }else {
         $content='<p style=color:red>Votre nom ou votre mot de passe pas correct</p>
                  <form action="index.php?page=users" method="POST" id="form_signin" class="form_inscription hidden">
                     <h2>Inscrivez vous</h2>
                     <label for="verifier_user">Nom dutilisateur</label><br>
                     <input type="text" name="verifier_user" placeholder=""/><br>
                     <label for="verifier_psd">mot de passe</label><br>
                     <input type="password" name="verifier_psd" placeholder=""/><br>
                     <input type="submit" value="identifier" name="signin"/>
                     
                 </form>';
    };
    
require 'template.php';

/* if($user_check['username']==$verifier_user && $user_check['psd']==$verifier_psd)*/