<?php
require 'model/ManageRayons.php';
$rayon = new ManageRayons();
$liste_rayon = $rayon->getRayonsNav();

require './model/ManageUsers.php';
$user = new ManageUsers;

require'./view/user_view.php';



