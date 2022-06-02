<?php
require 'model/ManageRayons.php';
$rayon = new ManageRayons();
$liste_rayon = $rayon->getRayonsNav();
// Initialize the session

//session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php?page=login");
    exit;
}

 
    $content='<h1 class="my-5">Hi, <b>'.$_SESSION["username"].'</b> Welcome to our site.</h1>
    <p>
        <a href="index.php?page=reset" class="btn btn-warning">Reset Your Password</a>
        <a href="index.php?page=logout" class="btn btn-danger ml-3">Sign Out of Your Account</a>
    </p>';
    
require'./view/template.php';



