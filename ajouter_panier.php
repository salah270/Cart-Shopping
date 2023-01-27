<?php
//include the page 
require_once("./Connect.db.php");
//verifier 
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['panier'])){
    //s'il nexiste pas une session on créer une et on mets un tableau a l'intérieur 
    $_SESSION['panier'] = array();
 }

if(isset($_GET['id'])){
    $id = $_GET['id'];  

    $product = mysqli_query($conn, "SELECT * FROM items WHERE id = $id");
    if(empty(mysqli_fetch_assoc($product))){
        die("this product not exist");
    }

    if(isset($_SESSION['panier'][$id])){

        $_SESSION['panier'][$id]++; //increment Qt if product exists already 
    }else{
        $_SESSION['panier'][$id] = 1;
        
    }
    
    header("location:index.php");
}
?>