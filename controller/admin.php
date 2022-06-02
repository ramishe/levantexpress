<?php

require'./model/ManageAdmin.php';
$req= new ManageAdmins;
$form_signin_admin=' <form action="index.php?page=admin" method="POST" id="form_signin_admin" class                  ="form_signin_admin">
                     <h2>Pour gérer votre site insérer votre email et le mot de passe</h2>
                     <label for="champ_name_admin">Email</label><br>
                     <input type="text" name="champ_name_admin" placeholder=""/><br>
                     <label for="champ_psd_admin">mot de passe</label><br> 
                     <input type="password" name="champ_psd_admin" placeholder=""/><br>
                     <input type="submit" value="identifier" name="submit_signin_admin"/>
                     </form>';
var_dump($_SESSION);
if(isset($_SESSION['name']) && isset($_SESSION['psd'])){
    echo'toto';
}else {
      if(isset($_POST['submit_signin_admin'])&&$_POST['submit_signin_admin']=='identifier'){
        $adm=$req->getAdmins();
        $r = $adm->fetch(PDO::FETCH_ASSOC);
         $iscorrect=$req->decrypterPassword($_POST['champ_psd_admin'],$r['psd']);
         var_dump($iscorrect);
        if($_POST['champ_name_admin']==$r['first_name'] && $iscorrect){
        $_SESSION['name']=$_POST['champ_name_admin'];
        $_SESSION['psd  ']=$r['psd'];
        var_dump($_SESSION);
      }   
      else {
     // si pas ok on met un message
     echo ' pas correct';
     echo $form_signin_admin;}
}
else 
  {echo $form_signin_admin;
      
}
}     
     





// si admin pas  (session)


            


// si il est identifier tu geère une route
var_dump($_POST);
var_dump($_GET);

// 1 route l'admin en fonction de l'action demandé vers la bonne vue





//require'./view/admin/home.php';