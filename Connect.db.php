<?php
//connexion a la bd
$conn = mysqli_connect("localhost", "root", "", "panier");
// verfier la conx
if (!$conn) die("Connection failed: " . mysqli_connect_error());
  
  ?>
